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


	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_TITLE', "Gids voor zoekformulierelementen" );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_INTRO', "Installeer de plug-in Search Form Elements om zoekformulieren aan uw site toe te voegen met behulp van de hier getoonde shortcodes. Deze pagina toont u welke shortcodes voor u beschikbaar zijn, zodat u precies de zoekformulieren kunt maken die u nodig heeft voor uw site . U kunt deze codes kopiëren en direct in uw pagina/artikel/module plakken en aan de slag gaan met de lay-out. Onderaan de pagina ziet u een aantal voorbeeldzoekformulieren. Klik op de knop om een modaal te openen en gebruik de knop Kopiëren om de opmaak naar uw klembord te kopiëren. U kunt die opmaak vervolgens gebruiken in uw artikelen/modules om de zoekformulieren te maken." );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_AVAILABLE_SHORTCODES', "Dit zijn alle beschikbare shortcodes bij het bouwen van zoekformulieren." );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_EXAMPLES', "Voorbeelden");
	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_EXAMPLES_INFO', "U kunt elk van de shortcodes hier op deze pagina gebruiken om de gegeven voorbeelden aan te passen, of de voorbeelden gebruiken zoals ze zijn. Kopieer en plak de shortcodes en/of voorbeelden in een pagina, artikel of module om de zoekformulier." );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_1', "U moet altijd de shortcodes form_start, form_button en form_end in uw zoekformulier opnemen." );
	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_2', "Omdat dit shortcodes zijn die Jomres-sjablonen gebruiken, kunt u de functie voor het overschrijven van sjablonen gebruiken voor shortcodes om de uitvoer te wijzigen. U kunt bijvoorbeeld /jomres/core-plugins/search_form_elements/templates/bootstrap5/search_form_autocomplete kopiëren .html toe aan uw theme/template /html/com_jomres directory en dit wordt de override. Als u bijvoorbeeld meerdere formulieren wilt en één anders dan de andere, kunt u het sjabloonbestand hernoemen (bijv. search_form_autocomplete.html) in /html/com_jomres naar search_form_autocomplete_new.html en gebruik dan de volgende shortcode: {jomres search_form_autocomplete &amp;search_form_autocomplete.html=search_form_autocomplete_new.html}" );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_3', "Als u de shortcodes in een Jomres-sjabloonbestand wilt gebruiken, bijvoorbeeld de hero-schuifregelaar, dan moet u {jomres vervangen door {jomres_script en Jomres zal de shortcodes zelf parseren." );