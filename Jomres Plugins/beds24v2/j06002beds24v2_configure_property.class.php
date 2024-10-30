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
class j06002beds24v2_configure_property
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
        
		$property_uid              = jomresGetParam( $_REQUEST, 'property_uid', 0 );

        $JRUser = jomres_singleton_abstract::getInstance( 'jr_user' );
        if (!in_array( $property_uid , $JRUser->authorisedProperties ) )// A basic check to ensure that this property uid is in the manager's property uid list
            throw new Exception("Manager cannot manage this property");
        
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

        if (!empty($beds24v2_rooms->jomres_property_rooms)){
            $output = array();
            $pageoutput = array();        
            
            $current_property_details = jomres_singleton_abstract::getInstance('basic_property_details');
            $current_property_details->gather_data($property_uid);
            $output[ 'PROPERTYNAME' ] = $current_property_details->property_name;
        
            $output['PROPERTY_APIKEY'] = $property_apikey;
            $output['BEDS24V2_DISPLAY_PROPERTY_APIKEY'] = jr_gettext("BEDS24V2_DISPLAY_PROPERTY_APIKEY","BEDS24V2_DISPLAY_PROPERTY_APIKEY",false);
            
            $output['PROPERTY_UID'] = $property_uid;
            
            $output['BEDS24_ROOM_TYPES_TITLE'] = jr_gettext("BEDS24_ROOM_TYPES_TITLE","BEDS24_ROOM_TYPES_TITLE",false);
            $output['BEDS24_ROOM_TYPES_INFO'] = jr_gettext("BEDS24_ROOM_TYPES_INFO","BEDS24_ROOM_TYPES_INFO",false);
            $output['BEDS24_ROOM_TYPES_INFO2'] = jr_gettext("BEDS24_ROOM_TYPES_INFO2","BEDS24_ROOM_TYPES_INFO2",false);
            $output['BEDS24_ROOM_TYPES_INFO3'] = jr_gettext("BEDS24_ROOM_TYPES_INFO3","BEDS24_ROOM_TYPES_INFO3",false);
            $output['BEDS24_ROOM_TYPES_YOURS'] = jr_gettext("BEDS24_ROOM_TYPES_YOURS","BEDS24_ROOM_TYPES_YOURS",false);
            $output['BEDS24_ROOM_TYPES_BEDS24'] = jr_gettext("BEDS24_ROOM_TYPES_BEDS24","BEDS24_ROOM_TYPES_BEDS24",false);
            
            $output['BEDS24_EXPORT_BOOKINGS'] = jr_gettext("BEDS24_EXPORT_BOOKINGS","BEDS24_EXPORT_BOOKINGS",false);
            $output['BEDS24_IMPORT_BOOKINGS'] = jr_gettext("BEDS24_IMPORT_BOOKINGS","BEDS24_IMPORT_BOOKINGS",false);
            $output['BEDS24_IMPORT_EXPORT'] = jr_gettext("BEDS24_IMPORT_EXPORT","BEDS24_IMPORT_EXPORT",false);
            
            $output['NOTIFICATION_URL']						= JOMRES_SITEPAGE_URL_AJAX."&task=beds24v2_notify&property_uid=".$property_uid;
            $output['BEDS24_IMPORT_NOTIFICATION_URLS']		= jr_gettext( "BEDS24_IMPORT_NOTIFICATION_URLS", 'BEDS24_IMPORT_NOTIFICATION_URLS', false );
            $output['LINK'] = "https://www.beds24.com/control2.php?pagetype=propertyassociation";
            $output['_BEDS24_CONTROL_PANEL_DIRECT'] = jr_gettext( "_BEDS24_CONTROL_PANEL_DIRECT", '_BEDS24_CONTROL_PANEL_DIRECT' );
                        
            $rows=array();
            
            $resource_options = array();
            foreach ( $beds24v2_rooms->channelmanager_property_rooms as $beds24_room_type ) {
                $resource_options[ ] = jomresHTML::makeOption($beds24_room_type->roomId, $beds24_room_type->name.' (roomId : '.$beds24_room_type->roomId.')' );
                }

            foreach ( $beds24v2_rooms->jomres_property_rooms as $jomres_room_type ) {
                $r=array();
                $room_type_id = $jomres_room_type['jomres_roomtype'];
                $r['JOMRES_ROOM_TYPE'] = $jomres_room_type['name'];
                if (!isset($beds24v2_rooms->xref_data['jomres_to_cm'][$room_type_id]))
                    $beds24v2_rooms->xref_data['jomres_to_cm'][$room_type_id] = 0;
                
                $channel_manager_room_type_id = $beds24v2_rooms->xref_data['jomres_to_cm'][$room_type_id];
                $r['BEDS24_ROOM_TYPE_DROPDOWN'] = jomresHTML::selectList($resource_options, 'resource_id['.$room_type_id.']', '', 'value', 'text', $channel_manager_room_type_id , false );
                $rows[]=$r;
                }
            
			$jrtbar =jomres_singleton_abstract::getInstance('jomres_toolbar');
			$jrtb  = $jrtbar->startTable();
			$jrtb .= $jrtbar->toolbarItem('cancel',jomresURL(JOMRES_SITEPAGE_URL."&task=beds24v2"),jr_gettext( '_JOMRES_COM_A_CANCEL', '_JOMRES_COM_A_CANCEL', false ));
			$jrtb .= $jrtbar->toolbarItem('save',jomresURL(JOMRES_SITEPAGE_URL."&task=beds24v2_associate_room_types"),jr_gettext('_JOMRES_COM_MR_SAVE','_JOMRES_COM_MR_SAVE',FALSE),true,'beds24v2_associate_room_types');
			$jrtb .= $jrtbar->endTable();
			$output['JOMRESTOOLBAR']=$jrtb;
            
			/////////////////// Updating tariffs
			$mrConfig = getPropertySpecificSettings($property_uid);
			if ($mrConfig['tariffmode'] == "2") {
				$jr_redirect_url = jr_base64url_encode(JOMRES_SITEPAGE_URL.'&task=beds24v2_configure_property&property_uid='.$property_uid);
				$output_now = false;
				$componentArgs = array ( "output_now" => $output_now , "jr_redirect_url" => $jr_redirect_url , "property_uid" => $property_uid );
				$output['TARIFF_LINKS'] = $MiniComponents->specificEvent('06002', 'beds24v2_build_tariff_export_links' , $componentArgs );
			}

            $pageoutput[ ] = $output;
            $tmpl = new patTemplate();
            $tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
            $tmpl->readTemplatesFromInput('beds24v2_configure_property.html');
            $tmpl->addRows('pageoutput', $pageoutput);
            $tmpl->addRows('rows', $rows);
            echo $tmpl->getParsedTemplate();
            }
        else {
            $output = array();
            $pageoutput = array();
            $ePointFilepath=get_showtime('ePointFilepath');
            
            $output['BEDS24_ROOM_TYPES_NONE'] = jr_gettext("BEDS24_ROOM_TYPES_NONE" , "BEDS24_ROOM_TYPES_NONE" , false );
            $output['BEDS24_IMPORT_ROOMS'] = jr_gettext("BEDS24_IMPORT_ROOMS" , "BEDS24_IMPORT_ROOMS" , false );
            $output['PROPID'] = $beds24v2_rooms->propId;
            
            $pageoutput[ ] = $output;
            $tmpl = new patTemplate();
            $tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
            $tmpl->readTemplatesFromInput('beds24v2_no_rooms.html');
            $tmpl->addRows('pageoutput', $pageoutput);
            echo $tmpl->getParsedTemplate();
            }
        }
	

	
	
	
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
