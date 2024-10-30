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
	jr_define('_JOMRES_SHORTCODES_06000SHOW_SINGLE_REVIEW',"Ցույց տալ մեկ կարծիք");
jr_define('_JOMRES_SHORTCODES_06000SHOW_SINGLE_REVIEW_ARG_PROPERTY_UID',"Գույքի uid");
jr_define('_JOMRES_SHORTCODES_06000SHOW_SINGLE_REVIEW_ARG_ALT_SCORE_THREASHOLD',"Միավորների շեմ: Ցուցադրել միայն >= շեմով կարծիքները:");
jr_define('_JOMRES_SHORTCODES_06000SHOW_SINGLE_REVIEW_ARG_ALT_IS_SNIPPET',"(Ըստ ցանկության) 1 կամ 0: Եթե 1-ը, ապա ցույց տվեք տեքստի փոքր հատվածը, եթե 0-ը ցույց կտա տեքստի ամբողջ հատվածը: Կանխադրված 0:");
jr_define('_JOMRES_SHORTCODES_0600SHOW_SINGLE_REVIEW_ARG_ALT_REVIEW_ID',"(Ըստ ցանկության) Վերանայման ID: Եթե սահմանված չէ, պատահական ակնարկ կցուցադրվի )");
jr_define('_JOMRES_SHORTCODES_06000SHOW_SINGLE_REVIEW_ARG_ALT_TEMPLATE_PATH',"(ըստ ցանկության) Կաղապարի ուղի: Կարող է օգտագործվել միայն այն դեպքում, երբ փոխանցվում է componentArgs փոփոխականով");
jr_define('_JOMRES_SHORTCODES_06000SHOW_SINGLE_REVIEW_ARG_ALT_TEMPLATE_NAME',"(ըստ ցանկության) Կաղապարի անուն");