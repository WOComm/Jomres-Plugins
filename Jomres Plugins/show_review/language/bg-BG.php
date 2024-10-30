<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.24.0
 *
 * @copyright	2005-2021 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/
//#################################################################
defined('_JOMRES_INITCHECK') or die('');
//#################################################################


	jr_define('_JOMRES_SHORTCODES_06000SHOW_SINGLE_REVIEW',"Показване на една рецензия");
	jr_define('_JOMRES_SHORTCODES_06000SHOW_SINGLE_REVIEW_ARG_PROPERTY_UID',"Идентификационен номер на собственост");
	jr_define('_JOMRES_SHORTCODES_06000SHOW_SINGLE_REVIEW_ARG_ALT_SCORE_THREASHOLD',"Праг за оценка. Показвайте само рецензии с оценка >= праг.");
	jr_define('_JOMRES_SHORTCODES_06000SHOW_SINGLE_REVIEW_ARG_ALT_IS_SNIPPET',"(По избор) 1 или 0. Ако е 1, тогава показва малка част от текста, ако 0 показва цялата част от текст. По подразбиране 0.");
	jr_define('_JOMRES_SHORTCODES_0600SHOW_SINGLE_REVIEW_ARG_ALT_REVIEW_ID',"(По избор) Идентификатор на прегледа. Ако не е зададен, ще се покаже произволен преглед)");
	jr_define('_JOMRES_SHORTCODES_06000SHOW_SINGLE_REVIEW_ARG_ALT_TEMPLATE_PATH',"(По избор) Път към шаблона. Може да се използва само когато се предава от променлива componentArgs");
	jr_define('_JOMRES_SHORTCODES_06000SHOW_SINGLE_REVIEW_ARG_ALT_TEMPLATE_NAME',"(По избор) Име на шаблона");