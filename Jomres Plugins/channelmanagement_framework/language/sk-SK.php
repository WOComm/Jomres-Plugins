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

jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHANNEL_ID_NOT_SET', "ID kanála nie je nastavené");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MANAGER_ID_NOT_SET', "ID manažéra nie je nastavené");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_TITLE', "Framework Channel Manager");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_FRONTEND_TITLE', "Kanály");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_INSTALLED_CHANNELS', "nainštalované kanály");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHOOSE_CHANNEL', "Vyberte kanál");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHOOSE_CHANNEL_CHOOSE_DICTIONARY_TYPE', "Vybrať typ slovníka");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHANNEL_NONE_INSTALLED', "Chyba, nie sú nainštalované žiadne kanály");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_SANITY_CHECKS_TITLE', "Zdravotné kontroly správcu kanála");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_SANITY_CHECKS_DESC', "Vyberte kanál. Hneď ako to urobíte, skontrolujeme vašu konfiguráciu a upozorníme na všetky možné problémy, ktoré budete musieť riešiť.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_TITLE', "mapovanie zdrojov");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_DESC', "Rôzne kanály majú to, čo sú známe ako slovníky. Toto sú výrazy na opis zdrojov, ako sú typy miestností, vlastnosti miestností, vlastnosti nehnuteľností atď. Pred použitím kanála musíte namapovať rôzne zdroje Jomres s jednotlivými kanálmi. zdroje, aby vlastnosti importované z a exportované do kanálov mali správne zdroje. Na tejto stránke najskôr vyberiete kanál. Po dokončení sa dostanete na novú stránku, kde budete môcť vybrať typy zdrojov, ktoré chcete mapovať. k zdrojom kanála (napríklad vlastnosti vlastností). Po zvolení typu zdroja si budete môcť navzájom vyberať zdroje Jomres a Channel. ");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_SELECT_RESOURCE', "Tu musíte vybrať zdroj (slovník)");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_NO_LOCAL_ITEMS', "Pre túto položku slovníka neexistujú žiadne lokálne položky, takže nie je proti čomu mapovať.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_CHANNEL_DICTIONARY_CLASS_DOESNT_EXIST', "Chyba, kanál nemá triedu slovníka.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_MAP_ITEM_TYPES_INSTRUCTIONS', "Na tejto stránke budete musieť namapovať položky slovníka správcu kanála s položkami v Jomres.");
    
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_USER_ACCOUNTS', "účty správcu kanálov");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_USER_ACCOUNTS_DESC', "Uložte informácie o autorizácii pre všetkých správcov kanálov, s ktorými môžete mať účty.");
jr_define ('FINISH', 'Dokončiť úpravy');
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_EXTRAS_NOTINSTALLED', "Chyba, doplnok pre voliteľné doplnky nie je nainštalovaný.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_CHANNEL_NAME_NOT_SUPPLIED', "názov kanála nie je dodaný");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_NEW_PROPERTY_OBJECT_NOT_SUPPLIED', "Nový objekt vlastnosti nedodaný");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_THISJRUSER_OBJECT_NOT_SUPPLIES', "tento objektJRUser nie je dodaný");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING', "Spustenie importu majetku");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTED', "Úspešne importovaná vlastnosť");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_FAILED', "Nepodarilo sa importovať majetok");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT', "Importovať všetky vlastnosti");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_ONE', "Importovať nehnuteľnosť");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_UNPUBLISHED_CANNOT_IMPORT', "Vlastnosti, ktoré nie sú označené ako publikované/aktivované na vzdialenom serveri, alebo vlastnosti, ktoré nemajú žiadne položky zoznamu zmien, nemožno importovať.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORTING', "Spustenie importu tarify");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORTED', "Úspešne importovaná tarifa");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORT_FAILED', "Nepodarilo sa importovať tarifu");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_SETTINGS_FAILED_VALIDATION', "Nepodarilo sa overiť nastavenia vlastníctva, pokúsilo sa importovať nerozpoznané nastavenie vlastnosti");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_PAGETITLE', "Importované vlastnosti");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_PROPERTY_NAME', "názov vlastníctva");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_CHANNEL_NAME', "názov kanála");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_LOCAL_PROPERTY_UID', "uid miestneho vlastníctva");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_REMOTE_PROPERTY_UID', "Vzdialené vlastníctvo" );
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_EDIT_REMOTE_PROPERTY', "Upraviť diaľkové ovládanie");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_EDIT_LOCAL_PROPERTY', "Zobraziť miestne");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_DELETE_LOCAL_PROPERTY', "Odstrániť lokálne");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MENUITEM_DASHBOARD', "Dashboard");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MENUITEM_ACCOUNTS', "Účty kanálov");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_THIN_CHANNELS_NOT_INSTALLED', "Nie sú nainštalované žiadne doplnky tenkého kanála, túto funkciu zatiaľ nemôžete používať.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_INFO', "K kanálu je možné priradiť nepriradené vlastnosti, ktoré spravujete. Ak zmeníte kanál, dávate ktorémukoľvek kanálu s platným prístupom API");