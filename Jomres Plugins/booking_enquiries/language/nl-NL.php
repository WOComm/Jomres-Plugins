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




jr_define('_JOMRES_BOOKING_INQUIRY_HEMAIL_TITLE',"E-mail onderwerp");
jr_define('_JOMRES_BOOKING_REJECTION_HCONTENT',"E-mailtekst (u kunt deze tekst bewerken om een ​​reden in te vullen voor het weigeren van deze boeking, alternatieven aanbieden, enz.)");
jr_define('_JOMRES_BOOKING_REJECTION_INSTRUCTIONS',"Deze boekingsaanvraag wordt afgewezen en geannuleerd. De volgende e-mail wordt naar de klant gestuurd.");
jr_define('_JOMRES_BOOKING_REJECTION_IMPOSSIBLE',"Deze boekingsaanvraag kan niet worden afgewezen omdat deze al is afgewezen of goedgekeurd.");
jr_define('_JOMRES_BOOKING_APPROVAL_HCONTENT',"E-mailtekst (u kunt deze tekst bewerken om betalingsinstructies voor deze boeking in te vullen, enz.)");
jr_define('_JOMRES_BOOKING_APPROVAL_INSTRUCTIONS',"Deze boekingsaanvraag wordt geaccepteerd en de beschikbaarheid wordt in de kalender bijgewerkt. De volgende e-mail wordt naar de klant gestuurd.");
jr_define('_JOMRES_BOOKING_APPROVAL_IMPOSSIBLE',"Deze boekingsaanvraag kan niet worden goedgekeurd omdat deze al is afgewezen of goedgekeurd.");
jr_define('_JOMRES_ADMIN_NEWENQUIRY_EMAILNAME',"Sitebeheerder Nieuw e-mailadres voor vragen");
jr_define('_JOMRES_ADMIN_NEWENQUIRY_EMAILDESC',"E-mail verzonden naar sitebeheerder tijdens boeking als de boeking eerst moet worden goedgekeurd en wereldwijde PayPal-gateway is ingeschakeld");
jr_define('_JOMRES_HOTEL_NEWENQUIRY_EMAILNAME',"E-mail voor nieuwe aanvraag voor hotel");
jr_define('_JOMRES_HOTEL_NEWENQUIRY_EMAILDESC',"E-mail die tijdens het boeken naar het hotel wordt gestuurd als de boeking eerst moet worden goedgekeurd");
jr_define('_JOMRES_GUEST_NEWENQUIRY_EMAILNAME',"Nieuwe vraag-e-mail gast");
jr_define('_JOMRES_GUEST_NEWENQUIRY_EMAILDESC',"E-mail die tijdens het boeken naar de gast wordt gestuurd als de boeking eerst moet worden goedgekeurd");
jr_define('_JOMRES_GUEST_APPROVEENQUIRY_EMAILNAME',"E-mail voor goedkeuring van gastaanvraag");
jr_define('_JOMRES_GUEST_APPROVEENQUIRY_EMAILDESC',"E-mail handmatig naar gast gestuurd door de beheerder om de beschikbaarheid voor een aanvraag te bevestigen");
jr_define('_JOMRES_GUEST_REJECTENQUIRY_EMAILNAME',"Gastaanvraag afwijzing e-mail");
jr_define('_JOMRES_GUEST_REJECTENQUIRY_EMAILDESC',"E-mail die handmatig naar de gast wordt gestuurd door de beheerder als de accommodatie niet beschikbaar is voor de aanvraagdetails");