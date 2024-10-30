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

jr_define('_DEEPL_TITLE',"การแปลอย่างละเอียด");
jr_define('_DEEPL_DESCRIPTION',"DeepL เป็นบริการแปลในบรรทัดที่มีราคาสมเหตุสมผลซึ่งคุณสามารถใช้เพื่อแปลสตริงภาษา Jomres ได้โดยอัตโนมัติ การแปลเหล่านี้เมื่อได้รับจากบริการ DeepL แล้ว จะถูกเก็บไว้ในเครื่อง และคุณสามารถใช้คุณสมบัติการแปลป้ายกำกับเพื่อ ปรับแต่ง ซึ่งช่วยเร่งกระบวนการทำให้เว็บไซต์ของคุณทำงานได้หลายภาษาอย่างรวดเร็ว <a href='https://support.deepl.com/hc/en-us/articles/360019925219' target='_blank'>รองรับ ภาษา</a>");
jr_define('_DEEPL_API_KEY_SETTING',"คีย์การตรวจสอบสิทธิ์ DeepL");
jr_define('_DEEPL_API_KEY_SETTING_DESC',"คุณจะต้องมีคีย์ API ที่ถูกต้องจาก <a href='https://www.deepl.com/pro?cta=header-prices/' target='_blank'>DeepL</a > เมื่อคุณสมัครรับข้อมูลแล้ว คุณจะพบคีย์การตรวจสอบสิทธิ์ใน <a href='https://www.deepl.com/en/pro-account/' target='_blank'>บัญชีของคุณ</a> หลังจากที่คุณ ได้บันทึกคีย์ใน Jomres เว็บไซต์ของคุณอาจทำงานช้าลงเล็กน้อยเนื่องจากจะมีการแปลจำนวนมากที่ต้องดึงออกจากบริการ DeepL อดทนและโหลดหน้าเว็บซ้ำสองสามครั้ง หลังจากนั้น คุณสามารถปรับแต่งการปรับแต่งได้ ในหน้าการแปลฉลาก");