<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.24.0
 *
 * @copyright	2005-2021 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/
//#################################################################
defined('_JOMRES_INITCHECK') or die('');
//#################################################################


jr_define ('TOOL_HYPHEN_CHECK_TITLE', "فحص الواصلة") ;
jr_define ('TOOL_HYPHEN_CHECK_DESCRIPTION' , "تم تصميم هذه الأداة للتحقق من كل تأخر الخاصية والحقول الطويلة. قد يحتوي البعض بشكل غير صحيح على كيانات html في خطوط الطول أو الحقول الطويلة بدلاً من الواصلات الفعلية. حيث يتم العثور على هذه الأداة وتحولها إلى واصلات.") ;
jr_define ('TOOL_HYPHEN_CHECK_DONE_SOMEFOUND', "بعض الخصائص التي تم العثور عليها مع كيانات html , والتي تم تحويلها الآن إلى واصلات فعلية. عدد الخصائص المحولة هو") ;
jr_define ('TOOL_HYPHEN_CHECK_DONE_NONEFOUND', "كل شيء جيد , لم يتم العثور على خصائص مع كيانات html حيث يجب أن تكون الواصلات الفعلية.") ;