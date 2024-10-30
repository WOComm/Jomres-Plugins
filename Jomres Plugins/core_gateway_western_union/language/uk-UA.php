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

jr_define('_JRPORTAL_WESTERN_UNION',"Western Union");
jr_define('_JRPORTAL_WESTERN_UNION_TITLE',"Налаштування Western Union");
jr_define('_JRPORTAL_WESTERN_UNION_ADMIN_INSTRUCTIONS',"Тут ви можете визначити дані облікового запису WU, які будуть використовуватися для всіх властивостей, для яких увімкнено шлюз WU. Якщо ви вирішите замінити дані облікового запису WU, встановлені у інтерфейсі, тоді використовуватимуться дані, встановлені тут . Якщо ви вирішили цього не робити, то використовуватимуться дані облікового запису WU, визначені в конфігурації шлюзу інтерфейсу.");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_OVERRIDE_ACTIVE',"Перевизначити дані облікового запису WU, встановлені для всіх властивостей? ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER',"Відділення Western Union: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN',"Ім'я бенефіціара: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT',"Ідентифікатор бенефіціара: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC',"Адреса бенефіціара: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME',"Інша інформація: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER1',"Відділення Western Union: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN1',"Ім'я бенефіціара: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT1',"Ідентифікатор бенефіціара: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC1',"Адреса бенефіціара: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME1',"Інша інформація: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER2',"Відділення Western Union: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN2',"Ім'я бенефіціара: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT2',"Ідентифікатор бенефіціара: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC2',"Адреса бенефіціара: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME2',"Інша інформація: ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_TITLE',"Реквізити платежу для вашого бронювання на ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_HELLO',"Шановний ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_THANKYOU',"Дякуємо за бронювання на ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_SENDDEPOSITTO',"Щоб забезпечити ваше бронювання, надішліть депозит у розмірі ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_BELOWADDRESS_EMAIL'," до облікового запису Western Union нижче.");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_BELOWADDRESS'," на вказаний нижче обліковий запис Western Union. Копія інформації облікового запису Western Union також буде надіслана вам електронною поштою після того, як ви надішлете це бронювання.");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS1',"Якщо у вас виникли запитання, будь ласка, не соромтеся звертатися до нас. Ви можете зателефонувати нам на ");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS2'," або напишіть нам на адресу ");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS_EMAIL',"Якщо у вас виникли запитання, не соромтеся звертатися до нас.");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_PRINT',"Друк даних облікового запису Western Union");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_SUBMIT',"Надіслати");

	jr_define('JOMRES_WESTERN_UNION_GATEWAY_WU_CHOSEN',"Гість буде платити через Western Union");
