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

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_TITLE', "Sökformulärelementguide" );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_INTRO', "Installera plugin-programmet Search Form Elements för att lägga till sökformulär på din webbplats med kortkoderna som visas här. Den här sidan visar dig vilka kortkoder som är tillgängliga för dig så att du kan skapa exakt de sökformulär du behöver för din webbplats . Du kan kopiera dessa koder och klistra in dem direkt i din sida/artikel/modul och börja arbeta med layouten. Längst ner på sidan ser du ett antal exempel på sökformulär. Klicka på knappen för att öppna en modal, och använd knappen Kopiera för att kopiera märkningen till ditt urklipp. Du kan sedan använda märkningen i dina artiklar/moduler för att skapa sökformulären." );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_AVAILABLE_SHORTCODES', "Dessa är alla kortkoder tillgängliga för dig när du bygger sökformulär." );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_EXAMPLES', "Exempel" );
	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_EXAMPLES_INFO', "Du kan använda vilken som helst av kortkoderna här på den här sidan för att ändra exemplen som tillhandahålls, eller använd exemplen som de är. Kopiera och klistra in kortkoderna och/eller exemplen på en sida, artikel eller modul för att se sökformulär." );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_1', "Du måste alltid inkludera kortkoderna form_start, form_button och form_end i ditt sökformulär." );
	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_2', "Eftersom det här är kortkoder som använder Jomres-mallar kan du använda mallöverstyrningsfunktionen för kortkoder för att ändra utdata. Du kan till exempel kopiera /jomres/core-plugins/search_form_elements/templates/comple_bootstrap5 .html till ditt tema/mall /html/com_jomres-katalog och detta kommer att bli åsidosättandet. Dessutom om du till exempel vill att flera formulär och en ska vara annorlunda än de andra kan du byta namn på mallfilen (t.ex. search_form_autocomplete.html) i /html/com_jomres till search_form_autocomplete_new.html och använd sedan följande kortkod: {jomres search_form_autocomplete &amp;search_form_autocomplete.html=search_form_autocomplete_new.html}" );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_3', "Om du vill använda kortkoderna i en Jomres mallfil, till exempel hjältereglaget, måste du ersätta {jomres med {jomres_script och Jomres kommer att analysera kortkoderna själv." );
