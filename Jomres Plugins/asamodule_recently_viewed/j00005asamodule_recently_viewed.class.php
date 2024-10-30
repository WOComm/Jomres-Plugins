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

class j00005asamodule_recently_viewed {
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$ePointFilepath = get_showtime('ePointFilepath');

		$tmpBookingHandler =jomres_getSingleton('jomres_temp_booking_handler');
		if (!isset($tmpBookingHandler->user_settings['recently_viewed']))
			$tmpBookingHandler->user_settings['recently_viewed'] = array();
		if (get_showtime('task') == "viewproperty")
			{
			$property_uid = (int)$_REQUEST['property_uid'];
			if (!isset($tmpBookingHandler->user_settings['recently_viewed'] ))
				$tmpBookingHandler->user_settings['recently_viewed'] = array();
			
			if (!in_array($property_uid,$tmpBookingHandler->user_settings['recently_viewed']))
				$tmpBookingHandler->user_settings['recently_viewed'][] = $property_uid;
			}
		}

	/**
	#
	 * Must be included in every mini-component
	#
	 */
	function getRetVals()
		{
		return null;
		}
	}

