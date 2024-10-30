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
 * Format the price according to the property configuration. The Jomres booking form script uses the default javascript currency output based on the browsere's settings so this is unlikely to be needed, however if it is needed, here it is.
 *
 */

	Flight::route('GET /booking/format_price/@price', function($price)
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
		$currency_code = $nbe->PropertyConfiguration->mrConfig['currencyCode'];

		$price = (string)output_price( (float)$price, $currency_code);

		Flight::json( "output_price" , [ 'price' => $price ] );

	});
