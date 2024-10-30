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

jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHANNEL_ID_NOT_SET', "A csatornaazonosító nincs beállítva");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MANAGER_ID_NOT_SET', "A kezelői azonosító nincs beállítva");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_TITLE', "Csatornakezelő keretrendszer");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_FRONTEND_TITLE', "Csatornák");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_INSTALLED_CHANNELS', "Telepített csatornák");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHOOSE_CHANNEL', "Válasszon csatornát");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHOOSE_CHANNEL_CHOOSE_DICTIONARY_TYPE', "Válassz szótártípust");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHANNEL_NONE_INSTALLED', "Hiba, nincs telepített csatorna");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_SANITY_CHECKS_TITLE', "Csatornakezelő józanságának ellenőrzése");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_SANITY_CHECKS_DESC', "Válasszon csatornát. Ha ezt megtette, ellenőrizni fogjuk a konfigurációt, és kiemeljük az esetleges megoldandó problémákat.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_TITLE', "Erőforrás -leképezés");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_DESC', "Különböző csatornáknak van úgynevezett szótárai. Ezek olyan kifejezések, amelyek leírják az erőforrásokat, például a szobatípusokat, a szobafunkciókat, a tulajdonságokat stb. A csatorna használata előtt le kell térképezni a különböző Jomres -erőforrásokat az egyes csatornák erőforrásokat, hogy a csatornákból importált és exportált tulajdonságok a megfelelő erőforrásokkal rendelkezzenek. Ezen az oldalon először egy csatornát választ ki. Ha elkészült, egy új oldalra kerül, ahol kiválaszthatja a leképezni kívánt erőforrástípusokat a Csatorna erőforrásaihoz (például a tulajdonságok jellemzőihez). Miután kiválasztotta az erőforrástípust, kiválaszthatja a Jomres és a Csatorna erőforrásait egymással. ");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_SELECT_RESOURCE', "Itt ki kell választania az erőforrást (szótár)");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_NO_LOCAL_ITEMS', "Ehhez a szótári elemhez nincsenek helyi elemek, ezért nincs mit összehasonlítani.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_CHANNEL_DICTIONARY_CLASS_DOESNT_EXIST', "Hiba, a csatornának nincs szótárosztálya.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_MAP_ITEM_TYPES_INSTRUCTIONS', "Ezen az oldalon le kell képeznie a csatornakezelő szótári elemeit a Jomres -i elemekkel.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_USER_ACCOUNTS', "Csatornakezelői fiókok");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_USER_ACCOUNTS_DESC', "Kérem, mentse a jogosultsági adatokat minden olyan csatornakezelőhöz, akivel fiókja lehet.");
jr_define ('FINISH', 'Befejezés szerkesztés');
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_EXTRAS_NOTINSTALLED', "Hiba, az Optional Extras plugin nincs telepítve.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_CHANNEL_NAME_NOT_SUPPLIED', "A csatorna neve nincs megadva");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_NEW_PROPERTY_OBJECT_NOT_SUPPLIED', "Az új tulajdonságobjektum nem biztosított");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_THISJRUSER_OBJECT_NOT_SUPPLIES', "thisJRUser object not szállítva");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING', "Ingatlanimportálás megkezdése");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTED', "Sikeresen importált ingatlan");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_FAILED', "Nem sikerült importálni a tulajdont");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT', "Minden tulajdonság importálása");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_ONE', "Tulajdon importálása");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_UNPUBLISHED_CANNOT_IMPORT', "Azok a tulajdonságok, amelyek nincsenek megjelölve közzétéve/aktiválva a távoli szerveren, vagy azok a tulajdonságok, amelyek nem tartalmaznak változásnapló -elemeket, nem importálhatók.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORTING', "Vámimport indítása");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORTED', "Sikeresen importált tarifa");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORT_FAILED', "Nem sikerült importálni a tarifát");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_SETTINGS_FAILED_VALIDATION', "Nem sikerült ellenőrizni a tulajdonságbeállításokat, egy fel nem ismert tulajdonságbeállítást próbáltak importálni");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_PAGETITLE', "Importált tulajdonságok");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_PROPERTY_NAME', "Tulajdon neve");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_CHANNEL_NAME', "Csatorna neve");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_LOCAL_PROPERTY_UID', "Helyi tulajdon uid");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_REMOTE_PROPERTY_UID', "Távoli tulajdonság uid");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_EDIT_REMOTE_PROPERTY', "Távoli szerkesztése");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_EDIT_LOCAL_PROPERTY', "Helyi nézet");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_DELETE_LOCAL_PROPERTY', "Helyi törlés");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MENUITEM_DASHBOARD', "Irányítópult");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MENUITEM_ACCOUNTS', "Csatornafiókok");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_THIN_CHANNELS_NOT_INSTALLED', "Nincs telepítve vékonycsatornás beépülő modul, ezt a funkciót még nem használhatja.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_INFO', "Az Ön által kezelt, hozzá nem rendelt tulajdonságok hozzárendelhetők egy csatornához. Ha megváltoztatja a csatornát, akkor bármelyik csatornát érvényes API -hozzáféréssel biztosítja");
