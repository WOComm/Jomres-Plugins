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
class j06002beds24v2_build_tariff_export_links
	{
	function __construct( $componentArgs )
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch )
			{
			$this->template_touchable = false;
			return;
			}

		$ePointFilepath=get_showtime('ePointFilepath');
		
        $this->retVals = '';
		
        if (isset($componentArgs[ 'output_now' ])) {
            $output_now = $componentArgs[ 'output_now' ];
        } else {
            $output_now = true;
        }

        if (isset($componentArgs[ 'jr_redirect_url' ])) {
            $jr_redirect_url = "&jr_redirect_url=".$componentArgs[ 'jr_redirect_url' ];
        } else {
            $jr_redirect_url = '';
        }
		

        if (isset($componentArgs[ 'property_uid' ])) {
            $property_uid = (int)$componentArgs[ 'property_uid' ];
        } else {
			$property_uid = (int)jomresGetParam($_REQUEST, 'property_uid', 0);
        }

        $JRUser = jomres_singleton_abstract::getInstance( 'jr_user' );
		
        if (!in_array( $property_uid , $JRUser->authorisedProperties ) ) {
			// A basic check to ensure that this property uid is in the manager's property uid list
			
            // throw new Exception("Manager cannot manage this property");
			// Will no longer throw an exception, as this can be included on the list micromanage tariffs page of non-beds24 registered managers, therefore we will just return instead.
			return;
			}
		
        jr_import("beds24v2");
		$beds24v2 = new beds24v2();
        
        $beds24v2_keys = jomres_singleton_abstract::getInstance('beds24v2_keys');
        $manager_key        = $beds24v2_keys->get_manager_key($JRUser->userid);
        $property_apikey    = $beds24v2_keys->get_property_key($property_uid , $JRUser->userid );

        if (trim($manager_key) == "") {
            $message = jr_gettext("BEDS24V2_ERROR_USER_NO_KEY" , "BEDS24V2_ERROR_USER_NO_KEY" , false );
            echo $beds24v2->output_error($message);
            return;
            }

        $beds24v2_rooms = jomres_singleton_abstract::getInstance('beds24v2_rooms');
		$beds24v2_rooms->set_property_uid($property_uid);
        $beds24v2_rooms->prepare_data( $manager_key , $property_apikey );

        if (!empty($beds24v2_rooms->channelmanager_property_rooms)){
			$output = array();
			$pageoutput = array();  
			
			$current_property_details = jomres_singleton_abstract::getInstance('basic_property_details');
			$current_property_details->gather_data($property_uid);
			
			
			/////////////////// Updating tariffs
			$tariff_output = array();
			$rws = array();
			
			$mrConfig = getPropertySpecificSettings($property_uid);
			if ($mrConfig['tariffmode'] == "2") {
				$to['BEDS24V2_TARIFFS_TITLE'] = 					jr_gettext("BEDS24V2_TARIFFS_TITLE","BEDS24V2_TARIFFS_TITLE",false);
				$to['BEDS24V2_TARIFF_EXPORT_DESC'] = 			jr_gettext("BEDS24V2_TARIFF_EXPORT_DESC","BEDS24V2_TARIFF_EXPORT_DESC",false);
				
				$to['BEDS24V2_TARIFF_EXPORT_TARIFFNAME'] = 		jr_gettext("BEDS24V2_TARIFF_EXPORT_TARIFFNAME","BEDS24V2_TARIFF_EXPORT_TARIFFNAME",false);
				$to['BEDS24V2_TARIFF_EXPORT_TARIFF_ROOM_TYPE'] =	jr_gettext("BEDS24V2_TARIFF_EXPORT_TARIFF_ROOM_TYPE","BEDS24V2_TARIFF_EXPORT_TARIFF_ROOM_TYPE",false);

				$basic_rate_details = jomres_singleton_abstract::getInstance( 'basic_rate_details' );
				$basic_rate_details->get_rates($property_uid);
				
				if (!empty($basic_rate_details->rates)) {
					foreach ($basic_rate_details->rates as $roomclass_uid => $t) {
						foreach ($t as $tarifftype_id => $r) {
							$rw = array();
							
							$rw['ROOMCLASS'] = $current_property_details->all_room_types[ $roomclass_uid ][ 'room_class_abbv' ];
							$rw['TARIFF_TYPE'] = $tarifftype_id;
							foreach ($r as $rates_uid => $v) {
								$rate_title 	= $v['rate_title'];
							}
							$rw['TITLE'] = $rate_title;
							
							$p_values = 10;
							for ($i = 1 ; $i <= $p_values ; $i++ ) {
								$rw['EXPORT_LINK_P'.$i] = $beds24v2->button_link( 'P'.$i ,jomresURL(JOMRES_SITEPAGE_URL."&task=beds24v2_export_tariffs&property_uid=".$property_uid."&tariff_type_id=".$tarifftype_id.'&p_value=p'.$i.$jr_redirect_url ) , $button_class = 'primary' ) ;
							}
							$rws[] =$rw;
						}
					}
				}
				$tariff_output[0] = $to ;
			}

            $pageoutput[ ] = $output;
            $tmpl = new patTemplate();
            $tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
            $tmpl->readTemplatesFromInput('beds24v2_build_tariff_export_links.html');
			$tmpl->addRows('tariff_rows', $rws);
			$tmpl->addRows('tariff_output', $tariff_output);
			$template = $tmpl->getParsedTemplate();
			if ($output_now) {
				echo $template;
			} else {
				$this->retVals = $template;
			}
        }
    }
	

	
	
	
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return $this->retVals;
		}
	}
