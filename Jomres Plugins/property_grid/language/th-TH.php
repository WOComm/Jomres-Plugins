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
	jr_define( '_JOMRES_SHORTCODES_06000PROPERTY_GRID', "ตารางคุณสมบัติ แสดงแถวของคุณสมบัติ เหมาะสำหรับหน้า Landing Page" );

	jr_define( '_JOMRES_SHORTCODES_06000PROPERTY_GRID_PROPERTY_UIDS', "ใช้ property_uids หรือ property_cols. property_uids ที่คั่นด้วยเครื่องหมายจุลภาคของ uids คุณสมบัติที่คุณต้องการแสดง โดยสามารถแสดงคุณสมบัติได้สูงสุด 6 รายการ" );
	jr_define( '_JOMRES_SHORTCODES_06000PROPERTY_GRID_PROPERTY_COLS', "หรือ เลือกจำนวนคอลัมน์ที่จะแสดงระหว่าง 1 ถึง 6 คุณสมบัติสุ่มจะถูกเลือกจากฐานข้อมูลที่จะแสดง" );