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

jr_define ('_JRPORTAL_PAYMENT_REMINDER_TITLE', "Напомняния за плащане");
jr_define('_JRPORTAL_PAYMENT_REMINDER_NR_DAYS_TITLE1',"Изпращане на имейл с напомняне за плащане..");
jr_define('_JRPORTAL_PAYMENT_REMINDER_NR_DAYS_TITLE2',"..дни след извършване на временната резервация");
jr_define ('_JRPORTAL_PAYMENT_REMINDER_INSTRUCTIONS', "Тази приставка работи автоматично във фонов режим и изпраща имейл с напомняне за плащане до гостите, че са направили предварителни резервации, които не са маркирани като платени в интервал по ваш избор. Това е полезно, когато приемате резервации, които са платени използвайки офлайн методи на плащане (банков превод, чек). Ако резервацията не бъде платена в рамките на X брой дни от момента на извършване на резервацията, тогава на госта се изпраща имейл с напомняне за плащане. Вие също ще получите копие от него . Ако използвате и приставката Временни резервации за обработка на резервации, уверете се, че интервалът, на който искате да изпратите имейл с напомняне за плащане, е поне 1 ден по -малък от този, зададен за изтриване или отмяна на неплатената резервация. ");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_TITLE',"Напомняне за плащане за вашата резервация в ");
jr_define ('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY1', "Имате неплатена резервация в");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY2',"За да подсигурите резервацията си, е необходимо да направите депозит от ");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_BOOKINGNO',"Номер на резервация");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY3',". Моля, свържете се с нас, ако желаете да обсъдим опциите за плащане.<br /><br />Благодаря ви.");