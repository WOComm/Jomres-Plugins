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

class j03120send_email_guest_enquiryrejection
	{
	function __construct( $componentArgs )
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch )
			{
			$this->template_touchable = false; return;
			}
		
		$email_type = 'email_guest_enquiryrejection';

		$property_uid = $componentArgs[ 'property_uid' ];
		$contract_uid = $componentArgs[ 'contract_uid' ];
		
		if ( !isset( $componentArgs[ 'email_when_done' ] ) ) 
			$email_when_done = true;
		else
			$email_when_done = $componentArgs[ 'email_when_done' ]; // Optional. We'll set email_when_done by default to true, otherwise we'll set it in the componentArgs variable. This allows us to call this script independantly which in turn allows us to view the email as it's contructed, rather than when sent.
		
		$booking_email_details = jomres_singleton_abstract::getInstance( 'jomres_generic_booking_email' );
		$booking_email_details->gather_data($contract_uid, $property_uid);
		$booking_email_details->parse_email($email_type, $contract_uid);
		

		if ( $email_when_done )
			{
			if ( !jomresMailer( $booking_email_details->data[$contract_uid]['PROPERTY_EMAIL'], 
								$booking_email_details->data[$contract_uid]['PROPERTY_NAME'], 
								$booking_email_details->data[$contract_uid]['EMAIL'], 
								$booking_email_details->parsed_email['subject'], 
								$booking_email_details->parsed_email['text'], 
								$mode = 1, 
								$booking_email_details->parsed_email['attachments'] )
				) 
				error_logging( 'Failure in sending enquiry rejection email to guest. Target address: ' . $booking_email_details->data[$contract_uid]['EMAIL'] . ' Subject ' . $booking_email_details->parsed_email['subject'].$booking_email_details->parsed_email['text'] );
			}
		else
			echo $booking_email_details->parsed_email['text'];
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
