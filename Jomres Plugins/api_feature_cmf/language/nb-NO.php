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

jr_define ('_OAUTH_SCOPE_CHANNEL_MANAGEMENT', "Kanalbehandling");
jr_define ('_OAUTH_SCOPE_CHANNEL_MANAGEMENT_DESC', "Klienten kan utføre kanalstyringsaktiviteter. Merk, dette gir klienten betydelig makt i systemet til å endre kontoene og egenskapene dine.");

jr_define ('_OAUTH_SCOPE_CHANNEL_MANAGEMENT_CLEANING_PRICE', "Rengjøring");

jr_define ('_CMF_CANCELLED_BOOKING', "Kanalsjef avbrutt booking");

jr_define ('_CMF_CLEANING_STRING', "Rengjøring"); // Ikke endre dette hvis du allerede har importerte eiendommer. Eiendommer med rengjøringsgebyr har en ekstra med dette navnet
jr_define ('_CMF_SECURITY_STRING', "Depositum"); // Ikke endre dette hvis du allerede har importerte eiendommer. Eiendommer med sikkerhet innskudd har en ekstra med dette navnet


jr_define ('_CMF_API_PRIVACY', "API -personvern");
jr_define ('_CMF_API_PRIVACY_ON', "Personvern på");
jr_define ('_CMF_API_PRIVACY_OFF', "Personvern av");

jr_define ('_CMF_API_PRIVACY_DESC', "Informasjon om en eiendom kan bare sees av kanalen som opprettet den. For eksempel, hvis du har gitt forskjellige API -nøkkelpar til både kanal A og kanal B, kan informasjonen til en eiendom som er opprettet av kanal A ikke bli sett av kanal B ... med mindre du slår av API -personvern for å la alle kanaler se all informasjon om eiendommen gjennom API -et. Sett API -personvern til Av hvis du deler denne eiendommen med et annet nettsted som ønsker å vise eiendommen. Hvis du ikke deler denne eiendommen med andre nettsteder, lar du API -personvern stå på. ");
