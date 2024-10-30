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

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_INTRO', "Install the Search Form Elements plugin to add search forms to your site using the shortcodes shown here. This page shows you which shortcodes are available to you so that you can build exactly the search forms you need for your site. You can copy these codes and paste them directly into your page/article/module and start working on the layout. At the bottom of the page you will see a number of example search forms. Click the button to open a modal, and use the Copy button to copy the markup to your clipboard. You can then use that markup in your articles/modules to create the search forms." );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_AVAILABLE_SHORTCODES', "These are all of the shortcodes available to you when building search forms." );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_EXAMPLES', "Examples" );
	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_EXAMPLES_INFO', "You can use any of the shortcodes here in this page to modify the examples provided, or use the examples as is. Copy and paste the shortcodes and/or examples into a page, article or module to see the search form." );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_1', "You must always include the form_start, form_button and form_end shortcodes in your search form." );
	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_2', "Because these are shortcodes that use Jomres templates, you can use the template override feature for shortcodes to modify the output. For example, you can copy /jomres/core-plugins/search_form_elements/templates/bootstrap5/search_form_autocomplete.html to your theme/template /html/com_jomres directory and this will become the override. Additionally if, for example, you want several forms and one to be different to the others then you can rename the template file (e.g. search_form_autocomplete.html) in /html/com_jomres to search_form_autocomplete_new.html and then use the following shortcode: {jomres search_form_autocomplete &amp;search_form_autocomplete.html=search_form_autocomplete_new.html}" );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_3', "If you want to use the shortcodes in a Jomres template file, for example the hero slider, then you will need to replace {jomres with {jomres_script and Jomres will parse the shortcodes itself." );