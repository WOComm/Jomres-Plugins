<?php
/**
 * Core file
 *
 * @author  
 * @version Jomres 9
 * @package Jomres
 * @copyright	2005-2016 
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly.
 **/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

/*
	** Title | Add micromanage tariff
	** Description | Creates a micromanage tariff
	** Plugin | api_feature_tariffs
	** Scope | properties_set
	** URL | tariffs
 	** Method | POST
	** URL Parameters | 
	** Data Parameters | 
	** Success Response |{"data":{"tarifftypeid":521},"meta":{"code":200}}
	** Error Response | "Tariff save method not valid for this property"
	** Sample call |    curl --request POST \
  --url http://localhost/joomla_portal/jomres/api/tariffs/32/add/micromanage \
  --header 'authorization: Bearer c33e4d8ac810280c084194ef65cd74cc736712cc' \
  --header 'content-type: multipart/form-data; boundary=---011000010111000001101001' \
  --form tarifftypeid=0 \
  --form rate_title=test \
  --form rate_description=testty \
  --form maxdays=365 \
  --form minpeople=2 \
  --form maxpeople=2 \
  --form roomclass_uid=1 \
  --form dayofweek=7 \
  --form ignore_pppn=0 \
  --form allow_we=1 \
  --form weekendonly=0 \
  --form minrooms_alreadyselected=0 \
  --form maxrooms_alreadyselected=100 \
  --form 'tariffinput[1491004800]=55' \
  --form 'tariffinput[1491091200]=55' \
  --form 'mindaysinput[1491004800]=1' \
  --form 'mindaysinput[1491091200]=1'
	** Notes |  If you receive the "Tariff save method not valid for this property" response, then the property is configured to save tariffs in either Normal or Advanced editing mode.
    
    When guests book, they select a combination of room ( or room type ) and tariff. This allows us to have multiple tariffs for the same room type, and is extremely flexible.
    These settings determine if a tariff is valid to be shown in the booking form once the dates and guest numbers ( if guest types have been created ) have been selected.
    
    maxdays Maximum days of the visit
    minpeople Minimum number of people for this tariff to be valid.
    maxpeople Maximum number of people for this tariff to be valid.
    roomclass_uid The id of the room type that this tariff is for.
    dayofweek Checking day of week allowed. If the booking starts on N day of the week, then this tariff is valid to be offered. 0 : Sunday 1 : Monday 2 : Tuesday : 3 Wednesday : 4 Thursday : 5 Friday : 6 Saturday : 7 Any day of week.
    ignoreppn Properties can be configured to charge per person per night by default. This setting (1 or 0 ) allows certain tariffs to be priced at a flat rate instead of per person per night.
    allow_we Allow bookings that span weekend days. For example, a tariff that has this option set to No (zero) would be a maximum of 5 nights long if the checkin date was a Monday. This allows you to have midweek only tariffs.
    minrooms_alreadyselected
    maxrooms_alreadyselected These two settings allow you to create room/tariff combinations that are only offered if the guest has already selected another room in the booking form. Most of the time you would leave these at the defaults of 0 & 100.
	
    tariffinput[epoch] Prices for each date.
    dates_mindays[epoch] Minimum days stay for each date.

*/

Flight::route('POST /tariffs/@id/micromanage', function($property_uid) 

	{
	validate_scope::validate('properties_set');
	validate_property_access::validate($property_uid);

    $property_uid = (int)$property_uid;
    
	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
	require_once("../framework.php");
    
	$mrConfig = getPropertySpecificSettings($property_uid);
	
	if ($mrConfig['tariffmode'] != '2' || $mrConfig[ 'is_real_estate_listing' ] == '1' || get_showtime('is_jintour_property')) {
        Flight::halt(204, "Tariff save method not valid for this property");
    }

    jr_import('jrportal_rates');
	$jrportal_rates = new jrportal_rates();
	$jrportal_rates->property_uid = $property_uid;

	// $jrportal_rates->tarifftype_id  			= (int)jomresGetParam( $_POST, 'tarifftypeid', 0 );
    $jrportal_rates->tarifftype_id  			= 0;
	$jrportal_rates->rate_title 				= jomresGetParam( $_POST, 'rate_title', $jrportal_rates->rates_defaults['rate_title'] );
	$jrportal_rates->rate_description 			= jomresGetParam( $_POST, 'rate_description', $jrportal_rates->rates_defaults['rate_description'] );
	$jrportal_rates->maxdays 					= (int)jomresGetParam( $_POST, 'maxdays', $jrportal_rates->rates_defaults['maxdays'] );
	$jrportal_rates->minpeople 					= (int)jomresGetParam( $_POST, 'minpeople', $jrportal_rates->rates_defaults['minpeople'] );
	$jrportal_rates->maxpeople 					= (int)jomresGetParam( $_POST, 'maxpeople', $jrportal_rates->rates_defaults['maxpeople'] );
	$jrportal_rates->roomclass_uid 				= (int)jomresGetParam( $_POST, 'roomclass_uid', $jrportal_rates->rates_defaults['roomclass_uid'] );
	$jrportal_rates->dayofweek 					= (int)jomresGetParam( $_POST, 'dayofweek', $jrportal_rates->rates_defaults['dayofweek'] );
	$jrportal_rates->ignore_pppn 				= (int)jomresGetParam( $_POST, 'ignore_pppn', $jrportal_rates->rates_defaults['ignore_pppn'] );
	$jrportal_rates->allow_we 					= (int)jomresGetParam( $_POST, 'allow_we', $jrportal_rates->rates_defaults['allow_we'] );
	$jrportal_rates->weekendonly 				= (int)jomresGetParam( $_POST, 'weekendonly', $jrportal_rates->rates_defaults['weekendonly'] );
	$jrportal_rates->minrooms_alreadyselected 	= (int)jomresGetParam( $_POST, 'minrooms_alreadyselected', $jrportal_rates->rates_defaults['minrooms_alreadyselected'] );
	$jrportal_rates->maxrooms_alreadyselected 	= (int)jomresGetParam( $_POST, 'maxrooms_alreadyselected', $jrportal_rates->rates_defaults['maxrooms_alreadyselected'] );

	//tariffs and min days, not sanitized yet. The rates class will do this
	//TODO find a better way
	$jrportal_rates->dates_rates				= $_POST['tariffinput'];
	$jrportal_rates->dates_mindays				= $_POST['mindaysinput'];
    
	//save tariff
	$jrportal_rates->save_rate();

	Flight::json( $response_name = "tarifftypeid" ,$jrportal_rates->tarifftype_id);
	});	


/*
	** Title | Add advanced tariff
	** Description | Creates an advanced tariff
	** Plugin | api_feature_tariffs
	** Scope | properties_set
	** URL | tariffs
 	** Method | POST
	** URL Parameters | 
	** Data Parameters | 
	** Success Response |{
  "data": {
    "tarifftypeid": 524
  },
  "meta": {
    "code": 200
  }
}
	** Error Response | "Tariff save method not valid for this property"
	** Sample call | curl --request POST \
  --url http://localhost/joomla_portal/jomres/api/tariffs/32/add/advanced/ \
  --header 'authorization: Bearer 0ededb43cd16f2698da2b5b540d601ec1a3d013a' \
  --header 'content-type: application/x-www-form-urlencoded' \
  --data 'tarifftypeid=0&rate_title=test&rate_description=testty&maxdays=365&minpeople=2&maxpeople=2&roomclass_uid=1&dayofweek=7&ignore_pppn=0&allow_we=1&weekendonly=0&minrooms_alreadyselected=0&maxrooms_alreadyselected=100&validfrom=2017%2F05%2F01&validto=2017%2F05%2F31&mindays=1&roomrateperday=70'

	** Notes |  If you receive the "Tariff save method not valid for this property" response, then the property is configured to save tariffs in either Normal or Micromanage editing mode.
    
    When guests book, they select a combination of room ( or room type ) and tariff. This allows us to have multiple tariffs for the same room type, and is extremely flexible.
    These settings determine if a tariff is valid to be shown in the booking form once the dates and guest numbers ( if guest types have been created ) have been selected.
    
    validfrom The date from which the tariff will be valid ( Y/m/d, eg 2017/04/30 )
    validto The date to which the tariff will be valid ( Y/m/d, eg 2018/04/30 )
    mindays Minimum days of the visit
    maxdays Maximum days of the visit
    minpeople Minimum number of people for this tariff to be valid.
    maxpeople Maximum number of people for this tariff to be valid.
    roomclass_uid The id of the room type that this tariff is for.
    dayofweek Checking day of week allowed. If the booking starts on N day of the week, then this tariff is valid to be offered. 0 : Sunday 1 : Monday 2 : Tuesday : 3 Wednesday : 4 Thursday : 5 Friday : 6 Saturday : 7 Any day of week.
    ignoreppn Properties can be configured to charge per person per night by default. This setting (1 or 0 ) allows certain tariffs to be priced at a flat rate instead of per person per night.
    allow_we Allow bookings that span weekend days. For example, a tariff that has this option set to No (zero) would be a maximum of 5 nights long if the checkin date was a Monday. This allows you to have midweek only tariffs.
    minrooms_alreadyselected
    maxrooms_alreadyselected These two settings allow you to create room/tariff combinations that are only offered if the guest has already selected another room in the booking form. Most of the time you would leave these at the defaults of 0 & 100.

    roomrateperday The price of the room between the validfrom and validto dates.

    Take care when creating Advanced tariffs, each set of tariffs valid from and to dates should be contiguous.
*/

/* Flight::route('POST /tariffs/@id/add/advanced', function($property_uid) 
	{
	validate_scope::validate('properties_set');
	validate_property_access::validate($property_uid);

    $property_uid = (int)$property_uid;
   
	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
	require_once("../framework.php");
    
	$mrConfig = getPropertySpecificSettings($property_uid);
	
	if ($mrConfig['tariffmode'] != '1' || $mrConfig[ 'is_real_estate_listing' ] == '1' || get_showtime('is_jintour_property')) {
        Flight::halt(204, "Tariff save method not valid for this property");
    }

    jr_import('jrportal_rates');
	$jrportal_rates = new jrportal_rates();
	$jrportal_rates->property_uid = $property_uid;
		
	// $jrportal_rates->tarifftype_id 				= (int)jomresGetParam( $_POST, 'tarifftypeid', 0 );
    $jrportal_rates->tarifftype_id 				= 0;
	//$jrportal_rates->rates_uid 					= (int)jomresGetParam( $_POST, 'rates_uid', 0 );
	$jrportal_rates->rates_uid 					= 0;
	$jrportal_rates->rate_title 				= jomresGetParam( $_POST, 'rate_title', $jrportal_rates->rates_defaults['rate_title'] );
	$jrportal_rates->rate_description 			= jomresGetParam( $_POST, 'rate_description', $jrportal_rates->rates_defaults['rate_description'] );
	$jrportal_rates->validfrom 					= jomresGetParam( $_POST, 'validfrom',"" );
	$jrportal_rates->validto 					= jomresGetParam( $_POST, 'validto', "" );
	$jrportal_rates->mindays 					= (int)jomresGetParam( $_POST, 'mindays', $jrportal_rates->rates_defaults['mindays'] );
	$jrportal_rates->maxdays 					= (int)jomresGetParam( $_POST, 'maxdays', $jrportal_rates->rates_defaults['maxdays'] );
	$jrportal_rates->minpeople 					= (int)jomresGetParam( $_POST, 'minpeople', $jrportal_rates->rates_defaults['minpeople'] );
	$jrportal_rates->maxpeople 					= (int)jomresGetParam( $_POST, 'maxpeople', $jrportal_rates->rates_defaults['maxpeople'] );
	$jrportal_rates->roomclass_uid 				= (int)jomresGetParam( $_POST, 'roomclass_uid', $jrportal_rates->rates_defaults['roomclass_uid'] );
	$jrportal_rates->dayofweek 					= (int)jomresGetParam( $_POST, 'dayofweek', $jrportal_rates->rates_defaults['dayofweek'] );
	$jrportal_rates->ignore_pppn 				= (int)jomresGetParam( $_POST, 'ignore_pppn', $jrportal_rates->rates_defaults['ignore_pppn'] );
	$jrportal_rates->allow_we 					= (int)jomresGetParam( $_POST, 'allow_we', $jrportal_rates->rates_defaults['allow_we'] );
	$jrportal_rates->weekendonly 				= (int)jomresGetParam( $_POST, 'weekendonly', $jrportal_rates->rates_defaults['weekendonly'] );
	$jrportal_rates->minrooms_alreadyselected 	= (int)jomresGetParam( $_POST, 'minrooms_alreadyselected', $jrportal_rates->rates_defaults['minrooms_alreadyselected'] );
	$jrportal_rates->maxrooms_alreadyselected 	= (int)jomresGetParam( $_POST, 'maxrooms_alreadyselected', $jrportal_rates->rates_defaults['maxrooms_alreadyselected'] );
	
	$roomrateperday 							= jomresGetParam( $_POST, 'roomrateperday', $jrportal_rates->rates_defaults['roomrateperday'] );
	$jrportal_rates->roomrateperday 			= convert_entered_price_into_safe_float($roomrateperday);
		
	//save tariff
	//we do this only for advanced and normal tariff editing modes, micromanage uses save_rate()
	$jrportal_rates->save_rate_legacy();

	Flight::json( $response_name = "tarifftypeid" ,$jrportal_rates->tarifftype_id);
	}); */

    

/*
	** Title | Add normal tariff (mrp)
	** Description | Creates a normal tariff (mrp)
	** Plugin | api_feature_tariffs
	** Scope | properties_set
	** URL | tariffs
 	** Method | POST
	** URL Parameters | 
	** Data Parameters | 
	** Success Response |{
  "data": {
    "tarifftypeid": 524
  },
  "meta": {
    "code": 200
  }
}
	** Error Response | "Tariff save method not valid for this property"
	** Sample call | curl -X POST \
  http://localhost/joomla_portal/jomres/api/tariffs/7/add/normal/mrp \
  -H 'authorization: Bearer a512ac36ce23596ba8a484834b2fc99f5fb27121' \
  -H 'cache-control: no-cache' \
  -H 'content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW' \
  -H 'postman-token: 3a325288-02e2-8f40-85eb-1c58f716067c' \
  -F 'number_of_rooms[11]=4' \
  -F 'number_of_rooms[12]=5' \
  -F 'number_of_rooms[13]=0' \
  -F 'number_of_rooms[14]=0' \
  -F 'number_of_rooms[15]=0' \
  -F 'number_of_rooms[21]=0' \
  -F 'existing_room_uids[11]=31,32' \
  -F 'existing_room_uids[12]=33,34,294,295,298,299,300,301,302,303,304,305' \
  -F 'existing_room_uids[13]=' \
  -F 'existing_room_uids[14]=' \
  -F 'existing_room_uids[15]=' \
  -F 'existing_room_uids[21]=' \
  -F 'rates_uid[11]=15' \
  -F 'rates_uid[12]=16' \
  -F 'rates_uid[13]=0' \
  -F 'rates_uid[14]=0' \
  -F 'rates_uid[15]=0' \
  -F 'rates_uid[21]=0' \
  -F 'tarifftype_id[11]=525' \
  -F 'tarifftype_id[12]=526' \
  -F 'tarifftype_id[13]=0' \
  -F 'tarifftype_id[14]=0' \
  -F 'tarifftype_id[15]=0' \
  -F 'tarifftype_id[21]=0' \
  -F 'roomrateperday[11]=20' \
  -F 'roomrateperday[12]=55' \
  -F 'roomrateperday[13]=0' \
  -F 'roomrateperday[14]=0' \
  -F 'roomrateperday[15]=0' \
  -F 'roomrateperday[12]=0' \
  -F 'max_people[11]=1' \
  -F 'max_people[12]=2' \
  -F 'max_people[13]=1' \
  -F 'max_people[14]=1' \
  -F 'max_people[15]=1' \
  -F 'max_people[21]=1' \
  -F 'maxpeople_tariff[11]=6' \
  -F 'maxpeople_tariff[12]=6' \
  -F 'maxpeople_tariff[13]=1' \
  -F 'maxpeople_tariff[14]=1' \
  -F 'maxpeople_tariff[15]=1' \
  -F 'maxpeople_tariff[21]=1'
  
	** Notes |  


Flight::route('POST /tariffs/@id/add/normal/mrp', function($property_uid)
	{
	validate_scope::validate('properties_set');
	validate_property_access::validate($property_uid);

    $property_uid = (int)$property_uid;
 
	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
	require_once("../framework.php");
    
	$mrConfig = getPropertySpecificSettings($property_uid);
	
	if ($mrConfig['tariffmode'] != '0' || $mrConfig[ 'is_real_estate_listing' ] == '1' || get_showtime('is_jintour_property')) {
        Flight::halt(204, "Tariff save method not valid for this property");
    }

	if ($mrConfig[ 'singleRoomProperty' ] == '1') {
        Flight::halt(204, "Wrong endpoint called, this property is an SRP.");
    }
    


    $basic_property_details = jomres_singleton_abstract::getInstance('basic_property_details');
    $basic_property_details->gather_data($property_uid);
        
	//rooms object
	jr_import('jrportal_rooms');
	$jrportal_rooms = new jrportal_rooms();
	$jrportal_rooms->propertys_uid = $property_uid;
		
	//rates object
	jr_import('jrportal_rates');
    
	$posted_number_of_rooms 	= jomresGetParam($_POST, 'number_of_rooms', array());
	$posted_existing_room_uids 	= jomresGetParam($_POST, 'existing_room_uids', array());
	$posted_rates_uid 			= jomresGetParam($_POST, 'rates_uid', array());
	$posted_tarifftype_id 		= jomresGetParam($_POST, 'tarifftype_id', array());
	$posted_roomrateperday 		= jomresGetParam($_POST, 'roomrateperday', array());
	$posted_max_people 			= jomresGetParam($_POST, 'max_people', array());
	$posted_maxpeople_tariff 	= jomresGetParam($_POST, 'maxpeople_tariff', array());
	
	$tarifftype_uids_respònse	= array();
	
	//we`ll go through each room types assigned to this property, no need to parse possible junk data sent in the POST
	foreach ($basic_property_details->this_property_room_classes as $k => $v) {
		$number_of_rooms = 0;
		$existing_room_uids = array();
		$existing_room_uids_count = 0;
		$rates_uid = 0;
		$tarifftype_id = 0;
		$roomrateperday = 0;
		$max_people = 1;
		$maxpeople_tariff = 1;
	
		//reset rates object
		$jrportal_rates = new jrportal_rates();
		$jrportal_rates->property_uid = $property_uid;
		 
		//number of rooms selected
		if (isset($posted_number_of_rooms[$k])) {
			$number_of_rooms = (int)$posted_number_of_rooms[$k];
		}
		
		//get existing room uids
		if (isset($posted_existing_room_uids[$k])) {
			$existing_rooms = $posted_existing_room_uids[$k];
			
			if ($existing_rooms != '') {
				$existing_room_uids = explode(',', $existing_rooms);
			}
			
			$existing_room_uids_count = count($existing_room_uids);
		}
				
		//rates_uid (each room type has just one rate uid in Normal and Advanced modes, only Micromanage can have more)
		if (isset($posted_rates_uid[$k])) {
			$rates_uid = (int)$posted_rates_uid[$k];
		}
		
		//tarifftype id
		if (isset($posted_tarifftype_id[$k])) {
			$tarifftype_id = (int)$posted_tarifftype_id[$k];
		}
							
		//roomrateperday
		if (isset($posted_roomrateperday[$k])) {
			$roomrateperday = convert_entered_price_into_safe_float($posted_roomrateperday[$k]);
		}
		
		//max people per room
		if (isset($posted_max_people[$k])) {
			$max_people = (int)$posted_max_people[$k];
		}
	
		//max peoople in tariff
		if (isset($posted_maxpeople_tariff[$k])) {
			$maxpeople_tariff = (int)$posted_maxpeople_tariff[$k];
		}

		if ($number_of_rooms > 0) {
			//update rooms (delete or create new ones if needed)
			if ($existing_room_uids_count > $number_of_rooms) {
				$number_of_rooms_to_delete = $existing_room_uids_count - $number_of_rooms;
				
				$i = 0;
				foreach ($existing_room_uids as $r_uid) {
					if ($i < $number_of_rooms_to_delete) {
						$jrportal_rooms->room_uid = $r_uid;
						
						if ($jrportal_rooms->delete_room()) {
							$i++;
						}
					}
				}
			} elseif ($existing_room_uids_count < $number_of_rooms) {
				$number_of_rooms_to_add = $number_of_rooms - $existing_room_uids_count;
				
				//mass create rooms
				if ($number_of_rooms_to_add > 0) {
					$jrportal_rooms->rooms_generator['propertys_uid'] = $property_uid;
					$jrportal_rooms->rooms_generator['number_of_rooms'] = $number_of_rooms_to_add;
					$jrportal_rooms->rooms_generator['room_classes_uid'] = $k;
					$jrportal_rooms->rooms_generator['max_people'] = $max_people;
					$jrportal_rooms->rooms_generator['delete_existing_rooms'] = false;
					
					$jrportal_rooms->commit_new_rooms();
				}
			}
					
			//rate details
			$jrportal_rates->tarifftype_id 	= $tarifftype_id;
			$jrportal_rates->rates_uid 		= $rates_uid;
			$jrportal_rates->roomclass_uid 	= $k;
			$jrportal_rates->maxpeople 		= $maxpeople_tariff;
			$jrportal_rates->roomrateperday = $roomrateperday;
			$jrportal_rates->validfrom 		= date("Y/m/d");
			$jrportal_rates->validto 		= date("Y/m/d", strtotime('+10 years'));

			$jrportal_rates->save_rate_legacy();
		} else { //we need to delete rooms and tariffs for this room type, because the user selected number of rooms to be 0
			$i = 0;
			
			//delete all rooms of this type if possible (if rooms don`t have any upcoming bookings)
			if ($existing_room_uids_count > 0) {
				foreach ($existing_room_uids as $r_uid) {
					$jrportal_rooms->room_uid = $r_uid;

					if ($jrportal_rooms->delete_room()) {
						$i++;
					}
				}
			}

			//delete rate for this room type, but only if all rooms of this type could be deleted (don`t have any upcoming bookings)
			if ($existing_room_uids_count > 0 && $existing_room_uids_count == $i) {
				$jrportal_rates->tarifftype_id 	= $tarifftype_id;
				$jrportal_rates->rates_uid 		= $rates_uid;
				$jrportal_rates->delete_rate();
				
				$tarifftype_uids_respònse[]	=	$tarifftype_id;
			}
		}
	}
        

	Flight::json( $response_name = "tarifftypeids" ,$tarifftype_uids_respònse);
	});


/*
	** Title | Add normal tariff (srp)
	** Description | Creates a normal tariff (srp)
	** Plugin | api_feature_tariffs
	** Scope | properties_set
	** URL | tariffs
 	** Method | POST
	** URL Parameters | 
	** Data Parameters | 
	** Success Response |{
  "data": {
    "tarifftypeid": 524
  },
  "meta": {
    "code": 200
  }
}
	** Error Response | "Tariff save method not valid for this property"
	** Sample call | curl --request POST \
  --url http://localhost/joomla_portal/jomres/api/tariffs/32/add/advanced/ \
  --header 'authorization: Bearer 0ededb43cd16f2698da2b5b540d601ec1a3d013a' \
  --header 'content-type: application/x-www-form-urlencoded' \
  --data 'tarifftypeid=0&rate_title=test&rate_description=testty&maxdays=365&minpeople=2&maxpeople=2&roomclass_uid=1&dayofweek=7&ignore_pppn=0&allow_we=1&weekendonly=0&minrooms_alreadyselected=0&maxrooms_alreadyselected=100&validfrom=2017%2F05%2F01&validto=2017%2F05%2F31&mindays=1&roomrateperday=70'

	** Notes |  If you receive the "Tariff save method not valid for this property" response, then the property is configured to save tariffs in either Normal or Micromanage editing mode.
    
    When guests book, they select a combination of room ( or room type ) and tariff. This allows us to have multiple tariffs for the same room type, and is extremely flexible.
    These settings determine if a tariff is valid to be shown in the booking form once the dates and guest numbers ( if guest types have been created ) have been selected.
    
    validfrom The date from which the tariff will be valid ( Y/m/d, eg 2017/04/30 )
    validto The date to which the tariff will be valid ( Y/m/d, eg 2018/04/30 )
    mindays Minimum days of the visit
    maxdays Maximum days of the visit
    minpeople Minimum number of people for this tariff to be valid.
    maxpeople Maximum number of people for this tariff to be valid.
    roomclass_uid The id of the room type that this tariff is for.
    dayofweek Checking day of week allowed. If the booking starts on N day of the week, then this tariff is valid to be offered. 0 : Sunday 1 : Monday 2 : Tuesday : 3 Wednesday : 4 Thursday : 5 Friday : 6 Saturday : 7 Any day of week.
    ignoreppn Properties can be configured to charge per person per night by default. This setting (1 or 0 ) allows certain tariffs to be priced at a flat rate instead of per person per night.
    allow_we Allow bookings that span weekend days. For example, a tariff that has this option set to No (zero) would be a maximum of 5 nights long if the checkin date was a Monday. This allows you to have midweek only tariffs.
    minrooms_alreadyselected
    maxrooms_alreadyselected These two settings allow you to create room/tariff combinations that are only offered if the guest has already selected another room in the booking form. Most of the time you would leave these at the defaults of 0 & 100.

    roomrateperday The price of the room between the validfrom and validto dates.

    Take care when creating Advanced tariffs, each set of tariffs valid from and to dates should be contiguous.

Flight::route('POST /tariffs/@id/add/normal/srp', function($property_uid) 
	{
	validate_scope::validate('properties_set');
	validate_property_access::validate($property_uid);

    $property_uid = (int)$property_uid;
   
	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
	require_once("../framework.php");
    
	$mrConfig = getPropertySpecificSettings($property_uid);
	
	if ($mrConfig['tariffmode'] != '0' || $mrConfig[ 'is_real_estate_listing' ] == '1' || get_showtime('is_jintour_property')) {
        Flight::halt(204, "Tariff save method not valid for this property");
    }

	if ($mrConfig[ 'singleRoomProperty' ] != '1') {
        Flight::halt(204, "Wrong endpoint called, this property is an MRP.");
    }

    $basic_property_details = jomres_singleton_abstract::getInstance('basic_property_details');
    $basic_property_details->gather_data($property_uid);
        
	//rooms object
	jr_import('jrportal_rooms');
	$jrportal_rooms = new jrportal_rooms();
	$jrportal_rooms->propertys_uid = $property_uid;
		
	//rates object
	jr_import('jrportal_rates');
        
	$jrportal_rates = new jrportal_rates();
	
	$jrportal_rates->property_uid 	= $property_uid;
			
	//rate details
	$jrportal_rates->tarifftype_id 	= (int)jomresGetParam( $_POST, 'tarifftypeid', 0 );
	$jrportal_rates->rates_uid 		= (int)jomresGetParam( $_POST, 'rates_uid', 0 );
	$jrportal_rates->roomclass_uid 	= (int)jomresGetParam($_POST, 'roomtype', $jrportal_rates->rates_defaults['roomclass_uid']);
	$jrportal_rates->maxpeople 		= (int)jomresGetParam($_POST, 'max_people', $jrportal_rates->rates_defaults['maxpeople']);
	$jrportal_rates->validfrom 		= date("Y/m/d");
	$jrportal_rates->validto 		= date("Y/m/d", strtotime('+10 years'));
	
	$roomrateperday 				= jomresGetParam( $_POST, 'roomrateperday', $jrportal_rates->rates_defaults['roomrateperday'] );
	$jrportal_rates->roomrateperday = convert_entered_price_into_safe_float($roomrateperday);
	
	//room details
	$jrportal_rooms->room_uid 		= (int)jomresGetParam($_POST, 'room_uid', 0);
	$jrportal_rooms->room_classes_uid = $jrportal_rates->roomclass_uid;
	$jrportal_rooms->max_people 	= $jrportal_rates->maxpeople;
	
	//save or update the selected room
	if ($jrportal_rooms->room_uid > 0) {
		$jrportal_rooms->commit_update_room();
	} else {
		$jrportal_rooms->commit_new_room();
	}
	
	//save new or update existing tariff
	//we use save_rate_legacy only for advanced and normal tariff editing modes, micromanage uses save_rate()
	$jrportal_rates->save_rate_legacy();
       

	Flight::json( $response_name = "tarifftypeid" ,$jrportal_rates->tarifftype_id);
	});
	
*/