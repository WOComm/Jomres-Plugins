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

class j16000list_subscription_packages
	{
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_singleton_abstract::getInstance('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		
		$ePointFilepath = get_showtime('ePointFilepath');
		
		$editIcon	='<img src="'.JOMRES_IMAGES_RELPATH.'jomresimages/small/EditItem.png" border="0" alt="editicon" />';
		
		$siteConfig = jomres_singleton_abstract::getInstance( 'jomres_config_site_singleton' );
		$jrConfig   = $siteConfig->get();
		
		if ( (int)$jrConfig[ 'useSubscriptions' ] != 1 )
			return;
		
		$jrportal_taxrate = jomres_singleton_abstract::getInstance( 'jrportal_taxrate' );
		
		jr_import('jrportal_subscriptions');
		$jrportal_subscriptions = new jrportal_subscriptions();
		
		$basic_subscription_package_details = jomres_singleton_abstract::getInstance( 'basic_subscription_package_details' );
		
		$output=array();
		$pageoutput=array();
		$rows=array();
								
		$output['PAGETITLE']		=jr_gettext('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_TITLE','_JRPORTAL_SUBSCRIPTIONS_PACKAGES_TITLE',FALSE);
		$output['HNAME']			=jr_gettext('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_NAME','_JRPORTAL_SUBSCRIPTIONS_PACKAGES_NAME',FALSE);
		$output['HDESCRIPTION']		=jr_gettext('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_DESCRIPTION','_JRPORTAL_SUBSCRIPTIONS_PACKAGES_DESCRIPTION',FALSE);
		$output['HPUBLISHED']		=jr_gettext('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PUBLISHED','_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PUBLISHED',FALSE);
		$output['HFREQUENCY']		=jr_gettext('_SUBSCRIPTIONS_HFREQUENCY_DAYS','_SUBSCRIPTIONS_HFREQUENCY_DAYS',FALSE);
		$output['HFULLAMOUNT']		=jr_gettext('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FULLAMOUNT','_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FULLAMOUNT',FALSE);
		$output['HRENEWALPRICE']	=jr_gettext('_SUBSCRIPTIONS_HRENEWAL_PRICE','_SUBSCRIPTIONS_HRENEWAL_PRICE',FALSE);
		$output['HCURRENCYCODE']	=jr_gettext('_JOMRES_COM_A_CURRENCYCODE','_JOMRES_COM_A_CURRENCYCODE',FALSE);
		$output['HTAX_RATE']		=jr_gettext('_JRPORTAL_INVOICES_LINEITEMS_TAX_RATE','_JRPORTAL_INVOICES_LINEITEMS_TAX_RATE',FALSE);

		foreach ($basic_subscription_package_details->allPackages as $package)
			{
			$r=array();
			$r['ID']			=$package['id'];
			$r['NAME']			=$package['name'];
			$r['DESCRIPTION']	=$package['description'];
			$r['PUBLISHED']		=$package['published'];
			$r['FREQUENCY']		=$package['frequency'];
			$r['FULLAMOUNT']	=output_price( $package['full_amount'], $package['currencycode'] );
			$r['CURRENCYCODE']	=$package['currencycode'];

			if ( $jrportal_taxrate->gather_data($package['tax_code_id']) )
				$r['TAX_RATE'] = $jrportal_taxrate->code.' '.$jrportal_taxrate->description;
			else
				$r['TAX_RATE'] = '';
			
			if (!using_bootstrap())
				{
				$r['EDITLINK']		='<a href="'.JOMRES_SITEPAGE_URL_ADMIN.'&task=edit_subscription_package&id='.$package['id'].'">'.$editIcon.'</a>';
				}
			else
				{
				$toolbar = jomres_singleton_abstract::getInstance( 'jomresItemToolbar' );
				$toolbar->newToolbar();
				
				$toolbar->addItem( 'fa fa-pencil-square-o', 'btn btn-info', '', jomresURL( JOMRES_SITEPAGE_URL_ADMIN . '&task=edit_subscription_package&id=' . $package['id'] ), jr_gettext( 'COMMON_EDIT', 'COMMON_EDIT', false ) );
				
				if ( $package['published'] == 0 )
					$toolbar->addSecondaryItem( 'fa fa-times', '', '', jomresURL( JOMRES_SITEPAGE_URL_ADMIN . '&task=publish_subscription_package&published=1&id=' . $package['id'] ), jr_gettext( '_JOMRES_COM_MR_VRCT_PUBLISH', '_JOMRES_COM_MR_VRCT_PUBLISH', false ) );
				else
					$toolbar->addSecondaryItem( 'fa fa-check', '', '', jomresURL( JOMRES_SITEPAGE_URL_ADMIN . '&task=publish_subscription_package&published=0&id=' . $package['id'] ), jr_gettext( '_JOMRES_COM_MR_VRCT_UNPUBLISH', '_JOMRES_COM_MR_VRCT_UNPUBLISH', false ) );
				
				$toolbar->addSecondaryItem( 'fa fa-trash-o', '', '', jomresURL( JOMRES_SITEPAGE_URL_ADMIN . '&task=delete_subscription_package&id=' . $package['id'] ), jr_gettext( 'COMMON_DELETE', 'COMMON_DELETE', false ) );
				
				$r['EDITLINK'] = $toolbar->getToolbar();
				}
			$rows[]=$r;
			}

		$jrtbar =jomres_getSingleton('jomres_toolbar');
		$jrtb  = $jrtbar->startTable();
		$jrtb .= $jrtbar->toolbarItem('cancel',JOMRES_SITEPAGE_URL_ADMIN,'');
		$jrtb .= $jrtbar->toolbarItem('new',JOMRES_SITEPAGE_URL_ADMIN."&task=edit_subscription_package",'');
		$jrtb .= $jrtbar->endTable();
		$output['JOMRESTOOLBAR']=$jrtb;
		
		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( 'list_subscription_packages.html');
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