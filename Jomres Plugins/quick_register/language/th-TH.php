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

jr_define('QUICK_REGISTER_TITLE',"ลงทะเบียนด่วน");
jr_define('QUICK_REGISTER',"เข้าร่วม");
jr_define('QUICK_REGISTER_BLURB',"คุณมีคุณสมบัติที่คุณต้องการลงรายการหรือไม่ คลิกที่นี่เพื่อเข้าร่วมปาร์ตี้!");
jr_define('QUICK_REGISTER_EMAIL_ADD',"ป้อนที่อยู่อีเมลของคุณ แล้วเราจะเริ่มต้นให้คุณเอง");
jr_define('QUICK_REGISTER_EMAIL',"ที่อยู่อีเมล");
jr_define('QUICK_REGISTER_EMAIL_SAVE',"ลงมือทำ!");
jr_define('QUICK_REGISTER_EMAIL_CLICKLINK',"เมื่อคุณได้รับอีเมลลงทะเบียนแล้ว คุณจะสามารถเข้าสู่ระบบและเพิ่มทรัพย์สินของคุณในไซต์ของเราได้");
jr_define('QUICK_REGISTER_EMAIL_THANKS',"ขอบคุณสำหรับการลงทะเบียน!");
jr_define('QUICK_REGISTER_EMAIL_THANKS_BLURB',"คุณควรได้รับอีเมลในเร็วๆ นี้ โปรดคลิกลิงก์ที่นั่น แล้วเราจะแนะนำคุณตลอดขั้นตอนการเพิ่มพร็อพเพอร์ตี้ของคุณในเว็บไซต์");
jr_define('QUICK_LOGIN',"เข้าสู่ระบบ");
jr_define('QUICK_REGISTER_PASSWORD',"รหัสผ่าน");
jr_define('QUICK_REGISTER_WELCOME_EMAIL_TITLE',"ยินดีต้อนรับสู่ ");
jr_define('QUICK_REGISTER_WELCOME_EMAIL_LOGIN',"มาเริ่มสร้างพร็อพเพอร์ตี้แรกของคุณกัน ขั้นแรกให้เข้าสู่ระบบไซต์โดยใช้ลิงก์นี้: ");
jr_define('QUICK_REGISTER_WELCOME_EMAIL_CREATE',"เมื่อคุณเข้าสู่ระบบแล้ว ให้เข้าสู่หน้านี้เพื่อสร้างพร็อพเพอร์ตี้แรกของคุณ : ");
jr_define('QUICK_REGISTER_WELCOME_EMAIL_DONE',"ตอนนี้ให้ทำตามคำแนะนำบนหน้าจอ และหากคุณมีคำถามใดๆ โปรดติดต่อเราที่นี่ ");
jr_define('QUICK_REGISTER_CONFIG_TITLE',"แสดงใต้แถบเครื่องมือ?");
jr_define('QUICK_REGISTER_CONFIG_DESC',"หากคุณตั้งค่านี้เป็นใช่ ปุ่มลงทะเบียนด่วนจะแสดงใต้แถบเครื่องมือสำหรับผู้ใช้ที่ไม่ได้ลงทะเบียนและไม่ได้เข้าสู่ระบบ หากคุณตั้งค่าเป็นไม่ คุณจะต้องใช้ ASAModule เพื่อวาง ปุ่มต่างๆ โดยการสร้างโมดูล ASAModule ใหม่และตั้งค่างานเป็น quick_register จากนั้นคุณสามารถวางโมดูลนั้นไว้ที่ใดก็ได้ที่คุณต้องการ");