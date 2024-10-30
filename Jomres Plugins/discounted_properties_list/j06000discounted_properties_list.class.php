<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.13.0
 *
 * @copyright	2005-2018 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/

// ################################################################
defined('_JOMRES_INITCHECK') or die('');
// ################################################################

class j06000discounted_properties_list
{
	public function __construct($componentArgs)
	{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance('mcHandler');
		if ($MiniComponents->template_touch) {
			$this->template_touchable = false;
			$this->shortcode_data = array(
					'task' => 'discounted_properties_list',
					'arguments' => array(),
					'info' => '_JOMRES_SHORTCODES_06000DISCOUNTED_PROPERTIES_LIST',
				);
			return;
		}

		
		$query = 'SELECT `property_uid` FROM #__jomres_settings WHERE (`akey` = "lastminuteactive" AND `value` = 1) OR (`akey` = "wisepriceactive" AND `value` = 1) ';
		$propys = doSelectSql($query);
	
		$published_properties = get_showtime('published_properties_in_system');

		$discounted_properties = array();
		if (!empty($propys)) {
			foreach ($propys as $p) {
				if ( in_array( (int) $p->property_uid , $published_properties ) ) {
					$discounted_properties[] = (int) $p->property_uid;
				}
				
			}

            $result = get_property_module_data($discounted_properties);
            foreach ($result as $property) {
                echo $property['template'];
            }

/*			$MiniComponents->triggerEvent('01004', $componentArgs); // optional
			$MiniComponents->triggerEvent('01005', $componentArgs); // optional
			$MiniComponents->triggerEvent('01006', $componentArgs); // optional
			$MiniComponents->triggerEvent('01007', $componentArgs); // optional
			$componentArgs[ 'propertys_uid' ] = $discounted_properties;
			$componentArgs[ 'live_scrolling_enabled' ] = true;
			$MiniComponents->triggerEvent('01010', $componentArgs); // listPropertys*/
		}
	}


	// This must be included in every Event/Mini-component
	public function getRetVals()
	{
		return null;
	}
}
