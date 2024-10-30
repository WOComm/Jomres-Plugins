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
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_TITLE', "Overordnet nettsted -klient -ID");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_DESC', "Det overordnede nettstedets klient -ID. På det overordnede nettstedet trenger du en unik klient -ID og hemmelighet med alle API -funksjoner installert, plugin -modulen for kanalstyring installert, og når du oppretter/redigerer klient -ID/ hemmelige nøkkelpar du må gi den tilgang til alle tilgjengelige omfang. ");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_TITLE', "Hemmelighet for klient for overordnet nettsted");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_DESC', "Hemmeligheten for overordnet nettstedsklient");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENTSITE_TITLE', "Overordnet url");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENTSITE_DESC', "Nettadressen til det overordnede Jomres -nettstedet.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_NOT_SET', "Feil, overordnet nettsted -klient -ID er ikke angitt. Gå til kategorien Nettstedskonfigurasjon> Kanalbehandling for å lagre klient -ID -en din.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_NOT_SET', "Feil, foreldrenettstedets hemmelighet er ikke angitt. Gå til kategorien Nettstedskonfigurasjon> Kanalbehandling for å lagre hemmeligheten din.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENT_NOT_SET', "Feil, den overordnede nettstedets hemmelige url er ikke angitt. Gå til kategorien Nettstedskonfigurasjon> Kanalbehandling for å lagre nettadressen til det overordnede nettstedet.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_NOT_SET_ADMIN_SANITY_CHECK_MESSAGE', "Feil, klient -ID -en din er ikke angitt. Gå til kategorien Nettstedskonfigurasjon> Kanalbehandlingskontoer for å lagre brukernavnet ditt.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_NOT_SET_ADMIN_SANITY_CHECK_MESSAGE', "Feil, klient -ID -en din er ikke angitt. Besøk kategorien Nettstedskonfigurasjon> Kanalbehandlingskontoer for å lagre passordet ditt.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_TITLE', "Kanaloppsett");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_MESSAGE', "Jomres 2 Jomres: Import new properties.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_BUTTON_IMPORT', "IMPORT");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_BUTTON_EXPORT', "EXPORT");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_PROPERTYID_NOTSET', "Egenskaps -ID ikke angitt");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET', "Kartlagte ordlisteelementer er ikke angitt");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_PROPERTYTYPE_NOTFOUND', "Lokal eiendomstype ble ikke funnet. Hvis eiendomstypen er opprettet, må du kontrollere at du har tilordnet egenskapstypen for ekstern tjeneste til den lokale eiendomstypen.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_REMOTEPROPERTYTYPE_NOTFOUND', "Ekstern eiendomstype returneres ikke av kanal.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_LOCAL_PROPERTYTYPE_NOTFOUND', "Type lokal eiendom ikke bestått.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_BOOKING_MODEL_NOT_FOUND', "Kunne ikke bestemme bestillingsmodell (mrp eller srp).");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_BOOKING_MODEL_NOT_FOUND_IN_PROPERTY_TYPE', "Kunne ikke bestemme bestillingsmodell (mrp eller srp) etter å ha funnet egenskapstype -ID.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_COUNTRY_CODE_NOT_FOUND', "Kunne ikke bestemme landskoden");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_REGION_ID_NOT_FOUND', "Kunne ikke bestemme region -ID");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_VALIDATE_SETTINGS_FAILED', "Kunne ikke validere innstillingsmatrisen riktig");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_PTYPES', "Egenskapstyper ikke kartlagt av administrator");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_PFEATURES', "Egenskapsfunksjoner ikke kartlagt av administrator");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_ROOM_TYPES', "Romtyper ikke kartlagt av administrator");