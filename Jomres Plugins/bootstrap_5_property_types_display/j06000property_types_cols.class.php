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

	/**
	 * @package Jomres\Core\Minicomponents
	 *
	 * Produces slideshows based on the Galleria slideshow functionality
	 *
	 */

	class j06000property_types_cols
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
				$this->shortcode_data = array (
					"task" => "property_types_cols",
					"info" => "JOMRES_SHORTCODES_06000PROPERTY_TYPES_COLS_INFO",
					'arguments' => array(
						0 => array(
							'argument' => 'b5ptc_property_type_uids',
							'arg_info' => 'JOMRES_SHORTCODES_06000PROPERTY_TYPES_COLS_INFO_ARG1',
							'arg_example' => '5,8,3'
						),
						1 => array(
							'argument' => 'b5ptc_property_countries',
							'arg_info' => 'JOMRES_SHORTCODES_06000PROPERTY_TYPES_COLS_INFO_ARG2',
							'arg_example' => 'GB,TW'
						),
						2 => array(
							'argument' => 'b5ptc_property_regions',
							'arg_info' => 'JOMRES_SHORTCODES_06000PROPERTY_TYPES_COLS_INFO_ARG3',
							'arg_example' => '1113,1258,3618'
						),
						3 => array(
							'argument' => 'b5ptc_alternate_template',
							'arg_info' => 'JOMRES_SHORTCODES_06000PROPERTY_TYPES_COLS_INFO_ARG4',
							'arg_example' => '1'
						),
					)
				);
				return;
			}

			$ePointFilepath = get_showtime('ePointFilepath');
			$this->retVals = '';

			$jomres_property_types = jomres_singleton_abstract::getInstance('jomres_property_types');
			$jomres_property_types->get_all_property_types();

			output_ribbon_styling();

			if (isset($componentArgs[ 'b5ptc_property_type_uids' ])) {
				$b5ptc_property_type_uids = explode("," , $componentArgs[ 'b5ptc_property_type_uids' ]);
			} else {
				$b5ptc_property_type_uids = explode("," , jomresGetParam($_REQUEST, 'b5ptc_property_type_uids', ''));
			}

			if ( !isset($b5ptc_property_type_uids) || $b5ptc_property_type_uids  == [0 => '']   ) {
				$b5ptc_property_type_uids = array();

				foreach ($jomres_property_types->property_types as $type){
					$b5ptc_property_type_uids[] = $type['id'];
				}
			}

			if (empty($b5ptc_property_type_uids)) {
				return;
			}

			if (isset($componentArgs[ 'b5ptc_property_countries' ])) {
				$b5ptc_property_countries = explode("," , $componentArgs[ 'b5ptc_property_countries' ]);
			} else {
				$b5ptc_property_countries = explode("," , jomresGetParam($_REQUEST, 'b5ptc_property_countries', ''));
			}

			if (isset($componentArgs[ 'b5ptc_property_regions' ])) {
				$b5ptc_property_regions = explode("," , $componentArgs[ 'b5ptc_property_regions' ]);
			} else {
				$b5ptc_property_regions = explode("," , jomresGetParam($_REQUEST, 'b5ptc_property_regions', ''));
			}

			if (isset($componentArgs[ 'b5ptc_property_regions' ])) {
				$b5ptc_alternate_template = (int)$componentArgs[ 'b5ptc_alternate_template' ];
			} else {
				$b5ptc_alternate_template = (int)jomresGetParam($_REQUEST, 'b5ptc_alternate_template', 0);
			}



			$property_type_ids = array();
			foreach ($b5ptc_property_type_uids as $ptype_id ) {
				if ( (int)$ptype_id > 0 ) {
					$property_type_ids[] = (int)$ptype_id;
				}
			}

			if (isset($componentArgs[ 'output_now' ])) {
				$output_now = $componentArgs[ 'output_now' ];
			} else {
				$output_now = true;
			}


			$jomres_media_centre_images = jomres_singleton_abstract::getInstance('jomres_media_centre_images');
			$images = $jomres_media_centre_images->get_site_images('property_types');

			$query = 'SELECT propertys_uid , ptype_id FROM #__jomres_propertys WHERE ptype_id IN ('.jomres_implode($property_type_ids).') AND published = 1 ';

			$search_string = '';

			$country_codes = array();
			if ( $b5ptc_property_countries  !== [0 => '']   ) {
				foreach ($b5ptc_property_countries as $country_code ) {
					$cc = filter_var($country_code, FILTER_SANITIZE_SPECIAL_CHARS);
					$country_codes[] = $cc;
					$search_string .= '&country[]='.$cc;
				}
				$query .=  ' AND property_country IN ('.jomres_implode( $country_codes , false ).') ';

			}

			$region_ids = array();
			if ($b5ptc_property_regions !== [0 => ''] ) {
				foreach ($b5ptc_property_regions as $region_id ) {
					$region_ids[] = (int)$region_id;
					$search_string .= '&regions[]='.(int)$region_id;
				}
				$query .=  ' AND property_region IN ('.jomres_implode( $region_ids).') ';

			}
			$properties = doSelectSql($query);

			$counts = array();
			foreach ($properties as $property) {
				$ptype_id = $property->ptype_id;
				if (isset($counts[$ptype_id] )) {
					$counts[$ptype_id]['count']++;
				} else {
					$abbv = $jomres_property_types->property_types[$ptype_id]['ptype'];
					if (isset($images['property_types'][$ptype_id][0]['large'])) {
						$counts[$ptype_id] = [
							'count' => 1 ,
							'property_type_abbv' => $abbv,
							'image' => $images['property_types'][$ptype_id][0]['large'],
							'ptype_id' => $ptype_id
						];
					}
				}
			}

			$output = array();
			$rows = array();
			$pageoutput = array();

			if (!empty( $counts )) {
				foreach ( $counts as $property_type ) {
					$r = array();
					$r['_JOMRES_HLIST_PROPERTIES'] = jr_gettext('_JOMRES_HLIST_PROPERTIES', '_JOMRES_HLIST_PROPERTIES', false);

					$r['IMAGE'] = $property_type['image'];
					$r['ABBV'] = $property_type['property_type_abbv'];
					$r['COUNT'] = $property_type['count'];
					$r['URL'] = jomresURL(JOMRES_SITEPAGE_URL.'&task=search&ptype='.$property_type['ptype_id'].$search_string);
					$rows[] = $r;
				}

				$output['TITLE'] = jr_gettext('JOMRES_06000PROPERTY_TYPES_TITLE_BROWSE', 'JOMRES_06000PROPERTY_TYPES_TITLE_BROWSE', false);

				if ($b5ptc_alternate_template == 0 ) {
					$template = 'property_types_cols.html';
				} elseif ($b5ptc_alternate_template == 1 ) {
					$template = 'property_types_cols_side_numbers.html';
				} else { // Using numbers gives us scope to add more templates in the future if desired
					$template = 'property_types_cols.html';
				}

				$pageoutput[] = $output;
				$tmpl = new patTemplate();
				$tmpl->setRoot($ePointFilepath . JRDS . 'templates');
				$tmpl->readTemplatesFromInput($template);
				$tmpl->addRows('pageoutput', $pageoutput);
				$tmpl->addRows('rows', $rows);
				$this->retVals = $tmpl->getParsedTemplate();

				if ($output_now) {
					echo $this->retVals;
				}
			}
		}


		public function getRetVals()
		{
			return $this->retVals;
		}
	}
