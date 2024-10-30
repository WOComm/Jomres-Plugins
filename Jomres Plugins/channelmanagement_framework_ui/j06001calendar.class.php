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

class j06001calendar {
	function __construct($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		
		$ePointFilepath = get_showtime('ePointFilepath');
		
		if (file_exists($ePointFilepath.'language'.JRDS.get_showtime('lang').'.php'))
			require_once($ePointFilepath.'language'.JRDS.get_showtime('lang').'.php');
		else {
			if (file_exists($ePointFilepath.'language'.JRDS.'en-GB.php'))
				require_once($ePointFilepath.'language'.JRDS.'en-GB.php');
		}

		$eLiveSite = get_showtime('eLiveSite');

		$thisJRUser = jomres_singleton_abstract::getInstance('jr_user');

		jomres_cmsspecific_addheaddata('javascript', $eLiveSite.'javascript/', 'app.js');
		jomres_cmsspecific_addheaddata('javascript', $eLiveSite.'javascript/', 'endpoints.js');
		jomres_cmsspecific_addheaddata('javascript', $eLiveSite.'javascript/', 'constructRequest.js');
		jomres_cmsspecific_addheaddata('javascript', JOMRES_NODE_MODULES_RELPATH.'blockui-npm/', 'jquery.blockUI.js');

		jr_import('channelmanagement_framework_channels');
		$channelmanagement_framework_channels = new channelmanagement_framework_channels();
		$user_channels = $channelmanagement_framework_channels->get_user_channels($thisJRUser->userid);

		$output = array();

		$output['API_URL']								= get_showtime('live_site').'/'.JOMRES_ROOT_DIRECTORY.'/api';
		$output['CHANNEL_NAME'] = 'jomres_local_ui';
		$output['TOKEN'] =  $thisJRUser->params['jomres_local_cmf_ui_token'];

		$property_uid = getDefaultProperty();
		$current_property_details = jomres_singleton_abstract::getInstance('basic_property_details');
		$current_property_details->gather_data($property_uid);

		$start_date = date("Y-m-d", strtotime("today"));
		$end_date = date("Y-m-d", strtotime("+4 months"));

		jr_import('jomres_call_api');
		$jomres_call_api = new jomres_call_api('system');


		try {
			$proxy_manager_id = $thisJRUser->userid;

			$availability_response = $jomres_call_api->send_request(
				"GET",
				"cmf/property/available/rooms/".$property_uid.'/'.$start_date.'/'.$end_date."/" ,
				array() ,
				[
					'X-JOMRES-PROXY-ID: '.$proxy_manager_id,
					'X-JOMRES-CHANNEL-NAME: jomres_local_ui'
				]
			);
			if ( is_array($availability_response) && isset($availability_response['error']) && $availability_response['error'] == '400' ) {
				if (isset($availability_response["remote_response"]) && $availability_response["remote_response"]->error_message == 'There are no rooms for this property.') {
					// In the jomres_channelmanagement_framework_rooms_xref  table, rooms have not yet been cross referenced with a "remote" room id. We'll need to create some dummy rooms, like we create a dummy property in the jomres_channelmanagement_framework_property_uid_xref table otherwise endpoints will throw hissy fits because they can't find any rooms.

					if (empty($current_property_details->multi_query_result[$property_uid]['rooms_by_type'])) {
						echo "<p class='alert alert-danger'>Error, this property doesn't have any rooms, please create some rooms first.</p>";
						return;
					}

					$rooms_xref_array = array();
					foreach ($current_property_details->multi_query_result[$property_uid]['rooms_by_type'] as $room_type => $room_ids) {
						foreach ($room_ids as $room_id) {
							$rooms_xref_array[$room_type] = array(
								'amenity' => array(
									'amenity' => array(
										'remote_item_id' => 'local_room_manager_'.$thisJRUser->userid.'_room_'.$room_type,
										'jomres_id' => $room_type,
										'remote_name' => $current_property_details->multi_query_result[$property_uid]['room_types'][$room_type]["abbv"],
										'remote_type' => 'Pull_ListCompositionRooms_RQ',

									),
									'count' => count($room_ids),
									'max_guests' => $current_property_details->multi_query_result[$property_uid]['rooms_max_people'][$room_type][$room_id]
								),
							);
							}
						}

					foreach ($rooms_xref_array as $amenities) {
						$response = $jomres_call_api->send_request(
							"PUT",
							"cmf/property/rooms/remote/ids" ,
							array(
								'property_uid' => $property_uid,
								'rooms' => json_encode($amenities)
							) ,
							[
								'X-JOMRES-PROXY-ID: '.$proxy_manager_id,
								'X-JOMRES-CHANNEL-NAME: jomres_local_ui'
							]
						);
					}

					$availability_response = $jomres_call_api->send_request(
						"GET",
						"cmf/property/available/rooms/".$property_uid.'/'.$start_date.'/'.$end_date."/" ,
						array() ,
						[
							'X-JOMRES-PROXY-ID: '.$proxy_manager_id,
							'X-JOMRES-CHANNEL-NAME: jomres_local_ui'
						]
					);
				}
			}
		} catch (Exception $e) {
			 throw new Exception('Error: invalid response from local API, received '.$e->getMessage() );

		}


var_dump($availability_response->data->response->continuously_available_rooms);exit;


		$pageoutput = array();
		$pageoutput[] =$output;
		$tmpl = new patTemplate();
		$tmpl->addRows( 'pageoutput', $pageoutput );
		$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( 'cmf_ui_calendar.html' );
		echo $tmpl->getParsedTemplate();
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
