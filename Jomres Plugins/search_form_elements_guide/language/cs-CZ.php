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


	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_TITLE', "Průvodce prvky vyhledávacího formuláře" );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_INTRO', "Nainstalujte si plugin Search Form Elements pro přidání vyhledávacích formulářů na svůj web pomocí zde zobrazených krátkých kódů. Tato stránka vám ukáže, které krátké kódy máte k dispozici, abyste mohli vytvořit přesně ty vyhledávací formuláře, které pro svůj web potřebujete . Tyto kódy můžete zkopírovat a vložit přímo do své stránky/článku/modulu a začít pracovat na rozvržení. V dolní části stránky uvidíte několik vzorových vyhledávacích formulářů. Kliknutím na tlačítko otevřete modál a použijte tlačítko Kopírovat pro zkopírování označení do schránky. Toto označení pak můžete použít ve svých článcích/modulech k vytvoření vyhledávacích formulářů." );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_AVAILABLE_SHORTCODES', "Toto jsou všechny zkratky, které máte k dispozici při vytváření vyhledávacích formulářů." );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_EXAMPLES', "Příklady" );
	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_EXAMPLES_INFO', "Můžete použít kterýkoli z krátkých kódů zde na této stránce k úpravě poskytnutých příkladů nebo použít příklady tak, jak jsou. Zkopírujte a vložte krátké kódy a/nebo příklady na stránku, článek nebo modul, abyste viděli vyhledávací formulář.");

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_1', "Do vyhledávacího formuláře musíte vždy zahrnout zkratky form_start, form_button a form_end." );
	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_2', "Protože se jedná o krátké kódy, které používají šablony Jomres, můžete použít funkci přepsání šablon pro krátké kódy k úpravě výstupu. Můžete například zkopírovat /jomres/core-plugins/search_form_elements/templates/search_formstrap .html do vašeho adresáře theme/template /html/com_jomres a toto bude přepsáno. Navíc, pokud například chcete, aby se několik formulářů a jeden lišil od ostatních, můžete soubor šablony přejmenovat (např. search_form_autocomplete.html) v /html/com_jomres na search_form_autocomplete_new.html a poté použijte následující krátký kód: {jomres search_form_autocomplete &amp;search_form_autocomplete.html=search_form_autocomplete_new.html}" );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_3', "Pokud chcete použít krátké kódy v souboru šablony Jomres, například posuvník hrdiny, pak budete muset nahradit {jomres za {jomres_script a Jomres bude analyzovat krátké kódy sám." );