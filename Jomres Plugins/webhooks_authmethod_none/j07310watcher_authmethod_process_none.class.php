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

class j07310watcher_authmethod_process_none
{
    public function __construct($componentArgs)
    {
        // Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
        $MiniComponents = jomres_singleton_abstract::getInstance('mcHandler');
        if ($MiniComponents->template_touch) {
            $this->template_touchable = false;
            return;
        }

        // This script will collate and send information to the remote site using the authentication information provided in the componentArgs variable.
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
                    logging::log_message("Sent to ".$componentArgs['settings']['url'] , 'Webhooks', 'DEBUG' , serialize($data));
                    $data->task = $webhook_notification->webhook_event;
                    $result = $this->sendRequest($data , $componentArgs['settings']['url'] );

                    $loglevel = "DEBUG";
                    if ($result['response_code'] != "200"  )
                        $loglevel = "WARNING"; // At this point, the message should be handed to a queue manager. Remains to be seen if we need it yet.

                    logging::log_message("Received back from ".$componentArgs['settings']['url'], 'Webhooks', $loglevel , serialize($result)." when sending ".serialize($data) );
                    $this->retVals = $result;
                }
            }
        }
    }

    private function sendRequest($data,$url) {
        $postdata = json_encode(array('data'=>$data));
        $ch = curl_init( $url );
        # Setup request to send json via POST.
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $postdata );
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        # Return response instead of printing.
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        # Send request.
        $response = curl_exec($ch);

        $errors = curl_error($ch);
        $status = '';
        //$status = curl_getinfo($ch); 
        $response_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);
        
        return array ("response" => $response , "status" => $status , "errors" => $errors , "response_code" => $response_code );
    }
    
    // This must be included in every Event/Mini-component
    public function getRetVals()
    {
        return $this->retVals;
    }
}
