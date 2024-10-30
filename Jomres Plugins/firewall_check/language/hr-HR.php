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

jr_define( 'FIREWALL_CHECK', 'Provjera vatrozida');
jr_define( 'FIREWALL_CHECK_DESC', 'Ovaj dodatak je jednostavna provjera može li se ovaj poslužitelj povezati s udaljenim uslugama. Ako ne može, to može značiti da postoje pravila vatrozida koja sprječavaju dva računala da međusobno razgovaraju. Ako postoje jesu, onda ćete možda morati razgovarati o prilagodbi pravila vatrozida sa svojim domaćinima web poslužitelja. Odgovori 404 i 403 mogu se smatrati u redu jer dobivate odgovor od udaljene usluge.' );
jr_define( 'FIREWALL_CHECK_REMOTE_SERVICE', 'Udaljena usluga');
jr_define( 'FIREWALL_CHECK_STATUSCODE', 'Kôd statusa');
jr_define( 'FIREWALL_CHECK_IP_NUMBER', 'IP broj');