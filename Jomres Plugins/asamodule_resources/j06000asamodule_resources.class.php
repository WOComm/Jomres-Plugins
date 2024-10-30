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

class j06000asamodule_resources
	{
	function __construct( $componentArgs )
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch )
			{
			$this->template_touchable = false;
			$this->shortcode_data = array (
				"task" => "asamodule_resources",
				"info" => "_JOMRES_SHORTCODES_06000ASAMODULE_RESOURCES",
                'arguments' => array(
					0 => array(
                        'argument' => 'asamodule_resources_puid',
                        'arg_info' => '_JOMRES_SHORTCODES_06000ASAMODULE_RESOURCES_ASAMODULE_RESOURCES_PUID',
                        'arg_example' => '1'
                        ),
					1 => array(
                        'argument' => 'asamodule_resources_ids',
                        'arg_info' => '_JOMRES_SHORTCODES_06000ASAMODULE_RESOURCES_ASAMODULE_RESOURCES_IDS',
                        'arg_example' => '54,55,56'
                        ),
					2 => array(
                        'argument' => 'arrivalDate',
                        'arg_info' => '_JOMRES_SHORTCODES_06000ASAMODULE_RESOURCES_ARRIVALDATE',
                        'arg_example' => '01/02/2018'
                        )
                    )
				);
			return;
			}
		
		
		
		
		$ePointFilepath=get_showtime('ePointFilepath');
		
		if (isset($componentArgs[ 'asamodule_resources_puid' ]))
			$property_uid = (int) $componentArgs[ 'asamodule_resources_puid' ];
		elseif ( isset ( $_REQUEST['asamodule_resources_puid'] ))
			$property_uid = (int) $_REQUEST['asamodule_resources_puid'];
		else return;
		
		if (!user_can_view_this_property($property_uid))
			return;

		$ids = trim(jomresGetParam($_REQUEST,'asamodule_resources_ids', ''));

		$resource_ids_bang = explode (",",$ids);

		$resource_ids = array();
		foreach ($resource_ids_bang as $r_id)
			{
			if ((int)$r_id!=0)
				$resource_ids[] = (int)$r_id;
			}
		if (empty($resource_ids))
			return;

		$current_property_details = jomres_singleton_abstract::getInstance( 'basic_property_details' );
		$current_property_details->gather_data( $property_uid );
		
		$jomres_media_centre_images = jomres_singleton_abstract::getInstance( 'jomres_media_centre_images' );
		
		$basic_room_details = jomres_singleton_abstract::getInstance( 'basic_room_details' );
		$basic_room_details->get_all_rooms($property_uid);
		
		$mrConfig = getPropertySpecificSettings($property_uid);
		
		$roomclass_uids = array();
		foreach ( $basic_room_details->rooms as $room )
			{
			if (in_array($room['room_uid'], $resource_ids))
				$roomclass_uids[] = $room['room_classes_uid'];
			}
		
		//get each room type price
		$lowest_ever = false;
		
		$searchDate        = date( "Y/m/d" );
		$tmpBookingHandler = jomres_singleton_abstract::getInstance( 'jomres_temp_booking_handler' );
		if ( isset( $_REQUEST[ 'arrivalDate' ] ) && $_REQUEST[ 'arrivalDate' ] != "" )
			{
			$searchDate = JSCalConvertInputDates( jomresGetParam( $_REQUEST, 'arrivalDate', "" ) );
			}
		elseif ( !empty( $tmpBookingHandler->tmpsearch_data ) )
			{
			if (isset($tmpBookingHandler->tmpsearch_data[ 'jomsearch_availability' ]) && trim($tmpBookingHandler->tmpsearch_data[ 'jomsearch_availability' ])!='')
				{
				$searchDate = $tmpBookingHandler->tmpsearch_data[ 'jomsearch_availability' ];
				}
			elseif (isset($tmpBookingHandler->tmpsearch_data['ajax_search_composite_selections']['arrivalDate']) && trim($tmpBookingHandler->tmpsearch_data['ajax_search_composite_selections']['arrivalDate'] != ''))
				{
				$searchDate = JSCalConvertInputDates($tmpBookingHandler->tmpsearch_data['ajax_search_composite_selections']['arrivalDate'],$siteCal=true);
				}
			}
		
		if (!$lowest_ever)
			$clause="AND DATE_FORMAT('" . $searchDate . "', '%Y/%m/%d') BETWEEN DATE_FORMAT(`validfrom`, '%Y/%m/%d') AND DATE_FORMAT(`validto`, '%Y/%m/%d')";
					
		$query = "SELECT roomclass_uid, roomrateperday FROM #__jomres_rates WHERE property_uid = ".$property_uid." AND roomclass_uid IN (" . implode(',',$roomclass_uids) .") AND roomrateperday > 0 $clause ";
		$tariffList = doSelectSql( $query );
		
		if ( !empty( $tariffList ) )
			{
			foreach ( $tariffList as $t )
				{
				if ( !isset( $pricesFromArray[ $t->roomclass_uid ] ) ) 
					$pricesFromArray[ $t->roomclass_uid ] = $t->roomrateperday;
				elseif ( isset( $pricesFromArray[ $t->roomclass_uid ] ) && $pricesFromArray[ $t->roomclass_uid ] > $t->roomrateperday ) 
					$pricesFromArray[ $t->roomclass_uid ] = $t->roomrateperday;
				}
			}
		
		$multiplier = 1;
		if ( !isset( $mrConfig[ 'booking_form_daily_weekly_monthly' ] ) ) // This shouldn't be needed, as the setting is automatically pulled from jomres_config.php, but there's always one weird server...
			$mrConfig[ 'booking_form_daily_weekly_monthly' ] = "D";
	
		switch ( $mrConfig[ 'booking_form_daily_weekly_monthly' ] )
			{
			case "D":
				$multiplier = 1;
				break;
			case "W":
				if ( $mrConfig[ 'tariffChargesStoredWeeklyYesNo' ] != "1" ) $multiplier = 7;
				break;
			case "M":
				$multiplier = 30;
				break;
			}
		
		//generate the output
		$output = array();
		$animationDelay = 0;

		if ( !empty( $basic_room_details->rooms ) )
			{
			//get room and room feature images
			$jomres_media_centre_images->get_images($property_uid, array('rooms'));
			
			$rows = array();

			foreach ( $basic_room_details->rooms as $room )
				{
				if (in_array($room['room_uid'], $resource_ids))
					{
					$r = array ();
					
					$r[ 'HMAXPEOPLE' ] = jr_gettext( '_JOMRES_COM_MR_VRCT_ROOM_HEADER_MAXPEOPLE', '_JOMRES_COM_MR_VRCT_ROOM_HEADER_MAXPEOPLE', false );
					$r[ 'MOREINFORMATION' ] = jr_gettext( '_JOMRES_COM_A_CLICKFORMOREINFORMATION', '_JOMRES_COM_A_CLICKFORMOREINFORMATION', false, false );
					
					$r[ 'MAXPEOPLE' ] = $room['max_people'];
					
					$r[ 'ROOMTYPE' ] = $current_property_details->all_room_types[ $room['room_classes_uid'] ]['room_class_abbv'];
	
					$roomFeatureDescriptionsArray = array ();
					$roomFeatureUidsArray         = explode( ",", $room['room_features_uid'] );
					
					//room features
					$r[ 'ROOM_FEATURES' ] = "";
					foreach ($roomFeatureUidsArray as $f)
						{
						if ( isset($basic_room_details->all_room_features[ $f ]['feature_description'])) {
							$r[ 'ROOM_FEATURES' ] .= $basic_room_details->all_room_features[ $f ]['feature_description'].', ';
						}
						
						}
					
					$r[ 'RANDOM_IDENTIFIER' ]  = generateJomresRandomString( 10 );

					if ($jomres_media_centre_images->images['rooms'][$room['room_uid']][0]['large'] != "")
						{
						$r[ 'IMAGELARGE' ]  = $jomres_media_centre_images->images['rooms'][$room['room_uid']][0]['large'];
						$r[ 'IMAGEMEDIUM' ] = $jomres_media_centre_images->images['rooms'][$room['room_uid']][0]['medium'];
						$r[ 'IMAGETHUMB' ]  = $jomres_media_centre_images->images['rooms'][$room['room_uid']][0]['small'];
						}
					
					$r[ 'MOREINFORMATIONLINK' ]  = jomresURL( JOMRES_SITEPAGE_URL . "&task=show_property_rooms&property_uid=".$property_uid);
					
					//animations
					$r[ 'ANIMATION_DELAY' ] = $animationDelay;
					$animationDelay = $animationDelay + 300;
					
					//price output...to be done better later
					if ( isset( $pricesFromArray[ $room['room_classes_uid'] ] ) )
						{
						if ( $mrConfig[ 'prices_inclusive' ] == "0" ) 
							{
							$raw_price = $current_property_details->get_gross_accommodation_price( $pricesFromArray[ $room['room_classes_uid'] ], $property_uid ) * $multiplier;
							$price = output_price( $current_property_details->get_gross_accommodation_price( $pricesFromArray[ $room['room_classes_uid'] ], $property_uid ) * $multiplier, "", true, true );
							$price_no_conversion = output_price( $current_property_details->get_gross_accommodation_price( $pricesFromArray[ $room['room_classes_uid'] ], $property_uid ) * $multiplier, "", false, true );
							}
						else
							{
							$raw_price =  $pricesFromArray[ $room['room_classes_uid'] ] * $multiplier;
							$price = output_price( $pricesFromArray[ $room['room_classes_uid'] ] * $multiplier, "", true, true );
							$price_no_conversion = output_price( $pricesFromArray[ $room['room_classes_uid'] ] * $multiplier, "", false, true );
							}
		
						if ( $mrConfig[ 'tariffChargesStoredWeeklyYesNo' ] == "1" && $mrConfig[ 'tariffmode' ] == "1" ) 
							$post_text = "&nbsp;" . jr_gettext( '_JOMRES_COM_MR_LISTTARIFF_ROOMRATEPERWEEK', '_JOMRES_COM_MR_LISTTARIFF_ROOMRATEPERWEEK' );
						else
							{
							if ( $mrConfig[ 'wholeday_booking' ] == "1" )
								{
								if ( $mrConfig[ 'perPersonPerNight' ] == "0" ) 
									$post_text = "&nbsp;" . jr_gettext( '_JOMRES_FRONT_TARIFFS_PN_DAY_WHOLEDAY', '_JOMRES_FRONT_TARIFFS_PN_DAY_WHOLEDAY' );
								else
									$post_text = "&nbsp;" . jr_gettext( '_JOMRES_FRONT_TARIFFS_PPPN_DAY_WHOLEDAY', '_JOMRES_FRONT_TARIFFS_PPPN_DAY_WHOLEDAY' );
								}
							else
								{
								switch ( $mrConfig[ 'booking_form_daily_weekly_monthly' ] )
									{
									case "D":
										if ( $mrConfig[ 'wholeday_booking' ] == "1" ) 
											$post_text = jr_gettext( '_JOMRES_FRONT_TARIFFS_PN_DAY_WHOLEDAY', '_JOMRES_FRONT_TARIFFS_PN_DAY_WHOLEDAY' );
										else
											{
											if ( $mrConfig[ 'perPersonPerNight' ] == "0" ) $post_text = "&nbsp;" . jr_gettext( '_JOMRES_FRONT_TARIFFS_PN', '_JOMRES_FRONT_TARIFFS_PN' );
											else
												$post_text = "&nbsp;" . jr_gettext( '_JOMRES_FRONT_TARIFFS_PPPN', '_JOMRES_FRONT_TARIFFS_PPPN' );
											}
										break;
									case "W":
										$post_text = jr_gettext( '_JOMRES_BOOKINGFORM_PRICINGOUTPUT_WEEKLY', '_JOMRES_BOOKINGFORM_PRICINGOUTPUT_WEEKLY' );
										break;
									case "M":
										$post_text = jr_gettext( '_JOMRES_BOOKINGFORM_PRICINGOUTPUT_MONTHLY', '_JOMRES_BOOKINGFORM_PRICINGOUTPUT_MONTHLY' );
										break;
									}
								}
							}
						$pre_text = jr_gettext( '_JOMRES_TARIFFSFROM', '_JOMRES_TARIFFSFROM', false, false );
						}
					else
						{
						$pre_text  = '';
						$price     = jr_gettext( '_JOMRES_PRICE_ON_APPLICATION', '_JOMRES_PRICE_ON_APPLICATION', "", true, false );
						$post_text = '';
						}
					
					$r['PRICE_PRE_TEXT'] = $pre_text;
					$r['PRICE_PRICE'] = $price;
					$r['PRICE_POST_TEXT'] = $post_text;
				
					$rows[ ] = $r;
					}
				}

			$pageoutput=array();
			$pageoutput[]=$output;
			$tmpl = new patTemplate();
			$tmpl->addRows( 'pageoutput', $pageoutput );
			$tmpl->addRows( 'rows', $rows );
			$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
			$tmpl->readTemplatesFromInput( 'asamodule_resources.html' );
			$tmpl->displayParsedTemplate();
			}
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
