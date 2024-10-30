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

jr_define('_JRPORTAL_WIRE_TRANSFER',"Бейнтовий переказ");
jr_define('_JRPORTAL_WIRE_TRANSFER_TITLE',"Налаштування банківського переказу");
jr_define('_JRPORTAL_WIRE_TRANSFER_ADMIN_INSTRUCTIONS',"Тут ви можете визначити реквізити банківського рахунку, які використовуватимуться для всіх властивостей, для яких увімкнено шлюз банківських переказів. Якщо ви вирішите замінити реквізити банківського рахунку, встановлені у інтерфейсі, тоді наведені тут деталі будуть Якщо ви вирішили цього не робити, то використовуватимуться реквізити банківського рахунку, визначені в конфігурації інтерфейсного шлюзу.");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_OVERRIDE_ACTIVE',"Замінити реквізити банківського рахунку, встановлені для всіх властивостей? ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_ACCOUNT_HOLDER',"Власник рахунку: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_IBAN',"IBAN: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_SWIFT',"SWIFT-код: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_BIC',"BIC-код: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_NAME',"Назва банку: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_ACCOUNT_HOLDER1',"Власник рахунку: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_IBAN1',"IBAN: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_SWIFT1',"SWIFT-код: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_BIC1',"BIC-код: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_NAME1',"Назва банку: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_ACCOUNT_HOLDER2',"Власник рахунку: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_IBAN2',"IBAN: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_SWIFT2',"SWIFT-код: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_BIC2',"BIC-код: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_NAME2',"Назва банку: ");
jr_define('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_EMAIL_TITLE',"Реквізити платежу для вашого бронювання на ");
jr_define('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_EMAIL_HELLO',"Шановний ");
jr_define('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_EMAIL_THANKYOU',"Дякуємо за бронювання на ");
jr_define('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_SENDDEPOSITTO',"Щоб захистити ваше бронювання, будь ласка, перекажіть ваш депозит у розмірі ");
jr_define('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_BELOWADDRESS_EMAIL'," на банківський рахунок нижче.");
jr_define('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_BELOWADDRESS'," на банківський рахунок нижче. Копія інформації банківського рахунку також буде надіслана вам електронною поштою після того, як ви подасте це бронювання.");
jr_define('_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_CONTACTUS1',"Якщо у вас виникли запитання, будь ласка, не соромтеся звертатися до нас. Ви можете зателефонувати нам за ");
jr_define('_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_CONTACTUS2'," або електронний лист на адресу ");
jr_define('_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_CONTACTUS_EMAIL',"Якщо у вас виникли запитання, не соромтеся звертатися до нас.");
jr_define('_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_PRINT',"Друк реквізитів банківського рахунку");
jr_define('_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_SUBMIT',"Надіслати");