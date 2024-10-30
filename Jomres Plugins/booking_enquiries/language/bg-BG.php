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

jr_define ('_JOMRES_BOOKING_INQUIRY_HEMAIL_TITLE', "Тема на имейла");
jr_define ('_JOMRES_BOOKING_REJECTION_HCONTENT', "Текст на имейл (можете да редактирате този текст, за да попълните причина за отхвърляне на тази резервация, да предложите алтернативи и т.н.)");
jr_define ('_JOMRES_BOOKING_REJECTION_INSTRUCTIONS', "Това запитване за резервация ще бъде отхвърлено и отменено. Следният имейл ще бъде изпратен на клиента.");
jr_define ('_JOMRES_BOOKING_REJECTION_IMPOSSIBLE', "Това запитване за резервация не може да бъде отхвърлено, тъй като вече е отхвърлено или одобрено.");
jr_define ('_JOMRES_BOOKING_APPROVAL_HCONTENT', "Текст на имейл (можете да редактирате този текст, за да попълните инструкции за плащане за тази резервация и т.н.)");
jr_define ('_JOMRES_BOOKING_APPROVAL_INSTRUCTIONS', "Това запитване за резервация ще бъде прието и наличността ще бъде актуализирана в календара. Следният имейл ще бъде изпратен на клиента.");
jr_define ('_JOMRES_BOOKING_APPROVAL_IMPOSSIBLE', "Това запитване за резервация не може да бъде одобрено, тъй като вече е отхвърлено или одобрено.");
jr_define ('_JOMRES_ADMIN_NEWENQUIRY_EMAILNAME', "Администратор на сайта Нов имейл за запитване");
jr_define ('_JOMRES_ADMIN_NEWENQUIRY_EMAILDESC', "Имейл, изпратен до администратора на сайта по време на резервацията, ако резервацията изисква първо одобрение и глобалният paypal шлюз е активиран");
jr_define ('_JOMRES_HOTEL_NEWENQUIRY_EMAILNAME', "Имейл за ново запитване за хотел");
jr_define ('_JOMRES_HOTEL_NEWENQUIRY_EMAILDESC', "Имейл, изпратен до хотела по време на резервацията, ако резервацията изисква първо одобрение");
jr_define ('_JOMRES_GUEST_NEWENQUIRY_EMAILNAME', "Имейл за ново запитване за гости");
jr_define ('_JOMRES_GUEST_NEWENQUIRY_EMAILDESC', "Имейл, изпратен на госта по време на резервацията, ако резервацията изисква първо одобрение");
jr_define ('_JOMRES_GUEST_APPROVEENQUIRY_EMAILNAME', "Имейл за одобрение на запитване за гости");
jr_define ('_JOMRES_GUEST_APPROVEENQUIRY_EMAILDESC', "Имейл, изпратен ръчно до госта от мениджъра на имота, за да потвърди наличността за запитване");
jr_define ('_JOMRES_GUEST_REJECTENQUIRY_EMAILNAME', "Имейл за отхвърляне на запитване за гости");
jr_define ('_JOMRES_GUEST_REJECTENQUIRY_EMAILDESC', "Имейл, изпратен ръчно до госта от мениджъра на имота, ако имотът не е наличен за подробности за запитването");