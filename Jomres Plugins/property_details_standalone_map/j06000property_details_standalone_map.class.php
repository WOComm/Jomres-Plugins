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

class j06000property_details_standalone_map
	{
	function __construct( $componentArgs )
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch )
			{
			$this->template_touchable = false;
			$this->shortcode_data = array (
				"task" => "property_details_standalone_map",
				"info" => "_JOMRES_SHORTCODES_06000PROPERTY_DETAILS_STANDALONE_MAP",
                'arguments' => array(
					0 => array(
                        'argument' => 'mapwidth',
                        'arg_info' => '_JOMRES_SHORTCODES_06000PROPERTY_DETAILS_STANDALONE_MAP_ARG_MAPWIDTH',
                        'arg_example' => '100'
                        ),
					1 => array(
                        'argument' => 'mapheight',
                        'arg_info' => '_JOMRES_SHORTCODES_06000PROPERTY_DETAILS_STANDALONE_MAP_ARG_MPAHEIGHT',
                        'arg_example' => '100'
                        ),
                    )
				);
			return;
			}
		
		$ePointFilepath = get_showtime('ePointFilepath');
		$this->retVals	= '';
		
		$output		= array();
		$pageoutput	= array();
		
		$property_uid = (int) $componentArgs[ 'property_uid' ];
		$featureList  = array ();
		if ( !isset( $property_uid ) || empty( $property_uid ) ) 
			$property_uid = intval( jomresGetParam( $_REQUEST, 'property_uid', 0 ) );
		
		$task = jomresGetParam($_REQUEST, 'task', '');
		
		if ( $property_uid > 0 && $task == "viewproperty")
			{
			if (isset($_REQUEST['mapwidth']))
				$mapwidth = intval( jomresGetParam( $_REQUEST, 'mapwidth', 0 ) );
			else
				$mapwidth  = "119";
				
			if (isset($_REQUEST['mapheight']))
				$mapheight = intval( jomresGetParam( $_REQUEST, 'mapheight', 0 ) );
			else
				$mapheight  = "95";

			$args = array ( 'property_uid' => $property_uid, "width" => $mapwidth, "height" => $mapheight, "disable_ui" => false );
			$MiniComponents->specificEvent( '01050', 'x_geocoder', $args );
			echo $MiniComponents->miniComponentData[ '01050' ][ 'x_geocoder' ];
			}
		}


	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return $this->retVals;
		}
	}