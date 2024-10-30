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
jr_define('_JOMRES_CUSTOM_PROPERTY_FIELDS_TITLE',"Pola właściwości niestandardowych");
jr_define('_JOMRES_CUSTOM_PROPERTY_FIELDS_TITLE_EDIT',"Edytuj pole niestandardowej właściwości");
jr_define('_JOMRES_CUSTOM_PROPERTY_FIELDS_INFO',"Użyj tej funkcji do tworzenia niestandardowych pól informacji dla właściwości. Te informacje są dodawane przez menedżera właściwości i wyświetlane w nowej karcie na stronie szczegółów właściwości.");
jr_define('_JOMRES_CUSTOM_PROPERTY_FIELDS_MANAGER_TITLE',"Inne informacje o właściwościach");
jr_define('_JOMRES_CUSTOM_PROPERTY_FIELDS_INSTRUCTIONS',"Te niestandardowe pola właściwości mogą być wyświetlane w szczegółach właściwości na osobnej karcie lub na liście właściwości. Musisz ręcznie edytować /".JOMRES_ROOT_DIRECTORY."/core-plugins/custom_property_fields/templates/tabcontent_01_custom_property_fields.html (for the property details tab) and/or /".JOMRES_ROOT_DIRECTORY."/core-plugins/custom_property_fields/templates/propertylist_custom_property_fields.html (dla fragmentu listy właściwości), aby uzyskać wymagany układ. podstawowy układ wyglądałby podobnie do poniższego, którego możesz użyć jako przykładu, na podstawie którego możesz zbudować własny układ. ");