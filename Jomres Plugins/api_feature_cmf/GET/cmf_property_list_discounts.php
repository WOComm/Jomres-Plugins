<?php
/**
* Jomres CMS Agnostic Plugin
* @author  Vince Wooll sales@jomres.net
* @version Jomres 9
* @package Jomres
* @copyright	2005-2020 Vince Wooll
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################


/*
	** Title | Get property blocks
	** Description | Get dates when the property is not available
*/


Flight::route('GET /cmf/property/list/discounts/@property_uid', function( $property_uid )
	{
    require_once("../framework.php");

	validate_scope::validate('channel_management');
	
	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error

	$property_uid			= (int)$property_uid;

	cmf_utilities::validate_property_uid_for_user($property_uid);
	
	cmf_utilities::cache_read($property_uid);
	
	$jomres_media_centre_images = jomres_singleton_abstract::getInstance( 'jomres_media_centre_images' );
	$jomres_media_centre_images->get_images($property_uid, array('extras'));
		
	$query="SELECT `uid`, `name`,`desc`,`price`,`auto_select`,`tax_rate`,`maxquantity`, DATE_FORMAT(`validfrom`, '%Y-%m-%d') AS validfrom,DATE_FORMAT(`validto`, '%Y-%m-%d') AS validto,`include_in_property_lists`,`limited_to_room_type` , `published` FROM `#__jomres_extras` WHERE `property_uid` = ".(int)$property_uid." ORDER BY `name` ";
	$exList =doSelectSql($query);

	$extras = array();
	if (!empty($exList)) {
		foreach ($exList as $ex) {
			
			$published=$ex->published;
			
			$query                = "SELECT `id` , `model` , `params` ,`force` FROM #__jomcomp_extrasmodels_models WHERE `extra_id` = " . (int) $ex->uid . " LIMIT 1 ";
			$model                = doSelectSql( $query , 2 );

			$extras[$ex->uid] = array (
				"id"							=> $ex->uid,
				"name"							=> $ex->name,
				"description"					=> $ex->desc,
				"price"							=> $ex->price,
				"auto_select"					=> $ex->auto_select,
				"tax_rate"						=> $ex->tax_rate,
				"maxquantity"					=> $ex->maxquantity,
				"validfrom"						=> $ex->validfrom,
				"validto"						=> $ex->validto,
				"include_in_property_lists"		=> $ex->include_in_property_lists,
				"limited_to_room_type"			=> $ex->limited_to_room_type,
				"published"						=> $ex->published,
				"model"							=> array ( $model )
				);
			
		}
	}
	
	cmf_utilities::cache_write( $property_uid , "response" , $extras );
	
	Flight::json( $response_name = "response" , $extras );
	});

