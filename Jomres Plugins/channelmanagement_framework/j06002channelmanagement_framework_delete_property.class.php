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

class j06002channelmanagement_framework_delete_property {
	function __construct($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}

		$ePointFilepath = get_showtime('ePointFilepath');

		$property_uid	= (int)$_GET['id'];
		$channel_name	= trim(filter_var($_GET['channel_name'], FILTER_SANITIZE_SPECIAL_CHARS));
		
		if ($property_uid < 1) {
			throw new Exception("Property uid not passed");
		}
		
		if ($channel_name == '' ) {
			throw new Exception("Channel name not passed");
		}
		
		if (isset($componentArgs[ 'output_now' ]))
			$output_now = $componentArgs[ 'output_now' ];
		else
			$output_now = true;
		
		$this->retVals = '';

		$JRUser									= jomres_singleton_abstract::getInstance( 'jr_user' );

		$channelmanagement_framework_singleton = jomres_singleton_abstract::getInstance('channelmanagement_framework_singleton');
		$channelmanagement_framework_singleton->proxy_manager_id = $JRUser->userid;

		$response = $channelmanagement_framework_singleton->rest_api_communicate( $channel_name , 'DELETE' , 'cmf/property/local/'.$property_uid );

		if ( isset($response->data->response) && $response->data->response == true ) {
			if (!$output_now)
				$this->retVals = $response;
			else
				jomresRedirect( jomresURL( JOMRES_SITEPAGE_URL . "&task=channelmanagement_framework" ) );
		} else {
			logging::log_message("Failed to delete property ".$property_uid, 'CMF', 'WARNING');
		}
		

		

	}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return $this->retVals;
		}
	}
