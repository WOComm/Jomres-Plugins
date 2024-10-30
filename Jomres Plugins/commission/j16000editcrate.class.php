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

class j16000editcrate
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
		$id = jomresGetParam( $_REQUEST, 'id',	0 );
		
		$jrportal_taxrate = jomres_singleton_abstract::getInstance( 'jrportal_taxrate' );

		$output['PAGETITLE']=jr_gettext("_JRPORTAL_CPANEL_PATETITLE",'_JRPORTAL_CPANEL_PATETITLE',false);
		$output['HTITLE']=jr_gettext("_JRPORTAL_CRATE_TITLE",'_JRPORTAL_CRATE_TITLE',false);
		$output['HTYPE']=jr_gettext("_JRPORTAL_CRATE_TYPE",'_JRPORTAL_CRATE_TYPE',false);
		$output['HVALUE']=jr_gettext("_JRPORTAL_CRATE_VALUE",'_JRPORTAL_CRATE_VALUE',false);
		$output['HCURRENCYCODE']=jr_gettext("_JRPORTAL_CRATE_CURRENCYCODE",'_JRPORTAL_CRATE_CURRENCYCODE',false);
		$output['HTAXCODE'] =jr_gettext('_JRPORTAL_TAXRATES_CODE','_JRPORTAL_TAXRATES_CODE',FALSE);

		jr_import('jrportal_commissions');
		$jrportal_commissions = new jrportal_commissions();
		
		$currency_codes = jomres_singleton_abstract::getInstance('currency_codes');
		
		if ($id > 0)
			{
			$jrportal_commissions->id = $id;
			$jrportal_commissions->getCrate();
			
			$output['ID'] = $jrportal_commissions->id;
			$output['TITLE']=$jrportal_commissions->title;
			$output['TYPE']=$jrportal_commissions->makeCrateTypeDropdown($jrportal_commissions->type);
			$output['VALUE']=$jrportal_commissions->value;
			$output['TAX_RATE_DROPDOWN']=$jrportal_taxrate->makeTaxratesDropdown( $jrportal_commissions->tax_rate, 'tax_rate' );
			$output['CURRENCYCODE'] = $currency_codes->makeCodesDropdown($jrportal_commissions->currencycode, false, "currencycode");
			}
		else
			{
			$output['ID'] = 0;
			$output['TITLE']='';
			$output['TYPE']=$jrportal_commissions->makeCrateTypeDropdown();
			$output['VALUE']='';
			$output['TAX_RATE_DROPDOWN']=$jrportal_taxrate->makeTaxratesDropdown( 1, 'tax_rate' );
			$output['CURRENCYCODE'] = $currency_codes->makeCodesDropdown('', false, "currencycode");
			}

		$jrtbar =jomres_getSingleton('jomres_toolbar');
		$jrtb  = $jrtbar->startTable();
		$image = $jrtbar->makeImageValid(JOMRES_IMAGES_RELPATH.'jomresimages/small/Save.png');
		$link = JOMRES_SITEPAGE_URL_ADMIN;
		$jrtb .= $jrtbar->toolbarItem('cancel',JOMRES_SITEPAGE_URL_ADMIN."&task=listcrates",jr_gettext("_JRPORTAL_CANCEL",'_JRPORTAL_CANCEL',false));
		$jrtb .= $jrtbar->customToolbarItem('saveCrate',$link,$text="Save",$submitOnClick=true,$submitTask="savecrate",$image);
		$jrtb .= $jrtbar->endTable();
		$output['JOMRESTOOLBAR']=$jrtb;

		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( 'edit_crate.html');
		$tmpl->addRows( 'pageoutput',$pageoutput);
		$tmpl->displayParsedTemplate();
		}


	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}