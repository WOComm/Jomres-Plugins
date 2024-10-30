<?php
	/**
	 * Core file.
	 *
	 * @author Vince Wooll <sales@jomres.net>
	 *
	 *  @version Jomres 10.5.4
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

	class j06000contactowner
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
				$this->shortcode_data = array(
					'task' => 'contactowner',
					'info' => '_JOMRES_SHORTCODES_06000CONTACTOWNER',
					'arguments' => array(0 => array(
						'argument' => 'property_uid',
						'arg_info' => '_JOMRES_SHORTCODES_06000CONTACTOWNER_ARG_PROPERTY_UID',
						'arg_example' => '18',
					),
					),
				);

				return;
			}
			$ePointFilepath=get_showtime('ePointFilepath');
			$eLiveSite = get_showtime('eLiveSite');

			$this->ret_vals = '';

			if (jomres_bootstrap_version() != "5") {
				return;
			}

			$use_messaging_system = get_showtime('use_messaging_system') ;
			if ($use_messaging_system == "0" ) {
				return;
			}

			if (defined('CONTACT_FORM_SHOWN')) {
				return;
			}
			define ('CONTACT_FORM_SHOWN' , 1 );

			$thisJRUser = jomres_singleton_abstract::getInstance('jr_user');

/*			if ( $thisJRUser->userIsManager ) {
				return;
			}*/

			$jomres_gdpr_optin_consent = new jomres_gdpr_optin_consent();
			if ( !$jomres_gdpr_optin_consent->user_consents_to_storage()&& !isset($_REQUEST['skip_consent_form'])  ) {
				//jomresRedirect(jomresURL(JOMRES_SITEPAGE_URL.'&task=opted_out&jr_redirect_url='.getCurrentUrl()), '');
				$consent_form = $MiniComponents->specificEvent('06000', 'show_consent_form' , array ('output_now' => false) );
				if (isset($componentArgs[ 'noshownow' ])) {
					$this->ret_vals = $consent_form;
				} else {
					echo $consent_form;
				}
			} else {
				$property_uid = (int)jomresGetParam($_REQUEST, 'property_uid', 0);
				$selectedProperty = (int)jomresGetParam($_REQUEST, 'selectedProperty', 0);

				if (isset($componentArgs['property_uid'])) {
					$property_uid = $componentArgs['property_uid'];
				}
				$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
				$jrConfig = $siteConfig->get();

				if (!isset($jrConfig['use_messaging_system'])) {
					$jrConfig['use_messaging_system'] = 1;
				}




				if ($jrConfig['use_messaging_system'] == 1 && $property_uid > 0 && $thisJRUser->userIsRegistered ) {
					$pageoutput = array();
					$output = array();

					jomres_cmsspecific_addheaddata('javascript', $eLiveSite.'iframe_resizer/', 'iframeResizer.min.js');

					$current_property_details = jomres_singleton_abstract::getInstance('basic_property_details');
					$current_property_details->gather_data($property_uid);

					$output['PROPERTY_NAME'] = $current_property_details->property_name;
					$output['PROPERTY_UID'] = $property_uid;
					$output[ '_JOMRES_CONTANT_US' ] = jr_gettext('_JOMRES_CONTANT_US', '_JOMRES_CONTANT_US');

					$pageoutput[ ] = $output;
					$tmpl = new patTemplate();
					$tmpl->setRoot($ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
					$tmpl->readTemplatesFromInput('contact_us_modal.html');
					$tmpl->addRows('pageoutput', $pageoutput);

					if (isset($componentArgs[ 'noshownow' ])) {
						$this->ret_vals = $tmpl->getParsedTemplate();
					} else {
						$tmpl->displayParsedTemplate();
					}
				} else {
					if ($property_uid > 0) {
						$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
						$jrConfig = $siteConfig->get();

						if ( this_cms_is_joomla() ) {
							if ( !isset($jrConfig[ 'joomla_login_module_id' ]) || $jrConfig[ 'joomla_login_module_id' ] == '') {
								$jrConfig[ 'joomla_login_module_id' ] = '0';
							}
							$this->ret_vals = simple_template_output($ePointFilepath . 'templates' . JRDS . find_plugin_template_directory(), 'login_module.html', (int)$jrConfig['joomla_login_module_id']) ;
						} else {
							if ( !isset($jrConfig[ 'wordpress_login_shortcode' ]) || $jrConfig[ 'wordpress_login_shortcode' ] == '') {
								$this->ret_vals = jomres_login_form_shortcode([]);
							} else {
								$login_form =  do_shortcode($jrConfig['wordpress_login_shortcode']);

								$this->ret_vals = simple_template_output($ePointFilepath . 'templates' . JRDS . find_plugin_template_directory(), 'login_widget.html', $login_form ) ;
							}
						}
					}


					if (isset($componentArgs[ 'noshownow' ])) {
						$this->ret_vals = $this->ret_vals;
					} else {
						echo $this->ret_vals;
					}
				}
			}
		}


		/**
		 * Must be included in every mini-component.
		#
		 * Returns any settings that the mini-component wants to send back to the calling script. In addition to being returned to the calling script they are put into an array in the mcHandler object as eg. $mcHandler->miniComponentData[$ePoint][$eName]
		 */

		public function getRetVals()
		{
			return $this->ret_vals;
		}
	}
