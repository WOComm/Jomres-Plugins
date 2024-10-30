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
jr_define( 'FIREWALL_CHECK', 'Firewall-Check');
jr_define( 'FIREWALL_CHECK_DESC', 'Dieses Plugin ist eine einfache Überprüfung, ob dieser Server eine Verbindung zu Remote-Diensten herstellen kann. Wenn dies nicht möglich ist, kann dies darauf hindeuten, dass Firewall-Regeln vorhanden sind, die die beiden Maschinen daran hindern, miteinander zu kommunizieren sind, müssen Sie möglicherweise die Anpassung der Firewall-Regeln mit Ihren Webserver-Hosts besprechen. 404- und 403-Antworten können als in Ordnung angesehen werden, da Sie eine Antwort vom Remote-Dienst erhalten.' );
jr_define( 'FIREWALL_CHECK_REMOTE_SERVICE', 'Ferndienst');
jr_define( 'FIREWALL_CHECK_STATUSCODE', 'Statuscode');
jr_define( 'FIREWALL_CHECK_IP_NUMBER', 'IP-Nummer');