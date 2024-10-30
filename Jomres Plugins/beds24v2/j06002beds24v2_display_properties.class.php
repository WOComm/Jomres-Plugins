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
class j06002beds24v2_display_properties
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


        
        // The prime goal of this page is to display a list of properties that the manager can be linked to, allow linking and import from, or export to, Beds24.
        
        // If the user is a super manager, we'll first find all property uids
        // If not, all the property uids that (s)he has access to.
        // If a property does not have an api key, then it will be discarded
        // We will next find all property uids in the Beds24 xref table, if any. Those properties that are linked to other manager uids will be discarded
        
        // Once this sorting is done, we'll find the property details of properties in Beds24 that are already linked to a Jomres property.
        // Those that are not linked to a beds24 property will be given a dropdown of Beds24 properties that they can link to.
        
        // The page will also call the rest key setup class, and the webhook setup class, which will both automatically configure REST API key pairs, and webhooks, for this user.
        // As we have the Jomres properties > Beds24 properties table cross reference table, Super Property Managers can also have webhooks, because we're able to corrolate specific users to properties.
        
        
        $JRUser = jomres_singleton_abstract::getInstance( 'jr_user' );
        
        jr_import("beds24v2");
		$beds24v2 = new beds24v2();
        
        $beds24v2_properties = jomres_singleton_abstract::getInstance('beds24v2_properties');
        $beds24v2_properties->set_manager_uid($JRUser->userid);
        $beds24v2_properties->prepare_data();
        $beds24v2_properties->get_properties_from_beds24();
		
		$beds24v2_properties->check_for_properties_deleted_from_beds24($JRUser->userid);
		
        $property_map = $beds24v2_properties->map_jomres_properties_to_beds24_properties();
/*     		if (empty($beds24v2_properties->all_properties_assigned_to_manager)) {
			
			echo $beds24v2->output_error(jr_gettext( "BEDS24V2_DISPLAY_PROPERTIES_NO_PROPERTIES" , "BEDS24V2_DISPLAY_PROPERTIES_NO_PROPERTIES" , false ));
			return;
		}    */ 
        jr_import("beds24v2_rest_key_setup");
        $beds24v2_rest_key_setup = new beds24v2_rest_key_setup($JRUser->userid);
        $oauth_client_key_pair_and_redirect_uri = $beds24v2_rest_key_setup->get_manager_key_pair();
        
        jr_import("beds24v2_webhook_setup");
        $beds24v2_webhook_setup = new beds24v2_webhook_setup(0);
        $beds24v2_webhook_setup->create_webhook_for_site();
        
        
        $output = array();
        $pageoutput = array();
        $rows=array();

        $output['BEDS24V2_DISPLAY_PROPERTIES_TITLE'] = jr_gettext( "BEDS24V2_DISPLAY_PROPERTIES_TITLE" , "BEDS24V2_DISPLAY_PROPERTIES_TITLE" , false );
        $output['BEDS24V2_DISPLAY_PROPERTIES_INFO'] = jr_gettext( "BEDS24V2_DISPLAY_PROPERTIES_INFO" , "BEDS24V2_DISPLAY_PROPERTIES_INFO" , false );


        $output['BEDS24V2_DISPLAY_PROPERTIES_PROPERTY_UID'] = jr_gettext( "BEDS24V2_DISPLAY_PROPERTIES_PROPERTY_UID" , "BEDS24V2_DISPLAY_PROPERTIES_PROPERTY_UID" , false );
        $output['BEDS24V2_DISPLAY_PROPERTIES_PROPERTY_NAME'] = jr_gettext( "BEDS24V2_DISPLAY_PROPERTIES_PROPERTY_NAME" , "BEDS24V2_DISPLAY_PROPERTIES_PROPERTY_NAME" , false ); 
        $output['BEDS24V2_DISPLAY_PROPERTIES_BEDS24_PROPERTY_UID'] = jr_gettext( "BEDS24V2_DISPLAY_PROPERTIES_BEDS24_PROPERTY_UID" , "BEDS24V2_DISPLAY_PROPERTIES_BEDS24_PROPERTY_UID" , false );
        $output['BEDS24V2_DISPLAY_PROPERTIES_BEDS24_PROPERTY_NAME'] = jr_gettext( "BEDS24V2_DISPLAY_PROPERTIES_BEDS24_PROPERTY_NAME" , "BEDS24V2_DISPLAY_PROPERTIES_BEDS24_PROPERTY_NAME" , false );

        $output['BEDS24V2_REST_API_INTRO'] = jr_gettext( "BEDS24V2_REST_API_INTRO" , "BEDS24V2_REST_API_INTRO" , false );
        $output['BEDS24V2_REST_API_CLIENT_ID'] = jr_gettext( "BEDS24V2_REST_API_CLIENT_ID" , "BEDS24V2_REST_API_CLIENT_ID" , false ); 
        $output['BEDS24V2_REST_API_CLIENT_SECRET'] = jr_gettext( "BEDS24V2_REST_API_CLIENT_SECRET" , "BEDS24V2_REST_API_CLIENT_SECRET" , false );
        $output['BEDS24V2_REST_API_ENDPOINT'] = jr_gettext( "BEDS24V2_REST_API_ENDPOINT" , "BEDS24V2_REST_API_ENDPOINT" , false );
        
        $output['CLIENT_ID'] =  $oauth_client_key_pair_and_redirect_uri['client_id'];
        $output['CLIENT_SECRET'] = $oauth_client_key_pair_and_redirect_uri['client_secret'];
        $output['ENDPOINT'] = $oauth_client_key_pair_and_redirect_uri['redirect_uri'];
        $output['BEDS24V2_DISPLAY_PROPERTY_APIKEY'] = jr_gettext( "BEDS24V2_DISPLAY_PROPERTY_APIKEY" , "BEDS24V2_DISPLAY_PROPERTY_APIKEY" , false );
		
        if (!empty($property_map)) {
            
            foreach ( $property_map as $property ) { // The property map is an array of both Jomres and Beds24 properties, and here we will give managers the option to cross-reference Jomres properties with Beds24 properties, and vice versa
                $jomres_property_array = (array)$property['jomres_property'];
                $beds24_property_object = (object)$property['beds24_property'];

                if (
                    isset( $jomres_property_array['property_uid']) &&
                    isset($beds24_property_object->propId) &&
                    $jomres_property_array['property_uid'] > 0 && 
                    $beds24_property_object->propId > 0 
                    ) { // The "properties" are already associated by virtue of sharing the API key, and will have already had a row created by the beds24v2_properties class. Here we will just show the two properties, and a link to a button that allows us to associate room types
                        $configure_button = $beds24v2->button_link(jr_gettext( "BEDS24_LISTPROPERTIES_CONFIGURE" , "BEDS24_LISTPROPERTIES_CONFIGURE" , false ) ,jomresURL(JOMRES_SITEPAGE_URL."&task=beds24v2_configure_property&property_uid=".$jomres_property_array['property_uid'] ) , $button_class = 'success' ) ;
                        $configure_element = "CONFIGURE_PROPERTY";
                        $configure_link = array ( "ELEMENT" => $configure_element , "CONTENT" => $configure_button );
                    $rows[] = array ("ROW" => $beds24v2->output_property_row($jomres_property_array['property_name'] , $beds24_property_object->name , $jomres_property_array['property_uid'] , $beds24_property_object->propId , $configure_link ) );
                    }
                elseif ( isset( $jomres_property_array['property_uid']) ) { // It's a Jomres property that's not associated with a Beds24 property
                        $export_button = $beds24v2->button_link(jr_gettext( "BEDS24_LISTPROPERTIES_EXPORT" , "BEDS24_LISTPROPERTIES_EXPORT" , false ) ,jomresURL(JOMRES_SITEPAGE_URL."&task=beds24v2_export_property&property_uid=".$jomres_property_array['property_uid'] ) , $button_class = 'primary' ) ;
                        $export_element = "EXPORT_PROPERTY";
                        $export_link = array ( "ELEMENT" => $export_element , "CONTENT" => $export_button );
                        $rows[] = array ("ROW" => $beds24v2->output_property_row($jomres_property_array['property_name'] , '' , $jomres_property_array['property_uid'] , '' , $export_link , $jomres_property_array['apikey'] ) );
                        }
                    else { // It's a Beds24 property
                        $import_button = $beds24v2->button_link(jr_gettext( "BEDS24_LISTPROPERTIES_IMPORT" , "BEDS24_LISTPROPERTIES_IMPORT" , false ) ,jomresURL(JOMRES_SITEPAGE_URL."&task=beds24v2_import_property&propId=".$beds24_property_object->propId) , $button_class = 'primary' ) ;
                        $import_element = "IMPORT_PROPERTY";
                        $import_link = array ( "ELEMENT" => $import_element , "CONTENT" => $import_button );
                        $rows[] = array ("ROW" => $beds24v2->output_property_row('' , $beds24_property_object->name , '' , $beds24_property_object->propId , $import_link ) );
                        }
                }

            $pageoutput[ ] = $output;
            $tmpl = new patTemplate();
            $tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
            $tmpl->readTemplatesFromInput('beds24v2_display_properties.html');
            $tmpl->addRows('pageoutput', $pageoutput);
            $tmpl->addRows('rows', $rows);
            echo $tmpl->getParsedTemplate();
            }
        else {
            $message = jr_gettext("BEDS24V2_ERROR_USER_NO_PROPERTIES" , "BEDS24V2_ERROR_USER_NO_PROPERTIES" , false );
            echo $beds24v2->output_error($message);
            }
		}

	
	

	
	
	
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
