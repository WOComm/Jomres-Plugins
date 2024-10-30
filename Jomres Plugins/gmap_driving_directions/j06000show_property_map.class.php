<?php
/**
 * Core file
 *
 * @author Vince Wooll <sales@jomres.net>
 * @version Jomres 8
 * @package Jomres
 * @copyright	2005-2015 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly.
 **/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class j06000show_property_map
	{
	function __construct( $componentArgs )
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch )
			{
			$this->template_touchable = false;
			$this->shortcode_data = array (
				"task" => "show_property_map",
				"info" => "_JOMRES_SHORTCODES_06000SHOW_PROPERTY_MAP",
				"arguments" => array ( 0 => 
					array (
						"argument" => "property_uid",
						"arg_info" => "_JOMRES_SHORTCODES_06000SHOW_PROPERTY_MAP_ARG_PROPERTY_UID",
						"arg_example" => "1",
						)
					)
				);
			return;
			}

		$this->retVals= '';
		
		if (isset($componentArgs[ 'property_uid' ])) {
            $property_uid = (int)$componentArgs[ 'property_uid' ];
        } else {
			$property_uid = (int)jomresGetParam($_REQUEST, 'property_uid', 0);
        }
		
		if ($property_uid == 0) {
            return;
        }
		
		if (isset($componentArgs[ 'output_now' ]))
			$output_now = $componentArgs[ 'output_now' ];
		else
			$output_now = true;

		$current_property_details = jomres_singleton_abstract::getInstance( 'basic_property_details' );
		$current_property_details->gather_data( $property_uid );
		
		if ($current_property_details->published == 0)
			return;
		
		$mrConfig      = getPropertySpecificSettings( $property_uid );

		$mw       = 600;
		$mh       = 600;
		if ( isset( $_REQUEST[ 'property_uid' ] ) )
			{
			if ( isset( $_REQUEST[ 'mw' ] ) ) $mw = (int) $_REQUEST[ 'mw' ];
			if ( isset( $_REQUEST[ 'mh' ] ) ) $mh = (int) $_REQUEST[ 'mh' ];
			if ( isset( $_REQUEST[ 'output_now' ] ) ) $output_now = (bool)jomresGetParam($_REQUEST, 'output_now', 1);
			}
		else
			{
			if ( isset( $componentArgs[ 'mw' ] ) ) $mw = (int) $componentArgs[ 'mw' ];
			if ( isset( $componentArgs[ 'mh' ] ) ) $mh = (int) $componentArgs[ 'mh' ];
			if ( isset( $componentArgs[ 'output_now' ] ) ) $output_now = (bool) $componentArgs[ 'output_now' ];
			}

		$componentArgs = array ( 'property_uid' => $property_uid, "width" => $mw, "height" => $mh );
		$MiniComponents->specificEvent( '01050', 'je_x_geocoder', $componentArgs );

		if ( $output_now )
			echo $MiniComponents->miniComponentData[ '01050' ][ 'je_x_geocoder' ];
		else
			$this->retVals = $MiniComponents->miniComponentData[ '01050' ][ 'je_x_geocoder' ];
		}


	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return $this->retVals;
		}
	}
