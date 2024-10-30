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

Flight::route('GET /cmf/property/list/invoices/@id', function( $property_uid )
	{
    require_once("../framework.php");

	validate_scope::validate('channel_management');
	
	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error
	
	cmf_utilities::validate_property_uid_for_user($property_uid);
	
	cmf_utilities::cache_read($property_uid);

		jr_import('jomres_encryption');
		$jomres_encryption = new jomres_encryption();

		$conn = Flight::db();
		$conn->query("SET NAMES 'UTF8'");

		$query = "SELECT SQL_CALC_FOUND_ROWS
					a.`id`, 
					a.`cms_user_id`, 
					a.`guest_id`, 
					a.`status`, 
					a.`raised_date`, 
					a.`due_date`, 
					a.`paid`, 
					a.`init_total`, 
					a.`currencycode`,
					a.`contract_id`, 
					a.`subscription`,
					a.`property_uid`,
					a.`is_commission`, 
					GROUP_CONCAT(DISTINCT b.`name` SEPARATOR '<br>') AS line_items, 
					SUM( CASE WHEN b.`init_total_inclusive` < 0 THEN 0 ELSE b.`init_total_inclusive` END ) AS grand_total, 
					d.`guest_uid`, 
					d.`tag`,
					d.`currency_code`,
					d.`approved`,
					CASE WHEN (a.`subscription` = 1 OR a.`is_commission` = 1) THEN e.`enc_firstname` ELSE c.`enc_firstname` END AS firstname, 
					CASE WHEN (a.`subscription` = 1 OR a.`is_commission` = 1) THEN e.`enc_surname` ELSE c.`enc_surname` END AS surname  
				FROM ".Flight::get("dbprefix")."jomresportal_invoices a 
					JOIN ".Flight::get("dbprefix")."jomresportal_lineitems b ON a.`id` = b.`inv_id` 
					LEFT JOIN ".Flight::get("dbprefix")."jomres_contracts d ON a.`id` = d.`invoice_uid` 
					LEFT JOIN ".Flight::get("dbprefix")."jomres_guests c ON (( a.`guest_id` != 0 AND a.`guest_id` = c.`guests_uid` ) 
													OR ( d.`guest_uid` != 0 AND d.`guest_uid` = c.`guests_uid` ))  
					LEFT JOIN ".Flight::get("dbprefix")."jomres_guest_profile e ON a.`cms_user_id` = e.`cms_user_id` 
					WHERE a.`property_uid` =:property_uid GROUP BY a.id ORDER BY a.`raised_date` desc";

		$stmt = $conn->prepare( $query );
		$stmt->execute([ 'property_uid' => $property_uid ]);
		$property_uids = array();

		$listinvoices = array();
		while ($row = $stmt->fetch())
		{

			if ( $row['is_commission'] ==0  && $row['subscription'] == 0 ) {
				switch ( $row['status'] )
				{
					case 0:
						//$label_class='label-red';
						$label_class='red';
						$label_txt= jr_gettext( '_JRPORTAL_INVOICES_STATUS_UNPAID', '_JRPORTAL_INVOICES_STATUS_UNPAID', false );
						break;
					case 1:
						//$label_class='label-green';
						$label_class='green';
						$label_txt= jr_gettext( '_JRPORTAL_INVOICES_STATUS_PAID', '_JRPORTAL_INVOICES_STATUS_PAID', false );
						break;
					case 2:
						//$label_class='label-black';
						$label_class='black';
						$label_txt = jr_gettext( '_JRPORTAL_INVOICES_STATUS_CANCELLED', '_JRPORTAL_INVOICES_STATUS_CANCELLED',false );
						break;
					case 3:
						//$label_class='label-orange';
						$label_class='orange';
						$label_txt= jr_gettext( '_JRPORTAL_INVOICES_STATUS_PENDING', '_JRPORTAL_INVOICES_STATUS_PENDING',false );
						break;
					default:
						//$label_class='label-grey';
						$label_class='grey';
						break;
				}

				$line_items = explode ( "<br>" , $row['line_items'] );
				$line_items_arr = array();
				$line_items_str = '';
				if (!empty($line_items)){
					foreach ($line_items as $item) {
						$line_items_arr[] = jr_gettext($item, $item, false);
					}
					$line_items_str = implode ( "<br>" , $line_items_arr );
				}
					unset($row['is_commission']);
					unset($row['subscription']);
				$listinvoices[] = array (
					"id"               	=> $row['id'],
					"cms_user_id"  		=> $row['cms_user_id'],
					"guest_id" 			=> $row['guest_id'],
					"status"			=> $row['status'],
					"raised_date"		=> $row['raised_date'],
					"due_date"			=> $row['due_date'],
					"paid"				=> $row['paid'],
					"init_total"		=> $row['init_total'],
					"currencycode"		=> $row['currencycode'],
					"contract_id"		=> $row['contract_id'],
					"property_uid"		=> $row['property_uid'],
					"line_items"		=> $line_items_str,
					"grand_total"	 	=> $row['grand_total'],
					"guest_uid"			=> $row['guest_uid'],
					"booking_number"	=> $row['tag'],
					"currency_code"		=> $row['currency_code'],
					"approved"			=> $row['approved'],
					"firstname"			=> $jomres_encryption->decrypt($row['firstname']),
					"surname"			=> $jomres_encryption->decrypt($row['surname']),
					"imgColor"			=> $label_class,
					"Txtstatus"			=> $label_txt
				);
			}
		}

		$conn = null;


		Flight::json( $response_name = "response" , $listinvoices );
	});
	
	