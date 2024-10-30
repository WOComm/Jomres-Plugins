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
jr_define( 'FIREWALL_CHECK', 'Sprawdzanie zapory' );
jr_define( 'FIREWALL_CHECK_DESC', 'Ta wtyczka umożliwia proste sprawdzenie, czy ten serwer może połączyć się ze zdalnymi usługami. Jeśli nie, może to oznaczać, że istnieją reguły zapory uniemożliwiające komunikację między dwoma komputerami. tak, być może będziesz musiał przedyskutować dostosowanie reguł zapory sieciowej z hostami serwera WWW.Odpowiedzi 404 i 403 można uznać za prawidłowe, ponieważ otrzymujesz odpowiedź od usługi zdalnej.' );
jr_define( 'FIREWALL_CHECK_REMOTE_SERVICE', 'Usługa zdalna' );
jr_define( 'FIREWALL_CHECK_STATUSCODE', 'Kod stanu' );
jr_define( 'FIREWALL_CHECK_IP_NUMBER', 'Numer IP');