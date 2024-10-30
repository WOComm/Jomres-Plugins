<?php
/**
 * Core file
 *
 * @author Vince Wooll <sales@jomres.net>
 * @version Jomres 9
 * @package Jomres
 * @copyright	2005-2016 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly.
 **/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class j10527quick_register
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
		
		if (!isset($jrConfig[ 'quick_register_show_in_frontend' ]))
			$jrConfig[ 'quick_register_show_in_frontend' ] = "1";
		
		$yesno    = array ();
		$yesno[ ] = jomresHTML::makeOption( '0', jr_gettext( '_JOMRES_COM_MR_NO', '_JOMRES_COM_MR_NO', false ) );
		$yesno[ ] = jomresHTML::makeOption( '1', jr_gettext( '_JOMRES_COM_MR_YES', '_JOMRES_COM_MR_YES', false ) );
		
		$dropdown = jomresHTML::selectList( $yesno, 'cfg_quick_register_show_in_frontend', 'class="inputbox" size="1"', 'value', 'text', $jrConfig[ 'quick_register_show_in_frontend' ] );

		$configurationPanel->insertHeading( jr_gettext( "QUICK_REGISTER_TITLE", 'QUICK_REGISTER_TITLE', false ) );
		
		$configurationPanel->setleft( jr_gettext( 'QUICK_REGISTER_CONFIG_TITLE', 'QUICK_REGISTER_CONFIG_TITLE', false ) );
		$configurationPanel->setmiddle( $dropdown );
		$configurationPanel->setright( jr_gettext( 'QUICK_REGISTER_CONFIG_DESC', 'QUICK_REGISTER_CONFIG_DESC', false ) );
		$configurationPanel->insertSetting();
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
