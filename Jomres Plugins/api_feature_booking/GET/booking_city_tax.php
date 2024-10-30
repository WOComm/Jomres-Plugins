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
	 * Send the booking accommodation total, respond with the city tax
	 *
	 */
	Flight::route('GET /booking/city_tax/', function()
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


		if ($nbe->property_uid == '0') {
			apiBookingUtilities::throwError ('002');
		}

		if ($nbe->property_published == '0') {
			apiBookingUtilities::throwError ('003' );
		}

		$accommodation_booking_total = $nbe->TempBookingHandler->getBookingData('room_total');
		$stay_days = $nbe->TempBookingHandler->getBookingData('stay_days');
		$adults = (int)$nbe->TempBookingHandler->getNBEData('adults');
		$children = (int)$nbe->TempBookingHandler->getNBEData('children');

		$accommodation_booking_total = (float)$accommodation_booking_total;
		$stay_days = (int)$stay_days;
		$number_of_guests = $adults + $children;
		$mrConfig = $nbe->PropertyConfiguration->mrConfig;

		if ($mrConfig['city_tax_value'] > 0 ) {
			if (!isset($mrConfig[ 'city_tax_models' ])) {
				$mrConfig[ 'city_tax_models' ] = 'single';
			}

			if ( (float)$mrConfig[ 'city_tax_value' ] > 0 ) {

				switch ($mrConfig[ 'city_tax_models' ]) {
					case 'single' :
						$city_tax = (float)$mrConfig[ 'city_tax_value' ];
						$city_tax_model_string = jr_gettext('JOMRES_CITY_TAX_MODEL_SINGLE', 'JOMRES_CITY_TAX_MODEL_SINGLE', false);
						break;
					case 'pernight' :
						$city_tax = (float)$mrConfig[ 'city_tax_value' ] * $stay_days ;
						$city_tax_model_string = jr_gettext('JOMRES_CITY_TAX_MODEL_PER_NIGHT', 'JOMRES_CITY_TAX_MODEL_PER_NIGHT', false) ;
						break;
					case 'perguest' :
						$city_tax = (float)$mrConfig[ 'city_tax_value' ] * $number_of_guests ;
						$city_tax_model_string = jr_gettext('JOMRES_CITY_TAX_MODEL_PER_GUEST', 'JOMRES_CITY_TAX_MODEL_PER_GUEST', false) ;
						break;
					case 'perguestpernight' :
						$city_tax = ((float)$mrConfig[ 'city_tax_value' ]  * $stay_days)  * $number_of_guests ;
						$city_tax_model_string = jr_gettext('JOMRES_CITY_TAX_MODEL_PER_GUEST_PER_NIGHT', 'JOMRES_CITY_TAX_MODEL_PER_GUEST_PER_NIGHT', false) ;
						break;
					case 'percentbookingtotal' :
						$city_tax = $accommodation_booking_total * ((float)$mrConfig[ 'city_tax_value' ] / 100);
						$city_tax_model_string = jr_gettext('JOMRES_CITY_TAX_MODEL_PERCENTAGE_OF_BOOKING_TOTAL', 'JOMRES_CITY_TAX_MODEL_PERCENTAGE_OF_BOOKING_TOTAL', false);
						break;
				}
			}
		} else {
			Flight::json( "tax" , [ 'city_tax' => 0 ] );
		}

		$response = [ 'tax' => $city_tax , 'label' => $city_tax_model_string ];

		$nbe->TempBookingHandler->setBookingData('city_tax',$city_tax );
		$nbe->save_session();

		Flight::json( "tax" , $response );
	});
