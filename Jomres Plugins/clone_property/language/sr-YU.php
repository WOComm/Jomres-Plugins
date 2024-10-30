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

jr_define('_JRPORTAL_CLONEPROPERTY_TITLE',"Clone property");
jr_define('_JRPORTAL_CLONEPROPERTY_CHOOSEPROPERTY',"Select the property you wish to clone : ");
jr_define('_JRPORTAL_CLONEPROPERTY_NEWPROPERTY_NAME',"New property's name : ");
jr_define('_JRPORTAL_CLONEPROPERTY_NOTES',"Be aware that clone properties have no tariffs, you should use the Clone Tariffs plugin if you wish to copy tariffs, or create the tariffs manually. No plugin settings are imported, if available. Property is not cross referenced with any property managers.<br/> Clone Property should only be used to duplicate a property when the new property will thereafter use the same property type and room type.");
jr_define('_JRPORTAL_CLONEPROPERTY_DONE',"Property cloned");