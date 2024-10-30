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

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_TITLE', "Vejledning til søgeformularelementer" );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_INTRO', "Installer Search Form Elements-pluginnet for at tilføje søgeformularer til dit websted ved hjælp af de kortkoder, der er vist her. Denne side viser dig, hvilke kortkoder der er tilgængelige for dig, så du kan bygge præcis de søgeformularer, du har brug for til dit websted. Du kan kopiere disse koder og indsætte dem direkte på din side/artikel/modul og begynde at arbejde med layoutet. Nederst på siden vil du se en række eksempler på søgeformularer. Klik på knappen for at åbne en modal, og brug knappen Kopier for at kopiere markeringen til dit udklipsholder. Du kan derefter bruge denne markering i dine artikler/moduler til at oprette søgeformularerne." );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_AVAILABLE_SHORTCODES', "Dette er alle de kortkoder, der er tilgængelige for dig, når du bygger søgeformularer." );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_EXAMPLES', "Eksempler" );
	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_EXAMPLES_INFO', "Du kan bruge enhver af kortkoderne her på denne side til at ændre de angivne eksempler, eller bruge eksemplerne som de er. Kopier og indsæt kortkoderne og/eller eksemplerne på en side, artikel eller modul for at se søgeformular." );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_1', "Du skal altid inkludere form_start, form_button og form_end shortcodes i din søgeformular." );
	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_2', "Fordi disse er shortcodes, der bruger Jomres-skabeloner, kan du bruge skabelontilsidesættelsesfunktionen til shortcodes til at ændre outputtet. Du kan f.eks. kopiere /jomres/core-plugins/search_form_elements/templates/comple_bootstrap5 .html til dit tema/skabelon /html/com_jomres-bibliotek, og dette vil blive tilsidesættelsen. Hvis du f.eks. ønsker flere formularer, og en skal være anderledes end de andre, kan du omdøbe skabelonfilen (f.eks. search_form_autocomplete.html) i /html/com_jomres til search_form_autocomplete_new.html og brug derefter følgende kortkode: {jomres search_form_autocomplete &amp;search_form_autocomplete.html=search_form_autocomplete_new.html}" );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_3', "Hvis du vil bruge kortkoderne i en Jomres skabelonfil, for eksempel helteskyderen, så bliver du nødt til at erstatte {jomres med {jomres_script og Jomres vil parse selve shortcoderne." );
