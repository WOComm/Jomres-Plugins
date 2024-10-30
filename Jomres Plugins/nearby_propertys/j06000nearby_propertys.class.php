<?php
/**
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @author Aladar Barthi <sales@jomres-extras.com>
* @copyright 2009-2012 Aladar Barthi
**/
// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class j06000nearby_propertys {
	function __construct($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}

		$ePointFilepath = get_showtime('ePointFilepath');
		
		$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
		$jrConfig = $siteConfig->get();

		if ($jrConfig['nearby_prop_enabled'] != '1')
			return;

		$defaultProperty = $componentArgs['property_uid'];
		
		if ($defaultProperty == 0)
			$defaultProperty=(int)(jomresGetParam( $_REQUEST, 'property_uid', 0 ) );
		
		$sanitised_lat_long_hyphes = array ("&#38;#45;" , "&#45;" );
		
		$defaultProperty_lat=str_replace( $sanitised_lat_long_hyphes, "-" ,  jomresGetParam( $_REQUEST, 'lat', '' ));
		$defaultProperty_lng=str_replace( $sanitised_lat_long_hyphes, "-" ,  jomresGetParam( $_REQUEST, 'long', '' ));
		
		if ($defaultProperty == 0 && ( $defaultProperty_lat == '' || $defaultProperty_lng == '' ))
			return;

		$radius = (int)$jrConfig['nearby_prop_radius'];
		$unit = (int)$jrConfig['nearby_prop_unit'];
		
		if ($unit == 0)
			$unitText=jr_gettext('_JRPORTAL_NEARBY_PROPERTYS_DISTANCE_KM','_JRPORTAL_NEARBY_PROPERTYS_DISTANCE_KM',FALSE);
		else
			$unitText=jr_gettext('_JRPORTAL_NEARBY_PROPERTYS_DISTANCE_MILES','_JRPORTAL_NEARBY_PROPERTYS_DISTANCE_MILES',FALSE);
		
		$listlimit = (int)$jrConfig['nearby_prop_listlimit'];
		$ptype_enabled = (int)$jrConfig['nearby_prop_ptype_enabled'];
		
		$siteConfig = jomres_getSingleton('jomres_config_site_singleton');
		$jrConfig=$siteConfig->get();

		$current_property_details =jomres_getSingleton('basic_property_details');
		$current_property_details->gather_data($defaultProperty);

		if (is_null($current_property_details->lat)) {
			$current_property_details->lat = '0';
		}
		if (is_null($current_property_details->long)) {
			$current_property_details->long = '0';
		}

		if ($defaultProperty_lat == '')
			$defaultProperty_lat=str_replace( $sanitised_lat_long_hyphes, "-" ,  $current_property_details->lat);
		if ($defaultProperty_lng == '')
			$defaultProperty_lng=str_replace( $sanitised_lat_long_hyphes, "-" ,  $current_property_details->long);
		$defaultProperty_name=$current_property_details->get_property_name($defaultProperty);
		$defaultProperty_ptype_id=$current_property_details->ptype_id;
		$defaultProperty_property_type=$current_property_details->property_type;

		if ( $defaultProperty_lat != "" && $defaultProperty_lng != "" )
			{
			if ($unit == 0) //distance in kilometers
				{
				$query="SELECT `propertys_uid`, published, ptype_id, ( 6371 * acos( cos( radians( {$defaultProperty_lat} ) ) * cos( radians( `lat` ) ) * cos( radians( `long` ) - radians( {$defaultProperty_lng} ) ) + sin( radians( {$defaultProperty_lat} ) ) * sin( radians( `lat` ) ) ) ) AS distance FROM #__jomres_propertys HAVING distance <= {$radius} AND `propertys_uid` != {$defaultProperty} AND published = 1 ";
				if ($ptype_enabled == 1 && $defaultProperty != 0)
					$query.="AND `ptype_id` = {$defaultProperty_ptype_id} ORDER BY distance LIMIT {$listlimit}";
				else
					$query.="ORDER BY distance LIMIT {$listlimit}";
				$nearbyPropertys=doSelectSql($query);
				}
			else //distance in miles
				{
				$query="SELECT `propertys_uid`, published, ptype_id, ( 3959 * acos( cos( radians( {$defaultProperty_lat} ) ) * cos( radians( `lat` ) ) * cos( radians( `long` ) - radians( {$defaultProperty_lng} ) ) + sin( radians( {$defaultProperty_lat} ) ) * sin( radians( `lat` ) ) ) ) AS distance FROM #__jomres_propertys HAVING distance <= {$radius} AND `propertys_uid` != {$defaultProperty} AND published = 1 ";
				if ($ptype_enabled == 1 && $defaultProperty != 0)
					$query.="AND `ptype_id` = {$defaultProperty_ptype_id} ORDER BY distance LIMIT {$listlimit}";
				else
					$query.="ORDER BY distance LIMIT {$listlimit}";
				$nearbyPropertys=doSelectSql($query);
				}
			}
		else
			{
			echo "This property has no latitude and longitude details set so we can`t find other properties nearby.";
			return;
			}

		if (!empty($nearbyPropertys))
			{
			$rw=array();
			$property_uids=array();
			
			foreach ($nearbyPropertys as $p_uid)
				{
				$property_uids[]=$p_uid->propertys_uid;
				}
			
			$customTextObj = jomres_singleton_abstract::getInstance( 'custom_text' );
			
			$current_property_details=jomres_getSingleton('basic_property_details');
			$current_property_details->gather_data_multi($property_uids);
			
			$jomres_property_list_prices = jomres_singleton_abstract::getInstance( 'jomres_property_list_prices' );
			$jomres_property_list_prices->gather_lowest_prices_multi($property_uids);
			
			$jomres_media_centre_images = jomres_singleton_abstract::getInstance('jomres_media_centre_images' );
			$jomres_media_centre_images->get_images_multi($property_uids);
			
			foreach ($nearbyPropertys as $p_uid)
				{
				$current_property_details->gather_data($p_uid->propertys_uid);
				$jomres_media_centre_images->get_images($p_uid->propertys_uid);
				
				set_showtime( 'property_uid', $p_uid->propertys_uid );
				//set_showtime( 'property_type', $current_property_details->property_type );
				
				$mrConfig=getPropertySpecificSettings($p_uid->propertys_uid);
				$rw['PROPERTYNAME']=$current_property_details->property_name;
				
				$stars=$current_property_details->stars;
				$starslink="<img src=\"".JOMRES_IMAGES_RELPATH."blank.png\" alt=\"star\" border=\"0\" HEIGHT=\"1\" hspace=\"10\" VSPACE=\"1\" />";
				if ($stars!="0")
					{
					$starslink="";
						for ($i=1;$i<=$stars;$i++)
				   		{
						$starslink.="<img src=\"".JOMRES_IMAGES_RELPATH."star.png\" alt=\"star\" border=\"0\" />";
						}
					$starslink.="";
					}
				$rw['STARS']=$starslink;

				$rw['PRICE_PRE_TEXT']	=	$jomres_property_list_prices->lowest_prices[$p_uid->propertys_uid][ 'PRE_TEXT' ];;
				$rw['PRICE_PRICE']		=	$jomres_property_list_prices->lowest_prices[$p_uid->propertys_uid][ 'PRICE' ];
				$rw['PRICE_POST_TEXT']	=	$jomres_property_list_prices->lowest_prices[$p_uid->propertys_uid][ 'POST_TEXT' ];

				$rw['DISTANCE']=jr_gettext('_JRPORTAL_NEARBY_PROPERTYS_DISTANCE','_JRPORTAL_NEARBY_PROPERTYS_DISTANCE',FALSE).' '.number_format($p_uid->distance,2)." ".$unitText;
				$rw['MOREINFORMATION']= jr_gettext('_JOMRES_COM_A_CLICKFORMOREINFORMATION','_JOMRES_COM_A_CLICKFORMOREINFORMATION',$editable=false,true) ;
				$rw['MOREINFORMATIONLINK']=get_property_details_url($p_uid->propertys_uid);
				//$rw['MOREINFORMATIONLINK_SEFSAFE']=get_property_details_url($p_uid->propertys_uid,'sefsafe');
				
				$rw['IMAGE']=$jomres_media_centre_images->images ['property'][0][0]['medium'];
				
				//save output
				$nearbyprops[] = $rw;
				}
			}
		else
			{
			if (using_bootstrap())
				echo "<h2>".jr_gettext('_JRPORTAL_NEARBY_PROPERTYS_TITLE_FRONTEND','_JRPORTAL_NEARBY_PROPERTYS_TITLE_FRONTEND',FALSE).' '.$defaultProperty_name.' '.jr_gettext('_JRPORTAL_NEARBY_PROPERTYS_NOTHINGNEARBY2','_JRPORTAL_NEARBY_PROPERTYS_NOTHINGNEARBY2',FALSE).' '.$radius.' '.$unitText."</h2><p>".jr_gettext('_JRPORTAL_NEARBY_PROPERTYS_NOTHINGNEARBY','_JRPORTAL_NEARBY_PROPERTYS_NOTHINGNEARBY',FALSE)."</p>";
			else
				echo "<div class=\"ui-widget-content ui-corner-all\" style=\"padding:0 5px;\"><h2>".jr_gettext('_JRPORTAL_NEARBY_PROPERTYS_TITLE_FRONTEND','_JRPORTAL_NEARBY_PROPERTYS_TITLE_FRONTEND',FALSE).' '.$defaultProperty_name.' '.jr_gettext('_JRPORTAL_NEARBY_PROPERTYS_NOTHINGNEARBY2','_JRPORTAL_NEARBY_PROPERTYS_NOTHINGNEARBY2',FALSE).' '.$radius.' '.$unitText."</h2>".jr_gettext('_JRPORTAL_NEARBY_PROPERTYS_NOTHINGNEARBY','_JRPORTAL_NEARBY_PROPERTYS_NOTHINGNEARBY',FALSE)."</div>";
			return;
			}
		
		set_showtime( 'property_uid', $defaultProperty );
		set_showtime( 'property_type', $defaultProperty_property_type );

		$output['PAGETITLE']=jr_gettext('_JRPORTAL_NEARBY_PROPERTYS_TITLE_FRONTEND','_JRPORTAL_NEARBY_PROPERTYS_TITLE_FRONTEND',FALSE)." ".$defaultProperty_name." ".jr_gettext('_JRPORTAL_NEARBY_PROPERTYS_NOTHINGNEARBY2','_JRPORTAL_NEARBY_PROPERTYS_NOTHINGNEARBY2',FALSE)." ".$radius." ".$unitText;

		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.JRDS.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( 'nearby_propertys.html');
		$tmpl->addRows( 'pageoutput',$pageoutput);
		$tmpl->addRows( 'nearbyprops',$nearbyprops);
		$tmpl->displayParsedTemplate();
	}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
