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

class j00510stripe {
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$ePointFilepath = get_showtime('ePointFilepath');
		$eLiveSite = get_showtime('eLiveSite');
		$plugin="stripe";
		
		$thisJRUser=jomres_getSingleton('jr_user');
		jr_import("stripe_user");
		$stripe_user=new stripe_user();
		$stripe_user->getStripeUser($thisJRUser->id);
		
		$query		= "SELECT setting,value FROM #__jomres_pluginsettings WHERE prid = 0 AND plugin = '" . $plugin . "' ";
		$settingsList = doSelectSql( $query );
		if ( count ($settingsList) > 0)
			{
			foreach ( $settingsList as $set )
				{
				$settingArray[$plugin][ $set->setting ] = trim($set->value);
				}
			}

		if (isset($settingArray[$plugin][ 'stripe_client_id' ]) && $settingArray[$plugin][ 'stripe_client_id' ] != "")
			{
			if ($stripe_user->connected == false)
				{
				$output = array();
				$pageoutput=array();
				
				$output['STRIPE_REGISTER_CONNECT']		= jr_gettext('STRIPE_REGISTER_CONNECT','STRIPE_REGISTER_CONNECT',false,false);
				$output['STRIPE_SETUP_INFO']			= jr_gettext('STRIPE_SETUP_INFO','STRIPE_SETUP_INFO',false,false);
				$output['LINK']							= "https://connect.stripe.com/oauth/authorize?response_type=code&scope=read_write&client_id=".$settingArray[$plugin][ 'stripe_client_id' ];
				$output['IMAGE']						= $eLiveSite."/blue-on-light.png";
				
				$pageoutput[]=$output;
				$tmpl = new patTemplate();
				$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
				$tmpl->readTemplatesFromInput( 'connection_form.html');
				$tmpl->addRows( 'pageoutput',$pageoutput);
				$tmpl->displayParsedTemplate();
				
				}
			else
				{
				$output = array();
				$pageoutput=array();
				
				$output['STRIPE_SETUP_DONE']		= jr_gettext('STRIPE_SETUP_DONE','STRIPE_SETUP_DONE',false,false);
				$output['STRIPE_SETUP_DISCONNECT']		= jr_gettext('STRIPE_SETUP_DISCONNECT','STRIPE_SETUP_DISCONNECT',false,false);
				$output['DISCONNECT_LINK']			= jomresURL(JOMRES_SITEPAGE_URL_AJAX.'&task=stripe_disconnect');
				
				$pageoutput[]=$output;
				$tmpl = new patTemplate();
				$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
				$tmpl->readTemplatesFromInput( 'connected.html');
				$tmpl->addRows( 'pageoutput',$pageoutput);
				$tmpl->displayParsedTemplate();
				
				}
			}
		else
			{
			error_log( "Property manager attempted to configure Stripe gateway settings, however your Stripe Client ID hasn't been set. Once that's been done, also check that you have configured your Secret and Public keys are set.");
			}
		}

	/**
	#
	 * Must be included in every mini-component
	#
	 * Returns any settings the the mini-component wants to send back to the calling script. In addition to being returned to the calling script they are put into an array in the mcHandler object as eg. $mcHandler->miniComponentData[$ePoint][$eName]
	#
	 */
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
