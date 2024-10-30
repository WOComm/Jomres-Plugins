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

class j06002get_target_room_types
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
		
		$property_uid = jomresGetParam( $_REQUEST, 'property_uid', 0 ) ;
		$thisJRUser = jomres_singleton_abstract::getInstance( 'jr_user' );
		
		if ($property_uid ==0 || !in_array( $property_uid, $thisJRUser->authorisedProperties ) )
			{
			return;
			}

		$current_property_details = jomres_singleton_abstract::getInstance( 'basic_property_details' );
		$current_property_details->gather_data($property_uid);
		$current_room_types_for_this_property = $current_property_details->room_types;
		
		
		
		
		$options[ ] = jomresHTML::makeOption( '', '');
		foreach ($current_room_types_for_this_property as $key=>$room_type)
			{
			$options[ ] = jomresHTML::makeOption( $key , $room_type['abbv']);
			}
		
		echo jomresHTML::selectList( $options, "target_property_room_type", '   ', 'value', 'text', '' , false );
		
		}


	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
