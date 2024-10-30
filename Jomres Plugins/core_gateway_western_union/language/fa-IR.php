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

jr_define('_JRPORTAL_WESTERN_UNION',"Western Union");
jr_define('_JRPORTAL_WESTERN_UNION_TITLE',"تنظیمات وسترن یونیون");
jr_define('_JRPORTAL_WESTERN_UNION_ADMIN_INSTRUCTIONS',"در اینجا می‌توانید جزئیات حساب WU را تعریف کنید که برای همه ویژگی‌هایی که دروازه WU را فعال کرده‌اند استفاده می‌شود. اگر انتخاب کنید که جزئیات حساب WU تنظیم شده در frontend نادیده گرفته شود, از جزئیات تنظیم شده در اینجا استفاده می‌شود. اگر انتخاب کردید که این کار را نکنید, از جزئیات حساب WU که در پیکربندی دروازه frontend تعریف شده است استفاده می شود.");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_OVERRIDE_ACTIVE',"لغو جزئیات حساب WU تنظیم شده برای همه ویژگی ها؟ ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER',"شعبه وسترن یونیون: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN',"نام ذینفع: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT',"شناسه ذینفع: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC',"آدرس ذینفع: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME',"اطلاعات دیگر: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER1',"شعبه وسترن یونیون: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN1',"نام ذینفع: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT1',"شناسه ذینفع: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC1',"آدرس ذینفع: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME1',"اطلاعات دیگر: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER2',"شعبه وسترن یونیون: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN2',"نام ذینفع: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT2',"شناسه ذینفع: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC2',"آدرس ذینفع: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME2',"اطلاعات دیگر: ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_TITLE',"جزئیات پرداخت برای رزرو شما در ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_HELLO',"عزیز");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_THANKYOU',"از رزرو شما در  متشکریم.");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_SENDDEPOSITTO',"به منظور ایمن کردن رزرو خود, لطفا مبلغ سپرده خود را ارسال کنید");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_BELOWADDRESS_EMAIL'," به حساب Western Union زیر.");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_BELOWADDRESS'," به حساب Western Union زیر. یک کپی از اطلاعات حساب Western Union نیز پس از ارسال این رزرو از طریق ایمیل برای شما ارسال خواهد شد.");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS1',"اگر سوالی دارید, لطفاً در تماس با ما تردید نکنید. می توانید با ما تماس بگیرید ");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS2'," یا به ما ایمیل بزنید در ");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS_EMAIL',"اگر سوالی دارید, لطفا با ما تماس بگیرید.");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_PRINT',"چاپ جزئیات حساب Western Union");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_SUBMIT',"ارسال");

	jr_define('JOMRES_WESTERN_UNION_GATEWAY_WU_CHOSEN',"میهمان توسط Western Union پرداخت خواهد کرد");
