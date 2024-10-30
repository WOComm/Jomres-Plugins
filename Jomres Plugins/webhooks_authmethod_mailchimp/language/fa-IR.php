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



jr_define('WEBHOOKS_AUTH_METHOD_MAILCHIMP', 'Mailchimp');
jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP_NOTES', 'این روش یکپارچه سازی لیست Mailchimp را هنگامی که مهمانی را به سیستم اضافه می کنید به روز می کند.<br/>
شما نیازی به تنظیم ورودی URL برای این وب هوک ندارید, ما آن را بر اساس API شما متوجه خواهیم شد.<br/>
برای پیکربندی این وب هوک به دو مورد از اطلاعات نیاز دارید, یک کلید API و شناسه لیست. <br/>
برای پیدا کردن کلید API خود به حساب Mailchimp خود بروید و :<br/>
<ol>
  <li>برای گسترش پنل حساب روی نام نمایه خود کلیک کنید و حساب را انتخاب کنید.</li>
  <li>روی منوی کشویی Extras کلیک کنید و کلیدهای API را انتخاب کنید.</li>
  <li>یک کلید API موجود را کپی کنید یا روی دکمه ایجاد یک کلید کلیک کنید.</li>
  <li>کلید خود را به صورت توصیفی نام گذاری کنید تا بدانید چه برنامه ای از آن کلید استفاده می کند.</li>
</ol>
در مرحله بعد به لیست شناسه نیاز دارید که می توانید با مراجعه به لیست های خود در Mailchimp آن را پیدا کنید. روی پیوند منوی فهرست ها کلیک کنید و در انتهای سطر سمت راست روی منوی کشویی کلیک کنید و سپس تنظیمات را انتخاب کنید. به پایین آن صفحه بروید, چیزی شبیه به "List id for blahblah list" خواهد گفت. این شناسه لیستی است که باید از آن استفاده کنید.
    ');

jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP_APIKEY', 'کلید API' );
jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP_LISTID', 'List ID' );