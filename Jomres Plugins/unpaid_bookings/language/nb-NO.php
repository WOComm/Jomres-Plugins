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
jr_define('_JRPORTAL_UNPAID_BOOKINGS_DELETEORCANCEL',"Avbryte eller slette de foreløpige (ubetalte) bestillingene? ");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_NR_DAYS_TITLE',"Alfer hvor mange dager fra bestillingstidspunktet? ");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_INSTRUCTIONS',"Denne plugin-en kjører automatisk i bakgrunnen og sletter eller kansellerer alle foreløpige bestillinger som ikke er merket som betalte innenfor et intervall du velger. Dette er nyttig når du godtar bestillinger som betales med frakoblede betalingsmåter (overførsel). overføring, sjekk). Hvis en bestilling ikke er betalt innen X antall dager fra tidspunktet da bestillingen ble gjort, slettes eller kanselleres bestillingen og kalenderen vil vise de bestilte datoene som tilgjengelige, slik at noen andre kan bestille disse dagene . Når en bestilling blir slettet eller kansellert, vil både du og gjesten motta et varsel på e-post. Hvis du velger å kansellere en bestilling, vil bestillingen og dens faktura bli merket som kansellert og vil ikke bli slettet fra databasen , slik at du kan få tilgang til dem senere. Hvis du velger å slette den, vil bestillingen og dens faktura bli slettet fra databasen.");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_EMAIL_TITLE',"Bestilling kansellert");
jr_define('_JOMRES_EMAIL_CANCEL_BOOKING_MSGBODY1',"Bestillingen din er automatisk kansellert på grunn av manglende betaling av det nødvendige depositumet. Dette er ikke lenger en gyldig bestilling. Hvis du ønsker å bestille på nytt, vennligst besøk nettstedet vårt og gjør bestillingen på nytt. Følgende er kansellerte bestillingsdetaljer.");
jr_define('_JOMRES_EMAIL_CANCEL_BOOKING_MSGBODY2',"Hvis du føler at du mottok dette varselet ved en feiltakelse, ikke nøl med å kontakte oss.");