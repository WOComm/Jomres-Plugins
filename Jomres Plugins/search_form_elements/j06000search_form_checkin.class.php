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

class j06000search_form_checkin
	{
	function __construct( $componentArgs )
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch )
			{
			$this->template_touchable = false;
				return;
			}
			$ePointFilepath = get_showtime('ePointFilepath');
			$tmpBookingHandler = jomres_singleton_abstract::getInstance('jomres_temp_booking_handler');
 			$pageoutput = array();

			$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
			$jrConfig = $siteConfig->get();
			$this_jomres_version = explode('.', $jrConfig['version']);

			$today = date('Y/m/d');
			if (!is_numeric($tmpBookingHandler->tmpsearch_data['ajax_search_composite_selections']['arrivalDate']) || $tmpBookingHandler->tmpsearch_data['ajax_search_composite_selections']['arrivalDate'] > $today + "2 years") {
				$tmpBookingHandler->tmpsearch_data['ajax_search_composite_selections']['arrivalDate'] = $today;
			}

			if ($this_jomres_version[0] >= 10 && $this_jomres_version[1] >= 7) {
				$pageoutput[ ] = array(
					'ARRIVALDATE' => generateDateInput('arrivalDate', $tmpBookingHandler->tmpsearch_data['ajax_search_composite_selections']['arrivalDate'], 'ad', true , false , [ "show_calendar" => false , 'input_classes' => []  ] ),
					'FORM_ID' =>  get_showtime('search_form_elements_random_identifier'),
				);
			} else {
				$pageoutput[ ] = array(
					'ARRIVALDATE' => generateDateInput('arrivalDate', $tmpBookingHandler->tmpsearch_data['ajax_search_composite_selections']['arrivalDate'], 'ad', true),
					'FORM_ID' =>  get_showtime('search_form_elements_random_identifier'),
				);
			}


			$tmpl = new patTemplate();
			$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
			$tmpl->addRows('pageoutput', $pageoutput);
			$tmpl->readTemplatesFromInput( 'search_form_checkin.html' );
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


