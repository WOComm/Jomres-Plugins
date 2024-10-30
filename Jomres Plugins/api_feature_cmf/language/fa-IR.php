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

jr_define ('_OAUTH_SCOPE_CHANNEL_MANAGEMENT' , "مدیریت کانال") ;
jr_define ('_OAUTH_SCOPE_CHANNEL_MANAGEMENT_DESC' , "مشتری می تواند فعالیت های مدیریت کانال را انجام دهد. توجه داشته باشید , این به مشتری قدرت قابل توجهی در سیستم برای اصلاح حساب ها و خواص شما می دهد.");

jr_define ('_OAUTH_SCOPE_CHANNEL_MANAGEMENT_CLEANING_PRICE' , "تمیز کردن") ;

jr_define ('_CMF_CANCELLED_BOOKING' , "مدیر کانال رزرو را لغو کرد");

jr_define ('_CMF_CLEANING_STRING' , "تمیز کردن") ; // اگر قبلاً املاک را وارد کرده اید این مورد را تغییر ندهید. املاک با هزینه تمیز کردن دارای اضافی با این نام هستند
jr_define ('_CMF_SECURITY_STRING' , "سپرده تضمینی") ; // اگر قبلاً املاک را وارد کرده اید این مورد را تغییر ندهید. املاک دارای سپرده های امنیتی دارای Extra با این نام هستند


jr_define ('_CMF_API_PRIVACY' , "حریم خصوصی API") ;
jr_define ('_CMF_API_PRIVACY_ON' , "حریم خصوصی روشن است") ;
jr_define ('_CMF_API_PRIVACY_OFF' , "حریم خصوصی خاموش است") ;

jr_define ('_CMF_API_PRIVACY_DESC' , "اطلاعات یک دارایی فقط توسط کانالی که آن را ایجاد کرده است قابل مشاهده است. به عنوان مثال , اگر شما جفت کلید API متفاوتی را به کانال A و کانال B داده اید , اطلاعات یک ویژگی ایجاد شده توسط کانال A نمی تواند دیده می شود توسط کانال B ... مگر اینکه API Privacy را خاموش کنید تا همه کانالها بتوانند از طریق API تمام اطلاعات دارایی را مشاهده کنند. اگر این ویژگی را با هیچ سایت دیگری به اشتراک نمی گذارید , حریم خصوصی API را روی روشن بگذارید. ");