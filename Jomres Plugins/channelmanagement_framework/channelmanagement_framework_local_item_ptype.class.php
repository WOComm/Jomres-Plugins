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


class channelmanagement_framework_local_item_ptype
{
	
	function __construct()
	{
		
	}
	
	function get_local_items()
	{
		$jomres_property_types = jomres_singleton_abstract::getInstance('jomres_property_types');
		$jomres_property_types->get_all_property_types();
		
		$response = new stdClass();
		$response->items = array();
		foreach ($jomres_property_types->property_types as $ptype) {
			$response->items[$ptype['id']] = $ptype['ptype'];
		}

		return $response;
	}
}
