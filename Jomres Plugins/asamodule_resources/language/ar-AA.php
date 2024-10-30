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


jr_define ('_JOMRES_SHORTCODES_06000ASAMODULE_RESOURCES' , "إظهار غرف / موارد خاصية في عنصر واجهة / وحدة ASAModule. مفيد لمواقع الملكية الفردية.") ;

jr_define ('_JOMRES_SHORTCODES_06000ASAMODULE_RESOURCES_ASAMODULE_RESOURCES_PUID', "مطلوب. معرف الخاصية الذي تريد إظهار الموارد له") ;
jr_define ('_JOMRES_SHORTCODES_06000ASAMODULE_RESOURCES_ASAMODULE_RESOURCES_IDS', "مطلوب. معرفات الموارد (مثل الغرف) التي تريد إظهارها. قائمة المعرفات المفصولة بفواصل.") ;
jr_define ('_JOMRES_SHORTCODES_06000ASAMODULE_RESOURCES_ARRIVALDATE' , "اختياري. عيِّن تاريخ الوصول بالتنسيق الذي يتوافق مع تكوين الموقع> علامة التبويب التقويم> إعداد تنسيق إدخال التقويم. على سبيل المثال , 01/02/2018. يسمح لك هذا بإظهار أسعار غرف معينة في تواريخ محددة في المستقبل , بافتراض أن لديك تعريفات محددة تغطي تلك التواريخ. ") ;