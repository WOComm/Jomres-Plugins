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
class j06002beds24v2_export_single_booking
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

		$contract_uid = jomresGetParam($_REQUEST, 'contract_uid', 0);
		if ($contract_uid == 0) {
			return;
		}
        
		$property_uid = getDefaultProperty();
		

							
        $thisJRUser=jomres_singleton_abstract::getInstance('jr_user');
        $beds24v2_properties = jomres_singleton_abstract::getInstance('beds24v2_properties');
        $beds24v2_properties->set_manager_uid($thisJRUser->id);
        $beds24v2_properties->prepare_data();
        
        if ( !$beds24v2_properties->confirm_manager_can_manage_jomres_property($property_uid) )  {
            logging::log_message("j06002beds24v2_export_bookings manager cannot export this property's bookings" , 'Beds24v2', 'CRITICAL' , '' );
            throw new Exception("j06002beds24v2_export_bookings manager cannot export this property's bookings");
        }
        
		
		
		$beds24v2_bookings = jomres_singleton_abstract::getInstance('beds24v2_bookings');
		$beds24v2_bookings->set_property_uid($property_uid);
		
		$data = new stdClass;
		$data->property_uid = (int)$property_uid;
		$data->contract_uid = $contract_uid;
		$data->task = "booking_modified";
		$beds24v2_bookings->update_beds24_with_booking($data);
		jomresRedirect(jomresURL(JOMRES_SITEPAGE_URL.'&task=edit_booking'.'&contract_uid='.$contract_uid));	

		
        }
	
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
