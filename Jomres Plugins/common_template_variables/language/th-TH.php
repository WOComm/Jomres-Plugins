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

jr_define('_COMMON_STRINGS_TITLE',"ตัวแปรเทมเพลตทั่วไป");

jr_define('_COMMON_STRINGS_INFO',"เครื่องมือสำหรับนักพัฒนา ออกแบบมาเพื่อแสดงสตริงทั่วไปของนักพัฒนาซอฟต์แวร์ที่ใช้ได้กับเทมเพลตทั้งหมดโดยไม่ต้องเพิ่มลงในสคริปต์การเรียกของเทมเพลต<br/> ตัวอย่างเช่น ในรายการนี้มีคำจำกัดความ COMMON_NEXT นักพัฒนาซอฟต์แวร์ สามารถเพิ่มลงในเทมเพลต Jomres ได้โดยไม่ต้องกำหนดในสคริปต์การโทร คุณจะเพิ่มสตริงทั่วไปลงในเทมเพลตเหมือนกับสตริงอื่นๆ โดยใส่ &#123;COMMON_NEXT&#125; ลงในเทมเพลต<br/> ในรายการด้านล่าง คุณจะเห็นค่าคงที่ตามที่กำหนดไว้ในไฟล์ภาษา และถัดจากนั้น ผลลัพธ์ที่จะแสดง (ขึ้นอยู่กับว่ามีการปรับแต่งภาษาเฉพาะของคุณสมบัติ) หมายเหตุ ในกรณีของค่าคงที่ 'COMMON_LAST_VIEWED_PROPERTY_UID' uid คุณสมบัติแตกต่างกันไปและไม่แสดงในรายการนี้");
jr_define('_COMMON_STRINGS_CONSTANT',"ค่าคงที่");
jr_define('_COMMON_STRINGS_VALUE',"เอาต์พุต");