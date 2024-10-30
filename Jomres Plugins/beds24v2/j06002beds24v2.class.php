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
class j06002beds24v2
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
		$defaultProperty=getDefaultProperty();
		//$mrConfig = getPropertySpecificSettings($defaultProperty); */
		
		$JRUser									= jomres_singleton_abstract::getInstance( 'jr_user' );
/* 		$query = "SELECT apikey FROM #__jomres_managers WHERE userid = ". $JRUser->userid.' LIMIT 1';
		$apikey = doSelectSql($query,1); */
        

        
        $beds24v2_keys = jomres_singleton_abstract::getInstance('beds24v2_keys');
        $manager_key = $beds24v2_keys->get_manager_key($JRUser->userid);

        if (trim($manager_key) == "") {
            jr_import("beds24v2");
            $beds24v2 = new beds24v2();

            $message = jr_gettext("BEDS24V2_ERROR_USER_NO_KEY" , "BEDS24V2_ERROR_USER_NO_KEY" , false );
            echo $beds24v2->output_error($message);
            return;
            }
        
        jr_import("beds24v2_communication");
		$beds24v2_communication = new beds24v2_communication();
        $beds24v2_communication->set_manager_key($manager_key);
        
        $response = $beds24v2_communication->communicate_with_beds24("getAccount");
        $response = json_decode($response);

		if (isset($response->error) ) {
			$MiniComponents->specificEvent('06002', 'beds24v2_not_subscribed');
		} elseif (!isset($response[0]->id) || (int)$response[0]->id == 0 ) {
            $MiniComponents->specificEvent('06002', 'beds24v2_not_subscribed');
            } else {
            $MiniComponents->specificEvent('06002', 'beds24v2_display_properties');
            }
        
		}

	
	

	
	
	
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
