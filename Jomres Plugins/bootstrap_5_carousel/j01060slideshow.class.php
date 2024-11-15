<?php
	/**
	 * Core file.
	 *
	 * @author Vince Wooll <sales@jomres.net>
	 *
	 * * @version Jomres 10.1.1
	 *
	 * @copyright	2005-2023 Vince Wooll
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

	class j01060slideshow
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
			$jrConfig = $siteConfig->get();

			$imagesArray = array();

			if (isset($componentArgs[ 'image_size' ])) {
				$image_size = (string)$componentArgs[ 'image_size' ];
			} else {
				if ( isset($_REQUEST['image_size']) && trim($_REQUEST['image_size']) != '' ) {
					$image_size = (string)jomresGetParam($_REQUEST, 'image_size', '');
				} else {
					$image_size = 'small';
				}
			}

			if ( $image_size != 'small' && $image_size != 'medium' && $image_size != 'large' ) {
				$image_size = 'small';
			}

			$jomres_media_centre_images = jomres_singleton_abstract::getInstance('jomres_media_centre_images');

			if (!isset($componentArgs[ 'size' ])) {
				$componentArgs[ 'size' ] = 'large';
			}

			$height = 0.65;
			if (isset($componentArgs[ 'height' ])) {
				$height = $componentArgs[ 'height' ];
			}

			$lightbox = 'true';
			if (isset($componentArgs[ 'lightbox' ])) {
				$lightbox = $componentArgs[ 'lightbox' ];
			}

			$autoplay = 'true';
			if (isset($componentArgs[ 'autoplay' ])) {
				$autoplay = $componentArgs[ 'autoplay' ];
			}

			$thumbnails = 'true';
			if (isset($componentArgs[ 'thumbnails' ])) {
				$thumbnails = $componentArgs[ 'thumbnails' ];
			}

			$transition = 'slide';
			if (isset($componentArgs[ 'transition' ])) {
				$transition = $componentArgs[ 'transition' ];
			}

			$showcounter = 'true';
			if (isset($componentArgs[ 'showcounter' ])) {
				$showcounter = $componentArgs[ 'showcounter' ];
			}

			$link_to_property_details = false;
			if (isset($componentArgs[ 'link_to_property_details' ])) {
				$link_to_property_details = $componentArgs[ 'link_to_property_details' ];
			}

			if (!isset($componentArgs[ 'images' ])) {
				if (isset($componentArgs[ 'property_uid' ])) {
					$property_uid = $componentArgs[ 'property_uid' ];
				} else {
					$property_uid = (int)jomresGetParam($_REQUEST, 'property_uid', 0);

					if ($property_uid == 0) {
						$property_uid = get_showtime('property_uid');
					}
				}

				if ($property_uid == 0) {
					return;
				}

				$jomres_media_centre_images->get_images($property_uid, array('slideshow'));
				$imagesArray = $jomres_media_centre_images->images ['slideshow'] [0];
			} else {
				$imagesArray = $componentArgs[ 'images' ];
			}

			$output = array();
			$rows = array();
			$pageoutput = array();

			$output['WIDTH'] = '';

			$card_image_top = 'card-img-top';
			if (isset($componentArgs[ 'imgtopoff' ])) {
				$card_image_top = '';
			} elseif ( isset($_REQUEST['imgtopoff'])) {
				$card_image_top = '';
			}

			$output['RANDOM_IDENTIFIER'] = generateJomresRandomString(10);
			$output['LIGHTBOX'] = $lightbox;
			$output['AUTOPLAY'] = $autoplay;
			$output['THUMBNAILS'] = $thumbnails;
			$output['HEIGHT'] = $height;
			$output['TRANSITION'] = $transition;
			$output['SHOWCOUNTER'] = $showcounter;

			$count = count($imagesArray);

			if ($count > 0) {
				for ($i = 0; $i < $count; ++$i) {
					$r = array();

					$r[ 'CARD_IMAGE_TOP' ] = $card_image_top;

					if ( $i ==0 ) {
						$r['ACTIVE'] = 'active';
						$r['CURRENT'] = 'class="active" aria-current="true"';
					} else {
						$r['ACTIVE'] = '';
						$r['CURRENT'] = 'class="active" aria-current="true"';
					}
					$r['COUNTER'] = $i;
					$r['SLIDE_TO'] = $i+1;

					if (isset($imagesArray[ $i ][ 'small' ])) {
						$r[ 'IMAGETHUMB' ] = $imagesArray[ $i ][ 'small' ];
					} else {
						$r[ 'IMAGETHUMB' ] = $jomres_media_centre_images->multi_query_images['noimage-small'];
					}

					$r['SMALL_IMAGE'] = $jomres_media_centre_images->multi_query_images['noimage-small'];
					$r['MEDIUM_IMAGE'] = $jomres_media_centre_images->multi_query_images['noimage-medium'];
					$r['LARGE_IMAGE'] = $jomres_media_centre_images->multi_query_images['noimage-large'];
					if ( isset($imagesArray[ $i ][ 'small' ])) {
						$r[ 'SMALL_IMAGE' ] = $imagesArray[ $i ][ 'small' ];
					}
					if ( isset($imagesArray[ $i ][ 'medium' ])) {
						$r[ 'MEDIUM_IMAGE' ] = $imagesArray[ $i ][ 'medium' ];
					}
					if ( isset($imagesArray[ $i ][ 'large' ])) {
						$r[ 'LARGE_IMAGE' ] = $imagesArray[ $i ][ 'large' ];
					}

					switch ($image_size)
					{
						case 'small':
							if ( isset($imagesArray[ $i ][ 'small' ])) {
								$r[ 'IMAGE' ] = $imagesArray[ $i ][ 'small' ];
							} else {
								$r[ 'IMAGE' ] = $jomres_media_centre_images->multi_query_images['noimage-small'];
							}
							break;
						case 'medium':
							if ( isset($imagesArray[ $i ][ 'medium' ])) {
								$r[ 'IMAGE' ] = $imagesArray[ $i ][ 'medium' ];
							} else {
								$r[ 'IMAGE' ] = $jomres_media_centre_images->multi_query_images['noimage-medium'];
							}
							break;
						case 'large':
							if ( isset($imagesArray[ $i ][ 'large' ])) {
								$r[ 'IMAGE' ] = $imagesArray[ $i ][ 'large' ];
							} else {
								$r[ 'IMAGE' ] = $jomres_media_centre_images->multi_query_images['noimage-large'];
							}
							break;
					}




					if ($link_to_property_details && (int) $componentArgs[ 'property_uid' ] > 0) {
						$r[ 'LINK' ] = get_property_details_url((int)$componentArgs[ 'property_uid' ]);
					} else {
						$r[ 'LINK' ] = '';
					}

					$r[ 'INTERVAL'] = rand(5000, 7000); // Slideshows may be shown in the property list area, so we'll randomise the interval a little, to make it seem a bit more natural

					$r[ 'RANDOM_IDENTIFIER' ] = generateJomresRandomString(10);

					$rows[] = $r;
				}

				$pageoutput[ ] = $output;
				$tmpl = new patTemplate();
				$tmpl->setRoot( $ePointFilepath.JRDS.'templates' );
				$tmpl->readTemplatesFromInput('slideshow.html');
				$tmpl->addRows('pageoutput', $pageoutput);
				$tmpl->addRows('rows', $rows);
				$tmpl->addRows('rows2', $rows);
				$this->retVals[ 'slideshow' ] = $tmpl->getParsedTemplate();
			} else {
				$jomres_media_centre_images->get_images($property_uid, array('property'));
				$this->retVals[ 'slideshow' ] = '<img src="'.$jomres_media_centre_images->images['property'][0][0]['medium'].'" class="responsive img-responsive" alt="property image"/>';
			}
		}


		public function getRetVals()
		{
			return $this->retVals;
		}
	}
