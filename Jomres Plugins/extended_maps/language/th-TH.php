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

jr_define('_JRPORTAL_EXTENDED_MAPS_TITLE',"แผนที่ขยาย");
jr_define('_JRPORTAL_EXTENDED_MAPS_HWIDTH',"ความกว้างของแผนที่ (px) ");
jr_define('_JRPORTAL_EXTENDED_MAPS_HHEIGHT',"ความสูงของแผนที่ (px) ");
jr_define('_JRPORTAL_EXTENDED_MAPS_HZOOMLEVEL',"ระดับการซูมแผนที่ ");
jr_define('_JRPORTAL_EXTENDED_MAPS_HOVERRIDE_PROPERTYLIST',"แทนที่รายการคุณสมบัติ Jomres เริ่มต้นหรือไม่ ");
jr_define('_JRPORTAL_EXTENDED_MAPS_HINFOICON',"ไอคอนตัวทำเครื่องหมายกิจกรรม/สถานที่อื่นๆ ");
jr_define('_JRPORTAL_EXTENDED_MAPS_HPOPUP_WIDTH',"ความกว้างของป๊อปอัป (px) ");
jr_define('_JRPORTAL_EXTENDED_MAPS_HPROPERTY_IMGWIDTH',"ความกว้างของภาพ (px) ");
jr_define('_JRPORTAL_EXTENDED_MAPS_HPROPERTY_IMGHEIGHT',"ความสูงของรูปภาพ (px) ");
jr_define('_JRPORTAL_EXTENDED_MAPS_HSHOW_DESCRIPTION',"แสดงรายละเอียดสถานที่ให้บริการหรือไม่ (เฉพาะป๊อปอัปสำหรับการเช่า)");
jr_define('_JRPORTAL_EXTENDED_MAPS_HTRIM_DESCRIPTION',"ตัดแต่งคำอธิบายคุณสมบัติหรือไม่ (สำหรับป๊อปอัปสำหรับการเช่าเท่านั้น)");
jr_define('_JRPORTAL_EXTENDED_MAPS_HTRIM_VALUE',"ตัดรายละเอียดคุณสมบัติหลัง (ตัวอักษร) (เฉพาะป๊อปอัปสำหรับเช่า)");
jr_define('_JRPORTAL_EXTENDED_MAPS_GROUPMARKERS',"ตัวทำเครื่องหมายกลุ่ม");

jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS', "แสดงแผนที่พร้อมชุดของคุณสมบัติและเหตุการณ์/สถานที่ท่องเที่ยวในท้องถิ่น" );
jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_PTYPE_IDS', "ระบุประเภทคุณสมบัติที่คุณต้องการแสดง คั่นด้วยจุลภาค" );
jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_PROPERTIES', "แสดงคุณสมบัติหรือไม่ ตั้งเป็น 0 เพื่อป้องกันไม่ให้แสดง" );
jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_EVENTS', "แสดงกิจกรรมหรือไม่ ตั้งเป็น 0 เพื่อป้องกันไม่ให้แสดง" );
jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_ATTRACTIONS', "แสดงสถานที่ท่องเที่ยว ตั้งค่าเป็น 0 เพื่อป้องกันไม่ให้แสดง" );
jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_COUNTRY', "รหัสประเทศ ISO ใช้ตัวเลือกนี้เพื่อจำกัดแผนที่ไว้เพียงประเทศเดียว" );
jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_REGION', "ตั้งค่ารหัสภูมิภาคเพื่อจำกัดผลลัพธ์เป็นคุณสมบัติในภูมิภาคเฉพาะ" );
jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_TOWN', "ตั้งชื่อเมืองเพื่อจำกัดผลลัพธ์ไว้เฉพาะที่เมืองนั้นๆ" );

jr_define('_JRPORTAL_EXTENDED_MAPS_MAP_ID',"Map ID");
jr_define('_JRPORTAL_EXTENDED_MAPS_MAP_ID_DESC',"To use the Advanced mapping features you will need to create a map id and save it here.");
