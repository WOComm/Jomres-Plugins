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
class j06002beds24v2_export_property
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

        if (!in_array( $property_uid , $JRUser->authorisedProperties ) )
            throw new Exception("Manager cannot manage this property");
        
        // Security feature, any property exported to Beds24 should have a new API key.
		$new_key = createNewAPIKey();
		$query = "UPDATE #__jomres_propertys SET `apikey` = '".$new_key."' WHERE `propertys_uid` = ".$property_uid;
		doInsertSql($query);

        jr_import("beds24v2");
		$beds24v2 = new beds24v2();
        
        $beds24v2_properties = jomres_singleton_abstract::getInstance('beds24v2_properties');
        $beds24v2_properties->set_manager_uid($JRUser->userid);
        $beds24v2_properties->prepare_data();

        $beds24v2_keys = jomres_singleton_abstract::getInstance('beds24v2_keys');
        $manager_key = $beds24v2_keys->get_manager_key($JRUser->userid);

        if (trim($manager_key) == "") {
            jr_import("beds24v2");
            $beds24v2 = new beds24v2();

            $message = jr_gettext("BEDS24V2_ERROR_USER_NO_KEY" , "BEDS24V2_ERROR_USER_NO_KEY" , false );
            echo $beds24v2->output_error($message);
            return;
            }
        
		$basic_property_details = jomres_singleton_abstract::getInstance( 'basic_property_details' );
		$basic_property_details->gather_data($property_uid);        
		
		$Properties = array();
		$Properties[0]["name"]			= $basic_property_details->property_name;

        
		$Properties[0]["propKey"]		= $new_key;
		$Properties[0]["jomresUrl"]		= JOMRES_SITEPAGE_URL_AJAX."&task=beds24v2_notify&property_uid=".$property_uid;
		$Properties[0]["bookingUrl"]	= JOMRES_SITEPAGE_URL_AJAX."&task=dobooking&pdetails_cal=1&selectedProperty=".$property_uid;

        $room_type_count = array();
		foreach ($basic_property_details->multi_query_result[$property_uid]['rooms_by_type'] as $key=>$room_type )
			{
            $Properties[0]["roomTypes"][] = array ("name" => $basic_property_details->multi_query_result[$property_uid]['room_types'][$key]["abbv"] , "qty" => count($room_type) , "jomres_roomtype" => $key , "minPrice" => "0.00" );
			}

        $payload = new stdClass;
        $payload->createProperties = $Properties;

        jr_import("beds24v2_communication");
		$beds24v2_communication = new beds24v2_communication();
        $beds24v2_communication->set_manager_key($manager_key);
        $result = $beds24v2_communication->communicate_with_beds24("createProperties" ,  $payload );

		if (isset($result->createProperties[0]->error))
			{
            $error = filter_var( $result->createProperties[0]->error , FILTER_SANITIZE_SPECIAL_CHARS );
            logging::log_message("Tried to create a property, but it failed with this message : <b>".$error."</b> ", 'Beds24v2', 'ERROR' , $json);
			echo '<div class="alert alert-danger" >'.$error.'</div>';
			}

		$result = json_decode($result);
        
		if ($result->createProperties[0]->name == $Properties[0]["name"])
			{
            $jomres_property_details= array ("property_uid" => $property_uid );
            $beds24_property_details = new stdClass;
            $beds24_property_details->propId = $result->createProperties[0]->propId;

            $beds24v2_properties->create_property_association_if_required ( $jomres_property_details , $beds24_property_details , $JRUser->userid );

			foreach ($Properties[0]["roomTypes"] as $jomres_roomtype)
				{
				foreach ( $result->createProperties[0]->roomTypes as $beds24_roomtype)
					{
					if ($jomres_roomtype['name'] == $beds24_roomtype->name)
						{
						$query = "INSERT INTO #__jomres_beds24_room_type_xref ( `jomres_room_type` , `beds24_room_type` , `property_uid` ) VALUES ( ".$jomres_roomtype['jomres_roomtype'] ." , ".(int)$beds24_roomtype->roomId." ,  ".$property_uid." )";
						doInsertSql($query);
						}
					}
				}
			jomresRedirect( jomresURL( JOMRES_SITEPAGE_URL . "&task=beds24v2") );
			}
        }
	

	
	
	
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
