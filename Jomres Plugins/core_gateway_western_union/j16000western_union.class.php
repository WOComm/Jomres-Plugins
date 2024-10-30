<?php
/**
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @author Aladar Barthi <sales@jomres-extras.com>
* @copyright 2009-2012 Aladar Barthi
**/
// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class j16000western_union
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
		$defaultProperty=getDefaultProperty();
		$output=array();
		$pageoutput=array();
		
		$western_union = new jrportal_western_union();
		$western_union->get_western_union();
		$override_active=$western_union->western_unionConfigOptions['override_active'];
		$accountholder=$western_union->western_unionConfigOptions['accountholder'];
		$bankiban=$western_union->western_unionConfigOptions['bankiban'];
		$bankswift=$western_union->western_unionConfigOptions['bankswift'];
		$bankbic=$western_union->western_unionConfigOptions['bankbic'];
		$bankname=$western_union->western_unionConfigOptions['bankname'];
		$accountholder1=$western_union->western_unionConfigOptions['accountholder1'];
		$bankiban1=$western_union->western_unionConfigOptions['bankiban1'];
		$bankswift1=$western_union->western_unionConfigOptions['bankswift1'];
		$bankbic1=$western_union->western_unionConfigOptions['bankbic1'];
		$bankname1=$western_union->western_unionConfigOptions['bankname1'];
		$accountholder2=$western_union->western_unionConfigOptions['accountholder2'];
		$bankiban2=$western_union->western_unionConfigOptions['bankiban2'];
		$bankswift2=$western_union->western_unionConfigOptions['bankswift2'];
		$bankbic2=$western_union->western_unionConfigOptions['bankbic2'];
		$bankname2=$western_union->western_unionConfigOptions['bankname2'];

		$yesno = array();
		$yesno[] = jomresHTML::makeOption( '0', jr_gettext('_JOMRES_COM_MR_NO','_JOMRES_COM_MR_NO',FALSE) );
		$yesno[] = jomresHTML::makeOption( '1', jr_gettext('_JOMRES_COM_MR_YES','_JOMRES_COM_MR_YES',FALSE) );
		$output['ACTIVE'] = jomresHTML::selectList( $yesno, 'override_active', 'class="inputbox" size="1"', 'value', 'text', $override_active );

		$output['JR_GATEWAY_CONFIG_OVERRIDE_ACTIVE']=jr_gettext('_JOMRES_WESTERN_UNION_GATEWAY_OVERRIDE_ACTIVE','_JOMRES_WESTERN_UNION_GATEWAY_OVERRIDE_ACTIVE',false,false);
		$output['ACCOUNT_HOLDER']=$accountholder;
		$output['BANK_IBAN']=$bankiban;
		$output['BANK_SWIFT']=$bankswift;
		$output['BANK_BIC']=$bankbic;
		$output['BANK_NAME']=$bankname;
		$output['ACCOUNT_HOLDER1']=$accountholder1;
		$output['BANK_IBAN1']=$bankiban1;
		$output['BANK_SWIFT1']=$bankswift1;
		$output['BANK_BIC1']=$bankbic1;
		$output['BANK_NAME1']=$bankname1;
		$output['ACCOUNT_HOLDER2']=$accountholder2;
		$output['BANK_IBAN2']=$bankiban2;
		$output['BANK_SWIFT2']=$bankswift2;
		$output['BANK_BIC2']=$bankbic2;
		$output['BANK_NAME2']=$bankname2;
		
		$output['HACCOUNT_HOLDER']=jr_gettext('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER','_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER');
		$output['HBANK_IBAN']=jr_gettext('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN','_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN');
		$output['HBANK_SWIFT']=jr_gettext('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT','_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT');
		$output['HBANK_BIC']=jr_gettext('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC','_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC');
		$output['HBANK_NAME']=jr_gettext('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME','_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME');
		$output['HACCOUNT_HOLDER1']=jr_gettext('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER1','_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER1');
		$output['HBANK_IBAN1']=jr_gettext('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN1','_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN1');
		$output['HBANK_SWIFT1']=jr_gettext('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT1','_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT1');
		$output['HBANK_BIC1']=jr_gettext('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC1','_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC1');
		$output['HBANK_NAME1']=jr_gettext('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME1','_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME1');
		$output['HACCOUNT_HOLDER2']=jr_gettext('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER2','_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER2');
		$output['HBANK_IBAN2']=jr_gettext('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN2','_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN2');
		$output['HBANK_SWIFT2']=jr_gettext('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT2','_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT2');
		$output['HBANK_BIC2']=jr_gettext('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC2','_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC2');
		$output['HBANK_NAME2']=jr_gettext('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME2','_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME2');
		
		$output['INSTRUCTIONS']=jr_gettext('_JRPORTAL_WESTERN_UNION_ADMIN_INSTRUCTIONS','_JRPORTAL_WESTERN_UNION_ADMIN_INSTRUCTIONS');
		$output['PAGETITLE']=jr_gettext('_JRPORTAL_WESTERN_UNION_TITLE','_JRPORTAL_WESTERN_UNION_TITLE');
		$output['LOGO']='<img src="'.get_showtime('live_site').'/'.JOMRES_ROOT_DIRECTORY.'/remote_plugins/western_union/images/jomresextras.png" alt="Jomres Extras"/>';
		
		$jrtbar =jomres_getSingleton('jomres_toolbar');
		$jrtb  = $jrtbar->startTable();
		$jrtb .= $jrtbar->toolbarItem('save','','',true,'save_western_union');
		$jrtb .= $jrtbar->toolbarItem('cancel',jomresURL(JOMRES_SITEPAGE_URL_ADMIN),'');
		$jrtb .= $jrtbar->endTable();
		$output['JOMRESTOOLBAR']=$jrtb;
		
		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.JRDS.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( 'western_union_admin.html' );
		$tmpl->addRows( 'pageoutput', $pageoutput );
		$tmpl->displayParsedTemplate();	
		}

	// Must be included in every mini-component
	function getRetVals()
		{
		return null;
		}
	}
