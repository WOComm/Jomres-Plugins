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

class j06000search_form_autocomplete
{
    function __construct( $componentArgs )
    {
        // Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
        $MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
        if ( $MiniComponents->template_touch ) {
            $this->template_touchable = false;
            return;
        }
        $ePointFilepath = get_showtime('ePointFilepath');

        jr_import('jomres_data_sources');
        $jomres_data_sources = new jomres_data_sources();
        $countries =  json_decode(json_encode($jomres_data_sources->get_data(get_showtime('lang'), 'countries')), true);
        $regions =  json_decode(json_encode($jomres_data_sources->get_data(get_showtime('lang'), 'regions')), true);
        $towns =  json_decode(json_encode($jomres_data_sources->get_data(get_showtime('lang'), 'towns')), true);

		$place_names = array();
		$countries = array_unique($countries, SORT_REGULAR);
		foreach ($countries as $country) {
			$place_names[] = array('LABEL' => htmlspecialchars_decode($country['countryname']) , 'VALUE' => htmlspecialchars_decode($country['countrycode']) , 'SEARCH_FORM_FIELD' => 'countries') ;
		}

		$regions = array_unique($regions, SORT_REGULAR);
		foreach ($regions as $region) {
			$place_names[] = array('LABEL' => htmlspecialchars_decode($region['regionname']) , 'VALUE' =>htmlspecialchars_decode($region['regionname']) , 'SEARCH_FORM_FIELD' => 'regions');
		}

		$towns = array_unique($towns, SORT_REGULAR);
		foreach ($towns as $town) {
			$place_names[] = array('LABEL' => htmlspecialchars_decode($town["townname"]) , 'VALUE' => htmlspecialchars_decode($town["townname"]) , 'SEARCH_FORM_FIELD' => 'towns');
		}

        $pageoutput[ ] = array();
        $tmpl = new patTemplate();
        $tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
        $tmpl->addRows('pageoutput', $pageoutput);
        $tmpl->addRows('place_names', $place_names);

        $tmpl->readTemplatesFromInput('search_form_autocomplete.html');

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


