<?php
/**
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @author Aladar Barthi <sales@jomres-extras.com>
* @copyright 2009-2013 Aladar Barthi
**/
// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class j06000cron_payment_reminder
	{
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch) {
			$this->template_touchable=false; return;
			}

		jr_import('jomres_encryption');
		$this->jomres_encryption = new jomres_encryption();
		
		$ePointFilepath = get_showtime('ePointFilepath');
		
		$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
		$jrConfig = $siteConfig->get();
			
		if ($jrConfig['p_reminder_enabled'] != '1') {
			return;
		}
			
		$days_set = (int)$jrConfig['p_reminder_days'];
			
		$query="SELECT contract_uid,guest_uid,property_uid FROM #__jomres_contracts WHERE `deposit_paid` = 0 AND `cancelled` = 0 AND `cot_required` = 0 AND `timestamp` IS NOT NULL AND `tag` IS NOT NULL AND DATEDIFF(DATE_FORMAT(NOW(), '%Y-%m-%d'), DATE_FORMAT(`timestamp`, '%Y-%m-%d')) >= ".$days_set." AND DATEDIFF(DATE_FORMAT(NOW(), '%Y-%m-%d'), DATE_FORMAT(`timestamp`, '%Y-%m-%d')) <= ".($days_set+1)." ";
		$provisionalBookingsList=doSelectSql($query);
			
		$tobereminded=array();
			
		if (!empty($provisionalBookingsList)) {
			foreach ($provisionalBookingsList as $k) {
				$tobereminded[]=$k->contract_uid;
				$cuid=$k->contract_uid;
				$guid=$k->guest_uid;
				$puid=$k->property_uid;
					
				$mrConfig=getPropertySpecificSettings($puid);
					
				$query="SELECT enc_email,enc_firstname,enc_surname,enc_tel_landline,enc_tel_mobile FROM #__jomres_guests WHERE guests_uid = ".(int)$guid." LIMIT 1";
				$guestData=doSelectSql($query,2);
					
				$query="SELECT property_name,property_town,property_email FROM #__jomres_propertys WHERE propertys_uid = ".(int)$puid." LIMIT 1";
				$propertyData=doSelectSql($query,2);
					
				$query="SELECT arrival,departure,contract_total,deposit_required,tag FROM #__jomres_contracts WHERE contract_uid = '".(int)$cuid."' LIMIT 1 ";
				$bData=doSelectSql($query,2);
				
				$arr=$bData['arrival'];
				$dep=$bData['departure'];
				$tot=$bData['contract_total'];
				$deposit=$bData['deposit_required'];
				$tag=$bData['tag'];
				
				$saveMessage=jr_gettext('_JOMRES_PAYMENT_REMINDER_EMAIL_TITLE','_JOMRES_PAYMENT_REMINDER_EMAIL_TITLE',FALSE).' '.$propertyData['property_name'];
				$output['ARRIVAL']=$arr;
				$output['DEPARTURE']=$dep;
				$output['TOTAL']=$mrConfig['currencyCode']." ".number_format($tot,2);
				$output['HARRIVAL']=jr_gettext('_JOMRES_COM_MR_VIEWBOOKINGS_ARRIVAL','_JOMRES_COM_MR_VIEWBOOKINGS_ARRIVAL',FALSE);
				$output['HDEPARTURE']=jr_gettext('_JOMRES_COM_MR_VIEWBOOKINGS_DEPARTURE','_JOMRES_COM_MR_VIEWBOOKINGS_DEPARTURE',FALSE);
				$output['HTOTAL']=jr_gettext('_JOMRES_COM_MR_EB_PAYM_CONTRACT_TOTAL','_JOMRES_COM_MR_EB_PAYM_CONTRACT_TOTAL',FALSE);
				$output['DEAR']=jr_gettext('_JOMRES_COM_CONFIRMATION_DEAR','_JOMRES_COM_CONFIRMATION_DEAR',FALSE);
				$output['GUESTFIRSTNAME']=$this->jomres_encryption->decrypt($guestData['enc_firstname']);
				$output['GUESTLASTNAME']=$this->jomres_encryption->decrypt($guestData['enc_surname']);
				$output['BODY1']=jr_gettext('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY1','_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY1',FALSE,FALSE).' '.$propertyData['property_name'].".";
				$output['HBOOKINGNO']=jr_gettext('_JOMRES_BOOKING_NUMBER','_JOMRES_BOOKING_NUMBER',FALSE,FALSE);
				$output['BOOKINGNO']=$tag;
				$output['HDEPOSIT']		=	jr_gettext('_JOMRES_COM_MR_EB_PAYM_DEPOSITREQUIRED','_JOMRES_COM_MR_EB_PAYM_DEPOSITREQUIRED');
				$output['DEPOSIT']=$mrConfig['currencyCode']." ".number_format($deposit,2);
				$output['BODY2']=jr_gettext('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY2','_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY2',FALSE,FALSE).' '.$mrConfig['currencyCode']." ".number_format($deposit,2).jr_gettext('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY3','_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY3',FALSE,FALSE);

				$pageoutput[]=$output;
				$tmpl = new patTemplate();
				$tmpl->setRoot( $ePointFilepath.JRDS.'templates'.JRDS.find_plugin_template_directory() );
				$tmpl->readTemplatesFromInput( 'payment_reminder_email.html');
				$tmpl->addRows( 'pageoutput',$pageoutput);
				$text=$tmpl->getParsedTemplate();

				if ( $tot > 0 ) {
					if (!jomresMailer($this->jomres_encryption->decrypt($guestData['enc_email']), $propertyData['property_name'].' - '.$propertyData['property_town'], $propertyData['property_email'], "(Copy of) ".$saveMessage, $text,$mode=1))
						error_logging('Failure in sending payment reminder email to admin. Target address: '.$propertyData['property_email'].' Subject: '.$text);
					if (!jomresMailer( $propertyData['property_email'], $propertyData['property_name'].' - '.$propertyData['property_town'], $this->jomres_encryption->decrypt($guestData['enc_email']), $saveMessage, $text,$mode=1))
						error_logging('Failure in sending payment reminder email to guest. Target address: '.$this->jomres_encryption->decrypt($guestData['enc_email']).' Subject: '.$text);
				}

				unset($pageoutput);
				unset($guestData['enc_email']);
			}
		}
		if (!empty($tobereminded)) {
			$query="UPDATE #__jomres_contracts SET `cot_required`='1' WHERE contract_uid IN (".jomres_implode($tobereminded).") ";
			if (!doInsertSql($query,""))
				trigger_error ("Unable to update payment reminder data, mysql db failure", E_USER_ERROR);
			}
		}
	
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}		
	}
