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
jr_define( 'FIREWALL_CHECK', 'Brannmursjekk' );
jr_define( 'FIREWALL_CHECK_DESC', 'Denne plugin-modulen er en enkel sjekk for å se om denne serveren kan koble til eksterne tjenester. Hvis den ikke kan det, kan det tyde på at det er brannmurregler på plass som hindrer de to maskinene i å snakke med hverandre. er, så må du kanskje diskutere justering av brannmurregler med webserver-vertene dine. 404- og 403-svar kan anses som ok fordi du får svar fra den eksterne tjenesten.' );
jr_define( 'FIREWALL_CHECK_REMOTE_SERVICE', 'Fjerntjeneste' );
jr_define( 'FIREWALL_CHECK_STATUSCODE', 'Statuskode' );
jr_define( 'FIREWALL_CHECK_IP_NUMBER', 'IP-nummer' );