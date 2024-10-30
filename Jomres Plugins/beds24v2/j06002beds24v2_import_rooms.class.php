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
class j06002beds24v2_import_rooms
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
		$propId              = jomresGetParam( $_REQUEST, 'propId', 0 );
		
        $JRUser = jomres_singleton_abstract::getInstance( 'jr_user' );
        
        $beds24v2_keys = jomres_singleton_abstract::getInstance('beds24v2_keys');
        $manager_key = $beds24v2_keys->get_manager_key($JRUser->userid);

        if (trim($manager_key) == "") {
            jr_import("beds24v2");
            $beds24v2 = new beds24v2();

            $message = jr_gettext("BEDS24V2_ERROR_USER_NO_KEY" , "BEDS24V2_ERROR_USER_NO_KEY" , false );
            echo $beds24v2->output_error($message);
            return;
            }
        
        jr_import("beds24v2_communication");
		$beds24v2_communication = new beds24v2_communication();
        $beds24v2_communication->set_manager_key($manager_key);
        $response = $beds24v2_communication->communicate_with_beds24("getProperties");
        $properties = json_decode($response);
		
        if ( !empty($properties->getProperties))
			{
			foreach ($properties->getProperties as $property)
				{
				if ( $propId == $property->propId )
					{
					if ($property->propKey != "")
						{
						if (!isset($_REQUEST['roomTypes']))
							{
							if (!empty($property->roomTypes))
								{
								$output = array();
								$pageoutput=array();
								$rows=array();
								$query = "SELECT room_classes_uid,room_class_abbv,room_class_full_desc,property_uid FROM #__jomres_room_classes ORDER BY room_class_abbv ";
								$roomClasses =doSelectSql($query);
								foreach ($roomClasses as $roomClass)
									{
									$room_type_options[]=jomresHTML::makeOption( $roomClass->room_classes_uid,jr_gettext('_JOMRES_CUSTOMTEXT_ROOMTYPES_ABBV'.(int)$roomClass->room_classes_uid,stripslashes($roomClass->room_class_abbv),false,false) );
									}
												
								foreach ( $property->roomTypes as $beds24_roomtype)
									{
									$r = array();
									$r['BEDS24_ROOM_TYPE'] = $beds24_roomtype->name;
									$r['JOMRES_ROOM_TYPES_DROPDOWN'] = jomresHTML::selectList($room_type_options, 'roomTypes['.$beds24_roomtype->roomId.']', '', 'value', 'text', $room_type_options);
									$rows[]=$r;
									}
								
								$output['TITLE']													= jr_gettext('BEDS24_LISTPROPERTIES_ASSOCIATE_ROOM_TYPES','BEDS24_LISTPROPERTIES_ASSOCIATE_ROOM_TYPES',false);
								$output['HROOMTYPEDROPDOWN']										= jr_gettext('_JOMRES_COM_MR_LISTTARIFF_ROOMCLASS','_JOMRES_COM_MR_LISTTARIFF_ROOMCLASS',false);
								$output['_BEDS24_DISPLAY_BOOKINGS_JOMRESROOMS_BEDS24TYPENAME']		= jr_gettext('_BEDS24_DISPLAY_BOOKINGS_JOMRESROOMS_BEDS24TYPENAME','_BEDS24_DISPLAY_BOOKINGS_JOMRESROOMS_BEDS24TYPENAME',false);
								$output['BEDS24_LISTPROPERTIES_ASSOCIATE_ROOM_TYPES_DESC']			= jr_gettext('BEDS24_LISTPROPERTIES_ASSOCIATE_ROOM_TYPES_DESC','BEDS24_LISTPROPERTIES_ASSOCIATE_ROOM_TYPES_DESC',false);
								$output['PROPID']			=$propId;
									
								$jrtbar =jomres_singleton_abstract::getInstance('jomres_toolbar');
								$jrtb  = $jrtbar->startTable();
								$jrtb .= $jrtbar->toolbarItem('cancel',jomresURL(JOMRES_SITEPAGE_URL."&task=beds24v2"),jr_gettext( '_JOMRES_COM_A_CANCEL', '_JOMRES_COM_A_CANCEL', false ));
								$jrtb .= $jrtbar->toolbarItem('save',jomresURL(JOMRES_SITEPAGE_URL."&task=beds24v2_import_property"),jr_gettext('_JOMRES_COM_MR_SAVE','_JOMRES_COM_MR_SAVE',FALSE),true,'beds24v2_import_property');
								$jrtb .= $jrtbar->endTable();
								$output['JOMRESTOOLBAR']=$jrtb;

								$pageoutput[]=$output;
								$tmpl = new patTemplate();
								$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
								$tmpl->readTemplatesFromInput( 'beds24_import_associate_room_types.html');
								$tmpl->addRows( 'pageoutput',$pageoutput);
								$tmpl->addRows( 'rows',$rows);
								$tmpl->displayParsedTemplate();
								}
							else
								{
								echo jr_gettext( "BEDS24_LISTPROPERTIES_IMPORT_CANNOT_NOROOMS", 'BEDS24_LISTPROPERTIES_IMPORT_CANNOT_NOROOMS' ) ;
								}
							}
						else // Let's start the import
							{
							
							$thisJRUser=jomres_singleton_abstract::getInstance('jr_user');
							$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
							$jrConfig=$siteConfig->get();

							$roomTypes = jomresGetParam( $_REQUEST, 'roomTypes', array() );
							$temp_beds24_rooms_array = array();
							foreach ( $property->roomTypes as $room)
								{
								$temp_beds24_rooms_array [ $room->roomId ] = array("qty" => $room->qty , "minPrice" => $room->minPrice);
								}
							$room_xref=array();
							foreach ($roomTypes as $key=>$val)
								{
								$qty =  (int)$temp_beds24_rooms_array [(int)$key]["qty"];
								$minPrice = (float)$temp_beds24_rooms_array [(int)$key]["minPrice"];
								$room_xref [ (int)$key ] = array ( "jomres_room_type_id" => (int)$val , "qty" => $qty , "minPrice"=>$minPrice);
								}
							
							// First we'll create the rooms for this property
							$room_number = 1;
							foreach ( $room_xref as $beds24_roomtype_id => $room )
								{
								for ( $i = 1; $i <= $room['qty'];$i++)
									{
									$query = "INSERT INTO #__jomres_rooms (
									`room_classes_uid`,`propertys_uid`,`room_number`,`max_people`,`singleperson_suppliment`)
									VALUES (
									'" . (int) $room['jomres_room_type_id'] . "'," . (int) $property_uid . ",'$room_number','2','0')";
									$room_id = doInsertSql( $query );
									$room_number++;
									}
								$query = "INSERT INTO #__jomres_beds24_room_type_xref ( `jomres_room_type` , `beds24_room_type` , `property_uid` ) VALUES ( ".$room['jomres_room_type_id'] ." , ".(int)$beds24_roomtype_id." ,  ".$property_uid." )";
								doInsertSql($query);
								
								// Now we can add a tariff for this room type
								$query = "INSERT INTO #__jomres_rates (
									`rate_title`,
									`rate_description`,
									`validfrom`,
									`validto`,
									`roomrateperday`,
									`mindays`,
									`maxdays`,
									`minpeople`,
									`maxpeople`,
									`roomclass_uid`,
									`ignore_pppn`,
									`allow_ph`,
									`allow_we`,
									`weekendonly`,
									`validfrom_ts`,
									`validto_ts`,
									`property_uid`
									)VALUES (
									'$rate_title',
									'$rate_description',
									'$validfrom',
									'$validto',
									'" . $room['minPrice'] . "',
									'" . (int) $mindays . "',
									'" . (int) $maxdays . "',
									'" . (int) $minpeople . "',
									'2',
									'" . (int) $room['jomres_room_type_id'] . "',
									'" . (int) $ignore_pppn . "',
									'" . (int) $allow_ph . "',
									'" . (int) $allow_we . "',
									'" . (int) $weekendonly . "',
									'$validfrom_ts',
									'$validto_ts',
									'" . (int) $property_uid . "'
									)";

								try 
									{
									doInsertSql($query);
									}
								catch (Exception $e) 
									{
									throw new Exception("Cannot insert tariffs during property import.");
                                    }
								}
									
							jomresRedirect( jomresURL( JOMRES_SITEPAGE_URL . "&task=beds24v2") );
                            }
						}
					else
						{
						$output['APIKEYWARNING'] = jr_gettext( "BEDS24_LISTPROPERTIES_IMPORT_CANNOT_NOAPIKEY", 'BEDS24_LISTPROPERTIES_IMPORT_CANNOT_NOAPIKEY' );
						$output['LINK'] = "https://www.beds24.com/control2.php?pagetype=propertyassociation";
						$output['_BEDS24_CONTROL_PANEL_DIRECT'] = jr_gettext( "_BEDS24_CONTROL_PANEL_DIRECT", '_BEDS24_CONTROL_PANEL_DIRECT' );
							
						$output['_BEDS24_SUGGESTED_KEY'] = jr_gettext( "_BEDS24_SUGGESTED_KEY", '_BEDS24_SUGGESTED_KEY' );
						$output['SUGGESTED_KEY'] = createNewAPIKey();
								
						$pageoutput[]=$output;
						$tmpl = new patTemplate();
						$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
						$tmpl->readTemplatesFromInput( 'beds24_import_cannot_apikey.html');
						$tmpl->addRows( 'pageoutput',$pageoutput);
                        if (isset($rows)) {
                            $tmpl->addRows( 'rows',$rows);
                        }
						
						$tmpl->displayParsedTemplate();
						}
					}
				}
			}
        }
	

	
	
	
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
