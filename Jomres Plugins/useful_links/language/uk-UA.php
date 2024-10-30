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

jr_define('USEFUL_LINKS_MODULE_TITLE',"Корисні посилання для ");
jr_define('USEFUL_LINKS_FORSALE',"Нерухомість на продаж в ");
jr_define('USEFUL_LINKS_HOTELS',"Готелі/ліжко та сніданок");
jr_define('USEFUL_LINKS_VILLAS',"Оренда будинків для відпочинку в ");
jr_define('USEFUL_LINKS_WIKIPEDIA',"Інформація про ");

jr_define('USEFUL_LINKS_ADMIN',"Корисні посилання");
jr_define('USEFUL_LINKS_ADMIN_PROPERTIESFORSALE',"Ідентифікатор типу нерухомості");
jr_define('USEFUL_LINKS_ADMIN_HOTELS',"Ідентифікатор типу власності готелю/ліжко та сніданок");
jr_define('USEFUL_LINKS_ADMIN_VILLAS',"Ідентифікатор типу власності будинків для відпочинку");

jr_define( '_JOMRES_SHORTCODES_06000USEFULLINKS', 'Цей плагін призначений для показу посилань на певні пошукові запити, якщо URL-адреса містить "країна", "регіон" або "місто", тому зазвичай ви хочете розмістити його на бічній панелі або модулі/віджеті за адресою у верхній частині сторінки. Спочатку вам потрібно буде налаштувати плагін у вкладці Конфігурація сайту > Корисні посилання, щоб вказати ідентифікатори типу власності для готелів, нерухомості та квартири/котеджу/вілли. ');