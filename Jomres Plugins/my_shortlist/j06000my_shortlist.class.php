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


class j06000my_shortlist {
	function __construct()
		{
		$MiniComponents =jomres_singleton_abstract::getInstance('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$tmpBookingHandler =jomres_singleton_abstract::getInstance('jomres_temp_booking_handler');
		$property_uid_array = $tmpBookingHandler->tmpsearch_data['shortlist_items'];
		
		if (empty($property_uid_array))
			return;
		$property_uids = array();
		foreach ($property_uid_array as $p)
			{
			if ($p>0)
				$property_uids[]=(int)$p;
			}

		foreach ($property_uids as $property_uid)
			{
			$result = get_property_module_data(array($property_uid));
			foreach ($result as $property)
				{
				echo $property['template'];
				}
			}
		}

	function getRetVals()
		{
		return null;
		}
	}
