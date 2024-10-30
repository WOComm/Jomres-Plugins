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

jr_define('_JINTOUR_TITLE',"การจัดการทัวร์/กิจกรรม");

jr_define('_JINTOUR_PROFILES_TITLE',"โปรไฟล์ทัวร์/กิจกรรม");
jr_define('_JINTOUR_PROFILES_NEW',"โปรไฟล์ทัวร์/กิจกรรมใหม่");
jr_define('_JINTOUR_PROFILES_DELETE',"ลบโปรไฟล์ทัวร์/กิจกรรม");

jr_define('_JINTOUR_PROFILE_TITLE',"ชื่อโปรไฟล์");
jr_define('_JINTOUR_PROFILE_DESCRIPTION',"คำอธิบาย");
jr_define('_JINTOUR_PROFILE_DESCRIPTION_INFO',"ป้อนคำอธิบายของทัวร์/กิจกรรมของคุณ รวมทั้งกำหนดการเดินทางด้วย");
jr_define('_JINTOUR_PROFILE_DAYS_OF_WEEK',"วันในสัปดาห์");
jr_define('_JINTOUR_PROFILE_DAYS_OF_WEEK_INFO',"");
jr_define('_JINTOUR_PROFILE_PRICE_ADULTS',"ราคาสำหรับผู้ใหญ่");
jr_define('_JINTOUR_PROFILE_PRICE_KIDS',"ราคาเด็ก");
jr_define('_JINTOUR_PROFILE_PRICE_KIDS_INFO',"หากต้องการแยกตัวเลือกไม่ให้ปรากฏในแบบฟอร์มการจอง ปล่อยให้ราคาเป็น 0 (ศูนย์)");
jr_define('_JINTOUR_PROFILE_SPACES_ADULTS',"ช่องว่างสำหรับผู้ใหญ่");
jr_define('_JINTOUR_PROFILE_SPACES_KIDS',"ช่องว่างสำหรับเด็ก");
jr_define('_JINTOUR_PROFILE_SPACES_INFO',"จำนวนที่ว่างในทัวร์/กิจกรรม");
jr_define('_JINTOUR_PROFILE_START_DATE',"เริ่มฤดูกาล");
jr_define('_JINTOUR_PROFILE_END_DATE',"ซีซั่นสิ้นสุด");

jr_define('_JINTOUR_PROFILE_GENERATE_INFO',"เมื่อคุณสร้างโปรไฟล์ทัวร์/กิจกรรมแล้ว คุณจะต้องสร้างทัวร์/กิจกรรมตามการตั้งค่าของโปรไฟล์นั้น สร้างทัวร์/กิจกรรม จากนั้นคลิกไอคอนลูกศรสีเขียวถัดจากโปรไฟล์นั้นเพื่อสร้าง ทัวร์/กิจกรรมเอง เมื่อสร้างทัวร์/กิจกรรมแล้ว คุณจะสามารถลบทัวร์/กิจกรรมแต่ละรายการได้หากต้องการ");
jr_define('_JINTOUR_PROFILE_GENERATE',"สร้างทัวร์/กิจกรรม");

jr_define('_JINTOUR_TOUR_TITLE',"ชื่อกิจกรรม");
jr_define('_JINTOUR_TOUR_DATE',"วันที่");
jr_define('_JINTOUR_TOUR_ADULTS',"ผู้ใหญ่");
jr_define('_JINTOUR_TOUR_KIDS',"เด็ก");
jr_define('_JINTOUR_TOUR_ITINERY',"กำหนดการเดินทาง");

jr_define('_JINTOUR_TOUR_SAVE_AUDIT',"สร้างทัวร์ชมใหม่");
jr_define('_JINTOUR_TOUR_CANCEL_AUDIT',"ยกเลิกการจองทัวร์");
jr_define('_JINTOUR_TOUR_SAVE_MESSAGE',"สร้างทัวร์ชมใหม่แล้ว");
jr_define('_JINTOUR_TOUR_SPACES_CURRENTLY_AVAILABLE',"พื้นที่ว่างในขณะนี้");

jr_define('_JINTOUR_TOUR_EMAIL_ADMIN_SUBJECT',"รหัสการจองทัวร์/ทรัพยากรใหม่ ");
jr_define('_JINTOUR_TOUR_EMAIL_ADMIN_MESSAGE',"มีการจองทัวร์/ทรัพยากรใหม่สำหรับผู้ดูแลระบบแล้ว โปรดดูลิงก์ต่อไปนี้เพื่อดูหน้าพื้นที่ผู้ดูแลระบบของทัวร์ชม ");

jr_define('_JINTOUR_TITLE_CONFIG',"Jomres Integrated Tours Configuration");
jr_define('_JINTOUR_TITLE_WHOLESITE',"การติดตั้งทั้งหมดเป็นการติดตั้ง Jintour หรือไม่");
jr_define('_JINTOUR_TITLE_WHOLESITE_DESC',"หากคุณตั้งค่านี้เป็นใช่ คุณสมบัติทั้งหมดจะเป็นคุณสมบัติทัวร์ หากคุณตั้งค่าเป็นไม่ เมื่อสร้างคุณสมบัติใหม่ คุณจะสามารถมีทั้งคุณสมบัติประเภททัวร์และโรงแรม/อพาร์ทเมนท์ ");

jr_define('_JINTOUR_REGPROP_MANAGEMENTPROCESS_TOURS',"ทัวร์");
jr_define('_JINTOUR_REGPROP_MANAGEMENTPROCESS_TOURS_DESC',"เลือกตัวเลือกทัวร์หากคุณเสนอการจองรายการที่พร้อมให้บริการในบางวัน (เช่น ทัวร์ ตั๋วคอนเสิร์ต)");
jr_define('_JINTOUR_SHOWDEPARTURE',"แสดงช่องป้อนข้อมูลขาออกหรือไม่");
jr_define('_JINTOUR_SHOWDEPARTURE_DESC',"ตั้งค่านี้เป็น ใช่ ถ้าคุณต้องการแสดงทั้งวันที่มาถึงและวันที่ออกเดินทาง ซึ่งจะเป็นประโยชน์หากคุณเสนอบริการรถโดยสาร ตั๋วเครื่องบิน ฯลฯ ซึ่งคุณจำเป็นต้องทราบทั้งวันที่เข้าและออก การแสดงวันที่ออกเดินทางทำให้คุณสามารถเสนอทรัพยากรในหลายๆ วัน ในขณะที่การตั้งค่าเป็น ไม่ สามารถยอมรับการจองได้เพียงวันเดียวเท่านั้น");

jr_define('_JINTOUR_PROFILES_TITLE_LIST',"รายการทัวร์");