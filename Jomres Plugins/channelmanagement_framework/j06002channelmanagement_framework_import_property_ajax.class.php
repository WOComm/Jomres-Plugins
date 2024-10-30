<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2020 Vince Wooll
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/
// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class j06002channelmanagement_framework_import_property_ajax {
	function __construct($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}

			
		$ePointFilepath = get_showtime('ePointFilepath');

		$JRUser									= jomres_singleton_abstract::getInstance( 'jr_user' );
		
		$channelmanagement_framework_singleton = jomres_singleton_abstract::getInstance('channelmanagement_framework_singleton'); 
		
		$channel_name			= trim(filter_var($_GET['channel_name'], FILTER_SANITIZE_SPECIAL_CHARS));
		$remote_property_id		= (int)$_GET['remote_property_id'];

		try {
			$class_name = 'channelmanagement_'. $channel_name.'_import_property';

			jr_import($class_name);

			$response = $class_name::import_property( $channel_name , $remote_property_id , $JRUser->userid );
			echo json_encode($response);
		}
		catch (Exception $e) {
			$message = $e->getMessage();
			echo json_encode ((object) array ( "success" => false , "message" => $e->getMessage() ) );
		}
	}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
