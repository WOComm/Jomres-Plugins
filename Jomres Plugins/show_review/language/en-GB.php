<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2016 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

jr_define('_JOMRES_SHORTCODES_06000SHOW_SINGLE_REVIEW',"Show a single review");
jr_define('_JOMRES_SHORTCODES_06000SHOW_SINGLE_REVIEW_ARG_PROPERTY_UID',"Property uid");
jr_define('_JOMRES_SHORTCODES_06000SHOW_SINGLE_REVIEW_ARG_ALT_SCORE_THREASHOLD',"Score threashold. Only show reviews with a score >= threashold.");
jr_define('_JOMRES_SHORTCODES_06000SHOW_SINGLE_REVIEW_ARG_ALT_IS_SNIPPET',"(Optional) 1 or 0. If 1 then show a small section of text, if 0 show the whole section of text. Default 0.");
jr_define('_JOMRES_SHORTCODES_0600SHOW_SINGLE_REVIEW_ARG_ALT_REVIEW_ID',"(Optional) Review id. If not set a random review will be shown )");
jr_define('_JOMRES_SHORTCODES_06000SHOW_SINGLE_REVIEW_ARG_ALT_TEMPLATE_PATH',"(Optional) Template path. Can only be used when passed by componentArgs variable");
jr_define('_JOMRES_SHORTCODES_06000SHOW_SINGLE_REVIEW_ARG_ALT_TEMPLATE_NAME',"(Optional) Template name");

