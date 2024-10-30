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

jr_define('PAYPAL_API_KEY_TITLE',"คีย์ API ของ Paypal");
jr_define('PAYPAL_API_KEY_TITLE_DESC',"กำหนดค่ารหัสลูกค้า Paypal และข้อมูลลับสำหรับทั้งบัญชีจริงและบัญชีแซนด์บ็อกซ์ของคุณ เมื่อกำหนดค่าแล้ว คุณจะสามารถใช้การจองและชำระเงินตามใบแจ้งหนี้ผ่าน Paypal ได้");

jr_define('PAYPAL_API_CLIENTID',"รหัสลูกค้า");
jr_define('PAYPAL_API_SECRET',"ความลับ");
jr_define('PAYPAL_API_CLIENTID_SANDBOX',"ID ไคลเอ็นต์แซนด์บ็อกซ์");
jr_define('PAYPAL_API_SECRET_SANDBOX',"ความลับของแซนด์บ็อกซ์");

jr_define('PAYPAL_API_CLIENTID_FINDING',"คุณจะค้นหารหัสลูกค้าและข้อมูลลับได้อย่างไร");

jr_define('PAYPAL_API_CLIENTID_STEP1','ไปที่ https://developer.paypal.com/ และเข้าสู่ระบบ');
jr_define('PAYPAL_API_CLIENTID_STEP2',"ไปที่แอพของฉันและข้อมูลรับรองในเมนูด้านข้าง");
jr_define('PAYPAL_API_CLIENTID_STEP3',"คลิกสร้างแอปเพื่อสร้างแอปใหม่");
jr_define('PAYPAL_API_CLIENTID_STEP4',"ตั้งชื่อแอปของคุณ จากนั้นคลิกสร้างแอป");
jr_define('PAYPAL_API_CLIENTID_STEP5',"ในหน้านี้ คุณสามารถดูรหัสลูกค้าและข้อมูลลับของคุณ คัดลอกและวางคีย์เหล่านั้นลงในฟิลด์ที่เกี่ยวข้องด้านบน");