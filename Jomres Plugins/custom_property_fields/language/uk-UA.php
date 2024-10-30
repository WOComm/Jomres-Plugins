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

jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_TITLE', "Поля користувацьких властивостей");
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_TITLE_EDIT', "Редагувати поле спеціальної властивості");
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_INFO', "Використовуйте цю функцію для створення користувацьких інформаційних полів для властивостей. Ця інформація додається менеджером власності та відображається на новій вкладці на сторінці відомостей про властивості.");
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_MANAGER_TITLE', "Інша інформація про власність");
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_INSTRUCTIONS', "Ці спеціальні поля властивостей можна відображати в деталях властивостей на окремій вкладці або у списку властивостей. Вам потрібно буде вручну змінити /".JOMRES_ROOT_DIRECTORY."/core-plugins/custom_property_fields/templates/tabcontent_01_custom_property_fields.html (for the property details tab) and/or /".JOMRES_ROOT_DIRECTORY."/core-plugins/custom_property_fields/templates/propertylist_custom_property_fields.html (для фрагмента списку властивостей) для досягнення потрібного вам макета. базовий макет виглядатиме приблизно так, що можна використати як приклад, з якого можна створити власний макет. ");