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
jr_define( 'FIREWALL_CHECK', 'Firewall yoxlama' );
jr_define( 'FIREWALL_CHECK_DESC', 'Bu plagin bu serverin uzaq xidmətlərə qoşulub-qoşula bilməyəcəyini yoxlamaq üçün sadə bir yoxlamadır. Əgər bunu edə bilmirsə, bu, iki maşının bir-biri ilə danışmasına mane olan təhlükəsizlik duvarı qaydalarının olduğunu göstərə bilər. Əgər varsa. varsa, onda siz veb-server hostlarınızla firewall qaydalarının tənzimlənməsini müzakirə etməli ola bilərsiniz. 404 və 403 cavabları yaxşı hesab edilə bilər, çünki siz uzaqdan xidmətdən cavab alırsınız.' );
jr_define( 'FIREWALL_CHECK_REMOTE_SERVICE', 'Uzaqdan xidmət' );
jr_define( 'FIREWALL_CHECK_STATUSCODE', 'Status kodu' );
jr_define( 'FIREWALL_CHECK_IP_NUMBER', 'IP Nömrə' );