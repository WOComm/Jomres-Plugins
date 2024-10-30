<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.11.0
 *
 * @copyright	2005-2018 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/

// ################################################################
defined('_JOMRES_INITCHECK') or die('');
// ################################################################

//This is a month view chart of all paid bookings, excludes cancelled/pending/unpaid ones)
class j06002income_table
{
    public function __construct($componentArgs)
    {
        $MiniComponents = jomres_singleton_abstract::getInstance('mcHandler');
        if ($MiniComponents->template_touch) {
            $this->template_touchable = false;

            return;
        }
		$ePointFilepath = get_showtime('ePointFilepath');

        $property_uid = getDefaultProperty();

        //query db for relevant rows for this chart
        $query = 'SELECT 
					a.id, 
					a.status, 
					a.raised_date,   
					SUM( CASE WHEN b.init_total_inclusive < 0 THEN 0 ELSE b.init_total_inclusive END ) AS grand_total   
				FROM #__jomresportal_invoices a 
					JOIN #__jomresportal_lineitems b ON a.id = b.inv_id 
				WHERE a.property_uid = ' .(int) $property_uid.' 
					AND a.status = 1 
					AND a.contract_id > 0 
				GROUP BY a.id 
				ORDER BY a.raised_date ASC 
				';
				
			// To get totals for all properties across the installation
/*         $query = 'SELECT 
					a.id, 
					a.status, 
					a.raised_date,   
					SUM( CASE WHEN b.init_total_inclusive < 0 THEN 0 ELSE b.init_total_inclusive END ) AS grand_total   
				FROM #__jomresportal_invoices a 
					JOIN #__jomresportal_lineitems b ON a.id = b.inv_id 
				WHERE a.status = 1 
					AND a.contract_id > 0 
				GROUP BY a.id 
				ORDER BY a.raised_date ASC 
				';
				 */
				 
        $result = doSelectSql($query);
		
        if (empty($result)) {
			echo "No results to show";
            return;
        } else {
            $results = array();

            //now we create an array of amounts for each year/month
            foreach ($result as $r) {
                $month = date('n', strtotime($r->raised_date));
                $year = date('Y', strtotime($r->raised_date));

                if (isset($results[$year][$month])) {
                    $results[$year][$month] += number_format((float) $r->grand_total, 2, '.', '');
                } else {
                    $results[$year][$month] = number_format((float) $r->grand_total, 2, '.', '');
                }
            }

            //sort results by year ascending
            ksort($results);
			
			$current_date = new DateTime();
			
			$data_set = array();
            //build chart datasets by year
            foreach ($results as $k => $v) {
				$data = array();
                //build data for each month
                for ($i = 1; $i <= 12; ++$i) {
                    if (isset($v[$i])) {
                        $income = $v[$i];
                    } else {
                        $income = 0;
                    }
					
					$curr_datetime_obj = new DateTime($k."-".$i."-01");
					if ( $curr_datetime_obj <= $current_date ) {
					$dateObj   = DateTime::createFromFormat('!m', $i);
					$data['MONTH'] =  $k." ".$dateObj->format('F'); // March
					$data['INCOME'] = output_price($income , '' , false );
					$data_set[] = $data;
					}
                }
            }
			$data_set = array_reverse($data_set);
			$output = array();
			
			$output['PAGE_TITLE'] = jr_gettext('_JOMRES_INCOME_TABLE_TITLE', '_JOMRES_INCOME_TABLE_TITLE', false);
			$output['_JOMRES_INCOME_TABLE_MONTH'] = jr_gettext('_JOMRES_INCOME_TABLE_MONTH', '_JOMRES_INCOME_TABLE_MONTH', false);
			$output['_JOMRES_INCOME_TABLE_INCOME'] = jr_gettext('_JOMRES_INCOME_TABLE_INCOME', '_JOMRES_INCOME_TABLE_INCOME', false);
			
			$pageoutput[]=$output;
			$tmpl = new patTemplate();
			$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
			$tmpl->readTemplatesFromInput( 'income_table.html' );
			$tmpl->addRows( 'pageoutput', $pageoutput );
			$tmpl->addRows( 'rows', $data_set );
			$tmpl->displayParsedTemplate();
		
        }
		$data_set = array_reverse($data_set);
    }

    public function getRetVals()
    {
        return null;
    }
}
