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

jr_define('_OAUTH_SCOPE_CHANNEL_MANAGEMENT',"Kanaalbeheer");
jr_define('_OAUTH_SCOPE_CHANNEL_MANAGEMENT_DESC',"Klant kan kanaalbeheeractiviteiten uitvoeren. Let op, dit geeft de klant aanzienlijke macht in het systeem om uw accounts en eigendommen te wijzigen.");

jr_define('_OAUTH_SCOPE_CHANNEL_MANAGEMENT_CLEANING_PRICE',"Reiniging");

jr_define('_CMF_CANCELLED_BOOKING',"Kanaalbeheerder heeft boeking geannuleerd");

jr_define('_CMF_CLEANING_STRING',"Reiniging"); // Verander dit niet als je al eigenschappen hebt geïmporteerd. Woningen met schoonmaakkosten hebben een Extra met deze naam
jr_define('_CMF_SECURITY_STRING',"Waarborgsom"); // Verander dit niet als je al eigenschappen hebt geïmporteerd. Woningen met borgsommen hebben een Extra met deze naam


jr_define('_CMF_API_PRIVACY',"API-privacy");
jr_define('_CMF_API_PRIVACY_ON',"Privacy aan");
jr_define('_CMF_API_PRIVACY_OFF',"Privacy uit");

jr_define('_CMF_API_PRIVACY_DESC',"De informatie van een eigenschap kan alleen worden gezien door het kanaal dat deze heeft gemaakt. Als u bijvoorbeeld verschillende API-sleutelparen hebt gegeven aan zowel kanaal A als kanaal B, kan de informatie van een eigenschap die is gemaakt door kanaal A niet worden gezien door kanaal B... tenzij u API-privacy uitschakelt zodat alle kanalen alle informatie over de accommodatie kunnen zien via de API. Stel API-privacy in op Uit als u deze accommodatie deelt met een andere site die de accommodatie wil vermelden. Als u deze eigenschap niet deelt met andere sites, laat u API-privacy op Aan staan.");
