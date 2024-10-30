<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.24.0
 *
 * @copyright	2005-2021 Vince Wooll
 * Jomres is currently available for use in all personal or commercial projects under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/
//#################################################################
defined('_JOMRES_INITCHECK') or die('');
//#################################################################



jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP', 'Mailchimp' );
jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP_NOTES', 'This integration method updates a Mailchimp List when you add a guest to the system.<br/>
You do not need to set the URL input for this webhook, we will figure that out based on your API.<br/>
To configure this webhook you will need two items of information, an API key and the list ID. <br/>
To find your API key go to your Mailchimp account and :<br/> 
<ol>
  <li>Click your profile name to expand the Account Panel, and choose  Account.</li>
  <li>Click the  Extras drop-down menu and choose  API keys.</li>
  <li>Copy an existing API key or click the  Create A Key button.</li>
  <li>Name your key descriptively, so you know what application uses that key.</li>
</ol>
Next you will need the List Id, which you can find by visiting your Lists in Mailchimp. Click on the Lists menu link and at the end of the row on the right click the dropdown, then choose Settings. Scroll to the bottom of that page, it will say something like "List id for blahblah list". This is the id of the list that you need to use.
    ' );

jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP_APIKEY', 'API Key' );
jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP_LISTID', 'List ID' );