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

jr_define ('_OAUTH_SCOPE_CHANNEL_MANAGEMENT', "Csatornakezelés");
jr_define ('_OAUTH_SCOPE_CHANNEL_MANAGEMENT_DESC', "Az ügyfél csatornakezelési tevékenységeket végezhet. Megjegyzés: ez jelentős hatalmat biztosít az ügyfél számára a rendszerben a fiókok és a tulajdon módosítására.");

jr_define ('_OAUTH_SCOPE_CHANNEL_MANAGEMENT_CLEANING_PRICE', "Tisztítás");

jr_define ('_CMF_CANCELLED_BOOKING', "Csatornakezelő lemondta a foglalást");

jr_define ('_CMF_CLEANING_STRING', "Tisztítás"); // Ne módosítsa ezt, ha már importált tulajdonságokat. A takarítási díjakkal rendelkező ingatlanok extra nevűek
jr_define ('_CMF_SECURITY_STRING', "Kaució"); // Ne módosítsa ezt, ha már importált tulajdonságokat. A biztonsági letéttel rendelkező ingatlanok extra nevűek


jr_define ('_CMF_API_PRIVACY', "API adatvédelem");
jr_define ('_CMF_API_PRIVACY_ON', "Adatvédelem bekapcsolva");
jr_define ('_CMF_API_PRIVACY_OFF', "Adatvédelem kikapcsolva");

jr_define ('_CMF_API_PRIVACY_DESC', "Egy tulajdonság adatait csak az a csatorna láthatja, amely létrehozta. Például, ha különböző API kulcspárokat adott az A és a B csatornának, akkor az A csatorna által létrehozott tulajdonság információi nem a B csatorna láthatja ... hacsak nem kapcsolja ki az API -adatvédelem funkciót, hogy minden csatorna láthassa a tulajdon összes információját az API -n keresztül. Állítsa az API -adatvédelmet Ki értékre, ha megosztja ezt a tulajdont egy másik hellyel, amely fel szeretné sorolni a tulajdont. Ha nem osztja meg ezt a tulajdont más webhelyekkel, hagyja az API adatvédelmi beállítását Be értéken. ");
