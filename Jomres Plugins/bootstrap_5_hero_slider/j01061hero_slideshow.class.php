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

class j01061hero_slideshow
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
        $ePointFilepath = get_showtime('ePointFilepath');

		$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');

		$jomres_media_centre_images = jomres_singleton_abstract::getInstance('jomres_media_centre_images');

		if (isset($componentArgs[ 'property_uids' ])) {
			$property_uids = $componentArgs[ 'property_uids' ];
		} else {
			$property_uids_str = jomresGetParam($_REQUEST, 'property_uids', '');
			$property_uids_arr = explode(  "," , $property_uids_str );
			$property_uids = array();
			if (!empty($property_uids_arr)) {
				foreach ($property_uids_arr as $property_uid) {
					$property_uids[] = (int)$property_uid;
				}
			}
		}

		if ( empty($property_uids) ) {
			return;
		}

		$output = array();
		$rows = array();
		$pageoutput = array();

		$output['WIDTH'] = '';

		$current_property_details = jomres_singleton_abstract::getInstance('basic_property_details');
		$current_property_details->gather_data_multi($property_uids);

		$jomres_property_list_prices = jomres_singleton_abstract::getInstance('jomres_property_list_prices');
		$jomres_property_list_prices->gather_lowest_prices_multi($property_uids, $lowest_ever = false, $hide_rpn = true);

		$output['RANDOM_IDENTIFIER'] = generateJomresRandomString(10);
		$output['SEARCH_FORM'] =  $componentArgs[ 'search_form' ];

		$counter = 0;
		foreach ($property_uids as $property_uid ) {
			$r = array();

			$r['SITENAME'] = get_showtime('sitename');

			$r['PROPERTY_NAME'] = $current_property_details->multi_query_result[$property_uid]['property_name'];
			$r['PROPERTY_DESCRIPTION'] = $current_property_details->multi_query_result[$property_uid]['property_description'];

            if ($counter == 0 ) {
        		$r['ACTIVE'] = 'active';
                $r['CURRENT'] = 'class="active" aria-current="true"';
            } else {
            	$r['ACTIVE'] = '';
                $r['CURRENT'] = 'class="" aria-current="false"';
            }

            $r['COUNTER'] = $counter;

			if ( $counter == count($property_uids)-1 ) {
				$r['SLIDE_TO'] = 0;
			} else {
				$r['SLIDE_TO'] = $counter+1;
			}

			$r[ 'MOREINFORMATIONLINK' ] = get_property_details_url($property_uid);

			$jomres_media_centre_images->get_images($property_uid, array('property'));
			$imagesArray = $jomres_media_centre_images->images ['property'] [0];

			if (isset($imagesArray[ 0 ][ 'small' ])) {
				$r[ 'IMAGETHUMB' ] = $imagesArray[0 ][ 'small' ];
			} else {
				$r[ 'IMAGETHUMB' ] = $jomres_media_centre_images->multi_query_images['noimage-small'];
			}
				
			if (isset($imagesArray[ 0 ][ 'large' ])) {
				$r[ 'IMAGE' ] = $imagesArray[ 0 ][ 'large' ];
			} else {
				$r[ 'IMAGE' ] = $jomres_media_centre_images->multi_query_images['noimage-large'];
			}

			$r[ 'PRICE_PRE_TEXT' ] = $jomres_property_list_prices->lowest_prices[$property_uid][ 'PRE_TEXT' ];
			$r[ 'PRICE_PRICE' ] = $jomres_property_list_prices->lowest_prices[$property_uid][ 'PRICE' ];
			$r[ 'PRICE_POST_TEXT' ] = $jomres_property_list_prices->lowest_prices[$property_uid][ 'POST_TEXT' ];

			$r['SLIDESHOW_INTERVAL'] =  $componentArgs[ 'slideshow_interval' ];

			$rows[] = $r;

			$counter++;
			}

		$pageoutput[ ] = $output;
		$tmpl = new patTemplate();
        $tmpl->setRoot( $ePointFilepath.JRDS.'templates'.JRDS.'bootstrap5' );
		$tmpl->readTemplatesFromInput('slideshow.html');
		$tmpl->addRows('pageoutput', $pageoutput);
		$tmpl->addRows('rows', $rows);
        $tmpl->addRows('rows2', $rows);
		$this->retVals[ 'slideshow' ] = $tmpl->getParsedTemplate();

	}


	public function getRetVals()
	{
		return $this->retVals;
	}
}
