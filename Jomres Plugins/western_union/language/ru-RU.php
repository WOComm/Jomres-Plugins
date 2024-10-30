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

jr_define ('_JRPORTAL_WESTERN_UNION', "Western Union");
jr_define ('_JRPORTAL_WESTERN_UNION_TITLE', "Настройки Western Union");
jr_define ('_JRPORTAL_WESTERN_UNION_ADMIN_INSTRUCTIONS', "Здесь вы можете определить данные учетной записи WU, которые будут использоваться для всех свойств, для которых включен шлюз WU. Если вы решите переопределить данные учетной записи WU, заданные во внешнем интерфейсе, то будут использоваться указанные здесь данные. . Если вы решили не делать этого, будут использоваться данные учетной записи WU, определенные в конфигурации внешнего интерфейса. ");
jr_define ('_JOMRES_WESTERN_UNION_GATEWAY_OVERRIDE_ACTIVE', "Переопределить данные учетной записи WU, установленные для всех свойств?");
jr_define ('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER', "Филиал Western Union:");
jr_define ('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN', "Имя получателя:");
jr_define ('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT', "Идентификатор получателя:");
jr_define ('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC', "Адрес получателя:");
jr_define ('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME', "Другая информация:");
jr_define ('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER1', "Филиал Western Union:");
jr_define ('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN1', "Имя получателя:");
jr_define ('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT1', "Идентификатор получателя:");
jr_define ('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC1', "Адрес получателя:");
jr_define ('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME1', "Другая информация:");
jr_define ('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER2', "Филиал Western Union:");
jr_define ('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN2', "Имя получателя:");
jr_define ('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT2', "Идентификатор получателя:");
jr_define ('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC2', "Адрес получателя:");
jr_define ('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME2', "Другая информация:");
jr_define ('_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_TITLE', "Платежные реквизиты для вашего бронирования в");
jr_define ('_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_HELLO', "Уважаемый");
jr_define ('_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_THANKYOU', "Спасибо за бронирование в");
jr_define ('_JOMRES_CUSTOMTEXT_WESTERN_UNION_SENDDEPOSITTO', "Для защиты бронирования отправьте депозит в размере");
jr_define ('_JOMRES_CUSTOMTEXT_WESTERN_UNION_BELOWADDRESS_EMAIL', "на учетную запись Western Union ниже.");
jr_define ('_JOMRES_CUSTOMTEXT_WESTERN_UNION_BELOWADDRESS', "на учетную запись Western Union, указанную ниже. Копия информации об учетной записи Western Union также будет отправлена ​​вам по электронной почте после того, как вы отправите это бронирование.");
jr_define ('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS1', "Если у вас есть вопросы, не стесняйтесь обращаться к нам. Вы можете нам позвонить");
jr_define ('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS2', "или напишите нам по адресу");
jr_define ('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS_EMAIL', "Если у вас есть вопросы, не стесняйтесь обращаться к нам.");
jr_define ('_JOMRES_WESTERN_UNION_CUSTOMTEXT_PRINT', "Распечатать данные учетной записи Western Union");
jr_define ('_JOMRES_WESTERN_UNION_CUSTOMTEXT_SUBMIT', "Отправить");