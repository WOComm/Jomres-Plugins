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

jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_TITLE' , "Jomres 2 Jomres Integration") ;
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_TITLE' , "شناسه سرویس گیرنده سایت والدین") ;
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_DESC' , "شناسه سرویس گیرنده سایت والدین. در سایت والدین به یک شناسه و راز سرویس گیرنده منحصر به فرد با نصب همه افزونه های ویژگی api , نصب افزونه Channel Management Framework و هنگام ایجاد/ویرایش شناسه مشتری/نیاز دارید جفت کلید مخفی شما باید به آن دسترسی به همه محدوده های موجود را بدهید. ");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_TITLE' , "راز سرویس گیرنده سایت والدین") ;
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_DESC' , "راز سرویس گیرنده سایت اصلی") ;
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENTSITE_TITLE' , "آدرس والدین") ;
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENTSITE_DESC' , "آدرس سایت اصلی سایت Jomres") ;
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_NOT_SET' , "خطا , شناسه مشتری سایت والدین شما تنظیم نشده است. برای ذخیره شناسه مشتری خود از پیکربندی سایت> برگه حسابهای مدیر کانال دیدن کنید.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_NOT_SET' , "خطا , راز سایت والدین شما تنظیم نشده است. برای ذخیره راز خود به پیکربندی سایت> برگه حسابهای مدیر کانال مراجعه کنید.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENT_NOT_SET' , "خطا , آدرس اینترنتی سایت والدین شما تنظیم نشده است. برای ذخیره url سایت اصلی خود از پیکربندی سایت> برگه حسابهای مدیر کانال دیدن کنید.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_NOT_SET_ADMIN_SANITY_CHECK_MESSAGE' , "خطا , شناسه مشتری شما تنظیم نشده است. برای ذخیره نام کاربری خود از پیکربندی سایت> برگه حسابهای مدیر کانال دیدن کنید.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_NOT_SET_ADMIN_SANITY_CHECK_MESSAGE' , "خطا , شناسه مشتری شما تنظیم نشده است. برای ذخیره گذرواژه خود از پیکربندی سایت> برگه حسابهای مدیر کانال دیدن کنید.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_TITLE' , "راه اندازی کانال") ;
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_MESSAGE' , "Jomres 2 Jomres: وارد کردن ویژگی های جدید.") ;
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_BUTTON_IMPORT' , "IMPORT") ;
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_BUTTON_EXPORT' , "EXPORT") ;
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_PROPERTYID_NOTSET' , "شناسه ویژگی تنظیم نشده است") ;
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET' , "موارد دیکشنری نقشه برداری تنظیم نشده است") ;
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_PROPERTYTYPE_NOTFOUND' , "نوع خاصیت محلی یافت نشد. اگر نوع ویژگی ایجاد شده است , لطفاً اطمینان حاصل کنید که نوع ویژگی سرویس از راه دور را به نوع ویژگی محلی نگاشته اید.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_REMOTEPROPERTYTYPE_NOTFOUND' , "نوع ویژگی از راه دور توسط کانال بازگردانده نمی شود.") ;
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_LOCAL_PROPERTYTYPE_NOTFOUND' , "نوع ویژگی محلی منتقل نشده است.") ;
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_BOOKING_MODEL_NOT_FOUND' , "مدل رزرو (mrp یا srp) مشخص نشد.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_BOOKING_MODEL_NOT_FOUND_IN_PROPERTY_TYPE' , "پس از یافتن شناسه نوع ویژگی , مدل رزرو (mrp یا srp) مشخص نشد");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_COUNTRY_CODE_NOT_FOUND' , "کد کشور تعیین نشد") ;
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_REGION_ID_NOT_FOUND' , "شناسه منطقه تعیین نشد") ;
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_VALIDATE_SETTINGS_FAILED' , "آرایه تنظیمات به درستی تأیید نشد");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_PTYPES' , "انواع ویژگی هایی که توسط سرپرست نقشه برداری نشده اند") ;
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_PFEATURES' , "ویژگی های دارایی توسط سرپرست نقشه برداری نشده است") ;
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_ROOM_TYPES' , "انواع اتاقها که توسط سرپرست ترسیم نشده است") ;