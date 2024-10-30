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
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHANNEL_ID_NOT_SET', "Kanāla ID nav iestatīts");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MANAGER_ID_NOT_SET', "Pārziņa ID nav iestatīts");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_TITLE', "Kanālu pārvaldnieka ietvars");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_FRONTEND_TITLE', "Kanāli");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_INSTALLED_CHANNELS', "Instalētie kanāli");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHOOSE_CHANNEL', "Atlasīt kanālu");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHOOSE_CHANNEL_CHOOSE_DICTIONARY_TYPE', "Izvēlieties vārdnīcas veidu");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHANNEL_NONE_INSTALLED', "Kļūda, nav instalēts neviens kanāls");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_SANITY_CHECKS_TITLE', "Kanāla pārvaldnieka veselīguma pārbaudes");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_SANITY_CHECKS_DESC', "Izvēlieties kanālu. Kad tas būs izdarīts, mēs pārbaudīsim jūsu konfigurāciju un uzsvērsim visas iespējamās problēmas, kuras jums, iespējams, būs jāatrisina.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_TITLE', "Resursu kartēšana");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_DESC', "Dažādiem kanāliem ir tā dēvētās vārdnīcas. Šie ir termini, lai aprakstītu tādus resursus kā istabu tipi, istabas iespējas, īpašuma īpašības uc resursus, lai no kanāliem importētajiem un uz tiem eksportētajiem īpašumiem būtu pareizi resursi. Šajā lapā vispirms atlasīsit kanālu. Kad tas būs izdarīts, jūs tiksit novirzīts uz jaunu lapu, kurā varēsit atlasīt resursu veidus, kurus vēlaties kartēt kanāla resursiem (piemēram, rekvizītu iezīmes). Kad resursa veids ir atlasīts, jūs varēsiet savā starpā izvēlēties Jomres un Channel resursus. ");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_SELECT_RESOURCE', "Šeit jums jāizvēlas resurss (vārdnīca)");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_NO_LOCAL_ITEMS', "Šai vārdnīcas vienībai nav vietējo vienumu, tāpēc nav ko salīdzināt.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_CHANNEL_DICTIONARY_CLASS_DOESNT_EXIST', "Kļūda, kanālam nav vārdnīcas klases.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_MAP_ITEM_TYPES_INSTRUCTIONS', "Šajā lapā jums vajadzēs kartēt kanāla pārvaldnieka vārdnīcas vienumus ar tiem, kas atrodas Jomresā.");

jr_define ('CHANNELMANAGEMENT_FRAMEWORK_USER_ACCOUNTS', "Kanālu pārvaldnieka konti");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_USER_ACCOUNTS_DESC', "Lūdzu, saglabājiet autorizācijas informāciju visiem kanālu pārvaldniekiem, ar kuriem jums var būt konti.");
jr_define ('FINISH', 'Pabeigt rediģēšanu');
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_EXTRAS_NOTINSTALLED', "Kļūda, neobligāto papildinājumu spraudnis nav instalēts.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_CHANNEL_NAME_NOT_SUPPLIED', "Kanāla nosaukums netiek piegādāts");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_NEW_PROPERTY_OBJECT_NOT_SUPPLIED', "Jauns īpašuma objekts netiek piegādāts");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_THISJRUSER_OBJECT_NOT_SUPPLIES', "šisJRU lietotāja objekts netiek piegādāts");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING', "Īpašuma importēšanas sākšana");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTED', "Īpašums ir veiksmīgi importēts");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_FAILED', "Neizdevās importēt īpašumu");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT', "Importēt visus rekvizītus");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_ONE', "Importēt īpašumu");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_UNPUBLISHED_CANNOT_IMPORT', "Rekvizītus, kas nav atzīmēti kā publicēti/aktivizēti attālajā serverī, vai rekvizītus, kuriem nav izmaiņu žurnāla vienumu, nevar importēt.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORTING', "Tarifa importa sākšana");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORTED', "Sekmīgi importēts tarifs");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORT_FAILED', "Neizdevās importēt tarifu");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_SETTINGS_FAILED_VALIDATION', "Nevar apstiprināt īpašuma iestatījumus, tika mēģināts importēt neatpazītu īpašuma iestatījumu");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_PAGETITLE', "Importētie rekvizīti");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_PROPERTY_NAME', "Īpašuma nosaukums");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_CHANNEL_NAME', "Kanāla nosaukums");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_LOCAL_PROPERTY_UID', "Vietējā īpašuma uid");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_REMOTE_PROPERTY_UID', "Attālā īpašuma uid");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_EDIT_REMOTE_PROPERTY', "Rediģēt tālvadību");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_EDIT_LOCAL_PROPERTY', "Skatīt vietējo");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_DELETE_LOCAL_PROPERTY', "Dzēst vietējo");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MENUITEM_DASHBOARD', "Informācijas panelis");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MENUITEM_ACCOUNTS', "Kanāla konti");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_THIN_CHANNELS_NOT_INSTALLED', "Nav instalēti plāna kanāla spraudņi, jūs vēl nevarat izmantot šo funkciju.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_INFO', "Nepārceltus rekvizītus, kurus jūs pārvaldāt, var piešķirt kanālam. Ja maināt kanālu, jūs piešķirat jebkuru kanālu ar derīgu API piekļuvi");