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

class j06005my_subscriptions
	{
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch )
			{
			$this->template_touchable = false;

			return;
			}
		
		$ePointFilepath = get_showtime('ePointFilepath');
		
		$siteConfig = jomres_singleton_abstract::getInstance( 'jomres_config_site_singleton' );
		$jrConfig   = $siteConfig->get();
		
		if ( (int)$jrConfig[ 'useSubscriptions' ] != 1 )
			return;
		
		$thisJRUser = jomres_singleton_abstract::getInstance( 'jr_user' );

		$invoice = jomres_singleton_abstract::getInstance( 'basic_invoice_details' );
		
		jr_import('jrportal_subscriptions');
		$jrportal_subscriptions = new jrportal_subscriptions();
		
		$basic_subscription_package_details = jomres_singleton_abstract::getInstance( 'basic_subscription_package_details' );

		if ( !$thisJRUser->superPropertyManager && $jrConfig[ 'useSubscriptions' ] == "1" )
			{
			$jrportal_subscriptions->getSubscriptionsForCmsUserId( $thisJRUser->id );
			}
		else
			return;

		$output     	= array ();
		$pageoutput 	= array ();
		$renewal_output = array ();
		$rows       	= array ();
		$renewal_button_added = false;

		$output[ 'PAGETITLE' ]      	= jr_gettext( '_SUBSCRIPTIONS_MY', '_SUBSCRIPTIONS_MY', false );
		$output[ 'HDESCRIPTION' ]   	= jr_gettext( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_DESCRIPTION', '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_DESCRIPTION', false );
		$output['HPACKAGE']				= jr_gettext('_SUBSCRIPTIONS_HSUBSCRIPTION_LEVEL','_SUBSCRIPTIONS_HSUBSCRIPTION_LEVEL',FALSE);
		$output['HFULLAMOUNT']			= jr_gettext('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FULLAMOUNT','_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FULLAMOUNT',FALSE);
		$output['HRAISED_DATE']			= jr_gettext('_JOMRES_COM_MR_LISTTARIFF_VALIDFROM','_JOMRES_COM_MR_LISTTARIFF_VALIDFROM',FALSE);
		$output['HEXPIRATION_DATE']		= jr_gettext('_JOMRES_COM_MR_LISTTARIFF_VALIDTO','_JOMRES_COM_MR_LISTTARIFF_VALIDTO',FALSE);
		$output['HSUBSCRIPTION_STATUS'] = jr_gettext( '_JOMRES_COM_MR_VIEWBOOKINGS_STATUS', '_JOMRES_COM_MR_VIEWBOOKINGS_STATUS', false );
		$output['HINVOICE_ID']			= jr_gettext( '_JRPORTAL_LISTBOOKINGS_HEADER_INVOICE_ID', '_JRPORTAL_LISTBOOKINGS_HEADER_INVOICE_ID', false );

		jr_import('jomres_markdown');
		$jomres_markdown = new jomres_markdown();

		if ( !empty($jrportal_subscriptions->userSubscriptions) ) {
			foreach ( $jrportal_subscriptions->userSubscriptions as $s )
			{
				if ($s->status == 1 && !$thisJRUser->userIsManager)
				{ // They've subscribed but not added a property yet, we'll redirect them to the new property page
					jomresRedirect(jomresURL(JOMRES_SITEPAGE_URL . "&task=new_property"));
				}

				$r                = array();
				$r['ID']          = $s->id;
				$r['PACKAGE']     = $basic_subscription_package_details->allPackages[$s->package_id]['name'];
				$r['DESCRIPTION'] =  $jomres_markdown->get_markdown($basic_subscription_package_details->allPackages[$s->package_id]['description']);

				//we need to get the paid price from the invoice, in case the package price has been changed after the subscription was made
				$invoice->gatherData($s->invoice_id);
				$r['FULLAMOUNT'] = output_price($invoice->grand_total_inc_tax, $invoice->currencycode);

				$r['RAISED_DATE']     = $s->raised_date;
				$r['EXPIRATION_DATE'] = $s->expiration_date;

				if ($s->status == 1)
					$r['SUBSCRIPTION_STATUS'] = '<span class="badge bg-success">' . jr_gettext('_SUBSCRIPTIONS_ACTIVE', '_SUBSCRIPTIONS_ACTIVE', false) . '</span>';
				else
					$r['SUBSCRIPTION_STATUS'] = '<span class="badge bg-danger">' . jr_gettext('_SUBSCRIPTIONS_EXPIRED', '_SUBSCRIPTIONS_EXPIRED', false) . '</span>';

				$r['INVOICE_ID'] = (int) $s->invoice_id;


				$toolbar = jomres_singleton_abstract::getInstance('jomresItemToolbar');
				$toolbar->newToolbar();

				if ((int) $s->invoice_id > 0)
				{
					$toolbar->addItem('fa fa-file-text', 'btn btn-primary', '', jomresURL(JOMRES_SITEPAGE_URL . '&task=view_invoice&id=' . $s->invoice_id), jr_gettext('_JOMRES_MANAGER_SHOWINVOICE', '_JOMRES_MANAGER_SHOWINVOICE', false));
				}

				if ($s->status == 1) //make sure it`s not an expired subscription
					$toolbar->addSecondaryItem('fa fa-times', '', '', jomresURL(JOMRES_SITEPAGE_URL . '&task=cancel_subscription&id=' . $s->id), jr_gettext('_SUBSCRIPTIONS_CANCEL', '_SUBSCRIPTIONS_CANCEL', false));

				$r['TOOLBAR'] = $toolbar->getToolbar();

				$rows[] = $r;
			}

			$pageoutput[ ] = $output;
			$tmpl          = new patTemplate();
			$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
			$tmpl->readTemplatesFromInput( 'frontend_list_my_subscriptions.html' );
			$tmpl->addRows( 'pageoutput', $pageoutput );
			$tmpl->addRows( 'renewal_output', $renewal_output );
			$tmpl->addRows( 'rows', $rows );
			$tmpl->displayParsedTemplate();
			}
		else //if this user hasn`t subscribed yet to any package, let`s display the subscriptions options
			{
			$MiniComponents->specificEvent( '06005', 'list_subscription_packages' );
			}
		}


	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
