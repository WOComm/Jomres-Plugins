<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.24.0
 *
 * @copyright	2005-2021 Vince Wooll
 * Jomres is currently available for use in all personal or commercial projects under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/
//#################################################################
defined('_JOMRES_INITCHECK') or die('');
//#################################################################

	jr_define('_JOMRES_SHORTCODES_06000SHOW_SINGLE_REVIEW',"Eine einzelne Bewertung anzeigen");
	jr_define('_JOMRES_SHORTCODES_06000SHOW_SINGLE_REVIEW_ARG_PROPERTY_UID',"Eigenschafts-UID");
	jr_define('_JOMRES_SHORTCODES_06000SHOW_SINGLE_REVIEW_ARG_ALT_SCORE_THREASHOLD',"Punktzahlschwelle. Nur Bewertungen mit einer Punktzahl >= Schwelle anzeigen.");
	jr_define('_JOMRES_SHORTCODES_06000SHOW_SINGLE_REVIEW_ARG_ALT_IS_SNIPPET',"(Optional) 1 oder 0. Bei 1 wird ein kleiner Textabschnitt angezeigt, bei 0 der gesamte Textabschnitt. Standard 0.");
	jr_define('_JOMRES_SHORTCODES_0600SHOW_SINGLE_REVIEW_ARG_ALT_REVIEW_ID',"(Optional) Bewertungs-ID. Wenn nicht festgelegt, wird eine zufällige Bewertung angezeigt)");
	jr_define('_JOMRES_SHORTCODES_06000SHOW_SINGLE_REVIEW_ARG_ALT_TEMPLATE_PATH',"(Optional) Vorlagenpfad. Kann nur verwendet werden, wenn es von der Variablen \"componentArgs\" übergeben wird");
	jr_define('_JOMRES_SHORTCODES_06000SHOW_SINGLE_REVIEW_ARG_ALT_TEMPLATE_NAME',"(Optional) Vorlagenname");
