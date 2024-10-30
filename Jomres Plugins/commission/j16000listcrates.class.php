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

class j16000listcrates
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
		$editIcon = '<img src="'.JOMRES_IMAGES_RELPATH.'jomresimages/small/EditItem.png" border="0" />';
		
		$jrportal_taxrate = jomres_singleton_abstract::getInstance( 'jrportal_taxrate' );

		jr_import('jrportal_commissions');
		$jrportal_commissions = new jrportal_commissions();
		$jrportal_commissions->getAllCrates();

		$output['PAGETITLE'] = jr_gettext("_JRPORTAL_CPANEL_PATETITLE",'_JRPORTAL_CPANEL_PATETITLE',false);
		$output['TOTALINLISTPLUSONE'] = count($jrportal_commissions->crates);
		$output['HTITLE'] = jr_gettext("_JRPORTAL_CRATE_TITLE",'_JRPORTAL_CRATE_TITLE',false);
		$output['HTYPE'] = jr_gettext("_JRPORTAL_CRATE_TYPE",'_JRPORTAL_CRATE_TYPE',false);
		$output['HVALUE'] = jr_gettext("_JRPORTAL_CRATE_VALUE",'_JRPORTAL_CRATE_VALUE',false);
		$output['HCURRENCYCODE'] = jr_gettext("_JRPORTAL_CRATE_CURRENCYCODE",'_JRPORTAL_CRATE_CURRENCYCODE',false);
		$output['HTAX_RATE'] = jr_gettext("_JRPORTAL_INVOICES_LINEITEMS_TAX_RATE",'_JRPORTAL_INVOICES_LINEITEMS_TAX_RATE',false);
		
		$rows = array();
		$counter = 0;
		
		foreach($jrportal_commissions->crates as $crate)
			{
			$r=array();

			$r['CHECKBOX'] = '<input type="checkbox" id="cb'.count($rows).'" name="idarray[]" value="'.$crate['id'].'" onClick="jomres_isChecked(this.checked);">';
			
			if (!using_bootstrap())
				{
				$r['EDITLINK'] = '<a href="'.JOMRES_SITEPAGE_URL_ADMIN.'&task=editcrate&id='.$crate['id'].'">'.$editIcon.'</a>';
				}
			else
				{
				$toolbar = jomres_singleton_abstract::getInstance( 'jomresItemToolbar' );
				$toolbar->newToolbar();
				$toolbar->addItem( 'fa fa-pencil-square-o', 'btn btn-info', '', jomresURL( JOMRES_SITEPAGE_URL_ADMIN . '&task=editcrate&id=' . $crate['id'] ), jr_gettext( 'COMMON_EDIT', 'COMMON_EDIT', false ) );
				$toolbar->addSecondaryItem( 'fa fa-trash-o', '', '', jomresURL( JOMRES_SITEPAGE_URL_ADMIN . '&task=deletecrates&id=' . $crate['id'] ), jr_gettext( 'COMMON_DELETE', 'COMMON_DELETE', false ) );
				
				$r['EDITLINK'] = $toolbar->getToolbar();
				}
			
			$r['TITLE'] = $crate['title'];
			
			if ($crate['type'] == 1)
				$r['TYPE'] = 'Flat rate';
			else
				$r['TYPE'] = 'Percentage';

			$r['VALUE'] = $crate['value'];
			$r['CURRENCYCODE'] = $crate['currencycode'];
			
			if ( $jrportal_taxrate->gather_data($crate['tax_rate']) )
				$r['TAX_RATE'] = $jrportal_taxrate->code.' '.$jrportal_taxrate->description;
			else
				$r['TAX_RATE'] = '';
			
			$rows[]=$r;
			}

		$jrtbar =jomres_getSingleton('jomres_toolbar');
		$jrtb  = $jrtbar->startTable();
		$image = $jrtbar->makeImageValid(JOMRES_IMAGES_RELPATH.'jomresimages/small/AddItem.png');
		$link = JOMRES_SITEPAGE_URL_ADMIN;
		$jrtb .= $jrtbar->customToolbarItem('editCrate',$link,$text="Add",$submitOnClick=true,$submitTask="editcrate",$image);
		$jrtb .= $jrtbar->toolbarItem('cancel',JOMRES_SITEPAGE_URL_ADMIN,jr_gettext("_JRPORTAL_CANCEL",'_JRPORTAL_CANCEL',false));
		$image = $jrtbar->makeImageValid(JOMRES_IMAGES_RELPATH.'jomresimages/small/WasteBasket.png');
		$link = JOMRES_SITEPAGE_URL_ADMIN;
		$jrtb .= $jrtbar->customToolbarItem('archiveCrates',$link,$text="Delete",$submitOnClick=true,$submitTask="deletecrates",$image);
		$jrtb .= $jrtbar->endTable();
		$output['JOMRESTOOLBAR']=$jrtb;

		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( 'list_crates.html');
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