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

	class j00005bootstrap_5_property_details_templates {
		function __construct($componentArgs)
		{
			// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
			$MiniComponents =jomres_getSingleton('mcHandler');
			if ($MiniComponents->template_touch)
			{
				$this->template_touchable=false; return;
			}

			if (file_exists(get_showtime('ePointFilepath').'language'.JRDS.get_showtime('lang').'.php'))
				require_once(get_showtime('ePointFilepath').'language'.JRDS.get_showtime('lang').'.php');
			else
			{
				if (file_exists(get_showtime('ePointFilepath').'language'.JRDS.'en-GB.php'))
					require_once(get_showtime('ePointFilepath').'language'.JRDS.'en-GB.php');
			}

			require_once dirname(__FILE__).JRDS.'functions.php';

			$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
			$jrConfig = $siteConfig->get();

			if (!isset($jrConfig['property_details_template_managers_allowed_to_choose'])) {
				$jrConfig['property_details_template_managers_allowed_to_choose'] = '1';
			}

			if (!isset( $jrConfig['property_details_template'])){
				$jrConfig['property_details_template'] = 'property_details';
			}

			$property_uid = get_showtime('property_uid');

			if ( !jomres_cmsspecific_areweinadminarea() && $property_uid > 0 ) {
				$mrConfig = getPropertySpecificSettings($property_uid);

				if ($jrConfig['property_details_template_managers_allowed_to_choose'] == '0') {
					$mrConfig['property_details_template'] = $jrConfig['property_details_template'] ;
				}

				if (!isset($mrConfig['property_details_template'])) {
					$mrConfig['property_details_template'] = 'property_details';
				}

				if ( isset($_REQUEST['view_property_template']) ) {
					$available_templates = get_property_details_templates();
					if (array_key_exists($_REQUEST['view_property_template'] ,$available_templates )) {
						$mrConfig['property_details_template'] = $_REQUEST['view_property_template'];
					}
				}

				if ( $mrConfig['property_details_template'] != 'property_details') {
					$current_custom_paths = get_showtime('custom_paths');
					$current_custom_paths['property_details_lux.html']				= get_showtime('ePointFilepath').'templates';
					$current_custom_paths['property_details_minimalist.html']		= get_showtime('ePointFilepath').'templates';
					$current_custom_paths['property_details_calendar_only.html']	= get_showtime('ePointFilepath').'templates';
					$current_custom_paths['property_details_dynamo.html']			= get_showtime('ePointFilepath').'templates';
					$current_custom_paths['property_details_erika.html']			= get_showtime('ePointFilepath').'templates';

					$_REQUEST['view_property_template'] = $mrConfig['property_details_template'];

					if ( $_REQUEST['view_property_template'] != 'property_details') {
						$current_custom_paths['property_header.html']				= get_showtime('ePointFilepath').'templates';
						$current_custom_paths['show_property_reviews_summary.html']	= get_showtime('ePointFilepath').'templates';
					}

					set_showtime('custom_paths',$current_custom_paths);
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
