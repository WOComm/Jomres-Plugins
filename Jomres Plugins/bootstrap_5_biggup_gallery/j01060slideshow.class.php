<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
* * @version Jomres 10.1.1
 *
 * @copyright	2005-2022 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/

// ################################################################
defined('_JOMRES_INITCHECK') or die('');
// ################################################################
	
	/**
	 * @package Jomres\Core\Minicomponents
	 *
     * Produces slideshows based on the Galleria slideshow functionality
	 * 
	 */

class j01060slideshow
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
	 
	public function __construct($componentArgs)
	{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance('mcHandler');
		if ($MiniComponents->template_touch) {
			$this->template_touchable = false;

			return;
		}

		if (isset($componentArgs[ 'property_uid' ])) {
			$property_uid = $componentArgs[ 'property_uid' ];
		} else {
			$property_uid = (int)jomresGetParam($_REQUEST, 'property_uid', 0);
			if ($property_uid == 0) {
				$property_uid = get_showtime('property_uid');
			}
		}

		if ($property_uid == 0) {
			return;
		}

		$this->retVals[ 'slideshow' ] = $MiniComponents->specificEvent('06000', 'property_biggup_gallery', array('output_now' => false, 'property_uid' => $property_uid));
	}


	public function getRetVals()
	{
		return $this->retVals;
	}
}
