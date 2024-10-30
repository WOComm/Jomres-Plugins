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

jr_define('EXTERNAL_FORM',"แบบฟอร์มภายนอก");
jr_define('EXTERNAL_FORM_PLUGIN_SHORTCODE','รหัสย่อของปลั๊กอิน (เช่น "rsform")');
jr_define('EXTERNAL_FORM_PLUGIN_ARG1','อาร์กิวเมนต์ 1 (เช่น "1")');
jr_define('EXTERNAL_FORM_PLUGIN_ARG2',"อาร์กิวเมนต์ 2 (ตัวเลือก)");
jr_define('EXTERNAL_FORM_INFO',"ช่วยให้คุณสามารถรวมแบบฟอร์มจากปลั๊กอินแบบฟอร์มภายนอกลงในแท็บของรายละเอียดคุณสมบัติ ตั้งค่ารหัสย่อของปลั๊กอินเป็นบางอย่างเช่น 'rsform' และเพิ่มอาร์กิวเมนต์พิเศษตามต้องการ ไม่จำเป็นต้องเป็น แบบฟอร์ม สามารถเป็นอะไรก็ได้ที่เรียกว่าแมมบอท แต่รูปแบบจะเป็นการใช้งานทั่วไป");