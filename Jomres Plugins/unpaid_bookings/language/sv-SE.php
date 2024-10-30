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


jr_define('_JRPORTAL_UNPAID_BOOKINGS_TITLE',"Obetald bokningshantering");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_DELETEORCANCEL',"Avbryta eller ta bort de preliminära (obetalda) bokningarna? ");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_NR_DAYS_TITLE',"Alfer hur många dagar från bokningstiden? ");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_INSTRUCTIONS',"Detta plugin körs automatiskt i bakgrunden och tar bort eller avbryter alla preliminära bokningar som inte är markerade som betalda inom ett intervall som du väljer. Detta är användbart när du accepterar bokningar som betalas med offlinebetalningsmetoder (överföring). överföring, check). Om en bokning inte betalas inom X antal dagar från det att bokningen gjordes, raderas eller annulleras bokningen och kalendern visar de bokade datumen som tillgängliga, så att någon annan kan boka dessa dagar . När en bokning raderas eller avbokas kommer både du och gästen att få ett meddelande via e-post. Om du väljer att avboka en bokning kommer bokningen och dess faktura att markeras som annullerad och kommer inte att raderas från databasen , så att du kan komma åt dem senare. Om du väljer att ta bort den kommer bokningen och dess faktura att raderas från databasen.");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_EMAIL_TITLE',"Bokning avbruten");
jr_define('_JOMRES_EMAIL_CANCEL_BOOKING_MSGBODY1',"Din bokning har annullerats automatiskt på grund av utebliven betalning av den nödvändiga depositionen. Detta är inte längre en giltig bokning. Om du vill boka igen, besök vår webbplats och gör om bokningen. Följande är avbokad bokningsinformation.");
jr_define('_JOMRES_EMAIL_CANCEL_BOOKING_MSGBODY2',"Om du känner att du fick detta meddelande av misstag, tveka inte att kontakta oss.");