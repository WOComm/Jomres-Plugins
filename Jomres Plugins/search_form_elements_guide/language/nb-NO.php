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

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_TITLE', "Search Form Elements Guide" );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_INTRO', "Installer Search Form Elements-pluginet for å legge til søkeskjemaer på nettstedet ditt ved å bruke kortkodene som vises her. Denne siden viser deg hvilke kortkoder som er tilgjengelige for deg, slik at du kan bygge nøyaktig de søkeskjemaene du trenger for nettstedet ditt. . Du kan kopiere disse kodene og lime dem direkte inn i din side/artikkel/modul og begynne å jobbe med oppsettet. Nederst på siden vil du se en rekke eksempler på søkeskjemaer. Klikk på knappen for å åpne en modal, og bruk Kopier-knappen for å kopiere markeringen til utklippstavlen. Du kan deretter bruke denne markeringen i artiklene/modulene dine for å lage søkeskjemaene." );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_AVAILABLE_SHORTCODES', "Dette er alle kortkodene som er tilgjengelige for deg når du bygger søkeskjemaer." );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_EXAMPLES', "Eksempler" );
	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_EXAMPLES_INFO', "Du kan bruke hvilken som helst av kortkodene her på denne siden for å endre eksemplene som er gitt, eller bruk eksemplene som de er. Kopier og lim inn kortkodene og/eller eksemplene på en side, artikkel eller modul for å se søkeskjema." );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_1', "Du må alltid inkludere form_start, form_button og form_end shortcodes i søkeskjemaet." );
	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_2', "Fordi dette er kortkoder som bruker Jomres-maler, kan du bruke maloverstyringsfunksjonen for kortkoder for å modifisere utdataene. Du kan for eksempel kopiere /jomres/core-plugins/search_form_elements/templates/archte_bootstrap5 .html til din tema/mal /html/com_jomres-katalog, og dette vil bli overstyringen. Hvis du for eksempel vil at flere skjemaer og ett skal være forskjellig fra de andre, kan du gi nytt navn til malfilen (f.eks. search_form_autocomplete.html) i /html/com_jomres til search_form_autocomplete_new.html og bruk deretter følgende kortkode: {jomres search_form_autocomplete &amp;search_form_autocomplete.html=search_form_autocomplete_new.html}" );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_3', "Hvis du vil bruke kortkodene i en Jomres-malfil, for eksempel helteglideren, så må du erstatte {jomres med {jomres_script og Jomres vil analysere kortkodene selv." );
