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

class beds24v2_rest_key_setup
	{
    /*
    The default scopes to give a property manager when creating his/her rest api keys.
    */
    private $scopes = 'properties_get,properties_set';
    
    /*
    The manager's UID ( duh, really )
    */
    private $manager_uid = 0;
    
    /*
    The uri that the remote site would call back. The path to the Jomres api.
    */
    public $redirect_uri = '';
    
	function __construct($manager_uid){
        if ($manager_uid == 0 ){
            throw new Exception("beds24v2_rest_key_setup manager uid not set");
            }
        $this->manager_uid = (int)$manager_uid;
        $this->redirect_uri = $redirect_uri = get_showtime( 'live_site' )."/".JOMRES_ROOT_DIRECTORY."/api/";
		}

    /*
    Returns the manager's API key pair
    */
    public function get_manager_key_pair() {
       	$query = "SELECT oauth_client FROM #__jomres_beds24_rest_api_key_xref WHERE manager_id = ". $this->manager_uid.' LIMIT 1';
		$client_id = doSelectSql($query,1);
        if ($client_id === false ) { // The client id hasn't been added to the cross reference table yet, we'll create one then add it to the xref table. Default scopes will be property_set/property_get, but that could be changed later in the api key configuration page if the user wants to ( or I add more beds24 specific features )
            $client_id = $this->create_api_key_pair();
            }
        $client_keys = $this->get_client_password($client_id);
        return array ( "client_id" => $client_keys['client_id'] , "client_secret" => $client_keys['client_secret'] , "redirect_uri" => $this->redirect_uri );
       
        }
    
    
    public function get_client_password($client_id) {
       	$query = "SELECT client_secret FROM #__jomres_oauth_clients WHERE client_id = '". $client_id."' LIMIT 1";
		$client_secret = doSelectSql($query,1); // If client secret is false at this point, then either insertion previously failed, or, more likely somebody has used the UI to delete the key pair. We need to delete the record from the xref table, then recreate it. If we can't recreate it, throw an error, cos shit's broke, yo?;
        
        
        if ($client_secret === false ) {
            $query = "DELETE FROM #__jomres_beds24_rest_api_key_xref WHERE `manager_id` = ".$this->manager_uid;
            $result = doInsertSql($query , "Removed a redundant cross reference");
            
            $client_id = $this->create_api_key_pair();
        	$query = "SELECT client_secret FROM #__jomres_oauth_clients WHERE client_id = '". $client_id."' LIMIT 1";
            $client_secret = doSelectSql($query,1); // If client secret is false at this point, then either insertion previously failed, or, more likely somebody has used the UI to delete the key pair. We need to delete the record from the xref table, then recreate it. If we can't recreate it, throw an error, cos shit's broke, yo?;
            }
        return array ("client_id" => $client_id , "client_secret" => $client_secret);
        }
    
    /*
    Creates the REST API key pair
    */
    private function create_api_key_pair() {
        
        $client_id = generateJomresRandomString( 15 );
        $client_secret = createNewAPIKey();

        $query = "INSERT INTO #__jomres_oauth_clients
                (`client_id`,`client_secret`,`redirect_uri`,`grant_types`,`scope`,`user_id`)
                VALUES
                ('".$client_id."','".$client_secret."','".$this->redirect_uri."',null,'".$this->scopes."',".$this->manager_uid.")";

        $result = doInsertSql($query , "Created Bes24 client keypair");
        if ( !$result ){
            throw new Exception("create_api_key_pair failed to insert key pair");
            }
        
        $query = "INSERT INTO #__jomres_beds24_rest_api_key_xref
                (`oauth_client`,`manager_id`)
                VALUES
                ('".$client_id."',".$this->manager_uid.")";

        $result = doInsertSql($query , "Cross referenced keypair to Beds24 manager");
        if ( !$result ){
            throw new Exception("create_api_key_pair failed to insert cross reference to beds24 table");
            }
        
        return $client_id;
        }
       
    }
            
            