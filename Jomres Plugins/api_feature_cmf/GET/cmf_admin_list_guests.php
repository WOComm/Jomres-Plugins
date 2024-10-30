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

Return all countries 

*/

Flight::route('GET /cmf/admin/list/guests', function( )
	{
    require_once("../framework.php");


	cmf_utilities::validate_admin_for_user();
	

	jr_import('jomres_encryption');
	$jomres_encryption = new jomres_encryption();
		
	jr_import("jomres_properties");
	$properties = new jomres_properties();
	$properties->get_all_properties();
	$property_uids = $properties->all_property_uids;
		
	$basic_property_details = jomres_singleton_abstract::getInstance('basic_property_details');
	$basic_property_details->get_property_name_multi($property_uids['all_propertys']);
		
	$query = "SELECT
		guests_uid,
		enc_firstname,
		enc_surname,
		enc_house,
		enc_street,
		enc_town,
		enc_county,
		enc_country,
		enc_postcode,
		enc_tel_landline,
		enc_tel_mobile,
		enc_email,
		enc_vat_number,
		property_uid
		FROM
		#__jomres_guests";
		
	$result = doSelectSql($query);
		
	$rows = array();
	foreach ( $result as $g ) {
		$r = array ();

		$r['firstname'] = $jomres_encryption->decrypt($g->enc_firstname);
		$r['surname'] = $jomres_encryption->decrypt($g->enc_surname);
		$r['house'] = $jomres_encryption->decrypt($g->enc_house);
		$r['street'] = $jomres_encryption->decrypt($g->enc_street);
		$r['town'] = $jomres_encryption->decrypt($g->enc_town);
		$r['county'] = jomres_decode(find_region_name($jomres_encryption->decrypt($g->enc_county)));
		$r['postcode'] = $jomres_encryption->decrypt($g->enc_postcode);
		$r['country'] = $jomres_encryption->decrypt($g->enc_country);
		$r['tel_landline'] = $jomres_encryption->decrypt($g->enc_tel_landline);
		$r['tel_mobile'] = $jomres_encryption->decrypt($g->enc_tel_mobile);
		$r['email'] = $jomres_encryption->decrypt($g->enc_email);
		$r['VAT_NUMBER'] = $jomres_encryption->decrypt($g->enc_vat_number);

		if (isset($basic_property_details->property_names[$g->property_uid])) {
			$r['property_name'] = $basic_property_details->property_names[$g->property_uid];
		} else {
			$r['property_name'] = jr_gettext('_JOMRES_GDPR_RTBF_UNKNOWN_PROPERTY', '_JOMRES_GDPR_RTBF_UNKNOWN_PROPERTY', false);
		}
		$rows[] = $r;
	}
		
	Flight::json( $response_name = "response" , $rows ); 
	});
	