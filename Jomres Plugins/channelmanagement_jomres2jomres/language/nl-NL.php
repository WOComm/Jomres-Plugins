<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.24.0
 *
 * @copyright	2005-2021 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/
##################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
##################################################################



jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_TITLE',"Jomres 2 Jomres-integratie");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_TITLE',"Client-ID van de hoofdsite");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_DESC',"De client-ID van de bovenliggende site. Op de bovenliggende site heeft u een uniek client-ID en geheim nodig met alle api-functie-plug-ins geïnstalleerd, de Channel Management Framework-plug-in geïnstalleerd en wanneer u de client-ID maakt/bewerkt/ geheim sleutelpaar dat u nodig heeft om het toegang te geven tot alle beschikbare scopes.");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_TITLE',"Klantgeheim van de hoofdsite");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_DESC',"Het clientgeheim van de bovenliggende site");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENTSITE_TITLE',"Ouder-URL");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENTSITE_DESC',"De url naar de bovenliggende Jomres-site. ");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_NOT_SET',"Fout, de client-ID van de bovenliggende site is niet ingesteld. Ga naar het tabblad Siteconfiguratie > Channel Manager-accounts om uw client-ID op te slaan.");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_NOT_SET',"Fout, het geheim van je bovenliggende site is niet ingesteld. Ga naar het tabblad Siteconfiguratie > Channel Manager-accounts om je geheim op te slaan.");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENT_NOT_SET',"Fout, de geheime url van uw bovenliggende site is niet ingesteld. Ga naar het tabblad Siteconfiguratie > Kanaalbeheeraccounts om uw bovenliggende site-url op te slaan.");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_NOT_SET_ADMIN_SANITY_CHECK_MESSAGE',"Fout, uw klant-ID is niet ingesteld. Ga naar het tabblad Siteconfiguratie > Channel Manager-accounts om uw gebruikersnaam op te slaan.");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_NOT_SET_ADMIN_SANITY_CHECK_MESSAGE',"Fout, uw klant-ID is niet ingesteld. Ga naar het tabblad Siteconfiguratie > Channel Manager-accounts om uw wachtwoord op te slaan.");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_TITLE',"Kanaal instellen");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_MESSAGE',"Jomres 2 Jomres: nieuwe eigenschappen importeren.");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_BUTTON_IMPORT',"IMPORT");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_BUTTON_EXPORT',"EXPORT");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_PROPERTYID_NOTSET',"Eigenschap-ID niet ingesteld");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET',"Toegewezen woordenboekitems niet ingesteld");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_PROPERTYTYPE_NOTFOUND',"Lokaal eigenschapstype niet gevonden. Als het eigenschapstype is aangemaakt, zorg er dan voor dat u het eigenschapstype van de externe service hebt toegewezen aan het lokale eigenschapstype.");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_REMOTEPROPERTYTYPE_NOTFOUND',"Externe eigenschapstype niet geretourneerd door kanaal.");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_LOCAL_PROPERTYTYPE_NOTFOUND',"Lokaal eigenschapstype niet doorgegeven.");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_BOOKING_MODEL_NOT_FOUND',"Kon het boekingsmodel (mrp of srp) niet bepalen.");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_BOOKING_MODEL_NOT_FOUND_IN_PROPERTY_TYPE',"Kon het boekingsmodel (mrp of srp) niet bepalen na het vinden van het eigendomstype-ID.");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_COUNTRY_CODE_NOT_FOUND',"Kon de landcode niet bepalen");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_REGION_ID_NOT_FOUND',"Kon regio-ID niet bepalen");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_VALIDATE_SETTINGS_FAILED',"Kon de instellingenmatrix niet goed valideren");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_PTYPES',"Eigenschapstypen niet toegewezen door beheerder");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_PFEATURES',"Eigenschapsfuncties niet toegewezen door beheerder");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_ROOM_TYPES',"Kamertypes niet toegewezen door beheerder");
