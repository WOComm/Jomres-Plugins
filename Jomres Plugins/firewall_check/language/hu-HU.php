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
jr_define( 'FIREWALL_CHECK', 'Tűzfal ellenőrzés' );
jr_define( 'FIREWALL_CHECK_DESC', 'Ez a beépülő modul egy egyszerű ellenőrzés annak ellenőrzésére, hogy ez a kiszolgáló tud-e csatlakozni távoli szolgáltatásokhoz. Ha nem tud, ez azt jelezheti, hogy vannak tűzfalszabályok, amelyek megakadályozzák, hogy a két gép kommunikáljon egymással. akkor előfordulhat, hogy meg kell beszélnie a tűzfalszabályok beállítását a webszerver hosztjaival. A 404-es és 403-as válaszok megfelelőnek tekinthetők, mert választ kap a távoli szolgáltatástól.' );
jr_define ('FIREWALL_CHECK_REMOTE_SERVICE', 'Távoli szolgáltatás');
jr_define( 'FIREWALL_CHECK_STATUSCODE', 'Állapotkód' );
jr_define( 'FIREWALL_CHECK_IP_NUMBER', 'IP-szám' );