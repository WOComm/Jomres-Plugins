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

jr_define('_SUBSCRIPTIONS_ACTIVE',"فعال");
jr_define('_SUBSCRIPTIONS_EXPIRED',"فعال نیست");
jr_define('_SUBSCRIPTIONS_HPAYMENT_STATUS',"وضعیت پرداخت");
jr_define('_SUBSCRIPTIONS_HSUBSCRIPTION_LEVEL',"سطح");
jr_define('_SUBSCRIPTIONS_EDIT_TITLE',"ویرایش اشتراک");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_TITLE',"ارسال ایمیل یادآوری انقضای اشتراک؟");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_DAYS_A',"ارسال ایمیل یادآوری");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_DAYS_B',"روزها قبل از انقضای اشتراک");
jr_define('_SUBSCRIPTIONS_SEND_EXPIRATION_EMAIL_TITLE',"پس از انقضای اشتراک ایمیل ارسال کنید؟");
jr_define('_SUBSCRIPTIONS_MY',"اشتراک های من");
jr_define('_SUBSCRIPTIONS_HRENEW',"تجدید");
jr_define('_SUBSCRIPTIONS_HRENEWAL',"تمدید اشتراک");
jr_define('_SUBSCRIPTIONS_HALREADY_SUBSCRIBED',"شما قبلا مشترک شده اید, لطفا به جای آن یک تمدید بخرید.");
jr_define('_SUBSCRIPTIONS_HEDIT',"ویرایش بسته اشتراک");

jr_define('_SUBSCRIPTIONS_PACKAGE_NO_LOGER_PUBLISHED',"این بسته اشتراک دیگر در دسترس نیست, بنابراین نمی توان آن را تمدید کرد, لطفاً آن را ارتقا دهید.");
jr_define('_SUBSCRIPTIONS_NOT_SUBSCRIBED_TO_PACKAGE_ID',"شما مشترک این بسته نیستید بنابراین نمی توانید آن را تمدید کنید.");
jr_define('_SUBSCRIPTIONS_NO_RENEWAL_OPTIONS_FOR_PACKAGE',"هیچ گزینه تمدید برای این بسته وجود ندارد");
jr_define('_SUBSCRIPTIONS_CANCEL',"لغو اشتراک");
jr_define('_SUBSCRIPTIONS_HFREQUENCY_DAYS',"فرکانس (روزها)");
jr_define('_SUBSCRIPTIONS_HFREQUENCY_DAYS_DESC',"طول اشتراک بر حسب روز");
jr_define('_SUBSCRIPTIONS_HRENEWAL_NOTALLOWED',"تجدید برای این بسته مجاز نیست.");
jr_define('_SUBSCRIPTIONS_HRENEWAL_PRICE',"قیمت تمدید");
jr_define('_SUBSCRIPTIONS_HRENEWAL_PRICE_EXPL',"این را روی 0 تنظیم کنید تا تمدید این بسته غیرفعال شود یا قیمتی برای تمدید وارد کنید");
jr_define('_SUBSCRIPTIONS_HPACKAGE_FEATURES',"گزینه های بسته");
jr_define('_SUBSCRIPTIONS_HPACKAGE_DETAILS',"جزئیات بسته");
jr_define('_SUBSCRIPTIONS_HPACKAGE_YOUR',"بسته اشتراک شما");
jr_define('_SUBSCRIPTIONS_HACCESS_TO_FEATURE_NOTALLOWED',"بسته اشتراک شما شامل دسترسی به این ویژگی نیست. برای استفاده از این ویژگی, باید اشتراک خود را ارتقا دهید.");
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TEXT1', "اشتراک شما منقضی شده است و همه لیست های شما منتشر نشده است. لیست های شما دیگر برای مهمانان قابل مشاهده نیست و دیگر نمی توانید رزروهای آنلاین را از وب سایت ما دریافت کنید. برای ادامه استفاده از خدمات ما, انتشار دهید. لیست های خود را شروع کنید و رزروهای آنلاین را دریافت کنید, لطفاً به حساب خود وارد شوید و یک تمدید خریداری کنید.");
jr_define('_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE1',"اشتراک شما در" );
jr_define('_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE2',"منقضی شده است");

jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_TITLE',"بسته های اشتراک" );
jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_NAME',"Name");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_DESCRIPTION', "توضیحات" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PUBLISHED','Published' );
jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FREQUENCY',"فرکانس");
jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FULLAMOUNT',"قیمت");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PROPERTYLIMIT', "محدودیت تجاری" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PROPERTYLIMIT_DESC',"حداکثر تعداد کسب و کارهایی که می توان با این بسته اشتراک اضافه کرد" );
jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_SUBSCRIBE','Subscribe');
jr_define( '_JRPORTAL_SUBSCRIPTIONS_USE', "استفاده از قابلیت مدیریت اشتراک" );
jr_define('_JRPORTAL_SUBSCRIPTIONS_SUBSCRIBING_ERROR_NOPACKAGEID',"با عرض پوزش, اما شناسه بسته شناسایی نشده است." );
jr_define( '_JRPORTAL_INVOICES_SUBSCRIPTION_PROFILE_ERROR_EXPL',"به نظر می رسد هنوز جزئیات حساب خود را پر نکرده اید. برای فهرست کردن دارایی خود در سایت, قبل از اینکه بتوانیم ادامه دهیم, باید جزئیات حساب خود را تکمیل کنید." );
jr_define('_JRPORTAL_SUBSCRIPTION_ALLSLOTUSED',"شما از تمام اسلات های دارایی موجود در بسته اشتراک خود استفاده کرده اید, بنابراین نمی توانید لیست جدیدی ایجاد کنید. اگر می خواهید لیست های بیشتری ایجاد کنید, لطفا بسته خود را ارتقا دهید." );
jr_define('_JOMRES_CHART_SUBSCRIPTIONS_DESC',"درآمد بر اساس سال/ماه");
jr_define('_SUBSCRIPTION_WARNING',"شما اشتراک ها را فعال کرده اید اما به نظر می رسد هنوز هیچ بسته اشتراکی ایجاد نکرده اید. مالکان نمی توانند تا زمانی که حداقل یک بسته اشتراک ایجاد شود, املاک را در سایت شما ثبت کنند.");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_APIACCESS', "دسترسی به API" );



	jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE_SUBSCRIPTION_1',"You can access this feature by upgrading to the " );
	jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE_SUBSCRIPTION_2'," Subscription Package. " );
	jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE', 'Upgrade');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_ALREADY_SUBSCRIBED', 'Subscribed');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_GATEWAY_SETTINGS', 'Subscription gateway settings');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_NOT_SUBSCRIBED', 'You are not currently subscribed to any subscription packages. Please subscribe to a package to continue using our services.');