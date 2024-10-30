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

jr_define ('_JOMRES_DATAWIPE_TITLE', "مسح البيانات") ;
jr_define ('_JOMRES_DATAWIPE_DESC' , "تتيح لك هذه الميزة حذف البيانات التي تم جمعها عند إجراء الحجوزات. وهي مخصصة للاستخدام من قبل المطورين الذين أنشأوا الكثير من بيانات التطوير على عمليات التثبيت الخاصة بهم (مثل حجوزات الاختبار والاشتراكات) ويريدون امسح المعلومات من النظام , مع الحفاظ على معلومات الملكية والتعريفات. <br/> سيزيل المكون الإضافي جميع سجلات cron ومفضلات المستخدم والملاحظات والحجوزات والفواتير والمشتركين والاشتراكات والضيوف وبيانات التدقيق وأعداد النقرات والمراجعات. " ) ;
jr_define ('_JOMRES_DATAWIPE_WARNING' , "لا يمكن استرداد هذه البيانات إلا من نسخة احتياطية من نظامك , لذلك عليك أن تفهم أن هذا نص برمجي ضار جدًا. ونتيجة لذلك , يوصى بمجرد استخدامه للغرض المقصود منه الغرض منه إلغاء تثبيته مرة أخرى بعد ذلك. ") ;
jr_define ('_JOMRES_DATAWIPE_GO', "انقر لمسح البيانات") ;
jr_define ('_JOMRES_DATAWIPE_EMPTYING', "إفراغ") ;
jr_define ('_JOMRES_DATAWIPE_EMPTYING_SUCCESS', "تم إفراغها بنجاح.") ;
jr_define ('_JOMRES_DATAWIPE_EMPTYING_FAILURE', "فشل إفراغ الجدول.") ;
