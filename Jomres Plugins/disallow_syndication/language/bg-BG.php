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

jr_define ('DISALLOW_SYNDICATION_TITLE', "Забрани синдикацията");
jr_define ('DISALLOW_SYNDICATION_DESCRIPTION', 'Функцията за синдикация на Jomres.net е нова функционалност, предназначена за споделяне на свойства между сайтове, въпреки че резервациите могат да се правят само на домашния сървър.');

jr_define ('DISALLOW_SYNDICATION_DESCRIPTION_MORE', "Целта на това е да даде възможност на сайтовете да изградят доверие с търсачките. Това е безплатна функция, достъпна за всички потребители на Jomres. Притежателите на активни лицензи на Jomres могат, ако желаят да изберат да премахнат своите сайт от мрежата за синдикация чрез тази страница. Localhost не може да бъде добавен към мрежата и ако по някаква причина има проблем с връзката, няма да можете да добавите вашия сайт към мрежата. Проверете тестовата страница за свързване на REST API, ако се съмняват. ");

jr_define ('DISALLOW_SYNDICATION_INSTRUCTIONS_DISALLOW', "Щракнете върху тази връзка, за да премахнете вашия сайт от мрежата.");
jr_define ('DISALLOW_SYNDICATION_INSTRUCTIONS_ALLOW', "Щракнете върху тази връзка, за да добавите вашия сайт към мрежата.");

jr_define ('DISALLOW_SYNDICATION_DISALLOW', "Премахване на този сайт от мрежата");
jr_define ('DISALLOW_SYNDICATION_ALLOW', "Добавяне на този сайт към мрежата");

jr_define ('DISALLOW_SYNDICATION_INVALID_KEY', "За съжаление ключът ви за поддръжка не е валиден или не е активен, не можете да промените състоянието на синдикиране на тази инсталация.");