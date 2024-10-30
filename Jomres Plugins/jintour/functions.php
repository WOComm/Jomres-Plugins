<?php

// ################################################################
	defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################


	function jintour_build_available_tours_list($bkg)
	{
		$ePointFilepath=get_showtime('ePointFilepath');

		if (!isset($bkg->property_uid)) {
			return false;
		}

		$list = "";
		$mrConfig=getPropertySpecificSettings();
		$valid_tours = jintour_get_tours_for_arrdep_dates($bkg);
		$jrportal_taxrate = jomres_singleton_abstract::getInstance( 'jrportal_taxrate' );
		$temp_adult_price_for_header=0;
		$temp_kids_price_for_header=0;

		$jomres_media_centre_images = jomres_singleton_abstract::getInstance('jomres_media_centre_images');
		$jomres_media_centre_images->get_images($bkg->property_uid, array('jintour'));


		$rows=array();

		if (!empty($valid_tours))
		{
			foreach ($valid_tours as $tour)
			{

				$currfmt = jomres_getSingleton('jomres_currency_format');
				// need a check here to figure out how many adults and kids have already been selected and adjust the dropdowns accordingly
				if ((int)$tour['spaces_available_adults']>0 || (int)$tour['spaces_available_kids']>0)
				{
					$tour_id = $tour['id'];
					if (isset($bkg->third_party_extras_private_data['jintour']['chosen_options'][$tour_id]))
					{
						$current_choices = $bkg->third_party_extras_private_data['jintour']['chosen_options'][$tour_id];

						if (isset($current_choices['adults']))
							$already_chosen_adults = (int)$current_choices['adults'];
						else
							$already_chosen_adults = 0;

						if (isset($current_choices['kids']))
							$already_chosen_kids = (int)$current_choices['kids'];
						else
							$already_chosen_kids = 0;

						$already_chosen_total = $already_chosen_adults + $already_chosen_kids;
					}
					else
					{
						$already_chosen_adults = 0;
						$already_chosen_kids = 0;
						$already_chosen_total = 0;
					}

					$tax_rate=$tour['tax_rate'];
					$rate=(float)$jrportal_taxrate->taxrates[$tax_rate]['rate'];
					$tax_output = "";
					if ($tax_rate > 0)
						$tax_output = " (".$rate."%)";

					$adult_price_output=$tour['price_adults'];
					$kid_price_output=$tour['price_kids'];

					if ( (float) $tour['price_adults'] > 0 )
						$temp_adult_price_for_header = (float) $tour['price_adults'];
					if ( (float) $tour['price_kids'] > 0 )
						$temp_kids_price_for_header = (float) $tour['price_kids'];

					if ($mrConfig['prices_inclusive'] == 0 && $rate>0)
					{
						$tax   = ( $kid_price_output / 100 ) * $rate;
						$kid_price_output = $kid_price_output + $tax;

						$tax   = ( $adult_price_output / 100 ) * $rate;
						$adult_price_output = $adult_price_output + $tax;
					}

					$spaces_available_adults = (int)$tour['spaces_available_adults'];
					$spaces_available_kids = (int)$tour['spaces_available_kids'];

					if (!function_exists('output_price'))
					{
						$adult_price=$mrConfig['currency'].$currfmt->get_formatted($adult_price_output).$tax_output;
						$kid_price=$mrConfig['currency'].$currfmt->get_formatted($kid_price_output).$tax_output;
					}
					else
					{
						$adult_price=output_price($adult_price_output).$tax_output;
						$kid_price=output_price($kid_price_output).$tax_output;
					}

					//$popup=jomres_makeTooltip('_JOMRES_CUSTOMTEXT_EXTRADESC'.$tour['id'],$tour['title'],$tour['description'],$tour['description'],$class="",$type="infoimage",array("width"=>20,"height"=>20) );

					$adult_dropdown="";
					if ((float)$tour['price_adults']>0.00)
						$adult_dropdown="&nbsp;&nbsp;".jomresHTML::integerSelectList( 00, $spaces_available_adults, 1, "jintour_adults_".$tour['id'], ' AUTOCOMPLETE="OFF" onchange="getResponse(\'jintour\',this.value+\'^adults^'.$tour['id'].'\');"', $already_chosen_adults, "%02d" ,false );

					$kids_dropdown="";
					if ((float)$tour['price_kids']>0.00)
						$kids_dropdown="&nbsp;&nbsp;".jomresHTML::integerSelectList( 00, $spaces_available_kids, 1, "jintour_kids_".$tour['id'], ' AUTOCOMPLETE="OFF"    onchange="getResponse(\'jintour\',this.value+\'^kids^'.$tour['id'].'\');"', $already_chosen_kids, "%02d" ,false );

					if ( !is_null($tour['profile_id']) && isset($jomres_media_centre_images->images['jintour'] [$tour['profile_id']][0]['small'])) {
						$image_small = $jomres_media_centre_images->images['jintour'] [$tour['profile_id']][0]['small'];
						$image_medium = $jomres_media_centre_images->images['jintour'] [$tour['profile_id']][0]['medium'];
						$image_large = $jomres_media_centre_images->images['jintour'] [$tour['profile_id']][0]['large'];
					} else {
						$image_small = $jomres_media_centre_images->multi_query_images['noimage-small'];
						$image_medium = $jomres_media_centre_images->multi_query_images['noimage-medium'];
						$image_large = $jomres_media_centre_images->multi_query_images['noimage-large'];
					}

					$r = array();
					$r['IMAGE_SMALL'] = $image_small;
					$r['IMAGE_MEDIUM'] = $image_medium;
					$r['IMAGE_LARGE'] = $image_large;


					$r['TOURTITLE'] = jr_gettext('_JINTOUR_TOUR_TITLE_CUSTOM_TEXT'.$tour['id'],$tour['title'],false,false);

					if ($adult_dropdown!="") {
						$r['ADULT_PRICE'] = $adult_price;
						$r['ADULT_DROPDOWN'] = $adult_dropdown;
					} else {
						$r['ADULT_PRICE'] = '';
						$r['ADULT_DROPDOWN'] = '';
					}

					if ($kids_dropdown!="") {
						$r['KID_PRICE'] = $kid_price;
						$r['KIDS_DROPDOWN'] = $kids_dropdown;
					} else {
						$r['KID_PRICE'] = '';
						$r['KIDS_DROPDOWN'] = '';
					}

					$r['DATE'] = outputDate(str_replace("-","/",$tour['tourdate']));
					$r['DESCRIPTION'] = $tour['description'];

					$adult_str = "&nbsp;";
					$kid_str = "&nbsp;";

					if ($temp_adult_price_for_header > 0)
						$adult_str = jr_gettext('_JINTOUR_TOUR_ADULTS','_JINTOUR_TOUR_ADULTS',false);

					if ($temp_kids_price_for_header > 0)
						$kid_str = jr_gettext('_JINTOUR_TOUR_KIDS','_JINTOUR_TOUR_KIDS',false);

					$r['_JINTOUR_TOUR_TITLE'] = jr_gettext('_JINTOUR_TOUR_TITLE','_JINTOUR_TOUR_TITLE',false) ;
					$r['ADULT_STR'] = $adult_str ;
					$r['KID_STR'] = $kid_str ;
					$r['_JINTOUR_TOUR_DATE'] = jr_gettext('_JINTOUR_TOUR_DATE','_JINTOUR_TOUR_DATE',false) ;
					$r['_JINTOUR_TOUR_ITINERY'] = jr_gettext('_JINTOUR_TOUR_ITINERY','_JINTOUR_TOUR_ITINERY',false) ;

					$rows[] = $r;
				}
			}

			$adult_str = "&nbsp;";
			$kid_str = "&nbsp;";

			if ($temp_adult_price_for_header > 0)
				$adult_str = jr_gettext('_JINTOUR_TOUR_ADULTS','_JINTOUR_TOUR_ADULTS',false);

			if ($temp_kids_price_for_header > 0)
				$kid_str = jr_gettext('_JINTOUR_TOUR_KIDS','_JINTOUR_TOUR_KIDS',false);

			$pageoutput = array();
			$output = array();
			$output['_JINTOUR_TOUR_TITLE'] = jr_gettext('_JINTOUR_TOUR_TITLE','_JINTOUR_TOUR_TITLE',false) ;
			$output['ADULT_STR'] = $adult_str ;
			$output['KID_STR'] = $kid_str ;
			$output['_JINTOUR_TOUR_DATE'] = jr_gettext('_JINTOUR_TOUR_DATE','_JINTOUR_TOUR_DATE',false) ;
			$output['_JINTOUR_TOUR_ITINERY'] = jr_gettext('_JINTOUR_TOUR_ITINERY','_JINTOUR_TOUR_ITINERY',false) ;

			$pageoutput[ ] = $output;
			$tmpl = new patTemplate();
			$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
			$tmpl->addRows('pageoutput', $pageoutput);
			$tmpl->addRows('rows', $rows);
			$tmpl->readTemplatesFromInput('booking_form_tours_list.html');

			return preg_replace('/^\s+|\n|\r|\s+$/m', '', $tmpl->getParsedTemplate());

		}
		else return false;

	}

	function jintour_get_tours_for_arrdep_dates($bkg)
	{
		if ( isset($bkg->arrivalDate)) {
			$unixArrivalDate=strtotime($bkg->arrivalDate);
			$unixDepartureDate=strtotime($bkg->departureDate);
			$valid_tours = array();
			$all_tours = jintour_get_all_tours($bkg->property_uid);
			if (!empty($all_tours))
			{
				foreach ($all_tours as $tour)
				{
					$unixTourDate=strtotime($tour['tourdate']);
					if (!get_showtime('include_room_booking_functionality'))
					{
						if ( ($unixTourDate >= $unixArrivalDate && $unixTourDate < $unixDepartureDate) && $tour['published'] == 1)
						{
							$tour_id=$tour['id'];
							$valid_tours[$tour_id]=$tour;
						}
					}
					else
					{
						if ( ($unixTourDate >= $unixArrivalDate && $unixTourDate <= $unixDepartureDate) && $tour['published'] == 1)
						{
							$tour_id=$tour['id'];
							$valid_tours[$tour_id]=$tour;
						}

					}
				}
			}
			$bkg->third_party_extras_private_data['jintour']['validtours']=$valid_tours;
			return $valid_tours;
		} else {
			return array();
		}

	}

	function jintour_get_all_tours($property_uid)
	{
		$result = array();
		$query = "SELECT * FROM #__jomres_jintour_tours WHERE property_uid =".$property_uid." OR property_uid = 0";
		$tours = doSelectSql($query);
		if (!empty($tours))
		{
			foreach ($tours as $p)
			{
				$result[$p->id]['id'] = $p->id;
				$result[$p->id]['title'] = $p->title;
				$result[$p->id]['description'] = $p->description;
				$result[$p->id]['price_adults'] = $p->price_adults;
				$result[$p->id]['price_kids'] = $p->price_kids;
				$result[$p->id]['spaces_available_adults'] = $p->spaces_available_adults;
				$result[$p->id]['spaces_available_kids'] = $p->spaces_available_kids;
				$result[$p->id]['tourdate'] = $p->tourdate;
				$result[$p->id]['tax_rate'] = $p->tax_rate;
				$result[$p->id]['published'] = $p->published;
				$result[$p->id]['property_uid'] = $p->property_uid;
				$result[$p->id]['profile_id'] = $p->profile_id;
			}
		}
		return $result;
	}

	function jintour_get_tour($tour_id =0,$property_uid = 0)
	{

		if ($tour_id ==0)
			return false;

		$result = array();
		$query = "SELECT * FROM #__jomres_jintour_tours WHERE ( property_uid =".$property_uid." OR property_uid = 0) AND id =".$tour_id." LIMIT 1";
		$tours = doSelectSql($query);
		if (!empty($tours))
		{
			foreach ($tours as $p)
			{
				$result[$p->id]['id'] = $p->id;
				$result[$p->id]['title'] = $p->title;
				$result[$p->id]['description'] = $p->description;
				$result[$p->id]['price_adults'] = $p->price_adults;
				$result[$p->id]['price_kids'] = $p->price_kids;
				$result[$p->id]['spaces_available_adults'] = $p->spaces_available_adults;
				$result[$p->id]['spaces_available_kids'] = $p->spaces_available_kids;
				$result[$p->id]['tourdate'] = $p->tourdate;
				$result[$p->id]['tax_rate'] = $p->tax_rate;
				$result[$p->id]['published'] = $p->published;
			}
		}
		return $result;
	}
	function jintour_get_all_tour_profiles($property_uid)
	{
		$result = array();
		$query = "SELECT * FROM #__jomres_jintour_profiles WHERE property_uid =".$property_uid;
		$profiles = doSelectSql($query);
		if (!empty($profiles))
		{
			foreach ($profiles as $p)
			{
				$result[$p->id]['id'] = $p->id;
				$result[$p->id]['title'] = $p->title;
				$result[$p->id]['description'] = $p->description;
				$result[$p->id]['days_of_week'] = $p->days_of_week;
				$result[$p->id]['price_adults'] = $p->price_adults;
				$result[$p->id]['price_kids'] = $p->price_kids;
				$result[$p->id]['spaces_adults'] = $p->spaces_adults;
				$result[$p->id]['spaces_kids'] = $p->spaces_kids;
				$result[$p->id]['start_date'] = $p->start_date;
				$result[$p->id]['end_date'] = $p->end_date;
				$result[$p->id]['repeating'] = $p->repeating;
				$result[$p->id]['property_uid'] = $p->property_uid;
				$result[$p->id]['tax_rate'] = $p->tax_rate;
			}
		}
		return $result;
	}

	function jintour_get_tour_profile($profile_id =0,$property_uid = 0)
	{

		if ($profile_id ==0)
			return false;

		$result = array();
		$query = "SELECT * FROM #__jomres_jintour_profiles WHERE property_uid =".$property_uid." AND id =".$profile_id." LIMIT 1";
		$profiles = doSelectSql($query);
		if (!empty($profiles))
		{
			foreach ($profiles as $p)
			{
				$result[$p->id]['id'] = $p->id;
				$result[$p->id]['title'] = $p->title;
				$result[$p->id]['description'] = $p->description;
				$result[$p->id]['days_of_week'] = $p->days_of_week;
				$result[$p->id]['price_adults'] = $p->price_adults;
				$result[$p->id]['price_kids'] = $p->price_kids;
				$result[$p->id]['spaces_adults'] = $p->spaces_adults;
				$result[$p->id]['spaces_kids'] = $p->spaces_kids;
				$result[$p->id]['start_date'] = $p->start_date;
				$result[$p->id]['end_date'] = $p->end_date;
				$result[$p->id]['repeating'] = $p->repeating;
				$result[$p->id]['property_uid'] = $p->property_uid;
				$result[$p->id]['tax_rate'] = $p->tax_rate;
			}
		}
		return $result;
	}
	
