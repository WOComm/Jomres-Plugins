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

jr_define('_OCCUPANCIES_TITLE',"จำนวนผู้เข้าพักขั้นต่ำ");

jr_define('_OCCUPANCIES_DESCRIPTION',"คุณสามารถกำหนดระดับการเข้าพักขั้นต่ำสำหรับห้องพักบางประเภทได้ หากคุณต้องการให้แน่ใจว่าแขกได้เลือกประเภทแขกจำนวนหนึ่งในแบบฟอร์มการจองก่อนที่จะแสดงห้องและอัตราภาษีที่เหมาะสม" );
jr_define('_OCCUPANCIES_DESCRIPTION_INFO',"คุณสามารถสร้างระดับการเข้าพักขั้นต่ำสำหรับห้องพักแต่ละประเภทได้ที่นี่ จะไม่มีการรวมค่าห้องพัก/อัตราค่าบริการ หากผู้เข้าพักไม่ได้เลือกจำนวนผู้เข้าพักที่เหมาะสม สำหรับห้องพักแต่ละประเภท โปรดเลือก จำนวนผู้เข้าพักในประเภทที่กำหนดซึ่งควรมีขั้นต่ำในแบบฟอร์มการจองก่อนที่จะเสนอประเภทห้อง หากท่านไม่สนว่าห้องพักประเภทใดควรเป็นระดับใด ให้ปล่อยหมายเลขผู้เข้าพักของประเภทห้องนั้นเป็น 0 (ศูนย์). ");
jr_define('_OCCUPANCIES_NUMBER_OF_GUESTTYPE',"หมายเลขประเภทผู้เข้าพัก");
jr_define('_OCCUPANCIES_NO_GUESTTYPES',"คุณยังไม่ได้สร้างประเภทผู้เยี่ยมชม โปรดสร้างประเภทผู้เยี่ยมชมก่อนที่คุณจะใช้คุณลักษณะนี้");

jr_define('_OCCUPANCIES_EDIT',"แก้ไขจำนวนผู้เข้าพักขั้นต่ำสำหรับ ");