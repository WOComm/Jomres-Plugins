<?php
/**
* Jomres CMS Agnostic Plugin
* @author  John m_majma@yahoo.com
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2020 Vince Wooll
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

/*

Return the items for a given property type (e.g. property types) that currently exist in the system

*/

Flight::route('GET /cmf/properties/ids', function()
	{
    require_once("../framework.php");

	validate_scope::validate('channel_management');
	
	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error
	
	$query = "SELECT `property_uid` , `remote_property_uid` FROM #__jomres_channelmanagement_framework_property_uid_xref WHERE `cms_user_id` = ".(int)Flight::get('user_id')." AND `channel_id` = ".(int) Flight::get('channel_id')." ";

	$result = doSelectSql($query);

	$response = array();
	if (!empty($result)) {
		foreach ( $result as $r ) {
			$response[$r->property_uid] = array ( "local_property_uid" => $r->property_uid , "remote_property_uid" => $r->remote_property_uid ) ;
		}
	}

	// We now need a list of properties that have not been created by this channel, however they're marked in property configuration as channel security OFF. Those properties can be managed by channels that did not create the property (primarily used by jomres2jomres so that children can make changes on the parent property, e.g. adding bookings)

	// First we need to get a list of all properties for the manager, so we'll initialise the user, then get a list of their authorised properties
	$thisJRUser = jomres_singleton_abstract::getInstance('jr_user');
	$thisJRUser->init_user((int)Flight::get('user_id'));

	if ($thisJRUser->accesslevel < 50) { // Bugger ye off if you shouldn't be here
		return;
	}

	if ( !empty($thisJRUser->authorisedProperties)) { // Shouldn't happen, but...
		foreach ($thisJRUser->authorisedProperties as $property_uid ) {
			$mrConfig = getPropertySpecificSettings($property_uid);
			if ( isset($mrConfig['api_privacy_off']) && $mrConfig['api_privacy_off'] == 1 ) {
				if (!isset( $response[$property_uid]) ) {
					$response[$property_uid] = array ( "local_property_uid" => $property_uid , "remote_property_uid" => null ) ;
				}
			}
		}
	}




	Flight::json( $response_name = "response" , $response ); 
	});
	
	