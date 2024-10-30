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

class j06000show_room_calendar
	{
	function __construct( $componentArgs )
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch )
			{
			$this->template_touchable = true;
			$this->shortcode_data = array (
				"task" => "show_room_calendar",
				"info" => "_JOMRES_SHORTCODES_06000SHOW_ROOM_CALENDAR",
                'arguments' => array(0 => array(
                        'argument' => 'id',
                        'arg_info' => '_JOMRES_SHORTCODES_06000SHOW_ROOM_CALENDAR_ARG_ROOM_UID',
                        'arg_example' => '54',
                        ),
                    )
				);
			return;
			}

		if (isset($componentArgs[ 'id' ]))
			$room_uid = (int)$componentArgs[ 'id' ];
		else
			$room_uid = (int)jomresGetParam($_REQUEST, 'id', 0);
		
		if ($room_uid == 0) {
			return;
		}

		//get all room details
		$basic_room_details = jomres_singleton_abstract::getInstance( 'basic_room_details' );
		$basic_room_details->get_room($room_uid);

		if ( !empty( $basic_room_details->room ) )
			{
			$property_uid = $basic_room_details->room['propertys_uid'];
			
			$mrConfig = getPropertySpecificSettings($property_uid);

			$MiniComponents->specificEvent('06000', 'srp_calendar', array('output_now' => true, 'property_uid' => $property_uid, 'months_to_show' => 6, 'show_just_month' => false, 'room_uid' => $room_uid));
			}
		}


	function touch_template_language()
		{
		$output = array ();

		$output[ ] = jr_gettext( '_JOMRES_COM_A_BASICTEMPLATE_SHOWROOMS', '_JOMRES_COM_A_BASICTEMPLATE_SHOWROOMS' );
		$output[ ] = jr_gettext( '_JOMRES_COM_A_BASICTEMPLATE_SHOWROOMS_TITLE', '_JOMRES_COM_A_BASICTEMPLATE_SHOWROOMS_TITLE' );
		$output[ ] = jr_gettext( '_JOMRES_COM_MR_VRCT_ROOM_HEADER_NUMBER', '_JOMRES_COM_MR_VRCT_ROOM_HEADER_NUMBER' );
		$output[ ] = jr_gettext( '_JOMRES_COM_MR_VRCT_ROOM_HEADER_TYPE', '_JOMRES_COM_MR_VRCT_ROOM_HEADER_TYPE' );
		$output[ ] = jr_gettext( '_JOMRES_COM_MR_VRCT_ROOM_HEADER_NAME', '_JOMRES_COM_MR_VRCT_ROOM_HEADER_NAME' );
		$output[ ] = jr_gettext( '_JOMRES_FRONT_AVAILABILITY', '_JOMRES_FRONT_AVAILABILITY' );
		$output[ ] = jr_gettext( '_JOMRES_COM_MR_VRCT_ROOM_HEADER_FLOOR', '_JOMRES_COM_MR_VRCT_ROOM_HEADER_FLOOR' );
		$output[ ] = jr_gettext( '_JOMRES_COM_MR_VRCT_ROOM_HEADER_MAXPEOPLE', '_JOMRES_COM_MR_VRCT_ROOM_HEADER_MAXPEOPLE' );

		foreach ( $output as $o )
			{
			echo $o;
			echo "<br/>";
			}
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
