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


jr_define ('_JOMRES_BOOKING_INQUIRY_HEMAIL_TITLE', "E -mail -emne");
jr_define ('_JOMRES_BOOKING_REJECTION_HCONTENT', "E -mail -tekst (du kan redigere denne tekst for at udfylde en grund til at afvise denne reservation, tilbyde alternativer osv.)");
jr_define ('_JOMRES_BOOKING_REJECTION_INSTRUCTIONS', "Denne bookingforespørgsel vil blive afvist og annulleret. Følgende e -mail vil blive sendt til kunden.");
jr_define ('_JOMRES_BOOKING_REJECTION_IMPOSSIBLE', "Denne bookingforespørgsel kan ikke afvises, fordi den allerede er blevet afvist eller godkendt.");
jr_define ('_JOMRES_BOOKING_APPROVAL_HCONTENT', "E -mail -tekst (du kan redigere denne tekst for at udfylde betalingsinstruktioner for denne booking osv.)");
jr_define ('_JOMRES_BOOKING_APPROVAL_INSTRUCTIONS', "Denne bookingforespørgsel accepteres og tilgængeligheden opdateres i kalenderen. Følgende e -mail sendes til kunden.");
jr_define ('_JOMRES_BOOKING_APPROVAL_IMPOSSIBLE', "Denne bookingforespørgsel kan ikke godkendes, fordi den allerede er blevet afvist eller godkendt.");
jr_define ('_JOMRES_ADMIN_NEWENQUIRY_EMAILNAME', "Site Admin New Forespørgsel -e -mail");
jr_define ('_JOMRES_ADMIN_NEWENQUIRY_EMAILDESC', "E -mail sendt til webstedsadministrator ved bookingtidspunktet, hvis reservationen kræver godkendelse først, og global PayPal -gateway er aktiveret");
jr_define ('_JOMRES_HOTEL_NEWENQUIRY_EMAILNAME', "Hotel Ny forespørgsel -e -mail");
jr_define ('_JOMRES_HOTEL_NEWENQUIRY_EMAILDESC', "E -mail sendt til hotellet ved reservationstidspunktet, hvis reservationen kræver godkendelse først");
jr_define ('_JOMRES_GUEST_NEWENQUIRY_EMAILNAME', "Gæst ny forespørgsels -e -mail");
jr_define ('_JOMRES_GUEST_NEWENQUIRY_EMAILDESC', "E -mail sendt til gæsten ved reservationstidspunktet, hvis reservationen kræver godkendelse først");
jr_define ('_JOMRES_GUEST_APPROVEENQUIRY_EMAILNAME', "E -mail om godkendelse af gæsteanmodning");
jr_define ('_JOMRES_GUEST_APPROVEENQUIRY_EMAILDESC', "E -mail manuelt sendt til gæst af ejendomsadministratoren for at bekræfte tilgængelighed for en forespørgsel");
jr_define ('_JOMRES_GUEST_REJECTENQUIRY_EMAILNAME', "E -mail om afvisning af gæsteanmodning");
jr_define ('_JOMRES_GUEST_REJECTENQUIRY_EMAILDESC', "E -mail manuelt sendt til gæst af ejendomsadministratoren, hvis ejendommen ikke er tilgængelig for forespørgselsoplysningerne");