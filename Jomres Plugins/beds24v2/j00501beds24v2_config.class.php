<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2015 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( 'Direct Access to this file is not allowed.' );
// ################################################################

class j00501beds24v2_config{

	function __construct($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if($MiniComponents->template_touch )
			{
			$this->template_touchable = false;
			return;
			}
		$mrConfig=getPropertySpecificSettings();
		if (get_showtime('is_jintour_property'))
			return;

        $beds24v2_properties = jomres_singleton_abstract::getInstance('beds24v2_properties');

        $property_uid = get_showtime('property_uid');
        if ( $beds24v2_properties->is_this_a_beds24_property( $property_uid ) )  {
            $configurationPanel=$componentArgs['configurationPanel'];
            
            $yesno = array();
            $yesno[] = jomresHTML::makeOption( '0', jr_gettext('_JOMRES_COM_MR_NO','_JOMRES_COM_MR_NO') );
            $yesno[] = jomresHTML::makeOption( '1', jr_gettext('_JOMRES_COM_MR_YES','_JOMRES_COM_MR_YES') );
        
            if (!isset($mrConfig['beds24_update_prices']))
                $mrConfig['beds24_update_prices'] = "1";
            
            if (!isset($mrConfig['beds24_anonymise_guests']))
                $mrConfig['beds24_anonymise_guests'] = "1";
			
            $lists = array();
            $lists['beds24_update_prices'] = jomresHTML::selectList( $yesno, 'cfg_beds24_update_prices', '', 'value', 'text', $mrConfig['beds24_update_prices'] );
			$lists['beds24_anonymise_guests'] = jomresHTML::selectList( $yesno, 'cfg_beds24_anonymise_guests', '', 'value', 'text', $mrConfig['beds24_anonymise_guests'] );
            
            $configurationPanel->startPanel(jr_gettext('BEDS24V2_CHANNEL_MANAGEMENT','BEDS24V2_CHANNEL_MANAGEMENT',false,false));

            $configurationPanel->setleft(jr_gettext('_BEDS24_CHANNEL_MANAGEMENT_UPDATE_PRICING_YESNO','_BEDS24_CHANNEL_MANAGEMENT_UPDATE_PRICING_YESNO',false,false));
            $configurationPanel->setmiddle($lists['beds24_update_prices']);
            $configurationPanel->setright(jr_gettext('_BEDS24_CHANNEL_MANAGEMENT_UPDATE_PRICING_YESNO_DESC','_BEDS24_CHANNEL_MANAGEMENT_UPDATE_PRICING_YESNO_DESC',false,false));
            $configurationPanel->insertSetting();
			
            $configurationPanel->setleft(jr_gettext('BEDS24V2_GDPR_ANONYMISE_GUESTS','BEDS24V2_GDPR_ANONYMISE_GUESTS',false,false));
            $configurationPanel->setmiddle($lists['beds24_anonymise_guests']);
            $configurationPanel->setright(jr_gettext('BEDS24V2_GDPR_ANONYMISE_GUESTS_DESC','BEDS24V2_GDPR_ANONYMISE_GUESTS_DESC',false,false));
            $configurationPanel->insertSetting();

            $configurationPanel->endPanel();
        }
	}

	/**
	#
	 * Must be included in every mini-component
	#
	 * Returns any settings the the mini-component wants to send back to the calling script. In addition to being returned to the calling script they are put into an array in the mcHandler object as eg. $mcHandler->miniComponentData[$ePoint][$eName]
	#
	 */
	// This must be included in every Event/Mini-component
	function getRetVals(){
		return null;
	}
}
