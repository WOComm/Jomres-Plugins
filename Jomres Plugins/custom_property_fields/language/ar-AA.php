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

jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_TITLE' , "حقول الخاصية المخصصة") ;
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_TITLE_EDIT', "تحرير حقل خاصية مخصص") ;
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_INFO' , "استخدم هذه الميزة لإنشاء حقول معلومات مخصصة للخصائص. تتم إضافة هذه المعلومات بواسطة مدير الخصائص , ويتم عرضها في علامة تبويب جديدة في صفحة تفاصيل الخاصية.") ;
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_MANAGER_TITLE', "معلومات خاصية أخرى") ;
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_INSTRUCTIONS' , "يمكن عرض حقول الخصائص المخصصة هذه في تفاصيل الخاصية في علامة تبويب منفصلة , أو في قائمة الخصائص. ستحتاج إلى تحرير /".JOMRES_ROOT_DIRECTORY."/core-plugins/custom_property_fields/templates/tabcontent_01_custom_property_fields.html (for the property details tab) and/or /".JOMRES_ROOT_DIRECTORY."/core-plugins/custom_property_fields/templates/propertylist_custom_property_fields.html (لمقتطف قائمة الخصائص) لتحقيق التخطيط المطلوب. مع الحقول كما تم إدخالها أعلاه , سيبدو التصميم الأساسي شيئًا مشابهًا لما يلي , والذي يمكنك استخدامه كمثال يمكنك من خلاله إنشاء التخطيط الخاص بك. ") ;
