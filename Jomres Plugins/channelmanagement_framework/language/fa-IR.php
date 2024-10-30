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

jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHANNEL_ID_NOT_SET' , "شناسه کانال تنظیم نشده است") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MANAGER_ID_NOT_SET' , "شناسه مدیر تنظیم نشده است") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_TITLE' , "چارچوب مدیر کانال") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_FRONTEND_TITLE' , "کانال") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_INSTALLED_CHANNELS' , "کانال های نصب شده") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHOOSE_CHANNEL' , "انتخاب کانال") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHOOSE_CHANNEL_CHOOSE_DICTIONARY_TYPE' , "انتخاب نوع فرهنگ لغت") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHANNEL_NONE_INSTALLED' , "خطا , کانالی نصب نشده است") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_SANITY_CHECKS_TITLE' , "بررسی سلامت عقل مدیر کانال") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_SANITY_CHECKS_DESC' , "یک کانال را انتخاب کنید. پس از انجام این کار , پیکربندی شما را بررسی کرده و هرگونه مشکل احتمالی را که ممکن است لازم باشد به آنها اشاره کنیم , برجسته می کنیم.") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_TITLE' , "نگاشت منابع") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_DESC' , "کانال های مختلف دارای واژه نامه هستند. این اصطلاحات برای توصیف منابع مانند انواع اتاق , ویژگی های اتاق , ویژگی های اموال و غیره است. قبل از اینکه بتوانید از کانال استفاده کنید , باید نقشه های مختلف Jomres را با کانال های جداگانه ترسیم کنید. منابع به گونه ای که خواص وارد شده و صادر شده به کانال ها منابع صحیحی داشته باشند. در این صفحه ابتدا یک کانال را انتخاب می کنید. پس از اتمام کار به صفحه جدیدی منتقل می شوید که در آن می توانید انواع منابع مورد نظر خود را انتخاب کنید. به منابع کانال (به عنوان مثال , ویژگی های ویژگی). پس از انتخاب نوع منبع , می توانید منابع Jomres و Channel را با یکدیگر انتخاب کنید. ");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_SELECT_RESOURCE' , "در اینجا شما باید منبع (فرهنگ لغت) را انتخاب کنید") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_NO_LOCAL_ITEMS' , "هیچ مورد محلی برای این مورد فرهنگ لغت وجود ندارد , بنابراین چیزی برای نقشه برداری وجود ندارد.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_CHANNEL_DICTIONARY_CLASS_DOESNT_EXIST' , "خطا , کانال کلاس دیکشنری ندارد.") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_MAP_ITEM_TYPES_INSTRUCTIONS' , "در این صفحه شما باید موارد فرهنگ لغت مدیر کانال را با موارد موجود در Jomres ترسیم کنید.");

jr_define ('CHANNELMANAGEMENT_FRAMEWORK_USER_ACCOUNTS' , "حسابهای مدیر کانال") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_USER_ACCOUNTS_DESC' , "لطفاً اطلاعات مجوز را برای هر مدیر کانال که ممکن است در آن حساب داشته باشید ذخیره کنید.");
jr_define ("پایان" , "پایان ویرایش") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_EXTRAS_NOTINSTALLED' , "خطا , افزونه اضافی اختیاری نصب نشده است.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_CHANNEL_NAME_NOT_SUPPLIED' , "نام کانال ارائه نشده است") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_NEW_PROPERTY_OBJECT_NOT_SUPPLIED' , "شیء ملک جدید ارائه نشده است") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_THISJRUSER_OBJECT_NOT_SUPPLIES' , "این شیء JRUser ارائه نشده است") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING' , "شروع واردات ملک") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTED' , "دارایی با موفقیت وارد شد") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_FAILED' , "املاک وارد نشد") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT' , "وارد کردن همه ویژگی ها") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_ONE' , "وارد کردن دارایی") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_UNPUBLISHED_CANNOT_IMPORT' , "خواصی که در سرور راه دور به عنوان نشر/فعال شده مشخص نشده اند , یا خواصی که هیچ مورد تغییر نامی ندارند وارد نمی شوند.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORTING' , "شروع واردات تعرفه") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORTED' , "تعرفه با موفقیت وارد شد") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORT_FAILED' , "تعرفه وارد نشد") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_SETTINGS_FAILED_VALIDATION' , "برای تأیید اعتبار تنظیمات دارایی , سعی شد تنظیمات اموال ناشناس وارد شود") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_PAGETITLE' , "خواص وارد شده") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_PROPERTY_NAME' , "نام دارایی") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_CHANNEL_NAME' , "نام کانال") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_LOCAL_PROPERTY_UID' , 'uid اموال محلی ') ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_REMOTE_PROPERTY_UID' , "ویژگی از راه دور uid") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_EDIT_REMOTE_PROPERTY' , "ویرایش از راه دور") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_EDIT_LOCAL_PROPERTY' , "مشاهده محلی") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_DELETE_LOCAL_PROPERTY' , "حذف محلی") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MENUITEM_DASHBOARD' , "داشبورد") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MENUITEM_ACCOUNTS' , "حساب های کانال") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_THIN_CHANNELS_NOT_INSTALLED' , "هیچ افزونه کانال نازکی نصب نشده است , هنوز نمی توانید از این ویژگی استفاده کنید.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_INFO' , "ویژگیهای واگذاری نشده ای که مدیریت می کنید می تواند به یک کانال اختصاص داده شود. اگر کانال را تغییر دهید به هر کانالی با دسترسی API معتبر می دهید") ;