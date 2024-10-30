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



jr_define ('_JOMRES_BOOKING_INQUIRY_HEMAIL_TITLE', "Zadeva e -pošte");
jr_define ('_JOMRES_BOOKING_REJECTION_HCONTENT', "Besedilo e -pošte (to besedilo lahko uredite tako, da vnesete razlog za zavrnitev rezervacije, ponudite druge možnosti itd.)");
jr_define ('_JOMRES_BOOKING_REJECTION_INSTRUCTIONS', "To povpraševanje po rezervaciji bo zavrnjeno in preklicano. Stranki bo poslano naslednje e -poštno sporočilo.");
jr_define ('_JOMRES_BOOKING_REJECTION_IMPOSSIBLE', "Te poizvedbe o rezervaciji ni mogoče zavrniti, ker je bila že zavrnjena ali odobrena.");
jr_define ('_JOMRES_BOOKING_APPROVAL_HCONTENT', "Besedilo e -pošte (to besedilo lahko uredite tako, da izpolnite navodila za plačilo za to rezervacijo itd.)");
jr_define ('_JOMRES_BOOKING_APPROVAL_INSTRUCTIONS', "To povpraševanje po rezervaciji bo sprejeto in razpoložljivost bo posodobljena v koledarju. Stranki bo poslano naslednje e -poštno sporočilo.");
jr_define ('_JOMRES_BOOKING_APPROVAL_IMPOSSIBLE', "Te poizvedbe o rezervaciji ni mogoče odobriti, ker je bila že zavrnjena ali odobrena.");
jr_define ('_JOMRES_ADMIN_NEWENQUIRY_EMAILNAME', "Skrbnik spletnega mesta za novo poizvedbo");
jr_define ('_JOMRES_ADMIN_NEWENQUIRY_EMAILDESC', "E -poštno sporočilo je bilo poslano administratorju spletnega mesta v času rezervacije, če je za rezervacijo najprej potrebna odobritev in je omogočen globalni prehod PayPal");
jr_define ('_JOMRES_HOTEL_NEWENQUIRY_EMAILNAME', "E -poštni naslov za novo povpraševanje za hotel");
jr_define ('_JOMRES_HOTEL_NEWENQUIRY_EMAILDESC', "E -poštno sporočilo, poslano hotelu ob času rezervacije, če je za rezervacijo najprej potrebna odobritev");
jr_define ('_JOMRES_GUEST_NEWENQUIRY_EMAILNAME', "E -poštni naslov za novo poizvedbo za goste");
jr_define ('_JOMRES_GUEST_NEWENQUIRY_EMAILDESC', "E -poštno sporočilo poslano gostu ob rezervaciji, če je za rezervacijo najprej potrebna odobritev");
jr_define ('_JOMRES_GUEST_APPROVEENQUIRY_EMAILNAME', "E -poštni naslov za odobritev poizvedbe gostov");
jr_define ('_JOMRES_GUEST_APPROVEENQUIRY_EMAILDESC', "E -poštno sporočilo, ki ga je upravitelj nepremičnine ročno poslal gostu, da potrdi razpoložljivost za povpraševanje");
jr_define ('_JOMRES_GUEST_REJECTENQUIRY_EMAILNAME', "E -poštni naslov za zavrnitev poizvedbe gostov");
jr_define ('_JOMRES_GUEST_REJECTENQUIRY_EMAILDESC', "E -poštno sporočilo, ki ga je upravitelj nepremičnine ročno poslal gostu, če nepremičnina ni na voljo za podrobnosti poizvedbe");