<?php
	/**
	 * Core plugin.
	 *
	 * @author Vince Wooll <sales@jomres.net>
	 *
	 *  @version Jomres 10.7.0
	 *
	 * @copyright	2005-2023 Vince Wooll
	 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
	 **/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( 'Direct Access to this file is not allowed.' );
// ################################################################

class j06000cron_subscriptions_reminder
	{
	function __construct()
		{
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch ) {
			$this->template_touchable = false;
			return;
			}

		jr_import('jomres_encryption');
		$this->jomres_encryption = new jomres_encryption();

		$ePointFilepath = get_showtime('ePointFilepath');

		$siteConfig = jomres_singleton_abstract::getInstance( 'jomres_config_site_singleton' );
		$jrConfig = $siteConfig->get();

		if ( (int)$jrConfig[ 'useSubscriptions' ] != 1 || (int)$jrConfig[ 'subscriptionSendReminderEmail' ] != 1 )
			return;

		if ( (int)$jrConfig[ 'subscriptionSendReminderEmailDays' ] == 0)
			 $jrConfig[ 'subscriptionSendReminderEmailDays' ] = 7;

		$query = "SELECT
						a.`id`,
						a.`cms_user_id`,
						a.`package_id`,
						a.`status`,
						a.`raised_date`,
						a.`expiration_date`,
						b.`enc_firstname`,
						b.`enc_surname`,
						b.`enc_email`
					FROM #__jomresportal_subscriptions a
					LEFT JOIN #__jomres_guest_profile b ON a.`cms_user_id` = b.`cms_user_id`
					WHERE a.`status` = 1
						AND DATEDIFF( DATE_FORMAT(
												 ( SELECT MAX(`expiration_date`)
													FROM #__jomresportal_subscriptions
													WHERE `cms_user_id` = a.`cms_user_id`
														AND `package_id` = a.`package_id`
													)
												 , '%Y-%m-%d') , DATE_FORMAT(NOW(), '%Y-%m-%d') ) = ".(int)$jrConfig[ 'subscriptionSendReminderEmailDays' ]."
					GROUP BY cms_user_id, package_id ";
		$result = doSelectSql( $query );

		if ( !empty($result) ) {
			$output = array();

			$basic_subscription_package_details = jomres_singleton_abstract::getInstance( 'basic_subscription_package_details' );

			$output['DEAR'] = jr_gettext('_JRPORTAL_NEWUSER_DEAR','_JRPORTAL_NEWUSER_DEAR',false);
			$output['EMAIL_TEXT1'] = jr_gettext('_JRPORTAL_SUBSCRIPTION_REMINDER_EMAIL_TEXT1','_JRPORTAL_SUBSCRIPTION_REMINDER_EMAIL_TEXT1',false);
			$output['HLEVEL'] = jr_gettext('_SUBSCRIPTIONS_HPACKAGE_YOUR','_SUBSCRIPTIONS_HPACKAGE_YOUR',false);
			$output['HVALID_FROM'] = jr_gettext('_JOMRES_FRONT_TARIFFS_STARTS','_JOMRES_FRONT_TARIFFS_STARTS',false);
			$output['HVALID_TO'] = jr_gettext('_JOMRES_FRONT_TARIFFS_ENDS','_JOMRES_FRONT_TARIFFS_ENDS',false);

			$email_title = jr_gettext('_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE1','_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE1',false) . get_showtime('sitename') . jr_gettext('_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE2','_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE2',false);

			foreach ($result as $s) {
				//variable email output
				$output['SUBSCRIBER_NAME'] = $this->jomres_encryption->decrypt($s->enc_firstname).' '.$this->jomres_encryption->decrypt($s->enc_surname);
				$output['LEVEL'] = $basic_subscription_package_details->allPackages[$s->package_id]['name'];
				$output['VALID_FROM'] = $s->raised_date;
				$output['VALID_TO'] = $s->expiration_date;

				$pageoutput[]=$output;
				$tmpl = new patTemplate();
				$tmpl->setRoot( $ePointFilepath.JRDS.'templates'.JRDS.find_plugin_template_directory() );
				$tmpl->readTemplatesFromInput( 'email_subscription_expiration.html' );
				$tmpl->addRows( 'pageoutput', $pageoutput );
				$text=$tmpl->getParsedTemplate();

				//send email
				if (!jomresMailer( get_showtime( 'mailfrom' ), get_showtime( 'fromname' ), $this->jomres_encryption->decrypt($s->enc_email), $emailTitle, $text,$mode=1))
					error_logging('Failure in sending subscription expiration reminder email to manager. Target address: '.$this->jomres_encryption->decrypt($s->enc_email).' Subject: '.$emailTitle);
				}
			}
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
