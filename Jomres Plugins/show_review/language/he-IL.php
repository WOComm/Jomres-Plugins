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


	jr_define('_JOMRES_SHORTCODES_06000SHOW_SINGLE_REVIEW',"הצג ביקורת בודדת");
	jr_define('_JOMRES_SHORTCODES_06000SHOW_SINGLE_REVIEW_ARG_PROPERTY_UID',"Uid נכס");
	jr_define('_JOMRES_SHORTCODES_06000SHOW_SINGLE_REVIEW_ARG_ALT_SCORE_THREASHOLD',"סף ציון. הצג רק ביקורות עם ציון >= סף.");
	jr_define('_JOMRES_SHORTCODES_06000SHOW_SINGLE_REVIEW_ARG_ALT_IS_SNIPPET',"(אופציונלי) 1 או 0. אם 1 אז הצג קטע קטן של טקסט, אם 0 הצג את כל קטע הטקסט. ברירת מחדל 0.");
	jr_define('_JOMRES_SHORTCODES_0600SHOW_SINGLE_REVIEW_ARG_ALT_REVIEW_ID',"(אופציונלי) מזהה סקירה. אם לא הוגדר, תוצג סקירה אקראית )");
	jr_define('_JOMRES_SHORTCODES_06000SHOW_SINGLE_REVIEW_ARG_ALT_TEMPLATE_PATH',"(אופציונלי) נתיב תבנית. ניתן להשתמש רק כאשר מועבר על ידי משתנה componentArgs");
	jr_define('_JOMRES_SHORTCODES_06000SHOW_SINGLE_REVIEW_ARG_ALT_TEMPLATE_NAME',"(אופציונלי) שם תבנית");
