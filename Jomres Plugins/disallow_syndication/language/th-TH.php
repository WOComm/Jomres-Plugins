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

jr_define('DISALLOW_SYNDICATION_TITLE',"ไม่อนุญาตการเผยแพร่");
jr_define('DISALLOW_SYNDICATION_DESCRIPTION','คุณลักษณะการรวม Jomres.net เป็นฟังก์ชันใหม่ที่ออกแบบมาเพื่อแบ่งปันคุณสมบัติระหว่างไซต์ แม้ว่าการจองสามารถทำได้บนโฮมเซิร์ฟเวอร์เท่านั้น ');

jr_define('DISALLOW_SYNDICATION_DESCRIPTION_MORE',"จุดประสงค์ของสิ่งนี้คือเพื่อให้ไซต์สร้างความไว้วางใจด้วยเครื่องมือค้นหา เป็นคุณลักษณะฟรีสำหรับผู้ใช้ Jomres ทุกคน ผู้ถือใบอนุญาต Active Jomres สามารถทำได้ หากพวกเขาต้องการเลือกที่จะลบ ไซต์จากเครือข่ายการเผยแพร่ผ่านหน้านี้ ไม่สามารถเพิ่ม Localhost ลงในเครือข่ายได้ และหากมีปัญหากับการเชื่อมต่อด้วยเหตุผลใดก็ตาม คุณจะไม่สามารถเพิ่มไซต์ของคุณลงในเครือข่ายได้ ตรวจสอบหน้าทดสอบการเชื่อมต่อ REST API หากคุณ มีข้อสงสัย");

jr_define('DISALLOW_SYNDICATION_INSTRUCTIONS_DISALLOW',"คลิกลิงก์นี้เพื่อลบไซต์ของคุณออกจากเครือข่าย");
jr_define('DISALLOW_SYNDICATION_INSTRUCTIONS_ALLOW',"คลิกลิงก์นี้เพื่อเพิ่มไซต์ของคุณลงในเครือข่าย");

jr_define('DISALLOW_SYNDICATION_DISALLOW',"ลบไซต์นี้ออกจากเครือข่าย");
jr_define('DISALLOW_SYNDICATION_ALLOW',"เพิ่มไซต์นี้ในเครือข่าย");

jr_define('DISALLOW_SYNDICATION_INVALID_KEY',"ขออภัย รหัสสนับสนุนของคุณไม่ถูกต้องหรือใช้งานไม่ได้ คุณไม่สามารถเปลี่ยนสถานะการเผยแพร่ของการติดตั้งนี้ได้");