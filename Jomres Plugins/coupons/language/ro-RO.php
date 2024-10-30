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


jr_define ('JOMRES_COUPONS_SCAN', "Scanați acest cod în telefon și rezervați acum!");
jr_define ('JOMRES_COUPONS_GETADISCOUNT', "Obțineți o reducere de");
jr_define ('JOMRES_COUPONS_PERCENT', "%");
jr_define ("JOMRES_COUPONS_OFFACCOMMODATION", "reducerea costului de cazare");
jr_define ('JOMRES_COUPONS_IFYOUBOOKBETWEEN', "dacă rezervați între");
jr_define ('JOMRES_COUPONS_AND', "și");
jr_define ('JOMRES_COUPONS_FORDATESBETWEEN', "pentru date între");
jr_define ('JOMRES_COUPONS_ALTERNATIVELY', "Alternativ, introduceți acest cod de reducere la efectuarea rezervării:");
jr_define ('JOMRES_COUPONS_PRINT_COUPONS', "Tipăriți cupoane");

jr_define ('_JRPORTAL_COUPONS_BOOKING_VALIDFROM', 'Rezervare valabilă de la');
jr_define ('_JRPORTAL_COUPONS_BOOKING_VALIDTO', 'Rezervare valabilă la');
jr_define ('_JRPORTAL_COUPONS_GUESTNAME', 'Numele oaspeților');
jr_define ('_JRPORTAL_COUPONS_DESC_478', "Codurile de reducere pot fi generate și transmise clienților ca stimulent pentru a face rezervări. <br/>
Valabil de la și până la date se referă la datele în care se poate face o rezervare, în timp ce rezervarea valabilă de la / până la date se referă la datele pe care rezervarea trebuie să le acopere pentru ca cuponul să fie valid. Dacă o rezervare se încadrează în afara perioadei respective, atunci se vor aplica tarife normale pentru zilele din afara perioadei respective. <br/>
Dacă doriți ca rezervarea să fie disponibilă pentru un anumit oaspete, alegeți numele invitatului în meniul derulant pentru a limita cuponul doar la acel invitat. ");
jr_define ('_JRPORTAL_COUPONS_DESC_ADMIN', "Codurile de reducere create aici vor fi aplicabile tuturor proprietăților de pe site.");
jr_define ('_JRPORTAL_COUPONS_BOOKING_DISCOUNT_FEEDBACK', 'Cu cuponul dvs., această rezervare a fost redusă de la');
jr_define ('_JRPORTAL_COUPONS_BOOKING_DISCOUNT_FEEDBACK_TO', ' la ');