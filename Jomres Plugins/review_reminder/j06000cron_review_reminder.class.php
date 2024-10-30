<?php
/**
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @author Aladar Barthi <sales@jomres-extras.com>
* @copyright 2009-2011 Aladar Barthi
**/
// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class j06000cron_review_reminder
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
			
		if ($jrConfig['r_reminder_enabled'] != '1') {
			return;
		}
			
		$days_set = (int)$jrConfig['r_reminder_days'];
			
		$query="SELECT contract_uid,guest_uid,property_uid FROM #__jomres_contracts WHERE `cancelled` = 0 AND `timestamp` IS NOT NULL AND `tag` IS NOT NULL AND `currency` IS NULL AND DATEDIFF(DATE_FORMAT(NOW(), '%Y-%m-%d'), DATE_FORMAT(`departure`, '%Y-%m-%d')) >= ".$days_set." AND DATEDIFF(DATE_FORMAT(NOW(), '%Y-%m-%d'), DATE_FORMAT(`departure`, '%Y-%m-%d')) <= ".($days_set+1)." ";
		$bookingsList=doSelectSql($query);
		
		$tobereviewed=array();

		if (!empty($bookingsList)) {
			foreach ($bookingsList as $k) {
				$tobereviewed[]=$k->contract_uid;
				$cuid=$k->contract_uid;
				$guid=$k->guest_uid;
				$puid=$k->property_uid;
					
				$query="SELECT enc_email,enc_firstname,enc_surname FROM #__jomres_guests WHERE guests_uid = ".(int)$guid." LIMIT 1";
				$guestData=doSelectSql($query,2);
					
				$query="SELECT property_name, property_town,property_email FROM #__jomres_propertys WHERE propertys_uid = ".(int)$puid." LIMIT 1";
				$propertyData=doSelectSql($query,2);
				
				$saveMessage=jr_gettext('_JOMRES_REVIEW_REMINDER_EMAIL_TITLE','_JOMRES_REVIEW_REMINDER_EMAIL_TITLE',FALSE).getPropertyName($puid);
				$output['DEAR']=jr_gettext('_JOMRES_COM_CONFIRMATION_DEAR','_JOMRES_COM_CONFIRMATION_DEAR',FALSE);
				$output['GUESTFIRSTNAME']=$this->jomres_encryption->decrypt($guestData['enc_firstname']);
				$output['GUESTLASTNAME']=$this->jomres_encryption->decrypt($guestData['enc_surname']);
				$output['MESSAGE']=jr_gettext('_JOMRES_REVIEW_REMINDER_EMAIL_MSGBODY1','_JOMRES_REVIEW_REMINDER_EMAIL_MSGBODY1',FALSE,FALSE).'<a href="'.get_showtime( 'live_site' ).'/index.php?option=com_jomres&task=show_property_reviews&property_uid='.$puid.'">'.jr_gettext('_JOMRES_REVIEW_REMINDER_EMAIL_LINK_TITLE','_JOMRES_REVIEW_REMINDER_EMAIL_LINK_TITLE',FALSE,FALSE).'</a>'.jr_gettext('_JOMRES_REVIEW_REMINDER_EMAIL_MSGBODY2','_JOMRES_REVIEW_REMINDER_EMAIL_MSGBODY2',FALSE,FALSE);

				$pageoutput[]=$output;
				$tmpl = new patTemplate();
				$tmpl->setRoot( $ePointFilepath.JRDS.'templates'.JRDS.find_plugin_template_directory() );
				$tmpl->readTemplatesFromInput( 'review_reminder_email.html');
				$tmpl->addRows( 'pageoutput',$pageoutput);
				$text=$tmpl->getParsedTemplate();
			
					//if (!jomresMailer($guestData['email'], $propertyData['property_name'].' - '.$propertyData['property_town'], $propertyData['property_email'], "(Copy of) ".$saveMessage, $text,$mode=1))
						//error_logging('Failure in sending review reminder email to admin. Target address: '.$propertyData['property_email'].' Subject: '.$text);
				if ($this->jomres_encryption->decrypt($guestData['enc_email'])) {
					if (!jomresMailer( $propertyData['property_email'], $propertyData['property_name'].' - '.$propertyData['property_town'], $this->jomres_encryption->decrypt($guestData['enc_email']), $saveMessage, $text,$mode=1))
						error_logging('Failure in sending review reminder email to guest. Target address: '.$this->jomres_encryption->decrypt($guestData['enc_email']).' Subject: '.$text);
					}
				unset($pageoutput);
				unset($guestData['email']);
				}
			}
			
		if (!empty($tobereviewed)) {
			$query="UPDATE #__jomres_contracts SET `currency` = '1' WHERE contract_uid IN (".jomres_implode($tobereviewed).") ";
			if (!doInsertSql($query,""))
				trigger_error ("Unable to update review reminder data, mysql db failure", E_USER_ERROR);
			}
		}
	
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}		
	}
