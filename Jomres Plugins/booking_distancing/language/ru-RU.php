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

jr_define ('_JOMRES_QBLOCK_TITLE', "Расстояние бронирования");
jr_define ('_JOMRES_QBLOCK_SETTING', "Разрешить дистанцию бронирования?");
jr_define ('_JOMRES_QBLOCK_DESCRIPTION', "Этот параметр позволяет вам включить дистанцию бронирования. Если этот параметр включен, до и после каждого бронирования создается черное бронирование на N дней, что дает вам время, чтобы убедиться, что свойство было глубоко очищено перед следующим гостем прибывает. ");
jr_define ('_JOMRES_QBLOCK_BLACKBOOKING_NOTE', "Расстояние бронирования для идентификатора бронирования");
jr_define ('_JOMRES_QBLOCK_DAYS', "Количество дней для блокировки");
jr_define ('_JOMRES_QBLOCK_DAYS_DESC', "На сколько дней следует заблокировать комнату / собственность?");