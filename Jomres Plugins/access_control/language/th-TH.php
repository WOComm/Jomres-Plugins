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
jr_define( '_JOMRES_ACCESS_CONTROL', 'การควบคุมการเข้าถึง' );
jr_define( '_JOMRES_ACCESS_CONTROL_DESC', 'คุณลักษณะนี้ช่วยให้คุณสามารถกำหนดระดับการเข้าถึงขั้นต่ำที่ผู้ใช้ต้องการเพื่อเข้าถึงงานเฉพาะ' );
jr_define('_JOMRES_ACCESS_CONTROL_LEVELS_DEFAULT', 'ค่าเริ่มต้น');
jr_define('_JOMRES_ACCESS_CONTROL_LEVELS_ANYBODY', 'ใครก็ได้');
jr_define('_JOMRES_ACCESS_CONTROL_LEVELS_REGISTERED', 'ลงทะเบียนแล้ว');
jr_define('_JOMRES_ACCESS_CONTROL_LEVELS_MANAGER', 'ผู้จัดการ');
jr_define('_JOMRES_ACCESS_CONTROL_LEVELS_SUPERMANAGER', 'ผู้จัดการระดับสูง');
jr_define('_JOMRES_ACCESS_CONTROL_LEVELS_NOBODY', 'ไม่มีใคร');
jr_define('_JOMRES_ACCESS_CONTROL_LEVELS_RECEPTIONIST', 'พนักงานต้อนรับ');