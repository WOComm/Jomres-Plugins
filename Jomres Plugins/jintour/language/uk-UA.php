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

jr_define ('_JINTOUR_TITLE', "Екскурсія/Управління діяльністю");

jr_define ('_JINTOUR_PROFILES_TITLE', "Профілі екскурсії/діяльності");
jr_define('_JINTOUR_PROFILES_NEW',"Новий профіль туру/діяльності");
jr_define ('_JINTOUR_PROFILES_DELETE', "Видалити профіль подорожі/активності");

jr_define('_JINTOUR_PROFILE_TITLE',"Назва профілю");
jr_define('_JINTOUR_PROFILE_DESCRIPTION',"Опис");
jr_define ('_JINTOUR_PROFILE_DESCRIPTION_INFO', "Введіть опис вашого туру/діяльності, включаючи його маршрут.");
jr_define('_JINTOUR_PROFILE_DAYS_OF_WEEK',"Дні тижня");
jr_define('_JINTOUR_PROFILE_DAYS_OF_WEEK_INFO',"");
jr_define('_JINTOUR_PROFILE_PRICE_ADULTS',"Ціна для дорослих");
jr_define('_JINTOUR_PROFILE_PRICE_KIDS',"Ціна дитини");
jr_define('_JINTOUR_PROFILE_PRICE_KIDS_INFO',"Щоб виключити опцію з відображення у формі бронювання, залиште ціну 0 (нуль)");
jr_define('_JINTOUR_PROFILE_SPACES_ADULTS',"Пробіли для дорослих");
jr_define('_JINTOUR_PROFILE_SPACES_KIDS',"Дочірні місця");
jr_define('_JINTOUR_PROFILE_SPACES_INFO',"Кількість місць, доступних під час туру/діяльності");
jr_define('_JINTOUR_PROFILE_START_DATE',"Початок сезону");
jr_define('_JINTOUR_PROFILE_END_DATE',"Сезон закінчується");

jr_define('_JINTOUR_PROFILE_GENERATE_INFO',"Після того, як ви створили профіль туру/діяльності, вам потрібно буде створити тури/діяльності на основі налаштувань цього профілю. Створіть тур/діяльність, потім натисніть значок зеленої стрілки поруч із цим профілем, щоб створити самі тури/заходи. Після створення турів/заходів ви зможете видалити окремі тури/заходи, якщо хочете.");
jr_define('_JINTOUR_PROFILE_GENERATE',"Створити тури/заходи");

jr_define('_JINTOUR_TOUR_TITLE',"Назва діяльності");
jr_define('_JINTOUR_TOUR_DATE',"Дата");
jr_define('_JINTOUR_TOUR_ADULTS',"Дорослі");
jr_define('_JINTOUR_TOUR_KIDS',"Діти");
jr_define('_JINTOUR_TOUR_ITINERY',"Маршрут");

jr_define ('_JINTOUR_TOUR_SAVE_AUDIT', "Створено нові тури");
jr_define('_JINTOUR_TOUR_CANCEL_AUDIT',"Бронювання туру скасовано");
jr_define('_JINTOUR_TOUR_SAVE_MESSAGE',"Створено нові тури");
jr_define('_JINTOUR_TOUR_SPACES_CURRENTLY_AVAILABLE',"Наразі доступні місця");

jr_define('_JINTOUR_TOUR_EMAIL_ADMIN_SUBJECT',"Нове бронювання для туру/ідентифікатора ресурсу");
jr_define('_JINTOUR_TOUR_EMAIL_ADMIN_MESSAGE',"Нове бронювання для туру/ресурсу адміністратора було зроблено. Будь ласка, перегляньте це посилання, щоб переглянути сторінку області адміністратора цього туру");

jr_define('_JINTOUR_TITLE_CONFIG',"Інтегрована конфігурація турів Jomres");
jr_define ('_JINTOUR_TITLE_WHOLESITE', "Чи вся установка є установкою Jintour?");
jr_define('_JINTOUR_TITLE_WHOLESITE_DESC',"Якщо встановити для цього значення Так, то всі властивості будуть властивостями туру. Якщо встановити значення Ні, тоді, коли створено нові властивості, ви зможете мати властивості типу Тур і Готель/квартира ");

jr_define ('_JINTOUR_REGPROP_MANAGEMENTPROCESS_TOURS', "Екскурсії");
jr_define('_JINTOUR_REGPROP_MANAGEMENTPROCESS_TOURS_DESC',"Виберіть опцію турів, якщо ви пропонуєте бронювання товарів, які доступні на певні дати (наприклад, тури, квитки на концерт.)");
jr_define('_JINTOUR_SHOWDEPARTURE',"Показати поле введення відправлення?");
jr_define('_JINTOUR_SHOWDEPARTURE_DESC',"Встановіть для цього значення Так, якщо ви хочете показувати і дату прибуття і відправлення. Це було б корисно, якщо ви пропонуєте автобусні поїздки, квитки на літак тощо, де вам потрібно знати дати прибуття та вильоту, показ дати відправлення дає змогу пропонувати ресурси на кілька дат, тоді як якщо для налаштування встановлено значення Ні, можна приймати бронювання лише на одну дату.");

jr_define ('_JINTOUR_PROFILES_TITLE_LIST', "Список турів");