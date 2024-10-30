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

	jr_define('_JOMRES_SEARCH_FORM_ELEMENTS_TITLE', "Meklēšanas veidlapu elementu rokasgrāmata");

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_INTRO', "Instalējiet spraudni Search Form Elements, lai savai vietnei pievienotu meklēšanas veidlapas, izmantojot šeit parādītos īskodus. Šī lapa parāda, kuri īsie kodi jums ir pieejami, lai jūs varētu izveidot tieši jūsu vietnei nepieciešamās meklēšanas veidlapas . Varat kopēt šos kodus un ielīmēt tos tieši savā lapā/rakstā/modulī un sākt strādāt pie izkārtojuma. Lapas apakšā redzēsiet vairākus meklēšanas veidlapu piemērus. Noklikšķiniet uz pogas, lai atvērtu modālu, un izmantojiet pogu Kopēt, lai kopētu marķējumu starpliktuvē. Pēc tam varat izmantot šo marķējumu savos rakstos/moduļos, lai izveidotu meklēšanas veidlapas." );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_AVAILABLE_SHORTCODES', "Šie ir visi īsie kodi, kas jums ir pieejami, veidojot meklēšanas veidlapas." );

	jr_define('_JOMRES_SEARCH_FORM_ELEMENTS_EXAMPLES', "Piemēri");
	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_EXAMPLES_INFO', "Varat izmantot jebkuru no šajā lapā esošajiem īsajiem kodiem, lai mainītu sniegtos piemērus, vai izmantot piemērus tādus, kādi tie ir. Kopējiet un ielīmējiet īskodus un/vai piemērus lapā, rakstā vai modulī, lai redzētu meklēšanas forma." );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_1', "Jums vienmēr ir jāiekļauj form_start, form_button un form_end īsie kodi savā meklēšanas veidlapā." );
	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_2', "Tā kā šie ir īskodi, kuros tiek izmantotas Jomres veidnes, varat izmantot īskodiem paredzēto veidņu ignorēšanas līdzekli, lai modificētu izvadi. Piemēram, varat kopēt /jomres/core-plugins/search_auto5/search_form_search/boottearch .html uz jūsu theme/template /html/com_jomres direktoriju, un tas kļūs par ignorēšanu. Turklāt, ja, piemēram, vēlaties, lai vairākas formas un viena atšķirtos no citām, varat pārdēvēt veidnes failu (piem., search_form_autocomplete.html). mapē /html/com_jomres uz search_form_autocomplete_new.html un pēc tam izmantojiet šādu īskodu: {jomres search_form_autocomplete &amp;search_form_autocomplete.html=search_form_autocomplete_new.html}" );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_3', "Ja vēlaties izmantot īskodus Jomres veidnes failā, piemēram, varoņa slīdni, tad jums būs jāaizstāj {jomres ar {jomres_script un Jomres pats parsēs īsos kodus." );
