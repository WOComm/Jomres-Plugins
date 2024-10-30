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


	jr_define('CONVERSATIONS',"การสนทนา");
	jr_define('CONVERSATION',"คุณกำลังพูดถึง ");
	jr_define('CONVERASTIONS_GROUPS',"กลุ่ม");
	jr_define('CONVERSATIONS_WELCOME_MESSAGE_1',"สวัสดี ยินดีต้อนรับสู่ ");
	jr_define('CONVERSATIONS_WELCOME_MESSAGE_2',"ฉันจะช่วยคุณได้อย่างไร");
	jr_define('CONVERSATIONS_PLACEHOLDER',"ป้อนข้อความของคุณ...");
	jr_define('CONVERSATIONS_MEMBERS',"สมาชิกกลุ่ม");
	jr_define('CONVERSATIONS_NO_CONVERSATIONS_MANAGER',"ยังไม่มีข้อความที่นี่");
	jr_define('CONVERSATIONS_NO_CONVERSATIONS_GUEST',"ยังไม่มีข้อความใดๆ ที่นี่ คุณสามารถเริ่มการสนทนาใหม่ได้โดยไปที่สถานที่ให้บริการและคลิกปุ่มติดต่อสำหรับสถานที่ให้บริการนั้น");
	jr_define('CONVERSATION_NAME',"ชื่อการสนทนา");
	jr_define('CONVERSATION_GROUP_ID',"รหัสกลุ่ม");
	jr_define('CONVERSATION_UNDREAD_MESSAGES',"ข้อความที่ยังไม่ได้อ่าน");
	jr_define('CONVERSATION_LAST_MESSAGE',"ข้อความสุดท้าย");
	jr_define('CONVERSATION_LEAVE_GROUP',"ออกจากกลุ่ม");
	jr_define('LIST_CONVERSATIONS_INFO',"คุณสามารถดูรายการการสนทนาได้ที่นี่ หมายเหตุ ข้อความที่ยังไม่ได้อ่านหมายถึงข้อความที่คุณยังไม่ได้อ่านเป็นการส่วนตัว สมาชิกในกลุ่มอาจอ่านและตอบกลับแล้ว คลิกที่ชื่อการสนทนา เพื่อเปิดการสนทนาในหน้าต่างใหม่");
	jr_define('CONVERSATION_MODAL_TITLE',"การแจ้งเตือนการสนทนา");
	jr_define('CONVERSATION_MODAL_NUDGE',"คุณมีข้อความใหม่");
	jr_define('CONVERSATION_MODAL_GO',"ดูการสนทนา");
	jr_define('MESSAGING_SYSTEM_SITE_CONFIG_TAB_TITLE',"ระบบข้อความ");
	jr_define('MESSAGING_SYSTEM_SITE_CONFIG_LOGIN_MODULE_ID',"รหัสโมดูลการเข้าสู่ระบบ Joomla");
	jr_define('MESSAGING_SYSTEM_SITE_CONFIG_LOGIN_MODULE_DESC', "id ของโมดูลการเข้าสู่ระบบของคุณ โปรดดูข้อมูลเพิ่มเติมเกี่ยวกับการตั้งค่านี้ Plugin Infos Plugin ");
jr_define('MESSAGING_SYSTEM_SEARCH_FIELD_PLACEHOLDER',"ค้นหา");
jr_define('MESSAGING_SYSTEM_USER_TYPES_REGISTERED',"ผู้ใช้ที่ลงทะเบียน");
jr_define('MESSAGING_SYSTEM_USER_TYPES_PROPERTY_MANAGER',"ตัวจัดการคุณสมบัติ");
jr_define('MESSAGING_SYSTEM_USER_TYPES_ADMINISTRATOR',"ผู้ดูแลระบบ");
jr_define('MESSAGING_SYSTEM_SITE_CONFIG_LOGIN_WIDGET_SHORTCODE',"รหัสย่อการเข้าสู่ระบบ WordPress");
jr_define('MESSAGING_SYSTEM_SITE_CONFIG_LOGIN_WIDGET_SHORTCODE_DESC',"รหัสย่อของวิดเจ็ตการเข้าสู่ระบบของคุณ โปรดดูข้อมูลเพิ่มเติมเกี่ยวกับการตั้งค่านี้ ปลั๊กอินข้อมูลปลั๊กอิน ");
jr_define('MESSAGING_SYSTEM_REST_API_LOCATION_WARNING',"ปัจจุบันการติดตั้ง Jomres ของคุณอยู่ในไดเร็กทอรี /wp-content/plugins/jomres/jomres/ ดังนั้นคุณยังใช้ระบบการส่งข้อความไม่ได้ โปรดไปที่หน้า Administrator > Jomres > Tools > Rest API Test สำหรับข้อมูลเพิ่มเติมและคำแนะนำ หากต้องการลบข้อความนี้ ให้ย้ายไฟล์ตามคำแนะนำในหน้านั้นหรือถอนการติดตั้งปลั๊กอิน Messaging");
jr_define('MESSAGING_SYSTEM_BSVERSION_WARNING',"ขออภัย Jomres Messaging System ทำงานบนไซต์ที่มีธีม/เทมเพลตที่สนับสนุน Bootstrap 5 เท่านั้น และตำแหน่งการตั้งค่าไซต์การกำหนดค่า > แท็บเบ็ดเตล็ด > เวอร์ชัน Bootstrap ถูกตั้งค่าเป็น Bootstrap 5 หรือไม่มี Bootstrap ในธีม") ;