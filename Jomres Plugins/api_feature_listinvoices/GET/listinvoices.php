<?php
/**
* Jomres CMS Agnostic Plugin
* @author  John m_majma@yahoo.com
* @version Jomres 9 
* @package Jomres
* @copyright 2017
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

/*
	** Title | Get  invoices for a specific property
	** Description | Get invoices by property uid
	** Plugin | api_feature_listinvoices
	** Scope | properties_get
	** URL | listinvoices
 	** Method | GET
	** URL Parameters | listinvoices/@ID
	** Data Parameters | None
	** Success Response |{
  "data": {
    "listinvoices": [
      {
        "id": 48,
        "cms_user_id": 0,
        "guest_id": 0,
        "status": 3,
        "raised_date": "2017-02-21 16:54:34",
        "due_date": "2017-02-21 16:54:34",
        "paid": "1970-01-01 00:00:01",
        "init_total": 50,
        "currencycode": "EUR",
        "contract_id": 93,
        "subscription": 0,
        "property_uid": 1,
        "is_commission": 0,
        "line_items": "_JOMRES_AJAXFORM_BILLING_ROOM_TOTAL",
        "grand_total": 50,
        "guest_uid": 11,
        "tag": "54180147",
        "currency_code": "EUR",
        "approved": 1,
        "firstname": "Anon Guest",
        "surname": "Anon Guest",
        "imgColor": "orange",
        "Txtstatus": "Pending"
      },
      {
        "id": 47,
        "cms_user_id": 0,
        "guest_id": 0,
        "status": 3,
        "raised_date": "2017-02-21 13:29:27",
        "due_date": "2017-02-21 13:29:27",
        "paid": "1970-01-01 00:00:01",
        "init_total": 121.33,
        "currencycode": "EUR",
        "contract_id": 92,
        "subscription": 0,
        "property_uid": 1,
        "is_commission": 0,
        "line_items": "_JOMRES_CUSTOMTEXT_EXTRANAME21<br>_JOMRES_AJAXFORM_BILLING_ROOM_TOTAL<br>_JOMRES_CUSTOMTEXT_EXTRANAME1",
        "grand_total": 126,
        "guest_uid": 16,
        "tag": "52257877",
        "currency_code": "EUR",
        "approved": 1,
        "firstname": "Peter",
        "surname": "Griffin",
        "imgColor": "orange",
        "Txtstatus": "Pending"
      }
    ]
  },
  "meta": {
    "code": 200
  }
}

	** Error Response | 403 "User attempted to access a property that they don't have rights to access"
	** Sample call |jomres/api/listinvoices/85
	** Notes |
	
*/

Flight::route('GET /listinvoices/@id(/@language)', function( $property_uid, $language) 
	{
	validate_scope::validate('properties_get');
	validate_property_access::validate($property_uid);

	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
    require_once("../framework.php");

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
			"subscription"		=> $row['subscription'],
			"property_uid"		=> $row['property_uid'],
			"is_commission"		=> $row['is_commission'], 
			"line_items"		=> $line_items_str, 
			"grand_total"	 	=> $row['grand_total'],
			"guest_uid"			=> $row['guest_uid'], 
			"tag"				=> $row['tag'],
			"currency_code"		=> $row['currency_code'],
			"approved"			=> $row['approved'],
			"firstname"			=> $jomres_encryption->decrypt($row['firstname']),
			"surname"			=> $jomres_encryption->decrypt($row['surname']),
			"imgColor"			=> $label_class,
			"Txtstatus"			=> $label_txt
			);
		}
	$conn = null;
		
	Flight::json( $response_name = "listinvoices" ,$listinvoices);
	});
	
/*
	** Title | Get Details about a specific invoice
	** Description | Get Details of list invoices
	** Plugin | api_feature_listinvoices
	** Scope | properties_get
	** URL | listinvoices
 	** Method | GET
	** URL Parameters | listinvoices/:ID/:INVOICEID/details
	** Data Parameters | None
	** Success Response |{
  "data": {
    "listinvoicesdetails": [
      {
        "ID": "48",
        "RAISED": "2017-02-21 16:54:34",
        "DUE": "2017-02-21 16:54:34",
        "INITTOTAL": "50.00€",
        "CURRENCYCODE": "EUR",
        "STATUS": "3",
        "STATUS_TXT": "Pending",
        "STATUS_STATES": [
          "0 unpaid",
          "1 paid",
          "2 cancelled",
          "3 pending"
        ],
        "GRAND_TOTAL_INC_TAX": "50.00€",
        "GRAND_TOTAL_EX_TAX": "41.67€",
        "GRAND_TOTAL_TAX": "8.33€",
        "OUTSTANDING_TOTAL": "50.00€",
        "LINE_ITEMS": [
          {
            "ID": "66",
            "LI_NAME": "Accommodation",
            "LI_DESCRIPTION": "(Saturday, 25 February 2017 - Wednesday, 01 March 2017)",
            "LI_INIT_PRICE": "41.67€",
            "LI_INIT_QTY": "1",
            "LI_INIT_DISCOUNT": "0.00€",
            "LI_INIT_TOTAL": "41.67€",
            "LI_INIT_TOTAL_INCLUSIVE": "50.00€",
            "LI_TAX_RATE": "20",
            "LI_TAX_CODE": "01",
            "LI_TAX_DESCRIPTION": "VAT",
            "LI_TAX_AMOUNT": "8.33€",
            "LI_INV_ID": "48",
            "CURRENCYCODE": "EUR"
          }
        ]
      }
    ]
  },
  "meta": {
    "code": 200
  }
}
	** Error Response | 403 "User attempted to access a property that they don't have rights to access"
	** Sample call |jomres/api/listinvoices/85/231/details
	** Notes | Invoice status: 0 unpaid 1 paid 2 cancelled 3 pending
*/


Flight::route('GET /listinvoices/@id/@invoiceid/details(/@language)', function( $property_uid, $invoice_id, $language ) 
	{
	validate_scope::validate('properties_get');
	validate_property_access::validate($property_uid);
	
	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
	require_once("../framework.php");

	$invoice = jomres_singleton_abstract::getInstance( 'basic_invoice_details' );
	$result = $invoice->gatherData($invoice_id);
    
    if (!$result) {
        Flight::halt(204, "Invoice uid incorrect.");
        }
    if ( $invoice->property_uid != $property_uid ) {
        Flight::halt(204, "Invoice uid incorrect.");
        }
    if ($invoice->raised_date == '0000-00-00 00:00:00') { // invoice doesn't exist
        Flight::halt(204, "Invoice uid incorrect.");
        }

    $listinvoices_details = array ();

    $status_states = array ("0 unpaid" , "1 paid" , "2 cancelled" , "3 pending");
	switch ($invoice->status) {
		case 0 :
			$status_txt = jr_gettext( '_JRPORTAL_INVOICES_STATUS_UNPAID', '_JRPORTAL_INVOICES_STATUS_UNPAID' );
			break;
		case 1 : 
			$status_txt = jr_gettext( '_JRPORTAL_INVOICES_STATUS_PAID', '_JRPORTAL_INVOICES_STATUS_PAID' );
			break;
		case 2 : 
			$status_txt = jr_gettext( '_JRPORTAL_INVOICES_STATUS_CANCELLED', '_JRPORTAL_INVOICES_STATUS_CANCELLED' );
			break;
		default :
			$status_txt = jr_gettext( '_JRPORTAL_INVOICES_STATUS_PENDING', '_JRPORTAL_INVOICES_STATUS_PENDING',false );
        }
        
        
    $transaction_rows = array ();
	if ( count( $invoice->lineitems ) > 0 )
		{
		foreach ( $invoice->lineitems as $li )
			{
			$r                              = array ();
			$r[ 'ID' ]                      = $li[ 'id' ];
			$r[ 'LI_NAME' ]                 = jr_gettext($li[ 'name' ], $li[ 'name' ], false);
			$r[ 'LI_DESCRIPTION' ]          = $li[ 'description' ];
			$r[ 'LI_INIT_PRICE' ]           = output_price( $li[ 'init_price' ], $invoice->currencycode, false, true );
			$r[ 'LI_INIT_QTY' ]             = $li[ 'init_qty' ];
			$r[ 'LI_INIT_DISCOUNT' ]        = output_price( $li[ 'init_discount' ], $invoice->currencycode, false, true );
			$r[ 'LI_INIT_TOTAL' ]           = output_price( $li[ 'init_total' ], $invoice->currencycode, false, true );
			
			if ($invoice->vat_will_be_charged)
				{
				$r[ 'LI_INIT_TOTAL_INCLUSIVE' ] = output_price( $li[ 'init_total_inclusive' ], $invoice->currencycode, false, true );
					$r[ 'LI_TAX_RATE' ] = $li[ 'tax_rate' ];
				}
			else
				{
				$r[ 'LI_INIT_TOTAL_INCLUSIVE' ] = output_price( $li[ 'init_total' ], $invoice->currencycode, false, true );
				$r[ 'LI_TAX_RATE' ] = 0;
				}
			$r[ 'LI_TAX_CODE' ]        = $li[ 'tax_code' ];
			$r[ 'LI_TAX_DESCRIPTION' ] = $li[ 'tax_description' ];
			$r[ 'LI_TAX_AMOUNT' ] 	   = output_price( $li[ 'tax_amount' ], $invoice->currencycode, false, true );
			$r[ 'LI_INV_ID' ]          = $li[ 'inv_id' ];
			$r[ 'CURRENCYCODE' ]	   = $invoice->currencycode;
			
			$transaction_rows[] = $r;
			}
		}

		$listinvoices_details[] = array (
			"ID"                    => $invoice->id,
			"RAISED"                => $invoice->raised_date,
			"DUE"                   => $invoice->due_date,
			"INITTOTAL"             => output_price( $invoice->init_total, $invoice->currencycode, true, true ),
			"CURRENCYCODE"          => $invoice->currencycode,
            "STATUS"                => $invoice->status,
            "STATUS_TXT"            => $status_txt,
            "STATUS_STATES"         => $status_states, 
			"GRAND_TOTAL_INC_TAX"   => output_price( $invoice->grand_total_inc_tax, $invoice->currencycode, false, true ),
			"GRAND_TOTAL_EX_TAX"    => output_price( $invoice->grand_total_ex_tax, $invoice->currencycode, false, true ),
			"GRAND_TOTAL_TAX"       => output_price( $invoice->grand_total_tax, $invoice->currencycode, false, true ),
			"OUTSTANDING_TOTAL"     => output_price( $invoice->balance, $invoice->currencycode, false, true ),
			"LINE_ITEMS"            => $transaction_rows
			);
	
	Flight::json( $response_name = "listinvoicesdetails" ,$listinvoices_details);

	});	
	
	
/*
	** Title | Get invoices within dates
	** Description | Lists invoices based on their RAISED date ( not when the booking arrival/departure is expected )
	** Plugin | api_feature_listinvoices
	** Scope | properties_get
	** URL | listinvoices
 	** Method | GET
	** URL Parameters | listinvoices/@ID/:START_DATE/:END_DATE
	** Data Parameters | None
    ** Success Response | 
	** Error Response | 403 "User attempted to access a property that they don't have rights to access"
	** Sample call |jomres/api/listinvoices/85/2016-05-20/2016-05-22
	** Notes | 
*/
	
Flight::route('GET /listinvoices/@id/@start/@end(/@language)', function( $property_uid , $startDate , $endDate, $language) 
	{
	validate_scope::validate('properties_get');
	validate_property_access::validate($property_uid);

	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
	require_once("../framework.php");
	
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
					WHERE a.`property_uid` =:property_uid AND ( DATE_FORMAT(a.`raised_date`, '%Y/%m/%d') BETWEEN DATE_FORMAT('" . $startDate . "', '%Y/%m/%d') AND DATE_FORMAT('" . $endDate . "', '%Y/%m/%d') ) GROUP BY a.id ORDER BY a.`raised_date` desc";	


	$stmt = $conn->prepare( $query );
	$stmt->execute([ 'property_uid' => $property_uid ]);
	$property_uids = array();

	$listinvoicesdate = array();
	while ($row = $stmt->fetch())
		{
			
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
		
		$listinvoicesdate[] = array ( 
			"id"                => $row['id'],
			"cms_user_id"  		=> $row['cms_user_id'],
			"guest_id" 			=> $row['guest_id'],
			"status"			=> $row['status'],
			"raised_date"		=> $row['raised_date'], 
			"due_date"			=> $row['due_date'], 
			"paid"				=> $row['paid'], 
			"init_total"		=> $row['init_total'], 
			"currencycode"		=> $row['currencycode'],
			"contract_id"		=> $row['contract_id'], 
			"subscription"		=> $row['subscription'],
			"property_uid"		=> $row['property_uid'],
			"is_commission"		=> $row['is_commission'], 
			"line_items"		=> $line_items_str, 
			"grand_total"	    => $row['grand_total'],
			"guest_uid"			=> $row['guest_uid'], 
			"tag"				=> $row['tag'],
			"currency_code"		=> $row['currency_code'],
			"approved"			=> $row['approved'],
			"firstname"			=> $jomres_encryption->decrypt($row['firstname']),
			"surname"			=> $jomres_encryption->decrypt($row['surname']),
			"imgColor"			=> $label_class,
			"Txtstatus"			=> $label_txt
			);
		}
	$conn = null;
		
	Flight::json( $response_name = "listinvoicesdate" ,$listinvoicesdate);
	});	
