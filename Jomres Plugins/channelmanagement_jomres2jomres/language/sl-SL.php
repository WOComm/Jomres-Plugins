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

jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_TITLE', "Integracija Jomresa 2 Jomresa");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_TITLE', "ID odjemalca starševskega spletnega mesta");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_DESC', "ID odjemalca nadrejenega spletnega mesta. Na nadrejenem spletnem mestu boste potrebovali edinstven ID odjemalca in skrivnost z nameščenimi vsemi vtičniki za API, vtičnikom Channel Management Framework in ko ustvarite/uredite ID odjemalca/ par tajnih ključev, ki mu boste morali omogočiti dostop do vseh razpoložljivih področij. ");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_TITLE', "Skrivnost odjemalca starševskega spletnega mesta");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_DESC', "Skrivnost odjemalca nadrejenega spletnega mesta");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENTSITE_TITLE', "Starševski URL");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENTSITE_DESC', "URL na nadrejeno spletno mesto Jomres.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_NOT_SET', "Napaka, ID odjemalca vašega starševskega mesta ni nastavljen. Obiščite zavihek Konfiguracija spletnega mesta> Računi upravitelja kanalov, da shranite ID odjemalca.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_NOT_SET', "Napaka, skrivnost vašega starševskega mesta ni nastavljena. Obiščite zavihek Konfiguracija spletnega mesta> Računi upravitelja kanalov, da shranite svojo skrivnost.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENT_NOT_SET', "Napaka, skrivni URL vašega starševskega spletnega mesta ni nastavljen. Obiščite zavihek Konfiguracija spletnega mesta> Računi upravitelja kanalov, če želite shraniti URL svojega nadrejenega spletnega mesta.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_NOT_SET_ADMIN_SANITY_CHECK_MESSAGE', "Napaka, vaš ID odjemalca ni nastavljen. Obiščite Konfiguracija spletnega mesta> Zavihek Računi upravitelja kanalov, da shranite svoje uporabniško ime.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_NOT_SET_ADMIN_SANITY_CHECK_MESSAGE', "Napaka, vaš ID odjemalca ni nastavljen. Obiščite Konfiguracija spletnega mesta> Zavihek Računi upravitelja kanalov, da shranite geslo.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_TITLE', "Nastavitev kanala");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_MESSAGE', "Jomres 2 Jomres: Uvozi nove lastnosti.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_BUTTON_IMPORT', "IMPORT");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_BUTTON_EXPORT', "EXPORT");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_PROPERTYID_NOTSET', "ID lastnosti ni nastavljen");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET', "Preslikani slovarski elementi niso nastavljeni");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_PROPERTYTYPE_NOTFOUND', "Vrsta lokalne lastnine ni najdena. Če je bila vrsta lastnosti ustvarjena, se prepričajte, da ste preslikali vrsto lastnosti oddaljene storitve v lokalno vrsto lastnosti.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_REMOTEPROPERTYTYPE_NOTFOUND', "Vrsta lastnine na daljavo ni vrnjena po kanalu.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_LOCAL_PROPERTYTYPE_NOTFOUND', "Vrsta lokalne lastnine ni prenesena.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_BOOKING_MODEL_NOT_FOUND', "Model rezervacije ni mogoče določiti (mrp ali srp).");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_BOOKING_MODEL_NOT_FOUND_IN_PROPERTY_TYPE', "Modela rezervacije (mrp ali srp) ni bilo mogoče določiti, potem ko smo našli ID vrste nepremičnine.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_COUNTRY_CODE_NOT_FOUND', "Kode države ni mogoče določiti");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_REGION_ID_NOT_FOUND', "ID regije ni mogoče določiti");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_VALIDATE_SETTINGS_FAILED', "Ni bilo mogoče pravilno preveriti nastavitvenega niza");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_PTYPES', "Vrste lastnosti niso preslikane s strani skrbnika");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_PFEATURES', "Lastnost lastnikov ni preslikana");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_ROOM_TYPES', "Vrste sob, ki jih administrator ne preslika");

