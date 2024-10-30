<?php
/**
 * Jomres CMS Agnostic Plugin
 * @author  John m_majma@yahoo.com
 * @version Jomres 9
 * @package Jomres
 * @copyright	2005-2021 Vince Wooll
 * Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
 **/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################


/*
	** Title | Get property blocks
	** Description | Get dates when the property is not available
*/


Flight::route('GET /cmf/property/invoice/@property_uid/@invoice_uid', function( $property_uid, $invoice_id )
{
	require_once("../framework.php");

	validate_scope::validate('channel_management');

	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error

	$property_uid			= (int)$property_uid;

	cmf_utilities::validate_property_uid_for_user($property_uid);

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
			$r									= array ();
			$r[ 'id' ]							= $li[ 'id' ];
			$r[ 'li_name' ]						= jr_gettext($li[ 'name' ], $li[ 'name' ], false);
			$r[ 'li_description' ]				= $li[ 'description' ];
			$r[ 'li_init_qty' ]					= $li[ 'init_qty' ];
			$r[ 'currencycode' ]				= $invoice->currencycode;

			$r[ 'li_init_discount' ]			= (string) sprintf( "%01.2f", $li[ 'init_discount' ] );
			$r[ 'li_init_total' ]				= (string) sprintf( "%01.2f",$li[ 'init_total' ]);
			$r[ 'li_init_price' ]				= (string) sprintf( "%01.2f",$li[ 'init_price' ]);
			$r[ 'li_tax_code' ]					= $li[ 'tax_code' ];
			$r[ 'li_tax_description' ]			= $li[ 'tax_description' ];
			$r[ 'li_tax_amount' ]				= (string) sprintf( "%01.2f", $li[ 'tax_amount' ]);
			$r[ 'li_inv_id' ]					= (int)$li[ 'inv_id' ];


			$r[ 'li_init_price_formatted' ]		= output_price( $li[ 'init_price' ], $invoice->currencycode, false, true );
			$r[ 'li_init_discount_formatted' ]	= output_price( $li[ 'init_discount' ], $invoice->currencycode, false, true );
			$r[ 'li_init_total_formatted' ]		= output_price( $li[ 'init_total' ], $invoice->currencycode, false, true );
			$r[ 'li_tax_amount_formatted' ]		= output_price( $li[ 'tax_amount' ], $invoice->currencycode, false, true );


			if ($invoice->vat_will_be_charged)
			{
				$r[ 'li_init_total_inclusive_formatted' ]	= output_price( $li[ 'init_total_inclusive' ], $invoice->currencycode, false, true );
				$r[ 'li_init_total_inclusive' ]				= (string) sprintf( "%01.2f", $li[ 'init_total_inclusive' ]);
				$r[ 'li_tax_rate' ]							= $li[ 'tax_rate' ];
			}
			else
			{
				$r[ 'li_init_total_inclusive_formatted' ]	= output_price( $li[ 'init_total' ], $invoice->currencycode, false, true );
				$r[ 'li_init_total_inclusive' ]				= (string) sprintf( "%01.2f", $li[ 'init_total' ]);
				$r[ 'li_tax_rate' ]							= 0;
			}


			$transaction_rows[] = $r;
		}
	}

	$listinvoices_details[] = array (
		"id"                    => $invoice->id,
		"raised"                => $invoice->raised_date,
		"due"                   => $invoice->due_date,

		"currencycode"          => $invoice->currencycode,
		"status"                => $invoice->status,
		"status_txt"            => $status_txt,
		"status_states"         => $status_states,
		"inittotal_formatted"	=> output_price( $invoice->init_total, $invoice->currencycode, true, true ),

		"grand_total_inc_tax_formatted"   => output_price( $invoice->grand_total_inc_tax, $invoice->currencycode, false, true ),
		"grand_total_ex_tax_formatted"    => output_price( $invoice->grand_total_ex_tax, $invoice->currencycode, false, true ),
		"grand_total_tax_formatted"       => output_price( $invoice->grand_total_tax, $invoice->currencycode, false, true ),
		"outstanding_total_formatted"     => output_price( $invoice->balance, $invoice->currencycode, false, true ),

		"inittotal"             =>  (string) sprintf( "%01.2f", $invoice->init_total),
		"grand_total_inc_tax"   =>  (string) sprintf( "%01.2f", $invoice->grand_total_inc_tax),
		"grand_total_ex_tax"    =>  (string) sprintf( "%01.2f", $invoice->grand_total_ex_tax),
		"grand_total_tax"       =>  (string) sprintf( "%01.2f", $invoice->grand_total_tax),
		"outstanding_total"     =>  (string) sprintf( "%01.2f",$invoice->balance),

		"line_items"            => $transaction_rows
	);

	Flight::json( $response_name = "response" , $listinvoices_details ) ;
});

