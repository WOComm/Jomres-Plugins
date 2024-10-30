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

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_TITLE', "Vodnik po elementih obrazca za iskanje" );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_INTRO', "Namestite vtičnik Search Form Elements za dodajanje iskalnih obrazcev na vaše spletno mesto z uporabo kratkih kod, ki so prikazane tukaj. Ta stran vam prikazuje, katere kratke kode so vam na voljo, tako da lahko ustvarite točno tiste iskalne obrazce, ki jih potrebujete za svoje spletno mesto . Te kode lahko kopirate in jih prilepite neposredno na svojo stran/članek/modul in začnete delati na postavitvi. Na dnu strani boste videli številne primere obrazcev za iskanje. Kliknite gumb, da odprete modal, in uporabite gumb Kopiraj, da kopirate oznako v odložišče. To oznako lahko nato uporabite v svojih člankih/modulih za ustvarjanje iskalnih obrazcev." );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_AVAILABLE_SHORTCODES', "To so vse kratke kode, ki so vam na voljo pri gradnji iskalnih obrazcev." );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_EXAMPLES', "Primeri");
	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_EXAMPLES_INFO', "Uporabite lahko katero koli od kratkih kod tukaj na tej strani, da spremenite ponujene primere ali uporabite primere, kot so. Kopirajte in prilepite kratke kode in/ali primere na stran, članek ali modul, da si ogledate obrazec za iskanje." );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_1', "V obrazcu za iskanje morate vedno vključiti kratke kode form_start, form_button in form_end." );
	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_2', "Ker so to kratke kode, ki uporabljajo predloge Jomres, lahko uporabite funkcijo preglasitve predloge za kratke kode za spreminjanje izhoda. Na primer, lahko kopirate /jomres/core-plugins/search_form_elements/templates/bootstrap5/search_form_autocomplete .html v vaš imenik teme/predloge /html/com_jomres in to bo preglasilo. Poleg tega, če na primer želite, da je več obrazcev in da se eden razlikuje od drugih, lahko preimenujete datoteko predloge (npr. search_form_autocomplete.html) v /html/com_jomres do search_form_autocomplete_new.html in nato uporabite to kratko kodo: {jomres search_form_autocomplete &amp;search_form_autocomplete.html=search_form_autocomplete_new.html}" );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_3', "Če želite uporabiti kratke kode v datoteki predloge Jomres, na primer drsnik junaka, boste morali {jomres zamenjati s {jomres_script in Jomres bo sam razčlenil kratke kode." );
