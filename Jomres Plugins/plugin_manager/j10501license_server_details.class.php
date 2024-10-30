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

class j10501license_server_details
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

		$configurationPanel->startPanel(' License server details ');
	

		$configurationPanel->setleft( 'License server username' );
		$configurationPanel->setmiddle( '<input type="text" class="input-mini" name="cfg_license_server_username" value="' . $jrConfig[ 'license_server_username' ] . '" />' );
		$configurationPanel->setright( '' );
		$configurationPanel->insertSetting();
		
		$configurationPanel->setleft( 'License server password');
		$configurationPanel->setmiddle( '<input type="text" class="input-mini" name="cfg_license_server_password" value="' . $jrConfig[ 'license_server_password' ] . '" />' );
		$configurationPanel->setright( '' );
		$configurationPanel->insertSetting();
	
		$configurationPanel->endPanel();
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
