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

jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TITLE', "Ajax Search Composite");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYSTARS', "Пошук за зірками");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYPRICES', "Пошук за цінами");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYFEATURES', "Пошук за функціями");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYCOUNTRY', "Пошук за країною");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYREGION', "Пошук за регіонами");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYTOWN', "Пошук за містом");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYROOMTYPE', "Пошук за типом кімнати");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYPROPERTYTYPE', "Пошук за типом властивості");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYGUESTNUMBER', "Пошук за номерами гостей");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYDATES', "Пошук за датами");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_TITLE', "Стиль шаблону");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_DESC', "За замовчуванням: Здебільшого прості прапорці або кнопки, якщо вони в Bootstrap. Модалі: Кнопки відкриваються, щоб дозволити користувачам вибирати фільтри пошуку. Гармошка, створена у верхній частині сторінки, розкриває області, щоб відкрити фільтри. виявити фільтри. ");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_BUTTONS', "Кнопки (вертикальна орієнтація)");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_MODALS', "Модалі (вертикальна орієнтація) Лише завантаження.");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_ACCORDION', "Акордеон (горизонтальна орієнтація) тільки завантажувальна стрічка.");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_MULTISELECT', "Багатовибірний (горизонтальна орієнтація) тільки завантажувальна стрічка.");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_SHOWFILTERS', "Показати фільтри");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_HIDEFILTERS', "Приховати фільтри");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_INFO', "Використовує рамку пошуку ajax. Дозволяє розмістити модуль пошуку, який пропонує пошук за наявністю, діапазоном цін, особливостями, типом власності, типом кімнати, номерами гостей, зірками, країною, регіоном та містом на бічній панелі або верхню панель. Зверніть увагу, що наведений тут приклад не працюватиме, оскільки деякі аргументи скасовують один одного, виберіть із наявних аргументів саме те, що вам потрібно (за винятком обов’язкового аргументу). Цей короткий код дещо відрізняється від більшості інших короткі коди, оскільки він повинен супроводжуватися спеціальним div після оголошення короткого коду з ідентифікатором asamodule_search_results, де плагін розміщує повернений список властивостей. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_AJS_PLUGIN', "Потрібно. Аргумент має бути ajax_search_composite");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_STYLE', "Стиль полів пошуку. Опції - кнопки модального режиму акордеон , якщо він не встановлений, плагін використовуватиме параметр, налаштований у Конфігурації сайту. Багатовибірний Гармошка ідеально підходить для горизонтального відображення, інші два варіанти - найкращі для розміщення в бічна панель. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PROPERTY_DETAILS', "Показувати форму пошуку, якщо для сторінки задано значення viewproperty (сторінка відомостей про властивості). 0 для Ні, 1 для Так.");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_PROPERTY_UIDS', "Попередня фільтрація-це місце, де ви вибираєте лише ті властивості, які відповідають умові попереднього фільтру, можуть бути показані в результатах пошуку. Попереднє фільтрування за властивістю uid, тому в результатах пошуку можуть відображатися лише певні властивості. список властивостей uids розділений комами ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_PTYPES', "Попереднє фільтрування за типом властивості, тому в результатах пошуку можуть відображатися лише властивості цього/цих типів. Аргументи-це список ідентифікаторів типів властивостей, розділених комами.");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_COUNTRY', "Попередньо фільтрувати за кодом країни, тому в результатах пошуку можуть відображатися лише властивості цих країн. Аргументи-це список кодів країн ISO, відокремлених комами.");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_REGION', "Попередньо фільтрувати за назвою регіону, тому в результатах пошуку можуть відображатися лише властивості в цих регіонах. Аргументи-це список імен регіонів, відокремлених комами, і повинні відповідати регіонам, збереженим у базі даних. Якщо ви встановили для країни, наприклад, Німеччину (DE), тоді властивості інших країн із подібними назвами регіонів не відображатимуться. ");

jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_STARS', "Увімкнути/вимкнути введення зірочок у формі. Майте на увазі, що якщо ви встановили опцію на вкладці Складні налаштування пошуку Ajax у Конфігурації сайту на Ні , тоді значення asc_by_stars у списку аргументів не вплине. ");

jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_PRICE', "Увімкнути/вимкнути введення зірок у формі. Майте на увазі, що якщо ви встановили опцію на вкладці Складні налаштування пошуку Ajax у Конфігурації сайту на Ні , тоді значення asc_by_price у списку аргументів не вплине. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_FEATURES', "Увімкнути/вимкнути введення властивостей властивостей у формі. Майте на увазі, що якщо ви встановили опцію на вкладці Складні параметри пошуку Ajax у Конфігурації сайту на Ні , тоді значення asc_by_features не матиме ефекту у списку аргументів . ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_COUNTRY', "Увімкнути/вимкнути введення країни у формі. Майте на увазі, що якщо ви встановили опцію на вкладці Складні налаштування пошуку Ajax у Конфігурації сайту на Ні, тоді значення asc_by_country у списку аргументів не матиме ефекту. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_REGION', "Увімкнути/вимкнути введення регіону у формі. Майте на увазі, що якщо ви встановили опцію на вкладці Складні налаштування пошуку Ajax у Конфігурації сайту на Ні, тоді значення asc_by_region у списку аргументів не вплине. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_TOWN', "Увімкнути/вимкнути введення Місто у формі. Майте на увазі, що якщо ви встановили опцію на вкладці Складні налаштування пошуку Ajax у Конфігурації сайту на Ні, тоді значення asc_by_town у списку аргументів не матиме ніякого ефекту. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_ROOMTYPE', "Увімкнути/вимкнути введення типу кімнати у формі. Майте на увазі, що якщо ви встановили опцію на вкладці Складні налаштування пошуку Ajax у Конфігурації сайту на Ні, то значення параметра asc_by_roomtype не матиме ефекту у списку аргументів . ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_PROPERTY_TYPE', "Увімкнути/вимкнути введення типу властивості у формі. Майте на увазі, що якщо ви встановили опцію на вкладці Складні налаштування пошуку Ajax у Конфігурації сайту на Ні, значення параметра asc_by_prop не матиме значення . ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_GUESTNUMBER', "Увімкнути/вимкнути введення номерів гостей у формі. Майте на увазі, що якщо ви встановили опцію на вкладці Складні налаштування пошуку Ajax у Конфігурації сайту на Ні, то значення параметра asc_by_guestnumber не матиме ефекту у списку аргументів . ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_DATE', "Увімкнути/вимкнути введення дати у формі. Майте на увазі, що якщо ви встановили опцію на вкладці Складні налаштування пошуку Ajax у Конфігурації сайту на Ні, тоді значення asc_by_date у списку аргументів не матиме ніякого ефекту. ");