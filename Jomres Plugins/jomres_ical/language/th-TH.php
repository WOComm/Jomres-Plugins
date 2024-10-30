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

jr_define( '_JOMRES_ICAL_EVENT', 'เหตุการณ์ iCal' );
jr_define( '_JOMRES_ICAL_FEED', 'iCal Feed' );
jr_define( '_JOMRES_ICAL_FEED_LINK', 'URL ฟีด iCal' );
jr_define( '_JOMRES_ICAL_FEEDS', 'iCal Feed/s' );
jr_define( '_JOMRES_ICAL_FEEDS_DESC', 'ฟีด iCal ของคุณสามารถแสดงการจองที่กำลังจะมีขึ้นในปฏิทินระยะไกลรวมถึงอุปกรณ์มือถือ, Google ปฏิทิน, Apple Calendar, Thunderbird, Outlook และอื่นๆ ใช้ URL/s ต่อไปนี้เพื่อสมัครรับฟีด/s ใน ซอฟต์แวร์ปฏิทินของคุณ' );
jr_define ( '_JOMRES_ICAL_ANON', ' URL ฟีด iCal ที่ไม่ระบุชื่อ' );
jr_define( '_JOMRES_ICAL_ALLOW_ANON', 'อนุญาตให้เข้าถึง iCal feed/s โดยไม่ระบุชื่อ?' );
jr_define( '_JOMRES_ICAL_ALLOW_ANON_DESC', 'หากเปิดใช้งานตัวเลือกนี้ ฟีดกิจกรรม iCal ของคุณจะพร้อมใช้งานสำหรับทุกคน แต่ไม่มีรายละเอียดการจองหรือแขก' );
jr_define( '_JOMRES_ICAL_IMPORT', 'การนำเข้า iCal' );
jr_define( '_JOMRES_ICAL_SELECT', 'เลือกไฟล์ที่จะนำเข้า' );
jr_define( '_JOMRES_ICAL_NO_FILE_UPLOADED', 'เกิดข้อผิดพลาด ไม่มีการอัปโหลดไฟล์' );
jr_define( '_JOMRES_ICAL_IMPORT_INFO', "เมื่อนำเข้าไฟล์ iCal วันที่สิ้นสุดกิจกรรมควรเป็นวันที่ออกเดินทางของแขก สรุปควรเป็นชื่อของแขก คำอธิบายกิจกรรมสามารถมีรายละเอียดอื่นๆ ทั้งหมดได้" );

jr_define( '_JOMRES_ICAL_ERROR_BOOKING_NUMBER_EXISTS', 'หมายเลขการจองนี้มีอยู่แล้วในระบบ' );
jr_define( '_JOMRES_ICAL_ERROR_NO_ROOMS', 'ไม่มีห้องว่างในวันที่เลือก' );
jr_define( '_JOMRES_ICAL_ERROR_NO_EVENTS', 'ไม่พบเหตุการณ์ในไฟล์ ics' );
jr_define( '_JOMRES_ICAL_SUCCESS', 'นำเข้ากิจกรรมสำเร็จ' );
jr_define( '_JOMRES_ICAL_FAILURE', 'ไม่สามารถนำเข้ากิจกรรม' );

jr_define( '_JOMRES_ICAL_RESULT_HEADER_SUMMARY', 'ชื่อแขก' );
jr_define( '_JOMRES_ICAL_RESULT_HEADER_DESCRIPTION', 'คำอธิบายเหตุการณ์' );
jr_define( '_JOMRES_ICAL_RESULT_HEADER_START', 'เริ่ม' );
jr_define( '_JOMRES_ICAL_RESULT_HEADER_END', 'สิ้นสุด' );
jr_define( '_JOMRES_ICAL_RESULT_HEADER_RESULT', 'ผลลัพธ์' );
jr_define( '_JOMRES_ICAL_WITHHELD', 'ระงับ' );
jr_define( '_JOMRES_ICAL_FEED_SETTINGS_DESC', 'ฟีด iCal ของคุณสามารถแสดงการจองที่กำลังจะมีขึ้นในปฏิทินระยะไกล รวมถึงอุปกรณ์มือถือ, Google ปฏิทิน, Apple Calendar, Thunderbird, Outlook และอื่นๆ' );
jr_define( '_JOMRES_ICAL_SYNC_SETTINGS_DESC', 'คุณลักษณะนี้ช่วยให้คุณสามารถซิงค์การจองจากเว็บไซต์ต่างๆ เช่น Airbnb, Homeway และอื่นๆ ไปยัง Jomres คุณจะต้องป้อน URL ฟีด iCal ของที่พักของคุณสำหรับแต่ละไซต์ที่คุณต้องการซิงค์ด้วย หากใครสักคนจะ จองที่พักของคุณบน Airbnb เช่น วันที่เหล่านั้นจะแสดงเป็นบล็อก (การจองสีดำ) บนไซต์ Jomres นี้ด้วย ดังนั้นไม่มีใครสามารถจองวันที่เหล่านั้นที่นี่ได้เช่นกัน การดำเนินการนี้จะไม่ซิงค์รายละเอียดการจองระหว่างไซต์ต่างๆ (เช่น รายละเอียดผู้เข้าพัก ราคา ใบแจ้งหนี้ ฯลฯ) แต่เป็นวิธีที่ดีและง่ายในการหลีกเลี่ยงการจองซ้ำซ้อนโดยการซิงค์เฉพาะความพร้อม' );
jr_define( '_JOMRES_ICAL_SYNC_SETTINGS', 'การตั้งค่าการซิงค์ iCal' );
jr_define( '_JOMRES_ICAL_FEED_SETTINGS', 'การตั้งค่าฟีด iCal' );
jr_define( '_JOMRES_ICAL_SYNC_URL1', 'URL iCal ภายนอก' );
jr_define( '_JOMRES_ICAL_FEED_INCLUDE_ENQUIRIES', 'รวมการสอบถามข้อมูลการจองด้วยหรือไม่' );
jr_define( '_JOMRES_ICAL_FEED_INCLUDE_ENQUIRIES_DESC', 'หากเปิดใช้งาน จะรวมการจองที่ยังไม่ได้รับการอนุมัติด้วย (หากเปิดใช้งานคุณสมบัติการอนุมัติการจอง) การปิดใช้ตัวเลือกนี้เป็นวิธีที่ดีในการซ่อนการจองจากปฏิทินที่อาจรอการยืนยันใน สถานะไม่อนุมัติ/สอบถาม หากการจองไม่ต้องการการอนุมัติ (ปิดใช้งานคุณสมบัติการอนุมัติการจอง) การจองทั้งหมดจะถูกส่งออก' );

jr_define( '_JOMRES_ICAL_REMOTE_FEED', 'iCal ฟีดระยะไกล' );
jr_define( '_JOMRES_ICAL_REMOTE_FEED_URL', 'URL ระยะไกล' );
jr_define( '_JOMRES_ICAL_REMOTE_FEED_ROOM_UID', 'ห้อง UID' );
jr_define( '_JOMRES_ICAL_REMOTE_FEED_ROOM_NAME', 'ชื่อห้อง/หมายเลข' );
jr_define( '_JOMRES_ICAL_REMOTE_INFO', "เลือกห้องที่ฟีดนี้จะมีผล และ URL ของไซต์ระยะไกล เมื่อนำเข้าไฟล์ iCal วันที่สิ้นสุดกิจกรรมควรเป็นวันออกเดินทางของแขก สรุปควรเป็นชื่อแขก เหตุการณ์ คำอธิบายสามารถมีรายละเอียดอื่น ๆ ทั้งหมดได้" );

jr_define( '_JOMRES_ICAL_REMOTE_FEED_SAVED', 'สร้างฟีดระยะไกล Ical แล้ว' );
jr_define( '_JOMRES_ICAL_REMOTE_FEED_DELETED', 'ลบฟีดระยะไกล Ical' );