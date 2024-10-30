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

jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_TITLE', "Enkel bokning");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_DESC', "Svarta bokningar är bokningar som upptar ett rum, rum eller en fastighet, men som inte har några fakturerings- eller fakturadata. Vanligtvis används de för att indikera bokningar som gjorts via ett annat medium (t.ex. telefon). Du skulle skapa svarta bokningar för att säkerställa att dessa resurser inte kan bokas online, antingen av fastighetsförvaltaren eller en gäst. ");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_SELECTAROOM', "Du måste välja minst ett rum.");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_ROOM_BOOKED', "Lyckat bokat.");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_ROOM_NOT_BOOKED', "Det gick inte att boka eftersom det redan har en bokning under den tidsramen.");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_ROOM_BOOKED_BY', "Rum blockerat av");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_INSTRUCTIONS_MRP', "Använd denna kalender för att enkelt svarta bokresurser. Välj ett eller flera rum, klicka sedan på de första och sista datumen för den svarta bokningen och resurserna blir svartbokade. Om den svarta bokningen är för bara en datum, klicka sedan på det datumet två gånger. ");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_INSTRUCTIONS_SRP', "Använd den här kalendern för att enkelt svarta bokresurser. Klicka på de första och sista datumen för den svarta bokningen och resurserna blir svartbokade. Om den svarta bokningen är för bara ett datum klickar du på det datumet två gånger . ");

jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_ADDALL', "Lägg till alla");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_REMOVEALL', "Ta bort allt");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_ITEMSSELCTED', "objekt valda");
