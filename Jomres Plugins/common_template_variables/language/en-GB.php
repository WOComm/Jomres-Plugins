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

jr_define('_COMMON_STRINGS_TITLE',"Common template variables");

jr_define('_COMMON_STRINGS_INFO',"Developer tool. Designed to show developers common strings that are available to all templates without needing to add them to the template's calling script.<br/> For example, in this list is the definition COMMON_NEXT. A developer can add this to a Jomres template without having to define it in the calling script. You would add the common string to the template just like any other string, by putting  	&#123;COMMON_NEXT&#125; in the template.<br/> In the list below you will see the constant as defined in the language file, and next to it the output that it will show (subject to there being any property specific language customisations). Note, in the case of the 'COMMON_LAST_VIEWED_PROPERTY_UID' constant, the property uid varies and is not shown in this list.");
jr_define('_COMMON_STRINGS_CONSTANT',"Constant");
jr_define('_COMMON_STRINGS_VALUE',"Output");

