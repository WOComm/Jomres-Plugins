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

/**
#
 * Configuration panel for gallery link input
 #
* @package Jomres
#
 */
class j00501sms_clickatell {
	/**
	#
	 * Constructor: Outputs the gallery link config inputs
	#
	 */
	function __construct($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		
		$mrConfig=getPropertySpecificSettings();
		
		if ($mrConfig['is_real_estate_listing']==1)
			return;
		
		$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
        $jrConfig = $siteConfig->get();
		
		if ($jrConfig[ 'sms_clickatell_active' ] != '1') {
			return;
		}
		
		$configurationPanel=$componentArgs['configurationPanel'];
		
		$configurationPanel->startPanel(jr_gettext("_JRPORTAL_SMS_CLICKATELL_TABTITLE",'_JRPORTAL_SMS_CLICKATELL_TABTITLE',false));
		
		$configurationPanel->setleft(jr_gettext("_JRPORTAL_SMS_CLICKATELL_NOTIFICATION_MOBILENUMBER",'_JRPORTAL_SMS_CLICKATELL_NOTIFICATION_MOBILENUMBER',false));
		$configurationPanel->setmiddle('<input type="text" class="inputbox"  size="50" name="cfg_sms_clickatell_notification_number" value="'.$mrConfig['sms_clickatell_notification_number'].'" />');
		$configurationPanel->setright(jr_gettext("_JRPORTAL_SMS_CLICKATELL_NOTIFICATION_MOBILENUMBER_DESC",'_JRPORTAL_SMS_CLICKATELL_NOTIFICATION_MOBILENUMBER_DESC',false));
		$configurationPanel->insertSetting();
		
		$configurationPanel->endPanel();
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
