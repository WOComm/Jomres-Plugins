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

jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHANNEL_ID_NOT_SET', "ID kanala nije postavljen");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MANAGER_ID_NOT_SET', "ID upravitelja nije postavljen");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_TITLE', "Okvir upravitelja kanala");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_FRONTEND_TITLE', "Kanali");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_INSTALLED_CHANNELS', "Instalirani kanali");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHOOSE_CHANNEL', "Odaberite kanal");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHOOSE_CHANNEL_CHOOSE_DICTIONARY_TYPE', "Odaberite vrstu rječnika");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHANNEL_NONE_INSTALLED', "Pogreška, nisu instalirani kanali");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_SANITY_CHECKS_TITLE', "Provjere razumnosti upravitelja kanala");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_SANITY_CHECKS_DESC', "Odaberite kanal. Nakon što to učinite provjerit ćemo vašu konfiguraciju i istaknuti sve moguće probleme koje ćete možda morati riješiti.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_TITLE', "Mapiranje resursa");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_DESC', "Različiti kanali imaju takozvane rječnike. To su pojmovi za opisivanje resursa, kao što su vrste soba, značajke soba, svojstva itd. Prije nego što počnete koristiti kanal, morate mapirati različite resurse Jomresa s pojedinačnim kanalima resurse tako da svojstva uvezena i izvezena na kanale imaju ispravne resurse. Na ovoj stranici prvo ćete odabrati kanal. Nakon što završite, bit ćete preusmjereni na novu stranicu na kojoj ćete moći odabrati vrste resursa koje želite mapirati na resurse kanala (na primjer, svojstva svojstava). Nakon što je odabrana vrsta resursa, moći ćete međusobno birati resurse Jomresa i kanala. ");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_SELECT_RESOURCE', "Ovdje morate odabrati resurs (rječnik)");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_NO_LOCAL_ITEMS', "Za ovu stavku rječnika nema lokalnih stavki, pa nema ničega za mapiranje.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_CHANNEL_DICTIONARY_CLASS_DOESNT_EXIST', "Pogreška, kanal nema klasu rječnika.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_MAP_ITEM_TYPES_INSTRUCTIONS', "Na ovoj stranici morat ćete mapirati stavke rječnika upravitelja kanala s onima u Jomresu.");

jr_define ('CHANNELMANAGEMENT_FRAMEWORK_USER_ACCOUNTS', "Računi upravitelja kanala");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_USER_ACCOUNTS_DESC', "Molimo spremite podatke o autorizaciji za sve upravitelje kanala s kojima možda imate račune.");
jr_define ('FINISH', 'Finish edit');
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_EXTRAS_NOTINSTALLED', "Pogreška, dodatak Optional Extras nije instaliran.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_CHANNEL_NAME_NOT_SUPPLIED', "Naziv kanala nije naveden");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_NEW_PROPERTY_OBJECT_NOT_SUPPLIED', "Novi objekt svojstva nije isporučen");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_THISJRUSER_OBJECT_NOT_SUPPLIES', "ovaj objekt JRUser nije isporučen");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING', "Pokretanje uvoza imovine");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTED', "Uspješno uvezeno vlasništvo");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_FAILED', "Uvoz svojstva nije uspio");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT', "Uvezi sva svojstva");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_ONE', "Uvezi svojstvo");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_UNPUBLISHED_CANNOT_IMPORT', "Svojstva koja nisu označena kao objavljena/aktivirana na udaljenom poslužitelju ili svojstva koja nemaju stavke dnevnika promjena, ne mogu se uvesti.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORTING', "Pokretanje uvoza tarife");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORTED', "Uspješno uvezena tarifa");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORT_FAILED', "Uvoz tarife nije uspio");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_SETTINGS_FAILED_VALIDATION', "Nije moguće potvrditi postavke svojstva, pokušala se uvesti neprepoznata postavka svojstva");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_PAGETITLE', "Uvezena svojstva");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_PROPERTY_NAME', "Naziv nekretnine");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_CHANNEL_NAME', "Naziv kanala");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_LOCAL_PROPERTY_UID', "Uid lokalnog vlasništva");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_REMOTE_PROPERTY_UID', "Uid udaljenog svojstva");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_EDIT_REMOTE_PROPERTY', "Uređivanje daljinskog upravljača");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_EDIT_LOCAL_PROPERTY', "Prikaži lokalno");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_DELETE_LOCAL_PROPERTY', "Delete local");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MENUITEM_DASHBOARD', "Nadzorna ploča");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MENUITEM_ACCOUNTS', "Računi kanala");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_THIN_CHANNELS_NOT_INSTALLED', "Nema instaliranih dodataka za tanke kanale, još ne možete koristiti ovu značajku.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_INFO', "Nedodijeljena svojstva kojima upravljate mogu se dodijeliti kanalu. Ako promijenite kanal, dajete bilo koji kanal s važećim API pristupom");