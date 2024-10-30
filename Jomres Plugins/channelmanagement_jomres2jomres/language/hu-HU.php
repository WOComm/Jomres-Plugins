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
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_TITLE', "ID klijenta nadređene web lokacije");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_DESC', "ID klijenta nadređene web lokacije. Na roditeljskoj web lokaciji trebat će vam jedinstveni ID klijenta i tajna sa svim instaliranim dodacima za API, instaliran dodatak Framework Management Framework, a kada kreirate/uredite ID klijenta/ par tajnih ključeva morat ćete mu omogućiti pristup svim dostupnim opsezima. ");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_TITLE', "Tajna klijenta nadređene web lokacije");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_DESC', "Tajna klijenta nadređene web lokacije");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENTSITE_TITLE', "Nadređeni URL");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENTSITE_DESC', "URL na nadređenu web lokaciju Jomres.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_NOT_SET', "Pogreška, ID klijenta vaše roditeljske web stranice nije postavljen. Posjetite karticu Konfiguracija web lokacije> Računi upravitelja kanala da biste spremili ID klijenta.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_NOT_SET', "Pogreška, tajna vaše roditeljske web stranice nije postavljena. Posjetite karticu Konfiguracija web lokacije> Računi upravitelja kanala da biste spremili svoju tajnu.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENT_NOT_SET', "Pogreška, tajni URL vaše roditeljske web stranice nije postavljen. Posjetite karticu Konfiguracija web lokacije> Računi upravitelja kanala da biste spremili URL svoje roditeljske web lokacije.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_NOT_SET_ADMIN_SANITY_CHECK_MESSAGE', "Pogreška, vaš ID klijenta nije postavljen. Posjetite Konfiguracija web stranice> Kartica Računi upravitelja kanala da biste spremili svoje korisničko ime.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_NOT_SET_ADMIN_SANITY_CHECK_MESSAGE', "Pogreška, vaš ID klijenta nije postavljen. Posjetite Konfiguracija web stranice> Kartica Računi upravitelja kanala da biste spremili zaporku.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_TITLE', "Postavljanje kanala");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_MESSAGE', "Jomres 2 Jomres: Uvoz novih nekretnina.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_BUTTON_IMPORT', "IMPORT");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_BUTTON_EXPORT', "EXPORT");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_PROPERTYID_NOTSET', "ID svojstva nije postavljen");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET', "Mapirane stavke rječnika nisu postavljene");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_PROPERTYTYPE_NOTFOUND', "Vrsta lokalnog vlasništva nije pronađena. Ako je vrsta svojstva stvorena, provjerite jeste li preslikali vrstu svojstva udaljene usluge u lokalnu vrstu svojstva.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_REMOTEPROPERTYTYPE_NOTFOUND', "Vrsta udaljenog vlasništva nije vraćena putem kanala.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_LOCAL_PROPERTYTYPE_NOTFOUND', "Vrsta lokalnog vlasništva nije proslijeđena.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_BOOKING_MODEL_NOT_FOUND', "Nije moguće odrediti model rezervacije (mrp ili srp).");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_BOOKING_MODEL_NOT_FOUND_IN_PROPERTY_TYPE', "Nije moguće utvrditi model rezervacije (mrp ili srp) nakon pronalaska ID -a vrste nekretnine.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_COUNTRY_CODE_NOT_FOUND', "Nije moguće odrediti kôd zemlje");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_REGION_ID_NOT_FOUND', "Nije moguće odrediti id regije");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_VALIDATE_SETTINGS_FAILED', "Nije moguće ispravno provjeriti niz postavki");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_PTYPES', "Vrste svojstava koje nije mapirao administrator");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_PFEATURES', "Značajke imovine nije mapirao administrator");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_ROOM_TYPES', "Vrste soba nisu mapirane od strane administratora");