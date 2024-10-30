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


	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_TITLE', "Ръководство за елементи на формуляр за търсене" );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_INTRO', "Инсталирайте плъгина Search Form Elements, за да добавите формуляри за търсене към вашия сайт, като използвате показаните тук кратки кодове. Тази страница ви показва кои кратки кодове са достъпни за вас, така че да можете да създавате точно формулярите за търсене, от които се нуждаете за вашия сайт . Можете да копирате тези кодове и да ги поставите директно във вашата страница/статия/модул и да започнете да работите върху оформлението. В долната част на страницата ще видите няколко примерни формуляра за търсене. Щракнете върху бутона, за да отворите модал, и използвайте бутона Копиране, за да копирате маркирането във вашия клипборд. След това можете да използвате това маркиране във вашите статии/модули, за да създадете формулярите за търсене." );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_AVAILABLE_SHORTCODES', "Това са всички кратки кодове, достъпни за вас, когато създавате формуляри за търсене." );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_EXAMPLES', "Примери");
	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_EXAMPLES_INFO', "Можете да използвате някой от кратки кодове тук в тази страница, за да промените предоставените примери, или да използвате примерите така, както са. Копирайте и поставете кратки кодове и/или примери в страница, статия или модул, за да видите форма за търсене." );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_1', "Винаги трябва да включвате шорткодовете form_start, form_button и form_end във вашата форма за търсене." );
	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_2', "Тъй като това са кратки кодове, които използват шаблони на Jomres, можете да използвате функцията за отмяна на шаблони за кратки кодове, за да промените изхода. Например можете да копирате /jomres/core-plugins/search_form_elements/templates/bootstrap5/search_form_autocomplete .html във вашата директория theme/template /html/com_jomres и това ще стане приоритет. Освен това, ако например искате няколко формуляра и един да е различен от другите, тогава можете да преименувате файла на шаблона (напр. search_form_autocomplete.html) в /html/com_jomres до search_form_autocomplete_new.html и след това използвайте следния кратък код: {jomres search_form_autocomplete &amp;search_form_autocomplete.html=search_form_autocomplete_new.html}" );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_3', "Ако искате да използвате шорткодовете във файл с шаблон на Jomres, например плъзгача на героя, тогава ще трябва да замените {jomres с {jomres_script и Jomres сам ще анализира шорткодовете." );