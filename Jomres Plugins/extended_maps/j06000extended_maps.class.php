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

class j06000extended_maps
{
    public function __construct()
    {
        $MiniComponents = jomres_getSingleton('mcHandler');
        if ($MiniComponents->template_touch) {
            $this->template_touchable = false;
            $this->shortcode_data = array(
                'task' => 'extended_maps',
                'info' => '_JOMRES_SHORTCODES_06000EXTENDED_MAPS',
                'arguments' => array(
                    array(
                        'argument' => 'ptype_ids',
                        'arg_info' => '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_PTYPE_IDS',
                        'arg_example' => '4,5,3',
                        ),
                    array(
                        'argument' => 'show_properties',
                        'arg_info' => '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_PROPERTIES',
                        'arg_example' => '1',
                        ),
                    array(
                        'argument' => 'show_events',
                        'arg_info' => '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_EVENTS',
                        'arg_example' => '1',
                        ),
                    array(
                        'argument' => 'show_attractions',
                        'arg_info' => '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_ATTRACTIONS',
                        'arg_example' => '1',
                        ),
                    array(
                        'argument' => 'country',
                        'arg_info' => '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_COUNTRY',
                        'arg_example' => 'GB',
                        ),
                    array(
                        'argument' => 'region',
                        'arg_info' => '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_REGION',
                        'arg_example' => '1111',
                        ),
                    array(
                        'argument' => 'town',
                        'arg_info' => '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_TOWN',
                        'arg_example' => 'Torquay',
                        ),
                    ),
                );

            return;
        }

		$ePointFilepath = get_showtime('ePointFilepath');
        $eLiveSite = get_showtime('eLiveSite');

		add_gmaps_source();

        $jomresConfig_live_site = get_showtime('live_site');

        $siteConfig = jomres_getSingleton('jomres_config_site_singleton');
        $jrConfig = $siteConfig->get();

        $allProperties = array();
        $rows = array();
        $output = array();
        $pageoutput = array();
		$all_property_uids = array();

        // e.g. "hotels:1;villas:6;camp sites:4"
        $arguments = jomresGetParam($_REQUEST, 'ptype_ids', '');
        $show_properties = (int)jomresGetParam($_REQUEST, 'show_properties', 1);
        $show_events = (int)jomresGetParam($_REQUEST, 'show_events', 1);
        $show_attractions = (int)jomresGetParam($_REQUEST, 'show_attractions', 1);

        if ($arguments != '' && $arguments != 0) {
            $property_type_bang = explode(',', $arguments);

            $required_property_type_ids = array();
            foreach ($property_type_bang as $ptype) {
                $required_property_type_ids[] = (int) $ptype;
            }
            $clause = ' AND `ptype_id` IN ('.jomres_implode($required_property_type_ids).') ';
        } else {
            $clause = '';
        }

		$searchAll = jr_gettext('_JOMRES_SEARCH_ALL', '_JOMRES_SEARCH_ALL', false);

		$country = jomresGetParam($_REQUEST, 'country', '');
		$region = jomresGetParam($_REQUEST, 'region', '');
		$town = jomresGetParam($_REQUEST, 'town', '');

        if ($country != '' && $country != $searchAll) {
            $clause .= " AND `property_country` = '".$country."' ";
        }
		if ($region != '' && $region != $searchAll) {
            $clause .= " AND `property_region` = '".$region."' ";
        }
		if ($town != '' && $town != $searchAll) {
			$town = jomres_cmsspecific_stringURLSafe($town);
            $town = str_replace('-', '%', $town);
            $clause .= " AND `property_town` LIKE '".$town."' ";
        }

		$override_directory = get_override_directory().JRDS.'custom_code'.JRDS;

		if ( file_exists($override_directory.'custom_map_style.style') ) {
			$output['MAP_STYLE'] = file_get_contents($override_directory.'custom_map_style.style');
		} else {
			$output['MAP_STYLE'] = file_get_contents(JOMRES_ASSETS_ABSPATH.'map_styles'.JRDS.$jrConfig['map_style'].'.style');
		}

        if ($jrConfig[ 'gmap_pois' ] == '0') {
            $output[ 'SUPPRESS_POIS' ] = '
					,
				styles:[{
					featureType:"poi",
					elementType:"labels",
					stylers:[{
						visibility:"off"
						}]
					}]
					';
        }

        $output['LIVESITE'] = get_showtime('live_site');
		$output['LANG'] = get_showtime('lang_shortcode');

        $output['WIDTH'] = '100%';
		if (isset($jrConfig[ 'extmaps_width' ])) {
            $output['WIDTH'] = (int)$jrConfig[ 'extmaps_width' ];
        }

		$output['HEIGHT'] = (int)$jrConfig[ 'extmaps_height' ];

        if ($jrConfig[ 'extmaps_groupmarkers' ] == '1')
			{
			jomres_cmsspecific_addheaddata("javascript",$eLiveSite.'javascript/',"markerclusterer.js");
			$output['GROUPMARKERS']="var markerCluster = new MarkerClusterer(map, markers, { imagePath: '".$eLiveSite.'markers/m'."' });";
			}

		//BC
		if ($jrConfig[ 'extmaps_maptype' ] == 'normal') {
			$jrConfig[ 'extmaps_maptype' ] = 'ROADMAP';
		}

        $output['MAPTYPE'] = $jrConfig[ 'extmaps_maptype' ];

        if ($show_properties == 1) {
            $query = "SELECT `propertys_uid`  
			FROM #__jomres_propertys 
			WHERE 
			published = 1 
			AND (`lat` != '' AND `long` != '' AND `lat` != '0' AND `long` != '0') 
			AND (CAST(`lat` AS DECIMAL(10,6)) BETWEEN '-89' AND '89') 
			AND (CAST(`long` AS DECIMAL(10,6)) BETWEEN '-179' AND '179')"
            .$clause;

            $result = doSelectSql($query);

            if (!empty($result)) {
                foreach ($result as $r) {
					$all_property_uids[] = (int)$r->propertys_uid;
                }
            }

            //grab the property names
            $current_property_details = jomres_singleton_abstract::getInstance('basic_property_details');
            $current_property_details->gather_data_multi( $all_property_uids );

            //Grab the property imaages
            $jomres_media_centre_images = jomres_singleton_abstract::getInstance('jomres_media_centre_images');
            $jomres_media_centre_images->get_images_multi($all_property_uids, array('property'));

            foreach ($all_property_uids as $puid) {
                $r = array();
				$o = array();
				$pageoutput = array();

				$current_property_details = jomres_singleton_abstract::getInstance('basic_property_details');
				$current_property_details->gather_data($puid);

				$mrConfig = getPropertySpecificSettings($puid);

				$jomres_property_types = jomres_singleton_abstract::getInstance('jomres_property_types');
				$jomres_property_types->get_property_type($current_property_details->ptype_id);

				if (isset($jomres_property_types->property_type['marker_image']) && trim($jomres_property_types->property_type['marker_image'] != '' ))
					$r['ICON'] = $jomres_property_types->property_type['marker_image'];

				$r['lat'] = str_replace( "&#45;" , "-"  , $current_property_details->lat);
				$r['long'] = str_replace( "&#45;" , "-"  , $current_property_details->long);

				if (jomres_bootstrap_version() == '5') {
					$popup_layout = 1;
					switch ($popup_layout) {
						case '2':
							$module_output_template = 'popup_2.html';
							break;
						case '1':
						default:
							$module_output_template = 'popup_1.html';
							break;
					}

					$arr = get_property_module_data(array($puid) , $ePointFilepath.'templates'.JRDS.'bootstrap5'.JRDS , $module_output_template );
					$str = $arr[$puid]['template'];
				} else {
					$jomres_media_centre_images->get_images($puid, array('property'));
					$r['property_image'] = $jomres_media_centre_images->images ['property'][0][0]['small'];

					$r['URL'] = get_property_details_url($puid);

					$o['PROPERTY_NAME'] = $current_property_details->property_name;

					$o['URL'] = $r['URL'];

					if ($jrConfig[ 'extmaps_show_desc' ] == '0') {
						$o['PROPERTY_DESCRIPTION']="";
					} else {
						$o['PROPERTY_DESCRIPTION'] = str_replace("'", '`',strip_tags($current_property_details->property_description));

						if ($jrConfig[ 'extmaps_trim_desc' ] == '1') {
							$trim_value = (int)$jrConfig[ 'extmaps_trim_value' ];
							$o['PROPERTY_DESCRIPTION'] = jr_substr(strip_tags($current_property_details->property_description),0,$trim_value,"UTF-8")."...";
						}
					}
					if ( $mrConfig['hide_local_address'] == '1' ) {
						$o[ 'PROPERTY_STREET' ] =  jr_gettext('HIDDEN_ADDRESS_PLACEHOLDER', 'HIDDEN_ADDRESS_PLACEHOLDER', false);
					} else {
						$o['PROPERTY_STREET'] = str_replace("'", '`',$current_property_details->property_street);
					}

					$o['PROPERTY_TOWN'] = str_replace("'", '`',$current_property_details->property_town);

					$o['PROPERTY_REGION'] = str_replace("'", '`',$current_property_details->property_region);

					$o['IMAGE'] = $r['property_image'];
					$o['VIEW_LINK'] = '<a href="'.$r['URL'].'">'.jr_gettext('_JOMRES_COM_A_CLICKFORMOREINFORMATION','_JOMRES_COM_A_CLICKFORMOREINFORMATION',false,false).'</a>';
					$o['POPUP_WIDTH'] = $jrConfig[ 'extmaps_popupwidth' ];
					$o['IMG_WIDTH'] = $jrConfig[ 'extmaps_img_width' ];
					$o['IMG_HEIGHT'] = $jrConfig[ 'extmaps_img_height' ];

					$pageoutput[] = $o;
					$tmpl = new patTemplate();
					$tmpl->setRoot($ePointFilepath.'templates'.JRDS.find_plugin_template_directory());
					$tmpl->readTemplatesFromInput('popup.html');
					$tmpl->addRows('pageoutput', $pageoutput);
					$str = $tmpl->getParsedTemplate();
				}





                $str = trim($str);
                $str = str_replace('\r\n', '', $str);
                $str = str_replace(chr(10), ' ', $str);
                $str = str_replace(chr(13), ' ', $str);

				$str = str_replace( '"', '\"', $str);
				$str = str_replace( "'", "\'", $str);

                $r['POPUP'] = $str;

				$rows[] = $r;

				unset($tmpl);
            }
        }

        $events = array();
        $attractions = array();
        if (file_exists(JOMRES_COREPLUGINS_ABSPATH.'local_events'.JRDS.'plugin_info.php')) {
            if ($show_events == 1) {
                $today = date('Y-m-d');
                $query = "SELECT * FROM #__jomres_local_events WHERE start_date >= '".$today."'";
                $result = doSelectSql($query);

                if (!empty($result)) {
                    foreach ($result as $res) {
                        $e = array();
						$o = array();
                        $pageoutput = array();

						$e['LAT'] = str_replace("&#45;" , "-" , $res->latitude);
                        $e['LONG'] = str_replace("&#45;" , "-" , $res->longitude);

                        $e['ICON'] = get_marker_src($res->marker);

                        $o['PAGETITLE'] = str_replace("'", '`', jr_gettext('_JRPORTAL_LOCAL_EVENTS_TITLE', '_JRPORTAL_LOCAL_EVENTS_TITLE', false, false));
                        $o['TITLE'] = str_replace("'", '`', $res->title);
                        $o['START_DATE'] = outputDate(str_replace('-', '/', $res->start_date));
                        $o['END_DATE'] = outputDate(str_replace('-', '/', $res->end_date));
                        $o['LAT'] = str_replace("&#45;" , "-" , $res->latitude);
                        $o['LONG'] = str_replace("&#45;" , "-" , $res->longitude);

                        $o['WEBSITE_URL'] = trim($res->website_url);
                        $o['EVENT_LOGO'] = trim($res->event_logo);
                        $o['POPUP_WIDTH'] = $jrConfig[ 'extmaps_popupwidth' ];
						$o['IMG_WIDTH'] = $jrConfig[ 'extmaps_img_width' ];
						$o['IMG_HEIGHT'] = $jrConfig[ 'extmaps_img_height' ];
                        $pageoutput[] = $o;

                        $tmpl = new patTemplate();
                        $tmpl->setRoot($ePointFilepath.'templates'.JRDS.find_plugin_template_directory());
                        $tmpl->readTemplatesFromInput('events.html');
                        $tmpl->addRows('pageoutput', $pageoutput);
                        $str = $tmpl->getParsedTemplate();
                        $str = trim($str);
                        $str = str_replace('\r\n', '', $str);
                        $str = str_replace(chr(10), ' ', $str);
                        $str = str_replace(chr(13), ' ', $str);

                        $e['POPUP'] = $str;
                        $events[] = $e;
                        unset($tmpl);
                    }
                }
            }

            if ($show_attractions == 1) {
                $query = 'SELECT * FROM #__jomres_local_attractions';
                $result = doSelectSql($query);

                if (!empty($result)) {
                    foreach ($result as $res) {
                        $a = array();
						$o = array();
                        $pageoutput = array();
                        $a['LAT'] = str_replace("&#45;" , "-" , $res->latitude);
                        $a['LONG'] = str_replace("&#45;" , "-" , $res->longitude);

                        $a['ICON'] = get_marker_src($res->marker);

                        $o['PAGETITLE'] = str_replace("'", '`', jr_gettext('_JRPORTAL_LOCAL_ATTRACTIONS_TITLE', '_JRPORTAL_LOCAL_ATTRACTIONS_TITLE', false, false));
                        $o['TITLE'] = str_replace("'", '`', $res->title);
                        $o['LAT'] = str_replace("&#45;" , "-" , $res->latitude);
                        $o['LONG'] = str_replace("&#45;" , "-" , $res->latitude);

                        $o['WEBSITE_URL'] = trim($res->website_url);
                        $o['EVENT_LOGO'] = trim($res->event_logo);
                        $o['POPUP_WIDTH'] = $jrConfig[ 'extmaps_popupwidth' ];
						$o['IMG_WIDTH'] = $jrConfig[ 'extmaps_img_width' ];
						$o['IMG_HEIGHT'] = $jrConfig[ 'extmaps_img_height' ];
                        $pageoutput[] = $o;

                        $tmpl = new patTemplate();
                        $tmpl->setRoot($ePointFilepath.'templates'.JRDS.find_plugin_template_directory());
                        $tmpl->readTemplatesFromInput('attractions.html');
                        $tmpl->addRows('pageoutput', $pageoutput);
                        $str = $tmpl->getParsedTemplate();
                        $str = trim($str);
                        $str = str_replace('\r\n', '', $str);
                        $str = str_replace(chr(10), ' ', $str);
                        $str = str_replace(chr(13), ' ', $str);

                        $a['POPUP'] = $str;
                        $attractions[] = $a;
                        unset($tmpl);
                    }
                }
            }
        }

        if (!empty($rows) || !empty($events) || !empty($attractions)) {
            $pageoutput = array();
            $pageoutput[] = $output;
            $tmpl = new patTemplate();
            $tmpl->setRoot($ePointFilepath.'templates'.JRDS.find_plugin_template_directory());
            $tmpl->readTemplatesFromInput('extended_maps.html');
            $tmpl->addRows('pageoutput', $pageoutput);
            $tmpl->addRows('rows', $rows);
			if (!empty($events)) {
				$tmpl->addRows('events', $events);
			}
			if (!empty($attractions)) {
				$tmpl->addRows('attractions', $attractions);
			}

            $tmpl->displayParsedTemplate();
        } else {
            echo 'Ooops, you need at least one published property with latitude and longitude set before the google map will show';
        }
    }

    // This must be included in every Event/Mini-component
    public function getRetVals()
    {
        return null;
    }
}
