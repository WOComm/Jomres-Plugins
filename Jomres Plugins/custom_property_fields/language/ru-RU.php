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

jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_TITLE', "Поля настраиваемых свойств");
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_TITLE_EDIT', "Изменить поле настраиваемого свойства");
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_INFO', "Используйте эту функцию для создания настраиваемых информационных полей для свойств. Эта информация добавляется менеджером свойств и отображается в новой вкладке на странице сведений о свойстве.");
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_MANAGER_TITLE', "Другая информация о собственности");
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_INSTRUCTIONS', "Эти настраиваемые поля свойств могут отображаться в сведениях о свойствах на отдельной вкладке или в списке свойств. Вам потребуется вручную отредактировать /".JOMRES_ROOT_DIRECTORY."/core-plugins/custom_property_fields/templates/tabcontent_01_custom_property_fields.html (for the property details tab) and/or /".JOMRES_ROOT_DIRECTORY."/core-plugins/custom_property_fields/templates/propertylist_custom_property_fields.html (для фрагмента списка свойств), чтобы получить требуемый макет. С полями, как указано выше, базовый макет будет выглядеть примерно так, как показано ниже, который вы можете использовать в качестве примера, из которого вы можете построить свой собственный макет. ");