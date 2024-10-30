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

jr_define( 'FIREWALL_CHECK', 'Перевірка брандмауера');
jr_define ('FIREWALL_CHECK_DESC', 'Цей плагін - це проста перевірка того, чи може цей сервер підключатися до віддалених служб. Якщо це неможливо, це може означати, що існують правила брандмауера, які перешкоджають спілкуванню двох машин. Якщо є є, то вам може знадобитися обговорити налаштування правил брандмауера з хостами вашого веб-сервера. Відповіді 404 і 403 можна вважати нормальними, оскільки ви отримуєте відповідь від віддаленої служби.' );
jr_define( 'FIREWALL_CHECK_REMOTE_SERVICE', 'Віддалена служба');
jr_define( 'FIREWALL_CHECK_STATUSCODE', 'Код стану');
jr_define('FIREWALL_CHECK_IP_NUMBER', 'Номер IP');