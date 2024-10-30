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

jr_define('_JRPORTAL_PAYMENT_REMINDER_TITLE',"การแจ้งเตือนการชำระเงิน");
jr_define('_JRPORTAL_PAYMENT_REMINDER_NR_DAYS_TITLE1',"ส่งอีเมลแจ้งเตือนการชำระเงิน..");
jr_define('_JRPORTAL_PAYMENT_REMINDER_NR_DAYS_TITLE2',"..วันหลังจากทำการจองชั่วคราว");
jr_define('_JRPORTAL_PAYMENT_REMINDER_INSTRUCTIONS',"ปลั๊กอินนี้ทำงานโดยอัตโนมัติในพื้นหลังและส่งอีเมลแจ้งเตือนการชำระเงินไปยังแขกที่ทำการจองชั่วคราวซึ่งไม่ได้ทำเครื่องหมายว่าชำระเงินภายในช่วงเวลาที่คุณเลือก ซึ่งจะเป็นประโยชน์เมื่อคุณยอมรับการจองที่ชำระเงินแล้ว โดยใช้วิธีการชำระเงินแบบออฟไลน์ (โอนเงินผ่านธนาคาร, เช็ค) หากไม่ชำระเงินการจองภายใน X จำนวนวันนับจากเวลาที่จอง ระบบจะส่งอีเมลแจ้งเตือนการชำระเงินไปยังผู้เข้าพัก คุณจะได้รับสำเนา หากคุณใช้ปลั๊กอินการจัดการการจองชั่วคราวด้วย ตรวจสอบให้แน่ใจว่าช่วงเวลาที่คุณต้องการส่งอีเมลแจ้งเตือนการชำระเงินนั้นต่ำกว่าที่กำหนดไว้สำหรับการลบหรือยกเลิกการจองที่ยังไม่ได้ชำระเงินอย่างน้อย 1 วัน");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_TITLE',"การแจ้งเตือนการชำระเงินสำหรับการจองของคุณที่ ");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY1',"คุณมีการจองที่ยังไม่ได้ชำระเงินที่ ");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY2',"เพื่อประกันการจองของคุณ จำเป็นต้องชำระเงินมัดจำเป็น ");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_BOOKINGNO',"หมายเลขการจอง");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY3'," โปรดติดต่อเราหากคุณต้องการหารือเกี่ยวกับตัวเลือกการชำระเงิน<br /><br />ขอขอบคุณ");