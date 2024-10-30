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

	class j06000ajax_search
	{
		function __construct($componentArgs)
		{
			$MiniComponents = jomres_getSingleton('mcHandler');
			if ($MiniComponents->template_touch) {
				$this->template_touchable = false;
				$this->shortcode_data = array(
					"task" => "ajax_search",
					'info' => '_JOMRES_SHORTCODES_06000AJSCOMPOSITE_INFO',
					'arguments' => array(
						0 => array(
							'argument' => 'ajs_plugin',
							'arg_info' => '_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_AJS_PLUGIN',
							'arg_example' => 'ajax_search_composite'
						),
						1 => array(
							'argument' => 'asc_template_style',
							'arg_info' => '_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_STYLE',
							'arg_example' => 'multiselect'
						),
						2 => array(
							'argument' => 'view_on_property_details',
							'arg_info' => '_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PROPERTY_DETAILS',
							'arg_example' => '0'
						),
						3 => array(
							'argument' => 'property_uids',
							'arg_info' => '_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_PROPERTY_UIDS',
							'arg_example' => '1,3,7,84,6'
						),
						4 => array(
							'argument' => 'ptypes',
							'arg_info' => '_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_PTYPES',
							'arg_example' => '12,4,34'
						),
						5 => array(
							'argument' => 'prefilter_country_code',
							'arg_info' => '_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_COUNTRY',
							'arg_example' => 'GB,FR'
						),
						6 => array(
							'argument' => 'region',
							'arg_info' => '_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_REGION',
							'arg_example' => 'Avon,Somerset'
						),
						7 => array(
							'argument' => 'asc_by_stars',
							'arg_info' => '_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_PRICE',
							'arg_example' => '1'
						),
						8 => array(
							'argument' => 'asc_by_price',
							'arg_info' => '_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_PRICE',
							'arg_example' => '1'
						),
						9 => array(
							'argument' => 'asc_by_features',
							'arg_info' => '_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_FEATURES',
							'arg_example' => '1'
						),
						10 => array(
							'argument' => 'asc_by_country',
							'arg_info' => '_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_COUNTRY',
							'arg_example' => '1'
						),
						11 => array(
							'argument' => 'asc_by_region',
							'arg_info' => '_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_REGION',
							'arg_example' => '1'
						),
						12 => array(
							'argument' => 'asc_by_town',
							'arg_info' => '_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_TOWN',
							'arg_example' => '1'
						),
						13 => array(
							'argument' => 'asc_by_roomtype',
							'arg_info' => '_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_ROOMTYPE',
							'arg_example' => '1'
						),
						14 => array(
							'argument' => 'asc_by_propertytype',
							'arg_info' => '_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_PROPERTY_TYPE',
							'arg_example' => '1'
						),
						15 => array(
							'argument' => 'asc_by_guestnumber',
							'arg_info' => '_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_GUESTNUMBER',
							'arg_example' => '1'
						),
						16 => array(
							'argument' => 'asc_by_date',
							'arg_info' => '_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_DATE',
							'arg_example' => '1'
						)
					)
				);
				return;
			}

			if ( isset($_REQUEST["_locale"])) { // It's probably a wordpress ajax request in editor to save a page, do nothing
				return;
			}

			$this->retVals = '';
			// The two edit tariff pages have calendars that will render below the input and therefore will be unclickable, if this search form is shown
			if ( isset($_REQUEST['task']) && ($_REQUEST['task'] == 'edit_tariff_standard' || $_REQUEST['task'] == 'edit_tariff_micromanage') ){
				return;
			}

			$ePointFilepath = get_showtime('ePointFilepath'); // Need to set this here, because the calls further down will reset the path to the called minicomponent's path.

			$siteConfig = jomres_getSingleton('jomres_config_site_singleton');
			$jrConfig = $siteConfig->get();

			if (!isset($jrConfig['animation_library_enabled'])) {
				$jrConfig['animation_library_enabled'] = 1;
			}

			$AOSStr = '';
			if ((bool)$jrConfig['animation_library_enabled']) {
				$AOSStr = 'AOS.refreshHard();';
			}

			if (isset($componentArgs['output_now'])) {
				$output_now = $componentArgs['output_now'];
			} else {
				$output_now = true;
			}

			$search_form = jomresGetParam($_REQUEST, 'ajs_plugin', "");
			$option = jomresGetParam($_REQUEST, 'option', "");

			jomres_cmsspecific_addheaddata("javascript", JOMRES_JS_RELPATH, "jquery.livequery.js");

			// We'll use 06009 to include any files that contain functions that might be needed by these scripts. In our default one, we will include a 06009 that imports the jomSearch.class.php because we'll want to use the prep search functions (beats reinventing the wheel). An ajax search minicomponent can have it's own 06009 for it's own search functions, if needed, or it could use the ones in jomSearch.
			$MiniComponents->triggerEvent('06009');
			prep_ajax_search_filter_cache();
			add_gmaps_source();

			$pageoutput = array();
			$output = array();
			$f = array();
			$forms = array();
			$output['AJAXURL'] = JOMRES_SITEPAGE_URL_AJAX;

			$random_identifier = generateJomresRandomString(10);

			// First we'll see if we have been told to run a specific ajax search plugin. If we haven't, we'll try to find ANY 6100 plugin. If that doesn't exist, we'll fall back to the default (6101) region search
			$componentArgs = array("FORM_NAME" => $random_identifier , 'output_now' => $output_now );
			if ($MiniComponents->eventSpecificlyExistsCheck('06100', $search_form) && $search_form != "")
				$result = $MiniComponents->specificEvent('06100', $search_form, $componentArgs);
			else if ($MiniComponents->eventFileExistsCheck('06100'))
				$result = $MiniComponents->triggerEvent('06100', $componentArgs);
			else
				$result = $MiniComponents->triggerEvent('06101', $componentArgs);


			$output['FORM_NAME'] = $random_identifier;
			if (isset($result['button_on'])) {
				if (!using_bootstrap())
					$output['SUBMITBUTTON'] = '<button name="searchbutton" class="fg-button ui-state-default ui-corner-all" type="button" onclick="submit_search(\'' . $random_identifier . '\');">' . jr_gettext('_JOMRES_SEARCH_BUTTON', '_JOMRES_SEARCH_BUTTON', false, false) . '</button>';
				else
					$output['SUBMITBUTTON'] = '<button name="searchbutton" class="btn btn-primary" type="button" onclick="submit_search(\'' . $random_identifier . '\');">' . jr_gettext('_JOMRES_SEARCH_BUTTON', '_JOMRES_SEARCH_BUTTON', false, false) . '</button>';
			} else {
				$output['ONCHANGE_JAVASCRIPT'] = '
			// Binds to the form so triggers the ajax search on change
			jomresJquery(document).ready(function(){
				jomresJquery("#' . $random_identifier . '").change(
					function(){
						submit_search("' . $random_identifier . '");
						killScroll = false; // IMPORTANT
						last_scrolled_id = 0;
						}
					);
				});
				';
			}

			if (!defined('_JOMRES_AJAX_SEARCH_SUBMIT_FUNCTION')) {
				define('_JOMRES_AJAX_SEARCH_SUBMIT_FUNCTION', 1);


				if ($option == "com_jomres")
					$target_div = 'jomres_content_area';
				else
					$target_div = 'asamodule_search_results';

				if (isset($_REQUEST['target_div']))
					$target_div = $_REQUEST['target_div'];

				$spinner_template = '';
				if (jomres_bootstrap_version() == '5') {
					$spinner_template = '<div class="spinner-border text-secondary position-absolute top-50 start-50" role="status">
  				<span class="visually-hidden">Loading...</span>';
				}

				$output['SUBMIT_FUNCTION'] = '
function submit_search(form_name)
	{
	var spinner_template = `'.$spinner_template.'`;
	populateDiv(\'' . $target_div . '\',spinner_template);
	jomresJquery("#search_panel").collapse("hide");
	var_form_data = jomresJquery("#"+form_name).serialize();
	jomresJquery.get(\'' . JOMRES_SITEPAGE_URL_AJAX . '\'+\'&task=ajax_search_filter&ajax_search_form_name=' . $random_identifier . '&nofollowtmpl&\'+var_form_data,
		function(data){
			
			var result = data.split("^");
			populateDiv(\'' . $target_div . '\',result[0]);
			eval(result[1]);
		
			document.querySelector(\'#' . $target_div . '\').scrollIntoView({
				behavior: \'smooth\'
			});

			parse_ajax_returned_scripts(data);
			'.$AOSStr.'
			jomresJquery(\'.plist-button\').livequery(function() {
				jomresJquery(this).button();
				jomresJquery(this).show();
				});
			jomresJquery(\'.plist-button-last\').livequery(function() {
				jomresJquery(this).button();
				jomresJquery(this).show();
				});
			bind_data_toggle();
			jomresJquery("input[type=checkbox][name=compare]").click(function() {
				var bol = jomresJquery("input[type=checkbox][name=compare]:checked").length >= 3;
				jomresJquery("input[type=checkbox][name=compare]").not(":checked").attr("disabled",bol);
				});
			
			}
		);
	}
		';
			};

			$f['SEARCHFORM'] = $result['SEARCHFORM'];

			$forms[] = $f;
			$pageoutput[] = $output;
			$tmpl = new patTemplate();
			$tmpl->setRoot($ePointFilepath . 'templates');
			$tmpl->readTemplatesFromInput('ajax_search.html');
			$tmpl->addRows('pageoutput', $pageoutput);
			$tmpl->addRows('forms', $forms);

			$this->retVals = $tmpl->getParsedTemplate();

			if ($output_now) {
				echo $this->retVals;
			}

		}

		// This must be included in every Event/Mini-component
		function getRetVals()
		{
			return $this->retVals;
		}
	}
