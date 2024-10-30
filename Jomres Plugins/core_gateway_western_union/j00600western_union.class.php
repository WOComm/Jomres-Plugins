<?php
/**
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @author Aladar Barthi <sales@jomres-extras.com>
* @copyright 2009-2012 Aladar Barthi
**/
// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class j00600western_union {
	function __construct($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=true; return;
			}
		$ePointFilepath = get_showtime('ePointFilepath');
		$jomresConfig_live_site=get_showtime('live_site');
		$plugin="western_union";
		$bookingdata=$componentArgs['bookingdata'];
		$property_uid=(int)$bookingdata['property_uid'];
		$mrConfig=getPropertySpecificSettings($property_uid);
		$output=array();
		
		$western_union = new jrportal_western_union();
		$western_union->get_western_union();
		if ($western_union->western_unionConfigOptions['override_active'] != "1")
			{
			$western_union = new jrportal_western_union();
			$western_union->get_western_union($property_uid);
			}
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
		
		$output['DEPOSIT']=output_price($bookingdata['deposit_required']);
		$output['TOTAL']=output_price($bookingdata['contract_total']);
		$bal=(float)$bookingdata['contract_total']-(float)$bookingdata['deposit_required'];
		$output['BALANCE']=output_price($bal);
		
		$output['HACCOUNT_HOLDER']=jr_gettext('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER','_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER');
		$output['HBANK_IBAN']=jr_gettext('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN','_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN');
		$output['HBANK_SWIFT']=jr_gettext('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT','_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT');
		$output['HBANK_BIC']=jr_gettext('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC','_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC');
		$output['HBANK_NAME']=jr_gettext('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME','_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME');
		$output['ACCOUNT_HOLDER']=$accountholder."<br />";
		$output['BANK_IBAN']=$bankiban."<br />";
		$output['BANK_SWIFT']=$bankswift."<br />";
		$output['BANK_BIC']=$bankbic."<br />";
		$output['BANK_NAME']=$bankname."<br />";
		
		if ($accountholder1!="")
			{
			$output['HACCOUNT_HOLDER1']=jr_gettext('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER1','_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER1');
			$output['HBANK_IBAN1']=jr_gettext('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN1','_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN1');
			$output['HBANK_SWIFT1']=jr_gettext('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT1','_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT1');
			$output['HBANK_BIC1']=jr_gettext('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC1','_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC1');
			$output['HBANK_NAME1']=jr_gettext('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME1','_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME1');
			$output['ACCOUNT_HOLDER1']=$accountholder1."<br />";
			$output['BANK_IBAN1']=$bankiban1."<br />";
			$output['BANK_SWIFT1']=$bankswift1."<br />";
			$output['BANK_BIC1']=$bankbic1."<br />";
			$output['BANK_NAME1']=$bankname1."<br />";
			}
		else
			{
			$output['HACCOUNT_HOLDER1']="";
			$output['HBANK_IBAN1']="";
			$output['HBANK_SWIFT1']="";
			$output['HBANK_BIC1']="";
			$output['HBANK_NAME1']="";
			$output['ACCOUNT_HOLDER1']="";
			$output['BANK_IBAN1']="";
			$output['BANK_SWIFT1']="";
			$output['BANK_BIC1']="";
			$output['BANK_NAME1']="";
			}
		if ($accountholder2!="")
			{
			$output['HACCOUNT_HOLDER2']=jr_gettext('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER2','_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER2');
			$output['HBANK_IBAN2']=jr_gettext('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN2','_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN2');
			$output['HBANK_SWIFT2']=jr_gettext('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT2','_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT2');
			$output['HBANK_BIC2']=jr_gettext('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC2','_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC2');
			$output['HBANK_NAME2']=jr_gettext('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME2','_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME2');
			$output['ACCOUNT_HOLDER2']=$accountholder2."<br />";
			$output['BANK_IBAN2']=$bankiban2."<br />";
			$output['BANK_SWIFT2']=$bankswift2."<br />";
			$output['BANK_BIC2']=$bankbic2."<br />";
			$output['BANK_NAME2']=$bankname2."<br />";
			}
		else
			{
			$output['HACCOUNT_HOLDER2']="";
			$output['HBANK_IBAN2']="";
			$output['HBANK_SWIFT2']="";
			$output['HBANK_BIC2']="";
			$output['HBANK_NAME2']="";
			$output['ACCOUNT_HOLDER2']="";
			$output['BANK_IBAN2']="";
			$output['BANK_SWIFT2']="";
			$output['BANK_BIC2']="";
			$output['BANK_NAME2']="";
			}
		
		$current_property_details =jomres_getSingleton('basic_property_details');
		$current_property_details->gather_data($property_uid);
		$output['PROP_NAME']=$current_property_details->get_property_name($property_uid);
		$output['PROP_TEL']=$current_property_details->property_tel;
		$output['PROP_EMAIL']=$current_property_details->property_email;

		$output['GATEWAY']=$plugin;
		$output['JR_GATEWAY_SENDDEPOSITTO']=jr_gettext('_JOMRES_CUSTOMTEXT_WESTERN_UNION_SENDDEPOSITTO','_JOMRES_CUSTOMTEXT_WESTERN_UNION_SENDDEPOSITTO');
		$output['JR_GATEWAY_BELOWADDRESS']=jr_gettext('_JOMRES_CUSTOMTEXT_WESTERN_UNION_BELOWADDRESS','_JOMRES_CUSTOMTEXT_WESTERN_UNION_BELOWADDRESS');
		$output['JR_GATEWAY_CONTACTUS1']=jr_gettext('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS1','_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS1');
		$output['JR_GATEWAY_CONTACTUS2']=jr_gettext('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS2','_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS2');
		
		$output['PRINT']=jr_gettext('_JOMRES_WESTERN_UNION_CUSTOMTEXT_PRINT','_JOMRES_WESTERN_UNION_CUSTOMTEXT_PRINT');
		jomres_cmsspecific_addheaddata("css",$jomresConfig_live_site."/".JOMRES_ROOT_DIRECTORY."/core-plugins/western_union/css/print.css\" media=\"print");
			
		$output['SUBMIT']=jr_gettext('_JOMRES_WESTERN_UNION_CUSTOMTEXT_SUBMIT','_JOMRES_WESTERN_UNION_CUSTOMTEXT_SUBMIT');
		
		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.JRDS.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( 'j00600'.$plugin.'.html' );
		$tmpl->addRows( 'interrupt_outgoing', $pageoutput );
		$tmpl->displayParsedTemplate();
		}
		
	function touch_template_language()
		{
		$output=array();
		$plugin="western_union";

		$output[]		=jr_gettext('_JOMRES_CUSTOMTEXT_WESTERN_UNION_SENDDEPOSITTO','_JOMRES_CUSTOMTEXT_WESTERN_UNION_SENDDEPOSITTO');
		$output[]		=jr_gettext('_JOMRES_CUSTOMTEXT_WESTERN_UNION_BELOWADDRESS','_JOMRES_CUSTOMTEXT_WESTERN_UNION_BELOWADDRESS');
		$output[]		=jr_gettext('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS1','_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS1');
		$output[]		=jr_gettext('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS2','_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS2');
		$output[]		=jr_gettext('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER','_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER');
		$output[]		=jr_gettext('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN','_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN');
		$output[]		=jr_gettext('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT','_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT');
		$output[]		=jr_gettext('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC','_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC');
		$output[]		=jr_gettext('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME','_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME');
		$output[]		=jr_gettext('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER1','_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER1');
		$output[]		=jr_gettext('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN1','_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN1');
		$output[]		=jr_gettext('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT1','_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT1');
		$output[]		=jr_gettext('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC1','_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC1');
		$output[]		=jr_gettext('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME1','_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME1');
		$output[]		=jr_gettext('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER2','_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER2');
		$output[]		=jr_gettext('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN2','_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN2');
		$output[]		=jr_gettext('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT2','_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT2');
		$output[]		=jr_gettext('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC2','_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC2');
		$output[]		=jr_gettext('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME2','_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME2');
		$output[]		=jr_gettext('_JOMRES_CUSTOMTEXT_WESTERN_UNION_BELOWADDRESS_EMAIL','_JOMRES_CUSTOMTEXT_WESTERN_UNION_BELOWADDRESS_EMAIL');
		$output[]		=jr_gettext('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS_EMAIL','_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS_EMAIL');
		$output[]		=jr_gettext('_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_HELLO','_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_HELLO');
		$output[]		=jr_gettext('_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_THANKYOU','_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_THANKYOU');
		$output[]		=jr_gettext('_JOMRES_WESTERN_UNION_CUSTOMTEXT_PRINT','_JOMRES_WESTERN_UNION_CUSTOMTEXT_PRINT');
		$output[]		=jr_gettext('_JOMRES_WESTERN_UNION_CUSTOMTEXT_SUBMIT','_JOMRES_WESTERN_UNION_CUSTOMTEXT_SUBMIT');
		$output[]		=jr_gettext('_JOMRES_CUSTOMTEXT_GATEWAYNAME'."western_union","Western Union");
		$output[]		=jr_gettext('_JOMRES_CUSTOMTEXT_GATEWAY_CONFIG_ACTIVE'.$plugin,"Active");
		
		foreach ($output as $o)
			{
			echo $o;
			echo "<br/>";
			}
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}		
	}
