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

jr_define('_JOMRES_CUSTOM_PROPERTY_FIELDS_TITLE',"Custom property fields");
jr_define('_JOMRES_CUSTOM_PROPERTY_FIELDS_TITLE_EDIT',"Edit custom property field");
jr_define('_JOMRES_CUSTOM_PROPERTY_FIELDS_INFO',"Use this feature to create custom information fields for properties. This information is added by a property manager, and displayed in a new tab in the property details page.");
jr_define('_JOMRES_CUSTOM_PROPERTY_FIELDS_MANAGER_TITLE',"Other property information");
jr_define('_JOMRES_CUSTOM_PROPERTY_FIELDS_INSTRUCTIONS',"These custom property fields can be displayed in property details in a separated tab, or in property list. You will need to manually edit /".JOMRES_ROOT_DIRECTORY."/core-plugins/custom_property_fields/templates/tabcontent_01_custom_property_fields.html (for the property details tab) and/or /".JOMRES_ROOT_DIRECTORY."/core-plugins/custom_property_fields/templates/propertylist_custom_property_fields.html (for the property list snippet) to achieve the layout you require. With the fields as entered above, a basic layout would look something like the following, which you can use as an example from which you can build your own layout. ");