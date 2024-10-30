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

jr_define ('_JOMRES_AUCTIONHOUSE_TITLE' , "دار المزاد");
jr_define ('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTIONTITLE', "شراء");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTIONTITLE', "بيع");

jr_define ('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTION_AUCTIONSHOME' , "الصفحة الرئيسية للمزادات");
jr_define ('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTION_MYBIDS', "العناصر التي لدي مزايدة عليها");

jr_define ('_JOMRES_AUCTIONHOUSE_EVERYBODY_MENUOPTION_DASHBOARD' , "قائمة المزادات");

jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_DASHBOARD', "لوحة معلومات الخاصية");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_LISTAUCTIONS' , "قائمة المزادات الخاصة بك");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_CREATE_NEW_AUCTION' , "مزاد جديد");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_EDIT_AUCTION', "تعديل المزاد");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_CANCEL_AUCTION', "إلغاء المزاد");
jr_define ('_JOMRES_AUCTIONHOUSE_ADMIN_CANCEL_AUCTION', "إنهاء المزاد مبكرًا");

jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_CREATE_CHOOSEPROPERTY' , "الرجاء اختيار العقار الذي تريد ربط هذا المزاد به.");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_CREATE_INCLUDINGROOMS' , "هل تقوم بتضمين الغرف / الممتلكات في هذا المزاد؟");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_MRP' , "يرجى تحديد الغرف التي تريد تضمينها في هذا المزاد. اختر أولاً تواريخ الحجز , ثم يمكنك تحديد الغرف.");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_SRP' , "يرجى اختيار التواريخ التي تريد حجز العقار كجزء من المزاد.");
jr_define ('_JOMRES_AUCTIONHOUSE_TERMS_LINK' , "الشروط والأحكام");
jr_define ('_JOMRES_AUCTIONHOUSE_TERMS_TEXT' , "الشروط والأحكام");

jr_define ('_JOMRES_AUCTIONHOUSE_TERMS_DETAILED' , "البنود والشروط المفصلة.");

jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TITLE' , "عنوان المزاد");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION', "الوصف");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_VALUE', "قيمة هذا المزاد");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_VALUE_INFO' , "الرجاء إدخال قيمة الحزمة التي تقدمها. لن تظهر للمشترين.");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE', "حجز");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE_NOTMET', "لم يتم استيفاء الحجز");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BUYNOW_PRICE', "اشترِ الآن");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DAYSTORUN', "كم عدد الأيام التي يجب أن يستمر فيها هذا المزاد؟");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BLACKBOOKING_NOTE' , "حجز دار المزاد (لا تلغي) للمزاد:");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TAX_NOTE' , "لاحظ أنه عند تقديم عرض للفاتورة ستتضمن ضريبة إضافية بقيمة");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DISCLAIMER' , "إذا نقرت على الزر عرض الأسعار أو الشراء الآن , فأنت تدخل في عقد ملزم قانونًا لشراء العنصر أو الحزمة من البائع. هذا الموقع غير مسؤول عن المحتوى المدرج من قبل البائع.");


jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TITLE_ERROR', "خطأ , يجب عليك تضمين عنوان.");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION_ERROR', "خطأ , يجب تضمين وصف.");

jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_ACTIVE_AUCTIONS', "المزادات النشطة");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_FINISHED_AUCTIONS', "المزادات المنتهية");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_MAXIBID' , "أعلى عرض");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_NOBIDS', "بلا عروض");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TIMELEFT', "الوقت المتبقي");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID', "ضع مزايدتك");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_PLACED' , "تم وضع مزايدتك!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_YOURBIDHIGHEST' , "أنت تربح هذا المزاد!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_OUTBID', "لقد تم المزايدة عليك!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_WON', "تهانينا , لقد فزت بهذا المزاد!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_LOST', "عذرا , لقد فقدت هذا المزاد.");

jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_ENDED' , "انتهى المزاد");

jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_NOTLOGGEDIN', "عذرًا , لا يمكنك المزايدة على هذا المزاد لأنك لم تقم بتسجيل الدخول.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_ENDED', "عذرًا , لا يمكنك المزايدة على هذا المزاد لأنه انتهى.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_NOTFOUND', "عذرًا , لا يمكنك المزايدة على هذا المزاد , لا يمكننا العثور على معرف المزاد.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_TOOLOW', "عذرًا , عرض التسعير الخاص بك كان منخفضًا جدًا.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_OWNAUCTION' , "لا يمكنك المزايدة على المزاد الخاص بك.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_EDITPROFILE', "لا يمكنك المزايدة على هذا المزاد حتى الآن لأنك لم تدخل التفاصيل الخاصة بك. الرجاء النقر فوق الرابط أعلاه تحرير الحساب لملء تفاصيل حسابك أولاً.");

jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_NOTLOGGEDIN', "عذرًا , لا يمكنك إلغاء هذا المزاد لأنك لم تقم بتسجيل الدخول.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_ALREADYBID', "عذرًا , لا يمكنك إلغاء هذا المزاد لأنه قد تم بالفعل تقديم عطاء عليه. فقط المزادات التي ليس لها عطاءات يمكن إلغاؤها.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_ENDED', "عذرًا , لا يمكنك إلغاء هذا المزاد لأنه انتهى بالفعل.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_NOTYOURS', "عذرًا , لا يمكنك إلغاء هذا المزاد لأنك لا تملك حقوق الوصول إلى هذا المزاد.");

jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_DAYS', "d");
jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_HOURS', "h");
jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_MINUTES', "m");
jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_SECONDS', "s");

jr_define ('_JOMRES_AUCTIONHOUSE_LISTS' , "قوائم مراقبتك");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_COUNT' , "رقم في القائمة");
jr_define ('_JOMRES_AUCTIONHOUSE_DEFAULTLIST', "قائمة المراقبة");
jr_define ('_JOMRES_AUCTIONHOUSE_ADDTOWATCHLIST_INSTRUCTIONS', "إضافة إلى قائمة المراقبة");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_ADD', "إضافة قائمة مراقبة");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_NEWLIST_NAME', "أدخل اسم القائمة الجديدة");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_SAVENEWLIST', "حفظ قائمة المراقبة الجديدة");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_ADDED_TO_LIST' , "تمت إضافة المزاد إلى القائمة");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_NO_LISTS' , "ليس لديك أي قوائم مراقبة حتى الآن. يمكنك إما إضافة مزاد إلى قائمة مراقبتك لإنشاء قائمتك الأولى , أو استخدام خيار إضافة قائمة مراقبة في القائمة لإضافة قائمة يدويًا.");
jr_define ('_JOMRES_AUCTIONHOUSE_LIST_DOESNOTEXIST' , "خطأ , قائمة المراقبة هذه غير موجودة.");

jr_define ('_JOMRES_AUCTIONHOUSE_PROPERTY_DETAILS_AUCTIONINFO' , "تشارك هذه المنشأة في برنامج المزاد الخاص بنا وتقدم حزمة واحدة أو أكثر للمزاد , يرجى الاطلاع على القائمة أدناه.");
jr_define ('_JOMRES_AUCTIONHOUSE_PROPERTY_DETAILS_MOREINFO', "معلومات حول");

jr_define ('_JOMRES_AUCTIONHOUSE_INVOICING_COMMISSIONWORD', "عمولة المزاد");
jr_define ('_JOMRES_AUCTIONHOUSE_INVOICING_PREAMBLE', "المزاد:");

jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_BIDPLACED_SUBJECT', "لقد قدمت عرضًا للمزاد:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_BIDPLACED_BODY' , "لقد قدمت عرضًا لمزاد. يمكنك مشاهدة المزاد من خلال زيارة الرابط التالي:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_OUTBID_SUBJECT', "لقد تم المزايدة عليك! المزاد:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_OUTBID_BODY', "لقد تم المزايدة عليك في مزاد. يمكنك مشاهدة المزاد من خلال زيارة الرابط التالي:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_SUBJECT', "لقد فزت بمزاد! مزاد:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_BODY', "لقد فزت بمزاد. يمكنك مشاهدة المزاد من خلال زيارة الرابط التالي:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_BODY2' , "يُرجى التأكد من أنك تدفع للبائع على الفور. فاتورتك هنا:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_SELLER_AUCTION_ENDED_SUBJECT' , "انتهى المزاد. المزاد:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_SELLER_AUCTION_ENDED_BODY', "انتهى هذا المزاد. يمكنك مشاهدة المزاد هنا:");

jr_define ('_JOMRES_AUCTIONHOUSE_BOOKINGNOTE' , "اكتمل المزاد. تفاصيل الفائز تتبع:");

jr_define ('_JOMRES_SHORTCODES_06000AUCTION_HOUSE', "تعرض صفحة دار المزاد.");
