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
	** Title | Get user's email address
	** Description | Get the user's email address 
	** Plugin | api_feature_email
	** Scope | email_get
	** URL | email
 	** Method | GET
	** URL Parameters | None
	** Data Parameters | None
	** Success Response | {"data":{"email_address":"example@example.com"}}
	** Error Response | 
	** Sample call |jomres/api/email
	** Notes | as stored in My Account, which is not necessarily the same as that stored in their CMS account details.
*/


Flight::route('GET /email', function() 
	{
	validate_scope::validate('email_get');

	require_once("../framework.php");
	
    jr_import('jomres_encryption');
    $jomres_encryption = new jomres_encryption();
	
	$conn = Flight::db();
	$conn->query("SET NAMES 'UTF8'");
	$query = 'SELECT enc_email FROM '.Flight::get("dbprefix").'jomres_guest_profile WHERE cms_user_id = :id LIMIT 1';
	$stmt = $conn->prepare( $query );
	$stmt->execute([ 'id' => Flight::get("user_id") ]);
	$email = $stmt->fetch();
	$conn = null;
	
	$email_address = trim($email['enc_email']);
	$email_address = $jomres_encryption->decrypt($email_address);
	
	Flight::json( $response_name = "email_address" , $email_address );
	});
