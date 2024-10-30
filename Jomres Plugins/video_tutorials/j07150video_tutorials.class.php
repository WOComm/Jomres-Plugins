<?php
/**
 * Core file
 *
 * @author Vince Wooll <sales@jomres.net>
 * @version Jomres 9.x
 * @package Jomres
 * @copyright	2005-2017 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly.
 **/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class j07150video_tutorials
	{
	function __construct($componentArgs)
		{
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch )
			{
			$this->template_touchable = false;
			$this->shortcode_data = array (
				"task" => "webhooks_core_documentation",
				"info" => "_JOMRES_SHORTCODES_06000WEBHOOKS_DOCS",
				"arguments" => array ()
				);
			return;
			}
		// Note
		
		/* $videos_array = array( 
			'SRP' => array(),
			'MRP' => array(),
			'TOUR' => array(),
			'REALESTATE' => array()
			); */
		
		//TODO need a Jintour video
		
		$thisJRUser = jomres_singleton_abstract::getInstance('jr_user');
		$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
        $jrConfig = $siteConfig->get();
		
		
		$videos_array = get_showtime("videos_array");
		
		
		 $editing_allowed = true;
		if (!$thisJRUser->userIsManager) {
            $editing_allowed = false;
        }

		if ($thisJRUser->userIsManager && $thisJRUser->accesslevel <= 50) { //receptionist or lower
            $editing_allowed = false;
        }

		if ( !$thisJRUser->superPropertyManager) {
            $editing_allowed = false;
        }

		if ($jrConfig[ 'editingModeAffectsAllProperties' ] == '1' && $thisJRUser->superPropertyManager) {
            $editing_allowed = true;
        }

		if ($editing_allowed) {
            $arr = array ("title" => "_JOMRES_TUTORIAL_TRANSLATE_GUEST_TYPES" , "description" => "_JOMRES_TUTORIAL_TRANSLATE_GUEST_TYPES_DESC" , "video_id" => "tD0E-xnVC6w" );
			$videos_array['MRP']['listcustomertypes'][] = $arr;
        }

		$arr = array ("title" => "_JOMRES_TUTORIAL_TRANSLATE_PROPERTY_DETAILS" , "description" => "_JOMRES_TUTORIAL_TRANSLATE_PROPERTY_DETAILS_DESC" , "video_id" => "bBpJXQpMJQk" );
		$videos_array['MRP']['edit_property'][] = $arr;
		
		
		set_showtime("videos_array" , $videos_array );
		
		
		}



	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}