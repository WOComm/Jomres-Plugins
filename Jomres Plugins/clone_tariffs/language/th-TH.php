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

jr_define('_CLONE_TARIFFS_TITLE',"ภาษีโคลน");
jr_define('_CLONE_TARIFFS_INFO',"คุณสามารถโคลนภาษีจากทรัพย์สินเป้าหมายเป็นทรัพย์สินต้นทางได้ที่นี่ เฉพาะคุณสมบัติที่คุณมีอำนาจในการจัดการเท่านั้นที่จะสามารถใช้ได้");
jr_define('_CLONE_TARIFFS_SOURCE',"คุณสมบัติต้นทาง");
jr_define('_CLONE_TARIFFS_TARIFF_TO_CLONE',"ภาษีที่จะโคลน");
jr_define('_CLONE_TARIFFS_TARGET',"คุณสมบัติเป้าหมาย");
jr_define('_CLONE_TARIFFS_TARGET_ROOMTYPE',"ประเภทห้องเป้าหมาย");
jr_define('_CLONE_TARIFFS_TARGET_WARNING',"หากโหมดการแก้ไขภาษีของทรัพย์สินเป้าหมายแตกต่างจากโหมดแก้ไขภาษีของทรัพย์สินต้นทาง เมื่อการโคลนเกิดขึ้น อัตราภาษีเดิมของทรัพย์สินเป้าหมายจะถูกลบ และโหมดการแก้ไขภาษีจะเปลี่ยนเพื่อสะท้อนถึงที่มา การตั้งค่าทรัพย์สิน");
jr_define('_CLONE_TARIFFS_TARGET_DELETE_EXISTING',"ลบอัตราภาษีที่มีอยู่ในทรัพย์สินเป้าหมายหรือไม่");
jr_define('_CLONE_TARIFFS_TARGET_DELETE_OPTION',"หากโหมดการแก้ไขภาษีของทรัพย์สินเป้าหมายเหมือนกับคุณสมบัติต้นทาง ภาษีที่มีอยู่จะไม่ถูกลบ อย่างไรก็ตาม คุณสามารถเลือกที่จะแทนที่ได้โดยการตั้งค่าตัวเลือกนี้เป็นใช่");