<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 *  @version Jomres 10.7.0
 *
 * @copyright	2005-2023 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/

// ################################################################
defined('_JOMRES_INITCHECK') or die('');
// ################################################################
	#[AllowDynamicProperties]
	/**
	 * @package Jomres\Core\Minicomponents
	 *
	 *
	 */

class j06000search_results_wrapper_top
{

	/**
	 *
	 * Constructor
	 *
	 * This minicomponent + wrapper_bottom and it's corresponding templates are holding scripts which don't do anything in jomres Core. They're intended to provide a mechanism for plugins to provide their own functionality to the search results page (e.g. sidebar widgets, columns, things like that)
	 *
	 *
	 *
	 */
	 
	public function __construct()
	{
		$MiniComponents = jomres_singleton_abstract::getInstance('mcHandler');
		if ($MiniComponents->template_touch) {
			$this->template_touchable = false;

			return;
		}

        if (AJAXCALL){
            return;
        }

        $ePointFilepath = get_showtime('ePointFilepath');

        $left_column = run_jomres_shortcode(' {jomres ajax_search &ajs_plugin=ajax_search_composite&target_div=sidebar_search_results}' );

        echo simple_template_output($ePointFilepath.'templates'.JRDS.find_plugin_template_directory(), 'search_results_wrapper_top.html', $left_column );

	}


	public function getRetVals()
	{
		return null;
	}
}
