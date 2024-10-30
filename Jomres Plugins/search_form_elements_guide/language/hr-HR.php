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


	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_TITLE', "Vodič za elemente obrazaca za pretraživanje" );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_INTRO', "Instalirajte dodatak Search Form Elements za dodavanje obrazaca za pretraživanje na svoju web stranicu koristeći ovdje prikazane kratke kodove. Ova stranica vam pokazuje koji su vam kratki kodovi dostupni tako da možete izgraditi upravo one obrasce za pretraživanje koji su vam potrebni za vašu stranicu . Možete kopirati ove kodove i zalijepiti ih izravno na svoju stranicu/članak/modul i početi raditi na izgledu. Na dnu stranice vidjet ćete nekoliko primjera obrazaca za pretraživanje. Kliknite gumb da biste otvorili modal i upotrijebite gumb Kopiraj za kopiranje oznake u međuspremnik. Zatim možete koristiti tu oznaku u svojim člancima/modulima za stvaranje obrazaca za pretraživanje." );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_AVAILABLE_SHORTCODES', "Ovo su svi kratki kodovi koji su vam dostupni prilikom izrade obrazaca za pretraživanje." );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_EXAMPLES', "Primjeri" );
	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_EXAMPLES_INFO', "Možete koristiti bilo koji od kratkih kodova ovdje na ovoj stranici za izmjenu ponuđenih primjera ili koristiti primjere kakvi jesu. Kopirajte i zalijepite kratke kodove i/ili primjere na stranicu, članak ili modul kako biste vidjeli obrazac za pretraživanje." );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_1', "U obrazac za pretraživanje uvijek morate uključiti kratke kodove form_start, form_button i form_end." );
	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_2', "Budući da su ovo kratki kodovi koji koriste Jomres predloške, možete koristiti značajku nadjačavanja predložaka za kratke kodove za izmjenu izlaza. Na primjer, možete kopirati /jomres/core-plugins/search_form_elements/templates/bootstrap5/search_form_autocomplete .html u direktorij teme/predloška /html/com_jomres i to će postati nadjačavanje. Osim toga, ako, na primjer, želite da nekoliko obrazaca i jedan bude drugačiji od ostalih, možete preimenovati datoteku predloška (npr. search_form_autocomplete.html) u /html/com_jomres do search_form_autocomplete_new.html, a zatim upotrijebite sljedeći kratki kod: {jomres search_form_autocomplete &amp;search_form_autocomplete.html=search_form_autocomplete_new.html}" );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_3', "Ako želite koristiti kratke kodove u Jomres datoteci predloška, na primjer klizač heroja, tada ćete morati zamijeniti {jomres sa {jomres_script i Jomres će sam analizirati kratke kodove." );