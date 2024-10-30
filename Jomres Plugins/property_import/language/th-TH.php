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

jr_define('_JOMRES_PROPERTY_IMPORT_TITLE',"การนำเข้าคุณสมบัติ");
jr_define('_JOMRES_PROPERTY_IMPORT_DESC',"คุณสมบัตินี้อนุญาตให้คุณนำเข้าคุณสมบัติผ่านไฟล์ CSV เนื่องจากต้องมีการตรวจสอบต่างๆ เราขอแนะนำให้คุณจำกัดจำนวนคุณสมบัติที่สร้างครั้งละไม่เกิน 50 รายการ ");
jr_define('_JOMRES_PROPERTY_IMPORT_SELECT',"โปรดเลือกไฟล์ที่คุณต้องการอัปโหลด");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELDS',"ไฟล์ csv ควรมี 11 คอลัมน์ และฟิลด์ไม่ควรมี html ใดๆ จำเป็นต้องระบุทุกฟิลด์");

jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_NAME',"ชื่อพร็อพเพอร์ตี้");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_NAME_TYPE',"ข้อความ");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_ROOMS',"จำนวนห้อง (หากเป็นวิลล่า/กระท่อม โดยไม่คำนึงถึงจำนวนห้องในทรัพย์สินจริง ค่านี้ควรเป็น 1 เฉพาะโรงแรม/บีแอนด์บี ฯลฯ ควรมีมากกว่าหนึ่งห้อง) จำนวนเต็ม .");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_ROOMS_TYPE',"จำนวนเต็ม");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_PRICE',"ราคาต่อคืนไม่มีรหัสสกุลเงิน");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_PRICE_TYPE',"ลอย");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_EMAIL_ADDRESS',"ที่อยู่อีเมล");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_EMAIL_ADDRESS_TYPE',"ข้อความ");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_STREET',"ถนน");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_STREET_TYPE',"ข้อความ");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TOWN',"เมือง");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TOWN_TYPE',"ข้อความ");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_REGION',"Region. สิ่งนี้ต้องสอดคล้องกับรหัสของภูมิภาคที่จัดเก็บไว้ในตารางภูมิภาค");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_REGION_TYPE',"จำนวนเต็ม");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_COUNTRY',"ประเทศของที่พัก รหัสย่อ เช่น GB หรือ DE ไม่ใช่ชื่อประเทศเต็ม");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_COUNTRY_TYPE',"ข้อความ");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_POSTCODE',"รหัสไปรษณีย์");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_POSTCODE_TYPE',"ข้อความ");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TELEPHONE',"หมายเลขโทรศัพท์");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TELEPHONE_TYPE',"ข้อความ");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_DESCRIPTION',"คำอธิบายแบบเต็มของคุณสมบัติ สูงสุด 500 อักขระ");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_DESCRIPTION_TYPE',"ข้อความ");

jr_define('_JOMRES_PROPERTY_IMPORT_PROPERTY_TYPE_NOT_SENT',"ข้อผิดพลาด ไม่ได้ตั้งค่าประเภทคุณสมบัติ");
jr_define('_JOMRES_PROPERTY_IMPORT_NO_ROOM_TYPES_FOR_PROPERTY_TYPE',"ข้อผิดพลาด เราไม่มีประเภทห้องสำหรับประเภทที่พักนั้น คุณสามารถแก้ไขได้โดยไปที่โครงสร้างเว็บไซต์ในพื้นที่ผู้ดูแลระบบ");
jr_define('_JOMRES_PROPERTY_IMPORT_NO_FILE',"อ๊ะ คุณลืมอัปโหลดไฟล์หรือเปล่า ");

jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_TOO_MANY_COLUMNS',"พบคอลัมน์มากเกินไป ไฟล์มีรูปแบบไม่ถูกต้องหรือสร้างข้อมูล csv ไม่ถูกต้อง");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_PROPERTY_NAME_NOT_SET',"ไม่ได้ตั้งชื่อคุณสมบัติ");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NUMBER_OF_ROOMS_INCORRECT',"ไม่ได้กำหนดจำนวนห้อง");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_PRICE_NOT_SET',"ไม่ได้กำหนดราคาต่อคืน");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_COULD_NOT_VALIDATE_EMAIL_ADDRESS',"ไม่สามารถตรวจสอบที่อยู่อีเมลได้");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_STREET',"ไม่ได้ตั้งค่าถนน");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_TOWN',"ไม่ได้ตั้งค่าเมือง");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_REGION',"ไม่ได้ตั้งค่าภูมิภาค");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_COUNTRY',"ไม่ได้ตั้งค่าประเทศ");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_POSTCODE',"ไม่ได้ตั้งค่ารหัสไปรษณีย์");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_TELEPHONE',"ไม่ได้ตั้งค่าโทรศัพท์");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_DESCRIPTION',"ไม่ได้ตั้งค่าคำอธิบาย");

jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_SUCCESS',"นำเข้าคุณสมบัติสำเร็จแล้ว!");

jr_define('_JOMRES_PROPERTY_IMPORT_FAILED_PROPERTIES',"เนื่องจากคุณมีคุณสมบัติตั้งแต่หนึ่งรายการขึ้นไปที่นำเข้าไม่สำเร็จ เราได้ส่งออกเฉพาะคุณสมบัติเหล่านั้นลงในฟิลด์ด้านล่าง คุณสามารถคัดลอกคุณสมบัติเหล่านี้ไปที่ excell/open office calc/ตัวเลือกตัวจัดการไฟล์ CSV และแก้ไข ปัญหาโดยไม่ต้องนำเข้าคุณสมบัติทั้งหมดอีกครั้ง");