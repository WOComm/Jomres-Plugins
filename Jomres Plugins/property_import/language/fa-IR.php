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

jr_define('_JOMRES_PROPERTY_IMPORT_TITLE',"وارد کردن اموال");

jr_define('_JOMRES_PROPERTY_IMPORT_SELECT',"لطفا فایلی را که می خواهید آپلود کنید انتخاب کنید.");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELDS',"فایل csv باید 11 ستون داشته باشد و فیلدها نباید حاوی هیچ html باشند. همه فیلدها الزامی است.");

jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_NAME',"نام دارایی");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_NAME_TYPE',"متن");

jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_ROOMS_TYPE',"عدد صحیح");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_PRICE',"قیمت هر شب بدون کد ارز.");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_PRICE_TYPE',"Float");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_EMAIL_ADDRESS',"آدرس ایمیل");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_EMAIL_ADDRESS_TYPE',"متن");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_STREET',"خیابان");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_STREET_TYPE',"متن");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TOWN',"شهرک");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TOWN_TYPE',"متن");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_REGION',"منطقه. این باید با شناسه مناطق ذخیره شده در جدول مناطق مطابقت داشته باشد");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_REGION_TYPE',"عدد صحیح");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_COUNTRY',"کشور دارایی. کد کوتاه, مانند GB یا DE, نه نام کامل کشور");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_COUNTRY_TYPE',"متن");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_POSTCODE',"کد پستی");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_POSTCODE_TYPE',"متن");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TELEPHONE',"شماره تلفن");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TELEPHONE_TYPE',"متن");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_DESCRIPTION',"شرح کامل ویژگی. حداکثر 500 کاراکتر");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_DESCRIPTION_TYPE',"متن");

jr_define('_JOMRES_PROPERTY_IMPORT_PROPERTY_TYPE_NOT_SENT',"خطا, نوع ویژگی تنظیم نشده بود.");
jr_define ('_JOMRES_PROPERTY_IMPORT_NO_ROOM_TYPES_FOR_PROPERTY_TYPE' , "خطا , هیچ نوع اتاقی برای آن نوع ویژگی نداریم. می توانید با مراجعه به ساختار سایت در قسمت سرپرست , این مورد را اصلاح کنید.");
jr_define ('_JOMRES_PROPERTY_IMPORT_NO_FILE' , "اوه , آیا بارگذاری یک فایل را فراموش کرده اید؟");

jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_TOO_MANY_COLUMNS'," ستون های زیادی پیدا شد, یا فایل بد شکل است یا داده های csv به درستی ساخته نشده اند.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_PROPERTY_NAME_NOT_SET',"نام دارایی تنظیم نشده بود.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NUMBER_OF_ROOMS_INCORRECT',"تعداد اتاق ها تنظیم نشده است.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_PRICE_NOT_SET',"قیمت هر شب تعیین نشده است.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_COULD_NOT_VALIDATE_EMAIL_ADDRESS',"نمی توان آدرس ایمیل را تایید کرد.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_STREET',"خیابان تنظیم نشده بود.");
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_TOWN' , "شهر تنظیم نشده است.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_REGION',"منطقه تنظیم نشد.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_COUNTRY',"کشور تنظیم نشده است.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_POSTCODE',"کد پستی تنظیم نشد.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_TELEPHONE',"تلفن تنظیم نشده بود.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_DESCRIPTION',"شرح تنظیم نشد.");

jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_SUCCESS',"ویژگی با موفقیت وارد شد!");

jr_define ('_JOMRES_PROPERTY_IMPORT_FAILED_PROPERTIES' , "از آنجا که یک یا چند ویژگی دارید که واردات آنها ناموفق بوده است , ما فقط آن خواص را به قسمت زیر صادر کرده ایم. می توانید این ویژگی ها را در excell/open office calc/انتخاب فایل مدیریت CSV و انتخاب خود کپی کنید مشکلات بدون نیاز به واردات مجدد همه دارایی ها.");