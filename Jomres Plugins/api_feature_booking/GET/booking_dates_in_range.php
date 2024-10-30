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
	 * Send 2 dates in YYYY-MM-DD format, return the dates in the period. Assumes that the last date is the departure date so that is not returned.
	 *
	 */

	Flight::route('GET /booking/dates_in_range/@date1/@date2', function($date1 , $date2)
	{
		require_once("../framework.php");

		jr_import('NBE_BookingEngineException');
		jr_import('jomres_markdown');
		jr_import('new_booking_engine');
		jr_import('apiBookingUtilities');
		jr_import('apiBookingUtilitiesValidation');
		jr_import('NBE_Utilities');

		$interval = new DateInterval('P1D');

		$dates = NBE_Utilities::getPeriods($date1, $date2, $interval , $max_one_year = true );

		Flight::json( "date_periods" , [ 'periods' => $dates ] );

	});


