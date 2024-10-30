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

//This is a month view chart the occupancy - number of rooms booked by day in the selected month
class j06002chart_occupancy
	{
	function __construct($componentArgs)
		{
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch )
			{
			$this->template_touchable = false;
			return;
			}
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
		$chart->title 		= jr_gettext("_JOMRES_STATUS_BOOKINGS",'_JOMRES_STATUS_BOOKINGS',false,false).' '.date("F").' '.date("Y");
		$chart->url 		= jomresUrl(JOMRES_SITEPAGE_URL_NOSEF . '&task=charts&jr_chart=chart_occupancy');
		$chart->title_class = 'panel-default';
		$chart->description = jr_gettext("_JOMRES_CHART_OCCUPANCY_DESC",'_JOMRES_CHART_OCCUPANCY_DESC',false,false);
		$chart->is_widget 	= $is_widget;

		//get days in month to be used later on X axis
		$current_month = date("m");
		$current_year = date("Y");
		$days_in_month = cal_days_in_month(CAL_GREGORIAN, $current_month, $current_year);
		
		//query db for relevant rows for this chart
		$query = "SELECT 
					DATE_FORMAT(`date`, '%e') AS booked_date, 
					COUNT(`room_uid`) AS rooms_booked    
				FROM #__jomres_room_bookings  
				WHERE `property_uid` = " . (int)$property_uid . " 
					AND DATE_FORMAT(`date`, '%Y/%m') = '".$current_year."/".$current_month."'  
				GROUP BY booked_date 
				ORDER BY booked_date ASC 
				";
		$result = doSelectSql( $query );

		if (empty($result))
			return;
		else
			{
			$results 	= array ();
			$labels		= array();
			$data 		= array();

			//now we create an array of amounts for each year/month
			foreach ( $result as $r)
				{
				if (isset($results[$r->booked_date]))
					$results[$r->booked_date] += $r->rooms_booked;
				else
					$results[$r->booked_date] = $r->rooms_booked;
				}

			//sort results by year ascending
			ksort($results);
			
			//X-axis labels and Y-axis data
			for ($i = 1; $i <= $days_in_month; $i++)
				{
				$labels[] = $i;
				
				if (isset($results[$i]))
					$data[] = $results[$i];
				else
					$data[] = 0;
				}
			
			//chart x axis labels
			$chart->labels = $labels;

			//generate the dataset color
			$a = mt_rand(0, 255);
			$b = mt_rand(0, 255);
			$c = mt_rand(0, 255);
			
			//set dataset details
			$chart->datasets[0] = array(
										 'label' => date("F").' '.date("Y"), 
										 'data' => $data,
										 'fillColor' => "rgba(".$a.",".$b.",".$c.",0.5)",
										 'strokeColor' => "rgba(".$a.",".$b.",".$c.",1)",
										 'pointColor' => "rgba(".$a.",".$b.",".$c.",1)",
										 'pointStrokeColor' => "#fff",
										 'pointHighlightFill' => "#fff",
										 'pointHighlightStroke' => "rgba(".$a.",".$b.",".$c.",1)"
										 );
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
