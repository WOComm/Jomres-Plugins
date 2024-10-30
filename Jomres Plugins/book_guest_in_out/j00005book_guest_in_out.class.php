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

class j00005book_guest_in_out
	{
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$obsolete_plugin_files = get_showtime('obsolete_plugin_files');
		$obsolete_plugin_files[] = get_showtime('ePointFilepath').'j02170bookguestin.class.php';
		$obsolete_plugin_files[] = get_showtime('ePointFilepath').'j02180bookguestout.class.php';
		$obsolete_plugin_files[] = get_showtime('ePointFilepath').'j02182savebookout.class.php';
		$obsolete_plugin_files[] = get_showtime('ePointFilepath').'j00010reception_option_07_bookaguestin.class.php';
		$obsolete_plugin_files[] = get_showtime('ePointFilepath').'j00010reception_option_08_bookaguestout.class.php';
		set_showtime('obsolete_plugin_files',$obsolete_plugin_files);
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
