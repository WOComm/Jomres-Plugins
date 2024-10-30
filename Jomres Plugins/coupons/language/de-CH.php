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

jr_define('JOMRES_COUPONS_SCAN',"Scannen Sie diesen Code in Ihr Telefon und buchen Sie jetzt!");
jr_define('JOMRES_COUPONS_GETADISCOUNT',"Erhalte einen Rabatt von");
jr_define('JOMRES_COUPONS_PERCENT',"%");
jr_define('JOMRES_COUPONS_OFFACCOMMODATION'," von den Kosten Ihrer Unterkunft");
jr_define('JOMRES_COUPONS_IFYOUBOOKBETWEEN',"wenn Sie zwischendurch buchen");
jr_define('JOMRES_COUPONS_AND'," und ");
jr_define('JOMRES_COUPONS_FORDATESBETWEEN'," für Daten zwischen ");
jr_define('JOMRES_COUPONS_ALTERNATIVELY',"Alternativ geben Sie diesen Rabattcode bei der Buchung ein: ");
jr_define('JOMRES_COUPONS_PRINT_COUPONS',"Gutscheine drucken");

jr_define('_JRPORTAL_COUPONS_BOOKING_VALIDFROM', 'Buchung gültig ab');
jr_define('_JRPORTAL_COUPONS_BOOKING_VALIDTO', 'Buchung gültig bis');
jr_define('_JRPORTAL_COUPONS_GUESTNAME', 'Gastname');
jr_define('_JRPORTAL_COUPONS_DESC_478', "Rabattcodes können generiert und als Anreiz zur Buchung an Gäste weitergegeben werden.<br/>
Gültig ab- und bis-Daten beziehen sich auf die Daten, an denen eine Buchung vorgenommen werden kann, während sich die Buchungs-Gültig ab/bis-Daten auf die Daten beziehen, die die Buchung abdecken muss, damit der Gutschein gültig ist. Wenn eine Buchung außerhalb dieses Zeitraums liegt, gelten die normalen Preise für die Tage außerhalb dieses Zeitraums.<br/>
Wenn die Buchung für einen bestimmten Gast verfügbar sein soll, wählen Sie den Namen dieses Gastes in der Dropdown-Liste aus, um den Gutschein nur auf diesen Gast zu beschränken.");
jr_define('_JRPORTAL_COUPONS_DESC_ADMIN', "Hier erstellte Rabattcodes gelten für alle Unterkünfte auf der Website.");
jr_define('_JRPORTAL_COUPONS_BOOKING_DISCOUNT_FEEDBACK', 'Mit Ihrem Gutschein wurde diese Buchung von ');
jr_define('_JRPORTAL_COUPONS_BOOKING_DISCOUNT_FEEDBACK_TO', ' bis ');