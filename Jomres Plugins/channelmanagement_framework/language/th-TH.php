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
jr_define('CHANNELMANAGEMENT_FRAMEWORK_CHANNEL_ID_NOT_SET',"ไม่ได้ตั้งค่ารหัสช่อง");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_MANAGER_ID_NOT_SET',"ไม่ได้ตั้งค่า ID ผู้จัดการ");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_TITLE',"กรอบงานตัวจัดการช่อง");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_FRONTEND_TITLE',"ช่อง");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_INSTALLED_CHANNELS',"ช่องที่ติดตั้ง");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_CHOOSE_CHANNEL',"เลือกช่อง");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_CHOOSE_CHANNEL_CHOOSE_DICTIONARY_TYPE',"เลือกประเภทพจนานุกรม");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_CHANNEL_NONE_INSTALLED',"ข้อผิดพลาด ไม่ได้ติดตั้งช่องสัญญาณ");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_SANITY_CHECKS_TITLE',"Channel Manager ตรวจสอบความมีสติ");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_SANITY_CHECKS_DESC',"เลือกช่องสัญญาณ เมื่อคุณดำเนินการเสร็จแล้ว เราจะตรวจสอบการกำหนดค่าของคุณและเน้นปัญหาที่เป็นไปได้ที่คุณอาจต้องแก้ไข");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_TITLE',"การแมปทรัพยากร");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_DESC',"ช่องสัญญาณต่างๆ มีสิ่งที่เรียกว่าพจนานุกรม ซึ่งเป็นคำศัพท์ที่ใช้อธิบายทรัพยากรต่างๆ เช่น ประเภทห้อง ลักษณะห้อง คุณลักษณะของที่พัก เป็นต้น ก่อนที่คุณจะสามารถใช้ช่องสัญญาณ คุณต้องแมปทรัพยากร Jomres ต่างๆ กับช่องแต่ละช่อง ทรัพยากรเพื่อให้คุณสมบัติที่นำเข้าและส่งออกไปยังช่องทางมีทรัพยากรที่ถูกต้อง ในหน้านี้ คุณจะเลือกช่องแรก เมื่อเสร็จแล้ว คุณจะถูกนำไปที่หน้าใหม่ซึ่งคุณจะสามารถเลือกประเภททรัพยากรที่คุณต้องการแมป ไปยังทรัพยากรของ Channel (เช่น คุณสมบัติคุณสมบัติ) เมื่อเลือกประเภททรัพยากรแล้ว คุณจะสามารถเลือกทรัพยากรของ Jomres และ Channel ร่วมกันได้");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_SELECT_RESOURCE',"คุณต้องเลือกทรัพยากรที่นี่ (พจนานุกรม) ");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_NO_LOCAL_ITEMS',"ไม่มีรายการท้องถิ่นสำหรับรายการพจนานุกรมนี้ ดังนั้นจึงไม่มีอะไรเทียบได้");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_CHANNEL_DICTIONARY_CLASS_DOESNT_EXIST',"เกิดข้อผิดพลาด ช่องไม่มีคลาสพจนานุกรม");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_MAP_ITEM_TYPES_INSTRUCTIONS',"ในหน้านี้ คุณจะต้องจับคู่รายการพจนานุกรมของ Channel manager กับรายการใน Jomres");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_USER_ACCOUNTS',"บัญชีผู้จัดการช่อง");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_USER_ACCOUNTS_DESC',"โปรดบันทึกข้อมูลการอนุญาตสำหรับผู้จัดการช่องใด ๆ ที่คุณอาจมีบัญชีด้วย");
jr_define('FINISH', 'แก้ไขเสร็จสิ้น');
jr_define('CHANNELMANAGEMENT_FRAMEWORK_EXTRAS_NOTINSTALLED',"เกิดข้อผิดพลาด ไม่ได้ติดตั้งปลั๊กอินเสริมเสริม");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_CHANNEL_NAME_NOT_SUPPLIED',"ไม่ได้ระบุชื่อช่อง");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_NEW_PROPERTY_OBJECT_NOT_SUPPLIED',"ไม่ได้ระบุอ็อบเจ็กต์คุณสมบัติใหม่");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_THISJRUSER_OBJECT_NOT_SUPPLIES',"วัตถุ JRUser นี้ไม่ได้ให้มา");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING',"กำลังเริ่มนำเข้าคุณสมบัติ ");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTED',"นำเข้าคุณสมบัติเรียบร้อยแล้ว ");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_FAILED',"ไม่สามารถนำเข้าคุณสมบัติ ");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT',"นำเข้าคุณสมบัติทั้งหมด");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_ONE',"นำเข้าคุณสมบัติ");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_UNPUBLISHED_CANNOT_IMPORT',"คุณสมบัติที่ไม่ได้ทำเครื่องหมายว่าเผยแพร่/เปิดใช้งานบนเซิร์ฟเวอร์ระยะไกล หรือคุณสมบัติที่ไม่มีรายการบันทึกการเปลี่ยนแปลงใดๆ ไม่สามารถนำเข้าได้");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORTING',"กำลังเริ่มนำเข้าภาษี ");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORTED',"นำเข้าภาษีเรียบร้อยแล้ว ");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORT_FAILED',"นำเข้าภาษีไม่สำเร็จ ");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_SETTINGS_FAILED_VALIDATION',"ไม่สามารถตรวจสอบการตั้งค่าคุณสมบัติได้ มีการพยายามนำเข้าการตั้งค่าคุณสมบัติที่ไม่รู้จัก ");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_PAGETITLE',"คุณสมบัติที่นำเข้า");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_PROPERTY_NAME',"ชื่อพร็อพเพอร์ตี้");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_CHANNEL_NAME',"ชื่อช่อง");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_LOCAL_PROPERTY_UID',"Local property uid");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_REMOTE_PROPERTY_UID',"คุณสมบัติระยะไกล uid");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_EDIT_REMOTE_PROPERTY',"แก้ไขรีโมต");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_EDIT_LOCAL_PROPERTY',"ดูในเครื่อง");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_DELETE_LOCAL_PROPERTY',"ลบในเครื่อง");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_MENUITEM_DASHBOARD',"แดชบอร์ด");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_MENUITEM_ACCOUNTS',"บัญชีของช่อง");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_THIN_CHANNELS_NOT_INSTALLED',"ยังไม่มีการติดตั้งปลั๊กอิน thin channel คุณยังไม่สามารถใช้คุณลักษณะนี้ได้");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_INFO',"คุณสมบัติที่ไม่ได้มอบหมายซึ่งคุณจัดการสามารถกำหนดให้กับช่องได้ หากคุณเปลี่ยนช่องสัญญาณ แสดงว่าคุณกำลังให้ช่องใด ๆ ที่มีการเข้าถึง API ที่ถูกต้อง ");