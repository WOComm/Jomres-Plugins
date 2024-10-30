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

	jr_define('_JOMRES_SHORTCODES_06000SHOW_SINGLE_REVIEW',"Prikaži jednu recenziju");
	jr_define('_JOMRES_SHORTCODES_06000SHOW_SINGLE_REVIEW_ARG_PROPERTY_UID',"Uid svojstva");
	jr_define('_JOMRES_SHORTCODES_06000SHOW_SINGLE_REVIEW_ARG_ALT_SCORE_THREASHOLD',"Prag rezultata. Prikaži samo recenzije s ocjenom >= praga.");
	jr_define('_JOMRES_SHORTCODES_06000SHOW_SINGLE_REVIEW_ARG_ALT_IS_SNIPPET',"(Izborno) 1 ili 0. Ako je 1, onda prikaži mali dio teksta, ako 0 prikazuje cijeli dio teksta. Zadana vrijednost 0.");
	jr_define('_JOMRES_SHORTCODES_0600SHOW_SINGLE_REVIEW_ARG_ALT_REVIEW_ID',"(Izborno) ID recenzije. Ako nije postavljeno, prikazat će se nasumični pregled )");
	jr_define('_JOMRES_SHORTCODES_06000SHOW_SINGLE_REVIEW_ARG_ALT_TEMPLATE_PATH',"(Neobavezno) Put predloška. Može se koristiti samo kada ga proslijedi varijabla componentArgs");
	jr_define('_JOMRES_SHORTCODES_06000SHOW_SINGLE_REVIEW_ARG_ALT_TEMPLATE_NAME',"(Izborno) Naziv predloška");
