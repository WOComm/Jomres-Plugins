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

jr_define('_JRPORTAL_WIRE_TRANSFER',"انتقال سیمی");
jr_define('_JRPORTAL_WIRE_TRANSFER_TITLE',"تنظیمات انتقال سیمی");
jr_define('_JRPORTAL_WIRE_TRANSFER_ADMIN_INSTRUCTIONS',"در اینجا می‌توانید جزئیات حساب بانکی را تعریف کنید که برای همه دارایی‌هایی که درگاه انتقال سیمی را فعال کرده‌اند استفاده می‌شود. اگر انتخاب کنید که جزئیات حساب بانکی تنظیم‌شده در frontend لغو شود, جزئیاتی که در اینجا تنظیم شده است استفاده شده است. اگر انتخاب نکنید, از جزئیات حساب بانکی تعریف شده در پیکربندی دروازه frontend استفاده خواهد شد.");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_OVERRIDE_ACTIVE',"جزئیات حساب بانکی تنظیم شده برای همه دارایی ها لغو شود؟ ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_ACCOUNT_HOLDER',"دارنده حساب: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_IBAN',"IBAN: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_SWIFT',"کد SWIFT: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_BIC',"BIC Code: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_NAME',"نام بانک: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_ACCOUNT_HOLDER1',"دارنده حساب: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_IBAN1',"IBAN: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_SWIFT1',"کد SWIFT: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_BIC1'," کد BIC: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_NAME1',"نام بانک: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_ACCOUNT_HOLDER2',"دارنده حساب: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_IBAN2',"IBAN: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_SWIFT2',"کد SWIFT: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_BIC2'," کد BIC: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_NAME2',"نام بانک: ");
jr_define('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_EMAIL_TITLE',"جزئیات پرداخت برای رزرو شما در ");
jr_define('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_EMAIL_HELLO',"عزیز");
jr_define('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_EMAIL_THANKYOU',"از رزرو شما در  متشکریم");
jr_define('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_SENDDEPOSITTO',"برای اطمینان از رزرو خود, لطفا مبلغ سپرده خود را واریز کنید");
jr_define('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_BELOWADDRESS_EMAIL'," به حساب بانکی زیر.");
jr_define('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_BELOWADDRESS'," به حساب بانکی زیر. پس از ارسال این رزرو, یک کپی از اطلاعات حساب بانکی نیز از طریق ایمیل برای شما ارسال خواهد شد.");
jr_define('_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_CONTACTUS1',"اگر سوالی دارید, لطفاً در تماس با ما تردید نکنید. می توانید با ما تماس بگیرید ");
jr_define('_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_CONTACTUS2'," یا به ما ایمیل بزنید در ");
jr_define('_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_CONTACTUS_EMAIL',"اگر سوالی دارید, لطفا با ما تماس بگیرید.");
jr_define('_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_PRINT',"چاپ جزئیات حساب بانکی");
jr_define('_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_SUBMIT',"ارسال");