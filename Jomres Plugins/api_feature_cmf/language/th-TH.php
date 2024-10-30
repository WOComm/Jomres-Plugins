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

jr_define('_OAUTH_SCOPE_CHANNEL_MANAGEMENT',"การจัดการช่อง");
jr_define('_OAUTH_SCOPE_CHANNEL_MANAGEMENT_DESC',"ไคลเอนต์สามารถทำกิจกรรมการจัดการช่องสัญญาณได้ โปรดทราบ สิ่งนี้จะช่วยให้ลูกค้ามีอำนาจมากในระบบในการแก้ไขบัญชีและคุณสมบัติของคุณ");

jr_define('_OAUTH_SCOPE_CHANNEL_MANAGEMENT_CLEANING_PRICE',"กำลังทำความสะอาด");

jr_define('_CMF_CANCELLED_BOOKING',"ผู้จัดการช่องยกเลิกการจอง");

jr_define('_CMF_CLEANING_STRING',"กำลังทำความสะอาด"); // อย่าเปลี่ยนแปลงสิ่งนี้หากคุณได้นำเข้าคุณสมบัติแล้ว คุณสมบัติที่มีค่าธรรมเนียมการทำความสะอาดมีชื่อนี้เพิ่มเติม
jr_define('_CMF_SECURITY_STRING',"ค่ามัดจำ"); // อย่าเปลี่ยนแปลงสิ่งนี้หากคุณได้นำเข้าคุณสมบัติแล้ว ทรัพย์สินที่มีเงินประกันมีชื่อพิเศษนี้


jr_define('_CMF_API_PRIVACY',"ความเป็นส่วนตัวของ API");
jr_define('_CMF_API_PRIVACY_ON',"เปิดความเป็นส่วนตัว");
jr_define('_CMF_API_PRIVACY_OFF',"ปิดความเป็นส่วนตัว");

jr_define('_CMF_API_PRIVACY_DESC',"ข้อมูลของพร็อพเพอร์ตี้สามารถเห็นได้โดยแชนเนลที่สร้างมันขึ้นมาเท่านั้น ตัวอย่างเช่น หากคุณให้คู่คีย์ API ที่แตกต่างกันกับทั้งแชนเนล A และแชนเนล B ข้อมูลของพร็อพเพอร์ตี้ที่สร้างโดยแชนเนล A จะไม่สามารถทำได้ ถูกมองเห็นโดยช่อง B... เว้นแต่คุณจะปิดความเป็นส่วนตัวของ API เพื่อให้ทุกช่องสัญญาณสามารถดูข้อมูลทั้งหมดของทรัพย์สินผ่าน API ได้ ตั้งค่าความเป็นส่วนตัวของ API เป็น ปิด หากคุณกำลังแบ่งปันคุณสมบัตินี้กับเว็บไซต์อื่นที่ต้องการแสดงรายการทรัพย์สิน หากคุณไม่ได้แชร์พร็อพเพอร์ตี้นี้กับไซต์อื่นใด ให้ตั้งค่าความเป็นส่วนตัวของ API เป็นเปิด");