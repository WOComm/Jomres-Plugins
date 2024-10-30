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

jr_define( 'FIREWALL_CHECK', 'Firewall check' );
jr_define( 'FIREWALL_CHECK_DESC', 'This plugin is a simple check to see if this server can connect to remote services. If it cannot, that might indicate that there are firewall rules in place preventing the two machines from talking to each other. If there are, then you may need to discuss adjusting firewall rules with your webserver hosts. 404 & 403 responses can be considered ok because you are getting a response from the remote service.' );
jr_define( 'FIREWALL_CHECK_REMOTE_SERVICE', 'Remote service' );
jr_define( 'FIREWALL_CHECK_STATUSCODE', 'Status code' );
jr_define( 'FIREWALL_CHECK_IP_NUMBER', 'IP Number' );