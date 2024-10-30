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

jr_define ('_OAUTH_SCOPE_CHANNEL_MANAGEMENT', "Kanalstyring");
jr_define ('_OAUTH_SCOPE_CHANNEL_MANAGEMENT_DESC', "Kunden kan udføre kanalstyringsaktiviteter. Bemærk, dette giver klienten betydelig magt i systemet til at ændre dine konti og ejendomme.");

jr_define ('_OAUTH_SCOPE_CHANNEL_MANAGEMENT_CLEANING_PRICE', "Rengøring");

jr_define ('_CMF_CANCELLED_BOOKING', "Kanalmanager annulleret booking");

jr_define ('_CMF_CLEANING_STRING', "Rengøring"); // Ændr ikke dette, hvis du allerede har importeret ejendomme. Ejendomme med rengøringsgebyrer har en ekstra med dette navn
jr_define ('_CMF_SECURITY_STRING', "Depositum"); // Ændr ikke dette, hvis du allerede har importeret ejendomme. Ejendomme med sikkerhedsindskud har en ekstra med dette navn


jr_define ('_CMF_API_PRIVACY', "API Privacy");
jr_define ('_CMF_API_PRIVACY_ON', "Privacy on");
jr_define ('_CMF_API_PRIVACY_OFF', "Beskyttelse af personlige oplysninger");

jr_define ('_CMF_API_PRIVACY_DESC', "En egenskabs oplysninger kan kun ses af kanalen, der oprettede den. Hvis du f.eks. har givet forskellige API -nøglepar til både kanal A og kanal B, kan informationen om en ejendom, der er oprettet af kanal A, ikke blive set af kanal B ... medmindre du deaktiverer API -fortrolighed for at give alle kanaler mulighed for at se alle oplysninger om ejendommen via API'en. Sæt API -fortrolighed til Fra, hvis du deler denne ejendom med et andet websted, der ønsker at angive ejendommen. Hvis du ikke deler denne ejendom med andre websteder, skal du lade API -fortrolighed være sat til. ");