<?php
	/**
	 * @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
	 * @author Aladar Barthi <sales@jomres-extras.com>
	 * @copyright 2009-2013 Aladar Barthi
	 **/
// ################################################################
	defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

	class j06000je_alternative_properties {
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

			if ( !isset($jrConfig['alt_prop_enabled']) || $jrConfig['alt_prop_enabled'] != '1')
				return;

			$tmpBookingHandler = jomres_singleton_abstract::getInstance( 'jomres_temp_booking_handler' );

			$property_uids = array();
			if (isset($tmpBookingHandler->tmpsearch_data[ 'ajax_list_search_results' ]))
			{
				$property_uids = $tmpBookingHandler->tmpsearch_data[ 'ajax_list_search_results' ];
			}

			if (empty($property_uids))
				return;

			$defaultProperty=(int) $componentArgs[ 'property_uid' ];
			if ($defaultProperty == 0)
				$defaultProperty=jomresGetParam( $_REQUEST, 'property_uid', 0 );
			if ($defaultProperty == 0)
				return;

			$defaultPType = get_showtime( 'property_type' );

			foreach ($property_uids as $k=>$v)
			{
				if ($v == $defaultProperty)
					unset($property_uids[$k]);
			}

			if (count($property_uids) > (int)$jrConfig[ 'alt_prop_listlimit' ]) {
				if ((int)$jrConfig[ 'alt_prop_listlimit' ] == 0 ) {
					$jrConfig[ 'alt_prop_listlimit' ] = 3;
				}
				$rand_puids = array_rand($property_uids,(int)$jrConfig[ 'alt_prop_listlimit' ]);
			}
			else
				$rand_puids = array_keys($property_uids);

			if (empty($rand_puids))
				return;

			$puids=array();
			foreach ($rand_puids as $rand)
			{
				$puids[] = $property_uids[$rand];
			}

			$output=array();
			$rows=array();
			$delay = 300;

			$output['PAGETITLE']=jr_gettext('_JRPORTAL_ALTERNATIVE_PROPERTIES_TITLE_FRONTEND','_JRPORTAL_ALTERNATIVE_PROPERTIES_TITLE_FRONTEND',FALSE);

			$current_property_details = jomres_singleton_abstract::getInstance( 'basic_property_details' );
			$current_property_details->gather_data_multi( $puids );

			$jomres_property_list_prices = jomres_singleton_abstract::getInstance( 'jomres_property_list_prices' );
			$jomres_property_list_prices->gather_lowest_prices_multi($puids);

			$jomres_media_centre_images = jomres_singleton_abstract::getInstance( 'jomres_media_centre_images' );
			$jomres_media_centre_images->get_images_multi($puids, array('property'));

			if ( jomres_bootstrap_version() == 5 ) {
				$response = get_property_module_data($puids);
				foreach ( $response as $puid => $template ) {
					$rows[] = array ( 'PROPERTY' => $template['template']);
				}
			}
			else {
				foreach ($puids as $puid)
				{
					$current_property_details->gather_data( $puid );

					set_showtime( 'property_uid', $puid );
					set_showtime( 'property_type', $current_property_details->property_type );

					$r = array();
					$r['PROPERTYNAME']=$current_property_details->property_name;
					$r['PROPERTY_TYPE'] = $current_property_details->property_type_title;
					$r['TOWN']=$current_property_details->property_town;
					$r['REGION']=$current_property_details->property_region;
					$r['COUNTRY']=$current_property_details->property_country;

					$jomres_media_centre_images->get_images($puid, array('property'));
					$r['IMAGE'] = $jomres_media_centre_images->images ['property'][0][0]['medium'];

					$starslink = "<img src=\"" . JOMRES_IMAGES_RELPATH."blank.png\" alt=\"star\" border=\"0\" height=\"1\" hspace=\"10\" vspace=\"1\" />";
					if ( $current_property_details->stars != "0" )
					{
						$starslink = "";
						for ( $i = 1; $i <= $current_property_details->stars; $i++ )
						{
							$starslink .= '<img src="' . JOMRES_IMAGES_RELPATH.'star.png" alt="star" border="0" />';
						}
						$starslink .= "";
					}
					$r['STARS'] = $starslink;

					$r['SUPERIOR'] = '';
					if ( $current_property_details->superior == 1 )
						$r['SUPERIOR'] = '<img src="' . JOMRES_IMAGES_RELPATH.'superior.png" alt="superior" border="0" />';

					$r['PRICE_PRE_TEXT']	=	$jomres_property_list_prices->lowest_prices[$puid][ 'PRE_TEXT' ];;
					$r['PRICE_PRICE']		=	$jomres_property_list_prices->lowest_prices[$puid][ 'PRICE' ];
					$r['PRICE_POST_TEXT']	=	$jomres_property_list_prices->lowest_prices[$puid][ 'POST_TEXT' ];

					$r['MOREINFORMATION'] = jr_gettext( '_JOMRES_COM_A_CLICKFORMOREINFORMATION', '_JOMRES_COM_A_CLICKFORMOREINFORMATION', $editable = false, true );
					$r['MOREINFORMATIONLINK'] = get_property_details_url($puid);

					$r['BOOKTHIS_TEXT'] = jr_gettext( '_JOMRES_FRONT_MR_MENU_BOOKAROOM', '_JOMRES_FRONT_MR_MENU_BOOKAROOM', false, false );
					$r['BOOKTHIS_LINK'] = get_booking_url($puid);

					$r['RANDOM_IDENTIFIER'] = generateJomresRandomString( 10 );

					$delay = $delay+300;
					$r['DELAY'] = $delay;

					$r['UID'] = $puid;

					$rows[]=$r;

					$jomres_language_definitions = jomres_singleton_abstract::getInstance( 'jomres_language_definitions' );
					$jomres_language_definitions->reset_lang_and_property_type();
				}
			}


			set_showtime( 'property_uid', $defaultProperty );
			set_showtime( 'property_type', $defaultPType );

			$pageoutput[]=$output;
			$tmpl = new patTemplate();
			$tmpl->setRoot( $ePointFilepath.JRDS.'templates'.JRDS.find_plugin_template_directory() );
			$tmpl->readTemplatesFromInput( 'je_alternative_properties.html');
			$tmpl->addRows( 'pageoutput',$pageoutput);
			$tmpl->addRows( 'rows',$rows);
			$tmpl->displayParsedTemplate();
		}

		// This must be included in every Event/Mini-component
		function getRetVals()
		{
			return null;
		}
	}
