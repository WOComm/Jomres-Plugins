<?php
/**
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @author Aladar Barthi <sales@jomres-extras.com>
* @copyright 2009-2012 Aladar Barthi
**/
// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class j01050je_x_geocoder {
	function __construct($componentArgs=null)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		
		$ePointFilepath = get_showtime('ePointFilepath');
		
		$siteConfig = jomres_getSingleton('jomres_config_site_singleton');
		$jrConfig = $siteConfig->get();
		
		$property_uid = (int)$componentArgs['property_uid'];
		
		$output=array();
		$pageoutput=array();

		$output['MAP_STYLE'] = file_get_contents ( JOMRES_ASSETS_ABSPATH . 'map_styles' . JRDS . $jrConfig['map_style'].'.style' );

		$current_property_details =jomres_getSingleton('basic_property_details');
		$current_property_details->gather_data($property_uid);
		
		$jomres_property_types = jomres_singleton_abstract::getInstance('jomres_property_types');
		$jomres_property_types->get_property_type($current_property_details->ptype_id);
		
		$jomres_media_centre_images = jomres_singleton_abstract::getInstance( 'jomres_media_centre_images' );
		$jomres_media_centre_images->get_images($property_uid, array('property'));
		
		$sanitised_lat_long_hyphes = array ("&#38;#45;" , "&#45;" );
		
		$output['LAT'] = str_replace( $sanitised_lat_long_hyphes, "-" , $current_property_details->lat);
		$output['LONG'] =str_replace( $sanitised_lat_long_hyphes, "-" ,  $current_property_details->long);
		if ( $output['LAT'] === '0.00' || strlen( $output['LAT'] ) ==0 || $output['LONG'] === '0.00' || strlen( $output['LONG'] ) ==0  )
			return;

		add_gmaps_source();
		
		//map settings
		$output['ZOOMLEVEL'] = (int)$jrConfig['map_zoom'];
		$output['WIDTH'] = 400;
		$output['HEIGHT'] = (int)$jrConfig['map_height'];
		$output['MAPTYPE'] = strtoupper($jrConfig['map_type']);
		
		$dest_address = $current_property_details->property_street;
		$dest_zipcode = $current_property_details->property_postcode;
		$dest_town = $current_property_details->property_town;			
		$dest_lat = str_replace( $sanitised_lat_long_hyphes, "-" , $current_property_details->lat);
		$dest_long = str_replace( $sanitised_lat_long_hyphes, "-" , $current_property_details->long);
		$dest_picture = $jomres_media_centre_images->images ['property'][0][0]['small'];
		$dest_name = $current_property_details->property_name;
		$dest_region = $current_property_details->property_region;
		$dest_country = $current_property_details->property_country;
		
		$output['ICON'] = get_showtime('live_site').'/'.JOMRES_ROOT_DIRECTORY.'/core-plugins/gmap_driving_directions/images/standard.png';
		
		if (isset($jomres_property_types->property_type['marker_image'])) {
			$output[ 'ICON'] = $jomres_property_types->property_type['marker_image'];
		}
		
		$output['WAYPOINT_ICON'] = get_showtime('live_site').'/'.JOMRES_ROOT_DIRECTORY.'/core-plugins/gmap_driving_directions/images/waypoint.png';
		$output['RANDOM_IDENTIFIER'] = generateJomresRandomString(10);
		set_showtime("current_map_identifier",$output['RANDOM_IDENTIFIER']);
	
		$google_html = '<div class="popup_html ui-widget-content ui-corner-all ui-helper-clearfix">';
		$google_html = $google_html .  '<div><strong>' . $dest_name . '</strong></div>';
		if($dest_picture)
			{
			$google_html = $google_html .  '<div>' .'<img src="'.$dest_picture.'" border="0" width="80" height="55"/></div>';
			}
		if($dest_address || $dest_zipcode || $dest_town)
			{
			$google_html = $google_html .  "<div><strong>". jr_gettext('_GOOGLE_ADDRESS','_GOOGLE_ADDRESS',false) ."</strong>" .$dest_address."</div>";
			$google_html = $google_html .  ", " .$dest_town;
			$google_html = $google_html .  ", " .$dest_zipcode;
			$google_html = $google_html .  ", " .$dest_region;
			$google_html = $google_html .  ", " .$dest_country;
			}
	
		$google_html = $google_html . "</div>";
		$output['POPUP'] = addslashes($google_html);
		
		$output['HDRIVINGDIRECTIONS']=jr_gettext('_GOOGLE_ROUTEPLANNING','_GOOGLE_ROUTEPLANNING',false)."&nbsp;".$dest_name;
		$output['HYOURLOCATION']=jr_gettext('_GOOGLE_ROUTEPLANNING_HYOURLOCATION','_GOOGLE_ROUTEPLANNING_HYOURLOCATION',false);
		$output['HADDRESS']=jr_gettext('_GOOGLE_ADDRESS','_GOOGLE_ADDRESS',false);
		$output['HPOSTALCODE']=jr_gettext('_GOOGLE_INPUT_FIELDSET_POSTALCODE','_GOOGLE_INPUT_FIELDSET_POSTALCODE',false);
		$output['HTOWN']=jr_gettext('_GOOGLE_INPUT_FIELDSET_TOWN','_GOOGLE_INPUT_FIELDSET_TOWN',false);
		$output['HROUTEOPTIONS']=jr_gettext('_GOOGLE_ROUTEPLANNING_HROUTEOPTIONS','_GOOGLE_ROUTEPLANNING_HROUTEOPTIONS',false);
		$output['HOPTIMIZEFOR']=jr_gettext('_GOOGLE_ROUTEPLANNING_HOPTIMIZEFOR','_GOOGLE_ROUTEPLANNING_HOPTIMIZEFOR',false);
		$output['HDRIVING']=jr_gettext('_GOOGLE_ROUTEPLANNING_HDRIVING','_GOOGLE_ROUTEPLANNING_HDRIVING',false);
		$output['HWALKING']=jr_gettext('_GOOGLE_ROUTEPLANNING_HWALKING','_GOOGLE_ROUTEPLANNING_HWALKING',false);
		$output['HCYCLING']=jr_gettext('_GOOGLE_ROUTEPLANNING_HCYCLING','_GOOGLE_ROUTEPLANNING_HCYCLING',false);
		$output['HHIGHWAYS']=jr_gettext('_GOOGLE_ROUTEPLANNING_HHIGHWAYS','_GOOGLE_ROUTEPLANNING_HHIGHWAYS',false);
		$output['HTOLLS']=jr_gettext('_GOOGLE_ROUTEPLANNING_HTOLLS','_GOOGLE_ROUTEPLANNING_HTOLLS',false);
		$output['HGETDIRECTIONS']=jr_gettext('_GOOGLE_SELECT_BUTTON','_GOOGLE_SELECT_BUTTON',false);
		$output['HRESETMAP']=jr_gettext('_GOOGLE_SELECT_RESETMAP','_GOOGLE_SELECT_RESETMAP',false);
		$output['ROUTEERROR']=jr_gettext('_GOOGLE_INITIALIZE_ERROR2','_GOOGLE_INITIALIZE_ERROR2',false);
		$output['MAXWAYPOINTSERROR']=jr_gettext('_GOOGLE_INITIALIZE_ERROR1','_GOOGLE_INITIALIZE_ERROR1',false);
		$output['INSTRUCTIONS']=jr_gettext('_GOOGLE_ROUTEPLANNING_INSTRUCTIONS','_GOOGLE_ROUTEPLANNING_INSTRUCTIONS',false);
		$output['HPRINT']=jr_gettext('_GOOGLE_DIRECTION_PRINT','_GOOGLE_DIRECTION_PRINT',false);
		
		if (!isset($jrConfig[ 'gmap_layer_transit' ])) {
            $jrConfig[ 'gmap_layer_transit' ] = '0';
        }

        if ($jrConfig[ 'gmap_layer_transit' ] == '1') {
            $output[ 'TRANSIT_LAYER' ] = '
				var transitLayer = new google.maps.TransitLayer();
				transitLayer.setMap(map);
			';
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
		
		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.JRDS.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( 'gmap_driving_directions.html' );
		$tmpl->addRows( 'pageoutput', $pageoutput );
		$this->retVals=$tmpl->getParsedTemplate();
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return $this->retVals;
		}
	}
