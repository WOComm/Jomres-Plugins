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
class j06002beds24v2_not_subscribed
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

		$JRUser									= jomres_singleton_abstract::getInstance( 'jr_user' );
		$query = "SELECT apikey FROM #__jomres_managers WHERE userid = ". $JRUser->userid.' LIMIT 1';
		$apikey = doSelectSql($query,1);
        
        jr_import("beds24v2");
		$beds24v2 = new beds24v2();
        
        $message = jr_gettext("BEDS24V2_NOT_SUBSCRIBED" , "BEDS24V2_NOT_SUBSCRIBED" , false );
        echo $beds24v2->output_error($message);
      
        $message = jr_gettext("BEDS24V2_WHITELIST_WARNING" , "BEDS24V2_WHITELIST_WARNING" , false ).$_SERVER['SERVER_ADDR'];
        echo $beds24v2->output_error($message);
		
        $message = jr_gettext("BEDS24V2_NOT_SUBSCRIBED_KEY" , "BEDS24V2_NOT_SUBSCRIBED_KEY" , false );
        echo $beds24v2->readonly_form($message , $apikey );
        
        $message = jr_gettext("BEDS24V2_NOT_SUBSCRIBED_RELOAD" , "BEDS24V2_NOT_SUBSCRIBED_RELOAD" , false );
        echo $beds24v2->output_message($message);
        
		
        $button_text = jr_gettext("COMMON_NEXT" , "COMMON_NEXT" , false );
        $url = JOMRES_SITEPAGE_URL.'&task=beds24v2';
        echo $beds24v2->button_link($button_text , $url , 'primary');
		}

	
	

	
	
	
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
