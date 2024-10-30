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
jr_define ('_OAUTH_SCOPE_CHANNEL_MANAGEMENT', "Kanālu pārvaldība");
jr_define ('_OAUTH_SCOPE_CHANNEL_MANAGEMENT_DESC', "Klients var veikt kanālu pārvaldības darbības. Ņemiet vērā, ka tas klientam dod ievērojamas pilnvaras sistēmā mainīt jūsu kontus un īpašumus.");

jr_define ('_OAUTH_SCOPE_CHANNEL_MANAGEMENT_CLEANING_PRICE', "Tīrīšana");

jr_define ('_CMF_CANCELLED_BOOKING', "Kanāla pārvaldnieks atcēla rezervāciju");

jr_define ('_CMF_CLEANING_STRING', "Tīrīšana"); // Nemainiet to, ja esat jau importējis rekvizītus. Īpašumiem ar uzkopšanas maksu ir papildu nosaukums ar šādu nosaukumu
jr_define ('_CMF_SECURITY_STRING', "Drošības nauda"); // Nemainiet to, ja esat jau importējis rekvizītus. Īpašumiem ar drošības naudu ir papildu nosaukums ar šādu nosaukumu


jr_define ('_CMF_API_PRIVACY', "API konfidencialitāte");
jr_define ('_CMF_API_PRIVACY_ON', "Privātums ieslēgts");
jr_define ('_CMF_API_PRIVACY_OFF', "Privātums izslēgts");

jr_define ('_CMF_API_PRIVACY_DESC', "Īpašuma informāciju var redzēt tikai kanāls, kas to izveidojis. Piemēram, ja A un B kanālam esat piešķīris dažādus API atslēgu pārus, informācija par kanālu A nevar tikt izveidota B kanāls to redzēs ... ja vien neizslēgsit API konfidencialitāti, lai visi kanāli varētu redzēt visu īpašuma informāciju, izmantojot API. Iestatiet API konfidencialitāti uz Izslēgts, ja kopīgojat šo īpašumu ar citu vietni, kas vēlas iekļaut īpašumu sarakstā. Ja jūs kopīgojat šo īpašumu ar citām vietnēm, atstājiet API konfidencialitāti kā Ieslēgts. ");
