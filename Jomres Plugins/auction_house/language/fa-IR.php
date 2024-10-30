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

jr_define ('_JOMRES_AUCTIONHOUSE_TITLE' , "خانه حراج");
jr_define ('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTIONTITLE' , "خرید");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTIONTITLE' , "فروش");

jr_define ('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTION_AUCTIONSHOME' , "حراج خانه");
jr_define ('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTION_MYBIDS' , "مواردی که برای آنها پیشنهاد داده ام");

jr_define ('_JOMRES_AUCTIONHOUSE_EVERYBODY_MENUOPTION_DASHBOARD' , "لیست حراج ها");

jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_DASHBOARD' , "داشبورد ویژگی");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_LISTAUCTIONS' , "حراج های خود را لیست کنید");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_CREATE_NEW_AUCTION' , "حراج جدید");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_EDIT_AUCTION' , "ویرایش حراج");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_CANCEL_AUCTION' , "لغو حراج");
jr_define ('_JOMRES_AUCTIONHOUSE_ADMIN_CANCEL_AUCTION' , "پایان حراج زودهنگام");

jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_CREATE_CHOOSEPROPERTY' , "لطفاً ملکی را انتخاب کنید که می خواهید با آن مزایده مرتبط شود.");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_CREATE_INCLUDINGROOMS' , "آیا اتاق/ملک را در این حراجی قرار می دهید؟");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_MRP' , "لطفاً اتاقهایی را که می خواهید در این حراج قرار گیرند انتخاب کنید. ابتدا تاریخ رزرو را انتخاب کنید , سپس می توانید اتاقها را انتخاب کنید.");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_SRP' , "لطفاً تاریخهایی را که می خواهید ملک را به عنوان بخشی از حراج رزرو کنید انتخاب کنید.");
jr_define ('_JOMRES_AUCTIONHOUSE_TERMS_LINK' , "شرایط و ضوابط");
jr_define ('_JOMRES_AUCTIONHOUSE_TERMS_TEXT' , "شرایط و ضوابط");

jr_define ('_JOMRES_AUCTIONHOUSE_TERMS_DETAILED' , "شرایط و ضوابط دقیق");

jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TITLE' , "عنوان حراج");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION' , "شرح");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_VALUE' , "ارزش این حراج");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_VALUE_INFO' , "لطفاً مقدار بسته ای را که ارائه می دهید وارد کنید. به خریداران نشان داده نمی شود.");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE' , "رزرو");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE_NOTMET' , "رزرو انجام نشد");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BUYNOW_PRICE' , "اکنون بخرید");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DAYSTORUN' , "این حراج چند روز باید اجرا شود؟");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BLACKBOOKING_NOTE' , "رزرو خانه حراج (لغو نشود) برای حراج:");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TAX_NOTE' , "توجه داشته باشید که هنگام پیشنهاد فاکتور شما شامل مالیات اضافی می شود");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DISCLAIMER' , "اگر روی دکمه Bid یا Buy Now کلیک کنید , برای خرید کالا یا بسته از فروشنده یک قرارداد قانونی لازم الاجرا می کنید. این سایت هیچ مسئولیتی در قبال محتوای ذکر شده توسط فروشنده ندارد.");


jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TITLE_ERROR' , "خطا , شما باید عنوان را وارد کنید.");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION_ERROR' , "خطا , باید توضیحات را وارد کنید.");

jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_ACTIVE_AUCTIONS' , "حراج های فعال");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_FINISHED_AUCTIONS' , "حراج های تمام شده");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_MAXIBID' , "بالاترین پیشنهاد");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_NOBIDS' , "بدون پیشنهاد");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TIMELEFT' , "زمان باقی مانده");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID' , "پیشنهاد خود را ثبت کنید");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_PLACED' , "پیشنهاد شما ثبت شده است!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_YOURBIDHIGHEST' , "شما برنده این حراج هستید!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_OUTBID' , "شما بیشتر از قیمت قبلی بوده اید!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_WON' , "تبریک می گویم , شما در این حراج برنده شدید!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_LOST' , "متأسفیم , شما این حراج را باختید.");

jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_ENDED' , "حراج به پایان رسید");

jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_NOTLOGGEDIN' , "متأسفیم , نمی توانید در این حراج پیشنهاد بدهید زیرا وارد سیستم نشده اید.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_ENDED' , "متأسفیم , نمی توانید در این حراج پیشنهاد بدهید زیرا به پایان رسیده است.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_NOTFOUND' , "متأسفیم , شما نمی توانید در این حراج پیشنهاد بدهید , ما نمی توانیم آن شناسه حراج را پیدا کنیم.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_TOOLOW' , "متأسفیم , پیشنهاد شما بسیار کم بود.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_OWNAUCTION' , "شما نمی توانید در مزایده خود مناقصه کنید.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_EDITPROFILE' , "هنوز نمی توانید در این حراج پیشنهاد بدهید زیرا مشخصات خود را وارد نکرده اید. لطفاً برای پر کردن مشخصات حساب خود روی پیوند بالا  ویرایش حساب کلیک کنید.");

jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_NOTLOGGEDIN' , "متأسفیم , نمی توانید این حراج را لغو کنید زیرا وارد سیستم نشده اید.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_ALREADYBID' , "متأسفیم , نمی توانید این حراج را لغو کنید زیرا قبلاً پیشنهاد شده است. فقط مزایده هایی که هیچ پیشنهادی ندارند قابل لغو هستند.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_ENDED' , "متأسفیم , نمی توانید این حراج را لغو کنید زیرا قبلاً به پایان رسیده است.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_NOTYOURS' , "متأسفیم , نمی توانید این حراج را لغو کنید زیرا حقوق دسترسی به این حراج را ندارید.");

jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_DAYS' , "d");
jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_HOURS' , "h");
jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_MINUTES' , "متر");
jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_SECONDS' , "s");

jr_define ('_JOMRES_AUCTIONHOUSE_LISTS' , "لیست های تماشایی شما");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_COUNT' , "شماره در لیست");
jr_define ('_JOMRES_AUCTIONHOUSE_DEFAULTLIST' , "لیست تماشا");
jr_define ('_JOMRES_AUCTIONHOUSE_ADDTOWATCHLIST_INSTRUCTIONS' , "افزودن به لیست تماشا");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_ADD' , "افزودن لیست تماشا");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_NEWLIST_NAME' , "نام لیست جدید را وارد کنید");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_SAVENEWLIST' , "ذخیره لیست تماشای جدید");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_ADDED_TO_LIST' , "حراج به لیست اضافه شد");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_NO_LISTS' , "شما هنوز هیچ لیست تماشا ندارید. برای ایجاد اولین لیست خود می توانید حراج را به لیست تماشا خود اضافه کنید , یا از گزینه افزودن لیست تماشا در منو برای افزودن دستی لیست استفاده کنید.");
jr_define ('_JOMRES_AUCTIONHOUSE_LIST_DOESNOTEXIST' , "خطا , آن لیست تماشا وجود ندارد.");

jr_define ('_JOMRES_AUCTIONHOUSE_PROPERTY_DETAILS_AUCTIONINFO' , "این ملک در برنامه حراج ما شرکت می کند و یک یا چند بسته را برای حراج ارائه می دهد , لطفاً لیست زیر را مشاهده کنید.");
jr_define ('_JOMRES_AUCTIONHOUSE_PROPERTY_DETAILS_MOREINFO' , "اطلاعات در مورد");

jr_define ('_JOMRES_AUCTIONHOUSE_INVOICING_COMMISSIONWORD' , "کمیسیون حراج");
jr_define ('_JOMRES_AUCTIONHOUSE_INVOICING_PREAMBLE' , "حراج:");

jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_BIDPLACED_SUBJECT' , "شما پیشنهاد مزایده داده اید:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_BIDPLACED_BODY' , "شما پیشنهاد مزایده داده اید. با مراجعه به لینک زیر می توانید حراج را مشاهده کنید:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_OUTBID_SUBJECT' , "شما از مزایای قبلی بیشتر شده اید! حراج:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_OUTBID_BODY' , "شما در مزایده پیشی گرفته اید. با مراجعه به پیوند زیر می توانید حراج را مشاهده کنید:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_SUBJECT' , "شما در حراج برنده شده اید! حراج:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_BODY' , "شما در مزایده برنده شده اید. با مراجعه به پیوند زیر می توانید حراج را مشاهده کنید:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_BODY2' , "لطفا اطمینان حاصل کنید که به سرعت به فروشنده پرداخت می کنید. فاکتور شما اینجاست:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_SELLER_AUCTION_ENDED_SUBJECT' , "حراج به پایان رسید. حراج:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_SELLER_AUCTION_ENDED_BODY' , "این حراج به پایان رسید. شما می توانید حراج را در اینجا مشاهده کنید:");

jr_define ('_JOMRES_AUCTIONHOUSE_BOOKINGNOTE' , "حراج به پایان رسید. مشخصات برنده در ادامه آمده است:");

jr_define ('_JOMRES_SHORTCODES_06000AUCTION_HOUSE' , "صفحه خانه حراج را نمایش می دهد.");