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

class j07011commission_lineitem_delete 
	{
	function __construct($componentArgs)
		{
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch )
			{
			$this->template_touchable = false;

			return;
			}

		$tag = (string)$componentArgs[ 'tag' ];
		
		$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
		$jrConfig=$siteConfig->get();
		
		if ($jrConfig['use_commission'] == "0")
			return;
		
		$query = "SELECT 
						a.id, 
						a.description, 
						a.inv_id, 
						a.init_total_inclusive,
						b.cms_user_id,
						b.status,
						b.raised_date,
						b.currencycode
					FROM #__jomresportal_lineitems a, #__jomresportal_invoices b 
					WHERE a.inv_id = b.id AND a.description LIKE '%".$tag."%' ";
		$result = doSelectSql($query,2);
		
		if( !empty($result))
			{
			if ( $result['raised_date'] <= '1970-01-01 00:00:01' && ($result['status'] == 3 || $result['status'] == 0) )
				{
				//get the commission invoice
				jr_import('jrportal_invoice');
				$invoice = new jrportal_invoice();
				$invoice->id = $result['inv_id'];
				$invoice->getInvoice();
				
				//delete the cancelled booking line item
				$invoice->deleteLineItemById($result['id']);
				
				//update the invoice balance
				$balance = $invoice->get_line_items_balance();
				$invoice->init_total = number_format( $balance, 2, '.', '' );
					
				return $invoice->commitUpdateInvoice();
				}
			else //handle the case where the invoice that contains this commission line item was already issued, so add a correction/negative amount to the next commission invoice if available, and if not, create a new commission invoice first.
				{
				//get the current unissued invoice for this manager
				jr_import('jrportal_commissions');
				$jrportal_commissions = new jrportal_commissions();
			
				$invoice_id = $jrportal_commissions->getCurrentCrateInvoiceIdForManagerId($result['cms_user_id']);
				
				if ($invoice_id < 1 )
					$invoice_id = $jrportal_commissions->createNewCrateInvoiceForManagerId($result['cms_user_id'], $result['currencycode']);
				
				if ($invoice_id > 0)
					{
					jr_import('jrportal_invoice');
					$invoice = new jrportal_invoice();
					$invoice->id = $invoice_id;
					$invoice->getInvoice();
					
					$line_item_data = array ( 'tax_code_id' => 0, 
											'name' => '_JOMRES_COMMISSION_CORRECTION', 
											'description' => $result['description'], 
											'init_price' => 0-$result['init_total_inclusive'], 
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
