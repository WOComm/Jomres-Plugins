<?php
/**
 * Core file
 *
 * @author Vince Wooll <sales@jomres.net>
 * @version Jomres 8
 * @package Jomres
 * @copyright	2005-2015 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly.
 **/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

//This is a month view chart of all paid bookings, excludes cancelled/pending/unpaid ones)
class j06002chart_property_visits
	{
	function __construct($componentArgs)
		{
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch )
			{
			$this->template_touchable = false;
			return;
			}
		return;
		$this->retVals = '';
		$property_uid = getDefaultProperty();
		
		if (isset($componentArgs[ 'output_now' ]))
			$output_now = $componentArgs[ 'output_now' ];
		else
			$output_now = true;
		
		if (isset($componentArgs[ 'is_widget' ])) {
            $is_widget = $componentArgs[ 'is_widget' ];
        } else {
            $is_widget = false;
        }
		
		$chart_type = jomresGetParam( $_POST, 'jr_chart_type', 'line' );
		
		//import jomres charts class and create a new instance
		jr_import('jomres_charts');
		$chart = new jomres_charts();
		
		//set new chart data
		$chart->type 		= $chart_type;
		$chart->title 		= jr_gettext("_JOMRES_COM_MR_QUICKRES_STEP2_PROPERTYNAME",'_JOMRES_COM_MR_QUICKRES_STEP2_PROPERTYNAME',false,false);
		$chart->url 		= jomresUrl(JOMRES_SITEPAGE_URL_NOSEF . '&task=charts&jr_chart=chart_bookings');
		$chart->title_class = 'panel-default';
		$chart->description = jr_gettext("_JOMRES_HPROPERTY_VISITS_DESC",'_JOMRES_HPROPERTY_VISITS_DESC',false,false);
		$chart->labels 		= array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
		$chart->is_widget 	= $is_widget;
		
		//query db for relevant rows for this chart
		$query = "SELECT 
					`id`, 
					`date_time`,   
					COUNT( `id` ) AS number_of_visits   
				FROM #__jomres_pageviews 
				WHERE `property_uid` = " . (int)$property_uid . " 
					AND `user_is_manager` = 0 
				GROUP BY `id` 
				ORDER BY `date_time` ASC 
				";
		$result = doSelectSql( $query );
		
		if (empty($result))
			return;
		else
			{
			$results 	= array ();

			//now we create an array of amounts for each year/month
			foreach ( $result as $r)
				{
				$month =  date("n" , strtotime($r->date_time) );
				$year =  date("Y" , strtotime($r->date_time) );
				
				if (isset($results[$year][$month]))
					$results[$year][$month] += $r->number_of_visits;
				else
					$results[$year][$month] = $r->number_of_visits;
				}
			
			//sort results by year ascending
			ksort($results);

			//build chart datasets by year
			foreach ($results as $k=>$v)
				{
				$data = array();
				
				//build data for each month
				for ($i = 1; $i <= 12; $i++)
					{
					if (isset($v[$i]))
						$data[] = $v[$i];
					else
						$data[] = 0;
					}
				
				//generate the dataset color
				$a = mt_rand(0, 255);
				$b = mt_rand(0, 255);
				$c = mt_rand(0, 255);
				
				//set dataset details
				$chart->datasets[$k] = array(
											 'label' => $k, 
											 'data' => $data,
											 'fillColor' => "rgba(".$a.",".$b.",".$c.",0.5)",
											 'strokeColor' => "rgba(".$a.",".$b.",".$c.",1)",
											 'pointColor' => "rgba(".$a.",".$b.",".$c.",1)",
											 'pointStrokeColor' => "#fff",
											 'pointHighlightFill' => "#fff",
											 'pointHighlightStroke' => "rgba(".$a.",".$b.",".$c.",1)"
											 );
				}
			}
		
		//display the chart or return it
		if (!$output_now)
			$this->retVals = $chart->get_chart();
		else
			echo $chart->get_chart();
		}

	function getRetVals()
		{
		return $this->retVals;
		}
	}
