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

jr_define( 'FIREWALL_CHECK', 'Проверка на защитната стена');
jr_define ('FIREWALL_CHECK_DESC', 'Тази плъгин е проста проверка дали този сървър може да се свърже с отдалечени услуги. Ако не може, това може да означава, че има правила за защитна стена, които пречат на двете машини да си говорят. Ако има са, тогава може да се наложи да обсъдите коригирането на правилата на защитната стена с хостовете на вашия уеб сървър. Отговорите 404 и 403 могат да се считат за добре, защото получавате отговор от отдалечената услуга.');
jr_define( 'FIREWALL_CHECK_REMOTE_SERVICE', 'Отдалечена услуга');
jr_define( 'FIREWALL_CHECK_STATUSCODE', 'Код на състоянието');
jr_define('FIREWALL_CHECK_IP_NUMBER', 'IP номер');