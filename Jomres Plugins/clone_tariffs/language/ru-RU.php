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
jr_define('_CLONE_TARIFFS_TITLE',"Клонировать тарифы");
jr_define('_CLONE_TARIFFS_INFO',"Здесь вы можете клонировать тариф из целевого свойства в исходное. Вам будут доступны только свойства, которыми вы имеете права управлять.");
jr_define('_CLONE_TARIFFS_SOURCE',"Исходное свойство");
jr_define('_CLONE_TARIFFS_TARIFF_TO_CLONE',"Тариф для клонирования");
jr_define('_CLONE_TARIFFS_TARGET',"Целевое свойство");
jr_define('_CLONE_TARIFFS_TARGET_ROOMTYPE',"Тип комнаты целевого объекта");
jr_define('_CLONE_TARIFFS_TARGET_WARNING',"Если режим редактирования тарифа целевого свойства отличается от режима редактирования тарифа исходного свойства, то при клонировании исходные тарифы целевого свойства будут удалены, а его режим редактирования тарифа изменен, чтобы отразить режим редактирования исходного настройка свойства.");
jr_define('_CLONE_TARIFFS_TARGET_DELETE_EXISTING',"Удалить существующие тарифы на объекте Target?");
jr_define('_CLONE_TARIFFS_TARGET_DELETE_OPTION',"Если режим редактирования тарифа для свойства Target такой же, как и для свойства Source, то существующие тарифы не будут удалены. Однако вы можете переопределить это, установив для этого параметра значение Yes.");