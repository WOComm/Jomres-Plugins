<?php
/**
 * Core file
 *
 * @author Vince Wooll <sales@jomres.net>
 * @version Jomres 9.24.0
 * @package Jomres
 * @copyright	2005-2021 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly.
 **/
##################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
##################################################################

jr_define( 'FIREWALL_CHECK', 'การตรวจสอบไฟร์วอลล์' );
jr_define( 'FIREWALL_CHECK_DESC', 'ปลั๊กอินนี้เป็นการตรวจสอบง่ายๆ เพื่อดูว่าเซิร์ฟเวอร์นี้สามารถเชื่อมต่อกับบริการระยะไกลได้หรือไม่ หากไม่สามารถ แสดงว่ามีกฎไฟร์วอลล์ที่ขัดขวางไม่ให้เครื่องทั้งสองเครื่องพูดคุยกัน หากมี คุณอาจต้องหารือเกี่ยวกับการปรับกฎไฟร์วอลล์กับโฮสต์เว็บเซิร์ฟเวอร์ของคุณ การตอบสนอง 404 & 403 ถือว่าใช้ได้เพราะคุณได้รับการตอบสนองจากบริการระยะไกล' );
jr_define( 'FIREWALL_CHECK_REMOTE_SERVICE', 'บริการระยะไกล' );
jr_define( 'FIREWALL_CHECK_STATUSCODE', 'รหัสสถานะ' );
jr_define( 'FIREWALL_CHECK_IP_NUMBER', 'หมายเลข IP' );