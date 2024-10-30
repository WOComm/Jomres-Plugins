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

jr_define('JOMRES_COUPONS_SCAN',"สแกนรหัสนี้ลงในโทรศัพท์ของคุณแล้วจองเลย!");
jr_define('JOMRES_COUPONS_GETADISCOUNT',"รับส่วนลด");
jr_define('JOMRES_COUPONS_PERCENT',"%");
jr_define('JOMRES_COUPONS_OFFACCOMMODATION'," จากค่าที่พักของคุณ");
jr_define('JOMRES_COUPONS_IFYOUBOOKBETWEEN',"หากคุณจองระหว่าง");
jr_define('JOMRES_COUPONS_AND'," และ ");
jr_define('JOMRES_COUPONS_FORDATESBETWEEN'," สำหรับวันที่ระหว่าง ");
jr_define('JOMRES_COUPONS_ALTERNATIVELY',"หรือป้อนรหัสส่วนลดนี้เมื่อทำการจอง : ");
jr_define('JOMRES_COUPONS_PRINT_COUPONS',"พิมพ์คูปอง");

jr_define('_JRPORTAL_COUPONS_BOOKING_VALIDFROM', 'การจองใช้ได้ตั้งแต่');
jr_define('_JRPORTAL_COUPONS_BOOKING_VALIDTO', 'การจองมีผลกับ');
jr_define('_JRPORTAL_COUPONS_GUESTNAME', 'ชื่อแขก');
jr_define('_JRPORTAL_COUPONS_DESC_478', "คุณสามารถสร้างรหัสส่วนลดและส่งต่อให้แขกเพื่อเป็นแรงจูงใจในการจองได้<br/>
วันที่ที่ถูกต้องจากและถึงวันที่หมายถึงวันที่ที่สามารถทำการจองได้ ในขณะที่การจองที่ถูกต้องจาก/ถึงวันที่หมายถึงวันที่ที่การจองต้องครอบคลุมเพื่อให้คูปองถูกต้อง หากการจองอยู่นอกช่วงเวลานั้น อัตราปกติจะนำไปใช้กับวันที่อยู่นอกช่วงเวลานั้น<br/>
หากคุณต้องการให้การจองสำหรับแขกคนใดคนหนึ่ง ให้เลือกชื่อแขกในเมนูดรอปดาวน์เพื่อจำกัดคูปองสำหรับแขกคนนั้นเท่านั้น");
jr_define('_JRPORTAL_COUPONS_DESC_ADMIN', "รหัสส่วนลดที่สร้างขึ้นที่นี่จะใช้ได้กับคุณสมบัติทั้งหมดบนเว็บไซต์");
jr_define('_JRPORTAL_COUPONS_BOOKING_DISCOUNT_FEEDBACK', 'ด้วยคูปองของคุณ การจองนี้ได้รับส่วนลดจาก ');
jr_define('_JRPORTAL_COUPONS_BOOKING_DISCOUNT_FEEDBACK_TO', ' ถึง ');