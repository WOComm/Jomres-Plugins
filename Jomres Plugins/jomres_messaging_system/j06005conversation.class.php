<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 *  @version Jomres 10.5.4
 *
 * @copyright	2005-2022 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/

// ################################################################
defined('_JOMRES_INITCHECK') or die('');
// ################################################################
	
	/**
	 * @package Jomres\Core\Minicomponents
	 *
	 * 
	 */

class j06005conversation
{	
	/**
	 *
	 * Constructor
	 * 
	 * Main functionality of the Minicomponent 
	 *
	 * 
	 * 
	 */
	 
	public function __construct($componentArgs)
	{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance('mcHandler');
		if ($MiniComponents->template_touch) {
			$this->template_touchable = false;

			return;
		}
		$ePointFilepath=get_showtime('ePointFilepath');
		$eLiveSite = get_showtime('eLiveSite');

		if (jomres_bootstrap_version() != "5") {
			return;
		}

		$use_messaging_system = get_showtime('use_messaging_system') ;
		if ($use_messaging_system == "0" ) {
			return;
		}
		jomres_cmsspecific_setmetadata('title', jomres_purify_html( jr_gettext('CONVERSATIONS', 'CONVERSATIONS', false) ));

		$thisJRUser = jomres_singleton_abstract::getInstance('jr_user');
		$this->jomres_encryption = new jomres_encryption();


		jr_import('jrportal_guest_profile');
		$jrportal_guest_profile = new jrportal_guest_profile();
		$jrportal_guest_profile->cms_user_id = $thisJRUser->id;
		$jrportal_guest_profile->get_guest_profile();

		$token = $thisJRUser->params["messaging_api_token"];

		jomres_cmsspecific_addheaddata('css', $eLiveSite, 'messaging.css');
		jomres_cmsspecific_addheaddata('javascript', $eLiveSite.'iframe_resizer/', 'iframeResizer.contentWindow.min.js');

		$property_uid = jomresGetParam($_REQUEST,'property_uid',0);

		$output = array();
		$pageoutput = array();

		if ( $property_uid > 0 ) {
			$all_published_properties = get_showtime('published_properties_in_system');

			if (!in_array($property_uid,$all_published_properties)){
				throw new Exception('Reply not set');
			}
			$current_property_details = jomres_singleton_abstract::getInstance('basic_property_details');
			$current_property_details->gather_data($property_uid);
			$output[ 'TARGET_NAME' ] = jr_gettext( '_JOMRES_CUSTOMTEXT_PROPERTY_NAME_'.$property_uid , $current_property_details->property_name , false);

			$jomres_media_centre_images = jomres_singleton_abstract::getInstance('jomres_media_centre_images');
			$jomres_media_centre_images->get_images($property_uid, array('property'));
			$output[ 'TARGET_IMAGE' ] = $jomres_media_centre_images->images['property'][0][0]['small'];

		} else {
			$output[ 'TARGET_NAME' ] = get_showtime('sitename');
		}

		$output['ELIVESITE']								=  $eLiveSite;
		$output['PROPERTY_UID']							= $property_uid;
		$output['TOKEN']								= $token;
		$output['CONVERSATION_STARTER_IMAGE']			= $jrportal_guest_profile->image;
		$output['USER_ID']								= $thisJRUser->id;
		$output['USER_NAME']							= $jrportal_guest_profile->firstname.' '.$jrportal_guest_profile->surname;

		$output['WELCOME_1']							=	jr_gettext( 'CONVERSATIONS_WELCOME_MESSAGE_1' , 'CONVERSATIONS_WELCOME_MESSAGE_1' , false);
		$output['WELCOME_2']							=	jr_gettext( 'CONVERSATIONS_WELCOME_MESSAGE_2' , 'CONVERSATIONS_WELCOME_MESSAGE_2' , false);
		$output['CONVERSATIONS_PLACEHOLDER']			=	jr_gettext( 'CONVERSATIONS_PLACEHOLDER' , 'CONVERSATIONS_PLACEHOLDER' , false);
		$output['CONVERSATIONS_MEMBERS']				=	jr_gettext( 'CONVERSATIONS_MEMBERS' , 'CONVERSATIONS_MEMBERS' , false);
		$output['CONVERSATION']							=	jr_gettext( 'CONVERSATION' , 'CONVERSATION' , false);

		$output['MESSAGING_SYSTEM_USER_TYPES_REGISTERED']			=	jr_gettext( 'MESSAGING_SYSTEM_USER_TYPES_REGISTERED' , 'MESSAGING_SYSTEM_USER_TYPES_REGISTERED' , false);
		$output['MESSAGING_SYSTEM_USER_TYPES_PROPERTY_MANAGER']		=	jr_gettext( 'MESSAGING_SYSTEM_USER_TYPES_PROPERTY_MANAGER' , 'MESSAGING_SYSTEM_USER_TYPES_PROPERTY_MANAGER' , false);
		$output['MESSAGING_SYSTEM_USER_TYPES_ADMINISTRATOR']		=	jr_gettext( 'MESSAGING_SYSTEM_USER_TYPES_ADMINISTRATOR' , 'MESSAGING_SYSTEM_USER_TYPES_ADMINISTRATOR' , false);
		$output['MESSAGING_SYSTEM_SEARCH_FIELD_PLACEHOLDER']		=	jr_gettext( 'MESSAGING_SYSTEM_SEARCH_FIELD_PLACEHOLDER' , 'MESSAGING_SYSTEM_SEARCH_FIELD_PLACEHOLDER' , false);

		$output['API_URL']								= get_showtime('live_site').'/'.JOMRES_ROOT_DIRECTORY.'/api/';

		$pageoutput[ ] = $output;
		$tmpl = new patTemplate();
		$tmpl->setRoot($ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput('conversation.html');
		$tmpl->addRows('pageoutput', $pageoutput);
		$tmpl->displayParsedTemplate();
	}


	public function getRetVals()
	{
		return null;
	}
}
