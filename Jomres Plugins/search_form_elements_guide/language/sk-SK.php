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

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_TITLE', "Sprievodca prvkami vyhľadávacieho formulára" );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_INTRO', "Nainštalujte doplnok Search Form Elements na pridávanie vyhľadávacích formulárov na vašu stránku pomocou tu zobrazených krátkych kódov. Táto stránka vám ukáže, ktoré krátke kódy máte k dispozícii, aby ste si mohli vytvoriť presne tie vyhľadávacie formuláre, ktoré potrebujete pre vašu stránku . Tieto kódy môžete skopírovať a vložiť priamo na svoju stránku/článok/modul a začať pracovať na rozložení. V spodnej časti stránky uvidíte niekoľko vzorových formulárov vyhľadávania. Kliknutím na tlačidlo otvoríte modál a použijete tlačidlo Kopírovať na skopírovanie označenia do schránky. Toto označenie potom môžete použiť vo svojich článkoch/moduloch na vytvorenie vyhľadávacích formulárov." );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_AVAILABLE_SHORTCODES', "Toto sú všetky krátke kódy, ktoré máte k dispozícii pri vytváraní vyhľadávacích formulárov." );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_EXAMPLES', "Príklady" );
	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_EXAMPLES_INFO', "Môžete použiť ktorýkoľvek zo skrátených kódov tu na tejto stránke na úpravu poskytnutých príkladov alebo použiť príklady tak, ako sú. Skopírujte a prilepte krátke kódy a/alebo príklady na stránku, článok alebo modul, aby ste videli vyhľadávací formulár." );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_1', "Vždy musíte do vyhľadávacieho formulára zahrnúť skratky form_start, form_button a form_end." );
	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_2', "Pretože ide o krátke kódy, ktoré používajú šablóny Jomres, môžete použiť funkciu prepísania šablón pre krátke kódy na úpravu výstupu. Môžete napríklad skopírovať /jomres/core-plugins/search_form_elements/templates/search/bootstrap .html do vášho adresára theme/template /html/com_jomres a toto sa stane prepísaním. Okrem toho, ak napríklad chcete, aby sa niekoľko formulárov a jeden líšil od ostatných, môžete premenovať súbor šablóny (napr. search_form_autocomplete.html) v /html/com_jomres na search_form_autocomplete_new.html a potom použite nasledujúci krátky kód: {jomres search_form_autocomplete &amp;search_form_autocomplete.html=search_form_autocomplete_new.html}" );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_3', "Ak chcete použiť skrátené kódy v súbore šablóny Jomres, napríklad posuvník hrdina, potom budete musieť nahradiť {jomres {jomres_script a Jomres bude analyzovať krátke kódy sám." );
