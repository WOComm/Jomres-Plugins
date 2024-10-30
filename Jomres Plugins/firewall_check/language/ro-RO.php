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


jr_define( 'FIREWALL_CHECK', 'Verificare firewall');
jr_define( 'FIREWALL_CHECK_DESC', 'Acest plugin este o simplă verificare pentru a vedea dacă acest server se poate conecta la servicii de la distanță. Dacă nu se poate conecta, ar putea indica faptul că există reguli de firewall care împiedică cele două mașini să vorbească între ele. Dacă există sunt, atunci poate fi necesar să discutați despre ajustarea regulilor firewall-ului cu gazdele serverului dvs. Web. Răspunsurile 404 și 403 pot fi considerate ok deoarece primiți un răspuns de la serviciul de la distanță.' );
jr_define( 'FIREWALL_CHECK_REMOTE_SERVICE', 'Serviciul de la distanță');
jr_define( 'FIREWALL_CHECK_STATUSCODE', 'Cod de stare');
jr_define( 'FIREWALL_CHECK_IP_NUMBER', 'Număr IP');