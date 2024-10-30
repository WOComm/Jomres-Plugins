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


	class channelmanagement_jomres2jomres_dictionaries
	{
		function __construct()
		{
			$this->current_channel_manager = "jomres2jomres";

			if (!is_dir(JOMRES_CHANNEL_DICTIONARIES.JRDS.$this->current_channel_manager.JRDS)) {
				mkdir(JOMRES_CHANNEL_DICTIONARIES.JRDS.$this->current_channel_manager.JRDS);
				if (!is_dir(JOMRES_CHANNEL_DICTIONARIES.JRDS.$this->current_channel_manager.JRDS)) {
					throw new Exception("Cannot make ".JOMRES_CHANNEL_DICTIONARIES.JRDS.$this->current_channel_manager.JRDS." directory, cannot continue.");
				}
			}

			$this->dictionaries = array();

			$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
			$jrConfig = $siteConfig->get();

			if ( !isset($jrConfig['channel_manager_framework_user_accounts']['jomres2jomres']["channel_management_jomres2jomres_client_id"]) || trim($jrConfig['channel_manager_framework_user_accounts']['jomres2jomres']["channel_management_jomres2jomres_client_id"]) == '' ) {
				throw new Exception( jr_gettext('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_NOT_SET','CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_NOT_SET',false) );
			}

			if ( trim($jrConfig['channel_manager_framework_user_accounts']['jomres2jomres']["channel_management_jomres2jomres_client_secret"]) == '' ) {
				throw new Exception( jr_gettext('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_NOT_SET','CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_NOT_SET',false) );
			}

			$dictionary_array = $this->get_dictionary_initialisation_array();

			$mappable_item_types = $this->get_mappable_dictionary_items();

			set_showtime("property_managers_id" , "system");

			if (!empty($dictionary_array)) {
				jr_import('channelmanagement_jomres2jomres_communication');
				$remote_server_communication = new channelmanagement_jomres2jomres_communication( 999999999 );

				foreach ($dictionary_array as $dictionary) {

					if (!file_exists(JOMRES_CHANNEL_DICTIONARIES.JRDS.$this->current_channel_manager.JRDS.$dictionary.'.json')) {

						$endpoint = str_replace ( "_" , "/" , $dictionary );

						$response = $remote_server_communication->communicate( "GET" , $endpoint , [] , false );

						$item_type = $mappable_item_types[$dictionary];

						$type = $item_type['type'];
						$sub_type = $item_type['sub_type'];
						$id_attribute = $item_type['id_attribute'];

						$contents = new stdClass();
						$contents->$type = 	new stdClass();

						$contents->$type->$sub_type = [];
						foreach ($response as $item ) {

							$remote_attribute_id = $item_type["id_attribute"];
							$remote_value_name_element = $item_type['value_name'];

							$remote_item_id = $item->$remote_attribute_id;
							$remote_item_name = $item->$remote_value_name_element;

							$attributes = new stdClass();
							@$attributes->xml_attributes->$remote_attribute_id = $remote_item_id;
							$attributes->value = $remote_item_name;
							$contents->$type->$sub_type [] = $attributes;

						}

						if ($response !== false ) {
							$encoded = json_encode($contents, JSON_PRETTY_PRINT);
							file_put_contents(JOMRES_CHANNEL_DICTIONARIES . JRDS . $this->current_channel_manager . JRDS . $dictionary . '.json', $encoded);
						}
					}
				}

				$this->read_dictionary_files();
			}
		}

		function read_dictionary_files()
		{
			$dictionary_array = $this->get_dictionary_initialisation_array();
			if (!empty($dictionary_array)) {
				foreach ($dictionary_array as $dictionary) {
					if (file_exists(JOMRES_CHANNEL_DICTIONARIES.JRDS.$this->current_channel_manager.JRDS.$dictionary.'.json')) {
						$this->dictionaries[$dictionary] = file_get_contents(JOMRES_CHANNEL_DICTIONARIES.JRDS.$this->current_channel_manager.JRDS.$dictionary.'.json');
					}
				}
			}
		}

		/*
		An array of dictionaries required for initialisation
		*/
		function get_dictionary_initialisation_array()
		{

			$arr = array (
				// "_cmf_list_statuses",
				"_cmf_list_property_types",
				"_cmf_list_room_types",
				"_cmf_list_property_features"
			);

			return $arr;
		}

		/*
		* Method to return dictionary lists that can be mapped to Jomres resources such as room types, property features etc
		* Because this is jomres2jomres, the returned items will, arguably be the same type as that locally, however for the cmf rest api I made the id attributes a bit more logical, however things like ptype and property_type_id are essentially the same
		*/
		function get_mappable_dictionary_items()
		{
			$arr = array (
				"_cmf_list_property_types" => array ( "type" => 'PropertyTypes', "sub_type" => "PropertyType" , "friendly_name" => jr_gettext('_JOMRES_FRONT_TARIFFS_ROOMTYPE','_JOMRES_FRONT_TARIFFS_ROOMTYPE',false) , "jomres_type" => "ptype" , "id_attribute" => 'property_type_id' , "value_name" => "property_type"),
				"_cmf_list_property_features" => array ( "type" => 'Amenities', "sub_type" => "Amenity" , "friendly_name" => jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTYFEATURES_HEADER_LINK','_JOMRES_COM_MR_VRCT_PROPERTYFEATURES_HEADER_LINK',false) , "jomres_type" => "pfeature" , "id_attribute" => 'property_feature_id' , "value_name" => "property_feature" ),
				"_cmf_list_room_types" => array ( "type" => 'CompositionRooms', "sub_type" => "CompositionRoom" , "friendly_name" => jr_gettext('_JOMRES_COM_MR_VRCT_TAB_ROOMTYPES','_JOMRES_COM_MR_VRCT_TAB_ROOMTYPES',false) , "jomres_type" => "rmtype" , "id_attribute" => 'room_classes_uid' , "value_name" => "room_class_abbv" ),
			);

			return $arr;
		}
	}
