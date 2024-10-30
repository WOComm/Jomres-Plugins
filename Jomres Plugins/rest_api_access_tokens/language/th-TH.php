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

	jr_define('REST_API_ACCESS_TOKENS_MENU_OPTION',"แสดงรายการโทเค็นการเข้าถึง REST API");
	jr_define('REST_API_ACCESS_TOKENS_INFO',"หน้านี้แสดงรายการไคลเอนต์ทั้งหมดและถ้ามี โทเค็นการเข้าถึงของพวกเขา (ไคลเอ็นต์อาจไม่ได้ร้องขอโทเค็นการเข้าถึง) ซึ่งมีประโยชน์หากคุณต้องการส่งคำถามผ่านไคลเอ็นต์ เช่น บุรุษไปรษณีย์ และคุณต้องการโทเค็นการเข้าถึง แม้ว่าหน้านี้จะแสดงโทเค็นการเข้าถึง SYSTEM แต่ก็ไม่แนะนำให้คุณใช้ ");