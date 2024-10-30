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
jr_define ('_OAUTH_SCOPE_CHANNEL_MANAGEMENT', "إدارة القناة") ;
jr_define ('_OAUTH_SCOPE_CHANNEL_MANAGEMENT_DESC', "يمكن للعميل تنفيذ أنشطة إدارة القناة. لاحظ أن هذا يمنح العميل قوة كبيرة في النظام لتعديل حساباتك وخصائصك.") ;

jr_define ('_OAUTH_SCOPE_CHANNEL_MANAGEMENT_CLEANING_PRICE', "تنظيف") ;

jr_define ('_CMF_CANCELLED_BOOKING' , "ألغى مدير القناة الحجز") ;

jr_define ('_CMF_CLEANING_STRING', "تنظيف") ; // لا تغير هذا إذا كنت قد قمت بالفعل باستيراد الخصائص. العقارات ذات رسوم التنظيف لها إضافة بهذا الاسم
jr_define ('_CMF_SECURITY_STRING', "إيداع الضمان") ; // لا تغير هذا إذا كنت قد قمت بالفعل باستيراد الخصائص. الممتلكات ذات الودائع التأمينية لها إضافة بهذا الاسم


jr_define ('_CMF_API_PRIVACY', "خصوصية واجهة برمجة التطبيقات") ;
jr_define ('_CMF_API_PRIVACY_ON' , "الخصوصية قيد التشغيل") ;
jr_define ('_CMF_API_PRIVACY_OFF', "الخصوصية متوقفة") ;

jr_define ('_CMF_API_PRIVACY_DESC' , 'ا يمكن رؤية معلومات الخاصية إلا من خلال القناة التي أنشأتها. على سبيل المثال , إذا أعطيت أزواج مفاتيح API مختلفة لكل من القناة A والقناة B , فلا يمكن لمعلومات الخاصية التي تم إنشاؤها بواسطة القناة A يمكن رؤيتها بواسطة القناة "ب" ... ما لم تقم بإيقاف "خصوصية واجهة برمجة التطبيقات" للسماح لجميع القنوات برؤية جميع معلومات الملكية من خلال واجهة برمجة التطبيقات. اضبط خصوصية واجهة برمجة التطبيقات على "إيقاف" إذا كنت تشارك هذه الخاصية مع موقع آخر يريد إدراج الخاصية. إذا كنت لا تشارك هذه الخاصية مع أي مواقع أخرى , فاترك خصوصية واجهة برمجة التطبيقات مضبوطة على تشغيل. ') ;

