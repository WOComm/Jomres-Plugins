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

jr_define('FIREWALL_CHECK', 'Güvenlik duvarı kontrolü');
jr_define( 'FIREWALL_CHECK_DESC', 'Bu eklenti, bu sunucunun uzak servislere bağlanıp bağlanamadığını görmek için basit bir kontroldür. Bağlanamıyorsa, bu, iki makinenin birbiriyle konuşmasını engelleyen güvenlik duvarı kuralları olduğunu gösterebilir. Varsa varsa, güvenlik duvarı kurallarını ayarlamayı web sunucusu ana bilgisayarlarınızla görüşmeniz gerekebilir. 404 ve 403 yanıtları, uzak hizmetten bir yanıt aldığınız için uygun kabul edilebilir.' );
jr_define('FIREWALL_CHECK_REMOTE_SERVICE', 'Uzaktan servis');
jr_define('FIREWALL_CHECK_STATUSCODE', 'Durum kodu');
jr_define('FIREWALL_CHECK_IP_NUMBER', 'IP Numarası');