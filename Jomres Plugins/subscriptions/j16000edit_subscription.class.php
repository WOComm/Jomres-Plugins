<?php
	/**
	 * Core plugin.
	 *
	 * @author Vince Wooll <sales@jomres.net>
	 *
	 *  @version Jomres 10.7.0
	 *
	 * @copyright	2005-2023 Vince Wooll
	 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
	 **/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( 'Direct Access to this file is not allowed.' );
// ################################################################

class j16000edit_subscription {
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}

		$id = (int)jomresGetParam( $_REQUEST, 'id', 0 );
		
		$ePointFilepath = get_showtime('ePointFilepath');
		
		$siteConfig = jomres_singleton_abstract::getInstance( 'jomres_config_site_singleton' );
		$jrConfig   = $siteConfig->get();
		
		if ( (int)$jrConfig[ 'useSubscriptions' ] != 1 )
			return;
		
		$jrportal_taxrate = jomres_singleton_abstract::getInstance( 'jrportal_taxrate' );
		
		jr_import('jrportal_subscriptions');
		$jrportal_subscriptions = new jrportal_subscriptions();
		
		$basic_subscription_package_details = jomres_singleton_abstract::getInstance( 'basic_subscription_package_details' );
		
		jr_import('jrportal_invoice');
		$jrportal_invoice = new jrportal_invoice();

		if ($id > 0)
			{
			$jrportal_subscriptions->subscription['id'] = $id;
			$jrportal_subscriptions->getSubscription();
			}
		
		if ($jrportal_subscriptions->subscription['invoice_id'] > 0)
			{
			$jrportal_invoice->id = $jrportal_subscriptions->subscription['invoice_id'];
			$jrportal_invoice->getInvoice();
			}

		$output['PAGETITLE']		=jr_gettext('_SUBSCRIPTIONS_EDIT_TITLE','_SUBSCRIPTIONS_EDIT_TITLE',FALSE);
		
		$output['HUSER']	             	= jr_gettext( "_JRPORTAL_INVOICES_USER", '_JRPORTAL_INVOICES_USER', false );
		$output['HPACKAGE_ID']				= jr_gettext('_SUBSCRIPTIONS_HSUBSCRIPTION_LEVEL','_SUBSCRIPTIONS_HSUBSCRIPTION_LEVEL',FALSE);
		$output['HRAISED_DATE']				= jr_gettext('_JOMRES_COM_MR_LISTTARIFF_VALIDFROM','_JOMRES_COM_MR_LISTTARIFF_VALIDFROM',FALSE);
		$output['HEXPIRATION_DATE']			= jr_gettext('_JOMRES_COM_MR_LISTTARIFF_VALIDTO','_JOMRES_COM_MR_LISTTARIFF_VALIDTO',FALSE);
		$output['HSUBSCRIPTION_STATUS']		= jr_gettext( '_JOMRES_COM_MR_VIEWBOOKINGS_STATUS', '_JOMRES_COM_MR_VIEWBOOKINGS_STATUS', false );
		$output['HINVOICE_STATUS']			= jr_gettext( '_SUBSCRIPTIONS_HPAYMENT_STATUS', '_SUBSCRIPTIONS_HPAYMENT_STATUS', false );
		$output['HUSER_DESC']				= jr_gettext( '_SUBSCRIPTIONS_USERID_DESC', '_SUBSCRIPTIONS_USERID_DESC', false );

		$output['ID'] = $jrportal_subscriptions->subscription['id'];

		$output['USER_ID'] = $jrportal_subscriptions->subscription['cms_user_id'];
		
		$cms_user_details = jomres_cmsspecific_getCMSUsers($jrportal_subscriptions->subscription['cms_user_id']);
		
		$output['USERNAME'] = '';
		if (isset($cms_user_details[ $jrportal_subscriptions->subscription['cms_user_id'] ][ "username" ])) {
			$output['USERNAME'] = $cms_user_details[ $jrportal_subscriptions->subscription['cms_user_id'] ][ "username" ];
		}

		//now create the packages options dropdown
		$options = array();
		foreach ($basic_subscription_package_details->allPackages as $package)
			{
			$options[] = jomresHTML::makeOption( $package['id'], $package['name'] );
			}
		$output['PACKAGE_ID']=jomresHTML::selectList( $options, 'package_id',' ', 'value', 'text', $jrportal_subscriptions->subscription['package_id']);
		
		if ($jrportal_subscriptions->subscription['raised_date'] > '1970-01-01 00:00:01')
			{
			$raised_date = date('Y/m/d', strtotime($jrportal_subscriptions->subscription['raised_date']));
			}
		else
			$raised_date = date('Y/m/d');
		
		if ($jrportal_subscriptions->subscription['expiration_date'] > '1970-01-01 00:00:01')
			{
			$expiration_date = date('Y/m/d', strtotime($jrportal_subscriptions->subscription['expiration_date']));
			}
		else
			$expiration_date = date('Y/m/d');
		
		$output['RAISED_DATE']		= generateDateInput( 'raised_date', $raised_date, $myID = false, $siteConfig = false, $historic = true );
		$output['EXPIRATION_DATE']	= generateDateInput( 'expiration_date', $expiration_date, $myID = false, $siteConfig = false, $historic = true );
		
		$options = array();
		$options[] = jomresHTML::makeOption( '0', jr_gettext( '_SUBSCRIPTIONS_EXPIRED', '_SUBSCRIPTIONS_EXPIRED', false ) );
		$options[] = jomresHTML::makeOption( '1', jr_gettext( '_SUBSCRIPTIONS_ACTIVE', '_SUBSCRIPTIONS_ACTIVE', false ) );
		$output['SUBSCRIPTION_STATUS']=jomresHTML::selectList( $options, 'subscription_status',' ', 'value', 'text', (int)$jrportal_subscriptions->subscription['status']);
		
		$options = array ();
		$options[] = jomresHTML::makeOption( '0', jr_gettext( '_JRPORTAL_INVOICES_STATUS_UNPAID', '_JRPORTAL_INVOICES_STATUS_UNPAID', false ) );
		$options[] = jomresHTML::makeOption( '1', jr_gettext( '_JRPORTAL_INVOICES_STATUS_PAID', '_JRPORTAL_INVOICES_STATUS_PAID', false ) );
		$options[] = jomresHTML::makeOption( '2', jr_gettext( '_JRPORTAL_INVOICES_STATUS_CANCELLED', '_JRPORTAL_INVOICES_STATUS_CANCELLED', false ) );
		$options[] = jomresHTML::makeOption( '3', jr_gettext( '_JRPORTAL_INVOICES_STATUS_PENDING', '_JRPORTAL_INVOICES_STATUS_PENDING', false ) );
		$output['INVOICE_STATUS'] = jomresHTML::selectList( $options, 'invoice_status',' ', 'value', 'text', (int)$jrportal_invoice->status);

		$output['INVOICE_ID'] = $jrportal_subscriptions->subscription['invoice_id'];
			
		$jrtbar =jomres_getSingleton('jomres_toolbar');
		$jrtb  = $jrtbar->startTable();
		
		$jrtb .= $jrtbar->toolbarItem('cancel',JOMRES_SITEPAGE_URL_ADMIN."&task=list_subscriptions",'');
		$jrtb .= $jrtbar->toolbarItem('save','','',true,'save_subscription');
		if ($id > 0)
			$jrtb .= $jrtbar->toolbarItem('delete',JOMRES_SITEPAGE_URL_ADMIN."&task=delete_subscription&no_html=1&id=".$jrportal_subscriptions->subscription['id'] , '');
		$jrtb .= $jrtbar->endTable();
		$output['JOMRESTOOLBAR']=$jrtb;

		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( 'edit_subscription.html' );
		$tmpl->addRows( 'pageoutput', $pageoutput );
		$tmpl->displayParsedTemplate();
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
