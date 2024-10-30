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

class j06000search_map_build_arrays
{
    public function __construct($componentArgs)
    {
        $MiniComponents = jomres_getSingleton('mcHandler');
        if ($MiniComponents->template_touch) {
            $this->template_touchable = false;
            return;
        }
        $this->retVals = null;

		$ePointFilepath = get_showtime('ePointFilepath');


        $siteConfig = jomres_getSingleton('jomres_config_site_singleton');
        $jrConfig = $siteConfig->get();

        if (!isset($jrConfig[ 'extmaps_map_id' ]) || trim(($jrConfig[ 'extmaps_map_id' ]) == '' )) {
            return;
        }

        $rows = array();
        $output = array();


		$all_property_uids = array();
        if (isset($componentArgs[ 'all_property_uids' ]) && !empty($componentArgs[ 'all_property_uids' ])) {
            $all_property_uids = $componentArgs[ 'all_property_uids' ];
        } else {
            // e.g. "hotels:1;villas:6;camp sites:4"
            $arguments = jomresGetParam($_REQUEST, 'ptype_ids', '');

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
        }

            //grab the property names
            $current_property_details = jomres_singleton_abstract::getInstance('basic_property_details');
            $current_property_details->gather_data_multi( $all_property_uids );

            //Grab the property images
            $jomres_media_centre_images = jomres_singleton_abstract::getInstance('jomres_media_centre_images');
            $jomres_media_centre_images->get_images_multi($all_property_uids, array('property'));

            $property_modules = array();

            foreach ($all_property_uids as $puid) {
                $r = array();

				$current_property_details = jomres_singleton_abstract::getInstance('basic_property_details');
				$current_property_details->gather_data($puid);

				$jomres_property_types = jomres_singleton_abstract::getInstance('jomres_property_types');
				$jomres_property_types->get_property_type($current_property_details->ptype_id);

				if (isset($jomres_property_types->property_type['marker_image']) && trim($jomres_property_types->property_type['marker_image'] != '' ))
					$r['ICON'] = $jomres_property_types->property_type['marker_image'];

				$r['lat'] = str_replace( "&#45;" , "-"  , $current_property_details->lat);
				$r['long'] = str_replace( "&#45;" , "-"  , $current_property_details->long);
                $r['PROPERTY_UID'] = $puid;
;
                $images = $jomres_media_centre_images->get_images($puid, array('property'));

                $po = array();
                $o = get_property_price_for_display_in_lists($puid);
                $o['IMAGE'] = $images['property'][0][0]['small'];
                $o['PROPERTY_NAME'] = $current_property_details->property_name;

                $template_path = $ePointFilepath.'templates'.JRDS.find_plugin_template_directory().JRDS;
                $marker_icon_template_file = 'marker_icon.html';
                if (file_exists( $template_path.'marker_icon_'.$current_property_details->ptype_id.'.html' ) ) {
                    $marker_icon_template_file = 'marker_icon_'.$current_property_details->ptype_id.'.html';
                }

                $marker_colour_template_file = 'marker_colour.html';
                if (file_exists( $template_path.'marker_colour_'.$current_property_details->ptype_id.'.html' ) ) {
                    $marker_colour_template_file = 'marker_colour_'.$current_property_details->ptype_id.'.html';
                }

                // We'll use this function so that templates can be overridden
                $o['MARKER_ICON'] = simple_template_output($template_path , $marker_icon_template_file , '' );
                $o['MARKER_COLOUR'] = simple_template_output($template_path , $marker_colour_template_file , '' );

                $po[] = $o;
                $tmpl = new patTemplate();
                $tmpl->setRoot($template_path );
                $tmpl->readTemplatesFromInput('marker.html');
                $tmpl->addRows('pageoutput', $po);
                $r['MARKER'] = $tmpl->getParsedTemplate();


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

                    $r['PRICE']= $arr[$puid]['data']['PRICE_PRICE'];

                    $arr = get_property_module_data(array($puid) , $ePointFilepath.'templates'.JRDS.'bootstrap5'.JRDS ,'basic_module_output.html' );
                    $property_modules[] ['MODULE_DATA'] = $arr[$puid]['template'];
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

        $this->retVals = [ 'rows' => $rows , 'modules' => $property_modules ];
    }

    // This must be included in every Event/Mini-component
    public function getRetVals()
    {
        return  $this->retVals;
    }
}
