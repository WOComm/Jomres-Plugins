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

jr_define ('JOMRES_COUPONS_SCAN', "Naskenujte tento kód do telefonu a rezervujte hned!");
jr_define ('JOMRES_COUPONS_GETADISCOUNT', "Získejte slevu na");
jr_define ('JOMRES_COUPONS_PERCENT', "%");
jr_define ('JOMRES_COUPONS_OFFACCOMMODATION', "sleva na ceně ubytování");
jr_define ('JOMRES_COUPONS_IFYOUBOOKBETWEEN', "pokud rezervujete mezi");
jr_define ('JOMRES_COUPONS_AND', "a");
jr_define ('JOMRES_COUPONS_FORDATESBETWEEN', "pro data mezi");
jr_define ('JOMRES_COUPONS_ALTERNATIVELY', "Alternativně zadejte tento slevový kód při rezervaci:");
jr_define ('JOMRES_COUPONS_PRINT_COUPONS', "Tisk kupónů");

jr_define ('_JRPORTAL_COUPONS_BOOKING_VALIDFROM', 'rezervace platná od');
jr_define ('_JRPORTAL_COUPONS_BOOKING_VALIDTO', 'rezervace platná do');
jr_define ('_JRPORTAL_COUPONS_GUESTNAME', 'jméno hosta');
jr_define ('_JRPORTAL_COUPONS_DESC_478', "Slevové kódy lze generovat a předávat hostům jako pobídku k rezervacím. <br/>
Platné od a do data se vztahují k datům, ve kterých je možné provést rezervaci, zatímco rezervace platná od/do data se vztahují k datům, která rezervace musí zahrnovat, aby byl kupón platný. Pokud rezervace spadá mimo toto období, budou pro dny mimo toto období platit normální ceny. <br/>
Pokud chcete, aby rezervace byla k dispozici pro jednoho konkrétního hosta, vyberte v rozevíracím seznamu jméno tohoto hosta a omezte kupón pouze na tohoto hosta. ");
jr_define ('_JRPORTAL_COUPONS_DESC_ADMIN', "Zde vytvořené slevové kódy se budou vztahovat na všechny nemovitosti na webu.");
jr_define ('_JRPORTAL_COUPONS_BOOKING_DISCOUNT_FEEDBACK', 'S vaším kupónem byla tato rezervace zlevněna');
jr_define ('_JRPORTAL_COUPONS_BOOKING_DISCOUNT_FEEDBACK_TO', ' to ');