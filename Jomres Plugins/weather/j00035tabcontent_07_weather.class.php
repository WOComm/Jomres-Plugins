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

class j00035tabcontent_07_weather
	{
	function __construct( $componentArgs )
		{
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch )
			{
			$this->template_touchable = false;
			return;
			}
		
		$this->retVals ='';
		
		$siteConfig	= jomres_singleton_abstract::getInstance( 'jomres_config_site_singleton' );
		$jrConfig = $siteConfig->get();
		
		if (!isset($jrConfig['openweather_apikey']) || trim($jrConfig['openweather_apikey']) == '') {
			return;
		}
		
		$tab_title = jr_gettext( '_CURRENT_WEATHER', '_CURRENT_WEATHER', false, false );
		
		$anchor = jomres_generate_tab_anchor( $tab_title );
		
		$componentArgs[ 'output_now' ] = false;
		
		$tab = array ( 
					  "TAB_ANCHOR" => $anchor, 
					  "TAB_TITLE" => $tab_title, 
					  "TAB_CONTENT" => $MiniComponents->specificEvent( '06000', 'show_property_weather',$componentArgs) , 
					  "TAB_ID" => 'current_weather' 
					  );
		$this->retVals = $tab;
		
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return $this->retVals;
		}

	}
