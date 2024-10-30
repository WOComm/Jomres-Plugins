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


jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_TITLE', "Jomres 2 Jomres Integration");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_TITLE', "Overordnet webstedsklient -id");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_DESC', "Forældresiteens klient -id. På det overordnede websted har du brug for et unikt klient -id og hemmelighed med alle api -funktions plugins installeret, Channel Management Framework -plugin installeret, og når du opretter/redigerer klient -id/ hemmelige nøglepar, skal du give det adgang til alle tilgængelige omfang. ");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_TITLE', "Overordnet webstedsklienthemmelighed");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_DESC', "Overordnet webstedsklienthemmelighed");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENTSITE_TITLE', "Overordnet url");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENTSITE_DESC', "Webadressen til det overordnede Jomres -websted.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_NOT_SET', "Fejl, dit forældreside -klient -id er ikke angivet. Besøg fanen Webstedskonfiguration> Kanalmanagerkonti for at gemme dit klient -id.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_NOT_SET', "Fejl, din forældresidehemmelighed er ikke angivet. Besøg fanen Webstedskonfiguration> Kanalmanagerkonti for at gemme din hemmelighed.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENT_NOT_SET', "Fejl, din forældresides hemmelige webadresse er ikke angivet. Besøg fanen Webstedskonfiguration> Kanalmanagerkonti for at gemme din overordnede webadresse.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_NOT_SET_ADMIN_SANITY_CHECK_MESSAGE', "Error, your Client id is not set. Visit Site Configuration> Channel Manager Accounts fanen for at gemme dit brugernavn.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_NOT_SET_ADMIN_SANITY_CHECK_MESSAGE', "Error, your Client id is not set. Visit Site Configuration> Channel Manager Accounts fanen for at gemme din adgangskode.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_TITLE', "Kanalopsætning");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_MESSAGE', "Jomres 2 Jomres: Importer nye ejendomme.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_BUTTON_IMPORT', "IMPORT");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_BUTTON_EXPORT', "EXPORT");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_PROPERTYID_NOTSET', "Ejendoms -id ikke angivet");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET', "Tilknyttede ordbogsartikler er ikke angivet");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_PROPERTYTYPE_NOTFOUND', "Lokal ejendomstype ikke fundet. Hvis ejendomstypen er oprettet, skal du sørge for at have tilknyttet fjernbetjeningens ejendomstype til den lokale ejendomstype.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_REMOTEPROPERTYTYPE_NOTFOUND', "Ekstern ejendomstype returneres ikke af kanal.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_LOCAL_PROPERTYTYPE_NOTFOUND', "Lokal ejendomstype ikke bestået.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_BOOKING_MODEL_NOT_FOUND', "Kunne ikke bestemme bookingmodel (mrp eller srp).");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_BOOKING_MODEL_NOT_FOUND_IN_PROPERTY_TYPE', "Kunne ikke bestemme bookingmodel (mrp eller srp) efter at have fundet ejendomstype -id.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_COUNTRY_CODE_NOT_FOUND', "Kunne ikke bestemme landekode");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_REGION_ID_NOT_FOUND', "Kan ikke bestemme område -id");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_VALIDATE_SETTINGS_FAILED', "Kan ikke validere indstillingsmatrix korrekt");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_PTYPES', "Egenskabstyper ikke kortlagt af administrator");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_PFEATURES', "Egenskabsfunktioner ikke kortlagt af administrator");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_ROOM_TYPES', "Rumtyper ikke kortlagt af administrator");