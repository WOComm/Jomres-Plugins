<?php
	/**
	 * Jomres CMS Agnostic Plugin.
	 *
	 * @author Woollyinwales IT <sales@jomres.net>
	 *
	 * @version Jomres 9
	 *
	 * @copyright	2005-2015 Woollyinwales IT
	 * Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project
	 **/

// ################################################################
	defined('_JOMRES_INITCHECK') or die('Direct Access to this file is not allowed.');
// ################################################################

	class j06000nbe_booking_form
	{
		public function __construct()
		{
			$MiniComponents = jomres_getSingleton('mcHandler');
			if ($MiniComponents->template_touch) {
				$this->template_touchable = false;
				$this->shortcode_data = array(
					'task' => 'nbe_booking_form',
					'info' => '_JOMRES_SHORTCODES_06000NBE_FORM',
					'arguments' => array(
						array(
							'argument' => 'property_uid',
							'arg_info' => '_JOMRES_SHORTCODES_06000NBE_FORM_PROPERTY_UID',
							'arg_example' => '20',
						),
						array(
							'argument' => 'lang',
							'arg_info' => '_JOMRES_SHORTCODES_06000NBE_FORM_LANG',
							'arg_example' => 'es-ES',
						),
					),
				);

				return;
			}

			$ePointFilepath = get_showtime('ePointFilepath');

			if (isset($_REQUEST['lang'])) {
				$lang = $_REQUEST['lang'];
			} else {
				$lang = get_showtime('lang');
			}

			if (isset($_REQUEST['property_uid'])) {
				$property_uid = $_REQUEST['property_uid'];
			} else {
				$property_uid = get_showtime('property_uid');
			}

			$form_url = get_showtime('live_site').'/jomres/core-plugins/nbe_booking_form/index.php?image_off=1&property_uid='.$property_uid.'&lang='.$lang.'&api_url='.get_showtime('live_site').'/jomres/api/booking/';

			if (isset($componentArgs[ 'output_now' ])) {
				$output_now = $componentArgs[ 'output_now' ];
			} else {
				$output_now = true;
			}

			$output = array ('FORM_URL' => $form_url);
			$pageoutput[] = $output ;

			$tmpl = new patTemplate();
			$tmpl->setRoot($ePointFilepath);
			$tmpl->readTemplatesFromInput('iframe.html');
			$tmpl->addRows('pageoutput', $pageoutput);
			$this->retVals = $tmpl->getParsedTemplate();

			if ($output_now) {
				echo $this->retVals;
			}
		}

		// This must be included in every Event/Mini-component
		public function getRetVals()
		{
			return null;
		}
	}
