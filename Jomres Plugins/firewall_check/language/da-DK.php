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
jr_define ('FIREWALL_CHECK_DESC', 'Dette plugin er en simpel kontrol for at se, om denne server kan oprette forbindelse til fjerntjenester. Hvis den ikke kan, kan det indikere, at der er firewall -regler på plads, der forhindrer de to maskiner i at tale med hinanden. Hvis der er er, så skal du muligvis diskutere justering af firewall-regler med dine webserver-værter. 404 & 403-svar kan betragtes som ok, fordi du får et svar fra fjerntjenesten.' );
jr_define( 'FIREWALL_CHECK_REMOTE_SERVICE', 'Fjerntjeneste' );
jr_define( 'FIREWALL_CHECK_STATUSCODE', 'Statuskode' );
jr_define( 'FIREWALL_CHECK_IP_NUMBER', 'IP-nummer' );