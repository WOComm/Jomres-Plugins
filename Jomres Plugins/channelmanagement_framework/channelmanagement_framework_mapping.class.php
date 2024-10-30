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
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################


class channelmanagement_framework_mapping
{
	
	function __construct()
	{
		
	}

	function get_items_for_mapping( $channel = '' , $local_jomres_type = '' )
	{
		if ( $channel == '' ) {
			throw new Exception( "Channel not passed" );
		}
		
		if ( $local_jomres_type == '' ) {
			throw new Exception( "local_jomres_type not passed" );
		}

		$channelmanagement_framework_singleton = jomres_singleton_abstract::getInstance('channelmanagement_framework_singleton');
		$channelmanagement_framework_singleton->proxy_manager_id = 999999999;
        $channelmanagement_framework_singleton->manager_id = 999999999;

		$response = $channelmanagement_framework_singleton->rest_api_communicate( $channel , 'GET' , 'cmf/dictionary/items/map/'.$local_jomres_type);

		if (isset($response->data->response->params)) {
			return unserialize($response->data->response->params);
		} else {
			return false;
		}
	}
	
	function save_items( $channel = '' , $remote_item_type = '' , $local_jomres_type = '' , $data_object = '' )
	{
		if ( $channel == '' ) {
			throw new Exception( "Channel not passed" );
		}
		
		if ( $remote_item_type == '' ) {
			throw new Exception( "remote_item_type not passed" );
		}

		if ( $local_jomres_type == '' ) {
			throw new Exception( "local_jomres_type not passed" );
		}
		
		if ( !is_array($data_object) || empty( (array)$data_object ) ) {
			throw new Exception( "data not passed" );
		}
		
		$channelmanagement_framework_singleton = jomres_singleton_abstract::getInstance('channelmanagement_framework_singleton');
		$channelmanagement_framework_singleton->proxy_manager_id = 999999999;

		$post_data = array ("params" => json_encode($data_object) );
		$response = $channelmanagement_framework_singleton->rest_api_communicate( $channel , 'POST' , 'cmf/dictionary/items/map/'.$remote_item_type.'/'.$local_jomres_type , $post_data );

		if (isset($response->data->response)) {
			return $response->data->response;
		} else {
			return false;
		}
	}
	
}
