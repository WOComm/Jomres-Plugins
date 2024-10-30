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

class j16000save_local_event {
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$id		= jomresGetParam( $_POST, 'id', 0 );
		
		$event_title			= jomresGetParam( $_POST, 'event_title', '' );
		$start_date				= JSCalConvertInputDates($_POST['start_date']);
		$end_date				= JSCalConvertInputDates($_POST['end_date']);
		$latitude				= jomresGetParam( $_POST, 'latitude', '' );
		$longitude				= jomresGetParam( $_POST, 'longitude', '' );
		$websiteurl				= trim(str_replace("http://","", jomresGetParam( $_POST, 'websiteurl', '' )));
		$websiteurl				= str_replace(" ","", $websiteurl);
		$eventlogorelpath		= trim(str_replace("http://","", jomresGetParam( $_POST, 'eventlogorelpath', '' )));
		$description			= jomresGetParam( $_POST, 'description', '' );
		$marker					= jomresGetParam( $_POST, 'marker', '' );
		
		if ($id == 0)
			{
			$query = "INSERT INTO #__jomres_local_events 
				(`title`,`start_date`,`end_date`,`latitude`,`longitude`,`website_url`,`event_logo`,`description` ,`marker`) 
				VALUES 
				('".$event_title."','".$start_date."','".$end_date."','".$latitude."','".$longitude."','".$websiteurl."','".$eventlogorelpath."','".$description."' , '".$marker."')";
			}
		else
			{
			$query = "UPDATE #__jomres_local_events SET 
				`title`='".$event_title."' ,
				`start_date`='".$start_date."' ,
				`end_date`='".$end_date."' ,
				`latitude`='".$latitude."' ,
				`longitude`='".$longitude."' ,
				`website_url`='".$websiteurl."' ,
				`event_logo`='".$eventlogorelpath."',
				`description`='".$description."',
				`marker`='".$marker."'
				WHERE id = ".$id;
			}

		if( doInsertSql($query,"") )
			jomresRedirect( jomresURL( JOMRES_SITEPAGE_URL_ADMIN."&task=list_local_events" ) , "" );
		else
			echo "Error saving local event";
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
