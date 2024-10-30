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

class beds24v2_webhook_setup
	{
	function __construct( $manager_uid = 0 ){
        $this->manager_uid = (int)$manager_uid;
        $this->url = 'Beds24'; // We don't need to set a url, the Beds24 endpoint will be available to other parts of the plugin. Instead, we'll call it "Beds24"
		}


    public function create_webhook_for_site() {
        jr_import("webhooks");
        $webhooks = new webhooks( $this->manager_uid );
        $all_webhooks = $webhooks->get_all_webhooks();
        if (!empty($all_webhooks)) {
            foreach ( $all_webhooks as $key=>$val ) {
                if ($val['settings']['url'] == $this->url ) {
                    return true; // A webhook for this site already exists, we will not create a new one
                    }
                }
            }
        
        $integration_id = 0;

        $webhooks->set_setting( $integration_id , 'url' , $this->url );
        $webhooks->set_setting( $integration_id , 'authmethod' , 'beds24v2' );
        $webhooks->webhooks[$integration_id ]['enabled'] = 1;
        
        $webhooks->commit_integration($integration_id);
        }

    }