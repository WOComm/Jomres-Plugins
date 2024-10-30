<?php
/**
 * Core file
 *
 * @author Vince Wooll <sales@jomres.net>
 * @version Jomres 9.x
 * @package Jomres
 * @copyright	2005-2017 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly.
 **/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class j06001widget_jintour
	{
	function __construct($componentArgs)
		{
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch )
			{
			$this->template_touchable = false; return;
			}
		$ePointFilepath = get_showtime('ePointFilepath');
		$this->retVals = '';
		
		if (isset($componentArgs[ 'output_now' ]))
			$output_now = $componentArgs[ 'output_now' ];
		else
			$output_now = true;

		if (isset($componentArgs[ 'property_uid' ])) {
			$property_uid = $componentArgs[ 'property_uid' ];
		}
		
		
		if ( !isset($property_uid) || (int)$property_uid == 0 ) 
			$property_uid = getDefaultProperty();
		
		$thisJRUser = jomres_singleton_abstract::getInstance( 'jr_user' );
		if ( !in_array( $property_uid, $thisJRUser->authorisedProperties ) ) 
			return;
		
		$mrConfig = getPropertySpecificSettings( $property_uid );
		if ( $mrConfig[ 'is_real_estate_listing' ] == 1 ) 
			return;

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
			$this->retVals = $MiniComponents->specificEvent('06002','jintour_manager_list_tours', array ("tours"=> $future_tours , 'output_now' => false ) );
		
		if($output_now)
			echo $this->retVals;
		}



	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return $this->retVals;
		}
	}