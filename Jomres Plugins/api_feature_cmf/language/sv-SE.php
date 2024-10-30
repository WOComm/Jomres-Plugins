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
//#################################################################
defined('_JOMRES_INITCHECK') or die('');
//#################################################################

jr_define ('_OAUTH_SCOPE_CHANNEL_MANAGEMENT', "Kanalhantering");
jr_define ('_OAUTH_SCOPE_CHANNEL_MANAGEMENT_DESC', "Klienten kan utföra kanalhanteringsaktiviteter. Observera, detta ger klienten betydande makt i systemet att ändra dina konton och egenskaper.");

jr_define ('_OAUTH_SCOPE_CHANNEL_MANAGEMENT_CLEANING_PRICE', "Rengöring");

jr_define ('_CMF_CANCELLED_BOOKING', "Kanalansvarig avbokad bokning");

jr_define ('_CMF_CLEANING_STRING', "Rengöring"); // Ändra inte detta om du redan har importerat egenskaper. Fastigheter med städavgifter har en Extra med detta namn
jr_define ('_CMF_SECURITY_STRING', "Deposition"); // Ändra inte detta om du redan har importerat egenskaper. Fastigheter med depositioner har ett Extra med detta namn


jr_define ('_CMF_API_PRIVACY', "API -sekretess");
jr_define ('_CMF_API_PRIVACY_ON', "Sekretess på");
jr_define ('_CMF_API_PRIVACY_OFF', "Sekretess avstängd");

jr_define ('_CMF_API_PRIVACY_DESC', "En egendoms information kan endast ses av kanalen som skapade den. Om du till exempel har gett olika API -nyckelpar till både kanal A och kanal B, kan informationen om en egenskap som skapats av kanal A inte ses av kanal B ... om du inte stänger av API -sekretess för att alla kanaler ska kunna se all information om egendomen via API: et. Ställ in API -sekretess på Av om du delar den här egenskapen med en annan webbplats som vill lista egendomen. Om du inte delar den här egenskapen med andra webbplatser, lämna API -sekretess till På. ");
