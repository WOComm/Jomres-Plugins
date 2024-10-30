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

jr_define('_JOMRES_BOOKING_INQUIRY_HEMAIL_TITLE',"หัวเรื่องอีเมล");
jr_define('_JOMRES_BOOKING_REJECTION_HCONTENT',"ข้อความอีเมล (คุณสามารถแก้ไขข้อความนี้เพื่อกรอกเหตุผลในการปฏิเสธการจองนี้ เสนอทางเลือกอื่น ฯลฯ)");
jr_define('_JOMRES_BOOKING_REJECTION_INSTRUCTIONS',"คำถามเกี่ยวกับการจองนี้จะถูกปฏิเสธและถูกยกเลิก อีเมลต่อไปนี้จะถูกส่งไปยังลูกค้า");
jr_define('_JOMRES_BOOKING_REJECTION_IMPOSSIBLE',"การสอบถามข้อมูลการจองนี้ไม่สามารถปฏิเสธได้ เนื่องจากถูกปฏิเสธหรืออนุมัติแล้ว");
jr_define('_JOMRES_BOOKING_APPROVAL_HCONTENT',"ข้อความอีเมล (คุณสามารถแก้ไขข้อความนี้เพื่อกรอกคำแนะนำการชำระเงินสำหรับการจองนี้ ฯลฯ)");
jr_define('_JOMRES_BOOKING_APPROVAL_INSTRUCTIONS',"คำถามเกี่ยวกับการจองนี้จะได้รับการยอมรับและห้องว่างจะได้รับการอัปเดตในปฏิทิน อีเมลต่อไปนี้จะถูกส่งไปยังลูกค้า");
jr_define('_JOMRES_BOOKING_APPROVAL_IMPOSSIBLE',"การสอบถามการจองนี้ไม่ได้รับการอนุมัติเนื่องจากถูกปฏิเสธหรืออนุมัติแล้ว");
jr_define('_JOMRES_ADMIN_NEWENQUIRY_EMAILNAME',"ผู้ดูแลไซต์อีเมลสอบถามใหม่");
jr_define('_JOMRES_ADMIN_NEWENQUIRY_EMAILDESC',"อีเมลที่ส่งไปยังผู้ดูแลเว็บไซต์ ณ เวลาที่ทำการจอง หากต้องได้รับการอนุมัติก่อน และเปิดใช้งานเกตเวย์ paypal ทั่วโลก");
jr_define('_JOMRES_HOTEL_NEWENQUIRY_EMAILNAME',"อีเมลสอบถามข้อมูลโรงแรมใหม่");
jr_define('_JOMRES_HOTEL_NEWENQUIRY_EMAILDESC',"อีเมลถูกส่งไปยังโรงแรม ณ เวลาที่ทำการจอง หากการจองต้องได้รับการอนุมัติก่อน");
jr_define('_JOMRES_GUEST_NEWENQUIRY_EMAILNAME',"Guest New Inquiry Email");
jr_define('_JOMRES_GUEST_NEWENQUIRY_EMAILDESC',"อีเมลส่งถึงแขก ณ เวลาที่ทำการจอง หากต้องได้รับการอนุมัติก่อน");
jr_define('_JOMRES_GUEST_APPROVEENQUIRY_EMAILNAME',"อีเมลขออนุมัติคำถามจากแขก");
jr_define('_JOMRES_GUEST_APPROVEENQUIRY_EMAILDESC',"ผู้จัดการที่พักส่งอีเมลให้แขกด้วยตนเองเพื่อยืนยันห้องว่างเพื่อสอบถาม");
jr_define('_JOMRES_GUEST_REJECTENQUIRY_EMAILNAME',"อีเมลปฏิเสธคำถามสำหรับแขก");
jr_define('_JOMRES_GUEST_REJECTENQUIRY_EMAILDESC',"ผู้จัดการที่พักส่งอีเมลให้แขกด้วยตนเองหากที่พักไม่มีรายละเอียดการสอบถาม");