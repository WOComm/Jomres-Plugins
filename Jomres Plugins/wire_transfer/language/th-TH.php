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

jr_define('_JRPORTAL_WIRE_TRANSFER',"การโอนเงิน");
jr_define('_JRPORTAL_WIRE_TRANSFER_TITLE',"การตั้งค่าการโอนสาย");
jr_define('_JRPORTAL_WIRE_TRANSFER_ADMIN_INSTRUCTIONS',"ที่นี่ คุณสามารถกำหนดรายละเอียดบัญชีธนาคารที่จะใช้สำหรับคุณสมบัติทั้งหมดที่เปิดใช้งาน Wire Transfer Gateway หากคุณเลือกที่จะแทนที่รายละเอียดบัญชีธนาคารที่กำหนดไว้ในส่วนหน้า รายละเอียดที่กำหนดไว้ที่นี่จะเป็น ใช้แล้ว หากคุณเลือกที่จะไม่ทำ ระบบจะใช้รายละเอียดบัญชีธนาคารที่กำหนดไว้ในการกำหนดค่าเกตเวย์ส่วนหน้า");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_OVERRIDE_ACTIVE',"แทนที่รายละเอียดบัญชีธนาคารที่กำหนดไว้สำหรับคุณสมบัติทั้งหมดหรือไม่ ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_ACCOUNT_HOLDER',"เจ้าของบัญชี: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_IBAN',"IBAN: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_SWIFT',"รหัส SWIFT: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_BIC',"รหัส BIC: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_NAME',"ชื่อธนาคาร: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_ACCOUNT_HOLDER1',"เจ้าของบัญชี: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_IBAN1',"IBAN: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_SWIFT1',"รหัส SWIFT: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_BIC1',"รหัส BIC: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_NAME1',"ชื่อธนาคาร: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_ACCOUNT_HOLDER2',"เจ้าของบัญชี: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_IBAN2',"IBAN: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_SWIFT2',"รหัส SWIFT: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_BIC2',"รหัส BIC: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_NAME2',"ชื่อธนาคาร: ");
jr_define('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_EMAIL_TITLE',"รายละเอียดการชำระเงินสำหรับการจองของคุณที่ ");
jr_define('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_EMAIL_HELLO', "เรียน ");
jr_define('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_EMAIL_THANKYOU',"ขอขอบคุณสำหรับการจองของคุณที่ ");
jr_define('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_SENDDEPOSITTO',"เพื่อประกันการจองของคุณ โปรดโอนเงินมัดจำจำนวน ");
jr_define('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_BELOWADDRESS_EMAIL'," ไปยังบัญชีธนาคารด้านล่าง");
jr_define('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_BELOWADDRESS'," ไปยังบัญชีธนาคารด้านล่าง สำเนาข้อมูลบัญชีธนาคารจะส่งถึงคุณทางอีเมลหลังจากที่คุณส่งการจองนี้");
jr_define('_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_CONTACTUS1',"หากคุณมีคำถามใดๆ โปรดติดต่อเรา คุณสามารถโทรหาเราได้ที่ ");
jr_define('_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_CONTACTUS2'," หรือส่งอีเมลถึงเราที่ ");
jr_define('_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_CONTACTUS_EMAIL',"หากคุณมีคำถามใดๆ โปรดติดต่อเรา");
jr_define('_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_PRINT',"พิมพ์รายละเอียดบัญชีธนาคาร");
jr_define('_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_SUBMIT',"ส่ง");