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

jr_define ('_JRPORTAL_WIRE_TRANSFER', "Банковский перевод");
jr_define ('_JRPORTAL_WIRE_TRANSFER_TITLE', "Настройки банковского перевода");
jr_define ('_JRPORTAL_WIRE_TRANSFER_ADMIN_INSTRUCTIONS', "Здесь вы можете определить реквизиты банковского счета, которые будут использоваться для всех свойств, для которых включен шлюз банковских переводов. Если вы решите переопределить реквизиты банковского счета, установленные во внешнем интерфейсе, то указанные здесь данные будут используется. Если вы решили не делать этого, будут использоваться реквизиты банковского счета, указанные в конфигурации внешнего интерфейса. ");
jr_define ('_JOMRES_WIRE_TRANSFER_GATEWAY_OVERRIDE_ACTIVE', "Заменить реквизиты банковского счета, установленные для всех свойств?");
jr_define ('_JOMRES_WIRE_TRANSFER_GATEWAY_ACCOUNT_HOLDER', "Владелец учетной записи:");
jr_define ('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_IBAN', "IBAN:");
jr_define ('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_SWIFT', "Код SWIFT:");
jr_define ('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_BIC', "Код BIC:");
jr_define ('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_NAME', "Название банка:");
jr_define ('_JOMRES_WIRE_TRANSFER_GATEWAY_ACCOUNT_HOLDER1', "Владелец учетной записи:");
jr_define ('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_IBAN1', "IBAN:");
jr_define ('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_SWIFT1', "SWIFT-код:");
jr_define ('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_BIC1', "Код BIC:");
jr_define ('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_NAME1', "Название банка:");
jr_define ('_JOMRES_WIRE_TRANSFER_GATEWAY_ACCOUNT_HOLDER2', "Владелец учетной записи:");
jr_define ('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_IBAN2', "IBAN:");
jr_define ('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_SWIFT2', "SWIFT-код:");
jr_define ('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_BIC2', "Код BIC:");
jr_define ('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_NAME2', "Название банка:");
jr_define ('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_EMAIL_TITLE', "Платежные реквизиты для вашего бронирования в");
jr_define ('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_EMAIL_HELLO', "Уважаемый");
jr_define ('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_EMAIL_THANKYOU', "Спасибо за бронирование в");
jr_define ('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_SENDDEPOSITTO', "Чтобы защитить ваше бронирование, пожалуйста, телеграфируйте ваш депозит в размере");
jr_define ('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_BELOWADDRESS_EMAIL', "на банковский счет ниже.");
jr_define ('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_BELOWADDRESS', "на банковский счет, указанный ниже. Копия информации о банковском счете также будет отправлена ​​вам по электронной почте после того, как вы отправите это бронирование.");
jr_define ('_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_CONTACTUS1', "Если у вас есть вопросы, не стесняйтесь обращаться к нам. Вы можете нам позвонить");
jr_define ('_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_CONTACTUS2', "или напишите нам по адресу");
jr_define ('_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_CONTACTUS_EMAIL', "Если у вас есть какие-либо вопросы, не стесняйтесь обращаться к нам.");
jr_define ('_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_PRINT', "Распечатать реквизиты банковского счета");
jr_define ('_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_SUBMIT', "Отправить");