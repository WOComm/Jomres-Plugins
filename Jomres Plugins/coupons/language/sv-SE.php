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


jr_define ('JOMRES_COUPONS_SCAN', "Skanna den här koden till din telefon och boka nu!");
jr_define ('JOMRES_COUPONS_GETADISCOUNT', "Få rabatt på");
jr_define ('JOMRES_COUPONS_PERCENT', "%");
jr_define ('JOMRES_COUPONS_OFFACCOMMODATION', "av kostnaden för ditt boende");
jr_define ('JOMRES_COUPONS_IFYOUBOOKBETWEEN', "om du bokar mellan");
jr_define ('JOMRES_COUPONS_AND', "och");
jr_define ('JOMRES_COUPONS_FORDATESBETWEEN', "för datum mellan");
jr_define ('JOMRES_COUPONS_ALTERNATIVELY', "Alternativt kan du ange rabattkoden när du gör din bokning:");
jr_define ('JOMRES_COUPONS_PRINT_COUPONS', "Skriv ut kuponger");

jr_define ('_JRPORTAL_COUPONS_BOOKING_VALIDFROM', 'Bokning giltig från');
jr_define ('_JRPORTAL_COUPONS_BOOKING_VALIDTO', 'Bokning giltig till');
jr_define ('_JRPORTAL_COUPONS_GUESTNAME', 'Gästnamn');
jr_define ('_JRPORTAL_COUPONS_DESC_478', "Rabattkoder kan genereras och skickas till gästerna som ett incitament att göra bokningar. <br/>
Giltiga från och till datum avser de datum som en bokning kan göras på, medan bokningen giltig från/till datum hänvisar till de datum som bokningen måste täcka för att kupongen ska vara giltig. Om en bokning faller utanför den perioden gäller normala priser för dagarna utanför den perioden. <br/>
Om du vill att bokningen ska vara tillgänglig för en specifik gäst, välj den gästens namn i rullgardinsmenyn för att begränsa kupongen till endast den gästen. ");
jr_define ('_JRPORTAL_COUPONS_DESC_ADMIN', "Rabattkoder som skapas här gäller för alla fastigheter på webbplatsen.");
jr_define ('_JRPORTAL_COUPONS_BOOKING_DISCOUNT_FEEDBACK', 'Med din kupong har denna bokning rabatterats från');
jr_define ('_JRPORTAL_COUPONS_BOOKING_DISCOUNT_FEEDBACK_TO', ' to ');