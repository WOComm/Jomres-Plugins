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



jr_define ('FIREWALL_CHECK', 'Preverjanje požarnega zidu');
jr_define ('FIREWALL_CHECK_DESC', 'Ta vtičnik je preprosto preverjanje, ali se ta strežnik lahko poveže z oddaljenimi storitvami. Če ne, lahko to pomeni, da obstajajo pravila požarnega zidu, ki preprečujejo medsebojno komunikacijo. Če obstaja so, potem se boste morda morali pogovoriti o prilagajanju pravil požarnega zidu z gostitelji spletnega strežnika. Odgovora 404 in 403 se lahko šteje za v redu, ker prejemate odgovor od oddaljene storitve.' );
jr_define( 'FIREWALL_CHECK_REMOTE_SERVICE', 'Oddaljena storitev');
jr_define ('FIREWALL_CHECK_STATUSCODE', 'Koda stanja');
jr_define( 'FIREWALL_CHECK_IP_NUMBER', 'Številka IP');