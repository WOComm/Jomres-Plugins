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

jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHANNEL_ID_NOT_SET', "ID kanala ni nastavljen");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MANAGER_ID_NOT_SET', "ID upravitelja ni nastavljen");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_TITLE', "Okvir upravitelja kanalov");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_FRONTEND_TITLE', "Kanali");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_INSTALLED_CHANNELS', "Nameščeni kanali");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHOOSE_CHANNEL', "Izberite kanal");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHOOSE_CHANNEL_CHOOSE_DICTIONARY_TYPE', "Izberite vrsto slovarja");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHANNEL_NONE_INSTALLED', "Napaka, kanali niso nameščeni");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_SANITY_CHECKS_TITLE', "Preverjanje razumnosti upravitelja kanalov");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_SANITY_CHECKS_DESC', "Izberite kanal. Ko to storite, bomo preverili vašo konfiguracijo in označili morebitne težave, ki jih boste morda morali odpraviti.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_TITLE', "Preslikava virov");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_DESC', "Različni kanali imajo tako imenovane slovarje. To so izrazi za opis virov, kot so vrste sob, funkcije sob, lastnosti nepremičnin itd.). vire, tako da imajo lastnosti, uvožene in izvožene v kanale, ustrezne vire. Na tej strani boste najprej izbrali kanal. Ko končate, boste preusmerjeni na novo stran, kjer boste lahko izbrali vrste virov, ki jih želite preslikati na vire kanala (na primer lastnosti lastnosti). Ko ste izbrali vrsto vira, boste lahko med seboj izbrali sredstva Jomres in kanala. ");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_SELECT_RESOURCE', "Tukaj morate izbrati vir (slovar)");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_NO_LOCAL_ITEMS', "Za ta slovarski element ni lokalnih elementov, zato ni ničesar za preslikavo.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_CHANNEL_DICTIONARY_CLASS_DOESNT_EXIST', "Napaka, kanal nima razreda slovarja.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_MAP_ITEM_TYPES_INSTRUCTIONS', "Na tej strani boste morali preslikati slovarske postavke upravitelja kanalov s tistimi v Jomresu.");

jr_define ('CHANNELMANAGEMENT_FRAMEWORK_USER_ACCOUNTS', "Računi upravitelja kanalov");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_USER_ACCOUNTS_DESC', "Prosimo, da podatke o pooblastilu shranite za vse upravitelje kanalov, pri katerih imate morda račune.");
jr_define ('FINISH', 'Finish edit');
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_EXTRAS_NOTINSTALLED', "Napaka, vtičnik izbirnih dodatkov ni nameščen.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_CHANNEL_NAME_NOT_SUPPLIED', "Ime kanala ni na voljo");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_NEW_PROPERTY_OBJECT_NOT_SUPPLIED', "Nov objekt nepremičnine ni na voljo");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_THISJRUSER_OBJECT_NOT_SUPPLIES', "ta objekt uporabnika JRUser ni priložen");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING', "Začetek uvoza nepremičnine");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTED', "Uspešno uvožena lastnina");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_FAILED', "Uvoz lastnosti ni uspel");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT', "Uvozi vse lastnosti");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_ONE', "Uvozi znamko");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_UNPUBLISHED_CANNOT_IMPORT', "Lastnosti, ki niso označene kot objavljene/aktivirane na oddaljenem strežniku, ali lastnosti, ki nimajo elementov dnevnika sprememb, ni mogoče uvoziti.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORTING', "Začetek uvoza tarife");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORTED', "Uspešno uvožena tarifa");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORT_FAILED', "Uvoz tarife ni uspel");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_SETTINGS_FAILED_VALIDATION', "Ni mogoče preveriti nastavitev lastnosti, poskusili smo uvoziti neprepoznane nastavitve lastnosti");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_PAGETITLE', "Uvožene lastnosti");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_PROPERTY_NAME', "Ime nepremičnine");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_CHANNEL_NAME', "Ime kanala");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_LOCAL_PROPERTY_UID', "Uid lokalne lastnine");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_REMOTE_PROPERTY_UID', "Remote property uid");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_EDIT_REMOTE_PROPERTY', "Urejanje daljinskega upravljalnika");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_EDIT_LOCAL_PROPERTY', "Ogled lokalnega");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_DELETE_LOCAL_PROPERTY', "Delete local");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MENUITEM_DASHBOARD', "Nadzorna plošča");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MENUITEM_ACCOUNTS', "Računi kanalov");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_THIN_CHANNELS_NOT_INSTALLED', "Vtičniki za tanke kanale niso nameščeni, te funkcije še ne morete uporabljati.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_INFO', "Nedodeljene lastnosti, ki jih upravljate, lahko dodelite kanalu. Če spremenite kanal, daste kateri koli kanal z veljavnim dostopom do API -ja");