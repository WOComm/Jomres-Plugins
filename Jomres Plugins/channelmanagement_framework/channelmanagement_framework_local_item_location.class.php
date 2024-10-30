<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2020 Vince Wooll
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

// Not currently used 

class channelmanagement_framework_local_item_location
{
	
	function __construct()
	{
		
	}
	
	function get_local_items()
	{
		$basic_property_details = jomres_singleton_abstract::getInstance( 'basic_property_details' );
		$basic_property_details->get_all_resource_features( 0 );

		$response = new stdClass();
		$response->items = array();
		foreach ($basic_property_details->all_room_features as $f) {
			$response->items[$f['room_features_uid']] = $f['feature_description'];
		}

		return $response;
	}
}
