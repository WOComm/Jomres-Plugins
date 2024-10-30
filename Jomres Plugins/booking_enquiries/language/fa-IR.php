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

jr_define ('_JOMRES_BOOKING_INQUIRY_HEMAIL_TITLE', "موضوع ایمیل") ;
jr_define ('_JOMRES_BOOKING_REJECTION_HCONTENT', "متن ایمیل (می توانید این متن را ویرایش کنید تا دلیل رد این رزرو را پر کنید, گزینه های جایگزین و غیره را ارائه دهید)");
jr_define ('_JOMRES_BOOKING_REJECTION_INSTRUCTIONS', "این درخواست رزرو رد و لغو می شود. ایمیل زیر برای مشتری ارسال می شود.");
jr_define ('_JOMRES_BOOKING_REJECTION_IMPOSSIBLE', "این درخواست رزرو را نمی توان رد کرد زیرا قبلاً رد یا تأیید شده است.");
jr_define ('_JOMRES_BOOKING_APPROVAL_HCONTENT', "متن ایمیل (می توانید این متن را برای تکمیل دستورالعمل های پرداخت این رزرو و غیره ویرایش کنید)") ;
jr_define ('_JOMRES_BOOKING_APPROVAL_INSTRUCTIONS', "این درخواست رزرو پذیرفته می شود و در دسترس بودن در تقویم به روز می شود. ایمیل زیر برای مشتری ارسال می شود.");
jr_define ('_JOMRES_BOOKING_APPROVAL_IMPOSSIBLE', "این درخواست رزرو نمی تواند تأیید شود زیرا قبلاً رد یا تأیید شده است.");
jr_define ('_JOMRES_ADMIN_NEWENQUIRY_EMAILNAME', "ایمیل پرسش جدید سرپرست سایت") ;
jr_define ('_JOMRES_ADMIN_NEWENQUIRY_EMAILDESC', "ارسال ایمیل به سرپرست سایت در زمان رزرو در صورتی که رزرو نیاز به تأیید اول داشته باشد و دروازه paypal جهانی فعال باشد") ;
jr_define ('_JOMRES_HOTEL_NEWENQUIRY_EMAILNAME', "ایمیل درخواست هتل جدید") ;
jr_define ('_JOMRES_HOTEL_NEWENQUIRY_EMAILDESC', "در صورتی که رزرو ابتدا نیاز به تأیید داشته باشد, ایمیل هنگام رزرو به هتل ارسال می شود");
jr_define ('_JOMRES_GUEST_NEWENQUIRY_EMAILNAME', "ایمیل درخواست مهمان جدید") ;
jr_define ('_JOMRES_GUEST_NEWENQUIRY_EMAILDESC', "ایمیل برای مهمان در زمان رزرو ارسال می شود اگر رزرو ابتدا نیاز به تأیید دارد") ;
jr_define ('_JOMRES_GUEST_APPROVEENQUIRY_EMAILNAME', "ایمیل تأیید درخواست مهمان") ;
jr_define ('_JOMRES_GUEST_APPROVEENQUIRY_EMAILDESC', "ایمیل به صورت دستی توسط مدیر املاک برای تأیید در دسترس بودن درخواست برای مهمان ارسال می شود") ;
jr_define ('_JOMRES_GUEST_REJECTENQUIRY_EMAILNAME', "ایمیل رد درخواست مهمان") ;
jr_define ('_JOMRES_GUEST_REJECTENQUIRY_EMAILDESC', "ایمیل به صورت دستی توسط مدیر املاک به مهمان ارسال می شود اگر ملک برای جزئیات استعلام موجود نباشد");