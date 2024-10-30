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

jr_define ('_JOMRES_AUCTIONHOUSE_TITLE', "Търговска къща");
jr_define ('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTIONTITLE', "Купуване");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTIONTITLE', "Продажба");

jr_define ('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTION_AUCTIONSHOME', "Търгове вкъщи");
jr_define ('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTION_MYBIDS', "Елементи, за които съм наддавал");

jr_define ('_JOMRES_AUCTIONHOUSE_EVERYBODY_MENUOPTION_DASHBOARD', "Търгове със списъци");

jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_DASHBOARD', "Табло за управление на имоти");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_LISTAUCTIONS', "Избройте вашите търгове");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_CREATE_NEW_AUCTION', "Нов търг");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_EDIT_AUCTION', "Редактиране на търг");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_CANCEL_AUCTION', "Отмяна на търг");
jr_define ('_JOMRES_AUCTIONHOUSE_ADMIN_CANCEL_AUCTION', "Прекратяване на търга по -рано");

jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_CREATE_CHOOSEPROPERTY', "Моля, изберете имота, с който искате да свържете този търг.");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_CREATE_INCLUDINGROOMS', "Включвате ли стаи/имота в този търг?");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_MRP', "Моля, изберете стаите, които искате да включите в този търг. Първо изберете датите за резервацията, след което можете да изберете стаите.");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_SRP', "Моля, изберете датите, на които искате да резервирате имота като част от търга.");
jr_define ('_JOMRES_AUCTIONHOUSE_TERMS_LINK', "Общи условия");
jr_define ('_JOMRES_AUCTIONHOUSE_TERMS_TEXT', "Общи условия");

jr_define ('_JOMRES_AUCTIONHOUSE_TERMS_DETAILED', "Подробни условия.");

jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TITLE', "Заглавие на търга");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION', "Описание");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_VALUE', "Стойност на този търг");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_VALUE_INFO', "Моля, въведете стойността на пакета, който предлагате. Той няма да бъде показан на купувачите.");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE', "Резервиране");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE_NOTMET', "Резервът не е изпълнен");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BUYNOW_PRICE', "Купете сега");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DAYSTORUN', "За колко дни трябва да продължи този търг?");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BLACKBOOKING_NOTE', "Резервация на аукционна къща (не отменяйте) за търг:");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TAX_NOTE', "Обърнете внимание, че когато наддавате, фактурата ви ще включва допълнителен данък от");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DISCLAIMER', "Ако щракнете върху бутона Оферта или Купете сега, сключвате правно обвързващ договор за закупуване на артикула или пакета от продавача. Този сайт не носи отговорност за съдържанието, посочено от продавача.") ;


jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TITLE_ERROR', "Грешка, трябва да включите заглавие.");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION_ERROR', "Грешка, трябва да включите описание.");

jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_ACTIVE_AUCTIONS', "Активни търгове");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_FINISHED_AUCTIONS', "Завършени търгове");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_MAXIBID', "Най -висока оферта");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_NOBIDS', "Без оферти");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TIMELEFT', "Оставащо време");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID', "Подайте офертата си");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_PLACED', "Вашата оферта е направена!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_YOURBIDHIGHEST', "Вие печелите този търг!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_OUTBID', "Превъзхождали сте!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_WON', "Поздравления, спечелихте този търг!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_LOST', "За съжаление загубихте този търг.");

jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_ENDED', "Търгът приключи");

jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_NOTLOGGEDIN', "За съжаление не можете да наддавате на този търг, защото не сте влезли в системата.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_ENDED', "За съжаление не можете да наддавате на този търг, защото той е приключил.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_NOTFOUND', "За съжаление, не можете да наддавате на този търг, не можем да намерим този идентификатор на търга.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_TOOLOW', "За съжаление офертата Ви е твърде ниска.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_OWNAUCTION', "Не можете да наддавате на собствен търг.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_EDITPROFILE', "Все още не можете да наддавате на този търг, защото не сте въвели данните си. Моля, кликнете върху връзката по -горе \"Редактиране на акаунта\", за да попълните първо данните за профила си.");

jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_NOTLOGGEDIN', "За съжаление не можете да отмените този търг, защото не сте влезли в системата.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_ALREADYBID', "За съжаление не можете да отмените този търг, защото вече е бил наддаван. Само търгове, които нямат оферти, могат да бъдат отменени.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_ENDED', "За съжаление не можете да отмените този търг, тъй като той вече е приключил.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_NOTYOURS', "За съжаление не можете да отмените този търг, тъй като нямате права за достъп до този търг.");

jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_DAYS', "d");
jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_HOURS', "h");
jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_MINUTES', "m");
jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_SECONDS', "s");

jr_define ('_JOMRES_AUCTIONHOUSE_LISTS', "Вашите списъци за наблюдение");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_COUNT', "Номер в списъка");
jr_define ('_JOMRES_AUCTIONHOUSE_DEFAULTLIST', "Списък за наблюдение");
jr_define ('_JOMRES_AUCTIONHOUSE_ADDTOWATCHLIST_INSTRUCTIONS', "Добавяне към списъка за наблюдение");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_ADD', "Добавяне на списък за наблюдение");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_NEWLIST_NAME', "Въведете името на новия списък");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_SAVENEWLIST', "Запазване на нов списък за наблюдение");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_ADDED_TO_LIST', "Търгът е добавен към списъка");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_NO_LISTS', "Все още нямате списъци за наблюдение. Можете да добавите търг към списъка си за наблюдение, за да създадете първия си списък, или да използвате опцията Добавяне на списък за наблюдение в менюто, за да добавите ръчно списък.");
jr_define ('_JOMRES_AUCTIONHOUSE_LIST_DOESNOTEXIST', "Грешка, този списък за наблюдение не съществува.");

jr_define ('_JOMRES_AUCTIONHOUSE_PROPERTY_DETAILS_AUCTIONINFO', "Този имот участва в нашата аукционна програма и предлага един или повече пакети за търг, моля, вижте списъка по -долу.");
jr_define ('_JOMRES_AUCTIONHOUSE_PROPERTY_DETAILS_MOREINFO', "Информация за");

jr_define ('_JOMRES_AUCTIONHOUSE_INVOICING_COMMISSIONWORD', "Тръжна комисия");
jr_define ('_JOMRES_AUCTIONHOUSE_INVOICING_PREAMBLE', "Търг:");

jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_BIDPLACED_SUBJECT', "Подали сте оферта за търг:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_BIDPLACED_BODY', "Подали сте оферта за търг. Можете да видите търга, като посетите следната връзка:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_OUTBID_SUBJECT', "Вие сте надхвърлили! Търг:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_OUTBID_BODY', "Били сте надхвърлени на търг. Можете да видите търга, като посетите следната връзка:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_SUBJECT', "Спечелихте търг! Търг:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_BODY', "Спечелихте търг. Можете да видите търга, като посетите следната връзка:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_BODY2', "Моля, уверете се, че плащате незабавно на продавача. Вашата фактура е тук:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_SELLER_AUCTION_ENDED_SUBJECT', "Търгът приключи. Търг:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_SELLER_AUCTION_ENDED_BODY', "Този търг приключи. Можете да видите търга тук:");

jr_define ('_JOMRES_AUCTIONHOUSE_BOOKINGNOTE', "Търгът приключи. Данните за победителя следват:");

jr_define ('_JOMRES_SHORTCODES_06000AUCTION_HOUSE', "Показва страницата на аукционната къща.");