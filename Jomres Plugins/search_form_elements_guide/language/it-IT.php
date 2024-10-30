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

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_TITLE', "Guida agli elementi del modulo di ricerca" );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_INTRO', "Installa il plug-in Search Form Elements per aggiungere moduli di ricerca al tuo sito utilizzando gli shortcode mostrati qui. Questa pagina mostra quali shortcode sono disponibili per te in modo da poter creare esattamente i moduli di ricerca di cui hai bisogno per il tuo sito . Puoi copiare questi codici e incollarli direttamente nella tua pagina/articolo/modulo e iniziare a lavorare sul layout. Nella parte inferiore della pagina vedrai una serie di moduli di ricerca di esempio. Fai clic sul pulsante per aprire un modale e utilizza il pulsante Copia per copiare il markup negli appunti. Puoi quindi utilizzare quel markup nei tuoi articoli/moduli per creare i moduli di ricerca." );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_AVAILABLE_SHORTCODES', "Questi sono tutti gli shortcode disponibili quando crei i moduli di ricerca." );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_EXAMPLES', "Esempi" );
	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_EXAMPLES_INFO', "Puoi usare uno qualsiasi degli shortcode qui in questa pagina per modificare gli esempi forniti, o usare gli esempi così come sono. Copia e incolla gli shortcode e/o gli esempi in una pagina, articolo o modulo per vedere il modulo di ricerca." );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_1', "Devi sempre includere gli shortcode form_start, form_button e form_end nel tuo modulo di ricerca." );
	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_2', "Poiché si tratta di codici brevi che utilizzano i modelli Jomres, puoi utilizzare la funzione di sovrascrittura del modello per i codici brevi per modificare l'output. Ad esempio, puoi copiare /jomres/core-plugins/search_form_elements/templates/bootstrap5/search_form_autocomplete .html nella directory theme/template /html/com_jomres e questo diventerà l'override. Inoltre, se, ad esempio, desideri che diversi moduli e uno sia diverso dagli altri, puoi rinominare il file del modello (ad es. search_form_autocomplete.html) in /html/com_jomres in search_form_autocomplete_new.html e quindi utilizzare il seguente shortcode: {jomres search_form_autocomplete &amp;search_form_autocomplete.html=search_form_autocomplete_new.html}" );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_3', "Se vuoi usare gli shortcode in un file modello di Jomres, per esempio lo slider dell'eroe, allora dovrai sostituire {jomres con {jomres_script e Jomres analizzerà gli shortcode stesso." );
