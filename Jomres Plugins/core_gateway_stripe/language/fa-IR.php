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

jr_define ('STRIPE_TITLE' , "Stripe") ;
jr_define ('STRIPE_CONNECT_CONFIG_INFO' , "این دروازه Stripe به طور خاص طراحی شده است تا به شما به عنوان مدیر سایت اجازه دهد بخشی از پرداخت های انجام شده به مدیران املاک را در زمان رزرو دریافت کنید. قبل از استفاده , ابتدا باید ادغام خود را با Stripe تنظیم کنید اتصال. <a href = 'http://www.jomres.net/manual/site-managers-guide/23-control-panel/payment-methods/340-core-gateway-stripe' target='_blank' class = 'btn btn-primary'>  اسناد مربوط به این افزونه را در اینجا می توانید بیابید. </a> <br/> اگر روی ذخیره در این صفحه کلیک کنید , برای فعالسازی یکپارچه این افزونه  همه درگاه های دیگر غیرفعال می شوند </ strong> قبل از شروع , مطمئن شوید که به صفحه Stripe Connect خود رفته اید و نشان داده اید که در حال راه اندازی یک پلتفرم هستید. پس از اتمام این کار , دستورالعمل های روی صفحه را برای راه اندازی حساب خود دنبال کنید. قبل از اینکه مدیران بتوانند حساب خود را با حساب شما وصل کنند باید از تنظیمات> اتصال تنظیمات و در قسمت \"تنظیمات OAuth\" فعال شده OAuth برای حسابهای استاندارد دیدن کنید و سپس روی ذخیره کلیک کنید (توجه داشته باشید که باید این کار را در دو حالت Test و Live انجام دهید). ");

jr_define ('STRIPE_REGISTER_CONNECT' , "با ما ارتباط برقرار کنید!") ;
jr_define ('STRIPE_REGISTER_CONNECT_BLURB' , "شما ثبت نام کرده اید , اما اتصال هنوز کامل نشده است. باید حساب Stripe خود را به وب سایت ما وصل کنید. پس از اتمام این کار , می توانید تمام املاک خود را به سایت ما اضافه کنید و شروع به رزرو کنید . ");

jr_define ('STRIPE_REGISTER_WELCOME_EMAIL_TITLE' , "خوش آمدید") ;
jr_define ('STRIPE_REGISTER_WELCOME_EMAIL_BLURB' , "قبل از شروع تنظیمات دارایی خود , باید ما را با حساب Stripe خود متصل کنید. برای شروع روی پیوند کلیک کنید.");

jr_define ('STRIPE_SETUP_INFO' , "ما اکنون باید حساب شما را به حساب خود متصل کنیم , این امر به ما امکان می دهد تا از طرف شما پرداختها را انجام دهیم , بنابراین روی دکمه اتصال کلیک کنید تا به Stripe منتقل شوید و در آنجا می توانید اتصال را تأیید کنید.");
jr_define ('STRIPE_SETUP_DONE' , "شما قبلاً با ما ارتباط برقرار کرده اید , دیگر کاری ندارید اینجا انجام دهید! این پنجره را ببندید و بیایید به کار تجارت بپردازیم.");
jr_define ('STRIPE_SETUP_THANKS' , "متشکرم که با ما ارتباط برقرار کردید! اکنون می توانید این پنجره را ببندید.");
jr_define ('STRIPE_SETUP_DISCONNECT' , "حساب خود را قطع کنید.") ;
jr_define ('STRIPE_SETUP_DISCONNECTED' , "حساب قطع شد , اکنون می توانید این پنجره را ببندید.");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_CLIENT_ID' , "شناسه مشتری Stripe Connect") ;
jr_define ('STRIPE_CONNECT_SITE_CONFIG_CLIENT_ID_DESC', "می توانید شناسه Stripe Client خود را از <a href='https://dashboard.stripe.com/account/applications/settings' target='_blank'> Dashboard >> دریافت کنید کلیدها در زیر گزینه منوی Developers قرار دارند. </a> ");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_RETURN_URL' , " لطفاً اطمینان حاصل کنید که URI تغییر مسیر خود را در <a href='https://dashboard.stripe.com/account/applications/settings' target='_blank'> وصل کنید> تنظیمات </a> به <br/> ") ;

jr_define ('STRIPE_CONNECT_SITE_CONFIG_SECRET_KEY' , "کلید مخفی") ;
jr_define ('STRIPE_CONNECT_SITE_CONFIG_PUBLIC_KEY' , "کلید عمومی") ;

jr_define ('STRIPE_CONNECT_SITE_CONFIG_COMMISSION' , "کمیسیون شما") ;
jr_define ('STRIPE_CONNECT_SITE_CONFIG_COMMISSION_DESC' , "این کمیسیون از پرداختی که هنگام رزرو به مدیر املاک ارسال می شود , گرفته می شود. سپس توسط Stripe به حساب Stripe شما واریز می شود. <br/> این درصد کمیسیونی است که از مدیران ملک به عنوان هزینه دریافت خواهید کرد. هزینه های شما بر اساس کل هزینه رزرو , و نه مبلغ سپرده , محاسبه می شود. <br/> این مقدار را بر هر چیزی که تعیین کرده اید , توصیه می کنیم پیکربندی سایت -> فرم رزرو -> رقم حداقل سپرده را پیکربندی کنید حداقل دو برابر این رقم , بنابراین اگر می خواهید 10 commission کارمزد دریافت کنید , باید حداقل سپرده را 20 کنید. ");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_EURO' , "هزینه راه راه اروپایی") ;
jr_define ('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_DESC' , "این درصدی است که Stripe بابت پرداخت سایت شما از شما دریافت می کند. در حال حاضر 1.4٪ برای کارتهای اروپایی و 2.9٪ برای کارتهای غیر اروپایی هزینه می شود. این رقم برای تعیین قیمت در رزرو و زمان پرداخت. ");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_NONEURO' , "هزینه راه راه غیر یورویی") ;

jr_define ('STRIPE_PAYMENT_FORM_CREDITCARD' , "شماره کارت") ;
jr_define ('STRIPE_PAYMENT_FORM_EXPIRATION' , "انقضا (MM/YY)") ;
jr_define ('STRIPE_PAYMENT_FORM_CVC' , "CVC") ;
jr_define ('STRIPE_PAYMENT_FORM_ZIP' , "Billing Zip") ;
jr_define ('STRIPE_PAYMENT_FORM_SECURE' , "فرم پرداخت امن") ;
jr_define ('STRIPE_PAYMENT_FORM_BILLINGDETAILS' , "جزئیات صورتحساب") ;
jr_define ('STRIPE_PAYMENT_FORM_CARDDETAILS' , "جزئیات کارت") ;
jr_define ('STRIPE_PAYMENT_FORM_HOLDER' , "نام دارنده کارت") ;
jr_define ('STRIPE_PAYMENT_FORM_PAYNOW' , "اکنون پرداخت کنید") ;
jr_define ('STRIPE_PAYMENT_FORM_TOPAY' , "اکنون پرداخت شود") ;

jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_STREET_EMPTY' , 'خیابان الزامی است و نمی تواند خالی باشد') ;
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_LENGTH' , 'خیابان باید بیش از 6 و کمتر از 96 کاراکتر طول داشته باشد') ;
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CITY_EMPTY' , 'شهر الزامی است و نمی تواند خالی باشد') ;
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_ZIP_EMPTY' , 'فشرده مورد نیاز است و نمی تواند خالی باشد') ;
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_ZIP_LENGTH' , 'زیپ باید بیش از 3 و کمتر از 12 نویسه باشد') ;
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_EMPTY' , 'آدرس ایمیل الزامی است و نمی تواند خالی باشد') ;
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_INVALID' , 'ورودی آدرس ایمیل معتبری نیست') ;
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_LENGTH' , 'ایمیل باید بیش از 6 و کمتر از 65 نویسه باشد') ;
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDHOLDER_EMPTY' , 'نام دارنده کارت الزامی است و نمی تواند خالی باشد') ;
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDHOLDER_LENGTH' , 'نام دارنده کارت باید بیش از 6 و کمتر از 70 نویسه باشد') ;
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_EMPTY' , 'شماره کارت اعتباری الزامی است و نمی تواند خالی باشد') ;
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_INVALID' , 'شماره کارت اعتباری نامعتبر است') ;
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_MONTH_EMPTY' , 'ماه انقضا الزامی است') ;
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_MONTH_DIGITS' , 'ماه انقضا فقط می تواند شامل رقم باشد') ;
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_YEAR_EMPTY' , 'سال انقضا الزامی است') ;
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_YEAR_DIGITS' , 'سال انقضا فقط می تواند شامل رقم باشد') ;
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CCV_EMPTY' , 'CVV مورد نیاز است و نمی تواند خالی باشد') ;
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CCV_INVALID' , 'مقدار CVV معتبر نیست') ;

jr_define ('STRIPE_PAYMENT_FAILED' , "متأسفیم , در حال حاضر نتوانستیم پرداخت شما را پردازش کنیم.");
jr_define ('STRIPE_PAYMENT_TRY_AGAIN' , "لطفاً دوباره امتحان کنید") ;

jr_define ('STRIPE_PAYMENT_ERROR_DECLINED' , "پرداخت رد شد.") ;
jr_define ('STRIPE_PAYMENT_ERROR_RATE_LIMIT' , "تعداد زیادی درخواست به API خیلی سریع ارسال شده است") ;
jr_define ('STRIPE_PAYMENT_ERROR_INVALID_PARAMETERS' , "پارامترهای نامعتبر به API Stripe ارائه شد") ;
jr_define ('STRIPE_PAYMENT_ERROR_AUTH_FAILED' , "احراز هویت با API Stripe ناموفق بود") ;
jr_define ('STRIPE_PAYMENT_ERROR_NETWORK_FAULT' , "ارتباط شبکه با Stripe ناموفق بود (آیا اتصال اینترنت شما قطع شده است؟)") ;
jr_define ('STRIPE_PAYMENT_ERROR_UNCAUGHT' , "خطایی رخ نداد") ;