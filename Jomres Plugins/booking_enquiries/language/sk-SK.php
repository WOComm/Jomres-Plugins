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

jr_define ('_JOMRES_BOOKING_INQUIRY_HEMAIL_TITLE', "predmet e -mailu");
jr_define ('_JOMRES_BOOKING_REJECTION_HCONTENT', "Text e -mailu (tento text môžete upraviť tak, aby vyplnil dôvod odmietnutia tejto rezervácie, ponúknuť alternatívy atď.)");
jr_define ('_JOMRES_BOOKING_REJECTION_INSTRUCTIONS', "Tento dopyt po rezervácii bude odmietnutý a zrušený. Zákazníkovi bude odoslaný nasledujúci e -mail.");
jr_define ('_JOMRES_BOOKING_REJECTION_IMPOSSIBLE', "Tento prieskum rezervácie nemožno odmietnuť, pretože už bol odmietnutý alebo schválený.");
jr_define ('_JOMRES_BOOKING_APPROVAL_HCONTENT', "Text e -mailu (tento text môžete upraviť tak, aby ste pri tejto rezervácii vyplnili pokyny k platbe atď.)");
jr_define ('_JOMRES_BOOKING_APPROVAL_INSTRUCTIONS', "Tento dopyt po rezervácii bude prijatý a dostupnosť bude aktualizovaná v kalendári. Nasledujúci e -mail bude odoslaný zákazníkovi.");
jr_define ('_JOMRES_BOOKING_APPROVAL_IMPOSSIBLE', "Tento prieskum rezervácie nemôže byť schválený, pretože už bol odmietnutý alebo schválený.");
jr_define ('_JOMRES_ADMIN_NEWENQUIRY_EMAILNAME', "Správca stránok nový dopytový e -mail");
jr_define ('_JOMRES_ADMIN_NEWENQUIRY_EMAILDESC', "E -mail odoslaný správcovi stránky v čase rezervácie, ak rezervácia vyžaduje schválenie najskôr a je povolená globálna brána paypal");
jr_define ('_JOMRES_HOTEL_NEWENQUIRY_EMAILNAME', "Hotel Nový dopytový e -mail");
jr_define ('_JOMRES_HOTEL_NEWENQUIRY_EMAILDESC', "E -mail odoslaný hotelu v čase rezervácie, ak rezervácia vyžaduje najskôr schválenie");
jr_define ('_JOMRES_GUEST_NEWENQUIRY_EMAILNAME', "hosť nový dopytový e -mail");
jr_define ('_JOMRES_GUEST_NEWENQUIRY_EMAILDESC', "E -mail odoslaný hosťovi v čase rezervácie, ak rezervácia vyžaduje najskôr schválenie");
jr_define ('_JOMRES_GUEST_APPROVEENQUIRY_EMAILNAME', "E -mail so súhlasom hodnotenia hosťa");
jr_define ('_JOMRES_GUEST_APPROVEENQUIRY_EMAILDESC', "E -mail manuálne odoslaný hosťovi správcom nehnuteľnosti na potvrdenie dostupnosti pre dopyt");
jr_define ('_JOMRES_GUEST_REJECTENQUIRY_EMAILNAME', "E -mail o odmietnutí žiadosti hosťa");
jr_define ('_JOMRES_GUEST_REJECTENQUIRY_EMAILDESC', "E -mail ručne odoslaný hosťovi správcom ubytovacieho zariadenia, ak nehnuteľnosť nie je k dispozícii pre podrobnosti o vyšetrovaní");