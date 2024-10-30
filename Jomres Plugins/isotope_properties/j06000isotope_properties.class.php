<?php
	/**
	 * Plugin
	 * @author Vince Wooll <sales@jomres.net>
	 * @version Jomres 4
	 * @package Jomres
	 * @copyright	2005-2010 Vince Wooll
	 * Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly, however all images, css and javascript which are copyright Vince Wooll are not GPL licensed and are not freely distributable.
	 **/

// ################################################################
	defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

	class j06000isotope_properties
	{
		function __construct()
		{
			$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
			if ($MiniComponents->template_touch)
			{
				$this->template_touchable=false; return;
				$this->shortcode_data = array (
					"task" => "isotope_properties",
					"info" => "JOMRES_SHORTCODES_06000ISOTOPE",
					'arguments' => array(
						0 => array(
							'argument' => 'limit',
							'arg_info' => 'JOMRES_SHORTCODES_06000ISOTOPE_LIMIT',
							'arg_example' => '10'
						),
						1 => array(
							'argument' => 'ptype_ids',
							'arg_info' => 'JOMRES_SHORTCODES_0600006000ISOTOPE_PTYPE_IDS',
							'arg_example' => '1,7'
						)
					)
				);
				return;
			}

			$ePointFilepath=get_showtime('ePointFilepath');

			output_ribbon_styling();

			$calledByModule = jomresGetParam( $_REQUEST, 'calledByModule', '');
			$plistpage = jomresGetParam( $_REQUEST, 'plistpage', '');
			if ( $calledByModule != "" || $plistpage != "" )
				return;

			//limit displayed properties
			$listLimit = (int)jomresGetParam( $_REQUEST, 'limit', 200);
			// e.g. "hotels:1;villas:6;camp sites:4"
			$arguments = jomresGetParam( $_REQUEST, 'ptype_ids', '' );
			$property_type_bang = explode (",",$arguments);

			if ($arguments!='')
			{
				$required_property_type_ids = array();
				foreach ($property_type_bang as $ptype)
				{
					$required_property_type_ids[] = (int)$ptype;
				}

				$clause="AND ptype_id IN (".jomres_implode($required_property_type_ids).") ";
			}
			else
				$clause='';

			$output = array();
			$pageoutput=array();

			$query = "SELECT 
					propertys_uid FROM 
					#__jomres_propertys b 
					WHERE published = 1 $clause 
					ORDER BY RAND()
					LIMIT $listLimit";
			$result = doSelectSQL($query);

			if (!empty($result))
			{
				$propertiesToShow=array();
				foreach ($result as $p)
				{
					$propertiesToShow[]=$p->propertys_uid;
				}
			}


			$current_property_details = jomres_singleton_abstract::getInstance( 'basic_property_details' );
			$current_property_details->gather_data_multi( $propertiesToShow );

			$jomres_property_list_prices = jomres_singleton_abstract::getInstance( 'jomres_property_list_prices' );
			$jomres_property_list_prices->gather_lowest_prices_multi($propertiesToShow);

			$jomres_media_centre_images = jomres_singleton_abstract::getInstance( 'jomres_media_centre_images' );
			$jomres_media_centre_images->get_images_multi($propertiesToShow, array('property'));

			$rows=array();
			$ptypes = array();
			$ptype_filter_rows = array();
			$animationDelay = 0;

			foreach($propertiesToShow as $puid)
			{
				// We can't have animations on the isotope page because if a property module output hasn't been viewed yet, it'll be hidden permanently.
				set_showtime('disable_animations' , true );
				if ( jomres_bootstrap_version() != 5 ) {
					$r= $this->jomresFeaturedPropertysMakeOutput($puid, $animationDelay);
				} else {

					$response = get_property_module_data( [$puid], '', '', false);
					$r = [ 'PROPERTY' => $response[ $puid ][ 'template' ] , 'PTYPE_ID' => $current_property_details->multi_query_result[ $puid ][ 'ptype_id' ] ];

				}
				set_showtime('disable_animations' , false );

				$rows[] = $r;

				if (!in_array($current_property_details->multi_query_result[ $puid ][ 'ptype_id' ], $ptypes))
				{
					$ptypes[] = $current_property_details->multi_query_result[ $puid ][ 'ptype_id' ];
					$r2['PTYPE_ID'] = $current_property_details->multi_query_result[ $puid ][ 'ptype_id' ];
					$r2['PTYPE'] = $current_property_details->multi_query_result[ $puid ][ 'property_type_title' ];
					$ptype_filter_rows[] = $r2;
				}

				$animationDelay = $animationDelay + 300;
			}

			usort($ptype_filter_rows, function ($item1, $item2) {
				return $item1['PTYPE'] <=> $item2['PTYPE'];
			});

			$output['HSHOW_ALL'] = jr_gettext('_JOMRES_SEARCH_ALL','_JOMRES_SEARCH_ALL',false);
			$output['HDEFAULT_ORDER'] = jr_gettext('_JOMRES_SORTORDER_DEFAULT','_JOMRES_SORTORDER_DEFAULT',false);
			$output['HNAME'] = jr_gettext('_JRPORTAL_INVOICES_LINEITEMS_NAME','_JRPORTAL_INVOICES_LINEITEMS_NAME',false);
			$output['HTOWN'] = jr_gettext('_JOMRES_SEARCH_GEO_TOWNSEARCH','_JOMRES_SEARCH_GEO_TOWNSEARCH',false);
			$output['HREGION'] = jr_gettext('_JOMRES_SEARCH_GEO_REGIONSEARCH','_JOMRES_SEARCH_GEO_REGIONSEARCH',false);
			$output['HCOUNTRY'] = jr_gettext('_JOMRES_SEARCH_GEO_COUNTRYSEARCH','_JOMRES_SEARCH_GEO_COUNTRYSEARCH',false);
			$output['HPRICE'] = jr_gettext('_JOMRES_SEARCH_PRICERANGES','_JOMRES_SEARCH_PRICERANGES',false);

			$output['_JOMRES_HFILTER'] = jr_gettext('_JOMRES_HFILTER','_JOMRES_HFILTER',false);
			$output['JRPORTAL_FEATUREDLISTINGS_ASAMODULE_SORTBY'] = jr_gettext('JRPORTAL_FEATUREDLISTINGS_ASAMODULE_SORTBY','JRPORTAL_FEATUREDLISTINGS_ASAMODULE_SORTBY',false);


			//head scripts
			jomres_cmsspecific_addheaddata( "javascript", JOMRES_ROOT_DIRECTORY.'/core-plugins/isotope_properties/javascript/', "isotope.pkgd.min.js" );


			$pageoutput[]=$output;
			$tmpl = new patTemplate();
			$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
			$tmpl->readTemplatesFromInput( 'isotope_properties.html');
			$tmpl->addRows( 'pageoutput',$pageoutput);
			$tmpl->addRows( 'rows',$rows);
			$tmpl->addRows( 'ptype_filter_rows',$ptype_filter_rows);


			$tmpl->displayParsedTemplate();
		}

		function jomresFeaturedPropertysMakeOutput($puid, $animationDelay)
		{
			$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );

			$siteConfig = jomres_singleton_abstract::getInstance( 'jomres_config_site_singleton' );
			$jrConfig = $siteConfig->get();

			$current_property_details = jomres_singleton_abstract::getInstance( 'basic_property_details' );
			$current_property_details->gather_data( $puid );

			$jomres_property_list_prices = jomres_singleton_abstract::getInstance( 'jomres_property_list_prices' );

			$jomres_media_centre_images = jomres_singleton_abstract::getInstance( 'jomres_media_centre_images' );
			$jomres_media_centre_images->get_images($puid, array('property'));

			$output = array();

			$output['NAME']=$current_property_details->property_name;
			$output['STREET']=$current_property_details->property_street;
			$output['TOWN']=$current_property_details->property_town;
			$output['REGION']=$current_property_details->property_region;
			$output['COUNTRY']=$current_property_details->property_country;
			$output['DESCRIPTION']=$current_property_details->property_description;
			$output['PTYPE_ID']=$current_property_details->ptype_id;
			$output['PTYPE']=$current_property_details->property_type_title;

			$output['IMAGE']=$jomres_media_centre_images->images ['property'][0][0]['small'];

			$output['MOREINFORMATION']= jr_gettext('_JOMRES_COM_A_CLICKFORMOREINFORMATION','_JOMRES_COM_A_CLICKFORMOREINFORMATION',$editable=false,true) ;

			$output['URL']=get_property_details_url($puid);
			$output['VIEW_LINK']='<a href="'.$output['URL'].'" target="_blank">'.jr_gettext('_JOMRES_COM_A_CLICKFORMOREINFORMATION','_JOMRES_COM_A_CLICKFORMOREINFORMATION',false,false).'</a>';

			$output['STARS']="<img src=\"".JOMRES_IMAGES_RELPATH."blank.png\" alt=\"star\" border=\"0\" height=\"1\" hspace=\"10\" vspace=\"1\" />";
			$output['STARSIMAGES'] = $MiniComponents->specificEvent('06000', 'show_property_stars', array('property_uid' => $puid , 'output_now' => false ));

			$stars=(int)$current_property_details->stars;
			if ($stars>0)
			{
				$starsimage="";
				for ($n=1;$n<=$stars;$n++)
				{
					$starsimage.="<img src=\"".JOMRES_IMAGES_RELPATH."star.png\" alt=\"star\" border=\"0\" />";
				}
				$output['STARS']=$starsimage;
			}
			$output[ 'SUPERIOR' ] = '';
			if ( $current_property_details->superior == 1 )
				$output[ 'SUPERIOR' ] = "<img src=\"" . JOMRES_IMAGES_RELPATH."superior.png\" alt=\"superior\" border=\"0\" />";

			$output[ 'PRICE_PRE_TEXT' ]  = $jomres_property_list_prices->lowest_prices[$puid][ 'PRE_TEXT' ];
			$output[ 'PRICE_PRICE' ]     = $jomres_property_list_prices->lowest_prices[$puid][ 'PRICE' ];
			$output[ 'PRICE_POST_TEXT' ] = $jomres_property_list_prices->lowest_prices[$puid][ 'POST_TEXT' ];

			//ANIMATIONS
			$output[ 'ANIMATION_DELAY' ] = $animationDelay;

			return $output;
		}

		// This must be included in every Event/Mini-component
		function getRetVals()
		{
			return null;
		}
	}	
