<?php
	/**
	 * Core file.
	 *
	 * @author Vince Wooll <sales@jomres.net>
	 *
	 *  @version Jomres 10.3.0
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
	 */

	class j06000show_review
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
			$MiniComponents = jomres_singleton_abstract::getInstance('mcHandler');
			if ($MiniComponents->template_touch) {
				$this->template_touchable = true;
				$this->shortcode_data = array(
					'task' => 'show_review',
					'info' => '_JOMRES_SHORTCODES_06000SHOW_SINGLE_REVIEW',
					'arguments' => array(
						0 => array(
							'argument' => 'property_uid',
							'arg_info' => '_JOMRES_SHORTCODES_06000SHOW_SINGLE_REVIEW_ARG_PROPERTY_UID',
							'arg_example' => '1',
						),
						1 => array(
							'argument' => 'review_score_threashold',
							'arg_info' => '_JOMRES_SHORTCODES_06000SHOW_SINGLE_REVIEW_ARG_ALT_SCORE_THREASHOLD',
							'arg_example' => '8',
						),
						2 => array(
							'argument' => 'review_as_snippet',
							'arg_info' => '_JOMRES_SHORTCODES_06000SHOW_SINGLE_REVIEW_ARG_ALT_IS_SNIPPET',
							'arg_example' => '0',
						),
						3 => array(
							'argument' => 'single_review_id',
							'arg_info' => '_JOMRES_SHORTCODES_0600SHOW_SINGLE_REVIEW_ARG_ALT_REVIEW_ID',
							'arg_example' => '5',
						),
						4 => array(
							'argument' => 'single_review_template_path',
							'arg_info' => '_JOMRES_SHORTCODES_06000SHOW_SINGLE_REVIEW_ARG_ALT_TEMPLATE_PATH',
							'arg_example' => '/xxx/yyy/',
						),
						5 => array(
							'argument' => 'single_review_template_name',
							'arg_info' => '_JOMRES_SHORTCODES_06000SHOW_SINGLE_REVIEW_ARG_ALT_TEMPLATE_NAME',
							'arg_example' => 'show_single_review.html',
						),

					)
				);

				return;
			}
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
				$property_uid = (int)jomresGetParam($_REQUEST, 'property_uid', 0);
			}

			if (isset($componentArgs[ 'review_score_threashold' ])) {
				$review_score_threashold = (int)$componentArgs[ 'review_score_threashold' ];
			} else {
				$review_score_threashold = (int)jomresGetParam($_REQUEST, 'review_score_threashold', 0);
			}

			if (isset($componentArgs[ 'review_as_snippet' ])) {
				$review_as_snippet = (int)$componentArgs[ 'review_as_snippet' ];
			} else {
				$review_as_snippet = (int)jomresGetParam($_REQUEST, 'review_as_snippet', 0);
			}

			if (isset($componentArgs[ 'single_review_id' ])) {
				$single_review_id = (int)$componentArgs[ 'single_review_id' ];
			} else {
				if (isset($_REQUEST['single_review_id'])) {
					$single_review_id = (int)jomresGetParam($_REQUEST, 'single_review_id', 0);
				} else {
					$single_review_id = 0;
				}
			}

			$single_review_template_path = $ePointFilepath.'templates'.JRDS.find_plugin_template_directory();
			if (isset($componentArgs[ 'single_review_template_path' ])) {
				$single_review_template_path = (int)$componentArgs[ 'single_review_stars_path' ];
			}

			if (isset($componentArgs[ 'single_review_template_name' ])) {
				$template_name = $componentArgs[ 'single_review_template_name' ];
			} else {
				if (isset($_REQUEST['single_review_template_name'])) {
					$template_name = jomresGetParam($_REQUEST, 'single_review_template_name', 0);
				} else {
					if ($review_as_snippet == 1) {
						$template_name = 'show_single_review_snippet.html';
					} else {
						$template_name = 'show_single_review.html';
					}

				}
			}

			if ($property_uid == 0) {
				return;
			}

			$this->property_uid = $property_uid;

			if (!user_can_view_this_property($property_uid)) {
				return;
			}

			$current_property_details = jomres_singleton_abstract::getInstance('basic_property_details');
			$current_property_details->gather_data($property_uid);

			$output = array();
			$pageoutput = array();
			$rows = array();

			$output[ '_JOMRES_REVIEWS' ] = jr_gettext('_JOMRES_REVIEWS', '_JOMRES_REVIEWS', false, false);
			$output[ '_JOMRES_REVIEWS_AVERAGE_RATING' ] = jr_gettext('_JOMRES_REVIEWS_AVERAGE_RATING', '_JOMRES_REVIEWS_AVERAGE_RATING', false, false);
			$output[ '_JOMRES_REVIEWS_TOTAL_VOTES' ] = jr_gettext('_JOMRES_REVIEWS_TOTAL_VOTES', '_JOMRES_REVIEWS_TOTAL_VOTES', false, false);
			$output[ '_JOMRES_REVIEWS_NUMBER_AGREE_WITHREVIEW' ] = jr_gettext('_JOMRES_REVIEWS_NUMBER_AGREE_WITHREVIEW', '_JOMRES_REVIEWS_NUMBER_AGREE_WITHREVIEW', false, false);
			$output[ '_JOMRES_REVIEWS_NUMBER_DISAGREE_WITHREVIEW' ] = jr_gettext('_JOMRES_REVIEWS_NUMBER_DISAGREE_WITHREVIEW', '_JOMRES_REVIEWS_NUMBER_DISAGREE_WITHREVIEW', false, false);
			$output[ '_JOMRES_REVIEWS_THANKS_FOR_CONFIRM' ] = jr_gettext('_JOMRES_REVIEWS_THANKS_FOR_CONFIRM', '_JOMRES_REVIEWS_THANKS_FOR_CONFIRM', false, false);
			$output[ '_JOMRES_REVIEWS_ALREADY_CONFIRMED' ] = jr_gettext('_JOMRES_REVIEWS_ALREADY_CONFIRMED', '_JOMRES_REVIEWS_ALREADY_CONFIRMED', false, false);

			$output[ 'PROPERTY_NAME' ] = $current_property_details->property_name;

			jr_import('jomres_reviews');
			$Reviews = new jomres_reviews();
			$Reviews->property_uid = $property_uid;
			$itemReviews = $Reviews->showReviews($property_uid);
			$itemRating = $Reviews->showRating($property_uid);

			$review_ids = array();

			if (!empty($itemReviews)) {
				foreach ($itemReviews as $review ) {
					if (isset($itemReviews["rating_details"])) {
						foreach ($itemReviews["rating_details"] as $key => $val ) {
							$review_ids[] = $key;
						}
					}
				}
				$review_ids  = array_unique($review_ids);
			} else {
				return;
			}


			if ($itemReviews[ 'totalRows' ] > 0) {
				$output[ 'AVERAGE_RATING' ] = number_format($itemRating[ 'avg_rating' ], 1, '.', '');
				$output[ 'NUMBER_OF_REVIEWS' ] = $itemRating[ 'counter' ];

				$guest_names = array();

				$query = "SELECT enc_firstname , enc_surname , cms_user_id FROM #__jomres_guest_profile";
				$guest_details = doSelectSql($query);

				if (!empty($guest_details)) {
					foreach ($guest_details as $guest ) {
						$guest_names[$guest->cms_user_id] = array ("enc_firstname" =>$guest->enc_firstname , "enc_surname" =>$guest->enc_surname );
					}
				}

				jr_import('jomres_encryption');
				$this->jomres_encryption = new jomres_encryption();

				$review_details = $itemReviews[ 'rating_details' ];

				if ( $single_review_id > 0 ) { // We have been told to show a specific review
					if (!isset($itemReviews[ 'fields' ][$single_review_id])){
						echo '<div class="alert alert-danger">Cannot show specific review. Review id '.$single_review_id.' does not exist. You probably called this script through a shortcode and configured an invalid review id in the shortcode arguments</div>';
						return;
					}
					$review = $itemReviews[ 'fields' ][$single_review_id];
				} else {
					$tmp_arr = [];
					foreach ($itemReviews[ 'fields' ] as $rev) {
						$id = $rev['rating_id'];
						if ($review_score_threashold > 0 && $rev["rating"] >= $review_score_threashold ) {
							$tmp_arr[$id] = $rev;
						} elseif ($review_score_threashold == 0)  {
							$tmp_arr[$id] = $rev;
						}
					}
					$review_id = array_rand($tmp_arr,1);
					$review = $itemReviews[ 'fields' ][$review_id];
				}

				$r = array();

				$rating_text = $Reviews->generate_review_rating_text($review[ 'rating' ]) ;

				$r['RATING_TEXT_COLOUR'] = 'text-success';
				$r['RATING_SCORE_TEXT'] = jomres_badge(
					$rating_text,
					'success'
				);

				if ($review[ 'rating' ] > 5 &&$review[ 'rating' ] < 7  ) {
					$r['RATING_TEXT_COLOUR'] = 'text-warning';
					$r['RATING_SCORE_TEXT'] = jomres_badge(
						$rating_text,
						'warning'
					);
				}

				if ($review[ 'rating' ] <= 5) {
					$r['RATING_TEXT_COLOUR'] = 'text-danger';
					$r['RATING_SCORE_TEXT'] = jomres_badge(
						$rating_text,
						'danger'
					);
				}


				$r[ '_JOMRES_REVIEWS_IAGREE' ] = jr_gettext('_JOMRES_REVIEWS_IAGREE', '_JOMRES_REVIEWS_IAGREE', false, false);
				$r[ '_JOMRES_REVIEWS_IDISAGREE' ] = jr_gettext('_JOMRES_REVIEWS_IDISAGREE', '_JOMRES_REVIEWS_IDISAGREE', false, false);
				$r[ '_JOMRES_REVIEWS_PROS' ] = jr_gettext('_JOMRES_REVIEWS_PROS', '_JOMRES_REVIEWS_PROS', false, false);
				$r[ '_JOMRES_REVIEWS_CONS' ] = jr_gettext('_JOMRES_REVIEWS_CONS', '_JOMRES_REVIEWS_CONS', false, false);
				$r[ '_JOMRES_REVIEWS_SUBMITTEDDATE' ] = jr_gettext('_JOMRES_REVIEWS_SUBMITTEDDATE', '_JOMRES_REVIEWS_SUBMITTEDDATE', false, false);
				$r[ '_JOMRES_REVIEWS_TITLE' ] = jr_gettext('_JOMRES_REVIEWS_TITLE', '_JOMRES_REVIEWS_TITLE', false, false);
				$r[ '_JOMRES_REVIEWS_REVIEWBODY_SAID' ] = jr_gettext('_JOMRES_REVIEWS_REVIEWBODY_SAID', '_JOMRES_REVIEWS_REVIEWBODY_SAID', false, false);
				$r[ '_JOMRES_REVIEWS_DATE' ] = jr_gettext('_JOMRES_REVIEWS_DATE', '_JOMRES_REVIEWS_DATE', false, false);
				$r[ '_JOMRES_REVIEWS_RATING' ] = jr_gettext('_JOMRES_REVIEWS_RATING', '_JOMRES_REVIEWS_RATING');
				$r[ '_JOMRES_REVIEWS_REPORT_REVIEW' ] = jr_gettext('_JOMRES_REVIEWS_REPORT_REVIEW', '_JOMRES_REVIEWS_REPORT_REVIEW', false, false);
				$r[ '_JOMRES_REVIEWS_REVIEWED_BY' ] = jr_gettext('_JOMRES_REVIEWS_REVIEWED_BY', '_JOMRES_REVIEWS_REVIEWED_BY', false, false);

				$r[ 'RATING_ID' ] = $review[ 'rating_id' ];

				$r['LINK_TO_REVIEW'] = jomresUrl(JOMRES_SITEPAGE_URL.'&task=show_review&property_uid='.$property_uid.'&single_review_id='.$review[ 'rating_id' ]);

				$r['REVIEWER_FIRSTNAME'] = '';
				if (
					isset(
						$guest_names[ $review[ 'user_id' ] ]) &&
					( !isset($review[ 'user_name' ]) || trim($review[ 'user_name' ]) == '' )
				) {  // Reviewer details were not saved, we will query the db for them instead
					$guest_deets = $guest_names[ $review[ 'user_id' ] ];

					$r['REVIEWER_FIRSTNAME'] = $this->jomres_encryption->decrypt($guest_deets['enc_firstname']);
					$r['REVIEWER_SURNAME'] = $this->jomres_encryption->decrypt($guest_deets['enc_surname']);
				} else {
					$r['REVIEWER_FIRSTNAME'] = $review[ 'user_name' ];
				}

				$r['REVIEWER_PROFILE_LINK'] = jomresUrl(JOMRES_SITEPAGE_URL.'&task=show_user_profile&cms_user_id='.$review[ 'user_id' ]);

				$r['STAR'] = '';
				$r[ 'REVIEW_TITLE' ] = $review[ 'review_title' ];
				$r[ 'REVIEW_DESCRIPTION' ] = $review[ 'review_description' ];
				$r[ 'PROS' ] = $review[ 'pros' ];
				$r[ 'CONS' ] = $review[ 'cons' ];
				$r[ 'RATING' ] = $review[ 'rating' ];
				$r[ 'RATING_STARS' ] = '';
				for ($i = 1; $i <= $review[ 'rating' ]; ++$i) {
					$r[ 'RATING_STARS' ] .= '<i class="fa fa-star" aria-hidden="true"></i> ';
				}

				$r[ 'REPORT_REVIEWLINK' ] = '';
				//if ($thisJRUser->userIsRegistered)
				//{
				$r[ 'REPORT_REVIEWLINK' ] = '<a href="'.jomresURL(JOMRES_SITEPAGE_URL.'&task=report_review&amp;rating_id='.$r[ 'RATING_ID' ]).'">'.$r[ '_JOMRES_REVIEWS_REPORT_REVIEW' ].'</a>';
				$r[ 'REPORT_URL' ] = jomresURL(JOMRES_SITEPAGE_URL.'&task=report_review&amp;rating_id='.$r[ 'RATING_ID' ]);
				$r[ 'REPORT_TEXT' ] = $r[ '_JOMRES_REVIEWS_REPORT_REVIEW' ];
				//}

				$r[ 'PROPERTY_NAME' ] = $current_property_details->property_name;

				$confirm_states = $Reviews->showConfirm($review[ 'rating_id' ]);

				$rating_detail = array();
				if (array_key_exists($review[ 'rating_id' ], $review_details) && !is_null($review_details[ $review[ 'rating_id' ] ])) {
					$r[ '_JOMRES_REVIEWS_RATING_1' ] = jr_gettext('_JOMRES_REVIEWS_RATING_1', '_JOMRES_REVIEWS_RATING_1', false, false);
					$r[ '_JOMRES_REVIEWS_RATING_2' ] = jr_gettext('_JOMRES_REVIEWS_RATING_2', '_JOMRES_REVIEWS_RATING_2', false, false);
					$r[ '_JOMRES_REVIEWS_RATING_3' ] = jr_gettext('_JOMRES_REVIEWS_RATING_3', '_JOMRES_REVIEWS_RATING_3', false, false);
					$r[ '_JOMRES_REVIEWS_RATING_4' ] = jr_gettext('_JOMRES_REVIEWS_RATING_4', '_JOMRES_REVIEWS_RATING_4', false, false);
					$r[ '_JOMRES_REVIEWS_RATING_5' ] = jr_gettext('_JOMRES_REVIEWS_RATING_5', '_JOMRES_REVIEWS_RATING_5', false, false);
					$r[ '_JOMRES_REVIEWS_RATING_6' ] = jr_gettext('_JOMRES_REVIEWS_RATING_6', '_JOMRES_REVIEWS_RATING_6', false, false);

					$r[ 'rating_1' ] = $review_details[ $review[ 'rating_id' ] ][ 0 ].'/10';
					$r[ 'rating_1_percentage' ] = $review_details[ $review[ 'rating_id' ] ][ 0 ] * '10';
					$r[ 'rating_1_progressbar_colour' ] = calc_rating_progressbar_colour($r[ 'rating_1_percentage' ]);

					$r[ 'rating_2' ] = $review_details[ $review[ 'rating_id' ] ][ 1 ].'/10';
					$r[ 'rating_2_percentage' ] = $review_details[ $review[ 'rating_id' ] ][ 1 ] * '10';
					$r[ 'rating_2_progressbar_colour' ] = calc_rating_progressbar_colour($r[ 'rating_2_percentage' ]);

					$r[ 'rating_3' ] = $review_details[ $review[ 'rating_id' ] ][ 2 ].'/10';
					$r[ 'rating_3_percentage' ] = $review_details[ $review[ 'rating_id' ] ][ 2 ] * '10';
					$r[ 'rating_3_progressbar_colour' ] = calc_rating_progressbar_colour($r[ 'rating_3_percentage' ]);

					$r[ 'rating_4' ] = $review_details[ $review[ 'rating_id' ] ][ 3 ].'/10';
					$r[ 'rating_4_percentage' ] = $review_details[ $review[ 'rating_id' ] ][ 3 ] * '10';
					$r[ 'rating_4_progressbar_colour' ] = calc_rating_progressbar_colour($r[ 'rating_4_percentage' ]);

					$r[ 'rating_5' ] = $review_details[ $review[ 'rating_id' ] ][ 4 ].'/10';
					$r[ 'rating_5_percentage' ] = $review_details[ $review[ 'rating_id' ] ][ 4 ] * '10';
					$r[ 'rating_5_progressbar_colour' ] = calc_rating_progressbar_colour($r[ 'rating_5_percentage' ]);

					$r[ 'rating_6' ] = $review_details[ $review[ 'rating_id' ] ][ 5 ].'/10';
					$r[ 'rating_6_percentage' ] = $review_details[ $review[ 'rating_id' ] ][ 5 ] * '10';
					$r[ 'rating_6_progressbar_colour' ] = calc_rating_progressbar_colour($r[ 'rating_6_percentage' ]);
				}

				$r[ 'RATING_DATE' ] = $review[ 'rating_date' ];

				// Rating Schema
				$r[ 'RATING_DATE_META' ] = date('Y-m-d', strtotime($review[ 'rating_date' ]));
				$r[ 'RATING_SCHEMA_WORSTRATING' ] = min($review_details[ $review[ 'rating_id' ] ]);
				$r[ 'RATING_SCHEMA_BESTRATING' ] = max($review_details[ $review[ 'rating_id' ] ]);
				$sum = array_sum($review_details[ $review[ 'rating_id' ] ]);
				$count = count($review_details[ $review[ 'rating_id' ] ]);
				$r[ 'RATING_SCHEMA_RATINGVALUE' ] = $sum / $count;

				$jomres_media_centre_images = jomres_singleton_abstract::getInstance('jomres_media_centre_images');
				$r['REVIEWER_IMAGE_MEDIUM'] = $jomres_media_centre_images->multi_query_images["noimage-medium"];
				if ( $r['REVIEWER_FIRSTNAME'] != jr_gettext('ANONYMOUS','ANONYMOUS',false) ) {
					jr_import('jrportal_guest_profile');
					$jrportal_guest_profile = new jrportal_guest_profile();
					$jrportal_guest_profile->cms_user_id = $guest->cms_user_id;
					$result = $jrportal_guest_profile->get_guest_profile();
					$r['REVIEWER_IMAGE_MEDIUM'] =  $jrportal_guest_profile->image;
				}
				$rows[ ] = $r;

				$pageoutput[ ] = $output;
				$tmpl = new patTemplate();
				$tmpl->addRows('pageoutput', $pageoutput);
				$tmpl->addRows('rows', $rows);
				$tmpl->setRoot($single_review_template_path);
				$tmpl->readTemplatesFromInput($template_name);
				$this->retVals = $tmpl->getParsedTemplate();
			}
			if ($output_now) {
				echo $this->retVals;
			}
		}


		public function getRetVals()
		{
			return $this->retVals;
		}
	}
