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

jr_define('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_TITLE',"การตั้งค่าคุณสมบัติเริ่มต้น");
jr_define('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_CONFIGTITLE',"ชื่อ Config ทั่วไป (หากมี บางอันอาจไม่มี)");
jr_define('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_VARIABLENAME',"ชื่อตัวแปร");
jr_define('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_CURRENTVALUE',"ค่าปัจจุบัน");
jr_define('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_WARNING',"นี่เป็นคุณลักษณะขั้นสูง หากคุณไม่มีการใช้งานเฉพาะเจาะจง จะดีกว่าที่คุณไม่ได้ใช้ปลั๊กอินนี้ช่วยให้คุณสามารถแก้ไขค่าเริ่มต้นของคุณสมบัติใหม่ได้ แน่ใจว่าคุณเข้าใจสิ่งที่ตัวแปรทำก่อนที่จะเปลี่ยน เนื่องจากการเปลี่ยนแปลงที่นี่อาจส่งผลกระทบอย่างมากต่อระบบ Jomres ของคุณ โดยทั่วไปแล้ว รายการว่างคือการตั้งค่าที่เก่ากว่าซึ่งไม่ได้ใช้แล้ว แต่ถูกทิ้งไว้ในแหล่งกำเนิดด้วยเหตุผลด้านความเข้ากันได้แบบย้อนหลัง ไม่สามารถแก้ไขได้ผ่านพื้นที่การกำหนดค่าคุณสมบัติ");
jr_define('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_NEWVALUE',"ค่าใหม่");