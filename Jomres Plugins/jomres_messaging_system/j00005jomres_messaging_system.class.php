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

class j00005jomres_messaging_system {
	function __construct($componentArgs) {
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch) {
			$this->template_touchable=false; return;
		}
		$ePointFilepath = get_showtime('ePointFilepath');

		$popup = intval(jomresGetParam($_REQUEST, 'popup', 0));
		if ($popup == 1) {
			return;
		}

		if (jomres_bootstrap_version() != "5" && !jomres_cmsspecific_areweinadminarea() && !AJAXCALL ) {
			if (!jomres_cmsspecific_areweinadminarea()) {
				echo "<p class='alert alert-danger'>".jr_gettext('MESSAGING_SYSTEM_BSVERSION_WARNING', 'MESSAGING_SYSTEM_BSVERSION_WARNING', false)."</p>";
			}

			set_showtime('use_messaging_system', 0 ) ;
			return;

		}

		if (file_exists(get_showtime('ePointFilepath').'language'.JRDS.get_showtime('lang').'.php'))
			require_once(get_showtime('ePointFilepath').'language'.JRDS.get_showtime('lang').'.php');
		else {
			if (file_exists(get_showtime('ePointFilepath').'language'.JRDS.'en-GB.php'))
				require_once(get_showtime('ePointFilepath').'language'.JRDS.'en-GB.php');
		}

		if ( strstr(JOMRESPATH_BASE, '/wp-content/plugins/jomres/jomres/') )  {
			if (!jomres_cmsspecific_areweinadminarea() && !AJAXCALL ) {
				echo "<p class='alert alert-danger'>".jr_gettext('MESSAGING_SYSTEM_REST_API_LOCATION_WARNING', 'MESSAGING_SYSTEM_REST_API_LOCATION_WARNING', false)."</p>";
			}

			set_showtime('use_messaging_system', 0 ) ;
			return;
		}

		$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
		$jrConfig = $siteConfig->get();

		if (!isset($jrConfig['use_messaging_system'])) {
			$jrConfig['use_messaging_system'] = 1;
		}



		$thisJRUser = jomres_singleton_abstract::getInstance('jr_user');
		if( $thisJRUser->userIsRegistered && $jrConfig['use_messaging_system'] == 1 ) {
			$jomres_menu = jomres_singleton_abstract::getInstance('jomres_menu');
			$jomres_menu->add_item(10, jr_gettext('CONVERSATIONS', 'CONVERSATIONS', false), 'list_conversations', 'fa-comment');
		}

		$jomres_widgets = jomres_singleton_abstract::getInstance('jomres_widgets');
		$thisJRUser = jomres_singleton_abstract::getInstance('jr_user');
		if ($thisJRUser->accesslevel >= 50) {
			$jomres_widgets->register_widget('06001', 'widget_list_conversations', jr_gettext('CONVERSATIONS', 'CONVERSATIONS', false), true);
		}
	}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
