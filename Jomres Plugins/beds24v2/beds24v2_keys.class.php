<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2017 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################
#[AllowDynamicProperties]

class beds24v2_keys
	{
    /*
    The manager api key required by all communications with Beds24
    */
    public $manager_apikey = '';
    
    /*
    The property api key required by all communications with Beds24
    */
    public $property_apikey = '';
    
    /*
    A bucket of all property uids and api keys for this manager
    */
    public $all_property_apikeys = array();
    
    /*
    A bucket of all manager uids for property uids
    */
    private $all_manager_uids = array();
    
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

    /*
    Returns the manager's API key. typically used by a watcher
    */
    public function watcher_get_manager_uid_for_property_uid($property_uid=0) {
        if ($property_uid == 0 ){
            throw new Exception("beds24v2_keys watcher_get_manager_key_for_property_uid property_uid not set");
            }
        if ( !isset($this->all_manager_uids[$property_uid]) ) {
            $query = "SELECT manager_id FROM #__jomres_beds24_property_uid_xref WHERE property_uid = ".(int)$property_uid." LIMIT 1";
            $manager_uid = doSelectSql($query , 1 );
            $this->all_manager_uids[$property_uid] = $manager_uid;
        }

        return $this->all_manager_uids[$property_uid];
    }
        
        
    /*
    Returns the manager's API key
    */
    public function get_manager_key($manager_uid=0) {
        $siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
        $jrConfig = $siteConfig->get();

		if (!isset($jrConfig[ 'beds24_master_api_key' ])) {
			$jrConfig[ 'beds24_master_api_key' ] = '';
		} 

		if (trim($jrConfig[ 'beds24_master_api_key' ]) != "") {
			$this->manager_apikey = $jrConfig[ 'beds24_master_api_key' ];
			return $this->manager_apikey;
		}
		
		
        if ($manager_uid == 0 ){
            throw new Exception("beds24v2_keys manager uid not set");
            }
       	$query = "SELECT apikey FROM #__jomres_managers WHERE userid = ". (int)$manager_uid.' LIMIT 1';
		$this->manager_apikey = doSelectSql($query,1);
        return $this->manager_apikey;
        }

    /*
    Returns the API key for a given property uid
    */
    public function get_property_key($property_uid=0 , $manager_uid=0 ) {
        if ($property_uid == 0 ){
            throw new Exception("beds24v2_keys property uid not set");
            }
        if ($manager_uid == 0 ){
            throw new Exception("beds24v2_keys manager uid not set");
            }
        
        $beds24v2_properties = jomres_singleton_abstract::getInstance('beds24v2_properties');
        $beds24v2_properties->set_manager_uid($manager_uid);
        $beds24v2_properties->prepare_data();
        
        if (!$beds24v2_properties->confirm_manager_can_manage_jomres_property($property_uid,$manager_uid) ){
            throw new Exception("get_property_key manager ".(int)$manager_uid." does not have rights to access this property ".(int)$property_uid);
            }   
                
        $basic_property_details					= jomres_singleton_abstract::getInstance( 'basic_property_details' );
		$basic_property_details->gather_data($property_uid);
        $this->property_apikey					= $basic_property_details->apikey;
        return $this->property_apikey;
        }
       
    }