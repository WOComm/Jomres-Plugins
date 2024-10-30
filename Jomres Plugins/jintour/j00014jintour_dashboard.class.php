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

class j00014jintour_dashboard {
	function __construct($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$ePointFilepath = get_showtime('ePointFilepath');
		
		$property_uid = $componentArgs[ 'property_uid' ];
		if ( (int)$property_uid == 0 ) 
			$property_uid = getDefaultProperty();
		
		$thisJRUser = jomres_singleton_abstract::getInstance( 'jr_user' );
		if ( !in_array( $property_uid, $thisJRUser->authorisedProperties ) ) 
			return;
		
		$mrConfig = getPropertySpecificSettings( $property_uid );
		if ( $mrConfig[ 'is_real_estate_listing' ] == 1 ) 
			return;
		
		$siteConfig = jomres_singleton_abstract::getInstance( 'jomres_config_site_singleton' );
		$jrConfig   = $siteConfig->get();
		
		$output=array();
		$pageoutput=array();
		
		include_once($ePointFilepath."functions.php");
		$tours = jintour_get_all_tours($property_uid);
		
		$future_tours = array();
		$today = date("Y/m/d");
		foreach ( $tours as $tour )
			{
			$tempArr=explode('-', $tour['tourdate']);
			$tourdate = date("Y/m/d", mktime(0, 0, 0, $tempArr[1], $tempArr[2], $tempArr[0]));
			if(strtotime($today)<strtotime($tourdate))
				$future_tours[]=$tour;
			}
		
		if (!empty($future_tours))
			$MiniComponents->specificEvent('06002','jintour_manager_list_tours', array ("tours"=> $future_tours) );
		
		}

	/**
	#
	 * Must be included in every mini-component
	#
	 */
	function getRetVals()
		{
		return null;
		}
	}
