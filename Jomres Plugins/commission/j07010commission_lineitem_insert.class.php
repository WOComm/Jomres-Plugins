<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2015 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( 'Direct Access to this file is not allowed.' );
// ################################################################

class j07010commission_lineitem_insert 
	{
	function __construct($componentArgs)
		{
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch )
			{
			$this->template_touchable = false;

			return;
			}
		
		if ( !is_array($componentArgs) || empty($componentArgs) )
			return;

		$property_uid = (int)$componentArgs['property_uid'];
		$contract_uid = (int)$componentArgs['contract_uid'];
		$contract_total = $componentArgs['contract_total'];
		$cartnumber = (string)$componentArgs['cartnumber'];
		$approved = (int)$componentArgs['approved'];
		$channel_manager_booking = (int)$componentArgs['channel_manager_booking'];
		
		if (array_key_exists('bypass_checks', $componentArgs))
			$bypass_checks = (int)$componentArgs['bypass_checks']; //currently used for booking approvals
		else
			$bypass_checks = 0;

		//check if the booking is approved and if it`s not, do nothing; we`ll insert the commission line item when/if the booking will be approved
		if ($approved == 0)
			return;
		
		//check if the booking is a channel manager booking and if it is, do nothing
		if ($channel_manager_booking == 1)
			return;
		
		$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
		$jrConfig=$siteConfig->get();
		$thisJRUser=jomres_singleton_abstract::getInstance('jr_user');
		
		//some checks
		if ($jrConfig['use_commission'] == "0")
			return;
		
		if ($thisJRUser->superPropertyManager)
			return;
		
		//TODO check properly!!!!!
		if( $bypass_checks == 0 ) //if this was triggered by the booking enquiry approval feature we don`t need to check below
			{
			if ($thisJRUser->userIsManager && $jrConfig['manager_bookings_trigger_commission'] == "0")
				{
				return;
				}
			}

		//let`s begin
		$commission = 0.00;
		
		//get the (first) manager id that receives the commission invoices for this property
		$jomres_users = jomres_singleton_abstract::getInstance('jomres_users');
		
		$manager_ids = $jomres_users->getManagerIdsForProperty( $property_uid, $notIncludingSuperManagers = true );
		$manager = reset($manager_ids);
		$manager_id = (int)$manager['manager_id'];
		
		jr_import('jrportal_commissions');
		$jrportal_commissions = new jrportal_commissions();
		$crate = $jrportal_commissions->getCrateForPropertyuid($property_uid);
		
		if (empty($crate))
			{
			error_logging( "Error, no commission rate for this property. Cannot continue with commission line item insert.");
			return false;
			}
		
		//if the commission rate amount is 0, there`s no point to go any further.
		if ( $crate['value'] == 0)
			{
			return false;
			}

		// Type 1  = flat Type 2 = percentage
		if ($crate['type'] == 1)
			$commission = $crate['value'];
		else
			$commission = ($contract_total/100)*$crate['value'];
		
		//get the current unissued invoice for this manager
		$invoice_id = $jrportal_commissions->getCurrentCrateInvoiceIdForManagerId($manager_id);
		
		if ($invoice_id < 1 )
			$invoice_id = $jrportal_commissions->createNewCrateInvoiceForManagerId($manager_id, $crate['currencycode']);
		
		if ($invoice_id > 0)
			{
			jr_import('jrportal_invoice');
			$invoice = new jrportal_invoice();
			$invoice->id = $invoice_id;
			$invoice->getInvoice();
			
			$line_item_data = array ( 'tax_code_id' => (int) $crate['tax_rate'], 
									'name' => '_JOMRES_COMMISSION', 
									'description' => '(Booking No: '.$cartnumber.')', 
									'init_price' => $commission, 
									'init_qty' => 1, 
									'init_discount' => 0
									);
			
			$invoice->add_line_item( $line_item_data );
			
			$balance = $invoice->get_line_items_balance();
			$invoice->init_total = number_format( $balance, 2, '.', '' );
			
			return $invoice->commitUpdateInvoice();
			}
		else
			return false;
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
