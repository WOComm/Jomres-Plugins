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

jr_define ('JOMRES_COUPONS_SCAN', "Skann denne koden til telefonen og bestill nå!");
jr_define ('JOMRES_COUPONS_GETADISCOUNT', "Få rabatt på");
jr_define ('JOMRES_COUPONS_PERCENT', "%");
jr_define ('JOMRES_COUPONS_OFFACCOMMODATION', "av prisen på overnatting");
jr_define ('JOMRES_COUPONS_IFYOUBOOKBETWEEN', "hvis du bestiller mellom");
jr_define ('JOMRES_COUPONS_AND', "og");
jr_define ('JOMRES_COUPONS_FORDATESBETWEEN', "for datoer mellom");
jr_define ('JOMRES_COUPONS_ALTERNATIVELY', "Alternativt kan du skrive inn denne rabattkoden når du bestiller:");
jr_define ('JOMRES_COUPONS_PRINT_COUPONS', "Skriv ut kuponger");

jr_define ('_JRPORTAL_COUPONS_BOOKING_VALIDFROM', 'Booking valid from');
jr_define ('_JRPORTAL_COUPONS_BOOKING_VALIDTO', 'Booking valid to');
jr_define ('_JRPORTAL_COUPONS_GUESTNAME', 'Gjestens navn');
jr_define ('_JRPORTAL_COUPONS_DESC_478', "Rabattkoder kan genereres og videreformidles til gjester som et insentiv til å gjøre bestillinger. <br/>
Gyldig fra og til datoer refererer til datoene som en bestilling kan gjøres på, mens bestillingen gyldig fra/til datoer refererer til datoene som reservasjonen må dekke for at kupongen skal være gyldig. Hvis en bestilling faller utenfor denne perioden, vil normale priser gjelde for dagene utenfor denne perioden. <br/>
Hvis du vil at bookingen skal være tilgjengelig for en bestemt gjest, velger du den gjestenes navn i rullegardinmenyen for å begrense kupongen til den gjesten. ");
jr_define ('_JRPORTAL_COUPONS_DESC_ADMIN', "Rabattkoder som er opprettet her, vil gjelde for alle eiendommer på nettstedet.");
jr_define ('_JRPORTAL_COUPONS_BOOKING_DISCOUNT_FEEDBACK', 'Med din kupong har denne reservasjonen blitt rabattert fra');
jr_define ('_JRPORTAL_COUPONS_BOOKING_DISCOUNT_FEEDBACK_TO', ' til ' );