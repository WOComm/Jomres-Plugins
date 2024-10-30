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

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_TITLE', "Ghid pentru elementele formularului de căutare");

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_INTRO', "Instalați pluginul Search Form Elements pentru a adăuga formulare de căutare pe site-ul dvs. folosind codurile scurte afișate aici. Această pagină vă arată ce coduri scurte sunt disponibile pentru dvs., astfel încât să puteți crea exact formularele de căutare de care aveți nevoie pentru site-ul dvs. . Puteți copia aceste coduri și le puteți lipi direct în pagina/articolul/modulul dvs. și puteți începe să lucrați la aspect. În partea de jos a paginii veți vedea o serie de exemple de formulare de căutare. Faceți clic pe butonul pentru a deschide un modal și utilizați butonul Copiere pentru a copia marcajul în clipboard-ul dvs. Apoi puteți utiliza acel marcaj în articolele/modulele dvs. pentru a crea formularele de căutare." );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_AVAILABLE_SHORTCODES', "Acestea sunt toate shortcode-urile disponibile pentru tine atunci când construiești formulare de căutare." );

jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_EXAMPLES', "Exemple" );
jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_EXAMPLES_INFO', "Puteți folosi oricare dintre codurile scurte de aici în această pagină pentru a modifica exemplele furnizate sau puteți utiliza exemplele așa cum sunt. Copiați și inserați codurile scurte și/sau exemplele într-o pagină, articol sau modul pentru a vedea formular de căutare.");

jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_1', "Trebuie să includeți întotdeauna codurile scurte form_start, form_button și form_end în formularul de căutare." );
jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_2', "Deoarece acestea sunt coduri scurte care folosesc șabloane Jomres, puteți utiliza funcția de înlocuire a șablonului pentru coduri scurte pentru a modifica rezultatul. De exemplu, puteți copia /jomres/core-plugins/search_form_elements/templates/bootstrap_autocomplete_ .html în directorul dvs. theme/template /html/com_jomres și acesta va deveni o suprascriere. În plus, dacă, de exemplu, doriți ca mai multe formulare și unul să fie diferit de celelalte, puteți redenumi fișierul șablon (de exemplu, search_form_autocomplete.html) în /html/com_jomres pentru a search_form_autocomplete_new.html și apoi utilizați următorul cod scurt: {jomres search_form_autocomplete &amp;search_form_autocomplete.html=search_form_autocomplete_new.html}" );

jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_3', "Dacă doriți să utilizați codurile scurte într-un fișier șablon Jomres, de exemplu glisorul erou, atunci va trebui să înlocuiți {jomres cu {jomres_script și Jomres va analiza codurile scurte în sine." );
