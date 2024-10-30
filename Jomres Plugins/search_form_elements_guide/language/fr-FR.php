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


	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_TITLE', "Guide des éléments de formulaire de recherche" );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_INTRO', "Installez le plug-in Search Form Elements pour ajouter des formulaires de recherche à votre site en utilisant les shortcodes affichés ici. Cette page vous montre quels shortcodes sont disponibles pour que vous puissiez créer exactement les formulaires de recherche dont vous avez besoin pour votre site . Vous pouvez copier ces codes et les coller directement dans votre page/article/module et commencer à travailler sur la mise en page. Au bas de la page, vous verrez un certain nombre d'exemples de formulaires de recherche. Cliquez sur le bouton pour ouvrir un modal, et utilisez le bouton Copier pour copier le balisage dans votre presse-papiers. Vous pouvez ensuite utiliser ce balisage dans vos articles/modules pour créer les formulaires de recherche." );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_AVAILABLE_SHORTCODES', "Ce sont tous les shortcodes à votre disposition lors de la création de formulaires de recherche." );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_EXAMPLES', "Exemples" );
	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_EXAMPLES_INFO', "Vous pouvez utiliser n'importe lequel des shortcodes ici dans cette page pour modifier les exemples fournis, ou utiliser les exemples tels quels. Copiez et collez les shortcodes et/ou les exemples dans une page, un article ou un module pour voir le formulaire de recherche." );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_1', "Vous devez toujours inclure les shortcodes form_start, form_button et form_end dans votre formulaire de recherche." );
	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_2', "Parce que ce sont des shortcodes qui utilisent des modèles Jomres, vous pouvez utiliser la fonction de remplacement de modèle pour les shortcodes afin de modifier la sortie. Par exemple, vous pouvez copier /jomres/core-plugins/search_form_elements/templates/bootstrap5/search_form_autocomplete .html dans votre répertoire theme/template /html/com_jomres et cela deviendra le remplacement. De plus, si, par exemple, vous souhaitez que plusieurs formulaires et un soient différents des autres, vous pouvez renommer le fichier de modèle (par exemple, search_form_autocomplete.html) dans /html/com_jomres vers search_form_autocomplete_new.html puis utilisez le shortcode suivant : {jomres search_form_autocomplete &amp;search_form_autocomplete.html=search_form_autocomplete_new.html}");

jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_3', "Si vous souhaitez utiliser les shortcodes dans un fichier de modèle Jomres, par exemple le curseur du héros, vous devrez remplacer {jomres par {jomres_script et Jomres analysera les shortcodes lui-même." );