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

class j00012extended_maps
	{
	function __construct()
		{
		$MiniComponents = jomres_singleton_abstract::getInstance('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		
		$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
		$jrConfig = $siteConfig->get();

		if ( !isset($jrConfig[ 'extmaps_overrideplist' ] )) {
			$jrConfig[ 'extmaps_overrideplist' ] = 0;
		}

		if ($jrConfig[ 'extmaps_overrideplist' ] != '1') {
			return;
		}
		
		$thisJRUser = jomres_singleton_abstract::getInstance('jr_user');

		if ($thisJRUser->userIsManager) {
			return;
		}
		
		$task = get_showtime("task");
		
		$calledByModule = jomresGetParam($_REQUEST, 'calledByModule', '');
		
		if ( strlen($task) == 0 && !isset($_REQUEST['plistpage']) && $calledByModule == '' )
			{
			$task = "extended_maps";
			set_showtime('task', $task);
			}
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
