<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2020 Vince Wooll
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( 'Direct Access to this file is not allowed.' );
// ################################################################

class j16000channelmanagement_framework_resource_mapping_map_dictionary_item_ajax{
	function __construct($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		/*
		 http://localhost/channelmanagement_rentals_united/administrator/index.php?option=com_jomres&no_html=1&jrajax=1&task=channelmanagement_framework_resource_mapping_map_dictionary_item_ajax&channel=rentalsunited&item_type=Pull_ListPropTypes_RQ&item_name=Eight+Bedroom&jomres_id=4&_=1552915916091 */
		
		
		$channel = jomresGetParam($_REQUEST, 'channel', '');

		$remote_item_id = (int)jomresGetParam($_REQUEST, 'remote_item_id', 0);
		$jomres_id = (int)jomresGetParam($_REQUEST, 'jomres_id', 0);

		$local_jomres_type = jomresGetParam($_REQUEST, 'local_jomres_type', '');
		$remote_item_type = jomresGetParam($_REQUEST, 'remote_item_type', '');
		
		if ( $channel == '' ) {
			throw new Exception( "Channel not passed" );
		}
		
		if ( $remote_item_type == '' ) {
			throw new Exception( "remote_item_type not passed" );
		}
		
		if ( $remote_item_id == '' ) {
			throw new Exception( "remote_item_id not passed" );
		}
		
		/* if ( $jomres_id == 0 ) {
			throw new Exception( "jomres_id not passed" );
		} */
		
		jr_import('channelmanagement_framework_mapping');
		
		$channelmanagement_framework_mapping = new channelmanagement_framework_mapping();
		$items_for_mapping = $channelmanagement_framework_mapping->get_items_for_mapping( $channel , $local_jomres_type );
	
		$count = count($items_for_mapping);
		
		foreach ( $items_for_mapping as $key=>$val ) {
			if ( $items_for_mapping[$key]->remote_item_id == $remote_item_id ) {
				$items_for_mapping[$key]->jomres_id = $jomres_id;
				break;
			}
		}

		$channelmanagement_framework_mapping->save_items( $channel , $remote_item_type , $local_jomres_type , $items_for_mapping );
		
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
