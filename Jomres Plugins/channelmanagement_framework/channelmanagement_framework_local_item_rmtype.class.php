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


class channelmanagement_framework_local_item_rmtype
{
	
	function __construct()
	{
		
	}
	
	function get_local_items()
	{
		$jomres_room_types = jomres_singleton_abstract::getInstance('jomres_room_types');
		$jomres_room_types->get_all_room_types(true);
		
		$response = new stdClass();
		$response->items = array();
		foreach ($jomres_room_types->room_types as $rmtype) {

			$response->items[$rmtype['room_classes_uid']] = $rmtype['room_class_abbv'];
		}

		return $response;
	}
}
