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


jr_define ('WEBHOOKS_AUTH_METHOD_MAILCHIMP', 'Mailchimp') ;
jr_define ('WEBHOOKS_AUTH_METHOD_MAILCHIMP_NOTES' , "تعمل طريقة التكامل هذه على تحديث قائمة Mailchimp عند إضافة ضيف إلى النظام. <br/>
لست بحاجة إلى تعيين إدخال عنوان URL لخطاف الويب هذا , فسنحدد ذلك بناءً على واجهة برمجة التطبيقات الخاصة بك. <br/>
لتكوين خطاف الويب هذا , ستحتاج إلى عنصرين من المعلومات , مفتاح API ومعرف القائمة. <br/>
للعثور على مفتاح API الخاص بك , انتقل إلى حساب Mailchimp الخاص بك و: <br/>
<ol>
  <li> انقر على اسم ملفك الشخصي لتوسيع لوحة الحساب , واختر الحساب. </ li>
  <li> انقر على القائمة المنسدلة \"الإضافات\" واختر مفاتيح واجهة برمجة التطبيقات. </ li>
  <li> انسخ مفتاح API موجودًا أو انقر فوق الزر \"إنشاء مفتاح\". </ li>
  <li> حدد اسمًا وصفيًا لمفتاحك , حتى تعرف التطبيق الذي يستخدم هذا المفتاح. </ li>
</ol>
بعد ذلك , ستحتاج إلى معرف القائمة , والذي يمكنك العثور عليه من خلال زيارة القوائم في Mailchimp. انقر على رابط قائمة القوائم وفي نهاية الصف على اليمين انقر على القائمة المنسدلة , ثم اختر الإعدادات. قم بالتمرير إلى أسفل تلك الصفحة , وستظهر لك شيئًا مثل \"معرف القائمة لقائمة blahblah\". هذا هو معرف القائمة التي تحتاج إلى استخدامها.
    ") ;

jr_define ('WEBHOOKS_AUTH_METHOD_MAILCHIMP_APIKEY', 'API Key') ;
jr_define ('WEBHOOKS_AUTH_METHOD_MAILCHIMP_LISTID', 'List ID') ;