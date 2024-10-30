<?php
/**
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @author Aladar Barthi <sales@jomres-extras.com>
* @copyright 2009-2012 Aladar Barthi
**/
// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class j00605western_union {
	function __construct($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$ePointFilepath = get_showtime('ePointFilepath');
		$bookingdata=$componentArgs['bookingdata'];
		$property_uid=(int)$bookingdata['property_uid'];
		$mrConfig=getPropertySpecificSettings($property_uid);
		$jomresProccessingBookingObject=getCurrentBookingData(get_showtime('jomressession'));
		$guestDetails=$jomresProccessingBookingObject->guestDetails;
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

		$current_property_details =jomres_getSingleton('basic_property_details');
		$current_property_details->gather_data($property_uid);
		$propertyName=$current_property_details->get_property_name($property_uid);
		$propertyEmail=$current_property_details->property_email;
		$guestEmail=$guestDetails->email;
		$guestFirstname=$guestDetails->firstname;
		$guestSurname=$guestDetails->surname;

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
		
		$output['HSENDDEPOSITTO']=jr_gettext('_JOMRES_CUSTOMTEXT_WESTERN_UNION_SENDDEPOSITTO','_JOMRES_CUSTOMTEXT_WESTERN_UNION_SENDDEPOSITTO');
		$output['HBELOWADDRESS']=jr_gettext('_JOMRES_CUSTOMTEXT_WESTERN_UNION_BELOWADDRESS_EMAIL','_JOMRES_CUSTOMTEXT_WESTERN_UNION_BELOWADDRESS_EMAIL');
		$output['HCONTACTUS']=jr_gettext('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS_EMAIL','_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS_EMAIL');
		$output['HELLO']=jr_gettext('_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_HELLO','_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_HELLO').$guestFirstname.' '.$guestSurname.', ';
		$output['HTHANKYOU']=jr_gettext('_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_THANKYOU','_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_THANKYOU').$propertyName.'. ';
		$emailTitle=jr_gettext('_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_TITLE','_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_TITLE').$propertyName;
		
		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.JRDS.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( 'western_union_email.html' );
		$tmpl->addRows( 'interrupt_outgoing', $pageoutput );
		$text=$tmpl->getParsedTemplate();
		
		if (!jomresMailer( $propertyEmail, $propertyName, $guestEmail, $emailTitle, $text,$mode=1))
			error_logging('Failure in sending wire transfer details email to guest. Target address: '.$guestEmail.' Subject: '.$emailTitle);

		$tmpBookingHandler =jomres_getSingleton('jomres_temp_booking_handler');
		$tmpBookingHandler->tmpbooking['western_union_gateway_selected'] = true;

		//insert booking
		insertInternetBooking(get_showtime('jomressession'),$paymentSuccessful=false);
		}
	
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}		
	}
