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

jr_define( 'FIREWALL_CHECK', 'Kontrola brány firewall' );
jr_define( 'FIREWALL_CHECK_DESC', 'Tento doplnok je jednoduchou kontrolou, či sa tento server môže pripojiť k vzdialeným službám. Ak nie, môže to znamenať, že sú zavedené pravidlá brány firewall, ktoré bránia dvom počítačom vo vzájomnej komunikácii. potom možno budete musieť prediskutovať úpravu pravidiel brány firewall s hostiteľmi vášho webového servera. Odpovede 404 a 403 možno považovať za v poriadku, pretože dostávate odpoveď od vzdialenej služby.' );
jr_define ('FIREWALL_CHECK_REMOTE_SERVICE', 'Vzdialená služba');
jr_define( 'FIREWALL_CHECK_STATUSCODE', 'Stavový kód' );
jr_define( 'FIREWALL_CHECK_IP_NUMBER', 'IP Číslo' );