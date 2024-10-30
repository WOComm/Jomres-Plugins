<?php
	/**
	 * Core file.
	 *
	 * @author Vince Wooll <sales@jomres.net>
	 *
	 * * @version Jomres 10.1.2
	 *
	 * @copyright	2005-2022 Vince Wooll
	 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
	 **/

// ################################################################
	defined('_JOMRES_INITCHECK') or die('');
// ################################################################

	use Joomla\CMS\Factory;

	/**
	 * @package Jomres\Core\Minicomponents
	 *
	 * Produces slideshows based on the Galleria slideshow functionality
	 *
	 */

	class j06000bs5_top_panel
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
			$eLiveSite = get_showtime('eLiveSite');

			$this->retVals = '';

			$tmpBookingHandler = jomres_singleton_abstract::getInstance('jomres_temp_booking_handler');

			jomres_cmsspecific_addheaddata('css', $eLiveSite.'/flag-icons-main/css/', 'flag-icons.min.css');

			if (isset($componentArgs[ 'output_now' ])) {
				$output_now = $componentArgs[ 'output_now' ];
			} else {
				$output_now = true;
			}

			$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
			$jrConfig = $siteConfig->get();

			$jomres_language = jomres_singleton_abstract::getInstance('jomres_language');
			$jomres_language->init();

			$thisJRUser = jomres_singleton_abstract::getInstance('jr_user');

			$output = array();
			$currencies_rows = array();
			$languages_rows = array();
			$add_property = array();
			$register = array();
			$pageoutput = array();


			$currentUrl = getCurrentUrl(true);

			//$currentUrl = str_replace ( "lang=".get_showtime('lang_shortcode') , "" , $currentUrl);

			// Strip lang from jomres sitepage url
			$url = preg_replace('/(&|\?)'.preg_quote('lang').'=[^&]*$/', '', JOMRES_SITEPAGE_URL);
			$jomresHome = preg_replace('/(&|\?)'.preg_quote('lang').'=[^&]*&/', '$1', $url);
			//	$jomresHome .= "&lang=".get_showtime('lang_shortcode');

			$langfile_crossref  = $jomres_language->define_langfile_to_languages_array();
			$flag_xref          = $this->get_flag_xreference();

			if ($jrConfig['selected_languages'] != '') {
				$selected_languages = explode(',',$jrConfig['selected_languages']);
			} else {
				$selected_languages = array_keys($langfile_crossref);
			}

			$jomres_currency_exchange_rates = jomres_singleton_abstract::getInstance('jomres_currency_exchange_rates');
			$currency_codes = jomres_singleton_abstract::getInstance('currency_codes');
			if (!isset($jomres_currency_exchange_rates->rates['GBP'])) {
				echo "Error, it looks like exchange rates are not setup yet. Have you saved your Open Exchange Rates key yet?";
				return;
			}

			$language_names = $jomres_language->define_langfile_to_languages_array();

			foreach ( $selected_languages as $language_code ) {
				if ( isset( $language_names[$language_code]) && isset($flag_xref[$language_code]) ) {
					if (isset($flag_xref[$language_code])) {
						$r=array();
						$r['CODE']      = $language_code;
						$r['NAME']      = $language_names[$language_code];
						$r['FLAG_CODE'] = $flag_xref[$language_code];
						$r['URL']       = $currentUrl.'&lang='.$language_code;
						$languages_rows[]=$r;
					}

				}
				uasort($languages_rows,function($a,$b){
					return strcmp($a["NAME"],$b["NAME"]);
				});
			}


			// It's always possible that the list of currencies returned by Open Exchange Rates doesn't match our currency codes stored here so first we need to find the currency codes that we can convert



			$supported_currencies = array();
			foreach ( $jomres_currency_exchange_rates->rates['GBP'] as $currency_code => $friendly_name) {
				if (isset($currency_codes->codes[$currency_code] )){
					$supported_currencies[$currency_code] = $currency_codes->codes[$currency_code];
				}
			}

			// Now that we have that, we can create the array for display in the modal
			foreach ($supported_currencies as $code => $currency_name) {
				$r = array();
				$r['CODE'] = $code;
				if (isset($currency_codes->symbols[$code])) {
					// The last element will be the currency code repeated. Useful elsewhere, but not here
					$bang = explode(" " , trim($currency_name) );
					array_pop($bang);
					$currency_name = implode(" " , $bang);
					$r['NAME'] = $currency_name;
					if ($r['CODE'] == 'BTC') {
						$r['NAME'] = 'Bitcoin';
					}
					$r['CURRENCY_PRE'] = $currency_codes->symbols[$code]['pre'];
					$r['CURRENCY_POST'] = $currency_codes->symbols[$code]['post'];

					$currencies_rows[]=$r;
				}

			}
			uasort($currencies_rows,function($a,$b){
				return strcmp($a["NAME"],$b["NAME"]);
			});

			$temp_arr = array();
			foreach ($currencies_rows as $key => $val) {
				if ($val['CODE'] == 'EUR') {
					$temp_arr[] = $val;
					unset($currencies_rows[$key]);
				}
				if ($val['CODE'] == 'USD') {
					$temp_arr[] = $val;
					unset($currencies_rows[$key]);
				}
				if ($val['CODE'] == 'GBP') {
					$temp_arr[] = $val;
					unset($currencies_rows[$key]);
				}
				if ($val['CODE'] == 'JPY') {
					$temp_arr[] = $val;
					unset($currencies_rows[$key]);
				}

			}

			// We'll move the 4 most used currencies to the top
			$currencies_rows = $temp_arr + $currencies_rows;

			$currentLang = get_showtime('lang');


			$current_currency_code                      = $tmpBookingHandler->user_settings[ 'current_exchange_rate' ];
			$output['CURRENT_CURRENCY_CODE']            = $current_currency_code;
			$output['CURRENCY_SYMBOL_PRE']              = $currency_codes->symbols[$current_currency_code]['pre'];
			$output['CURRENCY_SYMBOL_POST']             = $currency_codes->symbols[$current_currency_code]['post'];

			$output['REGISTRATION_URL'] = jomres_cmsspecific_getregistrationlink();
			$output['REGISTRATION_URL'] .= "&lang=".get_showtime('lang_shortcode');
			if ( this_cms_is_wordpress() ) {
				$output['LOGIN_URL'] = esc_url( wp_login_url( $currentUrl ) );
			} else {
				$output['LOGIN_URL'] = jomres_cmsspecific_getlogin_task();
			}

			$output['LOGIN_URL'] .="&lang=".get_showtime('lang_shortcode');


			$output['JOMRES_BS5_TOP_PANEL_CHOOSE_CURRENCY'] = jr_gettext('JOMRES_BS5_TOP_PANEL_CHOOSE_CURRENCY', 'JOMRES_BS5_TOP_PANEL_CHOOSE_CURRENCY', false);

			$language_modal = array( );
			if ( isset($flag_xref[$currentLang])) {
				if ( this_cms_is_wordpress() ) {
					if ( !isset($currentLang) || trim($currentLang) == '') {
						$currentLang = 'en-GB';
					}
					$language_modal[0] = [
						'JOMRES_BS5_TOP_PANEL_CHOOSE_LANGUAGE' => jr_gettext('JOMRES_BS5_TOP_PANEL_CHOOSE_LANGUAGE', 'JOMRES_BS5_TOP_PANEL_CHOOSE_LANGUAGE', false) ,
						'CURRENT_LANGUGAGE_FLAG_CODE' => $flag_xref[$currentLang]
					];
				} else {
					$conf = Factory::getConfig();
					if (($conf->get('sef') == 1)) {
						$language_modal = array();
					} else {
						$language_modal = array( );
						// Right now you have to use the joomla switcher because it does magic stuff
						/*$language_modal[0] = [
							'JOMRES_BS5_TOP_PANEL_CHOOSE_LANGUAGE' => jr_gettext('JOMRES_BS5_TOP_PANEL_CHOOSE_LANGUAGE', 'JOMRES_BS5_TOP_PANEL_CHOOSE_LANGUAGE', false) ,
							'CURRENT_LANGUGAGE_FLAG_CODE' => $flag_xref[$currentLang]
						];*/
					}
				}
			}

			$disabled_state = 'disabled';
			if ($thisJRUser->userIsRegistered) {
				$output['REGISTER_DISABLED']             = $disabled_state;
			} else {
				$output['ADD_PROPERTY_DISABLED']         = $disabled_state;
			}

			$output['JOMRES_BS5_TOP_PANEL_SIGN_IN'] = jr_gettext('JOMRES_BS5_TOP_PANEL_SIGN_IN', 'JOMRES_BS5_TOP_PANEL_SIGN_IN', false);
			$output['JOMRES_BS5_TOP_PANEL_REGISTER'] = jr_gettext('JOMRES_BS5_TOP_PANEL_REGISTER', 'JOMRES_BS5_TOP_PANEL_REGISTER', false);


			$multiproperty_options = array();
			if ( $jrConfig['is_single_property_installation'] != 1 || $thisJRUser->userIsManager ) {
				$multiproperty_options['JOMRES_BS5_TOP_PANEL_REGISTER_FIRST'] = jr_gettext('JOMRES_BS5_TOP_PANEL_REGISTER_FIRST', 'JOMRES_BS5_TOP_PANEL_REGISTER_FIRST', false);
				$multiproperty_options['_JOMRES_MANAGE_PROPERTIES'] = jr_gettext('_JOMRES_MANAGE_PROPERTIES', '_JOMRES_MANAGE_PROPERTIES', false);

				$multiproperty_options['JOMRES_HOME'] = $jomresHome;
				$multiproperty_options['LANG_SHORTCODE'] = get_showtime('lang_shortcode');

				$multiproperty_options['MANAGE_PROPERTIES_DISABLED']             = '';
				if (!$thisJRUser->userIsManager) {
					$multiproperty_options['MANAGE_PROPERTIES_DISABLED']             = $disabled_state;
				}
				$multiproperty_options = ARRAY ( 0 => $multiproperty_options );
			}

			$propertycreation_options = array();

			if ( $jrConfig['selfRegistrationAllowed'] == 1 )  {
				$propertycreation_options[0]['JOMRES_BS5_TOP_PANEL_LIST_YOUR_PROPERTY'] = jr_gettext('JOMRES_BS5_TOP_PANEL_LIST_YOUR_PROPERTY', 'JOMRES_BS5_TOP_PANEL_LIST_YOUR_PROPERTY', false);
				$propertycreation_options[0]['LANG_SHORTCODE'] = get_showtime('lang_shortcode');
				$propertycreation_options[0]['JOMRES_BS5_TOP_PANEL_REGISTER_FIRST'] = jr_gettext('JOMRES_BS5_TOP_PANEL_REGISTER_FIRST', 'JOMRES_BS5_TOP_PANEL_REGISTER_FIRST', false);
				$output['ADD_PROPERTY_DISABLED']         = '';
				$propertycreation_options[0]['JOMRES_HOME'] = $jomresHome;
			}

			$pageoutput[] = $output;
			$tmpl = new patTemplate();
			$tmpl->setRoot($ePointFilepath . JRDS . 'templates');
			$tmpl->readTemplatesFromInput('top_panel.html');
			$tmpl->addRows('pageoutput', $pageoutput);
			$tmpl->addRows('currencies_rows', $currencies_rows);
			$tmpl->addRows('languages_rows', $languages_rows);
			$tmpl->addRows('language_modal', $language_modal);
			if (!empty($multiproperty_options)){
				$tmpl->addRows('multiproperty_options', $multiproperty_options);
			}
			if (!empty($propertycreation_options)){
				$tmpl->addRows('propertycreation_options', $propertycreation_options);
			}
			if (!empty($add_property)) {
				$tmpl->addRows('add_property', $add_property);
			}
			if (!empty($register)) {
				$tmpl->addRows('register', $register);
			}
			$this->retVals = $tmpl->getParsedTemplate();

			if ($output_now) {
				echo $this->retVals;
			}
		}

		// Referencing https://flagicons.lipis.dev/ and https://github.com/lipis/flag-icons
		function get_flag_xreference()
		{
			$langs = array();


			$langs[ 'ar-AR' ] = 'ar';
			$langs[ 'bg-BG' ] = 'bg';
			$langs[ 'en-GB' ] = 'gb';
			$langs[ 'cs-CZ' ] = 'cz';
			$langs[ 'da-DK' ] = 'dk';
			$langs[ 'de-DE' ] = 'de';
			$langs[ 'de-CH' ] = 'ch';
			$langs[ 'el-GR' ] = 'gr';
			$langs[ 'en-CA' ] = 'ca';
			$langs[ 'en-US' ] = 'us';
			$langs[ 'es-ES' ] = 'es';
			$langs[ 'fr-FR' ] = 'fr';
			$langs[ 'he-IL' ] = 'il';
			$langs[ 'hr-HR' ] = 'hr';
			$langs[ 'hu-HU' ] = 'hu';
			$langs[ 'it-IT' ] = 'it';
			$langs[ 'lv-LV' ] = 'lv';
			$langs[ 'nb-NO' ] = 'no';
			$langs[ 'nl-NL' ] = 'nl';
			$langs[ 'pl-PL' ] = 'pl';
			$langs[ 'pt-BR' ] = 'br';
			$langs[ 'pt-PT' ] = 'pt';
			$langs[ 'ro-RO' ] = 'ro';
			$langs[ 'ru-RU' ] = 'ru';
			$langs[ 'sk-SK' ] = 'sl';
			$langs[ 'sl-SI' ] = 'si';
			$langs[ 'sr-YU' ] = 'rs';
			$langs[ 'zh-CN' ] = 'cn';
			$langs[ 'th-TH' ] = 'th';
			$langs[ 'sv-SE' ] = 'se';
			$langs[ 'ca-ES' ] = 'es-ct';
			$langs[ 'ja-JP' ] = 'jp';
			$langs[ 'uk-UA' ] = 'ua';
			$langs[ 'fa-IR' ] = 'ir';
			$langs[ 'az-AZ' ] = 'az';
			$langs[ 'tr-TR' ] = 'tr';
			$langs[ 'hy-AM' ] = 'am';

			return $langs;
		}

		public function getRetVals()
		{
			return $this->retVals;
		}
	}