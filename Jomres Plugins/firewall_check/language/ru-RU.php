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

jr_define ('FIREWALL_CHECK', 'Проверка межсетевого экрана');
jr_define ('FIREWALL_CHECK_DESC', 'Этот плагин представляет собой простую проверку того, может ли этот сервер подключаться к удаленным службам. Если нет, это может означать, что существуют правила брандмауэра, не позволяющие двум машинам общаться друг с другом. есть, тогда вам может потребоваться обсудить настройку правил брандмауэра с хостами вашего веб-сервера.Ответы 404 и 403 можно считать нормальными, потому что вы получаете ответ от удаленной службы. ');
jr_define ('FIREWALL_CHECK_REMOTE_SERVICE', 'Удаленная служба');
jr_define ('FIREWALL_CHECK_STATUSCODE', 'Код состояния');
jr_define ('FIREWALL_CHECK_IP_NUMBER', 'IP-номер');