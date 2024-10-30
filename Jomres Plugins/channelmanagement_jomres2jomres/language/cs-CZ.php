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

jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_TITLE', "Integrace Jomres 2 Jomres");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_TITLE', "ID klienta nadřazeného webu");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_DESC', "ID klienta nadřazeného webu. Na nadřazeném webu budete potřebovat jedinečné ID klienta a tajný klíč se všemi nainstalovanými doplňky funkcí api, nainstalovaným pluginem Channel Management Framework a při vytváření/úpravě ID klienta/ pár tajných klíčů, budete mu muset dát přístup ke všem dostupným rozsahům. ");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_TITLE', "Tajemství klienta nadřazeného webu");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_DESC', "Tajemství klienta nadřazeného webu");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENTSITE_TITLE', "rodičovská adresa URL");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENTSITE_DESC', "Adresa URL nadřazeného webu Jomres.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_NOT_SET', "Chyba, vaše ID klienta nadřazeného webu není nastaveno. Přejděte na kartu Konfigurace webu> Účty správce kanálů a uložte si ID klienta.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_NOT_SET', "Chyba, tajný klíč vašeho nadřazeného webu není nastaven. Chcete -li uložit své tajemství, přejděte na kartu Konfigurace webu> Účty správce kanálů.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENT_NOT_SET', "Chyba, vaše tajná adresa URL nadřazeného webu není nastavena. Chcete -li uložit adresu URL svého nadřazeného webu, přejděte na kartu Konfigurace webu> Účty správce kanálů.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_NOT_SET_ADMIN_SANITY_CHECK_MESSAGE', "Chyba, vaše ID klienta není nastaveno. Chcete -li uložit své uživatelské jméno, navštivte stránku Konfigurace webu> Účty správce kanálu.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_NOT_SET_ADMIN_SANITY_CHECK_MESSAGE', "Chyba, vaše ID klienta není nastaveno. Heslo uložte na stránce Konfigurace webu> Účty správce kanálu.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_TITLE', "Nastavení kanálu");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_MESSAGE', "Jomres 2 Jomres: Import nových vlastností.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_BUTTON_IMPORT', "IMPORT");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_BUTTON_EXPORT', "EXPORT");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_PROPERTYID_NOTSET', "ID vlastnosti není nastaveno");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET', "Mapované položky slovníku nejsou nastaveny");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_PROPERTYTYPE_NOTFOUND', "Místní typ vlastnosti nebyl nalezen. Pokud byl vytvořen typ vlastnosti, ujistěte se, že jste namapovali typ vlastnosti vzdálené služby na místní typ.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_REMOTEPROPERTYTYPE_NOTFOUND', "Typ vzdálené vlastnosti nebyl vrácen kanálem.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_LOCAL_PROPERTYTYPE_NOTFOUND', "Typ místní vlastnosti nebyl předán.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_BOOKING_MODEL_NOT_FOUND', "Nelze určit rezervační model (mrp nebo srp).");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_BOOKING_MODEL_NOT_FOUND_IN_PROPERTY_TYPE', "Nelze určit rezervační model (mrp nebo srp) po nalezení ID typu vlastnosti.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_COUNTRY_CODE_NOT_FOUND', "Nelze určit kód země");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_REGION_ID_NOT_FOUND', "Nelze určit region id");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_VALIDATE_SETTINGS_FAILED', "Nelze správně ověřit pole nastavení");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_PTYPES', "Typy vlastností nemapované správcem");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_PFEATURES', "Vlastnosti vlastností nemapované správcem");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_ROOM_TYPES', "Typy místností nemapované správcem");