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


class j02990a_bypass_cofirmation {
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		
		$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
        $jrConfig = $siteConfig->get();
		
		if ($jrConfig['bypass_confirmation'] != '1') {
			return;
		}
		
		//if this is a secret key payment (for an approved booking enquiry) we don`t want to bypass confirmation
		$sk = jomresGetParam($_REQUEST, 'sk', '');

        if ($sk != '') {
            return;
        }

		$bookingDeets = gettempBookingdata();
		
		if (!$bookingDeets['ok_to_book'])
			return;
		else
			{
			$property_uid = $bookingDeets['property_uid'];
			
			jr_import("gateway_plugin_settings");
            $plugin_settings = new gateway_plugin_settings();
            $plugin_settings->get_settings_for_property_uid( $property_uid );

/*            $tmpBookingHandler = jomres_singleton_abstract::getInstance( 'jomres_temp_booking_handler' );
            
			$current_property_details = jomres_singleton_abstract::getInstance( 'basic_property_details' );
            $current_property_details->gather_data($property_uid);

            jr_import( 'jomres_custom_field_handler' );
            $custom_fields   = new jomres_custom_field_handler();
            $allCustomFields = $custom_fields->getAllCustomFieldsByPtypeId($current_property_details->ptype_id);

            $customFields    = array ();
            if ( !empty( $allCustomFields ) )
            	{
                foreach ( $allCustomFields as $f )
                	{
                    $required      = $f[ 'required' ];
                    $formfieldname = $f[ 'fieldname' ] . "_" . $f[ 'uid' ];
                   	if ( $required == "1" && strlen( $_POST[ $formfieldname ] ) == 0 ) 
						jomresRedirect( jomresURL( JOMRES_SITEPAGE_URL . "&task=dobooking&selectedProperty=" . $bookingDeets[ 'property_uid' ] ), '' );
                	}
           		}*/
			
		//	$tmpBookingHandler->saveCustomFields( $allCustomFields );
        //    $tmpBookingHandler->saveBookingData();

			if ( count($plugin_settings->gateway_settings) > 0 && $sk == '')
				{
				$plugin = '';
				$active_gateway_found = false;
				
				foreach ($plugin_settings->gateway_settings as $gateway_name => $gateway_setting)
					{
					if ($gateway_setting['active'] == '1' && !$active_gateway_found) 
						{
						$active_gateway_found = true;
						$plugin = $gateway_name;
						}
					}
				set_showtime('bypass_confirmation_plugin_name' , $plugin);
				echo '<div style="display:none">';  // Prevents the confirmation form from being seen
				}
			}
		}

	function getRetVals()
		{
		return null;
		}
	}
