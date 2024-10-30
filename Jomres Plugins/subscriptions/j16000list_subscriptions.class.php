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

class j16000list_subscriptions
	{
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		
		$ePointFilepath = get_showtime('ePointFilepath');
		
		$siteConfig = jomres_singleton_abstract::getInstance( 'jomres_config_site_singleton' );
		$jrConfig   = $siteConfig->get();
		
		if ( (int)$jrConfig[ 'useSubscriptions' ] != 1 )
			return;
		
		$subscription_status = (int)jomresGetParam( $_POST, 'subscription_status', 2); //1 active; 0 expired; 2 any (unused subscription status)
		$package_id = (int)jomresGetParam( $_POST, 'package_id', 0);
		$cms_user_id = (int)jomresGetParam( $_REQUEST, 'cms_user_id', 0);
		
		$deleteIcon = JOMRES_IMAGES_RELPATH.'jomresimages/small/WasteBasket.png';
		
		$output=array();
		$pageoutput=array();
		$rows=array();
								
		$output['PAGETITLE']		=jr_gettext('_JOMRES_STATUS_SUBSCRIPTIONS','_JOMRES_STATUS_SUBSCRIPTIONS',FALSE);
		
		$output[ 'HFIRSTNAME' ]             = jr_gettext( "_JOMRES_COM_MR_VIEWBOOKINGS_SURNAME", '_JOMRES_COM_MR_VIEWBOOKINGS_SURNAME', false );
		$output[ 'HSURNAME' ]       	    = jr_gettext( "_JOMRES_FRONT_MR_DISPGUEST_SURNAME", '_JOMRES_FRONT_MR_DISPGUEST_SURNAME', false );
		$output['HPACKAGE']					= jr_gettext('_SUBSCRIPTIONS_HSUBSCRIPTION_LEVEL','_SUBSCRIPTIONS_HSUBSCRIPTION_LEVEL',FALSE);
		$output['HFULL_AMOUNT']				= jr_gettext('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FULLAMOUNT','_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FULLAMOUNT',FALSE);
		$output['HRAISED_DATE']				= jr_gettext('_JOMRES_COM_MR_LISTTARIFF_VALIDFROM','_JOMRES_COM_MR_LISTTARIFF_VALIDFROM',FALSE);
		$output['HEXPIRATION_DATE']			= jr_gettext('_JOMRES_COM_MR_LISTTARIFF_VALIDTO','_JOMRES_COM_MR_LISTTARIFF_VALIDTO',FALSE);
		$output['HSUBSCRIPTION_STATUS']		= jr_gettext( '_JOMRES_COM_MR_VIEWBOOKINGS_STATUS', '_JOMRES_COM_MR_VIEWBOOKINGS_STATUS', false );
		$output['HINVOICE_ID']				= jr_gettext( '_JRPORTAL_LISTBOOKINGS_HEADER_INVOICE_ID', '_JRPORTAL_LISTBOOKINGS_HEADER_INVOICE_ID', false );
		
		$output[ 'HLEGEND' ] 				= jr_gettext( "_JOMRES_HLEGEND", '_JOMRES_HLEGEND' );
		$output[ 'HACTIVE' ] 				= jr_gettext( '_SUBSCRIPTIONS_ACTIVE', '_SUBSCRIPTIONS_ACTIVE', false );
		$output[ 'HEXPIRED' ] 				= jr_gettext( '_SUBSCRIPTIONS_EXPIRED', '_SUBSCRIPTIONS_EXPIRED', false );

		//filters output
		$output['HFILTER']= jr_gettext( '_JOMRES_HFILTER', '_JOMRES_HFILTER', false );
		
		$options = array();
		$options[] = jomresHTML::makeOption( '2', jr_gettext( '_JOMRES_STATUS_ANY', '_JOMRES_STATUS_ANY', false ) );
		$options[] = jomresHTML::makeOption( '1', $output[ 'HACTIVE' ] );
		$options[] = jomresHTML::makeOption( '0', $output[ 'HEXPIRED' ] );
		$output['SUBSCRIPTION_STATUS']=jomresHTML::selectList( $options, 'subscription_status',' ', 'value', 'text', $subscription_status);
		
		jr_import('jrportal_subscriptions');
		$jrportal_subscriptions = new jrportal_subscriptions();
		
		$basic_subscription_package_details = jomres_singleton_abstract::getInstance( 'basic_subscription_package_details' );
		
		$options = array();
		$options[] = jomresHTML::makeOption( '0', jr_gettext( '_JOMRES_STATUS_ANY', '_JOMRES_STATUS_ANY', false ) );
		
		foreach ($basic_subscription_package_details->allPackages as $package)
			{
			$options[] = jomresHTML::makeOption( $package['id'], $package['name'] );
			}

		$output['PACKAGE']=jomresHTML::selectList( $options, 'package_id',' ', 'value', 'text', $package_id);
		
		$jrtbar =jomres_getSingleton('jomres_toolbar');
		$jrtb  = $jrtbar->startTable();

		$image = $jrtbar->makeImageValid(JOMRES_IMAGES_RELPATH.'jomresimages/small/AddItem.png');
		
		$jrtb .= $jrtbar->customToolbarItem('edit',JOMRES_SITEPAGE_URL_ADMIN,$text=jr_gettext('COMMON_NEW', 'COMMON_NEW', false),$submitOnClick=true,$submitTask="edit_subscription",$image);
		$jrtb .= $jrtbar->toolbarItem('cancel',JOMRES_SITEPAGE_URL_ADMIN,jr_gettext("COMMON_CANCEL",'COMMON_CANCEL',false));
		$jrtb .= $jrtbar->endTable();
		$output['JOMRESTOOLBAR']=$jrtb;

		$output['AJAX_URL']=JOMRES_SITEPAGE_URL_ADMIN_AJAX."&task=list_subscriptions_ajax&subscription_status=".$subscription_status."&package_id=".$package_id."&cms_user_id=".$cms_user_id;
		
		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( 'list_subscriptions.html');
		$tmpl->addRows( 'pageoutput',$pageoutput);
		$tmpl->addRows( 'rows',$rows);
		$tmpl->displayParsedTemplate();
		}
	
	
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}	
	}