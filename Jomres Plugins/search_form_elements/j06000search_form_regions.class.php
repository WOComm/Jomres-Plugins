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

class j06000search_form_regions
	{
	function __construct( $componentArgs )
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch ) {
			    $this->template_touchable = false;
                $this->shortcode_data = array(
                    'task' => 'search_form_regions',
                    'info' => '_JOMRES_SHORTCODES_06000SHOW_SINGLE_REVIEW',
                    'arguments' => array(
                        0 => array(
                            'argument' => 'country',
                            'arg_info' => 'XXXXXXXXXXXXXXXXX',
                            'arg_example' => 'GB',
                        ),
                    )
                );
				return;
			}
			$ePointFilepath = get_showtime('ePointFilepath');
			$tmpBookingHandler = jomres_singleton_abstract::getInstance('jomres_temp_booking_handler');
 			$pageoutput = array();

            $country	= jomresGetParam( $_REQUEST, 'country', "" );

			$selected_region = '';
			if (isset($tmpBookingHandler->tmpsearch_data['ajax_search_composite_selections']["regions"]) && !empty($tmpBookingHandler->tmpsearch_data['ajax_search_composite_selections']["regions"])) {
				$selected_region = $tmpBookingHandler->tmpsearch_data['ajax_search_composite_selections']["regions"][0];
			}

			// I'm going to use data sources (originally developed for AUTOCOMPLETE search element) because the data has already been searched on. Because we could have multiple forms on a page (in theory) IMO it's better to do it this way than potentially performing the same query multiple times.

			jr_import('jomres_data_sources');
			$jomres_data_sources = new jomres_data_sources();
            $regions =  json_decode(json_encode($jomres_data_sources->get_data(get_showtime('lang'), 'regions')), true);

			$regions = array_unique($regions, SORT_REGULAR);

			foreach ($regions as $region) {
                if ($country != '' && $region->countrycode != $country) {
                    continue;
                }
				$url = jomresURL(JOMRES_SITEPAGE_URL.'&send=Search&calledByModule=mod_jomsearch_m0&region='.$region['regionname']);
				if ($region['regionname'] == $selected_region) {
					$selected = 'selected';
				} else {
					$selected = '';
				}
				$place_names[] = array('LABEL' => $region['regionname'] , 'VALUE' => $region['regionname'] , 'URL' => $url , 'SELECTED' => $selected );
			}

			usort($place_names, fn($a, $b) => $a['VALUE'] <=> $b['VALUE']);

			$placeholder_selected = '';
			if ($selected_region =='') {
				$placeholder_selected = "selected";
			}

            $onchange = false;
            if ((bool)get_showtime('search_form_elements_onchange') == true) {
                $onchange = true;
            }

			$pageoutput[ ] = array(
				'FORM_ID' =>  get_showtime('search_form_elements_random_identifier'),
				'PLACEHOLDER_SELECTED' => $placeholder_selected,
                'COUNTRY' => $country
			);

			$tmpl = new patTemplate();
			$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
			$tmpl->addRows('pageoutput', $pageoutput);
			$tmpl->addRows('regions', $place_names);

            if ($onchange == '') {
                $tmpl->readTemplatesFromInput( 'search_form_regions.html' );
            } else {

                $tmpl->readTemplatesFromInput( 'search_form_regions_onchange.html' );
            }
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


