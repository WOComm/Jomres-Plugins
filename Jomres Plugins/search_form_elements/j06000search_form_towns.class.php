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

class j06000search_form_towns
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

            $country	= jomresGetParam( $_REQUEST, 'country', "" );
            $region	= jomresGetParam( $_REQUEST, 'region', 0 );

			$selected_town = '';
			if (isset($tmpBookingHandler->tmpsearch_data['ajax_search_composite_selections']["towns"]) && !empty($tmpBookingHandler->tmpsearch_data['ajax_search_composite_selections']["towns"])) {
				$selected_town = $tmpBookingHandler->tmpsearch_data['ajax_search_composite_selections']["towns"][0];
			}

			jr_import('jomres_data_sources');
			$jomres_data_sources = new jomres_data_sources();
            $towns =  json_decode(json_encode($jomres_data_sources->get_data(get_showtime('lang'), 'towns')), true);

			$towns = array_unique($towns, SORT_REGULAR);
			foreach ($towns as $town) {
                if ($country != '' && $town['countrycode'] != $country) {
                    continue;
                }
                if ($region > 0 && $town['region_id'] != $region) {
                    continue;
                }

				$url = jomresURL(JOMRES_SITEPAGE_URL.'&send=Search&calledByModule=mod_jomsearch_m0&town='.$town['townname']);
				if ($town['townname'] == $selected_town) {
					$selected = 'selected';
				} else {
					$selected = '';
				}
				$place_names[] = array('LABEL' => $town['townname'] , 'VALUE' => $town['townname'] , 'URL' => $url , 'SELECTED' => $selected );
			}

			usort($place_names, fn($a, $b) => $a['VALUE'] <=> $b['VALUE']);

			$placeholder_selected = '';
			if ($selected_town =='') {
				$placeholder_selected = "selected";
			}

            $onchange = false;
            if ((bool)get_showtime('search_form_elements_onchange') == true) {
                $onchange = true;
            }

			$pageoutput[ ] = array(
				'FORM_ID' =>  get_showtime('search_form_elements_random_identifier'),
				'PLACEHOLDER_SELECTED' => $placeholder_selected,
                'COUNTRY' => $country,
                'REGION' => $region,
			);
			$tmpl = new patTemplate();
			$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
			$tmpl->addRows('pageoutput', $pageoutput);
			$tmpl->addRows('towns', $place_names);
            if ($onchange == '') {
                $tmpl->readTemplatesFromInput( 'search_form_towns.html' );
            } else {

                $tmpl->readTemplatesFromInput( 'search_form_towns_onchange.html' );
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


