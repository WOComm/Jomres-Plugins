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


class j00005number_of_properties {
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_singleton_abstract::getInstance('mcHandler');
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
		
		if (get_showtime('task') == "asamodule_report")
			{
			$showtime = jomres_singleton_abstract::getInstance('showtime');
			
			$asamodule_plugin_information = get_showtime('asamodule_plugin_information');
			
			$asamodule_plugin_information['j06000number_of_properties'] = 
				array(
					"asamodule_task"=>"number_of_properties",
					"asamodule_info"=>"Designed to be used with asamodule, and will show the number of published properties on the site.",
					"asamodule_example_link"=>JOMRES_SITEPAGE_URL_NOSEF.'&tmpl='.get_showtime("tmplcomponent").'&topoff=1&task=number_of_properties',
					"asamodule_manual_link"=>''
					);
			set_showtime('asamodule_plugin_information',$asamodule_plugin_information);
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
