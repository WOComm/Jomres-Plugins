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

jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_TITLE' , "تنظیمات ویژگی پیش فرض") ;
jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_CONFIGTITLE' , "عنوان پیکربندی عمومی (در صورت موجود بودن , برخی ممکن است نباشد)");
jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_VARIABLENAME' , "نام متغیر") ;
jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_CURRENTVALUE' , "مقدار فعلی") ;
jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_WARNING' , "این یک ویژگی پیشرفته است , اگر استفاده خاصی از آن ندارید , بهتر است از آن استفاده نکنید. این افزونه به شما امکان می دهد مقادیر پیش فرض یک ویژگی جدید را تغییر دهید. مطمئن هستید که متغیر را قبل از تغییر انجام می دهید زیرا تغییر آن در اینجا ممکن است تأثیرات گسترده ای روی سیستم Jomres شما داشته باشد. موارد خالی عموماً تنظیمات قدیمی تری هستند که دیگر مورد استفاده قرار نمی گیرند , اما به دلایل سازگاری عقب مانده در محل قرار می گیرند یا تنظیماتی هستند که از طریق ناحیه Configuration Property قابل تغییر نیست. ");
jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_NEWVALUE' , "مقدار جدید") ;