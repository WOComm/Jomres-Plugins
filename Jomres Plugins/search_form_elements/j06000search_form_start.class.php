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

class j06000search_form_start
	{
	function __construct( $componentArgs )
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch ) {
			    $this->template_touchable = false;
            $this->shortcode_data = array(
                'task' => 'search_form_start',
                'info' => 'XXXXXXXXXXXXXXXXX',
                'arguments' => array(
                    0 => array(
                        'argument' => 'onchange',
                        'arg_info' => 'XXXXXXXXXXXXXXXXX',
                        'arg_example' => '0/1',
                    ),
                )
            );
				return;
			}
			$ePointFilepath = get_showtime('ePointFilepath');

			$tmpBookingHandler = jomres_singleton_abstract::getInstance('jomres_temp_booking_handler');

			$arrivalDate = date('Y/m/d');
			$departureDate = date('Y/m/d' , strtotime( '+1 day') );

			if ( isset($_REQUEST['arrivalDate']) && isset($_REQUEST['departureDate']) ) {
				$arrivalDate	=jomresGetParam( $_REQUEST, 'asc_arrivalDate', "" );
				$departureDate	=jomresGetParam( $_REQUEST, 'asc_departureDate', "" );
			} elseif (isset($tmpBookingHandler->tmpsearch_data['ajax_search_composite_selections']['arrivalDate']) && isset($tmpBookingHandler->tmpsearch_data['ajax_search_composite_selections']['departureDate'])) {
				$arrivalDate	=$tmpBookingHandler->tmpsearch_data['ajax_search_composite_selections']['arrivalDate'];
				$departureDate	=$tmpBookingHandler->tmpsearch_data['ajax_search_composite_selections']['departureDate'];
			}

			$tmpBookingHandler->tmpsearch_data['ajax_search_composite_selections']['arrivalDate']= JSCalConvertInputDates($arrivalDate,$siteCal=true);
			$tmpBookingHandler->tmpsearch_data['ajax_search_composite_selections']['departureDate']= JSCalConvertInputDates($departureDate,$siteCal=true);

			$random_identifier = generateJomresRandomString(10);
			set_showtime('search_form_elements_random_identifier', $random_identifier);

            if (isset($_REQUEST['onchange']) && $_REQUEST['onchange'] == '1') {
                set_showtime('search_form_elements_onchange' , true);
            }

            jr_import('jomres_data_sources');
            $jomres_data_sources = new jomres_data_sources();
            $countries =  json_decode(json_encode($jomres_data_sources->get_data(get_showtime('lang'), 'countries')), true);
            $regions =  json_decode(json_encode($jomres_data_sources->get_data(get_showtime('lang'), 'regions')), true);
            $towns =  json_decode(json_encode($jomres_data_sources->get_data(get_showtime('lang'), 'towns')), true);

            $countries = array_unique($countries, SORT_REGULAR);
            foreach ($countries as $country) {
                $countries_src[] = array('COUNTRY_NAME' => htmlspecialchars_decode($country['countryname']) , 'COUNTRY_CODE' => htmlspecialchars_decode($country['countrycode']));
            }

            $regions = array_unique($regions, SORT_REGULAR);
            foreach ($regions as $region) {
                $regions_src[] = array('COUNTRY_CODE' => htmlspecialchars_decode($region['countrycode']) , 'REGION_NAME' =>htmlspecialchars_decode($region['regionname']));
            }

            $towns = array_unique($towns, SORT_REGULAR);
            foreach ($towns as $town) {
                $towns_src[] = array(
                    'TOWN_NAME'     => htmlspecialchars_decode($town["townname"]) ,
                    'REGION_NAME'     => htmlspecialchars_decode($town["regionname"])
                );

            }


			$pageoutput[ ] = array(
				'FORM_ID' => generateJomresRandomString(10),
				'SUBMITURL' => jomresURL(JOMRES_SITEPAGE_URL_NOSEF),

			);

			$tmpl = new patTemplate();
			$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
			$tmpl->addRows('pageoutput', $pageoutput);
            $tmpl->addRows('countries', $countries_src);
            $tmpl->addRows('regions', $regions_src);
            $tmpl->addRows('towns', $towns_src);

			$tmpl->readTemplatesFromInput( 'search_form_start.html' );
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


