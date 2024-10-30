<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2015 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( 'Direct Access to this file is not allowed.' );
// ################################################################
#[AllowDynamicProperties]
class j06002beds24v2_export_tariffs
	{
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch )
			{
			$this->template_touchable = false;
			return;
			}

		//$ePointFilepath=get_showtime('ePointFilepath');
		$property_uid              = jomresGetParam( $_REQUEST, 'property_uid', 0 );
        if ($property_uid == 0 ) {
            return false;
        }
		
		$tariff_type_id              = jomresGetParam( $_REQUEST, 'tariff_type_id', 0 );
        if ($tariff_type_id == 0 ) {
            return false;
        }
		
		$p_value              = jomresGetParam( $_REQUEST, 'p_value', '' );
        if ($p_value == '' ) {
            return false;
        }
		
		
        $JRUser = jomres_singleton_abstract::getInstance( 'jr_user' );
        if (!in_array( $property_uid , $JRUser->authorisedProperties ) )// A basic check to ensure that this property uid is in the manager's property uid list
            throw new Exception("Manager cannot manage this property");
		
        $beds24v2_keys = jomres_singleton_abstract::getInstance('beds24v2_keys');
        $manager_key        = $beds24v2_keys->get_manager_key($JRUser->userid);
        $property_apikey    = $beds24v2_keys->get_property_key($property_uid , $JRUser->userid );

        if (trim($manager_key) == "") {
            $message = jr_gettext("BEDS24V2_ERROR_USER_NO_KEY" , "BEDS24V2_ERROR_USER_NO_KEY" , false );
            echo $beds24v2->output_error($message);
            return;
            }
		
		
		
        $thisJRUser=jomres_singleton_abstract::getInstance('jr_user');
        $beds24v2_properties = jomres_singleton_abstract::getInstance('beds24v2_properties');
        $beds24v2_properties->set_manager_uid($thisJRUser->id);
        $beds24v2_properties->prepare_data();
        
        $beds24v2_rooms = jomres_singleton_abstract::getInstance('beds24v2_rooms');
		$beds24v2_rooms->set_property_uid($property_uid);
        $beds24v2_rooms->prepare_data( $manager_key , $property_apikey );
		
		$jomres_room_types_to_beds24_roomId = $beds24v2_rooms->xref_data['jomres_to_cm'];
		
		$basic_rate_details = jomres_singleton_abstract::getInstance( 'basic_rate_details' );
		$basic_rate_details->get_rates($property_uid);
		
		$now = (new DateTime())->setTime(0,0);

		$three_years_from_now = new DateTime();
		date_add($three_years_from_now, date_interval_create_from_date_string('3 years'));
		$latest_possible_tariff = date_format($three_years_from_now, 'Y-m-d');

		
		$roomId = null;
		$tariff_export_data = array( "roomId" => null  );
		foreach ($basic_rate_details->rates as $complete_tariff) {
			foreach ($complete_tariff as $ttype=>$individual_tariffs ) {
				if ($ttype == $tariff_type_id ) {
					foreach ($individual_tariffs as $individual_tariff ) {
						if (is_null($roomId)) {
							$jomres_room_type = $individual_tariff['roomclass_uid'];
							$roomId = $jomres_room_types_to_beds24_roomId[$jomres_room_type];
							$tariff_export_data['roomId'] = $roomId;
						}
						
						$period = new DatePeriod(
							 new DateTime($individual_tariff['validfrom']),
							 new DateInterval('P1D'),
							 new DateTime($individual_tariff['validto'].' 23:59:59') // Need the time on the end to ensure that the last date is also returned
						);
						$dates_array = array();
						foreach( $period as $date) { 
							if ( $date < $three_years_from_now ) {
								$dates_array[] = $date->format('Y-m-d'); 
							}
							
						}

						foreach ($dates_array as $the_date) {
							$date = (new DateTime($the_date))->setTime(0,0);
							if($date >= $now) {
								$d = str_replace("-","",$the_date);
								$tariff_export_data['dates'][$d][$p_value] = $individual_tariff['roomrateperday'];
								$tariff_export_data['dates'][$d]['m'] = $individual_tariff['mindays'];
							}
						}
					}
				}
			}
		}

        jr_import("beds24v2_communication");
		$beds24v2_communication = new beds24v2_communication();
        $beds24v2_communication->set_manager_key($manager_key);
		$beds24v2_communication->set_property_key($property_apikey);
        $result = $beds24v2_communication->communicate_with_beds24("setRoomDates" ,  $tariff_export_data );

		logging::log_message("Exported tariffs to beds24 as P : ".$p_value, 'Beds24v2', 'DEBUG' , $result);
		
		jomresRedirect( jomresURL( JOMRES_SITEPAGE_URL . "&task=beds24v2_configure_property&property_uid=".$property_uid) );
        }
	
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
