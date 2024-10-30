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

jr_define ('_JOMRES_DATAWIPE_TITLE', "Изтриване на данни");
jr_define ('_JOMRES_DATAWIPE_DESC', "Тази функция ви позволява да изтривате данни, които се събират при извършване на резервации. Тя е предназначена за използване от разработчици, които са създали много данни за разработките на своите инсталации (като тестови резервации, абонаменти) и искат да изтрийте информацията от системата, като същевременно запазите информацията за собствеността и тарифите. <br/> Приставката ще премахне ВСИЧКИ дневници на cron, предпочитани от потребителите, бележки, резервации, фактури, абонати, абонаменти, гости, данни за одит, преброяване на кликвания и рецензии. " );
jr_define ('_JOMRES_DATAWIPE_WARNING', "Тези данни могат да бъдат извлечени само от резервно копие на вашата система, така че трябва да разберете, че това е много вреден скрипт. В резултат на това се препоръчва след като сте го използвали по предназначение с цел след това да го деинсталирате отново. ");
jr_define ('_JOMRES_DATAWIPE_GO', "Щракнете, за да изтриете данни");
jr_define ('_JOMRES_DATAWIPE_EMPTYING', "Изпразване");
jr_define ('_JOMRES_DATAWIPE_EMPTYING_SUCCESS', "Изпразено успешно.");
jr_define ('_JOMRES_DATAWIPE_EMPTYING_FAILURE', "Неуспешно изпразване на таблицата.");