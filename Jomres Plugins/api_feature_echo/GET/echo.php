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
	** Title | Echo
	** Description | Respond with Echo to confirm that remote server has connected and authenticated, without actually doing anything
	** Plugin | api_feature_echo
	** Scope | echo_get
	** URL | echo
 	** Method | GET
	** URL Parameters | None
	** Data Parameters | None
	** Success Response | {"data":{"echo":"ECHO"}}
	** Error Response | 
	** Sample call |jomres/api/echo
	** Notes | 
*/


Flight::route('GET /echo', function() 
	{
	validate_scope::validate('echo_get');

	Flight::json( $response_name = "echo" , "ECHO");
	});
