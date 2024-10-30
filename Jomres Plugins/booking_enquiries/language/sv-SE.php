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


jr_define ('_JOMRES_BOOKING_INQUIRY_HEMAIL_TITLE', "E -postämne");
jr_define ('_JOMRES_BOOKING_REJECTION_HCONTENT', "E -posttext (du kan redigera den här texten för att fylla i en anledning för att avvisa denna bokning, erbjuda alternativ, etc.)");
jr_define ('_JOMRES_BOOKING_REJECTION_INSTRUCTIONS', "Denna bokningsförfrågan kommer att avvisas och avbokas. Följande e -postmeddelande kommer att skickas till kunden.");
jr_define ('_JOMRES_BOOKING_REJECTION_IMPOSSIBLE', "Denna bokningsförfrågan kan inte avvisas eftersom den redan har avvisats eller godkänts.");
jr_define ('_JOMRES_BOOKING_APPROVAL_HCONTENT', "E -posttext (du kan redigera denna text för att fylla i betalningsinstruktioner för denna bokning, etc.)");
jr_define ('_JOMRES_BOOKING_APPROVAL_INSTRUCTIONS', "Denna bokningsförfrågan accepteras och tillgängligheten uppdateras i kalendern. Följande mejl skickas till kunden.");
jr_define ('_JOMRES_BOOKING_APPROVAL_IMPOSSIBLE', "Denna bokningsförfrågan kan inte godkännas eftersom den redan har avvisats eller godkänts.");
jr_define ('_JOMRES_ADMIN_NEWENQUIRY_EMAILNAME', "Webbplatsadmin Ny förfrågan e -post");
jr_define ('_JOMRES_ADMIN_NEWENQUIRY_EMAILDESC', "E -post skickas till webbplatsadministratören vid bokningstidpunkten om bokningen kräver godkännande först och global PayPal -gateway är aktiverad");
jr_define ('_JOMRES_HOTEL_NEWENQUIRY_EMAILNAME', "Hotel New Inquiry Email");
jr_define ('_JOMRES_HOTEL_NEWENQUIRY_EMAILDESC', "E -post skickas till hotellet vid bokningstidpunkten om bokningen kräver godkännande först");
jr_define ('_JOMRES_GUEST_NEWENQUIRY_EMAILNAME', "Gästens nya förfrågan");
jr_define ('_JOMRES_GUEST_NEWENQUIRY_EMAILDESC', "E -post skickas till gästen vid bokningstillfället om bokningen kräver godkännande först");
jr_define ('_JOMRES_GUEST_APPROVEENQUIRY_EMAILNAME', "E -post för godkännande av gästförfrågan");
jr_define ('_JOMRES_GUEST_APPROVEENQUIRY_EMAILDESC', "E -post skickas manuellt till gästen av fastighetschefen för att bekräfta tillgänglighet för en förfrågan");
jr_define ('_JOMRES_GUEST_REJECTENQUIRY_EMAILNAME', "E -post för avvisning av gästförfrågan");
jr_define ('_JOMRES_GUEST_REJECTENQUIRY_EMAILDESC', "E -post skickas manuellt till gästen av fastighetschefen om egendomen inte är tillgänglig för förfrågningsuppgifterna");