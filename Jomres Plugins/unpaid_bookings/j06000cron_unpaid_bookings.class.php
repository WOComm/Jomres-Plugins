<?php
/**
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @author Aladar Barthi <sales@jomres-extras.com>
* @copyright 2009-2010 Aladar Barthi
**/
// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class j06000cron_unpaid_bookings
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

		$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
		$jrConfig = $siteConfig->get();

		if ($jrConfig['unpaid_b_enabled'] != '1') {
			return;
		}

		$days_set = (int)$jrConfig['unpaid_b_days'];
		$delete_or_cancel = (int)$jrConfig['unpaid_b_delete'];

		$query="SELECT contract_uid,guest_uid,property_uid FROM #__jomres_contracts WHERE `deposit_paid` = 0 AND `cancelled` = 0 AND `timestamp` IS NOT NULL AND `tag` IS NOT NULL AND `booked_in` = 0 AND `booked_out` = 0 AND DATEDIFF(DATE_FORMAT(NOW(), '%Y-%m-%d'), DATE_FORMAT(`timestamp`, '%Y-%m-%d')) >= ".$days_set." AND DATEDIFF(DATE_FORMAT(NOW(), '%Y-%m-%d'), DATE_FORMAT(`timestamp`, '%Y-%m-%d')) <= ".($days_set+1)." ";
		$provisionalBookingsList=doSelectSql($query);

		$tobedeleted=array();

		if (!empty($provisionalBookingsList))
			{
			foreach ($provisionalBookingsList as $k)
				{
				$tobedeleted[]=$k->contract_uid;
				$cuid=$k->contract_uid;
				$guid=$k->guest_uid;
				$puid=$k->property_uid;

				$mrConfig=getPropertySpecificSettings($puid);

				$queryguest="SELECT email,firstname,surname FROM #__jomres_guests WHERE guests_uid = ".(int)$guid." LIMIT 1";
				$guestData=doSelectSql($queryguest,2);

				$queryproperty="SELECT property_name,property_town,property_email FROM #__jomres_propertys WHERE propertys_uid = ".(int)$puid." LIMIT 1";
				$propertyData=doSelectSql($queryproperty,2);

				$queryoutput="SELECT arrival,departure,contract_total FROM #__jomres_contracts WHERE contract_uid = '".(int)$cuid."' LIMIT 1 ";
				$bData=doSelectSql($queryoutput,2);

				$arr=$bData['arrival'];
				$dep=$bData['departure'];
				$tot=$bData['contract_total'];

				$saveMessage=jr_gettext('_JRPORTAL_UNPAID_BOOKINGS_EMAIL_TITLE','_JRPORTAL_UNPAID_BOOKINGS_EMAIL_TITLE',FALSE);
				$output['ARRIVAL']=$arr;
				$output['DEPARTURE']=$dep;
				$output['TOTAL']=$mrConfig['currencyCode']." ".number_format($tot,2);

				$output['HARRIVAL']=jr_gettext('_JOMRES_COM_MR_VIEWBOOKINGS_ARRIVAL','_JOMRES_COM_MR_VIEWBOOKINGS_ARRIVAL',FALSE);
				$output['HDEPARTURE']=jr_gettext('_JOMRES_COM_MR_VIEWBOOKINGS_DEPARTURE','_JOMRES_COM_MR_VIEWBOOKINGS_DEPARTURE',FALSE);
				$output['HTOTAL']=jr_gettext('_JOMRES_COM_MR_EB_PAYM_CONTRACT_TOTAL','_JOMRES_COM_MR_EB_PAYM_CONTRACT_TOTAL',FALSE);

				$output['DEAR']=jr_gettext('_JOMRES_COM_CONFIRMATION_DEAR','_JOMRES_COM_CONFIRMATION_DEAR',FALSE);
				$output['GUESTFIRSTNAME']=$guestData['firstname'];
				$output['GUESTLASTNAME']=$guestData['surname'];
				$output['BODY1']=jr_gettext('_JOMRES_EMAIL_CANCEL_BOOKING_MSGBODY1','_JOMRES_EMAIL_CANCEL_BOOKING_MSGBODY1',FALSE);
				$output['BODY2']=jr_gettext('_JOMRES_EMAIL_CANCEL_BOOKING_MSGBODY2','_JOMRES_EMAIL_CANCEL_BOOKING_MSGBODY2',FALSE);

				$pageoutput[]=$output;
				$tmpl = new patTemplate();
				$tmpl->setRoot( $ePointFilepath.JRDS.'templates'.JRDS.find_plugin_template_directory() );
				$tmpl->readTemplatesFromInput( 'unpaid_bookings_email.html');
				$tmpl->addRows( 'pageoutput',$pageoutput);

				$text=$tmpl->getParsedTemplate();

				if (!jomresMailer( $guestData['email'], $propertyData['property_name'].' - '.$propertyData['property_town'], $propertyData['property_email'], "(Copy of) ".$saveMessage, $text,$mode=1))
				error_logging('Failure in sending cancellation email to hotel. Target address: '.$propertyData['property_email'].' Subject: '.$text);
				if (!jomresMailer( $propertyData['property_email'], $propertyData['property_name'].' - '.$propertyData['property_town'], $guestData['email'], $saveMessage, $text,$mode=1))
				error_logging('Failure in sending cancellation email to guest. Target address: '.$guestData['email'].' Subject: '.$text);
				unset($pageoutput);
				unset($guestData['email']);
				}
			}

		if (!empty($tobedeleted))
			{
			$reason="Cancelled by cron";

			$tobedeletedList = jomres_implode($tobedeleted);

			if ($delete_or_cancel == 0)
				{
				$query="UPDATE #__jomres_contracts SET `cancelled`='1', `cancelled_timestamp`='".date( 'Y-m-d H:i:s' )."', `cancelled_reason`='".$reason."' WHERE contract_uid IN (".$tobedeletedList.") ";
				if (!doInsertSql($query,""))
					trigger_error ("Unable to update cancellations data for contract".$tobedeletedList.", mysql db failure", E_USER_ERROR);
				$query="UPDATE #__jomresportal_invoices SET `status`= 2 WHERE contract_id IN (".$tobedeletedList.") ";
				if (!doInsertSql($query,""))
					trigger_error ("Unable to update cancellations data for invoice".$tobedeletedList.", mysql db failure", E_USER_ERROR);
				}
			else {
				$query="DELETE FROM #__jomres_contracts WHERE contract_uid IN (".$tobedeletedList.") ";
				if (!doInsertSql($query,""))
					trigger_error ("Unable to delete from contracts table, mysql db failure", E_USER_ERROR);
				$query="DELETE FROM #__jomresportal_invoices WHERE contract_id IN (".$tobedeletedList.") ";
				if (!doInsertSql($query,""))
					trigger_error ("Unable to delete from invoices table, mysql db failure", E_USER_ERROR);
				$query="DELETE FROM #__jomresportal_bookings WHERE contract_id IN (".$tobedeletedList.") ";
				if (!doInsertSql($query,""))
					trigger_error ("Unable to delete from jomresportal bookings table, mysql db failure", E_USER_ERROR);
				}
			$query="DELETE FROM #__jomres_room_bookings WHERE contract_uid IN (".$tobedeletedList.") ";
			if (!doInsertSql($query,""))
				trigger_error ("Unable to delete from room bookings table, mysql db failure", E_USER_ERROR);
			}
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
