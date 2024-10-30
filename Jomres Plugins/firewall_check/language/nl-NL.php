<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.24.0
 *
 * @copyright	2005-2021 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/
##################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
##################################################################




jr_define('FIREWALL_CHECK', 'Firewallcontrole');
jr_define( 'FIREWALL_CHECK_DESC', 'Deze plug-in is een eenvoudige controle om te zien of deze server verbinding kan maken met externe services. Als dit niet het geval is, kan dat erop wijzen dat er firewallregels zijn die voorkomen dat de twee machines met elkaar praten. zijn, dan moet u wellicht het aanpassen van de firewallregels bespreken met uw webserverhosts. 404 & 403-antwoorden kunnen als goed worden beschouwd omdat u een antwoord krijgt van de externe service.');
jr_define( 'FIREWALL_CHECK_REMOTE_SERVICE', 'Externe service');
jr_define( 'FIREWALL_CHECK_STATUSCODE', 'Statuscode');
jr_define( 'FIREWALL_CHECK_IP_NUMBER', 'IP-nummer');