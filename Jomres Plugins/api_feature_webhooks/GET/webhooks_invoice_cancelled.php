<?php
/**
 * Core file
 *
 * @author Vince Wooll <sales@jomres.net>
 * @version Jomres 9
 * @package Jomres
 * @copyright	2005-2017 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly.
 **/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

/*
	** Title | Webhooks Invoice Cancel
	** Description | Responds with details of cancelled invoice. In Jomres old invoices aren't deleted, they're cancelled so instead of returning 404 here we can respond with the details of the cancelled invoice.
	** Plugin | api_feature_webhooks
	** Scope | webhooks_get
	** URL | webhooks
 	** Method | GET
	** URL Parameters | webhooks/:ID/invoice_cancelled/:INVOICE_UID
	** Data Parameters | None
	** Success Response | {"data":{"invoice_details":{"invoice":{"invoice":{"25":{"id":"25","cms_user_id":"0","status":"1","raised_date":"2016-12-19 11:41:39","due_date":"2016-12-19 11:41:39","paid":"2016-12-20 12:19:18","subscription":"0","init_total":"0","currencycode":"EUR","subscription_id":"0","contract_id":"34","property_uid":"1","is_commission":"0","vat_will_be_charged":"1","lineitems":{"30":{"id":"30","name":"_JOMRES_AJAXFORM_BILLING_ROOM_TOTAL","description":"(Friday, 23 December 2016 - Sunday, 25 December 2016)","init_price":"29.1667","init_qty":"1","init_discount":"0","init_total":"29.17","init_total_inclusive":"35","tax_code":"01","tax_description":"VAT","tax_rate":"20","inv_id":"25","is_payment":"0","tax_amount":5.83},"33":{"id":"33","name":"_JOMRES_AJAXFORM_BILLING_BALANCE_PAYMENT","description":"(Tuesday, 20 December 2016)","init_price":"-35","init_qty":"1","init_discount":"0","init_total":"-35","init_total_inclusive":"-35","tax_code":"","tax_description":"","tax_rate":"0","inv_id":"25","is_payment":"1","tax_amount":0}}}},"status_note":"0 - unpaid , 1 - paid , 2 - cancelled , 3 - pending ","id":"25","cms_user_id":"0","status":"1","raised_date":"2016-12-19 11:41:39","due_date":"2016-12-19 11:41:39","paid":"2016-12-20 12:19:18","subscription":"0","init_total":"0","currencycode":"EUR","subscription_id":"0","contract_id":"34","property_uid":"1","is_commission":"0","vat_will_be_charged":"1","lineitems":{"30":{"id":"30","name":"_JOMRES_AJAXFORM_BILLING_ROOM_TOTAL","description":"(Friday, 23 December 2016 - Sunday, 25 December 2016)","init_price":"29.1667","init_qty":"1","init_discount":"0","init_total":"29.17","init_total_inclusive":"35","tax_code":"01","tax_description":"VAT","tax_rate":"20","inv_id":"25","is_payment":"0","tax_amount":5.83},"33":{"id":"33","name":"_JOMRES_AJAXFORM_BILLING_BALANCE_PAYMENT","description":"(Tuesday, 20 December 2016)","init_price":"-35","init_qty":"1","init_discount":"0","init_total":"-35","init_total_inclusive":"-35","tax_code":"","tax_description":"","tax_rate":"0","inv_id":"25","is_payment":"1","tax_amount":0}},"grand_total_ex_tax":29.17,"grand_total_inc_tax":35,"grand_total_tax":5.83,"amount_already_paid":-35,"balance":0}}},"meta":{"code":200}}
	** Error Response | 404 invalid_invoice_uid / 403 invalid_invoice_uid
	** Sample call |jomres/api/webhooks/1/invoice_cancelled/37
	** Notes | Replies with the details of the invoice
*/

Flight::route('GET /webhooks/@id/invoice_cancelled/@invoice_uid', function($property_uid , $invoice_uid)
	{
    $invoice_uid = (int)$invoice_uid;
    $property_uid = (int)$property_uid;
    
	validate_scope::validate('webhooks_get');
	validate_property_access::validate($property_uid);

	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
	require_once("../framework.php");
	
	
    try {   // The invoice gather datamethod will throw an exception if the invoice isn't found, so we need to catch that here.
        $invoice = jomres_singleton_abstract::getInstance('basic_invoice_details');
        $invoice->gatherData($invoice_uid);
        
        if ($invoice->property_uid != $property_uid) { // The invoice number is valid, but not for this property. Naughty naughty.
            Flight::halt( "403" ,"invalid_invoice_uid");
        }
        
        if ($invoice->raised_date <= '1970-01-01 00:00:01') {
            Flight::halt( "404" ,"invalid_invoice_uid");
        } else {
            $response                               = new stdClass();
            unset($invoice->invoice);               // Essentially a duplicate of the invoice object's details, however given that in theory more than one invoice's details could be held here, it's safest to unset it entirely before passing any information back.
            $response->invoice                      = $invoice;
        
            Flight::json( $response_name = "invoice_details" ,$response);
            }
    } catch (Exception $e) {
        Flight::halt( "404" ,"invalid_invoice_uid");
        }
	});
