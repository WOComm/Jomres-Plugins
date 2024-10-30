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

jr_define('QUICK_REGISTER_TITLE',"Бърз регистър");
jr_define('QUICK_REGISTER',"Присъединяване");
jr_define('QUICK_REGISTER_BLURB',"Имате ли имот, който искате да посочите? Щракнете тук, за да се присъедините към партито!");
jr_define('QUICK_REGISTER_EMAIL_ADD',"Въведете вашия имейл адрес и ние ще ви помогнем да започнете");
jr_define('QUICK_REGISTER_EMAIL',"Имейл адрес");
jr_define('QUICK_REGISTER_EMAIL_SAVE',"Нека го направим!");
jr_define('QUICK_REGISTER_EMAIL_CLICKLINK',"След като получите имейла си за регистрация, ще можете да влезете и да добавите своята собственост(и) към нашия сайт.");
jr_define('QUICK_REGISTER_EMAIL_THANKS',"Благодаря за регистрацията!");
jr_define('QUICK_REGISTER_EMAIL_THANKS_BLURB',"Трябва да получите имейл скоро, моля, кликнете върху връзката там и ние ще ви преведем през процеса на добавяне на вашия имот към сайта.");
jr_define('QUICK_LOGIN',"Влезте");
jr_define('QUICK_REGISTER_PASSWORD',"Парола");
jr_define('QUICK_REGISTER_WELCOME_EMAIL_TITLE',"Добре дошли в ");
jr_define('QUICK_REGISTER_WELCOME_EMAIL_LOGIN',"Нека да започнем със създаването на първата ви собственост. Първо влезте в сайта чрез тази връзка: ");
jr_define('QUICK_REGISTER_WELCOME_EMAIL_CREATE',"След като сте влезли, посетете тази страница, за да създадете първото си свойство: ");
jr_define('QUICK_REGISTER_WELCOME_EMAIL_DONE',"Сега следвайте инструкциите на екрана и ако имате някакви въпроси, не се колебайте да се свържете с нас тук");
jr_define('QUICK_REGISTER_CONFIG_TITLE',"Показване под лентата с инструменти?");
jr_define('QUICK_REGISTER_CONFIG_DESC',"Ако зададете това на да, тогава бутоните за бърза регистрация ще се показват под лентата с инструменти на нерегистрирани и не влезли потребители. Ако го зададете на не, тогава ще трябва да използвате ASAModule за поставяне бутоните, като създадете нов модул ASAModule и зададете задачата на quick_register, след това можете да поставите този модул навсякъде, където трябва.");