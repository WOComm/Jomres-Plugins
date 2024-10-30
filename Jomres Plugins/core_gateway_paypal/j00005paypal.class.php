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

class j00005paypal 
	{
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
		else
			{
			if (file_exists($ePointFilepath.'language'.JRDS.'en-GB.php'))
				require_once($ePointFilepath.'language'.JRDS.'en-GB.php');
			}
			
		$obsolete_plugin_files = get_showtime('obsolete_plugin_files');
		$obsolete_plugin_files[] = get_showtime('ePointFilepath').'j10002paypal.class.php';
		$obsolete_plugin_files[] = get_showtime('ePointFilepath').'j16000paypal_settings.class.php';
		$obsolete_plugin_files[] = get_showtime('ePointFilepath').'j16000save_paypal_settings.class.php';
		set_showtime('obsolete_plugin_files',$obsolete_plugin_files);
		
		}

		
		
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
