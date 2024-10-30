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

jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_TITLE', "Campos de propiedad personalizados");
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_TITLE_EDIT', "Editar campo de propiedad personalizado");
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_INFO', "Utilice esta función para crear campos de información personalizados para las propiedades. Esta información la agrega un administrador de propiedades y se muestra en una nueva pestaña en la página de detalles de la propiedad.");
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_MANAGER_TITLE', "Otra información de propiedad");
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_INSTRUCTIONS', "Estos campos de propiedad personalizados se pueden mostrar en los detalles de la propiedad en una pestaña separada o en una lista de propiedades. Deberá editar manualmente /".JOMRES_ROOT_DIRECTORY."/core-plugins/custom_property_fields/templates/tabcontent_01_custom_property_fields.html (for the property details tab) and/or /".JOMRES_ROOT_DIRECTORY."/core-plugins/custom_property_fields/templates/propertylist_custom_property_fields.html (para el fragmento de la lista de propiedades) para lograr el diseño que necesita. Con los campos ingresados ​​anteriormente, un diseño básico se parecería al siguiente, que puede usar como ejemplo a partir del cual puede crear su propio diseño. ");