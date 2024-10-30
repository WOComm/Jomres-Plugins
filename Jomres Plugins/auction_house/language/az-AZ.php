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

jr_define ('_JOMRES_AUCTIONHOUSE_TITLE', "Hərrac evi");
jr_define ('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTIONTITLE', "Alış");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTIONTITLE', "Satış");

jr_define ('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTION_AUCTIONSHOME', "Hərraclar evi");
jr_define ('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTION_MYBIDS', "Təklif etdiyim maddələr");

jr_define ('_JOMRES_AUCTIONHOUSE_EVERYBODY_MENUOPTION_DASHBOARD', "Siyahı hərracları");

jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_DASHBOARD', "Mülkiyyət paneli");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_LISTAUCTIONS', "Hərraclarınızı sadalayın");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_CREATE_NEW_AUCTION', "Yeni hərrac");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_EDIT_AUCTION', "Hərracı redaktə et");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_CANCEL_AUCTION', "Hərracı ləğv et");
jr_define ('_JOMRES_AUCTIONHOUSE_ADMIN_CANCEL_AUCTION', "Hərracın erkən bitməsi");

jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_CREATE_CHOOSEPROPERTY', "Zəhmət olmasa bu hərracı əlaqələndirmək istədiyiniz mülkü seçin.");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_CREATE_INCLUDINGROOMS', "Bu hərracda otaqlar/mülklər daxildirmi?");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_MRP', "Zəhmət olmasa bu hərraca daxil etmək istədiyiniz otaqları seçin. Əvvəlcə sifariş üçün tarixləri seçin, sonra otaqları seçə bilərsiniz.");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_SRP', "Əmlak hərracının bir hissəsi olaraq əmlakı sifariş etmək istədiyiniz tarixləri seçin.");
jr_define ('_JOMRES_AUCTIONHOUSE_TERMS_LINK', "Şərtlər və şərtlər");
jr_define ('_JOMRES_AUCTIONHOUSE_TERMS_TEXT', "Qaydalar və şərtlər");

jr_define ('_JOMRES_AUCTIONHOUSE_TERMS_DETAILED', "Ətraflı şərtlər.");

jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TITLE', "Hərrac Başlığı");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION', "Təsvir");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_VALUE', "Bu hərracın dəyəri");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_VALUE_INFO', "Zəhmət olmasa təklif etdiyiniz paketin dəyərini daxil edin. Alıcılara göstərilməyəcək.");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE', "Rezerv");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE_NOTMET', "Rezerv yerinə yetirilmədi");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BUYNOW_PRICE', "İndi al");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DAYSTORUN', "Bu hərrac neçə gün davam etməlidir?");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BLACKBOOKING_NOTE', "Hərrac üçün hərrac evi sifarişi (ləğv etməyin):");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TAX_NOTE', "Nəzərə alın ki, hesab -fakturanıza əlavə vergi daxil olacaq");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DISCLAIMER', "Təklif et və ya İndi Al düyməsini tıklayırsınızsa, satıcının məhsulu və ya paketi alması üçün hüquqi cəhətdən məcburi bir müqavilə bağlayırsınız. Bu sayt satıcı tərəfindən siyahıya alınan məzmuna görə məsuliyyət daşımır.") ;


jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TITLE_ERROR', "Xəta, bir başlıq daxil etməlisiniz.");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION_ERROR', "Xəta, təsviri daxil etməlisiniz.");

jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_ACTIVE_AUCTIONS', "Aktiv hərraclar");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_FINISHED_AUCTIONS', "Bitmiş hərraclar");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_MAXIBID', "Ən yüksək təklif");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_NOBIDS', "Təklif yoxdur");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TIMELEFT', "Qalan vaxt");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID', "Təklifinizi yerləşdirin");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_PLACED', "Təklifiniz yerləşdirildi!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_YOURBIDHIGHEST', "Bu auksionu qazanırsınız!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_OUTBID', "Mükəmməl oldun!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_WON', "Təbriklər, bu auksionu qazandınız!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_LOST', "Bağışlayın, bu auksionu itirdiniz.");

jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_ENDED', "Hərrac başa çatdı");

jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_NOTLOGGEDIN', "Üzr istəyirik, daxil olmadığınız üçün bu auksionda iştirak edə bilməzsiniz");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_ENDED', "Üzr istəyirik, başa çatdığı üçün bu auksionda iştirak edə bilməzsiniz");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_NOTFOUND', "Üzr istəyirik, bu auksionda iştirak edə bilməzsiniz, həmin hərrac idini tapa bilmirik.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_TOOLOW', "Üzr istəyirik, təklifiniz çox aşağı idi.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_OWNAUCTION', "Öz auksionunuzda təklif verə bilməzsiniz");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_EDITPROFILE', "Məlumatlarınızı daxil etmədiyiniz üçün hələ bu auksionda iştirak edə bilməzsiniz. Əvvəlcə hesab məlumatlarınızı doldurmaq üçün 'Hesabı Düzəldin' yuxarıdakı linki vurun.");

jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_NOTLOGGEDIN', "Üzr istəyirik, daxil olmadığınız üçün bu auksionu ləğv edə bilməzsiniz");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_ALREADYBID', "Üzr istəyirik, bu auksion artıq təklif olunduğu üçün onu ləğv edə bilməzsiniz. Yalnız təklifi olmayan hərraclar ləğv edilə bilər.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_ENDED', "Üzr istəyirik, artıq başa çatdığı üçün bu auksionu ləğv edə bilməzsiniz.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_NOTYOURS', "Üzr istəyirik, bu auksiona giriş hüququnuz olmadığı üçün bu auksionu ləğv edə bilməzsiniz");

jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_DAYS', "d");
jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_HOURS', "h");
jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_MINUTES', "m");
jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_SECONDS', "s");

jr_define ('_JOMRES_AUCTIONHOUSE_LISTS', "İzləmə siyahılarınız");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_COUNT', "Siyahıda sayı");
jr_define ('_JOMRES_AUCTIONHOUSE_DEFAULTLIST', "İzləmə siyahısı");
jr_define ('_JOMRES_AUCTIONHOUSE_ADDTOWATCHLIST_INSTRUCTIONS', "İzləmə siyahısına əlavə et");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_ADD', "İzləmə siyahısı əlavə et");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_NEWLIST_NAME', "Yeni siyahı adını daxil edin");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_SAVENEWLIST', "Yeni izləmə siyahısını saxla");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_ADDED_TO_LIST', "Hərrac siyahıya əlavə edildi");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_NO_LISTS', "Hələ heç bir izləmə siyahınız yoxdur. İlk siyahınızı yaratmaq üçün ya izləmə siyahınıza hərrac əlavə edə bilərsiniz, ya da əl ilə siyahı əlavə etmək üçün menyuda İzləmə Siyahısı Əlavə et seçimini istifadə edə bilərsiniz.");
jr_define ('_JOMRES_AUCTIONHOUSE_LIST_DOESNOTEXIST', "Xəta, bu izləmə siyahısı yoxdur.");

jr_define ('_JOMRES_AUCTIONHOUSE_PROPERTY_DETAILS_AUCTIONINFO', "Bu əmlak auksion proqramımızda iştirak edir və auksion üçün bir və ya daha çox paket təklif edir, zəhmət olmasa aşağıdakı siyahıya baxın.");
jr_define ('_JOMRES_AUCTIONHOUSE_PROPERTY_DETAILS_MOREINFO', "Haqqında məlumat");

jr_define ('_JOMRES_AUCTIONHOUSE_INVOICING_COMMISSIONWORD', "Hərrac komissiyası");
jr_define ('_JOMRES_AUCTIONHOUSE_INVOICING_PREAMBLE', "Hərrac:");

jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_BIDPLACED_SUBJECT', "Hərraca çıxardınız:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_BIDPLACED_BODY', "Hərrac üçün bir təklif verdiniz. Aşağıdakı linkə daxil olaraq hərracı görə bilərsiniz:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_OUTBID_SUBJECT', "Mükəmməl oldunuz! Hərrac:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_OUTBID_BODY', "Bir auksionda üstünlüyünüz var. Aşağıdakı linkə daxil olaraq hərracı görə bilərsiniz:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_SUBJECT', "Hərracda qalib oldunuz! Hərrac:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_BODY', "Hərracda qalib oldunuz. Aşağıdakı linkə daxil olaraq auksionu görə bilərsiniz:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_BODY2', "Zəhmət olmasa satıcıya dərhal pul ödəməyinizə əmin olun. Fakturanız burada:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_SELLER_AUCTION_ENDED_SUBJECT', "Hərrac başa çatdı. Hərrac:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_SELLER_AUCTION_ENDED_BODY', "Bu hərrac başa çatdı. Hərracı burada görə bilərsiniz:");

jr_define ('_JOMRES_AUCTIONHOUSE_BOOKINGNOTE', "Hərrac başa çatdı. Qalibin təfərrüatları aşağıdakılardır:");

jr_define ('_JOMRES_SHORTCODES_06000AUCTION_HOUSE', "Hərrac Evi səhifəsini göstərir.");
