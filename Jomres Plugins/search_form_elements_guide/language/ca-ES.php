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


	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_TITLE', "Guia d'elements de formulari de cerca" );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_INTRO', "Instal·leu el connector Search Form Elements per afegir formularis de cerca al vostre lloc mitjançant els codis curts que es mostren aquí. Aquesta pàgina us mostra quins codis curts teniu disponibles perquè pugueu crear exactament els formularis de cerca que necessiteu per al vostre lloc . Podeu copiar aquests codis i enganxar-los directament a la vostra pàgina/article/mòdul i començar a treballar en el disseny. A la part inferior de la pàgina veureu una sèrie de formularis de cerca d'exemple. Feu clic al botó per obrir un modal i feu servir el botó Copia per copiar l'etiquetatge al porta-retalls. A continuació, podeu utilitzar-lo als vostres articles/mòduls per crear els formularis de cerca." );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_AVAILABLE_SHORTCODES', "Aquests són tots els codis curts disponibles per a vostè quan creeu formularis de cerca." );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_EXAMPLES', "Examples" );
	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_EXAMPLES_INFO', "Podeu utilitzar qualsevol dels codis curts aquí en aquesta pàgina per modificar els exemples proporcionats, o utilitzar els exemples tal qual. Copieu i enganxeu els codis curts i/o exemples en una pàgina, article o mòdul per veure'l formulari de cerca.");

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_1', "Sempre heu d'incloure els codis curts form_start, form_button i form_end al vostre formulari de cerca." );
	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_2', "Com que es tracta de codis curts que utilitzen plantilles Jomres, podeu utilitzar la funció de substitució de plantilles per als codis curts per modificar la sortida. Per exemple, podeu copiar /jomres/core-plugins/search_form_elements/templates/bootstrap_autocomplete_ .html al vostre directori theme/template /html/com_jomres i aquest es convertirà en la substitució. A més, si, per exemple, voleu que diversos formularis i un sigui diferent dels altres, podeu canviar el nom del fitxer de plantilla (per exemple, search_form_autocomplete.html) a /html/com_jomres per search_form_autocomplete_new.html i després utilitzeu el codi curt següent: {jomres search_form_autocomplete &amp;search_form_autocomplete.html=search_form_autocomplete_new.html}" );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_3', "Si voleu utilitzar els codis curts en un fitxer de plantilla de Jomres, per exemple, el control lliscant de l'heroi, haureu de substituir {jomres per {jomres_script i Jomres analitzarà els codis curts." );