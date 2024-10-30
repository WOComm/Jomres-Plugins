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

	class j00005bootstrap_5_property_list_templates {
		function __construct($componentArgs)
		{
			// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
			$MiniComponents = jomres_getSingleton('mcHandler');
			if ($MiniComponents->template_touch) {
				$this->template_touchable = false;
				return;
			}

			if (file_exists(get_showtime('ePointFilepath') . 'language' . JRDS . get_showtime('lang') . '.php'))
				require_once(get_showtime('ePointFilepath') . 'language' . JRDS . get_showtime('lang') . '.php');
			else {
				if (file_exists(get_showtime('ePointFilepath') . 'language' . JRDS . 'en-GB.php'))
					require_once(get_showtime('ePointFilepath') . 'language' . JRDS . 'en-GB.php');
			}

			require_once dirname(__FILE__) . JRDS . 'functions.php';

			$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
			$jrConfig = $siteConfig->get();

			if (!isset($jrConfig['property_list_template'])) {
				$jrConfig['property_list_template'] = 'list_properties';
			}

			if (!isset($jrConfig['property_photos_template'])) {
				$jrConfig['property_photos_template'] = 'list_properties_photos_layout';
			}

			$tmpBookingHandler = jomres_singleton_abstract::getInstance('jomres_temp_booking_handler');

			if (! jomres_cmsspecific_areweinadminarea() && ( get_showtime('task') == 'listproperties' || get_showtime('task') == 'search' || get_showtime('task') == '' )  ) {

				if ($jrConfig['property_list_template'] != 'list_properties') {
					$current_custom_paths = get_showtime('custom_paths');
					$current_custom_paths['property_list_minimalist.html'] = get_showtime('ePointFilepath') . 'templates';
					$current_custom_paths['property_list_box.html'] = get_showtime('ePointFilepath') . 'templates';

					set_showtime('custom_paths', $current_custom_paths);
				}

				$current_custom_paths = get_showtime('custom_paths');
				$current_custom_paths['property_list_minimalist.html'] = get_showtime('ePointFilepath') . 'templates';
				$current_custom_paths['property_list_box.html'] = get_showtime('ePointFilepath') . 'templates';
				$current_custom_paths['list_properties_photos_small_thumbs.html'] = get_showtime('ePointFilepath') . 'templates';
				$current_custom_paths['list_properties_photos_large_images.html'] = get_showtime('ePointFilepath') . 'templates';

				set_showtime('custom_paths', $current_custom_paths);

				if ( isset($_REQUEST['list_properties_template']) ) {
					$available_list_templates = get_available_property_list_templates();
					$available_photo_templates =get_available_property_photo_templates();
					if (array_key_exists($_REQUEST['list_properties_template'] ,$available_list_templates )) {
						$_REQUEST['list_properties_template'] = $_REQUEST['list_properties_template'];
					}
					if (array_key_exists($_REQUEST['list_properties_template'] ,$available_photo_templates )) {
						$_REQUEST['list_properties_template'] = $_REQUEST['list_properties_template'];
					}
				} else {
					if ( isset($tmpBookingHandler->tmpsearch_data[ 'current_property_list_layout' ]) && $tmpBookingHandler->tmpsearch_data[ 'current_property_list_layout' ] == 'tile') {
						$_REQUEST['list_properties_template'] = $jrConfig['property_photos_template'];
					} elseif ( isset($tmpBookingHandler->tmpsearch_data[ 'current_property_list_layout' ]) &&  $tmpBookingHandler->tmpsearch_data[ 'current_property_list_layout' ] == 'list') {
						$_REQUEST['list_properties_template'] = $jrConfig['property_list_template'];
					}

					if (isset($_REQUEST['propertylist_layout'])) {
						if ( $_REQUEST['propertylist_layout'] == 'list') {
							$_REQUEST['list_properties_template'] = $jrConfig['property_list_template'];
						} else {
							$_REQUEST['list_properties_template'] = $jrConfig['property_photos_template'];
						}
					}
				}
			}
		}

		/**
		#
		 * Must be included in every mini-component
		#
		 * Returns any settings the the mini-component wants to send back to the calling script. In addition to being returned to the calling script they are put into an array in the mcHandler object as eg. $mcHandler->miniComponentData[$ePoint][$eName]
		#
		 */
		function getRetVals()
		{
			return null;
		}
	}
