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

jr_define('_CLONE_TARIFFS_TITLE',"Клониране на тарифи");
jr_define('_CLONE_TARIFFS_INFO',"Тук можете да клонирате тарифа от целево свойство към свойство източник. Ще ви бъдат достъпни само имоти, които имате право да управлявате.");
jr_define('_CLONE_TARIFFS_SOURCE',"Изходно свойство");
jr_define('_CLONE_TARIFFS_TARIFF_TO_CLONE',"Тарифа за клониране");
jr_define('_CLONE_TARIFFS_TARGET',"Целево свойство");
jr_define('_CLONE_TARIFFS_TARGET_ROOMTYPE',"Целеви тип стая за имот");
jr_define('_CLONE_TARIFFS_TARGET_WARNING',"Ако режимът за редактиране на тарифа на целевото свойство е различен от режима на редактиране на тарифа на свойството източник, тогава, когато се осъществи клонирането, оригиналните тарифи на целевото свойство ще бъдат изтрити и режимът му за редактиране на тарифа се променя, за да отразява този на източника настройка на свойството.");
jr_define('_CLONE_TARIFFS_TARGET_DELETE_EXISTING',"Изтриване на съществуващи тарифи в целевото свойство?");
jr_define('_CLONE_TARIFFS_TARGET_DELETE_OPTION',"Ако режимът за редактиране на тарифа на целевото свойство е същият като свойството източник, тогава съществуващите тарифи няма да бъдат изтрити. Можете обаче да изберете да отмените това, като зададете тази опция на Да.");