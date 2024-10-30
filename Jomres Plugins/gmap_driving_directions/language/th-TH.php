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

jr_define('_JRPORTAL_GMAPS_DD_YES',"ใช่");
jr_define('_JRPORTAL_GMAPS_DD_NO',"ไม่");
jr_define('_GOOGLE_ADDRESS',"ที่อยู่");
jr_define('_GOOGLE_INPUT_FIELDSET_POSTALCODE',"รหัสไปรษณีย์");
jr_define('_GOOGLE_INPUT_FIELDSET_TOWN',"เมือง");
jr_define('_GOOGLE_INITIALIZE_ERROR1',"ถึงจำนวนจุดอ้างอิงสูงสุด 9 จุด");
jr_define('_GOOGLE_INITIALIZE_ERROR2',"Google ไม่สามารถคำนวณเส้นทางสำหรับเส้นทางนี้และตัวเลือกที่เลือก");
jr_define('_GOOGLE_DIRECTION_PRINT',"พิมพ์เส้นทาง");
jr_define('_GOOGLE_ROUTEPLANNING',"วางแผนเส้นทางของคุณไปที่ ");
jr_define('_GOOGLE_ROUTEPLANNING_HYOURLOCATION',"ตำแหน่งของคุณ (จุดเริ่มต้นเส้นทาง)");
jr_define('_GOOGLE_ROUTEPLANNING_HROUTEOPTIONS',"ตัวเลือกเส้นทาง");
jr_define('_GOOGLE_ROUTEPLANNING_HOPTIMIZEFOR',"เพิ่มประสิทธิภาพสำหรับ");
jr_define('_GOOGLE_ROUTEPLANNING_HDRIVING',"การขับรถ");
jr_define('_GOOGLE_ROUTEPLANNING_HWALKING',"เดิน");
jr_define('_GOOGLE_ROUTEPLANNING_HCYCLING',"การปั่นจักรยาน");
jr_define('_GOOGLE_ROUTEPLANNING_HHIGHWAYS',"หลีกเลี่ยงทางหลวง");
jr_define('_GOOGLE_ROUTEPLANNING_HTOLLS',"หลีกเลี่ยงค่าผ่านทาง");
jr_define('_GOOGLE_SELECT_BUTTON',"ขอเส้นทาง");
jr_define('_GOOGLE_SELECT_RESETMAP',"รีเซ็ตแผนที่");
jr_define('_GOOGLE_ROUTEPLANNING_INSTRUCTIONS',"จุดหมายของคุณ (จุดสิ้นสุดเส้นทาง) ถูกทำเครื่องหมายบนแผนที่แล้ว โปรดป้อนตำแหน่งของคุณและเลือกตัวเลือกเส้นทางของคุณเพื่อขอเส้นทางไปยังจุดปลายทาง คุณยังสามารถคลิกบนแผนที่เพื่อเลือกได้ถึง 9 จุดอ้างอิงจากจุดเริ่มต้นของคุณไปยังจุดปลายทาง");