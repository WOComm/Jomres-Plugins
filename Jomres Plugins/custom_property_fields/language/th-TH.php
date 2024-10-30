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

jr_define('_JOMRES_CUSTOM_PROPERTY_FIELDS_TITLE',"ฟิลด์คุณสมบัติที่กำหนดเอง");
jr_define('_JOMRES_CUSTOM_PROPERTY_FIELDS_TITLE_EDIT',"แก้ไขฟิลด์คุณสมบัติที่กำหนดเอง");
jr_define('_JOMRES_CUSTOM_PROPERTY_FIELDS_INFO',"ใช้คุณลักษณะนี้เพื่อสร้างฟิลด์ข้อมูลที่กำหนดเองสำหรับคุณสมบัติ ข้อมูลนี้ถูกเพิ่มโดยตัวจัดการคุณสมบัติ และแสดงในแท็บใหม่ในหน้ารายละเอียดคุณสมบัติ");
jr_define('_JOMRES_CUSTOM_PROPERTY_FIELDS_MANAGER_TITLE',"ข้อมูลคุณสมบัติอื่นๆ");
jr_define('_JOMRES_CUSTOM_PROPERTY_FIELDS_INSTRUCTIONS',"ฟิลด์คุณสมบัติที่กำหนดเองเหล่านี้สามารถแสดงในรายละเอียดคุณสมบัติในแท็บแยก หรือในรายการคุณสมบัติ คุณจะต้องแก้ไข /".JOMRES_ROOT_DIRECTORY."/core-plugins/custom_property_fields/templates/tabcontent_01_custom_property_fields.html (for the property details tab) and/or /".JOMRES_ROOT_DIRECTORY."/core-plugins/custom_property_fields/templates/propertylist_custom_property_fields.html (สำหรับข้อมูลโค้ดรายการคุณสมบัติ) เพื่อให้ได้รูปแบบที่คุณต้องการ ด้วยฟิลด์ตามที่ป้อนข้างต้น เค้าโครงพื้นฐานจะมีลักษณะดังนี้ ซึ่งคุณสามารถใช้เป็นตัวอย่างซึ่งคุณสามารถสร้างเค้าโครงของคุณเองได้ ");