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
defined( '_JOMRES_INITCHECK' ) or die( 'Direct Access to this file is not allowed.' );
// ################################################################

class j21400channelmanagement_framework_import_property_details
	{
	function __construct($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		
		$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
		$jrConfig=$siteConfig->get();
		
		if (!isset($jrConfig['automatically_approve_new_properties'])) {
			$jrConfig['automatically_approve_new_properties']=1;
		}

        $thisJRUser									= jomres_singleton_abstract::getInstance( 'jr_user' );

		$approved = 0;
		if ($jrConfig['automatically_approve_new_properties'] =="1")
			$approved=1;

		$manager_data = jomres_cmsspecific_getCMS_users_frontend_userdetails_by_id($thisJRUser->id);

/* 		// First, we need to create the property
		$query="INSERT INTO #__jomres_propertys (`property_name`,`apikey`,`property_email`,`approved` , `ptype_id`)
			VALUES
			(
			'".filter_var( $property->Name, FILTER_SANITIZE_SPECIAL_CHARS )."',
			'".$property->ID."',
			'".$manager_data[$thisJRUser->id]['email']."' , 
			'".$approved."' ,
									'1'
									)";
		$property_id=doInsertSql($query,jr_gettext('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING','CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING',FALSE));
		
		$channelmanagement_framework_singleton = jomres_singleton_abstract::getInstance('channelmanagement_framework_singleton'); 
		$response = $channelmanagement_framework_singleton->rest_api_communicate( $channel , 'GET' , 'cmf/properties/' , array () );
		return $response->data->response;
		
		
		$thisJRUser->authorisedProperties[]=$property_uid;
		updateManagerIdToPropertyXrefTable($thisJRUser->id,$thisJRUser->authorisedProperties );
		$query = "UPDATE #__jomres_managers SET `currentproperty`='".(int)$property_uid."' WHERE userid = '" . (int) $thisJRUser->id . "'";
		doInsertSql( $query, false ) ;
            */
		}

	
	function rollback( $property )
	{
		// Send the property id and the thisJRUser object
		// j06002delete_property
		
	}
	
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return $this->retVals;
		}
	}

	/*
	object(stdClass)#776 (8) {
  ["property_details"]=>
  array(16) {
    ["property_id"]=>
    string(7) "2174511"
    ["remote_ptype_id"]=>
    string(2) "20"
    ["local_ptype_id"]=>
    int(1)
    ["name"]=>
    string(13) "Test property"
    ["user"]=>
    object(jr_user)#419 (32) {
      ["jomres_manager_id"]=>
      string(1) "2"
      ["id"]=>
      string(2) "47"
      ["userid"]=>
      string(2) "47"
      ["username"]=>
      string(6) "jomres"
      ["accesslevel"]=>
      string(2) "90"
      ["currentproperty"]=>
      string(1) "1"
      ["last_active"]=>
      string(19) "1970-01-01 00:00:01"
      ["authorisedProperties"]=>
      array(24) {
        [0]=>
        string(1) "1"
        [1]=>
        string(1) "2"
        [2]=>
        string(1) "3"
        [3]=>
        string(1) "4"
        [4]=>
        string(1) "5"
        [5]=>
        string(1) "6"
        [6]=>
        string(1) "7"
        [7]=>
        string(1) "8"
        [8]=>
        string(1) "9"
        [9]=>
        string(2) "10"
        [10]=>
        string(2) "11"
        [11]=>
        string(2) "12"
        [12]=>
        string(2) "13"
        [13]=>
        string(2) "14"
        [14]=>
        string(2) "15"
        [15]=>
        string(2) "16"
        [16]=>
        string(2) "17"
        [17]=>
        string(2) "18"
        [18]=>
        string(2) "19"
        [19]=>
        string(2) "20"
        [20]=>
        string(2) "21"
        [21]=>
        string(2) "22"
        [22]=>
        string(2) "23"
        [23]=>
        string(2) "24"
      }
      ["userIsSuspended"]=>
      bool(false)
      ["userIsRegistered"]=>
      bool(true)
      ["userIsManager"]=>
      bool(true)
      ["superPropertyManager"]=>
      bool(true)
      ["profile_id"]=>
      string(1) "1"
      ["cms_user_id"]=>
      string(2) "47"
      ["firstname"]=>
      string(0) ""
      ["surname"]=>
      string(0) ""
      ["house"]=>
      string(0) ""
      ["street"]=>
      string(0) ""
      ["town"]=>
      string(0) ""
      ["region"]=>
      string(0) ""
      ["postcode"]=>
      string(0) ""
      ["country"]=>
      string(0) ""
      ["email"]=>
      string(0) ""
      ["tel_landline"]=>
      string(0) ""
      ["tel_mobile"]=>
      string(0) ""
      ["tel_fax"]=>
      string(0) ""
      ["vat_number"]=>
      string(0) ""
      ["vat_number_validated"]=>
      string(1) "0"
      ["vat_number_validation_response"]=>
      NULL
      ["params"]=>
      array(0) {
      }
      ["jomres_encryption"]=>
      NULL
      ["is_partner"]=>
      bool(false)
    }
    ["street"]=>
    string(7) "test 20"
    ["postcode"]=>
    string(5) "12345"
    ["email"]=>
    string(16) "vince@jomres.net"
    ["tel"]=>
    string(11) "01234567890"
    ["licensenumber"]=>
    string(5) "asdf "
    ["lat"]=>
    string(10) "38.7890109"
    ["long"]=>
    string(17) "0.166081299999973"
    ["image_urls"]=>
    array(3) {
      [0]=>
      string(77) "https://dwe6atvmvow8k.cloudfront.net/ru/426764/2174511/636910942847881503.jpg"
      [1]=>
      string(77) "https://dwe6atvmvow8k.cloudfront.net/ru/426764/2174511/636910942913662393.jpg"
      [2]=>
      string(77) "https://dwe6atvmvow8k.cloudfront.net/ru/426764/2174511/636910942953506136.jpg"
    }
    ["property_checkin_times"]=>
    string(38) "Check in 13:00 - 17:00 Check out 11:00"
    ["property_description"]=>
    string(163) "Composition: 15x bedroom, 15x bathroom, 20x WC
Amenities: bed linen & towels, terrace, heating, swimming pool

TEST PROPERTY Check in 13:00 - 17:00 Check out 11:00"
    ["max_guests"]=>
    string(2) "30"
  }
  ["settings"]=>
  array(1) {
    ["mrConfig"]=>
    array(2) {
      ["property_currencycode"]=>
      string(3) "EUR"
      ["singleRoomProperty"]=>
      int(0)
    }
  }
  ["deposits"]=>
  array(4) {
    ["remote_deposit_type_id"]=>
    string(1) "3"
    ["remote_deposit_value"]=>
    string(7) "10.0000"
    ["remote_security_deposit_type_id"]=>
    string(1) "3"
    ["remote_security_deposit_value"]=>
    string(7) "10.0000"
  }
  ["tariffs"]=>
  array(0) {
  }
  ["room_features"]=>
  array(0) {
  }
  ["property_features"]=>
  array(0) {
  }
  ["remote_room_features"]=>
  array(1) {
    [0]=>
    object(stdClass)#2074 (3) {
      ["name"]=>
      string(8) "Bathroom"
      ["jomres_id"]=>
      int(6)
      ["remote_item_id"]=>
      string(2) "81"
    }
  }
  ["remote_property_features"]=>
  array(2) {
    [0]=>
    object(stdClass)#649 (3) {
      ["name"]=>
      string(7) "Terrace"
      ["jomres_id"]=>
      int(7)
      ["remote_item_id"]=>
      string(3) "100"
    }
    [1]=>
    object(stdClass)#775 (3) {
      ["name"]=>
      string(13) "swimming pool"
      ["jomres_id"]=>
      int(58)
      ["remote_item_id"]=>
      string(3) "227"
    }
  }
}
*/