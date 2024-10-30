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

// Because the server may be using a proxy for outgoing calls it's better to call the Jomres App server and ask it to respond with this server's IP address. Once we know that, then we are able to give the documentation the correct IP number to configure in Beds24's API Key N field(s)
$cURLConnection = curl_init();

curl_setopt($cURLConnection, CURLOPT_URL, 'https://api.ipify.org?format=json');
curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
curl_setopt($cURLConnection, CURLOPT_CONNECTTIMEOUT, 1);
curl_setopt($cURLConnection, CURLOPT_TIMEOUT, 1);

$ip_number_response = curl_exec($cURLConnection);
curl_close($cURLConnection);

$jsonArrayResponse = json_decode($ip_number_response);

if (isset( $jsonArrayResponse->ip)) {
    $this_servers_ip_number = $jsonArrayResponse->ip;
} else {
    $this_servers_ip_number = 'Unknown, ask your server hosts support team';
}
jr_define( 'BEDS24V2_CHANNEL_MANAGEMENT', 'การจัดการช่อง (Beds24)' );

jr_define( 'BEDS24V2_WEBHOOKS_AUTH_METHOD', 'Beds24' );
jr_define( 'BEDS24V2_WEBHOOKS_AUTH_METHOD_NOTES', 'หากคุณมีบัญชี Beds24 และต้องการอัปเดต Beds24 เมื่อคุณจอง โปรดเลือกตัวเลือกนี้ ตั้งค่า URL เป็น https://www.beds24.com/api/json/ ' );
jr_define( 'BEDS24V2_ERROR_USER_NO_KEY', 'ผู้ใช้รายนี้ไม่ได้ตั้งค่าคีย์ API ดังนั้นจึงไม่สามารถดำเนินการต่อได้ โปรดไปที่หน้าของพวกเขาในหน้าการจัดการผู้ใช้ > ผู้จัดการทรัพย์สิน และสร้างคีย์ API ใหม่ให้กับพวกเขาโดยใช้ลิงก์ที่ให้ไว้ในหน้านั้น' );
jr_define( 'BEDS24V2_ERROR_USER_NO_PROPERTIES', 'ผู้ใช้รายนี้ไม่มีคุณสมบัติของ Jomres ที่สามารถกำหนดให้กับคุณสมบัติ Beds24 หรือในทางกลับกัน' );
jr_define( 'BEDS24V2_NOT_SUBSCRIBED', "ผู้จัดการที่คุณเข้าสู่ระบบเนื่องจากไม่มีบัญชีกับ Beds24 ดังนั้น คุณจะต้องลงทะเบียนใช้บริการก่อน จากนั้นจึงบันทึกคีย์ API นี้ใน <a href='https://www.beds24.com/control2.php?pagetype=accountpassword' target='_blank'>เว็บไซต์ของ Beds24 ที่นี่</a>" );
jr_define( 'BEDS24V2_NOT_SUBSCRIBED_KEY', "คัดลอกและวางคีย์ API นี้ลงในฟิลด์ LINK ในบัญชี Beds24 ของคุณเพื่อดำเนินการต่อ" );
jr_define( 'BEDS24V2_NOT_SUBSCRIBED_RELOAD', "เมื่อคุณทำเสร็จแล้ว โปรดคลิกปุ่มด้านล่างเพื่อดำเนินการต่อ" );
jr_define( 'BEDS24V2_DISPLAY_PROPERTIES_TITLE', "การเชื่อมโยงคุณสมบัติ Beds24" );
jr_define( 'BEDS24V2_DISPLAY_PROPERTIES_INFO', "หน้านี้ช่วยให้คุณสามารถดูคุณสมบัติที่คุณสามารถเข้าถึงได้ในระบบนี้ รวมทั้งคุณสมบัติที่มีอยู่ใน Channel Manager นอกจากนี้ยังช่วยให้คุณสามารถนำเข้าคุณสมบัติจาก Channel Manager เข้าสู่ระบบนี้หรือส่งออก คุณสมบัติที่มีอยู่ใน Channel Manager <br/> หากคุณมีที่พักทั้งในระบบนี้และ Beds24 และต้องการเชื่อมโยงเข้าด้วยกัน คุณสามารถใช้ Property apikey เพื่อดำเนินการดังกล่าว ไปที่ Beds24 > Settings > Properties (ตรวจสอบให้แน่ใจว่า พร็อพเพอร์ตี้ที่เลือกในรายการแบบเลื่อนลงจะเหมือนกับรายการที่คุณต้องการเชื่อมโยง) จากนั้นในเมนูย่อยลิงก์ให้บันทึก 'Property apikey' ในช่อง 'propKey' ใน Beds24 เมื่อคุณทำเสร็จแล้ว ให้โหลดหน้าซ้ำ ระบบนี้จะ ดูว่าคุณสมบัติทั้งสองเชื่อมโยงกับคีย์เดียวกันและสร้างการเชื่อมโยงที่จำเป็น เมื่อเชื่อมโยงคุณสมบัติทั้งสองแล้ว อย่าลืมไปที่หน้าดูคุณสมบัติ ค้นหา URL การแจ้งเตือน และวางลงในฟิลด์ 'แจ้ง URL' ของหน้าลิงก์ นั่นจะ ตรวจสอบให้แน่ใจว่า Beds24 ใช้ลิงก์ที่ถูกต้องเพื่อซิงโครไนซ์การจองกับที่พักนั้นเมื่อได้รับการจอง " );
jr_define( 'BEDS24V2_DISPLAY_PROPERTIES_NO_PROPERTIES', "ข้อผิดพลาด: ไม่มีคุณสมบัติที่คุณสามารถเชื่อมโยงไปถึงใน Beds24 อาจเป็นเพราะคุณสมบัติทั้งหมดที่คุณมีสิทธิ์ได้รับการเชื่อมโยงกับบัญชีอื่นในระบบนี้แล้ว" );
jr_define ( 'BEDS24V2_DISPLAY_PROPERTIES_PROPERTY_UID', "คุณสมบัติ uid" );
jr_define( 'BEDS24V2_DISPLAY_PROPERTIES_PROPERTY_NAME', "ชื่อพร็อพเพอร์ตี้" );
jr_define( 'BEDS24V2_DISPLAY_PROPERTIES_BEDS24_PROPERTY_UID', "Beds24 Property Uid" );
jr_define( 'BEDS24V2_DISPLAY_PROPERTIES_BEDS24_PROPERTY_NAME', "ชื่อที่พัก Beds24" );
jr_define ( 'BEDS24V2_DISPLAY_PROPERTY_APIKEY', "คุณสมบัติ apikey" );
jr_define('BEDS24_LISTPROPERTIES_IMPORT', "นำเข้า");
jr_define('BEDS24_LISTPROPERTIES_ASSOCIATE_ROOM_TYPES', "กำหนดค่าประเภทห้อง");
jr_define('BEDS24_LISTPROPERTIES_ASSOCIATE_ROOM_TYPES_DESC', "คุณจะต้องเชื่อมโยงประเภทห้องในบัญชี Beds24 ของคุณกับประเภทห้องที่จัดเก็บไว้ในระบบนี้");
jr_define('_BEDS24_DISPLAY_BOOKINGS_JOMRESROOMS_BEDS24TYPENAME', "ประเภทห้อง Beds24");

jr_define('BEDS24_LISTPROPERTIES_IMPORT_CANNOT_NOAPIKEY', "ยังไม่สามารถนำเข้าคุณสมบัตินี้ได้ เนื่องจากคุณยังไม่ได้ตั้งค่ารหัสคุณสมบัติในหน้าลิงก์คุณสมบัติ");
jr_define('BEDS24_LISTPROPERTIES_IMPORT_CANNOT_NOROOMS', "ยังไม่สามารถนำเข้าสถานที่ให้บริการนี้ เนื่องจากไม่มีห้องใดๆ โปรดสร้างห้องอย่างน้อยหนึ่งห้อง (ห้องใน Beds24 เหมือนกับประเภทห้องใน Jomres) และอย่าลืมตั้งราคาขั้นต่ำ เมื่อคุณทำเสร็จแล้ว คุณสามารถนำเข้าประเภทห้องไปยัง Jomres และเชื่อมโยงกับประเภทห้อง Jomres ในปัจจุบัน หลังจากนั้น คุณจะสามารถแก้ไขอัตราภาษีได้ แต่ต้องกำหนดราคาขั้นต่ำ");
jr_define('_BEDS24_SUGGESTED_KEY', "เราขอแนะนำให้คุณใช้คีย์ API นี้ เมื่อคุณทำเสร็จแล้ว ให้โหลดหน้านี้ใหม่");
jr_define('BEDS24_LISTPROPERTIES_EXPORT', "ส่งออก");
jr_define( 'BEDS24V2_REST_API_INTRO', "คุณสามารถดูคู่คีย์ REST API และเส้นทางไปยัง API ได้ที่นี่ หากคุณบันทึกรายละเอียดเหล่านี้ในบัญชีของคุณบน Beds24 แล้ว Beds24 24 จะสามารถติดต่อไซต์นี้ผ่าน API ได้" );
jr_define( 'BEDS24V2_REST_API_CLIENT_ID', "รหัสลูกค้า" );
jr_define( 'BEDS24V2_REST_API_CLIENT_SECRET', "ความลับของไคลเอ็นต์" );
jr_define( 'BEDS24V2_REST_API_ENDPOINT', "URI (ปลายทาง)" );
jr_define('BEDS24_LISTPROPERTIES_CONFIGURE', "ดูคุณสมบัติ");
jr_define('BEDS24_ROOM_TYPES_TITLE', "การเชื่อมโยงประเภทห้อง");

jr_define('BEDS24_ROOM_TYPES_INFO', "หน้านี้อนุญาตให้คุณเชื่อมโยงประเภทห้องของคุณกับประเภทห้องที่จัดเก็บไว้ในเซิร์ฟเวอร์ Beds24");
jr_define('BEDS24_ROOM_TYPES_INFO2', "คุณจะไม่สามารถรับข้อมูลการจองที่ส่งจาก Beds24 ได้จนกว่าจะเชื่อมโยงประเภทห้องพัก หากที่พักของคุณถูกนำเข้า/ส่งออกไปยังหรือจาก Beds24 เราได้สร้างลิงก์สำหรับคุณโดยอัตโนมัติ อย่างไรก็ตาม หากคุณเพิ่ม ประเภทห้องใหม่หรือลบหนึ่งรายการ หน้านี้สามารถใช้เพื่อให้แน่ใจว่าประเภทห้องนั้นเชื่อมโยงอย่างถูกต้อง");
jr_define('BEDS24_ROOM_TYPES_INFO3', "เลือกประเภทห้อง Beds24 ที่คุณต้องการเชื่อมโยงกับประเภทห้องในระบบนี้ และเมื่อเสร็จแล้ว ให้คลิกบันทึกเพื่ออัปเดตการเปลี่ยนแปลงของ Beds24");
jr_define('BEDS24_ROOM_TYPES_YOURS', "ประเภทห้องของคุณ");
jr_define('BEDS24_ROOM_TYPES_BEDS24', "ประเภทห้อง Beds24");
jr_define('BEDS24_ROOM_TYPES_NONE', "ที่พักนี้ไม่มีประเภทห้องใดๆ ดังนั้นจึงไม่สามารถเชื่อมโยงกับประเภทห้อง Beds24 ได้ คุณต้องการนำเข้าประเภทห้องจาก Beds24 หรือไม่");
jr_define('BEDS24_IMPORT_ROOMS', "นำเข้าห้อง");
jr_define('BEDS24_EXPORT_BOOKINGS', "ส่งออกการจอง");
jr_define('BEDS24_IMPORT_BOOKINGS', "นำเข้าการจอง");
jr_define('BEDS24_IMPORT_EXPORT', "คุณสามารถนำเข้าและส่งออกการจองที่มีอยู่จากและไปยัง Beds24 ได้ด้วยการคลิกปุ่ม การจองที่นำเข้าจาก Beds24 จะถูกนำเข้าจากเมื่อวาน และจะรวมการจองทั้งหมดของปีหน้า คุณควรใช้ปุ่มเหล่านี้หลังจาก ขั้นแรกให้นำเข้าหรือส่งออกคุณสมบัติไปยังระบบ เมื่อตั้งค่าแล้ว การนำเข้าและ/หรือการส่งออกจะดำเนินการโดยอัตโนมัติ");
jr_define('_BEDS24_CHANNEL_MANAGEMENT_UPDATE_PRICING_YESNO', "อัปเดตราคาเป็น Beds24?");
jr_define('_BEDS24_CHANNEL_MANAGEMENT_UPDATE_PRICING_YESNO_DESC', "คุณสามารถเลือกอัปเดต Beds24 ให้มีเพียงห้องว่างหรือทั้งห้องว่างและราคา หากคุณใช้มีสถานการณ์เฉพาะที่คุณต้องการใช้แผงควบคุม Beds24 เพื่อกำหนดราคาเฉพาะสำหรับช่องทางเฉพาะ คุณควรปล่อยให้ชุดนี้เป็น เลขที่.");
jr_define('_BEDS24_CONTROL_PANEL_DIRECT', "ลิงก์โดยตรง");
jr_define('BEDS24_IMPORT_NOTIFICATION_URLS', "หากคุณนำเข้าพร็อพเพอร์ตี้นี้ไปยัง Jomres คุณจะต้องเปลี่ยน URL แจ้งเตือนใน Beds24 -> Property -> ตั้งค่าลิงก์เป็นค่าต่อไปนี้ :");
jr_define('BEDS24V2_ERROR_KEYS_SHOULD_BE_REGENERATED', "ขณะนี้คุณไม่มีพร็อพเพอร์ตี้ที่เชื่อมโยงกับพร็อพเพอร์ตี้ Beds24 คุณต้องรีเซ็ตคีย์ API ของผู้จัดการของคุณก่อนที่จะอนุญาตให้ผู้จัดการของคุณพยายามเชื่อมต่อกับ Beds24 เพื่อให้แน่ใจว่าพวกเขาทั้งหมดมีคีย์ที่ไม่ซ้ำกัน");
jr_define('BEDS24V2_ERROR_KEYS_REBUILD', "รีเซ็ตคีย์ API ผู้จัดการทันที");
jr_define('BEDS24V2_ERROR_KEYS_DISMISS', "ละเว้นคำเตือน");
jr_define('BEDS24V2_ERROR_KEYS_DONE', "รีเซ็ตคีย์ API ผู้จัดการแล้ว");

jr_define( 'BEDS24V2_ADMINISTRATOR_LINKS_TITLE', "ลิงก์คุณสมบัติ Beds24" );
jr_define('BEDS24_ASSIGN_MANAGER', "ตัวจัดการการเปลี่ยนแปลง Beds24");
jr_define('BEDS24_ASSIGN_MANAGER_DESC', "เมื่อผู้จัดการดูหน้า Channel Management (Bed24) ในส่วนหน้า คุณสมบัติใดๆ ที่ใช้คีย์ API ร่วมกันทั้งใน Jomres และ Beds24 จะเชื่อมโยงโดยอัตโนมัติภายใน Jomres ในทำนองเดียวกัน คุณสมบัติใดๆ ที่นำเข้าหรือส่งออกโดยผู้จัดการ เชื่อมโยงแล้ว คุณสามารถเปลี่ยนผู้จัดการที่เชื่อมโยงกับคุณสมบัติโดยเปลี่ยนรายการแบบเลื่อนลงของผู้จัดการในหน้านี้แล้วคลิกบันทึก");
jr_define( 'BEDS24V2_TARIFFS_TITLE', "การส่งออกภาษี" );
jr_define( 'BEDS24V2_TARIFF_EXPORT_DESC', "คุณสามารถส่งออกภาษีที่คุณสร้างไปยัง Beds24 ไปยังอัตรารายวันที่เฉพาะเจาะจงได้ หากคุณกำลังจะใช้คุณสมบัตินี้ คุณควรตั้งค่าตัวเลือก 'อัปเดตราคาเป็น Beds24?' ในการกำหนดค่าคุณสมบัติเป็นไม่ อาจต้องกำหนดค่าคุณสมบัติของคุณในแผงควบคุมของ Beds24 เพื่อให้คุณสามารถมีอัตรารายวันได้หลายแบบ โดยไปที่ การตั้งค่า > คุณสมบัติ > ห้อง > ราคารายวัน และกำหนดค่า 'จำนวนราคารายวัน' เป็นจำนวนราคาที่คุณต้องการ คุณจะสามารถคลิกปุ่ม P เพื่อกำหนดอัตรารายวันได้" );
jr_define( 'BEDS24V2_TARIFF_EXPORT_TARIFFNAME', "ชื่อภาษี" );
jr_define( 'BEDS24V2_TARIFF_EXPORT_TARIFF_ROOM_TYPE', "ประเภทห้อง" );
jr_define( 'BEDS24V2_BOOKING_RESEND', "ส่งการแจ้งเตือนอีกครั้ง" );
jr_define( 'BEDS24V2_BOOKING_DATA_AT_B24', "นี่คือข้อมูลการจองที่จัดเก็บไว้ใน Beds24 เว้นแต่คุณจะแน่ใจว่าข้อมูลไม่ถูกต้อง คุณไม่จำเป็นต้องส่งการจองไปที่ Beds24 อีกครั้ง " );
jr_define( 'BEDS24V2_BOOKING_NO_DATA_AT_B24', "การจองนี้ไม่เกี่ยวข้องกับการจองใน Beds24 คุณสามารถใช้ปุ่มส่งอีกครั้งเพื่อส่งออกการจองนี้ไปที่ beds24" );

jr_define( 'BEDS24V2_GDPR_ANONYMISE_GUESTS', "ไม่ระบุชื่อแขก?" );
jr_define( 'BEDS24V2_GDPR_ANONYMISE_GUESTS_DESC', "เมื่อการจองถูกส่งไปยัง Channel manager เราขอแนะนำให้คุณปิดบังรายละเอียดของผู้เข้าพัก หากคุณตั้งค่าตัวเลือกนี้เป็นใช่ เมื่อข้อมูลการจองถูกส่งไปยังผู้จัดการช่อง ชื่อผู้เข้าพัก ที่อยู่อีเมลจะไม่ OTA จะมีบันทึกที่ถูกต้องเกี่ยวกับความพร้อมของคุณโดยที่คุณไม่ต้องแชร์ข้อมูลมากเกินความจำเป็น ซึ่งหมายความว่าคุณปฏิบัติตาม GDPR เพราะหากแขกควรเลือกที่จะลบรายละเอียดเกี่ยวกับระบบนี้ในภายหลัง (คุณจะไม่ได้รับแจ้งเมื่อถึงเวลานี้ เกิดขึ้น) รายละเอียดของพวกเขาจะไม่ถูกทิ้งไว้กับผู้ควบคุมข้อมูลอื่น ๆ ที่คุณไม่สามารถควบคุมได้ หากจำเป็น คุณยังสามารถอ้างอิงการจองในระบบนี้กับผู้ที่อยู่ใน Channel manager หน้ารายละเอียดการจองจะแสดงหมายเลขการจองสำหรับ การจองนี้จะถูกเก็บไว้ใน Channel manager" );
jr_define ( 'BEDS24V2_MASTER_APIKEY', "คุณลักษณะทดลอง - คีย์ API ของ Master Beds24" );
jr_define( 'BEDS24V2_MASTER_APIKEY_DESC', "หากคุณมีการติดตั้ง JOMRES ด้วยคุณสมบัติที่ลิงก์กับ BEDS24 โปรดอ่านคำอธิบายทั้งหมดที่นี่ โดยค่าเริ่มต้น Jomres ได้รับการออกแบบให้เป็นแพลตฟอร์มการจองหลายผู้ขาย ผู้จัดการที่มีบัญชีของตัวเองได้24บัญชีนำเข้า คุณสมบัติไปและกลับจาก beds24 อย่างปลอดภัย การตั้งค่านี้ช่วยให้คุณสามารถแทนที่ฟังก์ชันการทำงานนั้นได้โดยมีคีย์ API เดียวสำหรับคุณสมบัติทั้งหมด ซึ่งหมายความว่าคุณต้องการเพียงบัญชีเดียวกับ Beds24 แต่ก็หมายความว่าค่าใช้จ่ายทั้งหมดจะเกิดขึ้นจากบัญชีเดียว ผู้จัดการที่มีสิทธิ์เข้าถึงที่พักจะสามารถส่งการอัปเดตไปยังที่พักบนเซิร์ฟเวอร์ beds24 เว้นว่างไว้เพื่อเพิกเฉยการตั้งค่านี้และบังคับให้ผู้จัดการทรัพย์สินใช้บัญชี Beds24 ของตนเอง คีย์ API สามารถใช้รูปแบบใดก็ได้ที่คุณต้องการ เนื่องจากคีย์ที่นี่ตรงกับคีย์ใน <a href='https://www.beds24.com/control2.php?pagetype=accountpassword' target='_blank'><em>คีย์ API 1</em> </ a> ฟิลด์ หากคุณมีการติดตั้งอยู่แล้ว ON OF JOMRES พร้อมคุณสมบัติที่เชื่อมโยงกับ BEDS24 : คุณสามารถสลับไปใช้คุณสมบัตินี้ได้ อย่างไรก็ตาม คุณจะต้องตัด (ว่าง) ตารางเหล่านี้ก่อน ลบคุณสมบัติที่มีอยู่แล้วใน Jomres และคุณนำเข้าคุณสมบัติอีกครั้ง จาก Beds24 สู่ Jomres XXXXX_jomres_beds24_contract_booking_number_xref , XXXXX_jomres_beds24_property_uid_xref , XXXXX_jomres_beds24_rest_api_key_xref , XXXXX_jomres_beds24_room_type_xref <br/> <br/> เมื่อตั้งค่าคีย์ API ของคุณในส่วน <em>คีย์ API N</em> ของหน้าการเข้าถึงบัญชีของ Beds24 จำเป็นต้องตั้งค่าฟิลด์ <em>API Key Access</em> เป็น ' อนุญาต IP ที่อนุญาตเท่านั้น' และคุณตั้งค่าหมายเลข IP เป็น <strong>".$this_servers_ip_number ."</strong> สิ่งนี้ใช้ได้กับการกำหนดค่าคีย์ API หลักที่นี่ และในส่วนหน้าหากตัวจัดการคุณสมบัติกำหนดค่า API ของตนเอง กุญแจ" );
jr_define( 'BEDS24V2_WHITELIST_WARNING', "หากที่พักของคุณเชื่อมต่อกับ Beds24 แล้ว โปรดทราบว่า Beds24 เพิ่งเปิดตัวนโยบายที่เซิร์ฟเวอร์ทั้งหมดที่เชื่อมต่อกับบัญชีของคุณต้องได้รับการอนุญาตพิเศษ คุณสามารถทำได้ในหน้าการเข้าถึงบัญชี โดยที่ ป้อนรหัสการเข้าถึงของคุณแล้ว เลือกรายการแบบเลื่อนลง Whitelist IP และตั้งค่าหมายเลข IP เป็น " );