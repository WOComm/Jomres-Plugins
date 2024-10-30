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

jr_define('_JOMRES_DATAWIPE_TITLE',"ล้างข้อมูล");
jr_define('_JOMRES_DATAWIPE_DESC',"ฟีเจอร์นี้อนุญาตให้คุณลบข้อมูลที่รวบรวมเมื่อทำการจอง ฟีเจอร์นี้มีไว้สำหรับนักพัฒนาที่สร้างข้อมูลการพัฒนาจำนวนมากเกี่ยวกับการติดตั้งของตน (เช่น การทดสอบการจอง การสมัครรับข้อมูล) และต้องการ ล้างข้อมูลออกจากระบบในขณะที่รักษาข้อมูลทรัพย์สินและภาษี<br/> ปลั๊กอินจะลบบันทึก cron ทั้งหมด รายการโปรดของผู้ใช้ บันทึกย่อ การจอง ใบแจ้งหนี้ สมาชิก การสมัครรับข้อมูล แขก ข้อมูลการตรวจสอบ จำนวนคลิก และบทวิจารณ์" );
jr_define('_JOMRES_DATAWIPE_WARNING',"ข้อมูลนี้สามารถเรียกค้นได้จากสำเนาสำรองของระบบของคุณเท่านั้น ดังนั้นคุณต้องเข้าใจว่านี่เป็นสคริปต์ที่สร้างความเสียหายอย่างมาก ดังนั้น ขอแนะนำว่าเมื่อคุณใช้แล้วตามวัตถุประสงค์ จุดประสงค์ให้คุณถอนการติดตั้งอีกครั้งในภายหลัง");
jr_define('_JOMRES_DATAWIPE_GO',"คลิกเพื่อล้างข้อมูล");
jr_define('_JOMRES_DATAWIPE_EMPTYING',"กำลังล้างข้อมูล ");
jr_define('_JOMRES_DATAWIPE_EMPTYING_SUCCESS',"ล้างข้อมูลเรียบร้อยแล้ว");
jr_define('_JOMRES_DATAWIPE_EMPTYING_FAILURE',"ไม่สามารถล้างตารางได้");