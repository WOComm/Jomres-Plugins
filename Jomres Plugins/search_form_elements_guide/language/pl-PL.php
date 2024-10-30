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

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_TITLE', "Przewodnik po elementach formularza wyszukiwania");

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_INTRO', "Zainstaluj wtyczkę Search Form Elements, aby dodawać formularze wyszukiwania do swojej witryny za pomocą pokazanych tutaj skrótów. Ta strona pokazuje, które skróty są dostępne, dzięki czemu możesz tworzyć dokładnie takie formularze wyszukiwania, jakich potrzebujesz w swojej witrynie . Możesz skopiować te kody i wkleić je bezpośrednio na swoją stronę/artykuł/moduł i rozpocząć pracę nad układem. Na dole strony zobaczysz szereg przykładowych formularzy wyszukiwania. Kliknij przycisk, aby otworzyć modal i użyj przycisk Kopiuj, aby skopiować znaczniki do schowka. Możesz następnie użyć tych znaczników w swoich artykułach/modułach, aby utworzyć formularze wyszukiwania." );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_AVAILABLE_SHORTCODES', "To są wszystkie skróty dostępne podczas tworzenia formularzy wyszukiwania.");

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_EXAMPLES', "Przykłady");
	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_EXAMPLES_INFO', "Możesz użyć dowolnego skrótu z tej strony, aby zmodyfikować podane przykłady, lub użyć przykładów bez zmian. Skopiuj i wklej skróty i/lub przykłady na stronę, artykuł lub moduł, aby zobaczyć Formularz wyszukiwania." );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_1', "W formularzu wyszukiwania należy zawsze umieszczać skróty form_start, form_button i form_end.");
	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_2', "Ponieważ są to skróty korzystające z szablonów Jomres, możesz użyć funkcji zastępowania szablonów dla skrótów, aby zmodyfikować dane wyjściowe. Na przykład możesz skopiować /jomres/core-plugins/search_form_elements/templates/bootstrap5/search_form_autocomplete .html do katalogu theme/template /html/com_jomres i to stanie się nadpisaniem.Dodatkowo jeśli np. chcesz kilka formularzy i jeden różni się od pozostałych, możesz zmienić nazwę pliku szablonu (np. search_form_autocomplete.html) w /html/com_jomres do search_form_autocomplete_new.html, a następnie użyj następującego krótkiego kodu: {jomres search_form_autocomplete &amp;search_form_autocomplete.html=search_form_autocomplete_new.html}" );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_3', "Jeśli chcesz użyć skrótów w pliku szablonu Jomres, na przykład w suwaku bohatera, musisz zamienić {jomres na {jomres_script, a Jomres sam przeanalizuje skróty.");
