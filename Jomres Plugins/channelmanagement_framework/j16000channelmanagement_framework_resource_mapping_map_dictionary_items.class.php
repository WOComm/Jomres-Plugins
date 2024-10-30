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

class j16000channelmanagement_framework_resource_mapping_map_dictionary_items{
	function __construct($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		
		$ePointFilepath = get_showtime('ePointFilepath');

		$output = array();
		$pageoutput = array();
			
		$attributes_string = '@attributes';
		
		$local_item_type_remote_item_type = jomresGetParam($_POST, 'local_item_type_remote_item_type', '');
		
		$bang = explode ("#" , $local_item_type_remote_item_type );

		$local_item_type = $bang[0];
		$remote_item_type = $bang[1];
		
		if ( trim($local_item_type) == '' || trim($remote_item_type) == '' ) {
			throw new Exception( "Item types not passed correctly" );
		}

		$channel = jomresGetParam($_POST, 'channel', '');

		jr_import('channelmanagement_framework_mapping');
		
		$channelmanagement_framework_mapping = new channelmanagement_framework_mapping();
		$items_for_mapping = $channelmanagement_framework_mapping->get_items_for_mapping( $channel , $local_item_type );
		
		$dictionary_class_name = 'channelmanagement_'.$channel.'_dictionaries';
		jr_import($dictionary_class_name);
		
		if ( !class_exists($dictionary_class_name) ) {
			echo jr_gettext('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_CHANNEL_DICTIONARY_CLASS_DOESNT_EXIST','CHANNELMANAGEMENT_FRAMEWORK_MAPPING_CHANNEL_DICTIONARY_CLASS_DOESNT_EXIST',false);
			return;
		}

		$dictionary_class = new $dictionary_class_name();
		$mappable_dictionary_items = $dictionary_class->get_mappable_dictionary_items();
		
		$items_json = json_decode($dictionary_class->dictionaries[$remote_item_type]);

		$item_types_name = $mappable_dictionary_items[$remote_item_type]['type'];
		$item_type_name = $mappable_dictionary_items[$remote_item_type]['sub_type'];
		$id_attribute = $mappable_dictionary_items[$remote_item_type]['id_attribute'];
		$remote_service_dictionary_items = $items_json->$item_types_name->$item_type_name;

		if (empty($items_for_mapping)) { // Nothing has been mapped yet. First we need to pull mapping data from the file from the channel, store it in the table. Once that's been done, we can then build the page to actually map items to each other
			if (isset($dictionary_class->dictionaries[$remote_item_type])) {
				// Now we know what the items are, we'll build an object of them, give each an ID of 0, then save the whole data set to the __jomres_channelmanagement_framework_mapping table

				$dictionary_items_for_storage = array();
				$count = count($remote_service_dictionary_items);

				for ($i = 0 ; $i < $count ; $i++ ) {
					$item = $remote_service_dictionary_items[$i];
					if (!isset($item->value)) {  // It's a subset
						$subset = (array) $item;
						foreach ( $subset as $var_name => $subitem ) {
							if ( $var_name != 'xml_attributes' ) {
								foreach( $subitem as $si) {
									if (isset($si->value)) {
										$id = $si->xml_attributes->$id_attribute;
										$obj = new stdClass();
										//$obj->item = $si;
										$obj->remote_name = $si->value;
										$obj->jomres_id = 0;
										$obj->remote_item_id = $id;
										$dictionary_items_for_storage[$id] = $obj;
									}
								}
							}
						}
					} else {
						$id = $item->xml_attributes->$id_attribute;
						$obj = new stdClass();
						//$obj->item = $item;
						$obj->remote_name = $item->value;
						$obj->jomres_id = 0;
						$obj->remote_item_id = $item->xml_attributes->$id_attribute;
						$dictionary_items_for_storage[$id] = $obj;
					}
				}

				$id = $channelmanagement_framework_mapping->save_items( $channel , $remote_item_type , $local_item_type , $dictionary_items_for_storage );

				$items_for_mapping = $channelmanagement_framework_mapping->get_items_for_mapping( $channel , $local_item_type );
			} else {
				echo "No item data available from channel";
				return;
			}
		}

 		if (!empty($items_for_mapping)) {
			jr_import('channelmanagement_framework_local_items');
			
			$channelmanagement_framework_local_items = new channelmanagement_framework_local_items();
			$local_items = $channelmanagement_framework_local_items->get_local_items($local_item_type);

			if (empty($local_items->items) ) {
				echo jr_gettext('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_NO_LOCAL_ITEMS','CHANNELMANAGEMENT_FRAMEWORK_MAPPING_NO_LOCAL_ITEMS',false);
				return;
			}

			$items_dropdown_arr = array();
			$items_dropdown_arr[] = jomresHTML::makeOption(0, '' );
			foreach ($local_items->items as $key=>$val) {
				$items_dropdown_arr[] = jomresHTML::makeOption($key, $val );
			}

			$rows = array();
			foreach ($items_for_mapping as $remote_item_id => $remote_item) {
				$r = array();

				$r['REMOTE_DICTIONARY_ITEM'] = $remote_item->remote_name;
				
				$javascript = 'onChange="change_item_map(\''.urlencode ($remote_item->remote_item_id).'\',this.value)";';

				$r['DROPDOWN'] = jomresHTML::selectList($items_dropdown_arr, '', ' autocomplete="off" class="inputbox" size="1" '.$javascript.'', 'value', 'text', $remote_item->jomres_id);

				$rows[] = $r;
			}

			$output['CHANNEL'] = $channel;
			$output['LOCAL_JOMRES_TYPE'] = $local_item_type;
			$output['REMOTE_ITEM_TYPE'] = $remote_item_type;

			$output['CHANNELMANAGEMENT_FRAMEWORK_MAPPING_TITLE'] = jr_gettext('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_TITLE','CHANNELMANAGEMENT_FRAMEWORK_MAPPING_TITLE',false);
			$output['CHANNELMANAGEMENT_FRAMEWORK_MAPPING_MAP_ITEM_TYPES_INSTRUCTIONS'] = jr_gettext('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_MAP_ITEM_TYPES_INSTRUCTIONS','CHANNELMANAGEMENT_FRAMEWORK_MAPPING_MAP_ITEM_TYPES_INSTRUCTIONS',false);
			
			$jrtbar =jomres_getSingleton('jomres_toolbar');
			$jrtb  = $jrtbar->startTable();

			$jrtb .= $jrtbar->customToolbarItem('channelmanagement_framework_resource_mapping_choose_channel', jomresURL(JOMRES_SITEPAGE_URL_ADMIN."&task=channelmanagement_framework_resource_mapping_choose_channel"), jr_gettext('FINISH', 'FINISH', false), $submitOnClick = false, $submitTask = '', 'Save.png');
			$jrtb .= $jrtbar->endTable();
			$output['JOMRESTOOLBAR']=$jrtb;
			
			$pageoutput[] = $output;
			$tmpl = new patTemplate();
			$tmpl->addRows( 'pageoutput', $pageoutput );
			$tmpl->addRows( 'rows', $rows );
			$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
			$tmpl->readTemplatesFromInput( 'channelmanagement_framework_mapping_choose_mapping_map_items.html' );
			echo $tmpl->getParsedTemplate();
		} else {
			echo jr_gettext('CHANNELMANAGEMENT_FRAMEWORK_CHANNEL_NONE_INSTALLED','CHANNELMANAGEMENT_FRAMEWORK_CHANNEL_NONE_INSTALLED',false);  
		}
		
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}

	
	/*
	array(13) {
  [3]=>
  object(stdClass)#698 (3) {
    ["name"]=>
    string(10) "Aparthotel"
    ["jomres_id"]=>
    int(0)
    ["remote_item_id"]=>
    string(1) "3"
  }
  [4]=>
  object(stdClass)#706 (3) {
    ["name"]=>
    string(17) "Bed and breakfast"
    ["jomres_id"]=>
    int(0)
    ["remote_item_id"]=>
    string(1) "4"
  }
  [7]=>
  object(stdClass)#705 (3) {
    ["name"]=>
    string(6) "Chalet"
    ["jomres_id"]=>
    int(0)
    ["remote_item_id"]=>
    string(1) "7"
  }
  [16]=>
  object(stdClass)#704 (3) {
    ["name"]=>
    string(11) "Guest house"
    ["jomres_id"]=>
    int(0)
    ["remote_item_id"]=>
    string(2) "16"
  }
  [20]=>
  object(stdClass)#703 (3) {
    ["name"]=>
    string(5) "Hotel"
    ["jomres_id"]=>
    int(0)
    ["remote_item_id"]=>
    string(2) "20"
  }
  [22]=>
  object(stdClass)#702 (3) {
    ["name"]=>
    string(5) "Lodge"
    ["jomres_id"]=>
    int(0)
    ["remote_item_id"]=>
    string(2) "22"
  }
  [30]=>
  object(stdClass)#701 (3) {
    ["name"]=>
    string(6) "Resort"
    ["jomres_id"]=>
    int(0)
    ["remote_item_id"]=>
    string(2) "30"
  }
  [35]=>
  object(stdClass)#700 (3) {
    ["name"]=>
    string(5) "Villa"
    ["jomres_id"]=>
    int(0)
    ["remote_item_id"]=>
    string(2) "35"
  }
  [37]=>
  object(stdClass)#699 (3) {
    ["name"]=>
    string(6) "Castle"
    ["jomres_id"]=>
    int(0)
    ["remote_item_id"]=>
    string(2) "37"
  }
  [31]=>
  object(stdClass)#744 (3) {
    ["name"]=>
    string(4) "Boat"
    ["jomres_id"]=>
    int(0)
    ["remote_item_id"]=>
    string(2) "31"
  }
  [5]=>
  object(stdClass)#697 (3) {
    ["name"]=>
    string(7) "Cottage"
    ["jomres_id"]=>
    int(0)
    ["remote_item_id"]=>
    string(1) "5"
  }
  [25]=>
  object(stdClass)#696 (3) {
    ["name"]=>
    string(7) "Camping"
    ["jomres_id"]=>
    int(0)
    ["remote_item_id"]=>
    string(2) "25"
  }
  [34]=>
  object(stdClass)#695 (3) {
    ["name"]=>
    string(5) "House"
    ["jomres_id"]=>
    int(0)
    ["remote_item_id"]=>
    string(2) "34"
  }
}

*/