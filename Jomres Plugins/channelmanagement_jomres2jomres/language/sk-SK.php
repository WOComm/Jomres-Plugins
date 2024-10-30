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

jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_TITLE', "Integrácia Jomres 2 Jomres");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_TITLE', "ID klienta nadradenej lokality");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_DESC', "ID klienta nadradeného servera. Na nadradenom serveri budete potrebovať jedinečné ID a tajomstvo klienta so všetkými nainštalovanými doplnkami funkcií api, nainštalovaným doplnkom Channel Management Framework a pri vytváraní/úprave ID klienta/ pár tajných kľúčov, budete mu musieť poskytnúť prístup ku všetkým dostupným rozsahom. ");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_TITLE', "Tajomstvo klienta nadradeného webu");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_DESC', "Tajomstvo klienta nadradeného webu");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENTSITE_TITLE', "rodičovská adresa URL");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENTSITE_DESC', "Adresa URL nadradeného webu Jomres.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_NOT_SET', "Chyba, ID vášho rodičovského servera nie je nastavené. Prejdite na kartu Konfigurácia webu> Účty správcu kanálov a uložte si ID svojho klienta.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_NOT_SET', "Chyba, tajomstvo vašej nadradenej lokality nie je nastavené. Tajomstvo uložte na kartu Konfigurácia webu> Účty správcu kanálov.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENT_NOT_SET', "Chyba, vaša tajná adresa URL nadradenej lokality nie je nastavená. Navštívte kartu Konfigurácia webu> Účty správcu kanálov a uložte svoju nadradenú webovú adresu.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_NOT_SET_ADMIN_SANITY_CHECK_MESSAGE', "Chyba, vaše ID klienta nie je nastavené. Navštívte kartu Konfigurácia webu> Účty správcu kanála a uložte svoje používateľské meno.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_NOT_SET_ADMIN_SANITY_CHECK_MESSAGE', "Chyba, vaše ID klienta nie je nastavené. Prejdite na kartu Konfigurácia stránky> Účty správcu kanála a uložte svoje heslo.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_TITLE', "Nastavenie kanála");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_MESSAGE', "Jomres 2 Jomres: Import nových vlastností.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_BUTTON_IMPORT', "IMPORT");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_BUTTON_EXPORT', "EXPORT");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_PROPERTYID_NOTSET', "ID vlastnosti nie je nastavené");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET', "Mapované položky slovníka nie sú nastavené");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_PROPERTYTYPE_NOTFOUND', "Typ lokálneho vlastníctva nebol nájdený. ​​Ak bol typ vlastnosti vytvorený, uistite sa, že ste namapovali typ vlastnosti vzdialenej služby na typ lokálneho majetku.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_REMOTEPROPERTYTYPE_NOTFOUND', "Typ vzdialenej vlastnosti nevrátený kanálom.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_LOCAL_PROPERTYTYPE_NOTFOUND', "Typ lokálneho vlastníctva nebol odovzdaný.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_BOOKING_MODEL_NOT_FOUND', "Nie je možné určiť model rezervácie (mrp alebo srp).");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_BOOKING_MODEL_NOT_FOUND_IN_PROPERTY_TYPE', "Po nájdení ID typu vlastnosti nie je možné určiť model rezervácie (mrp alebo srp).");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_COUNTRY_CODE_NOT_FOUND', "Nepodarilo sa určiť kód krajiny");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_REGION_ID_NOT_FOUND', "Nepodarilo sa určiť ID regiónu");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_VALIDATE_SETTINGS_FAILED', "Nepodarilo sa správne overiť pole nastavení");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_PTYPES', "Typy vlastností nemapované správcom");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_PFEATURES', "Vlastnosti majetku nemapované správcom");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_ROOM_TYPES', "Typy miestností nemapované správcom");