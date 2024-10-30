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
//#################################################################
defined('_JOMRES_INITCHECK') or die('');
//#################################################################

jr_define('FIREWALL_CHECK', 'Ugunsmūra pārbaude');
jr_define ('FIREWALL_CHECK_DESC', 'Šis spraudnis ir vienkārša pārbaude, lai noskaidrotu, vai šis serveris var izveidot savienojumu ar attāliem pakalpojumiem. Ja tas neizdodas, tas varētu norādīt, ka ir ieviesti ugunsmūra noteikumi, kas neļauj abām iekārtām sarunāties savā starpā. ir, tad jums, iespējams, būs jāapspriež ugunsmūra noteikumu pielāgošana ar tīmekļa servera saimniekiem. 404 un 403 atbildes var uzskatīt par pieņemamām, jo jūs saņemat atbildi no attālā pakalpojuma.' );
jr_define('FIREWALL_CHECK_REMOTE_SERVICE', 'Attālais pakalpojums');
jr_define('FIREWALL_CHECK_STATUSCODE', 'Statusa kods');
jr_define('FIREWALL_CHECK_IP_NUMBER', 'IP numurs');