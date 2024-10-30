<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2017 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( 'Direct Access to this file is not allowed.' );
// ################################################################
#[AllowDynamicProperties]
class j99994beds24v2_resend_notification
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
		$ePointFilepath=get_showtime('ePointFilepath');

		$JRUser									= jomres_singleton_abstract::getInstance( 'jr_user' );
        if ($JRUser->userid == 0) {
			return;
		}
		
		$contract_uid = jomresGetParam($_REQUEST, 'contract_uid', 0);
		if ($contract_uid == 0) {
			return;
		}
		
		$property_uid = getDefaultProperty();
		
        $beds24v2_properties = jomres_singleton_abstract::getInstance('beds24v2_properties');
        $beds24v2_properties->set_manager_uid($JRUser->userid);
		$beds24v2_properties->prepare_data();
        $manager_properties = $beds24v2_properties->get_all_assigned_properties($JRUser->userid);
		if (!array_key_exists($property_uid , $manager_properties) ) {
			return;
		}
		if (get_showtime("task") == "edit_booking" || get_showtime("task") == "show_black_booking" ) {
			$contract_uid = jomresGetParam($_REQUEST, 'contract_uid', 0);
			if ($contract_uid == 0) {
				return;
			}
			
			$current_contract_details = jomres_singleton_abstract::getInstance('basic_contract_details');
			$current_contract_details->gather_data($contract_uid, $property_uid);
			
			$beds24v2_bookings = jomres_singleton_abstract::getInstance('beds24v2_bookings');
			$beds24v2_bookings->set_property_uid($property_uid);
			$current_bookings = $beds24v2_bookings->get_beds24_booking_ids_for_property();
			
			echo jr_gettext('BEDS24V2_BOOKING_DATA_AT_B24','BEDS24V2_BOOKING_DATA_AT_B24')."</br>"; 
			 if (!empty($current_bookings)) {
				$btn_class = "default";
				echo '<script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>';
				
				foreach ($current_bookings as $beds24Booking) {
					if ($beds24Booking->contract_uid == $contract_uid ) {
						echo $beds24Booking->booking_number."<br>";
						$result = $beds24v2_bookings->get_single_booking($beds24Booking->booking_number);
						if (is_array($result)) {
							echo '<pre class="prettyprint"><code class="language-json">'.json_encode($result[0]).'</code></pre>';
						} else {
							echo $result->error."<br/>";
						}
					}
				}
			} else {
				$btn_class = "warning";
				echo jr_gettext('BEDS24V2_BOOKING_NO_DATA_AT_B24','BEDS24V2_BOOKING_NO_DATA_AT_B24')."</br>"; 
			}
			
			echo "<a href='".jomresURL(JOMRES_SITEPAGE_URL.'&task=beds24v2_export_single_booking&contract_uid='.$contract_uid)."' class='btn btn-".$btn_class."'>".jr_gettext('BEDS24V2_BOOKING_RESEND','BEDS24V2_BOOKING_RESEND')."</a></br>";
		}
		
       
        
		
		}

		
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
