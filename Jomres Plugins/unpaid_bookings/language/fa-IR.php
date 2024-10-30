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

jr_define('_JRPORTAL_UNPAID_BOOKINGS_TITLE',"مدیریت رزروهای بدون پرداخت");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_DELETEORCANCEL',"رزروهای موقت (بدون پرداخت) را لغو یا حذف کنید؟ ");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_NR_DAYS_TITLE',"الفر چند روز از زمان رزرو؟ ");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_INSTRUCTIONS',"این افزونه به طور خودکار در پس‌زمینه اجرا می‌شود و همه رزروهای موقتی را که به‌عنوان پولی علامت‌گذاری نشده‌اند در فاصله زمانی دلخواه شما حذف یا لغو می‌کند. این زمانی مفید است که رزروهایی را می‌پذیرید که با روش‌های پرداخت آفلاین پرداخت می‌شوند (سیمی) انتقال, چک) اگر رزرو ظرف X روز از زمان انجام رزرو پرداخت نشود, رزرو حذف یا لغو می‌شود و تقویم تاریخ‌های رزرو شده را در دسترس نشان می‌دهد, بنابراین شخص دیگری می‌تواند آن روزها را رزرو کند. هنگامی که رزرو حذف یا لغو می شود, هم شما و هم مهمان از طریق ایمیل اعلان دریافت می کنید. اگر رزرو را لغو کنید, رزرو و فاکتور آن به عنوان لغو شده علامت گذاری می شود و از پایگاه داده حذف نمی شود. اگر بخواهید آن را حذف کنید, رزرو و فاکتور آن از پایگاه داده حذف خواهند شد.");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_EMAIL_TITLE',"رزرو لغو شد");
jr_define('_JOMRES_EMAIL_CANCEL_BOOKING_MSGBODY1',"رزرو شما به‌طور خودکار به دلیل پرداخت نشدن مبلغ واریز شده لغو شده است. این دیگر رزرو معتبری نیست. اگر می‌خواهید دوباره رزرو کنید, لطفاً از وب‌سایت ما دیدن کنید و رزرو را دوباره انجام دهید. جزئیات رزرو لغو شده.");
jr_define('_JOMRES_EMAIL_CANCEL_BOOKING_MSGBODY2',"اگر احساس می کنید اشتباهاً این اعلان را دریافت کرده اید, لطفاً در تماس با ما تردید نکنید.");