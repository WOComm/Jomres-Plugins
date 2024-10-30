<?php
/**
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @author Aladar Barthi <sales@jomres-extras.com>
* @copyright 2009-2012 Aladar Barthi
**/
// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class j00510wire_transfer {
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$ePointFilepath = get_showtime('ePointFilepath');
		$eLiveSite=get_showtime('eLiveSite');
		$plugin="wire_transfer";
		$button='<img src="'.$eLiveSite.'j00510'.$plugin.'.gif" border="0" />';
		$defaultProperty=getDefaultProperty();

		$yesno = array();
		$yesno[] = jomresHTML::makeOption( '0', jr_gettext('_JOMRES_COM_MR_NO','_JOMRES_COM_MR_NO',false,false) );
		$yesno[] = jomresHTML::makeOption( '1', jr_gettext('_JOMRES_COM_MR_YES','_JOMRES_COM_MR_YES',false,false) );

		$wire_transfer = new jrportal_wire_transfer();
		$wire_transfer->get_wire_transfer($defaultProperty);
		$active=$wire_transfer->wire_transferConfigOptions['active'];
		$accountholder=$wire_transfer->wire_transferConfigOptions['accountholder'];
		$bankiban=$wire_transfer->wire_transferConfigOptions['bankiban'];
		$bankswift=$wire_transfer->wire_transferConfigOptions['bankswift'];
		$bankbic=$wire_transfer->wire_transferConfigOptions['bankbic'];
		$bankname=$wire_transfer->wire_transferConfigOptions['bankname'];
		$accountholder1=$wire_transfer->wire_transferConfigOptions['accountholder1'];
		$bankiban1=$wire_transfer->wire_transferConfigOptions['bankiban1'];
		$bankswift1=$wire_transfer->wire_transferConfigOptions['bankswift1'];
		$bankbic1=$wire_transfer->wire_transferConfigOptions['bankbic1'];
		$bankname1=$wire_transfer->wire_transferConfigOptions['bankname1'];
		$accountholder2=$wire_transfer->wire_transferConfigOptions['accountholder2'];
		$bankiban2=$wire_transfer->wire_transferConfigOptions['bankiban2'];
		$bankswift2=$wire_transfer->wire_transferConfigOptions['bankswift2'];
		$bankbic2=$wire_transfer->wire_transferConfigOptions['bankbic2'];
		$bankname2=$wire_transfer->wire_transferConfigOptions['bankname2'];

		$output['GATEWAYNAME']=jr_gettext('_JOMRES_CUSTOMTEXT_GATEWAYNAME'.$plugin,ucwords($plugin),false,false);
		$output['GATEWAYLOGO']=$button;
		$output['GATEWAY']=$plugin;
		$output['JR_GATEWAY_CONFIG_ACTIVE']=jr_gettext('_JOMRES_CUSTOMTEXT_GATEWAY_CONFIG_ACTIVE'.$plugin,"Active");
		$output['ACTIVE'] = jomresHTML::selectList( $yesno, 'active', ' ', 'value', 'text', $active );
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
		
		$output['HACCOUNT_HOLDER']=jr_gettext('_JOMRES_WIRE_TRANSFER_GATEWAY_ACCOUNT_HOLDER','_JOMRES_WIRE_TRANSFER_GATEWAY_ACCOUNT_HOLDER');
		$output['HBANK_IBAN']=jr_gettext('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_IBAN','_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_IBAN');
		$output['HBANK_SWIFT']=jr_gettext('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_SWIFT','_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_SWIFT');
		$output['HBANK_BIC']=jr_gettext('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_BIC','_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_BIC');
		$output['HBANK_NAME']=jr_gettext('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_NAME','_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_NAME');
		$output['HACCOUNT_HOLDER1']=jr_gettext('_JOMRES_WIRE_TRANSFER_GATEWAY_ACCOUNT_HOLDER1','_JOMRES_WIRE_TRANSFER_GATEWAY_ACCOUNT_HOLDER1');
		$output['HBANK_IBAN1']=jr_gettext('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_IBAN1','_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_IBAN1');
		$output['HBANK_SWIFT1']=jr_gettext('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_SWIFT1','_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_SWIFT1');
		$output['HBANK_BIC1']=jr_gettext('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_BIC1','_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_BIC1');
		$output['HBANK_NAME1']=jr_gettext('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_NAME1','_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_NAME1');
		$output['HACCOUNT_HOLDER2']=jr_gettext('_JOMRES_WIRE_TRANSFER_GATEWAY_ACCOUNT_HOLDER2','_JOMRES_WIRE_TRANSFER_GATEWAY_ACCOUNT_HOLDER2');
		$output['HBANK_IBAN2']=jr_gettext('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_IBAN2','_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_IBAN2');
		$output['HBANK_SWIFT2']=jr_gettext('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_SWIFT2','_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_SWIFT2');
		$output['HBANK_BIC2']=jr_gettext('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_BIC2','_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_BIC2');
		$output['HBANK_NAME2']=jr_gettext('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_NAME2','_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_NAME2');
		
		$output['JOMRESTOKEN'] ='';
		
		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.JRDS.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( 'j00510'.$plugin.'.html' );
		$tmpl->addRows( 'edit_gateway', $pageoutput );
		$tmpl->displayParsedTemplate();	
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}		
	}
