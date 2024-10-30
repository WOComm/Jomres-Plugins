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

Confirm that settings to be passed are valid mrConfig indecies

*/

Flight::route('PUT /cmf/property/extra', function()
	{
	require_once("../framework.php");

	validate_scope::validate('channel_management');
	
	$_PUT = $GLOBALS['PUT']; // PHP doesn't allow us to use $_PUT like a super global, however the put_method_handling.php script will parse form data and put it into PUT, which we can then use. This allows us to use PUT for updating records (as opposed to POST which is, in REST APIs used for record creation). This lets us maintain a consistent syntax throughout the REST API.

	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error

	$property_uid			= (int)$_PUT['property_uid'];

	cmf_utilities::validate_property_uid_for_user($property_uid);

	$extra_id					= (int)$_PUT['extra_id'];
	$name						= filter_var($_PUT['name'], FILTER_SANITIZE_SPECIAL_CHARS) ;
	$description				= filter_var($_PUT['description'], FILTER_SANITIZE_SPECIAL_CHARS) ;
	$price						= convert_entered_price_into_safe_float($_PUT['price']);
	$auto_select				= (int)(bool)$_PUT['auto_select'];
	$tax_rate					= (int)$_PUT['tax_rate'];
	$maxquantity				= (int)$_PUT['maxquantity'];
	$validfrom					= $_PUT['validfrom'];
	$validto					= $_PUT['validto'];
	$include_in_property_lists	= (int)(bool)$_PUT['include_in_property_lists'];
	$limited_to_room_type		= (int)$_PUT['limited_to_room_type'];
	$published					= (int)(bool)$_PUT['published'];
	$model_model				= (int)$_PUT['model_model'];
	$model_params				= (int)$_PUT['model_params'];
	$model_force				= (int)(bool)$_PUT['model_force'];

	$extra_models = array(
		"1" => jr_gettext('_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERWEEK','_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERWEEK',false),
		"2" => jr_gettext('_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERDAYS','_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERDAYS',false),
		"3" => jr_gettext('_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERBOOKING','_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERBOOKING',false),
		"4" => jr_gettext('_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERPERSONPERBOOKING','_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERPERSONPERBOOKING',false),
		"5" => jr_gettext('_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERPERSONPERDAY','_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERPERSONPERDAY',false),
		"6" => jr_gettext('_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERPERSONPERWEEK','_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERPERSONPERWEEK',false),
		"7" => jr_gettext('_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERDAYSMINDAYS','_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERDAYSMINDAYS',false),
		"8" => jr_gettext('_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERDAYSMINDAYS','_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERDAYSMINDAYS',false),
		"9" => jr_gettext('_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERDAYSPERROOM','_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERDAYSPERROOM',false),
		"10" => jr_gettext('_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERROOMPERBOOKING','_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERROOMPERBOOKING',false),
		"100" => jr_gettext('_JOMRES_COMMISSION','_JOMRES_COMMISSION',false)
	);
	
	if( !array_key_exists($model_model , $extra_models ) ) {
		Flight::halt(204, "Extra model is not valid");
	}
	
	if (!cmf_utilities::validate_date($validfrom)){
		Flight::halt(204, "Valid from date incorrect, must be in Y-m-d format");
	}
	
	if (!cmf_utilities::validate_date($validto)){
		Flight::halt(204, "Valid from date incorrect, must be in Y-m-d format");
	}

	if ($model_model != 7 ) {
		$model_params = 1;
	}
	
	if ($maxquantity < 1 || $maxquantity > 1000) {  // Come on children, be serious.
		$maxquantity = 1;
	}
	
	/* $jrportal_taxrate = jomres_singleton_abstract::getInstance( 'jrportal_taxrate' );
	if (!isset($jrportal_taxrate->taxrates[$tax_rate])) {
		Flight::halt(204, "Tax rate is not valid");
	} */

		if ($extra_id == 0 ) {
			$query="INSERT INTO #__jomres_extras (
				`name`,
				`desc`,
				`price`,
				`auto_select`,
				`tax_rate`,
				`maxquantity`,
				`published`,
				`property_uid`,
				`validfrom`,
				`validto` , 
				`include_in_property_lists` ,
				`limited_to_room_type` 
				)
				VALUES
				(
				'".$name."',
				'".$description."',
				 ".$price.",
				 ".$auto_select.",
				 ".$tax_rate.", 
				 ".$maxquantity.",
				 ".$published.",
				 ".$property_uid.",
				'".$validfrom." 00:00:00' ,
				'".$validto." 00:00:00' , 
				".$include_in_property_lists." , 
				".$limited_to_room_type." 
				)";
			$uid=doInsertSql($query);

			if ($uid == false || $uid == 0 ) {
				Flight::halt(204, "Failed to add extra");
			}

			$query="INSERT INTO #__jomcomp_extrasmodels_models ( `extra_id` , `model` , `params` , `force` , `property_uid` ) VALUES ( ".$uid.", ".$model_model." ,".$model_params.", ".$model_force.", ".$property_uid." )";

			doInsertSql($query);
		} else {
			$query="UPDATE #__jomres_extras SET
				`name` = '".$name."',
				`desc` = '".$description."',
				`price` =  ".$price.",
				`auto_select` = ".$auto_select.",
				`tax_rate` = ".$tax_rate.",
				`maxquantity` =  ".$maxquantity.",
				`published` =  ".$published.",
				`property_uid` = ".$property_uid.",
				`validfrom` = '".$validfrom." 00:00:00' ,
				`validto` = '".$validto." 00:00:00', 
				`include_in_property_lists` = ".$include_in_property_lists.",
				`limited_to_room_type` = ".$limited_to_room_type."
				
				WHERE uid = ".$extra_id;

			doInsertSql($query);

			$query = "UPDATE #__jomcomp_extrasmodels_models SET 
				`model` = ".$model_model." ,
				`params` = ".$model_params.",
				`force` = ".$model_force."
				WHERE `extra_id` = ".$extra_id;

			doInsertSql($query);
			$uid = $extra_id;
		}

	$webhook_notification								= new stdClass();
	$webhook_notification->webhook_event				= 'extra_saved';
	$webhook_notification->webhook_event_description	= 'Logs when optional extras added/updated.';
	$webhook_notification->webhook_event_plugin			= 'optional_extras';
	$webhook_notification->data							= new stdClass();
	$webhook_notification->data->property_uid			= $property_uid;
	$webhook_notification->data->extras_uid				= $uid;
	add_webhook_notification($webhook_notification);
	
	Flight::json( $response_name = "response" , array ( "extra_id" => $uid ) ); 
	});
	
	