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


	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_TITLE', "Leitfaden für Suchformularelemente" );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_INTRO', "Installieren Sie das Search Form Elements-Plugin, um Suchformulare mit den hier gezeigten Shortcodes zu Ihrer Website hinzuzufügen. Diese Seite zeigt Ihnen, welche Shortcodes Ihnen zur Verfügung stehen, damit Sie genau die Suchformulare erstellen können, die Sie für Ihre Website benötigen . Sie können diese Codes kopieren und direkt in Ihre Seite/Ihren Artikel/Ihr Modul einfügen und mit der Arbeit am Layout beginnen. Unten auf der Seite sehen Sie eine Reihe von Beispielsuchformularen. Klicken Sie auf die Schaltfläche, um ein Modal zu öffnen, und verwenden Sie die Schaltfläche Kopieren, um das Markup in Ihre Zwischenablage zu kopieren. Sie können dieses Markup dann in Ihren Artikeln/Modulen verwenden, um die Suchformulare zu erstellen." );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_AVAILABLE_SHORTCODES', "Dies sind alle Shortcodes, die Ihnen beim Erstellen von Suchformularen zur Verfügung stehen." );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_EXAMPLES', "Beispiele" );
	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_EXAMPLES_INFO', "Sie können jeden der Shortcodes hier auf dieser Seite verwenden, um die bereitgestellten Beispiele zu ändern, oder die Beispiele unverändert verwenden. Kopieren Sie die Shortcodes und/oder Beispiele und fügen Sie sie in eine Seite, einen Artikel oder ein Modul ein, um sie anzuzeigen Suchformular." );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_1', "Sie müssen immer die Shortcodes form_start, form_button und form_end in Ihr Suchformular aufnehmen." );
	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_2', "Da dies Shortcodes sind, die Jomres-Vorlagen verwenden, können Sie die Funktion zum Überschreiben von Vorlagen für Shortcodes verwenden, um die Ausgabe zu ändern. Sie können beispielsweise /jomres/core-plugins/search_form_elements/templates/bootstrap5/search_form_autocomplete kopieren .html in Ihr Verzeichnis theme/template /html/com_jomres und dies wird zur Überschreibung. Wenn Sie beispielsweise mehrere Formulare möchten und eines sich von den anderen unterscheidet, können Sie die Vorlagendatei umbenennen (z. B. search_form_autocomplete.html) in /html/com_jomres zu search_form_autocomplete_new.html und verwenden Sie dann den folgenden Shortcode: {jomres search_form_autocomplete &amp;search_form_autocomplete.html=search_form_autocomplete_new.html}" );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_3', "Wenn Sie die Shortcodes in einer Jomres-Vorlagendatei verwenden möchten, zum Beispiel den Hero-Slider, dann müssen Sie {jomres durch {jomres_script ersetzen und Jomres analysiert die Shortcodes selbst." );