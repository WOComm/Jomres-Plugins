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
     *
	 * 
	 */

class j06000property_biggup_gallery
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
			{
				$this->template_touchable = false;
				$this->shortcode_data = array (
					"task" => "property_biggup_gallery",
					"info" => "JOMRES_SHORTCODES_PROPERTY_BIGGUP_GALLERY_TITLE",
					"arguments" => array (
						array (
							"argument" => "property_biggup_gallery_property_uid",
							"arg_info" => "JOMRES_SHORTCODES_PROPERTY_BIGGUP_GALLERY_PROPERTY_UID",
							"arg_example" => "18",
						)
					)
				);
				return;
			}
		}

		$rating_threashold = 6;

		$this->retVals = '';
		$ePointFilepath = get_showtime('ePointFilepath');


		if (isset($componentArgs[ 'output_now' ])) {
			$output_now = $componentArgs[ 'output_now' ];
		} else {
			$output_now = true;
		}

		if (isset($componentArgs[ 'property_uid' ])) {
			$property_uid = (int)$componentArgs[ 'property_uid' ];
		} else {
			$property_uid = (int)jomresGetParam($_REQUEST, 'property_biggup_gallery_property_uid', 0);
		}

		$jomres_media_centre_images = jomres_singleton_abstract::getInstance('jomres_media_centre_images');
		$jomres_media_centre_images->get_images($property_uid, array('slideshow'));

		$current_property_details = jomres_singleton_abstract::getInstance('basic_property_details');
		$property_name = $current_property_details->get_property_name($property_uid);
		$booking_link = get_booking_url($property_uid);

		$mrConfig = getPropertySpecificSettings($property_uid);

		$slideshow_images = $jomres_media_centre_images->images['slideshow'];
		$filtered_images = array();
		foreach ($slideshow_images as $image_sets){
			foreach ($image_sets as $image_set) {
				if ( $image_set['small'] != '' && $image_set['large'] != '' ) {
					$image_set['ID'] = generateJomresRandomString(20);
					$filtered_images[] = $image_set;
				}
			}
		}
		if (empty($filtered_images)) {
			return;
		}

		jr_import('jomres_reviews');
		$Reviews = new jomres_reviews();
		$Reviews->property_uid = $property_uid;
		$itemReviews = $Reviews->showReviews($property_uid);
		$itemRating = $Reviews->showRating($property_uid);

		$reviews_template = '';
		if (!empty($itemReviews["fields"])) {
			foreach ($itemReviews["fields"] as $review) {
				if ($review['rating'] > $rating_threashold ) {
					$r = [];

					$Reviews->generate_review_rating_text($review[ 'rating' ]) ;

					$r['RATING_TEXT_COLOUR'] = 'text-success';
					if ($review[ 'rating' ] > 5 && $review[ 'rating' ] < 7  ) {
						$r['RATING_TEXT_COLOUR'] = 'text-warning';
					}

					if ($review[ 'rating' ] <= 5) {
						$r['RATING_TEXT_COLOUR'] = 'text-danger';
					}

					$r['SCORE'] = $review['rating'];
					$r['PROS'] = $review['pros'];
					$r['USER'] = $review['user_name'];
					$r[ 'RATING_STARS' ] = '';
					for ($i = 1; $i <= $review[ 'rating' ]; ++$i) {
						$r[ 'RATING_STARS' ] .= simple_template_output(JOMRES_TEMPLATEPATH_FRONTEND, $template = 'review_star_icon.html', '');
					}
					$rows[]=$r;
				}
			}
			if (!empty($rows)) {
				$output = array();
				$pageoutput = array();

				$output['REVIEWS_SUMMARY'] = $MiniComponents->specificEvent('06000', 'show_property_reviews_summary', array('output_now' => false, 'property_uid' => $property_uid));

				$pageoutput[]=$output;
				$tmpl = new patTemplate();
				$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
				$tmpl->readTemplatesFromInput( 'reviews_contents.html');
				$tmpl->addRows( 'pageoutput',$pageoutput);
				$tmpl->addRows( 'rows', $rows );
				$reviews_template = $tmpl->getParsedTemplate();
			}
		}

		$rows =[];
		$counter=0;
		foreach ( $filtered_images as $set) {
			$r=[];
			$r['SMALL'] = $set['small'];
			$r['LARGE'] = $set['large'];
			$r['ACTIVE'] = '';
			if ($counter==0){
				$r['ACTIVE'] = 'active';
			}
			$r['COUNTER'] = $counter;

			$counter++;
			$rows[]=$r;
		}

		$output = array();
		$pageoutput = array();

		$output['REVIEWS'] = $reviews_template;
		$output['PROPERTY_NAME'] = $property_name;
		$output['BOOKING_LINK'] = $booking_link;
		$output['STARSIMAGES'] = $MiniComponents->specificEvent('06000', 'show_property_stars', array('property_uid' => $property_uid , 'output_now' => false ));

		if ($mrConfig[ 'requireApproval' ] == '1') {
			$output[ 'BOOKING_BUTTON_TEXT' ] = jr_gettext('_BOOKING_CALCQUOTE', '_BOOKING_CALCQUOTE', false);
		} else {
			$output[ 'BOOKING_BUTTON_TEXT' ] = jr_gettext('_JOMRES_FRONT_MR_MENU_BOOKAROOM', '_JOMRES_FRONT_MR_MENU_BOOKAROOM', false);
		}

		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( 'modal_contents.html');
		$tmpl->addRows( 'pageoutput',$pageoutput);
		$tmpl->addRows( 'rows', $rows );
		$tmpl->addRows( 'rows2', $rows );
		$modal_template = $tmpl->getParsedTemplate();

		$output = array();
		$pageoutput = array();

		$output['MODAL_CONTENTS'] = $modal_template;


		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( 'gallery.html');
		$tmpl->addRows( 'pageoutput',$pageoutput);
		$tmpl->addRows( 'rows', $rows );
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
