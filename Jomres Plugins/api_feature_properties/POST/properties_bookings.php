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
	** Title | Add an administrator/receptionist booking to a property
	** Description | This is analgous to adding a booking via the dashboard. It doesn't calculate prices of any sort, instead it expects to be sent the deposit and full cost of the booking
	** Plugin | api_feature_properties
	** Scope | properties_set
	** URL | properties
 	** Method | POST
	** URL Parameters | properties/:ID/bookings/add/(:LANGUAGE)
	** Data Parameters | room_uid, start, end, deposit_paid, deposit_required, contract_total, booked_in, currencyCode, firstname, surname, existing_id, house, street, town, region, country, postcode, landline, mobile, email
	** Success Response | {"data":{"id":87}}
	** Error Response | 
	** Sample call |jomres/api/properties/1/bookings/add
	** Notes |
	
	POST FIELDS example
 	$data = array (
			"room_uid"							=> "63",
			"start"								=> "2016-06-25",  // Arrival date
			"end"								=> "2016-06-24", // Departure date
			"deposit_paid"						=> 0, // 0 or 1. Typically it would be set to 1 if the guest is a walk-in and has paid be CC machine or similar.
			"deposit_required"					=> 25, // The amount of the depsoit paid
			"contract_total"					=> 110.50, // The full value of the booking
			"booked_in"							=> 0, // 0 or 1. Whether the guest is actually on the premises
			"currencyCode"						=> "GBP", 
			"firstname"							=> "Tom", 
			"surname"							=> "Smith",
			"existing_id"						=> "0", // If the guest already has a record in the system, use that id here
			"house"								=> "16", 
			"street"							=> "Elwood Avenue",
			"town"								=> "Torquay",
			"region"							=> 1113, // Use  www.example.com/jomres/api/properties/regions to retrieve Region ids
			"country"							=> "GB", // Countries sent must be in ISO 3166 format ( http://www.iso.org/iso/country_codes )
			"postcode"							=> "XXNN NNXX", // Freeform
			"landline"							=> "01234 567890",
			"mobile"							=> "07890 123456",
			"email"								=> "test@test.com"
		);
*/

Flight::route('POST /properties/@id/bookings/add(/@language)', function( $property_uid , $language) 
	{
	validate_scope::validate('properties_set');
	validate_property_access::validate($property_uid);
	
	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
	require_once("../framework.php");

	$insertSuccessful = false;
	
	$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
	
	$mrConfig = getPropertySpecificSettings( $property_uid );
	
	$current_property_details = jomres_singleton_abstract::getInstance( 'basic_property_details' );
	$current_property_details->gather_data($property_uid);
	
	jr_import( 'jomres_generic_booking_insert' );
	$bkg = new jomres_generic_booking_insert();
	
	//dates
	$startDate 				= jomresGetParam($_POST,'start','');
	$endDate 				= jomresGetParam($_POST,'end','');
	$arrivalDate 			= date("Y/m/d", strtotime($startDate));
	$departureDate			= date("Y/m/d", strtotime($endDate));
	if ((int)$mrConfig[ 'wholeday_booking' ] == '0')
		$lastDay			= date("Y/m/d", strtotime($endDate."-1 day"));
	else
		$lastDay			= $departureDate;
	$dates_array			= findDateRangeForDates($arrivalDate,$lastDay);
	
	//totals
	$contract_total			= (float)jomresGetParam($_POST,'contract_total', 0.00);
	$contract_total_nett	= $current_property_details->get_nett_accommodation_price($contract_total, $property_uid);
	$tax					= $contract_total - $contract_total_nett;
	
	$booking_number 		= set_booking_number();
	$room_uid				= jomresGetParam($_POST,'room_uid','0');
	
	//OK, let`s move on and set the new booking details
	$bkg->booking_details['property_uid'] 				= $property_uid;
	$bkg->booking_details['arrivalDate'] 				= $arrivalDate;
	$bkg->booking_details['departureDate'] 				= $departureDate;
	$bkg->booking_details['requestedRoom'] 				= $room_uid . "^0"; //it needs to have the ^tariff_uid too
	$bkg->booking_details['dateRangeString'] 			= implode(',',$dates_array);
	$bkg->booking_details['guests_uid'] 				= (int)jomresGetParam($_POST,'existing_id',0);
	$bkg->booking_details['contract_total'] 			= $contract_total;
	$bkg->booking_details['tax'] 						= $tax;
	$bkg->booking_details['deposit_required'] 			= (float)jomresGetParam($_POST,'deposit_required',0.00);
	$bkg->booking_details['room_total'] 				= $contract_total_nett; //has to be without tax
	$bkg->booking_details['room_total_nodiscount']		= $contract_total_nett; //has to be without tax
	$bkg->booking_details['currency_code'] 				= jomresGetParam($_POST,'currencyCode','GBP');
	$bkg->booking_details['depositpaidsuccessfully'] 	= (bool)jomresGetParam($_POST,'deposit_paid',0);
	$bkg->booking_details['property_currencycode']		= jomresGetParam($_POST,'currencyCode','GBP');
	$bkg->booking_details['booking_number']				= $booking_number;
	$bkg->booking_details['booked_in'] 					= (bool)jomresGetParam($_POST,'booked_in',0);
	$bkg->booking_details['sendGuestEmail'] 			= false;
	$bkg->booking_details['sendHotelEmail'] 			= false;
	
	//Now let`s set the new guest details
	$bkg->guest_details['existing_id']	 	= (int)jomresGetParam($_POST,'existing_id',0);
	$bkg->guest_details['mos_userid']	 	= (int)jomresGetParam($_POST,'mos_userid',0);
	$bkg->guest_details['firstname']	 	= jomresGetParam($_POST,'firstname','');
	$bkg->guest_details['surname']		 	= jomresGetParam($_POST,'surname','');
	$bkg->guest_details['house']		 	= jomresGetParam($_POST,'house','');
	$bkg->guest_details['street']		 	= jomresGetParam($_POST,'street','');
	$bkg->guest_details['town']			 	= jomresGetParam($_POST,'town','');
	$bkg->guest_details['region']		 	= jomresGetParam($_POST,'region','');
	$bkg->guest_details['country']		 	= jomresGetParam($_POST,'country','');
	$bkg->guest_details['postcode']	 		= jomresGetParam($_POST,'postcode','');
	$bkg->guest_details['tel_landline']		= jomresGetParam($_POST,'landline','');
	$bkg->guest_details['tel_mobile']	 	= jomresGetParam($_POST,'mobile','');
	$bkg->guest_details['email']		 	= jomresGetParam($_POST,'email','');

	//Finally let`s insert the new booking
	$insertSuccessful = $bkg->create_booking();

	if ($insertSuccessful === true)
		{
		$contract_uid = (string)$MiniComponents->miniComponentData[ '03020' ][ 'insertbooking' ]['contract_uid'];
		$booking_number = (string)$MiniComponents->miniComponentData[ '03020' ][ 'insertbooking' ]['cartnumber'];
		set_showtime("new_booking_number",$booking_number);
		set_showtime("new_booking_id",$contract_uid);
		
		Flight::json( $response_name = "booking_number" , $booking_number);
		}
	else
		{
		Flight::halt(409, $insertSuccessful);
		}
	});
