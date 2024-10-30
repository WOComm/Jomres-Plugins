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
class j06002beds24v2_import_bookings
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

        $thisJRUser=jomres_singleton_abstract::getInstance('jr_user');
        $beds24v2_properties = jomres_singleton_abstract::getInstance('beds24v2_properties');
        $beds24v2_properties->set_manager_uid($thisJRUser->id);
        $beds24v2_properties->prepare_data();
        
        if ( !$beds24v2_properties->confirm_manager_can_manage_jomres_property($property_uid) )  {
            logging::log_message("j06002beds24v2_import_bookings manager cannot import this property's bookings" , 'Beds24v2', 'CRITICAL' , '' );
            throw new Exception("j06002beds24v2_import_bookings manager cannot import this property's bookings");
        }
        
        $beds24v2_bookings = jomres_singleton_abstract::getInstance('beds24v2_bookings');
        $beds24v2_bookings->set_property_uid($property_uid);
        $all_beds24_bookings = $beds24v2_bookings->get_all_bookings();
        $beds24v2_bookings->import_beds24_bookings_into_jomres($all_beds24_bookings);
        jomresRedirect( jomresURL( JOMRES_SITEPAGE_URL . "&task=dashboard&thisProperty=".$property_uid) );
        }
	

	
	
	
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
