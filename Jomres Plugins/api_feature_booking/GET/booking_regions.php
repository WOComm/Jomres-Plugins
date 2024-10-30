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
	 * Return regions for a given country code
	 */
	Flight::route('GET /booking/regions/@country_code', function($country_code)
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



		$country_code = filter_var($country_code, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$jomres_regions = jomres_singleton_abstract::getInstance('jomres_regions');
		$regionArray = $jomres_regions->get_country_regions($country_code);

		Flight::json( "regions" , [ 'regions' => $regionArray ] );
	});
