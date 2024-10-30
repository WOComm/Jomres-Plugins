<?php
	/**
	 * Core file.
	 *
	 * @author Vince Wooll <sales@jomres.net>
	 *
	 * @version Jomres 10.7.0
	 *
	 * @copyright	2005-2023 Vince Wooll
	 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
	 **/
//#################################################################
	defined('_JOMRES_INITCHECK') or die('');
	//#################################################################

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_TITLE', "Посібник з елементів форми пошуку");

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_INTRO', "Встановіть плагін Search Form Elements, щоб додати форми пошуку на свій сайт за допомогою коротких кодів, показаних тут. На цій сторінці показано, які короткі коди доступні для вас, щоб ви могли створити саме ті форми пошуку, які вам потрібні для вашого сайту . Ви можете скопіювати ці коди та вставити їх безпосередньо на свою сторінку/статтю/модуль і почати працювати над макетом. У нижній частині сторінки ви побачите низку зразків форм пошуку. Натисніть кнопку, щоб відкрити модаль, і використовуйте кнопку «Копіювати», щоб скопіювати розмітку в буфер обміну. Потім ви можете використовувати цю розмітку у своїх статтях/модулях для створення форм пошуку." );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_AVAILABLE_SHORTCODES', "Це всі короткі коди, доступні вам під час створення пошукових форм." );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_EXAMPLES', "Приклади");
	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_EXAMPLES_INFO', "Ви можете використовувати будь-які короткі коди тут, на цій сторінці, щоб змінити надані приклади, або використовувати приклади як є. Скопіюйте та вставте короткі коди та/або приклади на сторінку, статтю або модуль, щоб побачити форма пошуку." );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_1', "Ви завжди повинні включати короткі коди form_start, form_button і form_end у форму пошуку." );
	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_2', "Оскільки ці короткі коди використовують шаблони Jomres, ви можете використовувати функцію перевизначення шаблонів для коротких кодів, щоб змінити результат. Наприклад, ви можете скопіювати /jomres/core-plugins/search_form_elements/templates/bootstrap5/search_form_autocomplete .html у ваш каталог theme/template /html/com_jomres, і це стане перевизначенням. Крім того, якщо, наприклад, ви хочете, щоб кілька форм і одна відрізнялася від інших, ви можете перейменувати файл шаблону (наприклад, search_form_autocomplete.html) у /html/com_jomres до search_form_autocomplete_new.html, а потім використайте такий короткий код: {jomres search_form_autocomplete &amp;search_form_autocomplete.html=search_form_autocomplete_new.html}" );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_3', "Якщо ви хочете використовувати шорткоди у файлі шаблону Jomres, наприклад повзунок героя, вам потрібно буде замінити {jomres на {jomres_script, і Jomres сам проаналізує шорткоди." );
