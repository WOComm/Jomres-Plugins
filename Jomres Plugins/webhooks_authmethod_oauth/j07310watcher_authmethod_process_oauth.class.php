<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.8.21
 *
 * @copyright    2005-2016 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/

// ################################################################
defined('_JOMRES_INITCHECK') or die('');
// ################################################################

class j07310watcher_authmethod_process_oauth
{
    public function __construct($componentArgs)
    {
        // Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
        $MiniComponents = jomres_singleton_abstract::getInstance('mcHandler');
        if ($MiniComponents->template_touch) {
            $this->template_touchable = false;
            return;
        }

        // This script will collate, reformat ( if required ) and send the information to the remote site using the authentication information provided in the componentArgs variable.
        $ePointFilepath=get_showtime('ePointFilepath');
        $this->retVals = false;

        $webhook_messages = get_showtime('webhook_messages');
        
        
        if (!empty($webhook_messages)) {
            $webhook_messages = array_unique( $webhook_messages, SORT_REGULAR ); // Remove duplicate objects
            foreach ( $webhook_messages as $webhook_notification ) {
                if (isset($webhook_notification->collection_script)) {
                    $collection_script = JOMRES_COREPLUGINS_ABSPATH."webhooks_collection_library".JRDS."collector_".$webhook_notification->webhook_event.".php";
                    if ( file_exists ($collection_script) ) {
                        require_once($collection_script);
                        $data = collect_data();
                    }
                }
                else {
                    $data = $webhook_notification->data;
                }


                if (isset($data) && $data !== false && isset($webhook_notification->webhook_event) ) { // The data, whatever it is, has been collected, let's send it off to the remote site
                    try {
                        $response = $this->request_token( $componentArgs['settings']['url'] , $componentArgs['settings']['client_id'] ,  $componentArgs['settings']['secret'] );

                        if (isset($response->access_token)) {
                            logging::log_message("Sent to ".$componentArgs['settings']['url'] , 'Webhooks', 'DEBUG' , serialize($data));
                            $token = $response->access_token; 

                            $result = $this->send_request( $componentArgs['settings']['url'] , $token , "GET" , "" , array() );

                            $loglevel = "DEBUG";
                            if ($result['response_code'] != "200"  )
                                $loglevel = "WARNING"; // At this point, the message should be handed to a queue manager. Remains to be seen if we need it yet.

                            logging::log_message("Received back from ".$componentArgs['settings']['url'], 'Webhooks', $loglevel , serialize($result)." when sending ".serialize($data) );
                            $this->retVals = $result;
                        }
                    }
                    catch(Exception $e) {
                        logging::log_message("Received back ".$e->getMessage(), 'Webhooks', "WARNING"); 
                    }
                }
            }
        }
    }

    private function send_request($server , $token , $method="GET" , $request ="" , $data=array(3)) {
        $ch = curl_init($server.$request);

        switch ( $method ) {
            case 'POST':
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
                break;
            case 'DELETE':
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
                break;
            case 'PUT':
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT"); 
                    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
                break;
            default :
                break;
            }
        
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization: Bearer '.$token,
            'Accept: application/json',
            ));
        
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30); //timeout after 30 seconds
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        $result=curl_exec ($ch);
        $errors = curl_error($ch);
        $status = curl_getinfo($ch); 
        $response_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if ( $response_code != 200 ) {
            logging::log_message("Received response code ".$response_code." when sending data to ".$server.$request, 'Webhooks', "WARNING"); 
            logging::log_message("Data ".serialize($data), 'Webhooks', "WARNING"); 
        }
        return array ("result" => $result , "status" => $status , "errors" => $errors , "response_code" => $response_code );
    }
    
    private function request_token ( $url , $client_id ='' , $client_secret = '' ) {
        $data=array('grant_type' => 'client_credentials' , "client_id" => $client_id , "client_secret" => $client_secret);
        
        $ch = curl_init($url);
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30); //timeout after 30 seconds
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        $token_request=curl_exec ($ch);
        $errors = curl_error($ch);
        $status = curl_getinfo($ch); 
        $response_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ( $response_code != 200 ) {
            logging::log_message("Received response code ".$response_code." when attempting to receive token from remote server ".$url." Client ID ".$client_id." Secret ".$client_secret." ".$errors, 'Webhooks', "WARNING"); 
        }
        curl_close ($ch);
        $response = json_decode($token_request);
        return $response;
    }
  
    // This must be included in every Event/Mini-component
    public function getRetVals()
    {
        return $this->retVals;
    }
}
