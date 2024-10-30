<?php
/**
* Jomres CMS Agnostic Plugin
* @author  John m_majma@yahoo.com
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2020 Vince Wooll
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################


/*
	** Title | Announce
	** Description | Remote channels announce themselves to the system.
*/


Flight::route('POST /cmf/echo/', function()
	{
	validate_scope::validate('channel_management');
	
	$echo = json_decode(stripslashes($_POST['data']));
	
	Flight::json( $response_name = "response" , $echo );
	});
	