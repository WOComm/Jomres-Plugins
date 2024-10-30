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
	 * What error messages can the system respond with?
	 *
	 */
	Flight::route('GET /booking/error_messages', function()
	{
		require_once("../framework.php");

		jr_import('apiBookingUtilities');

		$error_messages = apiBookingUtilities::throwError ('002' , '' , true );

		Flight::json( "error_messages" , [ 'messages' => $error_messages ] );
	});




