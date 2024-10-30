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

jr_define('TOOL_HYPHEN_CHECK_TITLE',"ตรวจสอบยัติภังค์");
jr_define('TOOL_HYPHEN_CHECK_DESCRIPTION',"เครื่องมือนี้ออกแบบมาเพื่อตรวจสอบความล่าช้าของคุณสมบัติและฟิลด์แบบยาว บางส่วนอาจมีเอนทิตี html อย่างไม่ถูกต้องในช่อง lat หรือ long แทนที่จะเป็นยัติภังค์จริง เมื่อพบว่าเครื่องมือนี้แปลงค่าเหล่านั้นเป็นขีดกลาง");
jr_define('TOOL_HYPHEN_CHECK_DONE_SOMEFOUND',"คุณสมบัติบางอย่างที่พบในเอนทิตี html ซึ่งตอนนี้ถูกแปลงเป็นยัติภังค์จริงแล้ว จำนวนคุณสมบัติที่แปลงคือ ");
jr_define('TOOL_HYPHEN_CHECK_DONE_NONEFOUND',"ทุกอย่างเรียบร้อยดี ไม่พบคุณสมบัติในเอนทิตี html ที่ควรจะมียัติภังค์จริง");