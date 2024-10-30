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
defined( '_JOMRES_INITCHECK' ) or die( 'Direct Access to this file is not allowed.' );
// ################################################################

class j06002channelmanagement_framework_ui {
	function __construct($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		
		$ePointFilepath = get_showtime('ePointFilepath');
		
		if (file_exists($ePointFilepath.'language'.JRDS.get_showtime('lang').'.php'))
			require_once($ePointFilepath.'language'.JRDS.get_showtime('lang').'.php');
		else {
			if (file_exists($ePointFilepath.'language'.JRDS.'en-GB.php'))
				require_once($ePointFilepath.'language'.JRDS.'en-GB.php');
		}

		$eLiveSite = get_showtime('eLiveSite');

		$thisJRUser = jomres_singleton_abstract::getInstance('jr_user');

		jomres_cmsspecific_addheaddata('javascript', $eLiveSite.'javascript/', 'app.js');
		jomres_cmsspecific_addheaddata('javascript', $eLiveSite.'javascript/', 'endpoints.js');
		jomres_cmsspecific_addheaddata('javascript', $eLiveSite.'javascript/', 'constructRequest.js');
		jomres_cmsspecific_addheaddata('javascript', JOMRES_NODE_MODULES_RELPATH.'blockui-npm/', 'jquery.blockUI.js');

		// All channels calling into Jomres, to access the CMF REST API, must provide both a valid oauth token, and the channel id in the headers.  Enforcing both the need for the channel id and a token ensures that channels can only access properties that they've created. It means that property managers can use more than one channel against their account, if desired.

		// The CMF UI plugin uses the CMF REST API functionality. This allows the local UI to use the CMF REST API. It extends available functionality, and makes testing and dev of cmf api functionality easier.

		// To work on behalf of the manager just like a CMF REST API client, all of the CMF UI functionality needs to mimic an offsite client. This includes having a local channel, and sending API tokens as part of communications to the REST API.
		//
		// On startup j00005channelmanagement_framework.class.php (Channel Management Framework plugin) will check to see if there's a local UI channel for the user. If it doesn't, it will create it. Once the channel exists then this UI script can access the $user_channels["jomres_local_ui"] value, which is the local channel id.
		//
		// Next it will use the jomres_local_tokens class from Jomres 10.7 to assign a token to the $thisJRUser->params['jomres_local_cmf_ui_token'] variable. This token, combined with the $user_channels['jomres_local_ui'] channel can be used by ajax scripts to talk to the CMF REST API as a channel would do.
		//
		// In the following steps we will determine both the token, and ensure that jomres_local_ui exists
		//

		jr_import('channelmanagement_framework_channels');
		$channelmanagement_framework_channels = new channelmanagement_framework_channels();
		$user_channels = $channelmanagement_framework_channels->get_user_channels($thisJRUser->userid);

		$output = array();

		$output['API_URL']								= get_showtime('live_site').'/'.JOMRES_ROOT_DIRECTORY.'/api';
		$output['CHANNEL_NAME'] = 'jomres_local_ui';
		$output['TOKEN'] =  $thisJRUser->params['jomres_local_cmf_ui_token'];

		$pageoutput = array();
		$pageoutput[] =$output;
		$tmpl = new patTemplate();
		$tmpl->addRows( 'pageoutput', $pageoutput );
		$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( 'cmf_ui_dashboard.html' );
		echo $tmpl->getParsedTemplate();
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
