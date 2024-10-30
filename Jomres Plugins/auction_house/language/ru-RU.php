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

jr_define ('_JOMRES_AUCTIONHOUSE_TITLE', "Аукционный дом");
jr_define ('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTIONTITLE', "Покупка");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTIONTITLE', "Продажа");

jr_define ('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTION_AUCTIONSHOME', "Главная страница аукционов");
jr_define ('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTION_MYBIDS', "Предметы, на которые я сделал ставку");

jr_define ('_JOMRES_AUCTIONHOUSE_EVERYBODY_MENUOPTION_DASHBOARD', "Список аукционов");

jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_DASHBOARD', "Панель свойств");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_LISTAUCTIONS', "Список ваших аукционов");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_CREATE_NEW_AUCTION', "Новый аукцион");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_EDIT_AUCTION', "Редактировать аукцион");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_CANCEL_AUCTION', "Отменить аукцион");
jr_define ('_JOMRES_AUCTIONHOUSE_ADMIN_CANCEL_AUCTION', "Завершить аукцион досрочно");

jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_CREATE_CHOOSEPROPERTY', "Выберите свойство, с которым вы хотите связать этот аукцион.");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_CREATE_INCLUDINGROOMS', "Вы включаете комнаты / недвижимость в этот аукцион?");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_MRP', "Пожалуйста, выберите комнаты, которые вы хотите включить в этот аукцион. Сначала выберите даты для бронирования, затем вы можете выбрать комнаты.");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_SRP', "Пожалуйста, выберите даты, когда вы хотите зарезервировать недвижимость как часть аукциона.");
jr_define ('_JOMRES_AUCTIONHOUSE_TERMS_LINK', "Положения и условия");
jr_define ('_JOMRES_AUCTIONHOUSE_TERMS_TEXT', "Положения и условия");

jr_define ('_JOMRES_AUCTIONHOUSE_TERMS_DETAILED', "Подробные условия.");

jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TITLE', "Название аукциона");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION', "Описание");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_VALUE', "Стоимость этого аукциона");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_VALUE_INFO', "Пожалуйста, введите стоимость пакета, который вы предлагаете. Он не будет показан покупателям.");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE', "Резерв");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE_NOTMET', "Резерв не выполнен");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BUYNOW_PRICE', "Купить сейчас");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DAYSTORUN', "Сколько дней должен проводиться этот аукцион?");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BLACKBOOKING_NOTE', "Бронирование аукционного дома (не отменять) для аукциона:");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TAX_NOTE', "Обратите внимание, что когда вы делаете ставку, ваш счет будет включать дополнительный налог в размере");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DISCLAIMER', "Если вы нажмете кнопку \"Сделать ставку \"или\" Купить сейчас\", вы заключите юридически обязывающий договор на покупку товара или пакета у продавца. Этот сайт не несет ответственности за содержание, указанное продавцом");


jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TITLE_ERROR', "Ошибка, вы должны включить заголовок.");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION_ERROR', "Ошибка, вы должны включить описание.");

jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_ACTIVE_AUCTIONS', "Активные аукционы");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_FINISHED_AUCTIONS', "Завершенные аукционы");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_MAXIBID', "Наивысшая ставка");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_NOBIDS', "Нет ставок");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TIMELEFT', "Время осталось");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID', "Сделайте ставку");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_PLACED', "Ваша ставка сделана!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_YOURBIDHIGHEST', "Вы выигрываете этот аукцион!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_OUTBID', "Ваша ставка была перебита!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_WON', "Поздравляем, вы выиграли этот аукцион!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_LOST', "Извините, вы проиграли этот аукцион.");

jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_ENDED', "Аукцион завершен");

jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_NOTLOGGEDIN', "К сожалению, вы не можете делать ставки на этом аукционе, потому что вы не вошли в систему.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_ENDED', "К сожалению, вы не можете делать ставки на этом аукционе, потому что он завершился.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_NOTFOUND', "К сожалению, вы не можете делать ставки на этом аукционе, мы не можем найти этот идентификатор аукциона.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_TOOLOW', "К сожалению, ваша ставка была слишком низкой.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_OWNAUCTION', "Вы не можете делать ставки на вашем собственном аукционе.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_EDITPROFILE', "Вы еще не можете делать ставки на этом аукционе, потому что не ввели свои данные. Пожалуйста, нажмите ссылку выше \"Редактировать учетную запись\", чтобы сначала заполнить данные своей учетной записи.");

jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_NOTLOGGEDIN', "Извините, вы не можете отменить этот аукцион, потому что вы не вошли в систему.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_ALREADYBID', "Извините, вы не можете отменить этот аукцион, потому что на нем уже была сделана ставка. Только аукционы, для которых нет ставок, могут быть отменены.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_ENDED', "Извините, вы не можете отменить этот аукцион, так как он уже завершился.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_NOTYOURS', "Извините, вы не можете отменить этот аукцион, так как у вас нет прав доступа к этому аукциону.");

jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_DAYS', "д");
jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_HOURS', "ч");
jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_MINUTES', "м");
jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_SECONDS', "s");

jr_define ('_JOMRES_AUCTIONHOUSE_LISTS', "Ваши списки наблюдения");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_COUNT', "Номер в списке");
jr_define ('_JOMRES_AUCTIONHOUSE_DEFAULTLIST', "Список наблюдения");
jr_define ('_JOMRES_AUCTIONHOUSE_ADDTOWATCHLIST_INSTRUCTIONS', "Добавить в список наблюдения");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_ADD', "Добавить список наблюдения");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_NEWLIST_NAME', "Введите имя нового списка");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_SAVENEWLIST', "Сохранить новый список наблюдения");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_ADDED_TO_LIST', "Аукцион добавлен в список");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_NO_LISTS', "У вас еще нет списков наблюдения. Вы можете добавить аукцион в свой список наблюдения, чтобы создать свой первый список, или использовать опцию Добавить список наблюдения в меню, чтобы добавить список вручную.");
jr_define ('_JOMRES_AUCTIONHOUSE_LIST_DOESNOTEXIST', "Ошибка, этот список наблюдения не существует.");

jr_define ('_JOMRES_AUCTIONHOUSE_PROPERTY_DETAILS_AUCTIONINFO', "Этот объект недвижимости участвует в нашей программе аукционов и предлагает один или несколько пакетов для аукциона, см. список ниже.");
jr_define ('_JOMRES_AUCTIONHOUSE_PROPERTY_DETAILS_MOREINFO', "Информация о");

jr_define ('_JOMRES_AUCTIONHOUSE_INVOICING_COMMISSIONWORD', "Аукционная комиссия");
jr_define ('_JOMRES_AUCTIONHOUSE_INVOICING_PREAMBLE', "Аукцион:");

jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_BIDPLACED_SUBJECT', "Вы сделали ставку на аукционе:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_BIDPLACED_BODY', "Вы разместили ставку на аукционе. Вы можете увидеть аукцион, перейдя по следующей ссылке:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_OUTBID_SUBJECT', "Ваша ставка была перебита! Аукцион:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_OUTBID_BODY', "Ваша ставка была перебита на аукционе. Вы можете увидеть аукцион, перейдя по следующей ссылке:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_SUBJECT', "Вы выиграли аукцион! Аукцион:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_BODY', "Вы выиграли аукцион. Вы можете увидеть аукцион, перейдя по следующей ссылке:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_BODY2', "Пожалуйста, убедитесь, что вы платите продавцу вовремя. Ваш счет находится здесь:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_SELLER_AUCTION_ENDED_SUBJECT', "Аукцион завершен. Аукцион:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_SELLER_AUCTION_ENDED_BODY', "Этот аукцион завершен. Вы можете увидеть аукцион здесь:");

jr_define ('_JOMRES_AUCTIONHOUSE_BOOKINGNOTE', "Аукцион завершен. Информация о победителе приводится ниже:");

jr_define ('_JOMRES_SHORTCODES_06000AUCTION_HOUSE', "Отображает страницу аукционного дома.");

