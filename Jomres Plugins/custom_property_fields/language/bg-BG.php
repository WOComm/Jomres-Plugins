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

jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_TITLE', "Полета с персонализирани свойства");
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_TITLE_EDIT', "Редактиране на поле за персонализирана собственост");
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_INFO', "Използвайте тази функция, за да създадете персонализирани информационни полета за имоти. Тази информация се добавя от мениджъра на имоти и се показва в нов раздел в страницата с подробности за имота.");
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_MANAGER_TITLE', "Друга информация за имота");
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_INSTRUCTIONS', "Тези персонализирани полета за свойства могат да се показват в подробности за собствеността в отделен раздел или в списък със свойства. Ще трябва да редактирате ръчно /".JOMRES_ROOT_DIRECTORY."/core-plugins/custom_property_fields/templates/tabcontent_01_custom_property_fields.html (for the property details tab) and/or /".JOMRES_ROOT_DIRECTORY."/core-plugins/custom_property_fields/templates/propertylist_custom_property_fields.html (за раздела с подробности за имота) и/или/ основно оформление би изглеждало по следния начин, което можете да използвате като пример, от което можете да изградите свое собствено оформление. ");