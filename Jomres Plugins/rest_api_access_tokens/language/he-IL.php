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
	jr_define('REST_API_ACCESS_TOKENS_MENU_OPTION',"רשום אסימוני גישה של REST API");
	jr_define('REST_API_ACCESS_TOKENS_INFO',"דף זה מפרט את כל הלקוחות ואם זמינים, אסימוני הגישה שלהם (ייתכן שהלקוחות לא ביקשו אסימון גישה). זה שימושי אם אתה רוצה לשלוח שאילתות דרך לקוח כמו Postman ואתה צריך אסימון גישה למרות שדף זה מפרט אסימוני גישה ל-SYSTEM, לא מומלץ להשתמש בהם. ");