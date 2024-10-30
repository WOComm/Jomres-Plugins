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

/**
*
* @package Jomres\CMF
*
* Handles webhook events on the parent server
*
*
*/

class jomres2jomres_changelog_item_process_property_updated
{
    function __construct($componetArgs)
	{
		$item = unserialize(base64_decode($componetArgs->item));

        if (!isset($item->data->manager_id)) {
            throw new Exception('Manager id not set in item object');
        }

		if ( isset($item->data->property_uid) ) {
			// So far, so good. Let's find the remote site's booking to import it into this system

			jr_import('channelmanagement_jomres2jomres_communication');
            $remote_server_communication = new channelmanagement_jomres2jomres_communication($item->data->manager_id);

			$response = $remote_server_communication->communicate( "GET" , '/cmf/property/'.$item->data->property_uid , [] , true );

			jr_import('jomres_call_api');
			$jomres_call_api = new jomres_call_api('system');

			$success = true;

			if (is_object($response) ) {

				// Metas -----------------------------------------------------------------------------
				$put_data = array (
					"property_uid" 			=> $componetArgs->property_uid,
					"metatitle" 			=> $response->metatitle,
					"metadescription"		=> $response->metadescription,
					"metakeywords"			=> $response->metakeywords
				);

				$metas_response = $jomres_call_api->send_request(
					"PUT"  ,
					"cmf/property/metas" ,
					$put_data ,
					array("X-JOMRES-channel-name: " . "jomres2jomres", "X-JOMRES-proxy-id: " . channelmanagement_framework_utilities :: get_local_manager_id_for_remote_property_uid ( $item->data->property_uid ) )
				);

				if (!isset($metas_response->data->response->propertys_uid)) {
					$success = false;
					$failed_on = "cmf/property/metas";
				}

				// Property features -----------------------------------------------------------------------------

				// Get the existing mapped items
				$mapped_dictionary_items = channelmanagement_framework_utilities:: get_mapped_dictionary_items("jomres2jomres", $mapped_to_jomres_only = true);

				$local_property_features_csv = '';

				if (isset($response->property_features) && $response->property_features != '') {

					$bang = explode(",", $response->property_features);

					if (!empty($bang)) {
						foreach ($bang as $remote_property_feature_id) {
							foreach ($mapped_dictionary_items['_cmf_list_property_features'] as $mapped_property_feature) {
								if ($mapped_property_feature->jomres_id == $remote_property_feature_id) {
									$local_property_features_csv .= $mapped_property_feature->jomres_id.','; // Don't really need all of this var's details, but it makes tracing it thru the system heckin' easier because my brain is fried by the coronavirus worries
								}
							}
						}
						$local_property_features_csv = rtrim($local_property_features_csv,',');
					}
				}

				$put_data = array (
					"property_uid" 	=> $componetArgs->property_uid,
					"features"	 	=> $local_property_features_csv

				);

				$features_response = $jomres_call_api->send_request(
					"PUT"  ,
					"cmf/property/features" ,
					$put_data ,
                    array("X-JOMRES-channel-name: " . "jomres2jomres", "X-JOMRES-proxy-id: " . channelmanagement_framework_utilities :: get_local_manager_id_for_remote_property_uid ( $item->data->property_uid ) )
				);

				if (!isset($features_response->data->response->propertys_uid)) {
					$success = false;
					$failed_on = "cmf/property/features";
				}

				// Location -----------------------------------------------------------------------------
				$put_data = array (
					"property_uid" 	=> $componetArgs->property_uid,
					"country_code" 	=> $response->property_country,
					"region_id"		=> $response->property_region,
					"lat"			=> $response->lat,
					"long"			=> $response->long,

				);

				$location_response = $jomres_call_api->send_request(
					"PUT"  ,
					"cmf/property/location" ,
					$put_data ,
                    array("X-JOMRES-channel-name: " . "jomres2jomres", "X-JOMRES-proxy-id: " . channelmanagement_framework_utilities :: get_local_manager_id_for_remote_property_uid ( $item->data->property_uid ) )
				);

				if (!isset($location_response->data->response->propertys_uid)) {
					$success = false;
					$failed_on = "cmf/property/location";
				}

				// Contacts -----------------------------------------------------------------------------
				$put_data = array (
					"property_uid" 	=> $componetArgs->property_uid,
					"telephone" 	=> $response->property_tel,
					"fax"			=> $response->property_fax,
					"email"			=> $response->property_email

				);

				$contacts_response = $jomres_call_api->send_request(
					"PUT"  ,
					"cmf/property/contacts" ,
					$put_data ,
                    array("X-JOMRES-channel-name: " . "jomres2jomres", "X-JOMRES-proxy-id: " . channelmanagement_framework_utilities :: get_local_manager_id_for_remote_property_uid ( $item->data->property_uid ) )
				);

				if (!isset($contacts_response->data->response->propertys_uid)) {
					$success = false;
					$failed_on = "cmf/property/contacts";
				}


				// Address -----------------------------------------------------------------------------
				$put_data = array (
					"property_uid" 	=> $componetArgs->property_uid,
					"house" 		=> $response->property_name,
					"street"		=> $response->property_street,
					"town"			=> $response->property_town,
					"postcode"		=> $response->property_postcode,

				);

				$address_response = $jomres_call_api->send_request(
					"PUT"  ,
					"cmf/property/address" ,
					$put_data ,
                    array("X-JOMRES-channel-name: " . "jomres2jomres", "X-JOMRES-proxy-id: " . channelmanagement_framework_utilities :: get_local_manager_id_for_remote_property_uid ( $item->data->property_uid ) )
				);

				if (!isset($address_response->data->response->propertys_uid)) {
					$success = false;
					$failed_on = "cmf/property/address";
				}

				// Text -----------------------------------------------------------------------------
				$put_data = array (
					"property_uid" 			=> $componetArgs->property_uid,
					"permit_number" 		=> $response->permit_number,
					"description"			=> $response->property_description,
					"checkin_times"			=> $response->property_checkin_times,
					"area_activities"		=> $response->property_area_activities,
					"driving_directions"	=> $response->property_driving_directions,
					"airports"				=> $response->property_airports,
					"othertransport"		=> $response->property_othertransport,
					"terms"					=> $response->property_policies_disclaimers,
				);

				$text_response = $jomres_call_api->send_request(
					"PUT"  ,
					"cmf/property/text" ,
					$put_data ,
                    array("X-JOMRES-channel-name: " . "jomres2jomres", "X-JOMRES-proxy-id: " . channelmanagement_framework_utilities :: get_local_manager_id_for_remote_property_uid ( $item->data->property_uid ) )
				);

				if (!isset($text_response->data->response->propertys_uid)) {
					$success = false;
					$failed_on = "cmf/property/text";
				}

				if ($success) {
					logging::log_message("Updated property ".$componetArgs->property_uid, 'JOMRES2JOMRES', 'DEBUG' , '' );

					$this->success = true;
				} else {

					logging::log_message("Failed to update property. Failed on ".$failed_on, 'JOMRES2JOMRES', 'ERROR' , '' );
					$this->success = false;

				}

			} else {
				logging::log_message("Did not get a valid response from parent server", 'JOMRES2JOMRES', 'ERROR' , serialize($response) );
			}
		} else {
			logging::log_message("Property not set", 'JOMRES2JOMRES', 'INFO' , '' );
		}
		if (!isset($this->success)) {
			$this->success = false;
		}

	}
}
/*
object(stdClass)#896 (36) {
["propertys_uid"]=>
  string(1) "4"
["property_name"]=>
  string(12) "Parent Villa"
["property_street"]=>
  string(5) "aaaaa"
["property_town"]=>
  string(5) "aaaaa"
["property_region"]=>
  string(4) "1258"
["property_country"]=>
  string(2) "GB"
["property_postcode"]=>
  string(5) "aaaaa"
["property_tel"]=>
  string(5) "aaaaa"
["property_fax"]=>
  string(0) ""
["property_email"]=>
  string(13) "test@test.com"
["property_features"]=>
  string(0) ""
["property_description"]=>
  string(24) "aaaaaaa asdfa s sdfaf as"
["property_checkin_times"]=>
  string(0) ""
["property_area_activities"]=>
  string(0) ""
["property_driving_directions"]=>
  string(0) ""
["property_airports"]=>
  string(0) ""
["property_othertransport"]=>
  string(0) ""
["property_policies_disclaimers"]=>
  string(0) ""
["price"]=>
  string(1) "0"
["published"]=>
  int(1)
  ["stars"]=>
  int(0)
  ["superior"]=>
  int(0)
  ["ptype_id"]=>
  int(6)
  ["lat"]=>
  string(8) "51.50068"
["long"]=>
  string(8) "-0.14317"
["metatitle"]=>
  string(0) ""
["metadescription"]=>
  string(0) ""
["metakeywords"]=>
  string(0) ""
["approved"]=>
  int(0)
  ["permit_number"]=>
  string(0) ""
["cat_id"]=>
  int(0)
  ["room_info"]=>
  object(stdClass)#833 (4) {
  ["rooms"]=>
    object(stdClass)#849 (1) {
	["11"]=>
      string(2) "11"
    }
    ["rooms_by_type"]=>
    object(stdClass)#838 (1) {
	["6"]=>
      array(1) {
	[0]=>
        string(2) "11"
      }
    }
    ["room_types"]=>
    object(stdClass)#836 (1) {
	["6"]=>
      object(stdClass)#839 (3) {
	  ["abbv"]=>
        string(10) "2 Bedrooms"
["desc"]=>
        string(0) ""
["image"]=>
        string(13) "2bedrooms.png"
      }
    }
    ["rooms_max_people"]=>
    object(stdClass)#852 (1) {
	["6"]=>
      object(stdClass)#262 (1) {
	  ["11"]=>
        string(2) "10"
      }
    }
  }
  ["images"]=>
  object(stdClass)#845 (3) {
  ["property"]=>
    array(1) {
	[0]=>
      array(1) {
		[0]=>
        object(stdClass)#895 (3) {
		["large"]=>
          string(56) "/jomres/uploadedimages/4/property/0/pool-691008__340.jpg"
		["medium"]=>
          string(63) "/jomres/uploadedimages/4/property/0/medium/pool-691008__340.jpg"
		["small"]=>
          string(66) "/jomres/uploadedimages/4/property/0/thumbnail/pool-691008__340.jpg"
        }
      }
    }
    ["slideshow"]=>
    array(1) {
	[0]=>
      array(9) {
		[0]=>
        object(stdClass)#886 (3) {
		["large"]=>
          string(62) "/jomres/uploadedimages/4/slideshow/0/beach-1854076_960_720.jpg"
		["medium"]=>
          string(69) "/jomres/uploadedimages/4/slideshow/0/medium/beach-1854076_960_720.jpg"
		["small"]=>
          string(72) "/jomres/uploadedimages/4/slideshow/0/thumbnail/beach-1854076_960_720.jpg"
        }
        [1]=>
        object(stdClass)#885 (3) {
		["large"]=>
          string(64) "/jomres/uploadedimages/4/slideshow/0/building-768623_960_720.jpg"
	["medium"]=>
          string(71) "/jomres/uploadedimages/4/slideshow/0/medium/building-768623_960_720.jpg"
	["small"]=>
          string(74) "/jomres/uploadedimages/4/slideshow/0/thumbnail/building-768623_960_720.jpg"
        }
        [2]=>
        object(stdClass)#884 (3) {
		["large"]=>
          string(68) "/jomres/uploadedimages/4/slideshow/0/manor-house-2359884_960_720.jpg"
["medium"]=>
          string(75) "/jomres/uploadedimages/4/slideshow/0/medium/manor-house-2359884_960_720.jpg"
["small"]=>
          string(78) "/jomres/uploadedimages/4/slideshow/0/thumbnail/manor-house-2359884_960_720.jpg"
        }
        [3]=>
        object(stdClass)#883 (3) {
		["large"]=>
          string(65) "/jomres/uploadedimages/4/slideshow/0/real-estate-4955093__340.jpg"
["medium"]=>
          string(72) "/jomres/uploadedimages/4/slideshow/0/medium/real-estate-4955093__340.jpg"
["small"]=>
          string(75) "/jomres/uploadedimages/4/slideshow/0/thumbnail/real-estate-4955093__340.jpg"
        }
        [4]=>
        object(stdClass)#882 (3) {
		["large"]=>
          string(63) "/jomres/uploadedimages/4/slideshow/0/residence-2219972__340.jpg"
["medium"]=>
          string(70) "/jomres/uploadedimages/4/slideshow/0/medium/residence-2219972__340.jpg"
["small"]=>
          string(73) "/jomres/uploadedimages/4/slideshow/0/thumbnail/residence-2219972__340.jpg"
        }
        [5]=>
        object(stdClass)#881 (3) {
		["large"]=>
          string(61) "/jomres/uploadedimages/4/slideshow/0/room-2269594_960_720.jpg"
["medium"]=>
          string(68) "/jomres/uploadedimages/4/slideshow/0/medium/room-2269594_960_720.jpg"
["small"]=>
          string(71) "/jomres/uploadedimages/4/slideshow/0/thumbnail/room-2269594_960_720.jpg"
        }
        [6]=>
        object(stdClass)#880 (3) {
		["large"]=>
          string(76) "/jomres/uploadedimages/4/slideshow/0/the-interior-of-the-3475656_960_720.jpg"
["medium"]=>
          string(83) "/jomres/uploadedimages/4/slideshow/0/medium/the-interior-of-the-3475656_960_720.jpg"
["small"]=>
          string(86) "/jomres/uploadedimages/4/slideshow/0/thumbnail/the-interior-of-the-3475656_960_720.jpg"
        }
        [7]=>
        object(stdClass)#879 (3) {
		["large"]=>
          string(63) "/jomres/uploadedimages/4/slideshow/0/travel-1737168_960_720.jpg"
["medium"]=>
          string(70) "/jomres/uploadedimages/4/slideshow/0/medium/travel-1737168_960_720.jpg"
["small"]=>
          string(73) "/jomres/uploadedimages/4/slideshow/0/thumbnail/travel-1737168_960_720.jpg"
        }
        [8]=>
        object(stdClass)#854 (3) {
		["large"]=>
          string(61) "/jomres/uploadedimages/4/slideshow/0/water-165219_960_720.jpg"
["medium"]=>
          string(68) "/jomres/uploadedimages/4/slideshow/0/medium/water-165219_960_720.jpg"
["small"]=>
          string(71) "/jomres/uploadedimages/4/slideshow/0/thumbnail/water-165219_960_720.jpg"
        }
      }
    }
    ["image_relative_path"]=>
    string(25) "http://parent.development"
  }
  ["tariffs"]=>
  array(2) {
	[0]=>
    object(stdClass)#855 (14) {
	["rates_uid"]=>
      string(1) "5"
	["rate_title"]=>
      string(6) "Tariff"
	["rate_description"]=>
      string(0) ""
	["validfrom"]=>
      string(10) "2020/04/01"
	["validto"]=>
      string(10) "2020/04/06"
	["roomrateperday"]=>
      string(6) "100.00"
	["mindays"]=>
      string(1) "1"
	["maxdays"]=>
      string(3) "365"
	["minpeople"]=>
      string(1) "1"
	["maxpeople"]=>
      string(3) "100"
	["roomclass_uid"]=>
      string(1) "6"
	["ignore_pppn"]=>
      string(1) "0"
	["allow_ph"]=>
      string(1) "1"
	["allow_we"]=>
      string(1) "1"
    }
    [1]=>
    object(stdClass)#856 (14) {
	["rates_uid"]=>
      string(1) "6"
["rate_title"]=>
      string(6) "Tariff"
["rate_description"]=>
      string(0) ""
["validfrom"]=>
      string(10) "2020/04/07"
["validto"]=>
      string(10) "2021/12/31"
["roomrateperday"]=>
      string(6) "150.00"
["mindays"]=>
      string(1) "7"
["maxdays"]=>
      string(3) "365"
["minpeople"]=>
      string(1) "1"
["maxpeople"]=>
      string(3) "100"
["roomclass_uid"]=>
      string(1) "6"
["ignore_pppn"]=>
      string(1) "0"
["allow_ph"]=>
      string(1) "1"
["allow_we"]=>
      string(1) "1"
    }
  }
  ["other_settings"]=>
  object(stdClass)#857 (2) {
  ["cleaning_fee"]=>
    int(0)
	["security_deposit"]=>
    int(0)
  }
  ["remote_data"]=>
  object(stdClass)#858 (0) {
  }
}*/
