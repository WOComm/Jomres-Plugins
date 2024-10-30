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
jr_define ('_JOMRES_BOOKING_INQUIRY_HEMAIL_TITLE', "E -postemne");
jr_define ('_JOMRES_BOOKING_REJECTION_HCONTENT', "E -posttekst (du kan redigere denne teksten for å fylle ut en grunn til å avvise denne bestillingen, tilby alternativer, etc.)");
jr_define ('_JOMRES_BOOKING_REJECTION_INSTRUCTIONS', "Denne bestillingsforespørselen blir avvist og kansellert. Følgende e -post sendes til kunden.");
jr_define ('_JOMRES_BOOKING_REJECTION_IMPOSSIBLE', "Denne bookingforespørselen kan ikke avvises fordi den allerede har blitt avvist eller godkjent.");
jr_define ('_JOMRES_BOOKING_APPROVAL_HCONTENT', "E -posttekst (du kan redigere denne teksten for å fylle ut betalingsinstruksjoner for denne bestillingen, etc.)");
jr_define ('_JOMRES_BOOKING_APPROVAL_INSTRUCTIONS', "Denne bestillingsforespørselen godtas og tilgjengeligheten oppdateres i kalenderen. Følgende e -post sendes til kunden.");
jr_define ('_JOMRES_BOOKING_APPROVAL_IMPOSSIBLE', "Denne bookingforespørselen kan ikke godkjennes fordi den allerede har blitt avvist eller godkjent.");
jr_define ('_JOMRES_ADMIN_NEWENQUIRY_EMAILNAME', "Nettstedadministrator Ny forespørsel -e -post");
jr_define ('_JOMRES_ADMIN_NEWENQUIRY_EMAILDESC', "E -post sendt til nettstedets administrator ved bestillingstidspunktet hvis bestillingen krever godkjenning først og global PayPal -gateway er aktivert");
jr_define ('_JOMRES_HOTEL_NEWENQUIRY_EMAILNAME', "Hotel New Inquiry Email");
jr_define ('_JOMRES_HOTEL_NEWENQUIRY_EMAILDESC', "E -post sendt til hotellet ved bestillingstidspunktet hvis bestillingen krever godkjenning først");
jr_define ('_JOMRES_GUEST_NEWENQUIRY_EMAILNAME', "Ny forespørsel om forespørsel");
jr_define ('_JOMRES_GUEST_NEWENQUIRY_EMAILDESC', "E -post sendt til gjesten ved bestillingstidspunktet hvis bestillingen krever godkjenning først");
jr_define ('_JOMRES_GUEST_APPROVEENQUIRY_EMAILNAME', "E -post om godkjenning av forespørsel fra gjester");
jr_define ('_JOMRES_GUEST_APPROVEENQUIRY_EMAILDESC', "E -post manuelt sendt til gjest av eiendomsforvalteren for å bekrefte tilgjengelighet for en forespørsel");
jr_define ('_JOMRES_GUEST_REJECTENQUIRY_EMAILNAME', "E -post om avvisning av gjestenes forespørsel");
jr_define ('_JOMRES_GUEST_REJECTENQUIRY_EMAILDESC', "E -post manuelt sendt til gjest av eiendomsforvalteren hvis eiendommen ikke er tilgjengelig for forespørgselsdetaljer");