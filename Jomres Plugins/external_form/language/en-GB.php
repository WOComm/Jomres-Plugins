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

jr_define('EXTERNAL_FORM',"External Form");
jr_define('EXTERNAL_FORM_PLUGIN_SHORTCODE','Plugin shortcode (e.g. "rsform")');
jr_define('EXTERNAL_FORM_PLUGIN_ARG1','Argument 1 (e.g. "1")');
jr_define('EXTERNAL_FORM_PLUGIN_ARG2',"Argument 2 (optional)");
jr_define('EXTERNAL_FORM_INFO',"Allows you to include a form from an external form plugin into the tabs of the property details. Set the Plugin shortcode to something like 'rsform' and add extra arguments as needed. Doesn't need to be a form, can be anything that's called as a mambot, but a form would be a typical use.");
