<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 *  @version Jomres 10.4.0 (Platty Joobs edition)
 *
 * @copyright	2005-2022 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/

// ################################################################
defined('_JOMRES_INITCHECK') or die('');
// ################################################################
	
	/**
	 * @package Jomres\Core\Minicomponents
	 *
	 * 
	 */

class j10501nbe_booking_form
{	
	/**
	 *
	 * Constructor
	 * 
	 * Main functionality of the Minicomponent 
	 *
	 * 
	 * 
	 */
	 
	public function __construct($componentArgs)
	{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance('mcHandler');
		if ($MiniComponents->template_touch) {
			$this->template_touchable = false;

			return;
		}

		$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
		$jrConfig = $siteConfig->get();

		$configurationPanel = $componentArgs[ 'configurationPanel' ];

		if (!isset($jrConfig['nbe_booking_form_override_local_form'])) {
			$jrConfig['nbe_booking_form_override_local_form'] = false;
		}

		$yesno = array();
		$yesno[] = jomresHTML::makeOption( '0', jr_gettext("_JOMRES_COM_MR_NO",'_JOMRES_COM_MR_NO',false) );
		$yesno[] = jomresHTML::makeOption( '1', jr_gettext("_JOMRES_COM_MR_YES",'_JOMRES_COM_MR_YES',false) );


		$configurationPanel->startPanel('New Booking Engine');

		$configurationPanel->setleft('Override Core Booking forms?');
		$configurationPanel->setmiddle( jomresHTML::selectList( $yesno, 'cfg_nbe_booking_form_override_local_form', 'class="inputbox" size="1"', 'value', 'text', $jrConfig['nbe_booking_form_override_local_form'] ) );
		$configurationPanel->setright('');
		$configurationPanel->insertSetting();

		$configurationPanel->endPanel();
	}


	public function getRetVals()
	{
		return null;
	}
}
