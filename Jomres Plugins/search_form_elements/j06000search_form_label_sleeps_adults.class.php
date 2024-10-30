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

class j06000search_form_label_sleeps_adults
	{
	function __construct( $componentArgs )
		{
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch )
			{
			$this->template_touchable = false;
/*				$this->shortcode_data = array(
					'task' => 'search_form_elements',
					'arguments_distinct' => true,
					'info' => '_JOMRES_SHORTCODES_06000PROPERTY_GRID',
					'arguments' => array(
						array(
							'argument' => 'element',
							'arg_info' => '_JOMRES_SHORTCODES_06000PROPERTY_GRID_PROPERTY_UIDS',
							'arg_example' => '56,43,60',
						),
						array(
							'argument' => 'property_cols',
							'arg_info' => '_JOMRES_SHORTCODES_06000PROPERTY_GRID_PROPERTY_COLS',
							'arg_example' => '6',
						),
					),
				);*/
				return;
			}
			$ePointFilepath = get_showtime('ePointFilepath');

			$pageoutput = array();
			$pageoutput[ ] = array(
				'FORM_ID' => generateJomresRandomString(10)
			);
			$tmpl = new patTemplate();
			$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
			$tmpl->addRows('pageoutput', $pageoutput);
			$tmpl->readTemplatesFromInput( 'search_form_label_sleeps_adults.html' );
			echo $tmpl->getParsedTemplate();
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


