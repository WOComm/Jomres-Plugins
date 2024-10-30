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

jr_define( 'FIREWALL_CHECK', 'Verifica firewall' );
jr_define( 'FIREWALL_CHECK_DESC', 'Questo plugin è un semplice controllo per vedere se questo server può connettersi a servizi remoti. In caso contrario, ciò potrebbe indicare che ci sono regole firewall in atto che impediscono alle due macchine di comunicare tra loro. Se c\'è sono, allora potresti aver bisogno di discutere la regolazione delle regole del firewall con i tuoi host del server Web. Le risposte 404 e 403 possono essere considerate ok perché stai ricevendo una risposta dal servizio remoto.' );
jr_define( 'FIREWALL_CHECK_REMOTE_SERVICE', 'Servizio remoto' );
jr_define( 'FIREWALL_CHECK_STATUSCODE', 'Codice di stato' );
jr_define( 'FIREWALL_CHECK_IP_NUMBER', 'Numero IP' );