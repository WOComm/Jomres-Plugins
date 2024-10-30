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

jr_define('USEFUL_LINKS_MODULE_TITLE',"ลิงก์ที่เป็นประโยชน์สำหรับ ");
jr_define('USEFUL_LINKS_FORSALE',"ทรัพย์สินสำหรับขายใน ");
jr_define('USEFUL_LINKS_HOTELS',"โรงแรม/ที่พักและอาหารเช้าใน ");
jr_define('USEFUL_LINKS_VILLAS',"บ้านพักให้เช่าใน ");
jr_define('USEFUL_LINKS_WIKIPEDIA',"ข้อมูลเกี่ยวกับ ");

jr_define('USEFUL_LINKS_ADMIN',"ลิงค์ที่มีประโยชน์");
jr_define('USEFUL_LINKS_ADMIN_PROPERTIESFORSALE',"รหัสประเภทอสังหาริมทรัพย์");
jr_define('USEFUL_LINKS_ADMIN_HOTELS',"รหัสประเภทที่พัก/B&B");
jr_define('USEFUL_LINKS_ADMIN_VILLAS',"id ประเภททรัพย์สินในวันหยุด");

jr_define( '_JOMRES_SHORTCODES_06000USEFULLINKS', 'ปลั๊กอินนี้ออกแบบมาเพื่อแสดงลิงก์ไปยังการค้นหาเฉพาะ หาก URL มีคำว่า "country", "region" หรือ "town" อยู่ด้วย ดังนั้นโดยทั่วไปแล้ว คุณต้องการวางไว้ในแถบด้านข้างหรือตำแหน่งโมดูล/วิดเจ็ตที่ ที่ด้านบนของหน้า คุณจะต้องกำหนดค่าปลั๊กอินในแท็บ การกำหนดค่าไซต์ > ลิงก์ที่มีประโยชน์ ก่อน เพื่อระบุรหัสประเภทที่พักสำหรับโรงแรม อสังหาริมทรัพย์ และอพาร์ตเมนต์/กระท่อม/วิลล่า ' );