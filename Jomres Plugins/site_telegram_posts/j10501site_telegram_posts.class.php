<?php
	/**
	 * Core plugin.
	 *
	 * @author Vince Wooll <sales@jomres.net>
	 *
	 *  @version Jomres 10.7.2
	 *
	 * @copyright	2005-2023 Vince Wooll
	 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
	 **/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( 'Direct Access to this file is not allowed.' );
// ################################################################

class j10501site_telegram_posts
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

		$configurationPanel->startPanel( jr_gettext('SITE_TELEGRAM_BOT','SITE_TELEGRAM_BOT',false,false) );
	

		$configurationPanel->setleft( jr_gettext('SITE_TELEGRAM_BOT','SITE_TELEGRAM_BOT',false,false) );
		$configurationPanel->setmiddle( '<input type="text" class="input-mini" name="cfg_site_telegram_token" value="' . $jrConfig[ 'site_telegram_token' ] . '" />' );
		$configurationPanel->setright( jr_gettext('SITE_TELEGRAM_BOT_INFO','SITE_TELEGRAM_BOT_INFO',false,false) );
		$configurationPanel->insertSetting();
		
		$configurationPanel->setleft( jr_gettext('SITE_TELEGRAM_BOT_CHANNEL_ID','SITE_TELEGRAM_BOT_CHANNEL_ID',false,false) );
		$configurationPanel->setmiddle( '<input type="text" class="input-mini" name="cfg_site_telegram_chat_id" value="' . $jrConfig[ 'site_telegram_chat_id' ] . '" />' );
		$configurationPanel->setright( jr_gettext('SITE_TELEGRAM_BOT_CHANNEL_ID_DESC','SITE_TELEGRAM_BOT_CHANNEL_ID_DESC',false,false) );
		$configurationPanel->insertSetting();
	
		$configurationPanel->endPanel();
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
