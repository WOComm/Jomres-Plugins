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

jr_define ('PAYPAL_API_KEY_TITLE' , "کلید API Paypal") ;
jr_define ('PAYPAL_API_KEY_TITLE_DESC' , "پیکربندی شناسه و رمز مشتری Paypal خود را برای هر دو حساب زنده و Sandbox خود تنظیم کنید. پس از پیکربندی , می توانید از طریق Paypal هم پرداخت رزرو و هم صورت حساب را انجام دهید.");

jr_define ('PAYPAL_API_CLIENTID' , "شناسه مشتری") ;
jr_define ('PAYPAL_API_SECRET' , "Secret") ;
jr_define ('PAYPAL_API_CLIENTID_SANDBOX' , "شناسه مشتری سندباکس");
jr_define ('PAYPAL_API_SECRET_SANDBOX' , "Sandbox Secret") ;

jr_define ('PAYPAL_API_CLIENTID_FINDING' , "چگونه شناسه و راز مشتری خود را پیدا می کنید؟") ;

jr_define ('PAYPAL_API_CLIENTID_STEP1' , 'به https://developer.paypal.com/ بروید و وارد شوید.') ;
jr_define ('PAYPAL_API_CLIENTID_STEP2' , "به برنامه ها و اعتبارنامه من در منوی کناری بروید.") ;
jr_define ('PAYPAL_API_CLIENTID_STEP3' , "برای ایجاد برنامه جدید روی ایجاد برنامه کلیک کنید") ;
jr_define ('PAYPAL_API_CLIENTID_STEP4' , "نام برنامه خود را مشخص کنید , سپس روی ایجاد برنامه کلیک کنید.") ;
jr_define ('PAYPAL_API_CLIENTID_STEP5' , "در این صفحه می توانید شناسه مشتری و راز خود را مشاهده کنید. آن کلیدها را در فیلدهای مربوطه در بالا کپی و جایگذاری کنید.");