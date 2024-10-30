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

jr_define('_JINTOUR_TITLE',"Управление на обиколка/дейност");

jr_define('_JINTOUR_PROFILES_TITLE',"Профили за обиколка/дейност");
jr_define('_JINTOUR_PROFILES_NEW',"Нов профил на обиколка/дейност");
jr_define ('_JINTOUR_PROFILES_DELETE', "Изтриване на обиколка/профил на дейност");

jr_define('_JINTOUR_PROFILE_TITLE',"Заглавие на профила");
jr_define('_JINTOUR_PROFILE_DESCRIPTION',"Описание");
jr_define ('_JINTOUR_PROFILE_DESCRIPTION_INFO', "Въведете описание на вашата обиколка/дейност, включително нейния маршрут.");
jr_define ('_JINTOUR_PROFILE_DAYS_OF_WEEK', "Дни от седмицата");
jr_define('_JINTOUR_PROFILE_DAYS_OF_WEEK_INFO',"");
jr_define ('_JINTOUR_PROFILE_PRICE_ADULTS', "Цена за възрастни");
jr_define('_JINTOUR_PROFILE_PRICE_KIDS',"Детска цена");
jr_define('_JINTOUR_PROFILE_PRICE_KIDS_INFO',"За да изключите опцията от показване във формуляра за резервация, оставете цената като 0 (нула)");
jr_define('_JINTOUR_PROFILE_SPACES_ADULTS',"Места за възрастни");
jr_define('_JINTOUR_PROFILE_SPACES_KIDS',"Дъщерски пространства");
jr_define ('_JINTOUR_PROFILE_SPACES_INFO', "Броят свободни места в обиколката/дейността");
jr_define('_JINTOUR_PROFILE_START_DATE',"Начало на сезона");
jr_define('_JINTOUR_PROFILE_END_DATE',"Сезонът приключва");

jr_define('_JINTOUR_PROFILE_GENERATE_INFO',"След като създадете профил за обиколка/дейност, ще трябва да генерирате обиколки/дейности въз основа на настройките на този профил. Създайте обиколката/дейността, след което щракнете върху иконата на зелена стрелка до този профил, за да създадете самите обиколки/дейности. След като обиколките/дейностите бъдат създадени, ще можете да изтриете отделни обиколки/дейности, ако желаете.");
jr_define('_JINTOUR_PROFILE_GENERATE',"Генериране на обиколки/дейности");

jr_define ('_JINTOUR_TOUR_TITLE', "Заглавие на дейност");
jr_define ('_JINTOUR_TOUR_DATE', "Дата");
jr_define('_JINTOUR_TOUR_ADULTS',"Възрастни");
jr_define('_JINTOUR_TOUR_KIDS',"Деца");
jr_define('_JINTOUR_TOUR_ITINERY',"Маршрут");

jr_define('_JINTOUR_TOUR_SAVE_AUDIT',"Генерирани нови обиколки");
jr_define('_JINTOUR_TOUR_CANCEL_AUDIT',"Резервацията за обиколка е анулирана");
jr_define('_JINTOUR_TOUR_SAVE_MESSAGE',"Генерирани нови обиколки");
jr_define('_JINTOUR_TOUR_SPACES_CURRENTLY_AVAILABLE',"Налични места в момента");

jr_define('_JINTOUR_TOUR_EMAIL_ADMIN_SUBJECT',"Нова резервация за обиколка/идентификатор на ресурс");
jr_define('_JINTOUR_TOUR_EMAIL_ADMIN_MESSAGE',"Направена е нова резервация за администраторска обиколка/ресурс. Моля, вижте следната връзка, за да видите страницата на администраторската област на обиколката ");

jr_define('_JINTOUR_TITLE_CONFIG',"Конфигурация за интегрирани обиколки на Jomres");
jr_define('_JINTOUR_TITLE_WHOLESITE',"Цялата инсталация инсталация на Jintour ли е?");
jr_define ('_JINTOUR_TITLE_WHOLESITE_DESC', "Ако зададете това на Да, тогава всички имоти ще бъдат имоти за обиколка. Ако го зададете на Не, тогава, когато се създадат нови имоти, ще можете да имате имоти от типа Обиколка и Хотел/Апартамент. ");

jr_define('_JINTOUR_REGPROP_MANAGEMENTPROCESS_TOURS',"Обиколки");
jr_define ('_JINTOUR_REGPROP_MANAGEMENTPROCESS_TOURS_DESC', "Изберете опцията за обиколки, ако предлагате резервации за артикули, които са налични на определени дати (напр. турнета, билети за концерт.)");
jr_define('_JINTOUR_SHOWDEPARTURE',"Показване на полето за въвеждане на заминаване?");
jr_define('_JINTOUR_SHOWDEPARTURE_DESC',"Задайте това на Да, ако искате да показвате както дата на пристигане, така и дата на заминаване. Това би било полезно, ако предлагате автобусни пътувания, самолетни билети и т.н., където трябва да знаете както входящите, така и изходящите дати, показването на датата на заминаване ви позволява да предлагате ресурси за няколко дати, докато с настройката, зададена на Не, могат да се приемат само резервации за една дата.");

jr_define('_JINTOUR_PROFILES_TITLE_LIST',"Списък с обиколки");