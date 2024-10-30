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
	 *
	 * Send the booking address details. Validate staget will check that all required fields have been filled and that the country code exists, and the region id corresponds with the country code
	 *
	 *
	 */
	Flight::route('POST /booking/set/address', function()
	{
		require_once("../framework.php");

		jr_import('NBE_BookingEngineException');
		jr_import('jomres_markdown');
		jr_import('new_booking_engine');
		jr_import('apiBookingUtilities');
		jr_import('apiBookingUtilitiesValidation');
		jr_import('NBE_Utilities');

		$session_id = apiBookingUtilities::getSessionIdFromHeaders();
		$nbe = new new_booking_engine();
		$nbe->context = 'api';
		$nbe->initialise( $session_id );
		apiBookingUtilities::crawlerCheck($nbe);


		$nbe->TempBookingHandler->setBookingData('ok_to_book',false );

		if ($nbe->property_uid == '0') {
			$errors = apiBookingUtilities::throwError ('002');
		}

		if ($nbe->property_published == '0') {
			$errors = apiBookingUtilities::throwError ('003' );
		}


		$firstname					= jomresGetParam( $_POST, 'firstname', '' );
		if ($firstname == 'undefined'|| $firstname == 'null') {
			$firstname = '';
		}
		$surname					= jomresGetParam( $_POST, 'surname', '' );
		if ($surname == 'undefined' || $surname == 'null') {
			$surname = '';
		}
		$house						= jomresGetParam( $_POST, 'house', '' );
		if ($house == 'undefined' || $house == 'null') {
			$house = '';
		}
		$street						= jomresGetParam( $_POST, 'street', '' );
		if ($street == 'undefined' || $street == 'null') {
			$street = '';
		}
		$town						= jomresGetParam( $_POST, 'town', '' );
		if ($town == 'undefined' || $town == 'null') {
			$town = '';
		}
		$postcode					= jomresGetParam( $_POST, 'postcode', '' );
		if ($postcode == 'undefined' || $postcode == 'null') {
			$postcode = '';
		}
		$country					= jomresGetParam( $_POST, 'country', '' );
		if ($country == 'undefined' || $country == 'null') {
			$country = '';
		}
		$region						= jomresGetParam( $_POST, 'region', '' );
		if ($region == 'undefined' || $region == 'null') {
			$region = '';
		}
		$tel_mobile					= jomresGetParam( $_POST, 'tel_mobile', '' );
		if ($tel_mobile == 'undefined' || $tel_mobile == 'null') {
			$tel_mobile = '';
		}
		$email						= jomresGetParam( $_POST, 'email', '' );
		if ($email == 'undefined' || $email == 'null') {
			$email = '';
		}

		$nbe->TempBookingHandler->setGuestData('firstname',$firstname);
		$nbe->TempBookingHandler->setGuestData('surname',$surname);
		$nbe->TempBookingHandler->setGuestData('house',$house);
		$nbe->TempBookingHandler->setGuestData('street',$street);
		$nbe->TempBookingHandler->setGuestData('town',$town);
		$nbe->TempBookingHandler->setGuestData('region',$region);
		$nbe->TempBookingHandler->setGuestData('country',$country);
		$nbe->TempBookingHandler->setGuestData('postcode',$postcode);
		$nbe->TempBookingHandler->setGuestData('tel_mobile',$tel_mobile);
		$nbe->TempBookingHandler->setGuestData('email',$email);
		$nbe->save_session();
		jr_import('jomres_call_api');
		$jomres_call_api = new jomres_call_api('system');
		try {
			$response = $jomres_call_api->send_request("GET" , "booking/validate/address" , [] , ['X-JOMRES-BOOKING-SESSION-ID: '.$session_id]);
		}
		catch (Exception $e) {
			// throw new Exception('Error: invalid response from local API, received '.$e->getMessage() );
		}

		if (!isset($response->data->address_validation->valid) || $response->data->address_validation->valid == false ) {
			Flight::json( "set_address" , [ 'valid' => false , 'reason' =>$response->data->address_validation->reason ] );
		}

		Flight::json( "set_address" , [ 'valid' => true ] );
	});


