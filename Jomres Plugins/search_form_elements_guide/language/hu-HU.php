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


	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_TITLE', "Útmutató az űrlapelemekhez" );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_INTRO', "Telepítse a Search Form Elements beépülő modult, hogy keresési űrlapokat adjon webhelyéhez az itt látható rövid kódok használatával. Ezen az oldalon láthatja, hogy mely rövid kódok állnak rendelkezésre, hogy pontosan a webhelyéhez szükséges keresési űrlapokat állíthassa össze . Ezeket a kódokat kimásolhatja és beillesztheti közvetlenül az oldalába/cikkébe/moduljába, és elkezdhet dolgozni az elrendezésen. Az oldal alján számos példa keresési űrlapot láthat. Kattintson a gombra egy modális megnyitásához, és használja a Másolás gombbal a jelölést a vágólapra másolhatja. Ezt a jelölést használhatja cikkeiben/moduljaiban a keresési űrlapok létrehozásához." );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_AVAILABLE_SHORTCODES', "Ezek mind a rövid kódok, amelyek elérhetőek a keresési űrlapok összeállításakor." );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_EXAMPLES', "Példák" );
	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_EXAMPLES_INFO', "Az oldalon található rövid kódok bármelyikével módosíthatja a megadott példákat, vagy használhatja a példákat úgy, ahogy vannak. Másolja és illessze be a rövid kódokat és/vagy példákat egy oldalba, cikkbe vagy modulba, hogy megtekinthesse a keresési űrlap." );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_1', "Mindig fel kell vennie a form_start, form_button és form_end rövid kódokat a keresési űrlapba." );
	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_2', "Mivel ezek olyan rövid kódok, amelyek Jomres sablonokat használnak, használhatja a sablon felülbírálási funkciót a rövid kódokhoz a kimenet módosításához. Például átmásolhatja a /jomres/core-plugins/search_form_5/boottearch_templatecomp_elements/boottearch .html fájlt a theme/template /html/com_jomres könyvtárába, és ez lesz a felülírás. Ezenkívül, ha például több űrlapot szeretne, és az egyik különbözik a többitől, akkor átnevezheti a sablonfájlt (pl. search_form_autocomplete.html) a /html/com_jomres könyvtárban a search_form_autocomplete_new.html címre, majd használja a következő rövid kódot: {jomres search_form_autocomplete &amp;search_form_autocomplete.html=search_form_autocomplete_new.html}" );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_3', "Ha egy Jomres sablonfájlban szeretné használni a rövid kódokat, például a hero csúszkát, akkor le kell cserélnie a {jomres-t a {jomres_script-re, és a Jomres maga fogja elemezni a rövid kódokat." );