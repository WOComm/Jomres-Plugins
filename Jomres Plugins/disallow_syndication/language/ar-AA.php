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


jr_define ('DISALLOW_SYNDICATION_TITLE', "Disallow Syndication") ;
jr_define ('DISALLOW_SYNDICATION_DESCRIPTION' , 'إن ميزة المشاركة في Jomres.net هي وظيفة جديدة مصممة لمشاركة الخصائص بين المواقع على الرغم من أن الحجوزات لا يمكن إجراؤها إلا على الخادم المنزلي.') ;

jr_define ('DISALLOW_SYNDICATION_DESCRIPTION_MORE' , "الغرض من هذا هو تمكين المواقع من بناء الثقة مع محركات البحث. إنها ميزة مجانية , متاحة لجميع مستخدمي Jomres. يمكن لحاملي تراخيص Jomres النشطة , إذا كانوا يرغبون في إزالة موقع من شبكة الترويج عبر هذه الصفحة. لا يمكن إضافة Localhost إلى الشبكة , وإذا كانت هناك مشكلة في الاتصال لأي سبب من الأسباب , فلن تتمكن من إضافة موقعك إلى الشبكة. تحقق من صفحة اختبار اتصال REST API إذا كنت في أي شك. ") ;

jr_define ('DISALLOW_SYNDICATION_INSTRUCTIONS_DISALLOW' , "انقر فوق هذا الارتباط لإزالة موقعك من الشبكة.") ;
jr_define ('DISALLOW_SYNDICATION_INSTRUCTIONS_ALLOW', "انقر فوق هذا الارتباط لإضافة موقعك إلى الشبكة.") ;

jr_define ('DISALLOW_SYNDICATION_DISALLOW', "إزالة هذا الموقع من الشبكة") ;
jr_define ('DISALLOW_SYNDICATION_ALLOW', "أضف هذا الموقع إلى الشبكة") ;

jr_define ('DISALLOW_SYNDICATION_INVALID_KEY', "عذرًا , مفتاح الدعم الخاص بك غير صالح أو غير نشط , لا يمكنك تغيير حالة مشاركة هذا التثبيت.") ;