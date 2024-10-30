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

Flight::route('GET /cmf/properties/list/by/date', function()
	{
    require_once("../framework.php");

	validate_scope::validate('channel_management');
	
	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error
	
	$query = "SELECT `property_uid` , `remote_property_uid` FROM #__jomres_channelmanagement_framework_property_uid_xref WHERE `cms_user_id` = ".(int)Flight::get('user_id')." AND `channel_id` = ".(int) Flight::get('channel_id')." ";

	$result = doSelectSql($query);

	$properties = array();
	if (!empty($result)) {
		foreach ( $result as $r ) {
			$properties[ $r->property_uid ] = array ( "local_property_uid" => $r->property_uid , "remote_property_uid" => $r->remote_property_uid ) ;
		}
	} else {
		Flight::json( $response_name = "properties_by_date" , array() );
	}
	
	$property_uids = array();
	foreach ( $properties as $property ) {
		$property_uids[] = $property['local_property_uid'];
	}
	
	$query = "SELECT propertys_uid , timestamp , last_changed FROM #__jomres_propertys WHERE `propertys_uid` IN (".jomres_implode($property_uids).") ";
	$result = doSelectSql($query);
	
	foreach ($result as $p) {

		if (is_null($p->timestamp)) {
			$properties [$p->propertys_uid] ['timestamp'] = date ("Y-m-d H:i:s" , strtotime($p->last_changed));
		} else {
			$properties [$p->propertys_uid] ['timestamp'] = date ("Y-m-d H:i:s" ,  strtotime($p->timestamp) );
		}
		$properties [$p->propertys_uid] ['last_changed'] = date ("Y-m-d H:i:s" ,  strtotime($p->last_changed) );
	}
	
	$timestamp  = array_column($properties, 'timestamp');
	$last_changed = array_column($properties, 'last_changed');
	
	array_multisort($timestamp, SORT_ASC, $last_changed, SORT_ASC, $properties);

	Flight::json( $response_name = "response" , $properties ); 
	});
	
	