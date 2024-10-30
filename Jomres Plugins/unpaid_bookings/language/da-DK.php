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


jr_define('_JRPORTAL_UNPAID_BOOKINGS_TITLE',"Ubetalt bookinghåndtering");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_DELETEORCANCEL',"Annuller eller slet de foreløbige (ubetalte) reservationer? ");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_NR_DAYS_TITLE',"Alfer hvor mange dage fra bookingtidspunktet? ");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_INSTRUCTIONS',"Dette plugin kører automatisk i baggrunden og sletter eller annullerer alle foreløbige reservationer, der ikke er markeret som betalte inden for et interval efter eget valg. Dette er nyttigt, når du accepterer reservationer, der betales ved hjælp af offline betalingsmetoder (overførsel). overførsel, check). Hvis en reservation ikke betales inden for X antal dage fra det tidspunkt, hvor reservationen blev foretaget, slettes eller annulleres reservationen, og kalenderen vil vise de reserverede datoer som tilgængelige, så en anden kan booke disse dage Når en reservation slettes eller annulleres, vil både du og gæsten modtage en meddelelse via e-mail. Hvis du vælger at annullere en reservation, vil reservationen og dens faktura blive markeret som annulleret og vil ikke blive slettet fra databasen , så du kan få adgang til dem senere. Hvis du vælger at slette den, vil reservationen og dens faktura blive slettet fra databasen.");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_EMAIL_TITLE',"Booking annulleret");
jr_define('_JOMRES_EMAIL_CANCEL_BOOKING_MSGBODY1',"Din reservation er automatisk blevet annulleret på grund af manglende betaling af det påkrævede depositum. Dette er ikke længere en gyldig reservation. Hvis du gerne vil booke igen, bedes du besøge vores hjemmeside og gentage reservationen. Følgende er annullerede reservationsdetaljer.");
jr_define('_JOMRES_EMAIL_CANCEL_BOOKING_MSGBODY2',"Hvis du føler, at du har modtaget denne meddelelse ved en fejl, så tøv ikke med at kontakte os.");