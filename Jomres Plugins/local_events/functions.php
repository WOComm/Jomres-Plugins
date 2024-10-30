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
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################


function find_items_within_range_for_property_uid($item_type = "local_events", $property_uid = 0, $radius = 25)
	{
	if ($property_uid == 0)
		return array();
	
	$current_property_details =jomres_singleton_abstract::getInstance('basic_property_details');
	$current_property_details->gather_data($property_uid);
	
	if ($item_type == "local_events")
		{
		$table = "#__jomres_local_events";
		$date_cols = "`start_date`,`end_date`,";
		$icon = "";
		}
	else
		{
		$table = "#__jomres_local_attractions";
		$date_cols = "";
		$icon = "`icon`,";
		}
	
	if (isset($current_property_details->lat) && isset($current_property_details->long) )
		{
		$query ="SELECT `id`,`title`,".$icon."`website_url`,`event_logo`,`description`, ".$date_cols." ( ((ACOS(SIN(".$current_property_details->lat." * PI() / 180) * SIN(`latitude` * PI() / 180) + COS(".$current_property_details->lat." * PI() / 180) * COS(`latitude` * PI() / 180) * COS((".$current_property_details->long." - `longitude`) * PI() / 180)) * 180 / PI()) * 60 * 1.1515) * 1.609344 ) AS distance FROM ".$table." HAVING distance<='".$radius."' ORDER BY distance ASC";
		$result = doSelectSql($query);
		
		if ($item_type == "local_events" && !empty($result))
			{
			$today = date("Y-m-d");
			foreach ($result as $key=>$val)
				{
				if ($val->end_date < $today)
					{
					unset($result[$key]);
					}
				}
			}
		}
	else
		$result = array();
	
	return $result;
	}
