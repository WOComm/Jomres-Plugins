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
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################
#[AllowDynamicProperties]

class beds24v2_rooms
	{
    /*
    The property's uid
    */
    private $property_uid = 0;
    
    /*
    The property's propId ( Beds24 version of property uid )
    */
    public $propId = 0;
    
    /*
    The property room data, as stored in Jomres
    */
    public $jomres_property_rooms = array();
    
    /*
    The property room data, as stored in Beds24
    */
    public $channelmanager_property_rooms = array();
    
    /*
    The beds24 room type ids cross referenced with Jomres room uids
    */
    public $jomres_room_uids_by_room_type = array();
    
    
    /*
    The cross reference data that links CM room type ids with our room type ids
    */
    public $xref_data = array();
    
    /*
    The property´s manager api key
    */
    private $manager_key = '';
    
    /*
    The property´s own api key
    */
    private $property_key = '';
    
    /*
    A temporary array for holding room data, prevents multiple calls to the channel manager
    */
    private $room_data_cache = array();
    
	function __construct(){
		}
    
    public static function getInstance()
    {
        if (!self::$configInstance) {
            self::$configInstance = new self();
        }

        return self::$configInstance;
    }

    public function __clone()
    {
        trigger_error('Cloning not allowed on a singleton object', E_USER_ERROR);
    }
    
    public function set_property_uid($property_uid) {
        if ($property_uid == 0 ){
            throw new Exception("beds24v2_rooms property_uid not set");
            }
        $this->property_uid = (int)$property_uid;
        
    }
    
    /*
    Gets information about the property vis a vis rooms, both from Jomres and from the channel manager
    */
    public function prepare_data( $manager_key , $property_apikey ) {
        $this->manager_key = $manager_key;
        $this->property_apikey = $property_apikey;
        
        if ($this->manager_key == '' ){
            throw new Exception("prepare_data manager_key not set");
            }
        if ($this->property_apikey == '' ){
            throw new Exception("prepare_data property_apikey not set");
            }   
        $this->get_jomres_room_data();
        $this->get_channelmanager_room_data( $this->manager_key , $this->property_apikey); 
        $this->get_room_type_xref_data();
        }
        
    /*
    Gets the Jomres room types
    */
    private function get_jomres_room_data() {

        $basic_property_details = jomres_singleton_abstract::getInstance( 'basic_property_details' );
        $basic_property_details->gather_data( $this->property_uid); 

        $room_type_count = array();
        if (isset($basic_property_details->multi_query_result[ $this->property_uid]['rooms_by_type'])) {
            foreach ($basic_property_details->multi_query_result[ $this->property_uid]['rooms_by_type'] as $key=>$room_uids ) {
                if (!isset($this->jomres_room_uids_by_room_type[$key])) {
                    $this->jomres_room_uids_by_room_type[$key] = $room_uids;
                    }
                    
                $this->jomres_property_rooms[] = array ("name" => $basic_property_details->multi_query_result[ $this->property_uid]['room_types'][$key]["abbv"] , "qty" => count($room_uids) , "jomres_roomtype" => $key , "room_uids" => $room_uids );
            }
        }
    }
    
    /*
    Gets the room types for the property from the channel manager
    */
    private function get_channelmanager_room_data( $manager_key , $property_apikey ) 
    {
        if (!isset($this->room_data_cache[$property_apikey] ) ) {
            jr_import("beds24v2_communication");
            $beds24v2_communication = new beds24v2_communication();
            $beds24v2_communication->set_manager_key($manager_key);
            $beds24v2_communication->set_property_key($property_apikey);
            $result = json_decode($beds24v2_communication->communicate_with_beds24("getProperty" ));
			if (!isset($result->error) ) {
				$this->propId = $result->getProperty[0]->propId;
				$this->room_data_cache[$property_apikey] = $result->getProperty[0]->roomTypes;
			}

        }
		if (isset($this->room_data_cache[$property_apikey])){
			$this->channelmanager_property_rooms = $this->room_data_cache[$property_apikey];
		}
        
    }
        
    /*
    Results in an array like
    array(2) {
      ["jomres_to_cm"]=>
      array(4) {
        [4]=>
        string(5) "68084"
        [3]=>
        string(5) "68083"
        [2]=>
        string(5) "68082"
        [1]=>
        string(5) "68081"
      }
      ["cm_to_jomres"]=>
      array(4) {
        [68084]=>
        string(1) "4"
        [68083]=>
        string(1) "3"
        [68082]=>
        string(1) "2"
        [68081]=>
        string(1) "1"
      }
    }
    which allows calling functionality to easily associate room types
    */
    public function get_room_type_xref_data() {
        
        $query = "SELECT `jomres_room_type`,`beds24_room_type` FROM #__jomres_beds24_room_type_xref WHERE property_uid =".(int)$this->property_uid;
		$xref_data = doSelectSql($query);
        $tmp = array( // We'll quickly break this into two arrays, so that it's easy to grab data about the other room type
            "jomres_to_cm" => array () , 
            "cm_to_jomres" => array ()
            );
        
        if (!empty($xref_data)) {
            foreach ($xref_data as $room_type) {
                $tmp['jomres_to_cm'][$room_type->jomres_room_type] = $room_type->beds24_room_type ;
                $tmp['cm_to_jomres'][$room_type->beds24_room_type] = $room_type->jomres_room_type ;
                
                foreach ( $this->jomres_room_uids_by_room_type as $r_type=>$room_uids ) {
                    if ($r_type == $room_type->jomres_room_type ) {
                        foreach ($room_uids as $room_uid ) {
                            $tmp['jomres_room_uids_to_beds24_room_types'][$room_uid] = $room_type->beds24_room_type;
                            }
                        }
                    }
                }
            }
        $this->xref_data = $tmp;
        }
        
    // This method will check room counts in Jomres, and if required updated Beds24 with new counts as required, adding new room type quantities and attempting to remove old room types if they´re no longer in Jomres.
    public function compare_room_counts( ) {
         // We´re going to cycle through this array, as it´ll contain all room types, including those that don´t exist on the channel manager ( yet, as it´s possible a room type has been added )
        foreach ($this->jomres_room_uids_by_room_type as $jomres_room_type=>$rooms_of_type ) {
            // First we´ll check to see if the $jomres_room_type doesn´t exist in the jomres_to_cm array, if it doesn´t then this is a new room type and one will need to be added to Beds24´s data
            if (!isset($this->xref_data['jomres_to_cm'][$jomres_room_type] ) ) { // Check the channel manager room types  to see if this room type doesn´t exist in that array. If it doesn´t, we´ll add it. It´s possible that it doesn´t exist because it´s been removed in the CM, however the CM should have notified Jomres through the REST API and removed that room type in Jomres ( todo )
                foreach ( $this->jomres_property_rooms as $room_type ) {
                    if ($room_type['jomres_roomtype'] == $jomres_room_type){
                        $response = $this->send_room_type_update_to_channel_manager( $room_type['name'] , count( $room_type['room_uids']) , "new" );
                        if ( isset($response->modifyProperty[0]->roomTypes[0]->roomId) ) {
                            logging::log_message("Added a new room type ".$room_type['name']." New count : ".count( $room_type['room_uids']) , 'Beds24v2', 'DEBUG' , '' );
                            $query = "INSERT INTO #__jomres_beds24_room_type_xref ( `jomres_room_type` , `beds24_room_type` , `property_uid` ) VALUES ( ".(int)$jomres_room_type ." , ".(int)$response->modifyProperty[0]->roomTypes[0]->roomId." ,  ".(int)$this->property_uid." )";
                            doInsertSql($query);
                        }
                        else {
                            logging::log_message("Failed to add new room ".$room_name." New count : ".$number_of_rooms_in_jomres , 'Beds24v2', 'ERROR' , serialize($response) );
                        }
                    }
                }
            } else { // Room number changes check
                $number_of_rooms_in_jomres = count($rooms_of_type);
                $beds24_room_type_id = $this->xref_data['jomres_to_cm'][$jomres_room_type];
                $beds24_room_ids = array(); // This will be used later to check and see if there are rooms on Beds24 that don´t exist in Jomres. If there are, we'll tell Beds24 to remove theirs ( if possible )
                foreach ( $this->channelmanager_property_rooms as $beds24_room ) { // Now we´ll cycle through the channel manager´s room types and check their counts. If the number of rooms in the CM differ from Jomres´ then we´ll update the CM with the correct room count.
                    if ( $beds24_room->roomId == $beds24_room_type_id ) {
                        if ( $number_of_rooms_in_jomres !=  (int)$beds24_room->qty ) {
                            logging::log_message("Room type count for ".$beds24_room->name." is incorrect, sending an update to Beds24. In Jomres it is $number_of_rooms_in_jomres whereas in Beds24 it is $beds24_room->qty" , 'Beds24v2', 'DEBUG' , '' );
                            $room_name = 'XX';
                            foreach ( $this->jomres_property_rooms as $room_type ) {
                                if ( $room_type['jomres_roomtype'] ==  $jomres_room_type) {
                                    $room_name = $room_type['name'];
                                }
                            }
                                
                            $response = $this->send_room_type_update_to_channel_manager( $room_name , $number_of_rooms_in_jomres , "modify" , $beds24_room->roomId );
                            if (!isset($response->success ) ) {
                                logging::log_message("Failed to update room name and count ".$room_name." New count : ".$number_of_rooms_in_jomres , 'Beds24v2', 'ERROR' , serialize($response) );
                            }
                            else {
                                logging::log_message("Updated room name and count ".$room_name." New count : ".$number_of_rooms_in_jomres , 'Beds24v2', 'DEBUG' , '' );
                            }
                        }
                    }
                }
            }
        }
        // We now need to go through the channelmanager_property_rooms array and find the roomIds listed there. If they're not in the Jomres room type array, then they've been deleted from Jomres and should be removed from Beds24 too.
        
        // First we´ll loop throught $this->jomres_property_rooms, collect the room types as these are the room types *as currently stored* in the Jomres tables. If a room has been deleted from Jomres, then it will not appear in this array. We'll compare that data to the xref array, which, if a room type has been deleted, will be out of date.
        foreach ( $this->jomres_property_rooms as $room_type ) {
            $current_jomres_room_types[]=$room_type['jomres_roomtype'];        
        }
        
        foreach ( $this->xref_data['cm_to_jomres'] as $beds24_room_type=>$jomres_room_type ) {
            if (!in_array($jomres_room_type , $current_jomres_room_types )) {
                
                $response = $this->send_room_type_update_to_channel_manager( '' , '' , "delete", $beds24_room_type);
                //if ( isset($response->modifyProperty[0]->roomTypes[0]->roomId) ) {
                    $query = "DELETE FROM #__jomres_beds24_room_type_xref WHERE `beds24_room_type ` = ".(int)$beds24_room_type;
                    doSelectSql($query , "Deleted room type association for beds24 room type ".(int)$beds24_room_type);
                //}
            }
        }
    }

    private function send_room_type_update_to_channel_manager ( $name ='' , $quantity = 0 , $action = '' , $roomId = 0 ) {

        $room = new stdClass;
        $room->action = $action;

        if ($name != '' )
            $room->name = $name;

        if ($quantity > 0 )
            $room->qty = $quantity;
        
        if ( (int) $roomId > 0 && ( $action == "modify" || $action == "delete") ) {
            $room->roomId = (int)$roomId;
        }
        
        $modifyProperty = new stdClass;
        $modifyProperty->action = "modify";
        $modifyProperty->roomTypes = array($room);
        
        $obj = new stdClass;
        $obj->modifyProperty = array($modifyProperty);

        logging::log_message("Sending action ".$action." to Beds24 " , 'Beds24v2', 'DEBUG' , '' );
        
        jr_import("beds24v2_communication");
        $beds24v2_communication = new beds24v2_communication();
        $beds24v2_communication->set_manager_key($this->manager_key);
        $beds24v2_communication->set_property_key($this->property_apikey);
        $result = json_decode($beds24v2_communication->communicate_with_beds24("modifyProperty" , $obj ));
        return $result;
    }
}

/*
object(beds24v2_rooms)#2324 (8) {
  ["property_uid":"beds24v2_rooms":private]=>
  int(35)
  ["jomres_property_rooms"]=>
  array(2) {
    [0]=>
    array(4) {
      ["name"]=>
      string(11) "Double Room"
      ["qty"]=>
      int(4)
      ["jomres_roomtype"]=>
      int(1)
      ["room_uids"]=>
      array(4) {
        [0]=>
        string(3) "145"
        [1]=>
        string(3) "146"
        [2]=>
        string(3) "149"
        [3]=>
        string(3) "150"
      }
    }
    [1]=>
    array(4) {
      ["name"]=>
      string(11) "Single Room"
      ["qty"]=>
      int(2)
      ["jomres_roomtype"]=>
      int(3)
      ["room_uids"]=>
      array(2) {
        [0]=>
        string(3) "147"
        [1]=>
        string(3) "148"
      }
    }
  }
  ["channelmanager_property_rooms"]=>
  array(2) {
    [0]=>
    object(stdClass)#4537 (51) {
      ["name"]=>
      string(16) "Room Double beds"
      ["qty"]=>
      string(1) "2"
      ["roomId"]=>
      string(5) "27941"
      ["minPrice"]=>
      string(4) "0.00"
      ["maxPeople"]=>
      string(1) "2"
      ["maxAdult"]=>
      string(1) "0"
      ["maxChildren"]=>
      string(1) "0"
    }
    [1]=>
    object(stdClass)#4531 (51) {
      ["name"]=>
      string(11) "Room Single"
      ["qty"]=>
      string(1) "2"
      ["roomId"]=>
      string(5) "27942"
      ["minPrice"]=>
      string(4) "0.00"
      ["maxPeople"]=>
      string(1) "2"
      ["maxAdult"]=>
      string(1) "0"
      ["maxChildren"]=>
      string(1) "0"
    }
  }
  ["jomres_room_uids_by_room_type"]=>
  array(2) {
    [1]=>
    array(4) {
      [0]=>
      string(3) "145"
      [1]=>
      string(3) "146"
      [2]=>
      string(3) "149"
      [3]=>
      string(3) "150"
    }
    [3]=>
    array(2) {
      [0]=>
      string(3) "147"
      [1]=>
      string(3) "148"
    }
  }
  ["xref_data"]=>
  array(3) {
    ["jomres_to_cm"]=>
    array(2) {
      [3]=>
      string(5) "27942"
      [1]=>
      string(5) "27941"
    }
    ["cm_to_jomres"]=>
    array(2) {
      [27942]=>
      string(1) "3"
      [27941]=>
      string(1) "1"
    }
    ["jomres_room_uids_to_beds24_room_types"]=>
    array(6) {
      [147]=>
      string(5) "27942"
      [148]=>
      string(5) "27942"
      [145]=>
      string(5) "27941"
      [146]=>
      string(5) "27941"
      [149]=>
      string(5) "27941"
      [150]=>
      string(5) "27941"
    }
  }
  ["manager_key":"beds24v2_rooms":private]=>
  string(50) "piYjUbAoRkFoNulfswNkRcbkRSwzZNnQUThZaDmxNXpVanswno"
  ["property_key":"beds24v2_rooms":private]=>
  string(0) ""
  ["property_apikey"]=>
  string(50) "MajlwuTnoXOuozozLrffHsgAxcuvQVMGRMHQnjHMYpFKlxVPYb"
}
*/
