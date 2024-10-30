<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.8.21
 *
 * @copyright    2005-2017 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/

// ################################################################
defined('_JOMRES_INITCHECK') or die('');
// ################################################################

class j07310watcher_authmethod_process_mailchimp
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
    $this->retVals = false;

	$siteConfig         = jomres_singleton_abstract::getInstance( 'jomres_config_site_singleton' );
	$jrConfig           = $siteConfig->get();
    
    $verify_ssl = true;
    if ($jrConfig[ 'development_production' ] == 'development') {
        $verify_ssl = false;
        }
        
    $webhook_messages = get_showtime('webhook_messages');

    $bang = explode ( "-" , $componentArgs['settings']['mailchimp_apikey'] );

    if (!isset($bang[1])){
        logging::log_message("Tried to update mailchimp but could not figure out data centre based on API key. Have they configured their API key yet?" , 'Webhooks', 'DEBUG' );
        return false;
        }

    if ( (int) $componentArgs['settings']['mailchimp_listid'] == 0) {
        logging::log_message("Tried to update mailchimp but list id doesn't appear to be set yet" , 'Webhooks', 'DEBUG' );
        return false;
        }

    if (!empty($webhook_messages)) {
        $webhook_messages = array_unique( $webhook_messages, SORT_REGULAR ); // Remove duplicate objects
        foreach ( $webhook_messages as $webhook_notification ) {
            $data = $webhook_notification->data;
            if (isset($data) && $data !== false && isset($webhook_notification->webhook_event) ) { // The data, whatever it is, has been collected, let's send it off to the remote site
                logging::log_message("Sent to ".$componentArgs['settings']['url'] , 'Webhooks', 'DEBUG' , serialize($data));
                $data->task = $webhook_notification->webhook_event;
                        
                $query = "SELECT firstname,surname,email FROM #__jomres_guests WHERE guests_uid = ".(int) $data->guest_uid."  AND property_uid = ".(int) $data->property_uid." LIMIT 1";
                $guestData = doSelectSql($query);

                if (empty($guestData)) {
                    // We don't want to throw an error here just because there might have been a problem in the system that doesn't otherwise affect things. Instead we'll log an error and return.
                    logging::log_message("Tried to update mailchimp but could not find relevant guest data for guest uid $data->guest_uid and property uid $data->property_uid " , 'Webhooks', 'ERROR' , serialize($data));
                    return false;
                    }
                else {        
                    if ( trim($guestData[0]->firstname) != '' && trim($guestData[0]->surname) != '' && trim($guestData[0]->email) != '' ) {
                        $headers = array(
                            'Content-Type:application/json',
                            'Authorization: Basic '. base64_encode("jomres:".$componentArgs['settings']['mailchimp_apikey'])
                        );

                        $uri = 'https://'.$bang[1].'.api.mailchimp.com/3.0/lists/'.$componentArgs['settings']['mailchimp_listid'].'/members/';
                        
                        // https://developer.mailchimp.com/documentation/mailchimp/guides/manage-subscribers-with-the-mailchimp-api/
                        $postdata = array (
                            "apikey"        => $componentArgs['settings']['mailchimp_apikey'],
                            "email_address" => trim($guestData[0]->email),
                            "status" => "pending",
                            "merge_fields" => array (
                                "FNAME" => trim($guestData[0]->firstname),
                                "LNAME" => trim($guestData[0]->surname)
                                )
                            );

                        $postdata = json_encode($postdata);

                        logging::log_message("Calling ".$uri , 'Webhooks', 'DEBUG' , "Sending ".serialize($postdata) );
                        
                        $ch = curl_init( $uri );
                        # Setup request to send json via POST.
                        curl_setopt( $ch, CURLOPT_POSTFIELDS, $postdata );
                        curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
                        # Return response instead of printing.
                        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
                        # Let's send those auth details
                        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                        # 
                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $verify_ssl);
                        # Send request.
                        $response = curl_exec($ch);
                        $response_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

                        curl_close($ch);

                        $loglevel = "DEBUG";
                        if ($response_code != "200"  )
                            $loglevel = "WARNING"; // At this point, the message should be handed to a queue manager. Remains to be seen if we need it yet.

                        logging::log_message("Received back from ".$componentArgs['settings']['url']." ", 'Webhooks', $loglevel , serialize($response_code)." when sending ".serialize($response) );
                        $this->retVals = '';
                        }
                    }
                }
            }
        }
    }
    
  
    // This must be included in every Event/Mini-component
    public function getRetVals()
    {
        return $this->retVals;
    }
}
