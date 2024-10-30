<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
* * @version Jomres 10.1.2
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

class j06000bs5_panel_search_container
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
            $this->shortcode_data = array (
                "task" => "bs5_panel_search_container",
                "info" => "JOMRES_BS5_PANEL_SEARCH_CONTAINER",
                'arguments' => array(
                    0 => array(
                        'argument' => 'b5psc_ajs_composite_args',
                        'arg_info' => 'JOMRES_BS5_PANEL_SEARCH_CONTAINER_ARGS',
                        'arg_example' => 'prefilter_country_code=GB'
                    )
                )
            );
            return;
        }

        $ePointFilepath = get_showtime('ePointFilepath');

        if (isset($componentArgs[ 'output_now' ])) {
            $output_now = $componentArgs[ 'output_now' ];
        } else {
            $output_now = true;
        }

		$output = array();
		$pageoutput = array();

        $output['JOMRES_IMAGES_RELPATH']    = JOMRES_IMAGES_RELPATH;
        //$output['AJAX_SEARCH_COMPOSITE']    =

        $output['AJAX_SEARCH_COMPOSITE']    = $MiniComponents->specificEvent('06000', 'ajax_search', array('output_now' => false , 'ajs_plugin' => 'ajax_search_composite' ));
        $output['TOP_PANEL']                = $MiniComponents->specificEvent('06000', 'bs5_top_panel', array('output_now' => false));

        $pageoutput[] = $output;
        $tmpl = new patTemplate();
        $tmpl->setRoot($ePointFilepath . JRDS . 'templates');
        $tmpl->readTemplatesFromInput('container.html');
        $tmpl->addRows('pageoutput', $pageoutput);
        $this->retVals = $tmpl->getParsedTemplate();

        if ($output_now) {
            echo $this->retVals;
        }
	}

	public function getRetVals()
	{
		return $this->retVals;
	}
}
