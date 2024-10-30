<?php
/**
 * Core file
 *
 * @author Vince Wooll <sales@jomres.net>
 * @version Jomres 8
 * @package Jomres
 * @copyright	2005-2015 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly.
 **/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

//This is a month view chart the occupancy - number of rooms booked by day in the selected month
class j16000property_import_file
	{
	function __construct($componentArgs)
		{
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch )
			{
			$this->template_touchable = false;
			return;
			}
		$ePointFilepath=get_showtime('ePointFilepath');
		
		if ( (int)$_POST['propertyType'] == 0)
			{
			jomresRedirect( jomresURL(JOMRES_SITEPAGE_URL."&task=property_import"),jr_gettext('_JOMRES_PROPERTY_IMPORT_PROPERTY_TYPE_NOT_SENT','_JOMRES_PROPERTY_IMPORT_PROPERTY_TYPE_NOT_SENT',false));
			}
		
		if ($_FILES['import_file']['error'] == 4 || !isset($_FILES['import_file']) )
			jomresRedirect( jomresURL(JOMRES_SITEPAGE_URL."&task=property_import"),jr_gettext('_JOMRES_PROPERTY_IMPORT_NO_FILE','_JOMRES_PROPERTY_IMPORT_NO_FILE',false));
		else
			{
			$properties = array();
			$row = 0;
			
			
			$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
			$jrConfig=$siteConfig->get();
			if (!isset($jrConfig['automatically_approve_new_properties']))
				$jrConfig['automatically_approve_new_properties']=1;
		
			$this->approved = 0;
			if ($jrConfig['automatically_approve_new_properties'] =="1")
				$this->approved=1;
			
			$this->valid_regions = jomres_singleton_abstract::getInstance( 'jomres_regions' );
			$this->valid_regions->get_all_regions();
			$this->valid_countries = jomres_singleton_abstract::getInstance( 'jomres_countries' );
			$this->valid_countries->get_all_countries();

			$query = "SELECT roomtype_id FROM #__jomres_roomtypes_propertytypes_xref  WHERE propertytype_id = '".$_POST['propertyType']."' LIMIT 1 ";
			$roomClasses =doSelectSql($query , 1);
			if (!$roomClasses)
				{
				jomresRedirect( jomresURL(JOMRES_SITEPAGE_URL."&task=property_import"),jr_gettext('_JOMRES_PROPERTY_IMPORT_NO_ROOM_TYPES_FOR_PROPERTY_TYPE','_JOMRES_PROPERTY_IMPORT_NO_ROOM_TYPES_FOR_PROPERTY_TYPE',false));
				}
			$this->default_room_class=$roomClasses;
			if (($handle = fopen($_FILES['import_file']['tmp_name'], "r")) !== FALSE) 
				{
				while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) 
					{
					
					$property = array();
					$this->failure_messages = array();
					$num = count($data);

					$row++;
					for ($c=0; $c < $num; $c++) 
						{
						$property[$c] = filter_var( $data[$c], FILTER_SANITIZE_SPECIAL_CHARS );
						}

					if ($num == 11 )
						{
						$success = $this->insert_new_property($property);
						}
					else
						{
						$success = false;
						$this->failure_messages[] = jr_gettext('_JOMRES_PROPERTY_IMPORT_MESSAGE_TOO_MANY_COLUMNS','_JOMRES_PROPERTY_IMPORT_MESSAGE_TOO_MANY_COLUMNS',false);
						}
					
					if (!isset($this->new_property_uid)) {
						$this->new_property_uid = 0;
					}
					
					$properties[] = array ( "property" => $property ,"success" => $success , "failure_messages" => $this->failure_messages , "new_property_uid" => $this->new_property_uid );
					}
				fclose($handle);
				}



			$rows=array();
			$failed_properties = array();
			foreach ($properties as $property)
				{
				$r=array();

				$r['PROPERTY_NAME']	= $property['property'][0];

				if ( empty($property['failure_messages']) )
					{
						
					$r['RESULT'] =simple_template_output($ePointFilepath.'templates'.JRDS.find_plugin_template_directory() , 'property_import_success.html' , jr_gettext('_JOMRES_PROPERTY_IMPORT_MESSAGE_SUCCESS','_JOMRES_PROPERTY_IMPORT_MESSAGE_SUCCESS',false,false) );
					
					}
				else
					{
					$failed_properties[]=$property['property'];
					$r['RESULT'] =simple_template_output($ePointFilepath.'templates'.JRDS.find_plugin_template_directory() , 'property_import_failure.html' ,implode("<br/>",$property['failure_messages']) );
					}
				$rows[]=$r;
				}
			}
			
		$failed_properties_csv_message = '';
		if (!empty($failed_properties))
			{
			$pageoutput=array();
			$output=array();
			
			$output['NUM_ROWS']=count($failed_properties);
			$output['FAILED_AS_CSV'] = $this->arrayToCsv2($failed_properties);
			$output['_JOMRES_PROPERTY_IMPORT_FAILED_PROPERTIES']		=jr_gettext('_JOMRES_PROPERTY_IMPORT_FAILED_PROPERTIES','_JOMRES_PROPERTY_IMPORT_FAILED_PROPERTIES',false,false);

			$pageoutput[]=$output;
			$tmpl = new patTemplate();
			$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
			$tmpl->readTemplatesFromInput( "property_import_failured_properties.html" );
			$tmpl->addRows( 'pageoutput',$pageoutput);
			$tmpl->addRows( 'rows',$rows);
			$failed_properties_csv_message = $tmpl->getParsedTemplate();
		
			}

 		$pageoutput=array();
		$output=array();

		$output['PAGETITLE']=jr_gettext('_JOMRES_PROPERTY_IMPORT_TITLE','_JOMRES_PROPERTY_IMPORT_TITLE',false,false);

		$output['_JOMRES_PROPERTY_IMPORT_CSV_FIELD_NAME']		=jr_gettext('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_NAME','_JOMRES_PROPERTY_IMPORT_CSV_FIELD_NAME',false,false);
		$output['FAILED_PROPERTIES_CSV_MESSAGE']		= $failed_properties_csv_message;

		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( "property_import_result.html" );
		$tmpl->addRows( 'pageoutput',$pageoutput);
		$tmpl->addRows( 'rows',$rows);
		$tmpl->displayParsedTemplate();

		}
	
	function arrayToCsv2( array $fields, $delimiter = ',', $enclosure = '"', $encloseAll = false, $nullToMysqlNull = false ) 
		{
		$delimiter_esc = preg_quote($delimiter, '/');
		$enclosure_esc = preg_quote($enclosure, '/');

		$outputString = "";
		foreach($fields as $tempFields) {
			$output = array();
			foreach ( $tempFields as $field ) {
				// ADDITIONS BEGIN HERE
				if (gettype($field) == 'integer' || gettype($field) == 'double') 
					{
					$field = strval($field); // Change $field to string if it's a numeric type
					}
					// ADDITIONS END HERE
				if ($field === null && $nullToMysqlNull) 
					{
					$output[] = 'NULL';
					continue;
					}

				// Enclose fields containing $delimiter, $enclosure or whitespace
				if ( $encloseAll || preg_match( "/(?:${delimiter_esc}|${enclosure_esc}|\s)/", $field ) ) 
					{
					$field = $enclosure . str_replace($enclosure, $enclosure . $enclosure, $field) . $enclosure;
					}
				$output[] = $field." ";
				}
			$outputString .= implode( $delimiter, $output )."\r\n";
			}
		return $outputString; 
		}
	
	function insert_new_property($new_property )
		{
		$property_name			= jomres_remove_HTML(trim($new_property[0]));
		$number_of_rooms		= (int)$new_property[1];
		$price_per_night		= (float)$new_property[2];
		$email_address			= jomres_remove_HTML(trim($new_property[3]));
		$property_street		= jomres_remove_HTML(trim($new_property[4]));
		$property_town			= jomres_remove_HTML(trim($new_property[5]));
		$property_region		= (int)$new_property[6];
		$property_country		= jomres_remove_HTML(trim($new_property[7]));
		$property_postcode		= jomres_remove_HTML(trim($new_property[8]));
		$property_telephone		= jomres_remove_HTML(trim($new_property[9]));
		$property_description	= jomres_remove_HTML(trim($new_property[10]));

		
		$this->new_property_uid = 0;
		
		if ($property_name == "") 
			{
			$this->failure_messages[] = jr_gettext('_JOMRES_PROPERTY_IMPORT_MESSAGE_PROPERTY_NAME_NOT_SET','_JOMRES_PROPERTY_IMPORT_MESSAGE_PROPERTY_NAME_NOT_SET',false);
			} 

		if ($number_of_rooms == 0) 
			{
			$this->failure_messages[] = jr_gettext('_JOMRES_PROPERTY_IMPORT_MESSAGE_NUMBER_OF_ROOMS_INCORRECT','_JOMRES_PROPERTY_IMPORT_MESSAGE_NUMBER_OF_ROOMS_INCORRECT',false);
			}
		
		if ($price_per_night == 0 ) 
			{
			$this->failure_messages[] = jr_gettext('_JOMRES_PROPERTY_IMPORT_MESSAGE_PRICE_NOT_SET','_JOMRES_PROPERTY_IMPORT_MESSAGE_PRICE_NOT_SET',false);
			} 

		if (!filter_var($email_address, FILTER_VALIDATE_EMAIL) === true) 
			{
			$this->failure_messages[] = jr_gettext('_JOMRES_PROPERTY_IMPORT_MESSAGE_COULD_NOT_VALIDATE_EMAIL_ADDRESS','_JOMRES_PROPERTY_IMPORT_MESSAGE_COULD_NOT_VALIDATE_EMAIL_ADDRESS',false);
			} 
			
		if ($property_street == "") 
			{
			$this->failure_messages[] = jr_gettext('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_STREET','_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_STREET',false);
			}
			
		if ($property_town == "") 
			{
			$this->failure_messages[] = jr_gettext('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_TOWN','_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_TOWN',false);
			} 
			
		if ($property_region == 0 || !array_key_exists($property_region,$this->valid_regions->regions) ) 
			{
			$this->failure_messages[] = jr_gettext('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_REGION','_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_REGION',false);
			} 

		if ($property_country == "" || !array_key_exists($property_country,$this->valid_countries->countries)) 
			{
			$this->failure_messages[] = jr_gettext('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_COUNTRY','_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_COUNTRY',false);
			} 
			
		if ($property_postcode == "") 
			{
			$this->failure_messages[] = jr_gettext('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_POSTCODE','_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_POSTCODE',false);
			} 
			
		if ($property_telephone == "") 
			{
			$this->failure_messages[] = jr_gettext('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_TELEPHONE','_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_TELEPHONE',false);
			} 
			
		if ($property_description == "") 
			{
			$this->failure_messages[] = jr_gettext('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_DESCRIPTION','_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_DESCRIPTION',false);
			} 
		
		if (!empty($this->failure_messages))
			{
			return false;
			}

		$rate_title       = "Tariff";
		$rate_description = "";
		$validfrom        = date( "Y/m/d" );
		$validto          = date( "Y/m/d", strtotime( "+10 years" ) );
		$validfrom_ts     = str_replace( "/", "-", $validfrom );
		$validto_ts       = str_replace( "/", "-", $validto );
		$mindays          = 1;
		$maxdays          = 1000;
		$minpeople        = 1;
		$ignore_pppn      = 0;
		$allow_ph         = 1;
		$allow_we         = 1;
		$weekendonly      = 0;
		
		// First, we need to create the property
		$query="INSERT INTO #__jomres_propertys (`property_name`,`apikey`,`property_email`,`approved` , `ptype_id` , `property_street`, `property_town`, `property_region`, `property_country`, `property_postcode`, `property_tel`, `property_description`)
			VALUES
			(
			'".$property_name."',
			'".createNewAPIKey()."',
			'".$email_address."' , 
			'".$this->approved."' ,
			'".(int)$_POST['propertyType']."',
			'".$property_street."',
			'".$property_town."',
			'".$property_region."',
			'".$property_country."',
			'".$property_postcode."',
			'".$property_telephone."',
			'".$property_description."'
			)";

		$property_uid=doInsertSql($query,jr_gettext('_JOMRES_MR_AUDIT_INSERT_PROPERTY','_JOMRES_MR_AUDIT_INSERT_PROPERTY',FALSE));

		// Now we'll create the rooms for this property
		$room_number = 1;
		for ( $i = 1; $i <=$number_of_rooms;$i++)
			{
			$query = "INSERT INTO #__jomres_rooms (
			`room_classes_uid`,`propertys_uid`,`room_number`,`max_people`,`singleperson_suppliment`)
			VALUES (
			'" . (int)$this->default_room_class . "'," . (int) $property_uid . ",'".$room_number."','2','0')";
			doInsertSql( $query );
			$room_number++;
			}
		
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
			'" . $price_per_night . "',
			'" . (int) $mindays . "',
			'" . (int) $maxdays . "',
			'" . (int) $minpeople . "',
			'2',
			'" . (int) $this->default_room_class . "',
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
			catch ( exception $e) 
				{
				throw new exception("Cannot insert tariffs during property import.");
				}

		if ($number_of_rooms == 1)
			$query = "INSERT INTO #__jomres_settings (property_uid,akey,value) VALUES ('" . (int) $property_uid . "','singleRoomProperty','1')";
		else
			$query = "INSERT INTO #__jomres_settings (property_uid,akey,value) VALUES ('" . (int) $property_uid . "','singleRoomProperty','0')";
		
		$query = doInsertSql ( $query );
		
		$this->new_property_uid = $property_uid;
		return true;
		}

	function getRetVals()
		{
		return null;
		}
	}
