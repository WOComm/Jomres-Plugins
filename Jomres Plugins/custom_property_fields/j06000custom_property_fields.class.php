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

class j06000custom_property_fields
	{
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false;
			$this->shortcode_data = array (
				"task" => "custom_property_fields",
				"info" => "Custom Property Fields",
				'arguments' => array(
					0 => array(
						'argument' => 'property_uid',
						'arg_info' => 'Property UID',
						'arg_example' => 'prefilter_country_code=GB'
					)
				)
			);
			return;
			}

		// To display custom property field data in a template other than the defaults you can add the following to a Jomres template
		// {jomres_script custom_property_fields PROPERTY_UID=N }

		$property_uid = (int)$_REQUEST['property_uid'];

		$result = $MiniComponents->specificEvent(
			'01012', 
			'custom_property_fields', 
				array(
					'output_now' => false, 
					'property_uids' => array ($property_uid)
					)
				);
		$relevant_properties = get_showtime( 'propertylist_custompropertyfields' );
		if ( array_key_exists( $property_uid, $relevant_properties ) ) {
			echo  $relevant_properties[ $property_uid ] ;
			}
		}


	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
