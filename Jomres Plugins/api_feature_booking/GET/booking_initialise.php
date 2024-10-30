<?php
/**
 * Core file
 *
 * @author Vince Wooll <sales@jomres.net>
 * @version Jomres 9
 * @package Jomres
 * @copyright	2005-2016 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly.
 **/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

	/*
	 * Respond with all of the data the remote form will need to setup a booking UI
	 *
	 */

	Flight::route('GET /booking/initialise/@property_uid/@language', function($property_uid , $language)
	{
		$language = filter_var($language, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		require_once("../framework.php");

		jr_import('NBE_BookingEngineException');
		jr_import('jomres_markdown');
		jr_import('new_booking_engine');
		jr_import('apiBookingUtilities');
		jr_import('apiBookingUtilitiesValidation');
		jr_import('NBE_Utilities');

		$session_id = apiBookingUtilities::getSessionIdFromHeaders();
		$nbe = new new_booking_engine( $session_id );
		$nbe->property_uid = $property_uid;
		$nbe->set_language($language);
		$nbe->initialise( $session_id );
		apiBookingUtilities::crawlerCheck($nbe);
		$nbe->context = 'api';

		if ($nbe->property_uid == '0') {
			apiBookingUtilities::throwError ('002' );
		}

		if ($nbe->property_published == '0') {
			apiBookingUtilities::throwError ('003' );
		}

		$response = new stdClass();
		$response->data = array();
		$response->info = array();

		$response->data['booking_model'] = $nbe->booking_model;
		$response->data['language'] = $nbe->language;
		$response->data['property_name'] = $nbe->property_name;
		$response->data['confirmation_url'] = $nbe->confirmation_url;
		$response->data['property_details_url'] = $nbe->property_details_url;
		$response->data['bypass_confirmation'] = $nbe->bypass_confirmation;

		$response->data['min_days'] = $nbe->min_days;

		$response->data['fixedPeriodBookings'] = $nbe->fixedPeriodBookings;
		$response->data['fixedPeriodBookingsNumberOfDays'] = $nbe->fixedPeriodBookingsNumberOfDays;
		$response->data['fixedArrivalDateYesNo'] = $nbe->fixedArrivalDateYesNo;
		$response->data['fixedArrivalDay'] = $nbe->fixedArrivalDay;

		$response->data['capacity'] = ['adults' => $nbe->PropertyConfiguration->mrConfig['accommodates_adults'] , 'children' => $nbe->PropertyConfiguration->mrConfig['accommodates_children'] ];

		$response->data['labels'] = $nbe->PropertyItemsOutputStrings->output_strings;
		$response->data['images'] = $nbe->NBE_PropertyItemsImages->images;
		$response->data['availability'] =[ 'allowed_dates' => $nbe->allowed_dates , 'not_available_dates' => array_values($nbe->not_available_dates) ] ;

		// SRPs can use the data in this array however for MRPs the client will need to call the GET booking rooms endpoint to get a list of rooms that are free on the dates of the booking, so the client will need to set the dates before we can return a list of rooms available on that date

		$response->data['rooms'] = apiBookingUtilities::extractPricesFromTariffSets($nbe->NBE_FilterTariffsOrganiseByRoomType->rooms);

		//$response->data['rooms'] = $nbe->NBE_FilterTariffsOrganiseByRoomType->rooms;

		$response->data['address_form_fields'] = $nbe->address_form_fields;
		$response->data['currency_code'] =$nbe->currencycode;
		$response->data['child_rates'] =$nbe->child_rates;
		$response->data['extras'] = $nbe->PropertyItemsExtras->extras;


		$response->info['booking_model'] = "The property booking model, is it an SRP or MRP? (SRPs : Apartments, Villas MRPs : Hotesl, B&Bs, Camp sites).";
		$response->info['confirmation_url'] = "This is the url the guest should be redirected to to complete the booking, from where they can then enter any special requirements and choose their payment method.";
		$response->info['min_days'] = "The shortest possible booking, which is determined as the shortest booking period of all of the property tariffs. Should only be used as a fallback, as each tariff should have a minimum interval value configured for each day.";
		$response->info['fixedPeriodBookings'] = "Are bookings fixed to a specific number of days? Boolean.";
		$response->info['fixedPeriodBookingsNumberOfDays'] = "If fixedPeriodBookings is true then how many days should bookings be limited to, and all future bookings be a multiple of?";
		$response->info['fixedArrivalDateYesNo'] = "Boolean. Can there only be one arrival day of the week?";
		$response->info['fixedArrivalDay'] = "If fixedArrivalDateYesNo is true then what should the arrival day be? By default this is set to 7, which means any day. Other responses will be 0 : Sunday, 1 : Monday, 2 : Tuesday, 3 : Wednesday, 4 : Thursday, 5 : Friday, 6 : Saturday.";
		$response->info['capacity'] = "How many adults and children can the entire property accommodate?";
		$response->info['labels'] = "Typically form field labels. The array index is usually delivered capitalised to make it easy to identify as a label.";
		$response->info['images'] = "Images stored for this property";
		$response->info['availability'] = "Two arrays, one with the dates the property is available, another when it is not available. For X date given, this means that the property is not available for the night of X date. Not available dates are dates which either have bookings, or the 'Days before arrival setting prohibits bookings earlier than N days of 'today' ";
		$response->info['rooms'] = "All of the property rooms. This is the same structure, regardless of whether it's an MRP or SRP, but MRPs will return more rooms. It is an array of each room and the availability of that room. ";

		$response->data['countries'] = countryCodesArray();
		$nbe->save_session();
		Flight::json( $response_name = "initialise" , [ 'response' => $response ] );

	});

