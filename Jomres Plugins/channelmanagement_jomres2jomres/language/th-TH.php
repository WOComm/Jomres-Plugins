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

jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_TITLE',"การรวม Jomres 2 Jomres");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_TITLE',"รหัสไคลเอ็นต์ของไซต์หลัก");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_DESC',"รหัสลูกค้าของไซต์หลัก ในเว็บไซต์หลัก คุณจะต้องมีรหัสไคลเอ็นต์เฉพาะและข้อมูลลับพร้อมปลั๊กอินคุณลักษณะ api ทั้งหมด ติดตั้งปลั๊กอิน Channel Management Framework และเมื่อคุณสร้าง/แก้ไข id ไคลเอ็นต์/ คู่คีย์ลับ คุณจะต้องให้สิทธิ์เข้าถึงขอบเขตที่มีอยู่ทั้งหมด");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_TITLE',"ความลับของไคลเอ็นต์ไซต์หลัก");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_DESC',"ความลับของไคลเอ็นต์ไซต์หลัก");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENTSITE_TITLE',"URL หลัก");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENTSITE_DESC',"URL ไปยังไซต์หลัก Jomres ");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_NOT_SET',"เกิดข้อผิดพลาด รหัสไคลเอ็นต์ของไซต์หลักของคุณไม่ได้ตั้งค่า ไปที่แท็บการกำหนดค่าไซต์ > บัญชี Channel Manager เพื่อบันทึกรหัสลูกค้าของคุณ");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_NOT_SET',"เกิดข้อผิดพลาด ไม่ได้ตั้งค่าความลับของไซต์แม่ ไปที่แท็บการกำหนดค่าไซต์ > บัญชี Channel Manager เพื่อบันทึกข้อมูลลับของคุณ");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENT_NOT_SET',"ข้อผิดพลาด ไม่ได้ตั้งค่า url ลับของไซต์หลักของคุณ ไปที่แท็บการกำหนดค่าไซต์ > บัญชี Channel Manager เพื่อบันทึก url ไซต์หลักของคุณ");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_NOT_SET_ADMIN_SANITY_CHECK_MESSAGE',"เกิดข้อผิดพลาด ไม่ได้ตั้งค่ารหัสลูกค้าของคุณ ไปที่การกำหนดค่าไซต์ > แท็บบัญชีผู้จัดการช่องเพื่อบันทึกชื่อผู้ใช้ของคุณ");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_NOT_SET_ADMIN_SANITY_CHECK_MESSAGE',"เกิดข้อผิดพลาด ไม่ได้ตั้งค่ารหัสลูกค้าของคุณ ไปที่การกำหนดค่าไซต์ > แท็บบัญชี Channel Manager เพื่อบันทึกรหัสผ่านของคุณ");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_TITLE',"การตั้งค่าช่อง");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_MESSAGE',"Jomres 2 Jomres: นำเข้าคุณสมบัติใหม่");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_BUTTON_IMPORT',"IMPORT");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_BUTTON_EXPORT',"ส่งออก");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_PROPERTYID_NOTSET',"ไม่ได้ตั้งค่ารหัสพร็อพเพอร์ตี้");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET',"ไม่ได้ตั้งค่ารายการพจนานุกรมที่แมปไว้");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_PROPERTYTYPE_NOTFOUND',"ไม่พบประเภทคุณสมบัติในเครื่อง หากสร้างประเภทคุณสมบัติแล้ว โปรดตรวจสอบให้แน่ใจว่าคุณได้จับคู่ประเภทคุณสมบัติของบริการระยะไกลกับประเภทคุณสมบัติในพื้นที่");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_REMOTEPROPERTYTYPE_NOTFOUND',"ประเภทคุณสมบัติระยะไกลไม่ส่งคืนโดยช่อง");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_LOCAL_PROPERTYTYPE_NOTFOUND',"ไม่ผ่านประเภทคุณสมบัติในเครื่อง");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_BOOKING_MODEL_NOT_FOUND',"ไม่สามารถระบุรูปแบบการจอง (mrp หรือ srp)");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_BOOKING_MODEL_NOT_FOUND_IN_PROPERTY_TYPE',"ไม่สามารถระบุรูปแบบการจอง (mrp หรือ srp) หลังจากค้นหารหัสประเภททรัพย์สิน");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_COUNTRY_CODE_NOT_FOUND',"ไม่สามารถระบุรหัสประเทศได้");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_REGION_ID_NOT_FOUND',"ไม่สามารถระบุรหัสภูมิภาค");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_VALIDATE_SETTINGS_FAILED',"ไม่สามารถตรวจสอบอาร์เรย์การตั้งค่าได้อย่างถูกต้อง");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_PTYPES',"ประเภทพร็อพเพอร์ตี้ไม่ได้แมปโดยผู้ดูแลระบบ");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_PFEATURES',"คุณสมบัติของคุณสมบัติไม่ได้รับการแมปโดยผู้ดูแลระบบ");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_ROOM_TYPES',"ประเภทห้องไม่ได้แมปโดยผู้ดูแลระบบ");