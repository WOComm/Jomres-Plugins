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

jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_TITLE' , "زمینه های ویژگی های سفارشی") ;
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_TITLE_EDIT' , "ویرایش زمینه ویژگی سفارشی") ;
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_INFO' , "از این ویژگی برای ایجاد فیلدهای اطلاعات سفارشی برای خواص استفاده کنید. این اطلاعات توسط یک مدیر ویژگی اضافه می شود و در یک برگه جدید در صفحه جزئیات ویژگی نمایش داده می شود.") ;
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_MANAGER_TITLE' , "سایر اطلاعات دارایی") ;
jr_define ( '_JOMRES_CUSTOM_PROPERTY_FIELDS_INSTRUCTIONS', "این زمینه اموال سفارشی را می توان در جزئیات ملک در یک تب جداگانه نمایش داده شده, یا در لیست اموال. شما می توانید به /".JOMRES_ROOT_DIRECTORY."/core-plugins/custom_property_fields/templates/tabcontent_01_custom_property_fields.html (for the property details tab) and/or /".JOMRES_ROOT_DIRECTORY."/core-plugins/custom_property_fields/templates/propertylist_custom_property_fields.html (برای قطعه لیست دارایی) برای رسیدن به طرح مورد نیاز خود. با فیلدهای ذکر شده در بالا , یک طرح بندی اصلی شبیه به شکل زیر است , که می توانید از آن به عنوان مثال استفاده کنید و از آن می توانید طرح خود را بسازید. ");