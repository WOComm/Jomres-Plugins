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

class j10501subscriptions
	{
	function __construct( $componentArgs )
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch )
			{
			$this->template_touchable = false;

			return;
			}

		$siteConfig         = jomres_singleton_abstract::getInstance( 'jomres_config_site_singleton' );
		$jrConfig           = $siteConfig->get();
		
		$configurationPanel = $componentArgs[ 'configurationPanel' ];
		
		$yesno    = array ();
		$yesno[ ] = jomresHTML::makeOption( '0', jr_gettext( '_JOMRES_COM_MR_NO', '_JOMRES_COM_MR_NO', false ) );
		$yesno[ ] = jomresHTML::makeOption( '1', jr_gettext( '_JOMRES_COM_MR_YES', '_JOMRES_COM_MR_YES', false ) );
		
		$useSubscriptions = jomresHTML::selectList( $yesno, 'cfg_useSubscriptions', ' ', 'value', 'text', (int)$jrConfig[ 'useSubscriptions' ] );
		$subscriptionPackagePriceIncludesTax = jomresHTML::selectList( $yesno, 'cfg_subscriptionPackagePriceIncludesTax', ' ', 'value', 'text', (int)$jrConfig[ 'subscriptionPackagePriceIncludesTax' ] );
		$subscriptionSendReminderEmail = jomresHTML::selectList( $yesno, 'cfg_subscriptionSendReminderEmail', ' ', 'value', 'text', (int)$jrConfig[ 'subscriptionSendReminderEmail' ] );
		$subscriptionSendExpirationEmail = jomresHTML::selectList( $yesno, 'cfg_subscriptionSendExpirationEmail', ' ', 'value', 'text', (int)$jrConfig[ 'subscriptionSendExpirationEmail' ] );
		
		if (!isset($jrConfig[ 'subscriptionSendReminderEmailDays' ]))
			$jrConfig[ 'subscriptionSendReminderEmailDays' ] = '10';


		$configurationPanel->startPanel( jr_gettext( "_JOMRES_STATUS_SUBSCRIPTIONS", '_JOMRES_STATUS_SUBSCRIPTIONS', false ) );
	
		$configurationPanel->setleft( jr_gettext( '_JRPORTAL_SUBSCRIPTIONS_USE', '_JRPORTAL_SUBSCRIPTIONS_USE', false ) );
		$configurationPanel->setmiddle( $useSubscriptions );
		$configurationPanel->setright();
		$configurationPanel->insertSetting();
		
		$configurationPanel->setleft( jr_gettext( '_JOMRES_COM_A_TAXINCLUSIVE', '_JOMRES_COM_A_TAXINCLUSIVE', false ) );
		$configurationPanel->setmiddle( $subscriptionPackagePriceIncludesTax );
		$configurationPanel->setright( jr_gettext( '_JOMRES_COM_A_TAXINCLUSIVE_DESC', '_JOMRES_COM_A_TAXINCLUSIVE_DESC', false ) );
		$configurationPanel->insertSetting();
		
		/*$configurationPanel->setleft( jr_gettext( '_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_TITLE', '_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_TITLE', false ) );
		$configurationPanel->setmiddle( $subscriptionSendReminderEmail );
		$configurationPanel->setright();
		$configurationPanel->insertSetting();
		
		$configurationPanel->setleft( jr_gettext( '_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_DAYS_A', '_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_DAYS_A', false ) );
		$configurationPanel->setmiddle( '<input type="text" class="input-mini" name="cfg_subscriptionSendReminderEmailDays" value="' . $jrConfig[ 'subscriptionSendReminderEmailDays' ] . '" />' );
		$configurationPanel->setright( jr_gettext( '_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_DAYS_B', '_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_DAYS_B', false ) );
		$configurationPanel->insertSetting();
		
		$configurationPanel->setleft( jr_gettext( '_SUBSCRIPTIONS_SEND_EXPIRATION_EMAIL_TITLE', '_SUBSCRIPTIONS_SEND_EXPIRATION_EMAIL_TITLE', false ) );
		$configurationPanel->setmiddle( $subscriptionSendExpirationEmail );
		$configurationPanel->setright();
		$configurationPanel->insertSetting();*/
	
		$configurationPanel->endPanel();
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
