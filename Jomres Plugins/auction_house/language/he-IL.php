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

jr_define ('_JOMRES_AUCTIONHOUSE_TITLE', "בית מכירות פומביות");
jr_define ('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTIONTITLE', "קונה");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTIONTITLE', "מכירה");

jr_define ('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTION_AUCTIONSHOME', "בית מכירות פומביות");
jr_define ('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTION_MYBIDS', "פריטים שהצעתי עליהם");

jr_define ('_JOMRES_AUCTIONHOUSE_EVERYBODY_MENUOPTION_DASHBOARD', "רשימות מכירות פומביות");

jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_DASHBOARD', "לוח מחוונים של נכסים");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_LISTAUCTIONS', "רשימת המכירות הפומביות שלך");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_CREATE_NEW_AUCTION', "מכירה פומבית חדשה");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_EDIT_AUCTION', "ערוך מכירה פומבית");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_CANCEL_AUCTION', "ביטול מכירה פומבית");
jr_define ('_JOMRES_AUCTIONHOUSE_ADMIN_CANCEL_AUCTION', "סיום המכרז מוקדם");

jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_CREATE_CHOOSEPROPERTY', "אנא בחר את הנכס שאליו ברצונך לשייך את המכירה הפומבית הזו.");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_CREATE_INCLUDINGROOMS', "האם אתה כולל חדרים/הנכס במכירה פומבית זו?");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_MRP', "אנא בחר את החדרים שברצונך לכלול במכירה פומבית זו. תחילה בחר את התאריכים להזמנה ולאחר מכן תוכל לבחור את החדרים.");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_SRP', "אנא בחר את התאריכים שבהם ברצונך להזמין את הנכס כחלק מהמכרז.");
jr_define ('_JOMRES_AUCTIONHOUSE_TERMS_LINK', "תנאים והגבלות");
jr_define ('_JOMRES_AUCTIONHOUSE_TERMS_TEXT', "תנאים והגבלות");

jr_define ('_JOMRES_AUCTIONHOUSE_TERMS_DETAILED', "תנאים והגבלות מפורטים.");

jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TITLE', "Title Auction");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION', "תיאור");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_VALUE', "ערך מכירה פומבית זו");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_VALUE_INFO', "אנא הזן את ערך החבילה שאתה מציע. היא לא תוצג לקונים.");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE', "שמור");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE_NOTMET', "השמורה לא נפגשה");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BUYNOW_PRICE', "קנה עכשיו");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DAYSTORUN', "לכמה ימים אמור לפעול מכירה פומבית זו?");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BLACKBOOKING_NOTE', "הזמנת בית מכירות פומביות (אל תבטל) למכירה פומבית:");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TAX_NOTE', "שים לב שכאשר אתה מציעה החשבונית שלך תכלול מס נוסף של");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DISCLAIMER', "אם תלחץ על הלחצן 'הצעה או קנה עכשיו', אתה מתקשר בחוזה חוקי לרכישת הפריט או החבילה מהמוכר. אתר זה אינו אחראי לתוכן שמופיע על ידי המוכר.") ;


jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TITLE_ERROR', "שגיאה, עליך לכלול כותרת.");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION_ERROR', "שגיאה, עליך לכלול תיאור.");

jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_ACTIVE_AUCTIONS', "מכירות פומביות פעילות");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_FINISHED_AUCTIONS', "מכירות פומביות שהסתיימו");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_MAXIBID', "ההצעה הגבוהה ביותר");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_NOBIDS', "ללא הצעות מחיר");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TIMELEFT', "זמן שנותר");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID', "הגש את הצעת המחיר שלך");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_PLACED', "הצעתך הוצגה!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_YOURBIDHIGHEST', "אתה מנצח במכירה פומבית זו!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_OUTBID', "יצא לך להתעלם!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_WON', "מזל טוב, זכית במכירה הפומבית הזו!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_LOST', "מצטער, הפסדת במכירה הפומבית הזו.");

jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_ENDED', "המכרז הסתיים");

jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_NOTLOGGEDIN', "מצטערים, אינך יכול להציע הצעות מחיר על מכירה פומבית זו מכיוון שאינך מחובר.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_ENDED', "מצטערים, אינך יכול להציע הצעה על מכירה פומבית זו מכיוון שהיא הסתיימה.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_NOTFOUND', "מצטערים, אינך יכול להציע הצעה על מכירה פומבית זו, איננו יכולים למצוא את מזהה המכרז הזה.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_TOOLOW', "מצטערים, הצעתך הייתה נמוכה מדי.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_OWNAUCTION', "אינך יכול להציע הצעה במכירה פומבית משלך.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_EDITPROFILE', "עדיין אינך יכול להציע הצעה על מכירה פומבית זו מכיוון שלא הזנת את פרטיך. אנא לחץ על הקישור שמעל 'ערוך חשבון' כדי למלא את פרטי חשבונך תחילה.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_NOTLOGGEDIN', "מצטערים, אינך יכול לבטל מכירה פומבית זו מכיוון שאינך מחובר.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_ALREADYBID', "מצטערים, אינך יכול לבטל מכירה פומבית זו מכיוון שכבר הוצעה עליה. ניתן לבטל רק מכירות פומביות שאין להן הצעות מחיר.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_ENDED', "מצטערים, אינך יכול לבטל מכירה פומבית זו מכיוון שהיא כבר הסתיימה.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_NOTYOURS', "מצטערים, אינך יכול לבטל מכירה פומבית זו מכיוון שאין לך זכויות גישה למכרז זה.");

jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_DAYS', "d");
jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_HOURS', "h");
jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_MINUTES', "m");
jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_SECONDS', "s");

jr_define ('_JOMRES_AUCTIONHOUSE_LISTS', "רשימות השמירה שלך");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_COUNT', "מספר ברשימה");
jr_define ('_JOMRES_AUCTIONHOUSE_DEFAULTLIST', "רשימת צפייה");
jr_define ('_JOMRES_AUCTIONHOUSE_ADDTOWATCHLIST_INSTRUCTIONS', "הוסף לרשימת המעקב");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_ADD', "הוסף רשימת צפייה");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_NEWLIST_NAME', "הזן את שם הרשימה החדשה");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_SAVENEWLIST', "שמור רשימת צפייה חדשה");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_ADDED_TO_LIST', "מכירה פומבית נוספה לרשימה");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_NO_LISTS', "עדיין אין לך רשימות צפייה. תוכל להוסיף מכירה פומבית לרשימת הצפייה שלך כדי ליצור את הרשימה הראשונה שלך, או להשתמש באפשרות הוסף רשימת צפייה בתפריט כדי להוסיף רשימה ידנית.");
jr_define ('_JOMRES_AUCTIONHOUSE_LIST_DOESNOTEXIST', "שגיאה, רשימת צפייה זו אינה קיימת.");

jr_define ('_JOMRES_AUCTIONHOUSE_PROPERTY_DETAILS_AUCTIONINFO', "נכס זה משתתף בתוכנית המכירות הפומביות שלנו ומציע חבילה אחת או יותר למכירה פומבית, עיין ברשימה להלן.");
jr_define ('_JOMRES_AUCTIONHOUSE_PROPERTY_DETAILS_MOREINFO', "מידע אודות");

jr_define ('_JOMRES_AUCTIONHOUSE_INVOICING_COMMISSIONWORD', "עמלת מכירה פומבית");
jr_define ('_JOMRES_AUCTIONHOUSE_INVOICING_PREAMBLE', "מכירה פומבית:");

jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_BIDPLACED_SUBJECT', "הצעת הצעה למכירה פומבית:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_BIDPLACED_BODY', "השארת הצעה למכירה פומבית. תוכל לראות את המכרז על ידי ביקור בקישור הבא:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_OUTBID_SUBJECT', "הוצעה לך הצעת מחיר!");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_OUTBID_BODY', "הוצעה לך הצעת מחיר על מכירה פומבית. תוכל לראות את המכרז על ידי ביקור בקישור הבא:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_SUBJECT', "זכית במכירה פומבית! מכירה פומבית:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_BODY', "זכית במכירה פומבית. תוכל לראות את המכרז על ידי ביקור בקישור הבא:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_BODY2', "אנא ודא שאתה משלם למוכר באופן מיידי. החשבונית שלך כאן:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_SELLER_AUCTION_ENDED_SUBJECT', "המכרז הסתיים. מכירה פומבית:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_SELLER_AUCTION_ENDED_BODY', "מכירה פומבית זו הסתיימה. תוכל לראות את המכרז כאן:");

jr_define ('_JOMRES_AUCTIONHOUSE_BOOKINGNOTE', "המכרז הושלם. פרטי הזוכה בהמשך:");

jr_define ('_JOMRES_SHORTCODES_06000AUCTION_HOUSE', "מציג את דף בית המכירות הפומביות.");