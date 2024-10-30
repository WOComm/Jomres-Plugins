<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2017 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( 'Direct Access to this file is not allowed.' );
// ################################################################
#[AllowDynamicProperties]
class j99994beds24v2_tariff_editing_page
	{
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch )
			{
			$this->template_touchable = false;
			return;
			}
		$ePointFilepath=get_showtime('ePointFilepath');

		if ( jomres_cmsspecific_areweinadminarea() )
			return;

		$JRUser									= jomres_singleton_abstract::getInstance( 'jr_user' );
        if ($JRUser->userid == 0) {
			return;
		}
		
		$property_uid = getDefaultProperty();
		
        $beds24v2_properties = jomres_singleton_abstract::getInstance('beds24v2_properties');
        $beds24v2_properties->set_manager_uid($JRUser->userid);
		$beds24v2_properties->prepare_data();
        $manager_properties = $beds24v2_properties->get_all_assigned_properties($JRUser->userid);
		if (!array_key_exists($property_uid , $manager_properties) ) {
			return;
		}
		
       
        if ( get_showtime("task") == 'list_tariffs_micromanage' ) {
			
			$basic_rate_details = jomres_singleton_abstract::getInstance( 'basic_rate_details' );
			$basic_rate_details->get_rates($property_uid);
			if (empty($basic_rate_details->rates)){ // No tariffs have been created yet
				return;
			}
			
			$redirect_url = jr_base64url_encode(JOMRES_SITEPAGE_URL.'&task=list_tariffs_micromanage');
			$output_now = true;
			$property_uid = getDefaultProperty();
			$componentArgs = array ( "output_now" => $output_now , "jr_redirect_url" => $redirect_url , "property_uid" => $property_uid );
			$MiniComponents->specificEvent('06002', 'beds24v2_build_tariff_export_links' , $componentArgs );
			}
		}

		
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
