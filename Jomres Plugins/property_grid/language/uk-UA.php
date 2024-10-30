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

	jr_define( '_JOMRES_SHORTCODES_06000PROPERTY_GRID', "Сітка властивостей. Відображає ряд властивостей, ідеально підходить для цільової сторінки." );

	jr_define( '_JOMRES_SHORTCODES_06000PROPERTY_GRID_PROPERTY_UIDS', "Використовуйте або property_uids або property_cols. property_uids приймає розділений комами список ідентифікаторів властивостей, які ви хочете показати. Можна показати максимум 6 властивостей" );
	jr_define( '_JOMRES_SHORTCODES_06000PROPERTY_GRID_PROPERTY_COLS', "Альтернативно, виберіть кількість стовпців для відображення від 1 до 6. Випадкові властивості будуть вибрані з бази даних для відображення." );