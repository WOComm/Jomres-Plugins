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

class beds24v2_properties
	{
    /*
    The manager's uid, which corresponds with their CMS user id.
    */
    private $manager_uid = 0;
    
    /*
    All properties that the manager can assign/create a cross reference to in the Jomres tables
    */
    public $all_properties_assigned_to_manager = array();
    
    /*
    All properties that the manager **cannot** assign to themselves, or otherwise view. These are properties that have already been assigned to another manager
    */
    private $all_properties_manager_cannot_access = array();
    
    /*
    A bucket of all property uids and api keys for this manager
    */
    private $all_manager_properties = array();
    
    /*
    All of the Beds24 properties, pulled from Beds24's server
    */
    private $all_beds24_properties = array();
    
    /*
    A flag to prevent multiple calls to the channel manager
    */
    private $data_prepared = false;
    
    /*
    A map of the Jomres and Beds24 properties, linked by property apikey
    */
    private $property_map = array();
    
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
    
    public function administrator_get_all_linked_properties() {
		$response = array();
        $query	= "SELECT `id` , `property_uid` , `beds24_property_uid` , `manager_id`  FROM #__jomres_beds24_property_uid_xref " ;
		$assigned_properties = doSelectSql( $query );
        if (!empty($assigned_properties)) {
            foreach ($assigned_properties as $property ) {
                $response[ $property->property_uid ] = $property;
                }
            }
		return $response;
	}
	
    /*
    For the system change watcher, does this property have a row in the Jomre <--> Beds24 cross reference table?
    If it does, then return true. The watcher will then use that when the webhooks are triggered to call Beds24 with the relevant information ( bookings/room/tariff changes)
    */
    public function is_this_a_beds24_property($property_uid) {
        $is_associated_with_beds24_property = false;
        $query	= "SELECT `beds24_property_uid`  FROM #__jomres_beds24_property_uid_xref WHERE `property_uid` = " . (int)$property_uid . " LIMIT 1 " ;
		$is_associated_with_beds24_property = (bool)doSelectSql( $query , 1 );  

        return  $is_associated_with_beds24_property;
        }
    
    public function set_manager_uid($manager_uid) {
        
        if ( $manager_uid != $this->manager_uid ) {
            $this->data_prepared = false;
        }
        if ($manager_uid == 0 ){
            throw new Exception("set_manager_uid manager_uid not set");
            }
        $this->manager_uid = (int)$manager_uid;
        }

    /* Gather data about properties that the manager can access ( or not ) */
    public function prepare_data() 
    {
        if ($this->manager_uid == 0 ){
            throw new Exception("prepare_data manager_uid not set");
         }
        if (!$this->data_prepared) {
            $this->all_properties_assigned_to_manager = $this->get_all_assigned_properties($this->manager_uid);
            $this->all_properties_manager_cannot_access = $this->get_all_properties_assigned_to_other_managers($this->manager_uid); 
            $this->all_manager_properties = $this->get_all_properties_by_manager_uid($this->manager_uid);

            $this->data_prepared = true;
        }
    }
    
	
	public function check_for_properties_deleted_from_beds24( $manager_uid = 0 )
	{
		if ($this->manager_uid == 0 ){
			throw new Exception("prepare_data manager_uid not set");
		}
		$properties_xref = $this->get_all_assigned_properties($manager_uid); // array
		$properties_currently_on_beds24 = $this->all_beds24_properties->getProperties;  // array
		
		if (!empty($properties_xref)) {
			foreach ($properties_xref as $property) {
				$found = false;
				foreach ($properties_currently_on_beds24 as $beds24_property) {
					if ($property->beds24_property_uid == $beds24_property->propId ) {
						$found = true;
					}

				}
				if (!$found) { // The property no longer exists on Beds24, let's delete it from local records
					$query = "DELETE FROM #__jomres_beds24_property_uid_xref WHERE id = ".(int)$property->id;
					$result = doInsertSql($query);
					if ($result) {
						logging::log_message("Deleted property uid ".$property->beds24_property_uid." from beds24 xref table", 'Beds24v2', 'INFO' , $query);
					} else {
						logging::log_message("Tried to delete ".$property->beds24_property_uid." from beds24 xref table but failed", 'Beds24v2', 'ERROR' , $query);
					}
				}
			}
		}
	}
	
    /*
    As this method requires calling Beds24, we´ll have it separate from the prepare data method, as this info is generally only used in the Display Properties page.
    */
    public function get_properties_from_beds24() {
        if ($this->manager_uid == 0 ){
            throw new Exception("prepare_data manager_uid not set");
            }
        $this->all_beds24_properties = $this->get_beds24_properties($this->manager_uid);
        return $this->all_manager_properties;
    }
    
    /*
    Returns all properties that the manager has access to in the Jomres system
    */
    public function get_manager_properties() {
        if ($this->manager_uid == 0 ){
            throw new Exception("prepare_data manager_uid not set");
            }
        return $this->all_manager_properties;
    }
    
    /*
    Security check, ensures the manager can manage this Jomres property
    */
    public function confirm_manager_can_manage_jomres_property( $property_uid ) {
        if ($this->manager_uid == 0 ){
            throw new Exception("confirm_manager_can_manage_jomres_property manager_uid not set");
            }

        if ( empty($this->all_properties_assigned_to_manager))
            return false;
        
        if ( !array_key_exists($property_uid ,$this->all_properties_assigned_to_manager) )
            return false;
        
        return true;
    }
    

    /*
    Here we'll map Jomres properties to Beds24 properties
    If a Beds24 property and Jomres property have corresponding API keys, we'll add a record to the __jomres_beds24_property_uid_xref table, if it doesn't exist in the $this->all_properties_assigned_to_manager array, that'll save the manager needing to do it
    Beds24 properties not found in Jomres database could be imported, so the final array will be an amalgam of both the $this->all_manager_properties and $this->all_beds24_properties array
    */
    public function map_jomres_properties_to_beds24_properties() {
        $beds24_properties_already_mapped = array();
        if ( !empty($this->all_manager_properties) ) {
			
			foreach ( $this->all_manager_properties as $jomres_property ) {
				$beds24_property_details = new stdClass();
				if ( !empty($this->all_beds24_properties->getProperties) ) {
					foreach ( $this->all_beds24_properties->getProperties as $beds24_property ) {
						if ( isset($beds24_property->propKey) && $beds24_property->propKey == $jomres_property['apikey'] ) {
							$beds24_property_details = $beds24_property;
							$beds24_properties_already_mapped[] = $beds24_property->propId;
							$this->create_property_association_if_required ( $jomres_property , $beds24_property , $this->manager_uid );
						}
					}
				}
			$this->property_map[] = array ( "jomres_property" => $jomres_property , "beds24_property" => $beds24_property_details );
			}
		}
		// Ok, the Jomres properties have been added to the map, and associated where possible. Next we need to add the Beds24 properties to the map, but just those that haven't yet been associated
		if ( !empty($this->all_beds24_properties->getProperties) ) {
			$jomres_property_details = array();
			foreach ( $this->all_beds24_properties->getProperties as $beds24_property ) {
				
				if ( !in_array ( $beds24_property->propId , $beds24_properties_already_mapped ) ) {
					$this->property_map[] = array ( "jomres_property" =>  $jomres_property_details , "beds24_property" => $beds24_property );
				}
			}
		}
	$this->all_properties_assigned_to_manager = $this->get_all_assigned_properties($this->manager_uid);
	return $this->property_map;
    }
    
    /*
    Create a row in the cross reference table, if required. This allows us to automatically cross-reference properties on beds24 with Jomres properties, if their API keys correspond. 
    
    $jomres_property-details sample
    array(3) {
          ["property_uid"]=>
          string(2) "25"
          ["property_name"]=>
          string(27) "Best West Hotel from Beds24"
          ["apikey"]=>
          string(50) "MZhtxmhNMvkyltAZtDqmQXsKldIhtrxOObUFrdNvypXOzznwDH"
        }
        
    $beds24_property_details sample
    object(stdClass)#3178 (4) {
      ["name"]=>
      string(15) "Best West Hotel"
      ["propKey"]=>
      string(50) "MZhtxmhNMvkyltAZtDqmQXsKldIhtrxOObUFrdNvypXOzznwDH"
      ["propId"]=>
      string(5) "12561"
      ["roomTypes"]=>
      array(0) {
      }
    }
    
    */
    public function create_property_association_if_required ( $jomres_property_details , $beds24_property_details , $manager_uid ) {
        $query = "SELECT id FROM #__jomres_beds24_property_uid_xref WHERE property_uid = ".(int)$jomres_property_details['property_uid']." AND beds24_property_uid = ".(int)$beds24_property_details->propId." AND manager_id = ".(int)$manager_uid." LIMIT 1";

        $found = doSelectSql($query , 1 );
        if (!$found) {
            $query = "INSERT INTO #__jomres_beds24_property_uid_xref SET 
                property_uid = ".(int)$jomres_property_details['property_uid'].",
                beds24_property_uid = ".(int)$beds24_property_details->propId." ,
                manager_id = ".(int)$manager_uid."
                ";
            $result = doInsertSql($query);
            if ($result) {
                return $result;
            }
        else
            return $found;
        }
    }
     

    
    /*
    Gets all properties from Beds24 that are available to this manager's api key
    */
    private function get_beds24_properties($manager_uid) {
        $beds24v2_keys = jomres_singleton_abstract::getInstance('beds24v2_keys');
        $manager_key = $beds24v2_keys->get_manager_key($manager_uid);
        
        jr_import("beds24v2_communication");
		$beds24v2_communication = new beds24v2_communication();
        $beds24v2_communication->set_manager_key($manager_key);
        $response = $beds24v2_communication->communicate_with_beds24("getProperties");
        return json_decode($response);
        }
    
    /*
    Returns all property uids that exist in the jomres_beds24_property_uid_xref table that are assigned to this manager
    */
    public function get_all_assigned_properties($manager_uid) {
        if ($manager_uid == 0 ){
            throw new Exception("get_all_assigned_properties manager_uid not set");
            }
        $response = array();
        $query	= "SELECT `id` , `property_uid` , `beds24_property_uid` , `manager_id`  FROM #__jomres_beds24_property_uid_xref WHERE `manager_id` = " . (int)$manager_uid ;
		$assigned_properties = doSelectSql( $query );
        if (!empty($assigned_properties)) {
            foreach ($assigned_properties as $property ) {
                $response[ $property->property_uid ] = $property;
                }
            }
        return $response;
        }
    
    /*
    Returns all property uids that exist in the jomres_beds24_property_uid_xref table that are NOT assigned to this manager, this would allow us to exclude those properties from dropdowns etc. As a result, there's no need to return the complete property details, instead we'll simply return an array of property uids.
    */
    private function get_all_properties_assigned_to_other_managers($manager_uid) {
        if ($manager_uid == 0 ){
            throw new Exception("get_all_properties_assigned_to_other_managers manager_uid not set");
            }
        $response = array();
        $query	= "SELECT `id` , `property_uid` , `beds24_property_uid` , `manager_id`  FROM #__jomres_beds24_property_uid_xref WHERE `manager_id` != " . (int)$manager_uid ;
		$properties = doSelectSql( $query );
        if (!empty($properties)) {
            foreach ($properties as $property ) {
                $response[] = $property->property_uid;
                }
            }

        return $response;
        }
    
    /*
    Returns all property uids, names and apikeys that the manager has access to
    */
    private function get_all_properties_by_manager_uid($manager_uid=0) {
        if ($manager_uid == 0 ){
            throw new Exception("get_all_properties_by_manager_uid manager_uid not set");
            }
        
		$manager_assigned_properties = array();
        $query	= "SELECT `access_level` FROM #__jomres_managers WHERE `userid` = " . (int)$manager_uid . ' LIMIT 1';
		$access_level = doSelectSql( $query , 1 );
        if ($access_level <90 ) { // User isn't a super manager, we'll need to get their properties from the cross reference table
            $manager_2_property_uid_xref_array = build_property_manager_xref_array();
            if ( !empty($manager_2_property_uid_xref_array)) {
                foreach ( $manager_2_property_uid_xref_array as $property_uid => $manager_id ) {
                    if ( $manager_id == $this->manager_uid ) {
                        $manager_assigned_properties[] = $property_uid;
                        }
                    }
                }
            }
        else {
            $jomres_properties = jomres_singleton_abstract::getInstance('jomres_properties');
            $jomres_properties->get_all_properties();
            $manager_assigned_properties=$jomres_properties->all_property_uids["all_propertys"];
            }
        
        $keys = array();
        $current_property_details = jomres_singleton_abstract::getInstance('basic_property_details');
        $current_property_details->gather_data_multi($manager_assigned_properties);
        foreach ($manager_assigned_properties as $property_uid) {
            if (
			
				trim($current_property_details->multi_query_result[$property_uid][ 'apikey' ]) != "" &&
				!in_array( $property_uid , $this->all_properties_manager_cannot_access) 
				) {
                $keys [$property_uid] = array (
                    "property_uid"  => $property_uid,
                    "property_name" => $current_property_details->multi_query_result[$property_uid][ 'property_name' ],
                    "apikey"        => $current_property_details->multi_query_result[$property_uid][ 'apikey' ]
                    );
                    }
            }

        $this->all_property_apikeys = $keys;
        return $this->all_property_apikeys;
        }
	}
