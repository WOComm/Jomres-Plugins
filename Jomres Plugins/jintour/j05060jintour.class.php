<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2015 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( 'Direct Access to this file is not allowed.' );
// ################################################################

class j05060jintour {
	function __construct($componentArgs)
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		
		$this->retVal = array();
		
		if (get_showtime('is_jintour_property'))
			{
			$this->retVal['plugin_manages_fully_booked_dates']=true;
			
			$bkg = $componentArgs;

			if (is_object($bkg))
				{
				$start = date("Y/m/d");
				$end= date("Y/m/d",strtotime("+4 years"));
				$dates= $bkg->findDateRangeForDates($start,$end);
				$property_uid = $bkg->property_uid;
				}
			else
				{
				$property_uid = get_showtime("property_uid");
				$start = date("Y/m/d");
				$end= date("Y/m/d",strtotime("+4 years"));
				
				    $dates = array();
				$current = strtotime($start);
				$last = strtotime($end);
				while( $current <= $last ) 
					{ 
					$dates[] = date("Y/m/d", $current);
					$current = strtotime("1 day", $current);
					}
				}
			
			$all_tours = jintour_get_all_tours($property_uid );
			$tour_dates=array();
			foreach ($all_tours as $tour)
				{
				$cnv = str_replace("-","/",$tour['tourdate']);
				$tour_dates[]=$cnv;
				}
			
			$count = count($dates);
			
			for ($i=0;$i<=$count;$i++)
				{
				if (isset($dates[$i]))
					{
					$date=$dates[$i];
					if (in_array($date,$tour_dates))
						unset($dates[$i]);
					}
				}
			$this->retVal['fully_booked_dates']=$dates;
			unset($dates);
			}
		}

	function getRetVals()
		{
		return $this->retVal;
		}
	}
