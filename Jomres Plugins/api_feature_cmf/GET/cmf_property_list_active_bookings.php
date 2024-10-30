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

Return the items for a given property type (e.g. property types) that currently exist in the system

*/

Flight::route('GET /cmf/property/list/active/bookings/@id', function( $property_uid )
	{
    require_once("../framework.php");

	validate_scope::validate('channel_management');
	
	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error
	
	cmf_utilities::validate_property_uid_for_user($property_uid);
	
	cmf_utilities::cache_read($property_uid);

	// This is a pretty standard query, we don't need much from it but I'm going to leave the unused elements in place for now (unless it becomes a bottleneck) as I can see that other items might potentially be useful
		$query = 'SELECT SQL_CALC_FOUND_ROWS 
		a.contract_uid as booking_id, 
		a.arrival, 
		a.departure, 
		a.rate_rules as guest_types,
		a.contract_total, 
		a.tag as booking_number,
		a.currency_code,
		a.booked_in, 
		a.bookedout, 
		a.deposit_required, 
		a.deposit_paid, 
		a.special_reqs, 
		a.timestamp as booking_created, 
		a.cancelled,
		a.username,
		a.invoice_uid,
		a.property_uid,
		a.approved,
		a.referrer,
		a.last_changed,
		a.noshow_flag,
		a.rejected,
		b.guests_uid,
		b.mos_userid,
		b.enc_firstname, 
		b.enc_surname, 
		b.enc_house ,
		b.enc_street ,
		b.enc_town,
		b.enc_county ,
		b.enc_country ,
		b.enc_postcode,
		b.enc_preferences ,
		b.enc_tel_landline, 
		b.enc_tel_mobile, 
		b.enc_email,
		c.invoice_number,
		c.raised_date ,
		c.init_total ,
		c.id as invoice_id
			FROM #__jomres_contracts a 
		LEFT JOIN #__jomres_guests b ON a.guest_uid = b.guests_uid 
		LEFT JOIN #__jomresportal_invoices c ON a.invoice_uid  = c.id 
			WHERE a.property_uid = '.(int) $property_uid .' 
		ORDER BY a.last_changed';


	$jomresContractsList = doSelectSql($query);

	// We'll rejig the contracts list so that it's easier to access the booking in question via the contract uid
	$bookings_by_contract_id = array();
	if (!empty($jomresContractsList)) {
		foreach ( $jomresContractsList as $contract ) {
			$bookings_by_contract_id[$contract->booking_id] = $contract;
		}
	}


	$bookings = cmf_utilities::get_property_bookings( $property_uid );

	if (!empty($bookings )) {
		foreach ($bookings as $key=>$booking ) {
			$c_id = $booking['contract_uid'];
			if (isset($bookings_by_contract_id[$c_id])) {
				$bookings[$key]['created']			= $bookings_by_contract_id[$c_id]->booking_created;
				$bookings[$key]['last_modified']	= $bookings_by_contract_id[$c_id]->last_changed;
			}
		}
	}

	cmf_utilities::cache_write( $property_uid , "response" , $bookings );
	
	Flight::json( $response_name = "response" , $bookings ); 
	});
	
	