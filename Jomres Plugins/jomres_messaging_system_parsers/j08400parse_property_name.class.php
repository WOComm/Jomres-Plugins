<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 *  @version Jomres 10.5.3
 *
 * @copyright	2005-2022 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/

// ################################################################
defined('_JOMRES_INITCHECK') or die('');
// ################################################################
	


class j08400parse_property_name
{	
	/**
	 *
	 * Constructor
	 * 
	 * Main functionality of the Minicomponent 
	 *
	 * 
	 * 
	 */
	 
	public function __construct()
	{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance('mcHandler');
		if ($MiniComponents->template_touch) {
			$this->template_touchable = false;

			return;
		}

		$group_name = get_showtime('jms_message_group_name');

		$regex = '/{property_name\s*.*?}/i';

		// find all instances of mambot and put in $matches
		preg_match_all( $regex, $group_name, $matches );

		if (count($matches)>0) {
			foreach ($matches[0] as $m) {
				$match = str_replace(array("{","}"),"",$m);

				$match = str_replace("&amp;","&",$match);
				$bang = explode (" ",$match);
				$property_uid = (int)$bang[1];

				$basic_property_details = jomres_singleton_abstract::getInstance('basic_property_details');
				$property_name = $basic_property_details->get_property_name($property_uid);

				$group_name = str_replace($m, $property_name ,$group_name);
			}
		}
		set_showtime('jms_message_group_name' , $group_name );
	}

	public function getRetVals()
	{
		return null;
	}
}
