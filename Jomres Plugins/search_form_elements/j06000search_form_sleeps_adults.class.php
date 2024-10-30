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

class j06000search_form_sleeps_adults
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
			$output = array();

			jr_import('jomSearch');
			$occupancy_levels = prepOccupancyLevels();
			if (!empty($occupancy_levels)) {
				$output[ 'highest_adults' ] = $occupancy_levels["highestOccupancyLevels"] ["highest_adults"];
				$output[ 'highest_children' ] = $occupancy_levels["highestOccupancyLevels"] ["highest_children"];
			} else {
				$output[ 'highest_adults' ] = 0;
				$output[ 'highest_children' ] = 0;
			}

			$sleeps_adults_selected = 2;

			if (isset($tmpBookingHandler->tmpsearch_data['ajax_search_composite_selections']['sleeps_adults'][0])) {
				$sleeps_adults_selected = $tmpBookingHandler->tmpsearch_data['ajax_search_composite_selections']['sleeps_adults'][0];
			}

			$output[ 'sleeps_adults_selected' ] = $sleeps_adults_selected;

			$output[ 'sleeps_adults_dropdown' ] = jomresHTML::integerSelectList(0, $output[ 'highest_adults' ], 1, 'sleeps_adults', ' ', $sleeps_adults_selected);

            $output['FORM_ID'] = generateJomresRandomString(10);

			$pageoutput[ ] = $output;
			$tmpl = new patTemplate();
			$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
			$tmpl->addRows('pageoutput', $pageoutput);
			$tmpl->readTemplatesFromInput( 'search_form_sleeps_adults.html' );
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


