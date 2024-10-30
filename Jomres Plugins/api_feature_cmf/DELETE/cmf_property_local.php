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


/**
*
* Delete a property based on the remote property uid
*
*/

Flight::route('DELETE /cmf/property/local/@id', function($property_uid)
	{
    require_once("../framework.php");
	
	validate_scope::validate('channel_management');
	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error
	
	cmf_utilities::validate_property_uid_for_user($property_uid);
	
 	if ( $property_uid > 0 ) {
	
		$thisJRUser = jomres_singleton_abstract::getInstance('jr_user');
		$thisJRUser->init_user(Flight::get('user_id'));
		

		// There's no need to check the cross reference of the user against the property uid, the previous query does that.
		try {
			$MiniComponents = jomres_getSingleton('mcHandler');
			$MiniComponents->specificEvent('06002', 'delete_property', array( "sure" => true , "property_uid" => $property_uid , "thisJRUser" => $thisJRUser  ));
		}
		catch (Exception $e) {
			logging::log_message('Failed to delete property, response message '.$e->getMessage(), 'CMF', 'WARNING');
		}

		$query = "DELETE FROM #__jomres_channelmanagement_framework_property_uid_xref WHERE `cms_user_id` = ".(int)Flight::get('user_id')." AND `channel_id` = ".(int) Flight::get('channel_id')." AND `property_uid` = ".(int) $property_uid;

		$success = doInsertSql($query);

		if ($success >  0) {
			$response = true;
		} else {
			$response = false;
		}

		$query = "DELETE FROM #__jomres_channelmanagement_framework_changelog_queue_items WHERE `property_uid` = ".(int) $property_uid;
		doInsertSql($query);

		$query = "DELETE FROM #__jomres_channelmanagement_framework_bookings_xref WHERE `property_uid` =". (int) $property_uid;
		doInsertSql($query);

        $query = "DELETE FROM #__jomres_channelmanagement_framework_rooms_xref WHERE `property_uid` =". (int) $property_uid;
        doInsertSql($query);
	} else {
		$response = false;
	}
	
	Flight::json( $response_name = "response" ,$response );
	});