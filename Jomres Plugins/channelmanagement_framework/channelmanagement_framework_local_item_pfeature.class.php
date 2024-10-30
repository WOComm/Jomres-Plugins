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


class channelmanagement_framework_local_item_pfeature
{
	
	function __construct()
	{
		
	}
	
	function get_local_items()
	{
		$jomres_property_features = jomres_singleton_abstract::getInstance('jomres_property_features');
		$jomres_property_features->get_all_property_features();

		$response = new stdClass();
		$response->items = array();
		foreach ($jomres_property_features->property_features as $pfeature) {
			$response->items[$pfeature['id']] = $pfeature['abbv'];
		}

		return $response;
	}
}
