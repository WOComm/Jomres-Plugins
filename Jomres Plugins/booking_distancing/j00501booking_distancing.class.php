<?php
/**
 * Core file
 *
 * @author Vince Wooll <sales@jomres.net>
 * @version Jomres 8
 * @package Jomres
 * @copyright	2005-2015 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly.
 **/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class j00501booking_distancing
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
		
		$ePointFilepath = get_showtime('ePointFilepath');


		$mrConfig = getPropertySpecificSettings();
		
		if ( $mrConfig[ 'is_real_estate_listing' ] == 1 ) 
			return;
		
		$configurationPanel = $componentArgs[ 'configurationPanel' ];


		if (!isset( $mrConfig[ 'qblock_enabled' ] )) {
			$mrConfig[ 'qblock_enabled' ] = 0;
		}

		if (!isset( $mrConfig[ 'qblock_days' ] )) {
			$mrConfig[ 'qblock_days' ] = 1;
		}

		$yesno = array();
		$yesno[] = jomresHTML::makeOption( '0', jr_gettext('_JOMRES_COM_MR_NO','_JOMRES_COM_MR_NO',false) );
		$yesno[] = jomresHTML::makeOption( '1', jr_gettext('_JOMRES_COM_MR_YES','_JOMRES_COM_MR_YES',false) );

		$enabled_dropdown = jomresHTML::selectList( $yesno, 'cfg_qblock_enabled', 'class="inputbox" size="1"', 'value', 'text', $mrConfig[ 'qblock_enabled' ]  );

		$days_dropdown = jomresHTML::integerSelectList( 1,7 ,1, 'cfg_qblock_days','', $mrConfig[ 'qblock_days' ] );

		$configurationPanel->startPanel( jr_gettext( "_JOMRES_QBLOCK_TITLE", '_JOMRES_QBLOCK_TITLE', false ) );
		
		$configurationPanel->setleft( jr_gettext( "_JOMRES_QBLOCK_SETTING", '_JOMRES_QBLOCK_SETTING', false ) );
		$configurationPanel->setmiddle( $enabled_dropdown );
		$configurationPanel->setright( jr_gettext( "_JOMRES_QBLOCK_DESCRIPTION", '_JOMRES_QBLOCK_DESCRIPTION', false ));
		$configurationPanel->insertSetting();

		$configurationPanel->setleft( jr_gettext( "_JOMRES_QBLOCK_DAYS", '_JOMRES_QBLOCK_DAYS', false ) );
		$configurationPanel->setmiddle( $days_dropdown );
		$configurationPanel->setright( jr_gettext( "_JOMRES_QBLOCK_DAYS_DESC", '_JOMRES_QBLOCK_DAYS_DESC', false ) );
		$configurationPanel->insertSetting();

		$configurationPanel->endPanel();
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
