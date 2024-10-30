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
jr_define ('_JOMRES_BOOKING_INQUIRY_HEMAIL_TITLE', "Předmět e -mailu");
jr_define ('_JOMRES_BOOKING_REJECTION_HCONTENT', "Text e -mailu (tento text můžete upravit tak, aby vyplnil důvod odmítnutí této rezervace, nabídnout alternativy atd.)");
jr_define ('_JOMRES_BOOKING_REJECTION_INSTRUCTIONS', "Tento požadavek na rezervaci bude zamítnut a zrušen. Zákazníkovi bude zaslán následující e -mail.");
jr_define ('_JOMRES_BOOKING_REJECTION_IMPOSSIBLE', "Tento požadavek na rezervaci nelze odmítnout, protože již byl odmítnut nebo schválen.");
jr_define ('_JOMRES_BOOKING_APPROVAL_HCONTENT', "Text e -mailu (tento text můžete upravit, abyste vyplnili pokyny k platbě u této rezervace atd.)");
jr_define ('_JOMRES_BOOKING_APPROVAL_INSTRUCTIONS', "Tento rezervační požadavek bude přijat a dostupnost bude aktualizována v kalendáři. Zákazníkovi bude zaslán následující e -mail.");
jr_define ('_JOMRES_BOOKING_APPROVAL_IMPOSSIBLE', "Tento požadavek na rezervaci nelze schválit, protože již byl odmítnut nebo schválen.");
jr_define ('_JOMRES_ADMIN_NEWENQUIRY_EMAILNAME', "Web Admin New Inquiry Email");
jr_define ('_JOMRES_ADMIN_NEWENQUIRY_EMAILDESC', "E -mail odeslaný správci webu v době rezervace, pokud rezervace vyžaduje schválení nejprve a je povolena globální brána paypal");
jr_define ('_JOMRES_HOTEL_NEWENQUIRY_EMAILNAME', "Hotel New Inquiry Email");
jr_define ('_JOMRES_HOTEL_NEWENQUIRY_EMAILDESC', "E -mail odeslaný hotelu v době rezervace, pokud rezervace vyžaduje nejprve schválení");
jr_define ('_JOMRES_GUEST_NEWENQUIRY_EMAILNAME', "E -mail pro nový dotaz");
jr_define ('_JOMRES_GUEST_NEWENQUIRY_EMAILDESC', "E -mail odeslaný hostovi v době rezervace, pokud rezervace vyžaduje nejprve schválení");
jr_define ('_JOMRES_GUEST_APPROVEENQUIRY_EMAILNAME', "E -mail se souhlasem hosta");
jr_define ('_JOMRES_GUEST_APPROVEENQUIRY_EMAILDESC', "E -mail ručně odeslaný hostovi správcem nemovitosti k potvrzení dostupnosti pro dotaz");
jr_define ('_JOMRES_GUEST_REJECTENQUIRY_EMAILNAME', "E -mail o odmítnutí poptávky hostů");
jr_define ('_JOMRES_GUEST_REJECTENQUIRY_EMAILDESC', "E -mail ručně odeslaný hostovi správcem nemovitosti, pokud nemovitost není k dispozici pro podrobnosti dotazu");