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

jr_define('USEFUL_LINKS_MODULE_TITLE',"Полезни връзки за ");
jr_define('USEFUL_LINKS_FORSALE',"Имоти за продажба в ");
jr_define('USEFUL_LINKS_HOTELS',"Хотели/Нощувки със закуска в ");
jr_define('USEFUL_LINKS_VILLAS',"Ваканционни къщи под наем в ");
jr_define('USEFUL_LINKS_WIKIPEDIA',"Информация за ");

jr_define('USEFUL_LINKS_ADMIN',"Полезни връзки");
jr_define('USEFUL_LINKS_ADMIN_PROPERTIESFORSALE',"Идентификатор на типа на недвижими имоти");
jr_define('USEFUL_LINKS_ADMIN_HOTELS',"Идентификатор на тип собственост на хотел/пансион със закуска");
jr_define('USEFUL_LINKS_ADMIN_VILLAS',"Идентификатор на типа имот за ваканционни къщи");

jr_define( '_JOMRES_SHORTCODES_06000USEFULLINKS', 'Този плъгин е предназначен да показва връзки към конкретни търсения, ако URL адресът включва "страна", "регион" или "град", така че обикновено бихте искали да го поставите в странична лента или позиция на модул/джаджа на в горната част на страницата. Първо ще трябва да конфигурирате приставката в раздела Конфигурация на сайта > Полезни връзки, за да посочите идентификаторите на тип имоти за Хотели, Недвижими имоти и Апартамент/Вила/Вили. ');