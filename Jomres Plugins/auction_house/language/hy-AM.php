<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.24.0
 *
 * @copyright	2005-2021 Vince Wooll
 * Jomres is currently available for use in all personal or commercial projects under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/
//#################################################################
defined('_JOMRES_INITCHECK') or die('');
//#################################################################

jr_define ('_JOMRES_AUCTIONHOUSE_TITLE', "Աճուրդի տուն");
jr_define ('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTIONTITLE', "Գնումներ");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTIONTITLE', "Վաճառվում է");

jr_define ('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTION_AUCTIONSHOME', "Աճուրդների տուն");
jr_define ('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTION_MYBIDS', "Այն ապրանքները, որոնց վրա ես հայտ եմ ներկայացրել");

jr_define ('_JOMRES_AUCTIONHOUSE_EVERYBODY_MENUOPTION_DASHBOARD', "Աճուրդների ցանկ");

jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_DASHBOARD', "Գույքի վահանակ");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_LISTAUCTIONS', "Նշեք ձեր աճուրդները");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_CREATE_NEW_AUCTION', "Նոր աճուրդ");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_EDIT_AUCTION', "Խմբագրել աճուրդը");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_CANCEL_AUCTION', "Չեղարկել աճուրդը");
jr_define ('_JOMRES_AUCTIONHOUSE_ADMIN_CANCEL_AUCTION', "Աճուրդը շուտ ավարտվի");

jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_CREATE_CHOOSEPROPERTY', "Խնդրում ենք ընտրել այն գույքը, որի հետ ցանկանում եք կապել այս աճուրդը:");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_CREATE_INCLUDINGROOMS', "Դուք այս աճուրդում ներառո՞ւմ եք սենյակներ/գույք");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_MRP', "Խնդրում ենք ընտրել այն սենյակները, որոնք ցանկանում եք ներառել այս աճուրդում: Նախ ընտրեք ամրագրման ամսաթվերը, ապա կարող եք ընտրել սենյակները");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_SRP', "Խնդրում ենք ընտրել ամսաթվերը, որոնց վրա ցանկանում եք գույք ամրագրել աճուրդի շրջանակներում");
jr_define ('_JOMRES_AUCTIONHOUSE_TERMS_LINK', "Պայմաններ և պայմաններ");
jr_define ('_JOMRES_AUCTIONHOUSE_TERMS_TEXT', "Պայմաններ և պայմաններ");

jr_define ('_JOMRES_AUCTIONHOUSE_TERMS_DETAILED', "Մանրամասն պայմաններ և պայմաններ");

jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TITLE', "Աճուրդի անվանումը");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION', "Նկարագրություն");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_VALUE', "Այս աճուրդի արժեքը");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_VALUE_INFO', "Մուտքագրեք առաջարկվող փաթեթի արժեքը: Այն գնորդներին չի ցուցադրվի");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE', "Պահուստ");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE_NOTMET', "Պահուստը չի կատարվել");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BUYNOW_PRICE', "Գնել հիմա");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DAYSTORUN', "Քանի՞ օր պետք է տևի այս աճուրդը");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BLACKBOOKING_NOTE', "Աճուրդի տան ամրագրում (չեղարկեք) աճուրդի համար.");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TAX_NOTE', "Ուշադրություն դարձրեք, որ երբ ձեր հաշիվ -ապրանքագիրն առաջարկելիս ներառելու է լրացուցիչ հարկ");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DISCLAIMER', "Եթե սեղմում եք Գնել կամ Գնել հիմա կոճակը, կնքվում եք վաճառողից ապրանքը կամ փաթեթը ձեռք բերելու իրավաբանորեն պարտավորեցնող պայմանագիր: Այս կայքը պատասխանատվություն չի կրում վաճառողի կողմից նշված բովանդակության համար");


jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TITLE_ERROR', "Սխալ, դուք պետք է ներառեք վերնագիր");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION_ERROR', "Սխալ, դուք պետք է ներառեք նկարագրություն");

jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_ACTIVE_AUCTIONS', "Ակտիվ աճուրդներ");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_FINISHED_AUCTIONS', "Ավարտված աճուրդներ");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_MAXIBID', "Ամենաբարձր հայտը");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_NOBIDS', "Հայտեր չկան");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TIMELEFT', "Մնացել է ժամանակը");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID', "Տեղադրեք ձեր հայտը");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_PLACED', "Ձեր հայտը տեղադրված է");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_YOURBIDHIGHEST', "Դուք հաղթում եք այս աճուրդում");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_OUTBID', "Դուք գերազանցել եք արդյունքը");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_WON', "Շնորհավորում եմ, դու հաղթեցիր այս աճուրդում");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_LOST', "Կներեք, դուք պարտվեցիք այս աճուրդում:");

jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_ENDED', "Աճուրդն ավարտված է");

jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_NOTLOGGEDIN', "Ներեցեք, այս աճուրդում չեք կարող հայտ ներկայացնել, քանի որ մուտք չեք գործել");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_ENDED', "Ներեցեք, դուք չեք կարող հայտ ներկայացնել այս աճուրդի համար, քանի որ այն ավարտվել է");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_NOTFOUND', "Ներեցեք, դուք չեք կարող հայտ ներկայացնել այս աճուրդի համար, մենք չենք կարող գտնել այդ աճուրդի ID- ն");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_TOOLOW', "Ներողություն, ձեր առաջարկը չափազանց ցածր էր");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_OWNAUCTION', "Դուք չեք կարող հայտ ներկայացնել ձեր սեփական աճուրդով");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_EDITPROFILE', "Դուք դեռ չեք կարող հայտ ներկայացնել այս աճուրդի համար, քանի որ ձեր տվյալները չեք մուտքագրել: Խնդրում ենք սեղմել վերևի 'Խմբագրել հաշիվը' հղումը` ձեր հաշվի տվյալները առաջինը լրացնելու համար ");
    
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_NOTLOGGEDIN', "Ներողություն, դուք չեք կարող չեղարկել այս աճուրդը, քանի որ մուտք չեք գործել");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_ALREADYBID', "Կներեք, դուք չեք կարող չեղյալ հայտարարել այս աճուրդը, քանի որ այն արդեն հայտ է ներկայացվել: Կարող են չեղարկվել միայն աճուրդները, որոնք չունեն հայտեր");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_ENDED', "Ներողություն, դուք չեք կարող չեղարկել այս աճուրդը, քանի որ այն արդեն ավարտվել է");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_NOTYOURS', "Ներողություն, դուք չեք կարող չեղյալ հայտարարել այս աճուրդը, քանի որ չունեք այս աճուրդի մուտքի իրավունքներ");

jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_DAYS', "դ");
jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_HOURS', "ժ");
jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_MINUTES', "մ");
jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_SECONDS', "ներ");

jr_define ('_JOMRES_AUCTIONHOUSE_LISTS', "Ձեր դիտացանկերը");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_COUNT', "Համարը ցուցակում");
jr_define ('_JOMRES_AUCTIONHOUSE_DEFAULTLIST', "Watchlist");
jr_define ('_JOMRES_AUCTIONHOUSE_ADDTOWATCHLIST_INSTRUCTIONS', "Ավելացնել դիտման ցուցակին");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_ADD', "Ավելացնել դիտացանկ");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_NEWLIST_NAME', "Մուտքագրեք ցուցակի նոր անունը");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_SAVENEWLIST', "Պահել նոր դիտացանկ");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_ADDED_TO_LIST', "Աճուրդն ավելացվել է ցուցակին");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_NO_LISTS', "Դեռևս չունեք դիտումների ցուցակներ: Դուք կարող եք կամ աճուրդ ավելացնել ձեր դիտացանկին` ձեր առաջին ցուցակը ստեղծելու համար, կամ օգտագործել ցանկում Ավելացնել դիտացանկի տարբերակը `ձեռքով ցուցակ ավելացնելու համար:");
jr_define ('_JOMRES_AUCTIONHOUSE_LIST_DOESNOTEXIST', "Սխալ, այդ դիտումների ցուցակը գոյություն չունի");

jr_define ('_JOMRES_AUCTIONHOUSE_PROPERTY_DETAILS_AUCTIONINFO', "Այս գույքը մասնակցում է մեր աճուրդային ծրագրին և առաջարկում է մեկ կամ մի քանի փաթեթ աճուրդի, տես ստորև բերված ցանկը");
jr_define ('_JOMRES_AUCTIONHOUSE_PROPERTY_DETAILS_MOREINFO', "Տեղեկություն մասին");

jr_define ('_JOMRES_AUCTIONHOUSE_INVOICING_COMMISSIONWORD', "Աճուրդային հանձնաժողով");
jr_define ('_JOMRES_AUCTIONHOUSE_INVOICING_PREAMBLE', "Աճուրդ.");

jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_BIDPLACED_SUBJECT', "Դուք աճուրդի հայտ եք տեղադրել.");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_BIDPLACED_BODY', "Դուք աճուրդի հայտ եք տեղադրել: Աճուրդը կարող եք տեսնել ՝ այցելելով հետևյալ հղումը.");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_OUTBID_SUBJECT', "Դուք գերազանցել եք! Աճուրդ.");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_OUTBID_BODY', "Դուք աճուրդից առաջ եք անցել: Դուք կարող եք տեսնել աճուրդը ՝ այցելելով հետևյալ հղումը.");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_SUBJECT', "Դուք աճուրդ եք շահել: Աճուրդ.");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_BODY', "Դուք աճուրդ եք շահել: Աճուրդը կարող եք տեսնել ՝ այցելելով հետևյալ հղումը.");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_BODY2', "Խնդրում ենք համոզվել, որ վաճառողին անհապաղ վճարում եք: Ձեր հաշիվը այստեղ է.");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_SELLER_AUCTION_ENDED_SUBJECT', "Աճուրդն ավարտվել է: Աճուրդ.");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_SELLER_AUCTION_ENDED_BODY', "Այս աճուրդը ավարտվել է: Աճուրդը կարող եք տեսնել այստեղ.");

jr_define ('_JOMRES_AUCTIONHOUSE_BOOKINGNOTE', "Աճուրդն ավարտված է: Հաղթողի մանրամասները հետևյալն են.");

jr_define ('_JOMRES_SHORTCODES_06000AUCTION_HOUSE', "Disուցադրում է աճուրդի տան էջը");