<?php
/**
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @author Aladar Barthi <sales@jomres-extras.com>
* @copyright 2009-2012 Aladar Barthi
**/
// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class j06000je_mapview
	{
	function __construct($componentArgs)
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch) {
			$this->template_touchable=false; 
			
			return;
		}
		
		$tmpBookingHandler =jomres_getSingleton('jomres_temp_booking_handler');
		
		$ePointFilepath = get_showtime('ePointFilepath');
		
		$eLiveSite = get_showtime('eLiveSite');

		if (isset($componentArgs['property_uids']))
			$propertys_uids = $componentArgs['property_uids'];
		else
			$propertys_uids = $tmpBookingHandler->tmpsearch_data[ 'ajax_list_search_results' ];
		
		$siteConfig = jomres_getSingleton('jomres_config_site_singleton');
		$jrConfig=$siteConfig->get();

		add_gmaps_source();
		
		$allProperties=array();
		$rows = array();
		$output = array();
		$pageoutput = array();

		$output['LIVESITE'] = get_showtime('live_site');
		$output['LANG'] = get_showtime('lang_shortcode');

		$output['WIDTH'] = "400";
		$output['HEIGHT'] = "400";
		
		if ( isset($jrConfig[ 'mapview_width' ])) 
			$output['WIDTH'] = (int)$jrConfig[ 'mapview_width' ];
		
		if ( isset($jrConfig[ 'mapview_height' ])) 
		$output['HEIGHT'] = (int)$jrConfig[ 'mapview_height' ];

		if ($jrConfig[ 'mapview_groupmarkers' ] == '1')
			{
			jomres_cmsspecific_addheaddata("javascript",$eLiveSite.'javascript/',"markerclusterer.js");
			$output['GROUPMARKERS']="var markerCluster = new MarkerClusterer(map, markers, { imagePath: '".$eLiveSite.'markers/m'."' });";
			}

		//BC
		if ($jrConfig[ 'mapview_maptype' ] == 'normal') {
			$jrConfig[ 'mapview_maptype' ] = 'ROADMAP';
		}
		
		$output['MAPTYPE'] = $jrConfig[ 'mapview_maptype' ];

		$query="SELECT `propertys_uid`,`lat`,`long`,`property_name`,`property_street`,`property_town`,`property_region`,`property_description`,`stars`,`ptype_id` FROM #__jomres_propertys WHERE published = '1' AND `propertys_uid` IN (".jomres_implode($propertys_uids).")";
		$result = doSelectSql($query);

		if (!empty($result))
			{
			foreach ($result as $r)
				{
				$original_property_uid = get_showtime('property_uid');
				
				if ($r->lat != "" && $r->lat != "0" && $r->long != "" && $r->long != "0")
					{
					set_showtime('property_uid',(int)$r->propertys_uid);

					$allProperties[$r->propertys_uid]['id']=(int)$r->propertys_uid ;
					$allProperties[$r->propertys_uid]['lat']=stripslashes($r->lat);
					$allProperties[$r->propertys_uid]['long']=stripslashes($r->long);
					$allProperties[$r->propertys_uid]['property_street']=jomres_decode(jr_gettext('_JOMRES_CUSTOMTEXT_PROPERTY_STREET',$r->property_street,false,false));
					$allProperties[$r->propertys_uid]['property_town']=jomres_decode(jr_gettext('_JOMRES_CUSTOMTEXT_PROPERTY_TOWN',$r->property_town,false,false));
					$allProperties[$r->propertys_uid]['property_region']=jomres_decode(jr_gettext('_JOMRES_CUSTOMTEXT_PROPERTY_REGION',$r->property_region,false,false));
					
					$description = jomres_decode(jr_gettext('_JOMRES_CUSTOMTEXT_ROOMTYPE_DESCRIPTION', $r->property_description,false,false ));
					$description = str_replace("&lt;","<",$description);
					$description = str_replace("&gt;",">",$description);
					$description = jomres_remove_HTML($description);
					$allProperties[$r->propertys_uid]['property_description'] = $description;
					$allProperties[$r->propertys_uid]['stars'] = stripslashes($r->stars);
					$allProperties[$r->propertys_uid]['ptype_id'] = (int)$r->ptype_id;
					}
				}
			set_showtime('property_uid',$original_property_uid);
			}

		$all_property_uids = array_keys($allProperties);
		
		//grab the property names
		$current_property_details = jomres_singleton_abstract::getInstance( 'basic_property_details' );
		$current_property_details->get_property_name_multi( $all_property_uids );
		
		//Grab the property imaages
		$jomres_media_centre_images = jomres_singleton_abstract::getInstance( 'jomres_media_centre_images' );
		$jomres_media_centre_images->get_images_multi($all_property_uids, array('property'));

		$sanitised_lat_long_hyphes = array ("&#38;#45;" , "&#45;" );
		
		$jomres_property_types = jomres_singleton_abstract::getInstance('jomres_property_types');

		foreach ($allProperties as $property)
			{
			$r = array();
			$o = array();
			$pageoutput = array();
			$id = $property['id'];
			
			$jomres_property_types->get_property_type($property['ptype_id']);
			if (isset($jomres_property_types->property_type['marker_image']) && trim($jomres_property_types->property_type['marker_image'] != '' ))
				$r['ICON'] = $jomres_property_types->property_type['marker_image'];
				
			$r['lat'] = str_replace( $sanitised_lat_long_hyphes, "-" , $property['lat']);
			$r['long'] = str_replace( $sanitised_lat_long_hyphes, "-" , $property['long']);
			
			$jomres_media_centre_images->get_images($id, array('property'));
			$r['property_image'] = $jomres_media_centre_images->images ['property'][0][0]['small'];

			$r['URL'] = get_property_details_url($property['id']);
			
			$o['PROPERTY_NAME'] = $current_property_details->property_names[$id];
			
			$o['URL'] = $r['URL'];
			
			if ($jrConfig[ 'mapview_show_desc' ] == '0') {
				$o['PROPERTY_DESCRIPTION']="";
			} else {
				$o['PROPERTY_DESCRIPTION'] = $property['property_description'];
				
				if ($jrConfig[ 'mapview_trim_desc' ] == '1') {
					$trim_value = (int)$jrConfig[ 'mapview_trim_value' ];
					$o['PROPERTY_DESCRIPTION'] = jr_substr(strip_tags($property['property_description']),0,$trim_value,"UTF-8")."...";
				}
			}
			
			$o['PROPERTY_STREET'] = $property['property_street'];
			$o['PROPERTY_TOWN'] = $property['property_town'];
			
			if (is_numeric($property['property_region']))
				{
				$jomres_regions = jomres_singleton_abstract::getInstance('jomres_regions');
				$o['PROPERTY_REGION']=jr_gettext("_JOMRES_CUSTOMTEXT_REGIONS_".$property['property_region'],$jomres_regions->get_region_name($property['property_region']),false);
				}
			else
				$o['PROPERTY_REGION']=jr_gettext('_JOMRES_CUSTOMTEXT_PROPERTY_REGION',$property['property_region'],false);
			
			$o['STARS']= '';
			if (isset($r['stars']))
				$o['STARS'] = $r['stars'];
			
			$o['IMAGE'] = $r['property_image'];
			$o['VIEW_LINK'] = '<a href="'.$r['URL'].'">'.jr_gettext('_JOMRES_COM_A_CLICKFORMOREINFORMATION','_JOMRES_COM_A_CLICKFORMOREINFORMATION',false,false).'</a>';
			$o['POPUP_WIDTH'] = $jrConfig[ 'mapview_popupwidth' ];
			$o['IMG_WIDTH'] = $jrConfig[ 'mapview_img_width' ];
			$o['IMG_HEIGHT'] = $jrConfig[ 'mapview_img_height' ];

			$pageoutput[]=$o;
			$tmpl = new patTemplate();
			$tmpl->setRoot( $ePointFilepath.JRDS.'templates'.JRDS.find_plugin_template_directory() );
			$tmpl->readTemplatesFromInput( 'popup.html');
			$tmpl->addRows( 'pageoutput',$pageoutput);
			$str = $tmpl->getParsedTemplate();
			$str = trim($str);
			$str = str_replace('\r\n', '', $str);
			$str = str_replace(chr(10), " ", $str);
			$str = str_replace(chr(13), " ", $str);
			$str = addslashes($str);
			$r['POPUP'] = $str;
			
			$rows[] = $r;
			
			unset($tmpl);
			}
		
		$common_view_output['COMMON_VIEW'] = jr_gettext('COMMON_VIEW','COMMON_VIEW',false);
		
		$layout_rows = $componentArgs['layout_rows'];
		$header_pageoutput[] = $common_view_output;
		
		$tmpl = new patTemplate();
		$tmpl->addRows( 'layout_rows', $layout_rows );
		$tmpl->addRows( 'header_pageoutput', $header_pageoutput );
		$tmpl->setRoot( JOMRES_TEMPLATEPATH_FRONTEND );
		$tmpl->readTemplatesFromInput( "list_properties_header.html" );
		$output['HEADER'] = $tmpl->getParsedTemplate();

		if (!empty($rows))
			{
			$pageoutput=array();
			$pageoutput[]=$output;
			$tmpl = new patTemplate();
			$tmpl->setRoot( $ePointFilepath.JRDS.'templates'.JRDS.find_plugin_template_directory() );
			$tmpl->readTemplatesFromInput( 'je_mapview.html');
			$tmpl->addRows( 'pageoutput',$pageoutput);
			$tmpl->addRows( 'rows',$rows);
			$tmpl->addRows( 'layout_rows', $layout_rows );
			$tmpl->displayParsedTemplate();
			}
		else
			echo "Ooops, you need at least one published property with latitude and longitude set before the google map will show";
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
