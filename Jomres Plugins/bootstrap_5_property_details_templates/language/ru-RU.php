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


	jr_define('JOMRES_BS5_PROPERTY_DETAILS_TEMPLATES_TITLE', "Шаблоны сведений о свойствах");
	jr_define('JOMRES_BS5_PROPERTY_DETAILS_TEMPLATES_INFO', "Этот плагин содержит различные файлы шаблонов сведений о свойствах. Здесь вы можете указать, могут ли менеджеры выбирать свои собственные шаблоны сведений о свойствах, и какой шаблон вы хотите использовать по умолчанию для сайта." );

	jr_define('JOMRES_BS5_PROPERTY_DETAILS_CONFIGURATION_TITLE', "Шаблон сведений о свойствах");
	jr_define('JOMRES_BS5_PROPERTY_DETAILS_CONFIGURATION_DESCRIPTION', "Выберите макет, который вы хотите использовать, когда люди просматривают ваш ресурс.");

	jr_define('JOMRES_BS5_PROPERTY_DETAILS_TEMPLATES_ADMIN_DEFAULT', "Макет страницы сведений о свойстве по умолчанию");
	jr_define('JOMRES_BS5_PROPERTY_DETAILS_TEMPLATES_ADMIN_DEFAULT_INFO', "Настройте шаблон сведений о свойствах, который следует использовать на всем сайте. Если менеджерам разрешено использовать свои собственные макеты, их выбор будет иметь приоритет над этим." );

	jr_define('JOMRES_BS5_PROPERTY_DETAILS_TEMPLATES_ADMIN_MANAGERS_ALLOWED', "Менеджеры могут выбрать собственный шаблон?");
	jr_define('JOMRES_BS5_PROPERTY_DETAILS_TEMPLATES_ADMIN_MANAGERS_ALLOWED_INFO', "Используйте этот параметр, чтобы определить, могут ли управляющие недвижимостью выбирать собственный макет страницы сведений о собственности." );


	jr_define('JOMRES_BS5_PROPERTY_DETAILS_TEMPLATES_DEFAULT', "Детали свойств по умолчанию");
	jr_define('JOMRES_BS5_PROPERTY_DETAILS_TEMPLATES_LUX', "Роскошный макет");
	jr_define('JOMRES_BS5_PROPERTY_DETAILS_TEMPLATES_MINIMALIST', "Минималистский макет");
	jr_define('JOMRES_BS5_PROPERTY_DETAILS_TEMPLATES_CALENDAR_ONLY', "Только календарь");
	jr_define('JOMRES_BS5_PROPERTY_DETAILS_TEMPLATES_DYNAMO', "Динамо");