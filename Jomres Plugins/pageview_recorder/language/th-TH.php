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

jr_define('_PAGEVIEW_RECORDER_ENABLED',"บันทึกการดูหน้าเว็บทั้งหมดไปยัง db");
jr_define('_PAGEVIEW_RECORDER_DESC',"หากเปิดใช้งาน การดูหน้าเว็บทั้งหมดจะถูกบันทึกลงในฐานข้อมูล คำเตือน! ตารางการดูหน้าฐานข้อมูลอาจมีขนาดใหญ่มากในระยะเวลาอันสั้น! โปรดใช้ด้วยความระมัดระวัง");