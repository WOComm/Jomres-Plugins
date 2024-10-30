<?php
/**
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @author Aladar Barthi <sales@jomres-extras.com>
* @copyright 2009-2012 Aladar Barthi
**/
// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class j00605wire_transfer {
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
		
		$wire_transfer = new jrportal_wire_transfer();
		$wire_transfer->get_wire_transfer();
		if ($wire_transfer->wire_transferConfigOptions['override_active'] != "1")
			{
			$wire_transfer = new jrportal_wire_transfer();
			$wire_transfer->get_wire_transfer($property_uid);
			}
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

		$output['HACCOUNT_HOLDER']=jr_gettext('_JOMRES_WIRE_TRANSFER_GATEWAY_ACCOUNT_HOLDER','_JOMRES_WIRE_TRANSFER_GATEWAY_ACCOUNT_HOLDER');
		$output['HBANK_IBAN']=jr_gettext('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_IBAN','_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_IBAN');
		$output['HBANK_SWIFT']=jr_gettext('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_SWIFT','_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_SWIFT');
		$output['HBANK_BIC']=jr_gettext('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_BIC','_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_BIC');
		$output['HBANK_NAME']=jr_gettext('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_NAME','_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_NAME');
		$output['ACCOUNT_HOLDER']=$accountholder."<br />";
		$output['BANK_IBAN']=$bankiban."<br />";
		$output['BANK_SWIFT']=$bankswift."<br />";
		$output['BANK_BIC']=$bankbic."<br />";
		$output['BANK_NAME']=$bankname."<br />";
		
		if ($accountholder1!="")
			{
			$output['HACCOUNT_HOLDER1']=jr_gettext('_JOMRES_WIRE_TRANSFER_GATEWAY_ACCOUNT_HOLDER1','_JOMRES_WIRE_TRANSFER_GATEWAY_ACCOUNT_HOLDER1');
			$output['HBANK_IBAN1']=jr_gettext('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_IBAN1','_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_IBAN1');
			$output['HBANK_SWIFT1']=jr_gettext('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_SWIFT1','_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_SWIFT1');
			$output['HBANK_BIC1']=jr_gettext('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_BIC1','_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_BIC1');
			$output['HBANK_NAME1']=jr_gettext('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_NAME1','_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_NAME1');
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
			$output['HACCOUNT_HOLDER2']=jr_gettext('_JOMRES_WIRE_TRANSFER_GATEWAY_ACCOUNT_HOLDER2','_JOMRES_WIRE_TRANSFER_GATEWAY_ACCOUNT_HOLDER2');
			$output['HBANK_IBAN2']=jr_gettext('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_IBAN2','_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_IBAN2');
			$output['HBANK_SWIFT2']=jr_gettext('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_SWIFT2','_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_SWIFT2');
			$output['HBANK_BIC2']=jr_gettext('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_BIC2','_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_BIC2');
			$output['HBANK_NAME2']=jr_gettext('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_NAME2','_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_NAME2');
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
		
		$output['HSENDDEPOSITTO']=jr_gettext('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_SENDDEPOSITTO','_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_SENDDEPOSITTO');
		$output['HBELOWADDRESS']=jr_gettext('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_BELOWADDRESS_EMAIL','_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_BELOWADDRESS_EMAIL');
		$output['HCONTACTUS']=jr_gettext('_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_CONTACTUS_EMAIL','_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_CONTACTUS_EMAIL');
		$output['HELLO']=jr_gettext('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_EMAIL_HELLO','_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_EMAIL_HELLO').$guestFirstname.' '.$guestSurname.', ';
		$output['HTHANKYOU']=jr_gettext('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_EMAIL_THANKYOU','_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_EMAIL_THANKYOU').$propertyName.'. ';
		$emailTitle=jr_gettext('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_EMAIL_TITLE','_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_EMAIL_TITLE').$propertyName;
		
		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.JRDS.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( 'wire_transfer_email.html' );
		$tmpl->addRows( 'interrupt_outgoing', $pageoutput );
		$text=$tmpl->getParsedTemplate();
		
		if (!jomresMailer( $propertyEmail, $propertyName, $guestEmail, $emailTitle, $text,$mode=1))
			error_logging('Failure in sending wire transfer details email to guest. Target address: '.$guestEmail.' Subject: '.$emailTitle);
		
		//insert booking
		//$tmpBookingHandler = jomres_singleton_abstract::getInstance( 'jomres_temp_booking_handler' );
		//$tmpBookingHandler->updateBookingField('depositpaidsuccessfully',true);
		insertInternetBooking(get_showtime('jomressession'),$paymentSuccessful=false);
		}
	
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}		
	}
