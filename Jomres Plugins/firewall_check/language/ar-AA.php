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


jr_define ('FIREWALL_CHECK', 'فحص جدار الحماية') ;
jr_define ('FIREWALL_CHECK_DESC' , "هذا المكون الإضافي هو فحص بسيط لمعرفة ما إذا كان هذا الخادم يمكنه الاتصال بالخدمات البعيدة. إذا لم يستطع ذلك , فقد يشير ذلك إلى وجود قواعد جدار حماية في مكان تمنع الجهازين من التحدث مع بعضهما البعض. إذا كان هناك هي , فقد تحتاج إلى مناقشة تعديل قواعد جدار الحماية مع مضيفي خادم الويب الخاص بك. يمكن اعتبار استجابات 404 و 403 جيدة لأنك تحصل على استجابة من الخدمة البعيدة.");
jr_define ('FIREWALL_CHECK_REMOTE_SERVICE', 'خدمة عن بعد') ;
jr_define ('FIREWALL_CHECK_STATUSCODE', 'كود الحالة') ;
jr_define ('FIREWALL_CHECK_IP_NUMBER', 'رقم IP') ;