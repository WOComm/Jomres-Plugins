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


jr_define ('_DEEPL_TITLE', "ترجمات DeepL") ;
jr_define ('_DEEPL_DESCRIPTION' , "DeepL هي خدمة ترجمة مضمنة بأسعار معقولة يمكنك استخدامها لترجمة سلاسل لغة Jomres تلقائيًا. يتم تخزين هذه الترجمات , بمجرد استلامها من خدمة DeepL , محليًا ويمكنك استخدام ميزة Label Translations لـ صقلها. يؤدي هذا إلى تسريع عملية جعل موقع الويب الخاص بك يعمل بلغات متعددة. <a href='https://support.deepl.com/hc/en-us/articles/360019925219' target='_blank'> معتمد اللغات </a> ") ;
jr_define ('_DEEPL_API_KEY_SETTING', "مفتاح مصادقة DeepL") ;
jr_define ('_DEEPL_API_KEY_SETTING_DESC' , "ستحتاج إلى مفتاح API صالح من <a href='https://www.deepl.com/pro؟cta=header-prices/' target='_blank'> DeepL. </ a > بمجرد الاشتراك , ستجد مفتاح المصادقة في <a href='https://www.deepl.com/en/pro-account/' target='_blank'> حسابك. </a> بعدك قمت بحفظ المفتاح في Jomres , فقد يتباطأ موقعك لفترة قصيرة حيث سيكون هناك الكثير من الترجمات التي يجب سحبها من خدمة DeepL. تحلى بالصبر وأعد تحميل الصفحة عدة مرات. بعد ذلك يمكنك ضبط التخصيصات بدقة في صفحة ترجمة lable. ") ;