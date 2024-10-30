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

jr_define('_JOMRES_BLACKBOOKINGS_IMPROVED_TITLE',"การจองอย่างง่าย");
jr_define('_JOMRES_BLACKBOOKINGS_IMPROVED_DESC',"Black bookings คือการจองที่ใช้ห้อง ห้อง หรือทรัพย์สิน แต่ไม่มีข้อมูลการเรียกเก็บเงินหรือใบแจ้งหนี้ โดยทั่วไปจะใช้เพื่อระบุการจองที่ทำผ่านสื่ออื่น (เช่น โทรศัพท์) คุณจะต้องสร้างการจองสีดำเพื่อให้แน่ใจว่าทรัพยากรเหล่านั้นไม่สามารถจองทางออนไลน์ได้ ไม่ว่าจะโดยผู้จัดการที่พักหรือแขก");
jr_define('_JOMRES_BLACKBOOKINGS_IMPROVED_SELECTAROOM',"คุณต้องเลือกอย่างน้อยหนึ่งห้อง");
jr_define('_JOMRES_BLACKBOOKINGS_IMPROVED_ROOM_BOOKED'," จองสำเร็จแล้ว");
jr_define('_JOMRES_BLACKBOOKINGS_IMPROVED_ROOM_NOT_BOOKED'," ไม่สามารถจองได้เนื่องจากมีการจองในช่วงเวลาดังกล่าวแล้ว");
jr_define('_JOMRES_BLACKBOOKINGS_IMPROVED_ROOM_BOOKED_BY',"ห้องถูกบล็อกโดย ");
jr_define('_JOMRES_BLACKBOOKINGS_IMPROVED_INSTRUCTIONS_MRP',"ใช้ปฏิทินนี้เพื่อ black book ทรัพยากรอย่างง่ายดาย เลือกห้องหรือห้อง จากนั้นคลิกที่วันแรกและวันสุดท้ายของการจองสีดำ และทรัพยากรจะถูกจองเป็นสีดำ ถ้าการจองสีดำมีไว้สำหรับคนเดียว วันที่ จากนั้นคลิกวันที่นั้นสองครั้ง");
jr_define('_JOMRES_BLACKBOOKINGS_IMPROVED_INSTRUCTIONS_SRP',"ใช้ปฏิทินนี้เพื่อ black book ทรัพยากรอย่างง่ายดาย คลิกที่วันแรกและวันสุดท้ายของการจองสีดำ และทรัพยากรจะถูกจองเป็นสีดำ หากการจองสีดำมีเพียงหนึ่งวัน ให้คลิกวันที่นั้นสองครั้ง .");

jr_define('_JOMRES_BLACKBOOKINGS_IMPROVED_ADDALL',"เพิ่มทั้งหมด");
jr_define('_JOMRES_BLACKBOOKINGS_IMPROVED_REMOVEALL',"ลบทั้งหมด");
jr_define('_JOMRES_BLACKBOOKINGS_IMPROVED_ITEMSSELCTED', "รายการที่เลือก");
