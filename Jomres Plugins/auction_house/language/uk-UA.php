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

jr_define ('_JOMRES_AUCTIONHOUSE_TITLE', "Аукціонний будинок");
jr_define ('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTIONTITLE', "Купівля");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTIONTITLE', "Продаж");

jr_define ('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTION_AUCTIONSHOME', "Аукціони додому");
jr_define ('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTION_MYBIDS', "Елементи, на які я зробив ставку");

jr_define ('_JOMRES_AUCTIONHOUSE_EVERYBODY_MENUOPTION_DASHBOARD', "Аукціони за списками");

jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_DASHBOARD', "Інформаційна панель власності");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_LISTAUCTIONS', "Список ваших аукціонів");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_CREATE_NEW_AUCTION', "Новий аукціон");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_EDIT_AUCTION', "Редагувати аукціон");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_CANCEL_AUCTION', "Скасувати аукціон");
jr_define ('_JOMRES_AUCTIONHOUSE_ADMIN_CANCEL_AUCTION', "Закінчити аукціон достроково");

jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_CREATE_CHOOSEPROPERTY', "Будь ласка, виберіть нерухомість, з якою потрібно пов’язати цей аукціон.");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_CREATE_INCLUDINGROOMS', "Ви включаєте кімнати/майно в цей аукціон?");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_MRP', "Будь ласка, виберіть номери, які ви хочете включити в цей аукціон. Спочатку виберіть дати бронювання, а потім виберіть кімнати.");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_SRP', "Будь ласка, виберіть дати, коли ви хочете забронювати нерухомість у рамках аукціону.");
jr_define ('_JOMRES_AUCTIONHOUSE_TERMS_LINK', "Загальні положення та умови");
jr_define ('_JOMRES_AUCTIONHOUSE_TERMS_TEXT', "Загальні положення та умови");

jr_define ('_JOMRES_AUCTIONHOUSE_TERMS_DETAILED', "Детальні умови та положення.");

jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TITLE', "Назва аукціону");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION', "Опис");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_VALUE', "Вартість цього аукціону");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_VALUE_INFO', "Будь ласка, введіть вартість пакета, який ви пропонуєте. Він не буде показаний покупцям.");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE', "Зарезервувати");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE_NOTMET', "Резерв не виконано");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BUYNOW_PRICE', "Купити зараз");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DAYSTORUN', "Скільки днів повинен тривати цей аукціон?");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BLACKBOOKING_NOTE', "Бронювання аукціонного будинку (не скасовувати) для аукціону:");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TAX_NOTE', "Зверніть увагу, що при наданні ставки ваш рахунок -фактура включатиме додатковий податок у розмірі");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DISCLAIMER', "Якщо натиснути кнопку \"Ставка\" або\" Купити зараз\", ви укладаєте юридично зобов'язуючий договір на придбання товару або пакету у продавця. Цей сайт не несе відповідальності за вміст, зазначений продавцем.") ;


jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TITLE_ERROR', "Помилка, ви повинні включити заголовок.");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION_ERROR', "Помилка, ви повинні включити опис.");

jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_ACTIVE_AUCTIONS', "Активні аукціони");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_FINISHED_AUCTIONS', "Готові аукціони");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_MAXIBID', "Найвища ставка");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_NOBIDS', "Без ставок");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TIMELEFT', "Залишився час");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID', "Зробіть ставку");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_PLACED', "Ваша ставка розміщена!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_YOURBIDHIGHEST', "Ви виграли цей аукціон!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_OUTBID', "Вас перевищили!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_WON', "Вітаємо, ви виграли цей аукціон!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_LOST', "Вибачте, ви програли цей аукціон.");

jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_ENDED', "Аукціон завершено");

jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_NOTLOGGEDIN', "На жаль, ви не можете робити ставки на цьому аукціоні, оскільки ви не авторизовані.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_ENDED', "Вибачте, ви не можете робити ставки на цьому аукціоні, оскільки він завершився.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_NOTFOUND', "Вибачте, ви не можете робити ставки на цьому аукціоні, ми не можемо знайти цей ідентифікатор аукціону.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_TOOLOW', "Вибачте, ваша ставка була занадто низькою.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_OWNAUCTION', "Ви не можете робити ставки на власному аукціоні.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_EDITPROFILE', "Ви ще не можете робити ставки на цьому аукціоні, оскільки ви не ввели свої дані. Натисніть посилання вище \"Редагувати обліковий запис\", щоб заповнити дані свого облікового запису.");

jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_NOTLOGGEDIN', "Вибачте, ви не можете скасувати цей аукціон, оскільки ви не авторизовані.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_ALREADYBID', "Вибачте, але ви не можете скасувати цей аукціон, оскільки він уже був зроблений. Тоді можуть бути скасовані лише аукціони, у яких немає ставок.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_ENDED', "Вибачте, ви не можете скасувати цей аукціон, оскільки він уже завершився.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_NOTYOURS', "На жаль, ви не можете скасувати цей аукціон, оскільки у вас немає прав доступу до цього аукціону.");

jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_DAYS', "d");
jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_HOURS', "h");
jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_MINUTES', "m");
jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_SECONDS', "s");

jr_define ('_JOMRES_AUCTIONHOUSE_LISTS', "Ваші списки перегляду");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_COUNT', "Номер у списку");
jr_define ('_JOMRES_AUCTIONHOUSE_DEFAULTLIST', "Список спостереження");
jr_define ('_JOMRES_AUCTIONHOUSE_ADDTOWATCHLIST_INSTRUCTIONS', "Додати до списку перегляду");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_ADD', "Додати список спостереження");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_NEWLIST_NAME', "Введіть нову назву списку");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_SAVENEWLIST', "Зберегти новий список перегляду");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_ADDED_TO_LIST', "Аукціон додано до списку");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_NO_LISTS', "У вас ще немає списків перегляду. Ви можете або додати аукціон до свого списку спостереження, щоб створити свій перший список, або скористатися опцією Додати список спостереження в меню, щоб додати список вручну.");
jr_define ('_JOMRES_AUCTIONHOUSE_LIST_DOESNOTEXIST', "Помилка, цього списку перегляду не існує.");

jr_define ('_JOMRES_AUCTIONHOUSE_PROPERTY_DETAILS_AUCTIONINFO', "Ця нерухомість бере участь у нашій програмі аукціону та пропонує один або кілька пакетів для аукціону, див. список нижче.");
jr_define ('_JOMRES_AUCTIONHOUSE_PROPERTY_DETAILS_MOREINFO', "Інформація про");

jr_define ('_JOMRES_AUCTIONHOUSE_INVOICING_COMMISSIONWORD', "Аукціонна комісія");
jr_define ('_JOMRES_AUCTIONHOUSE_INVOICING_PREAMBLE', "Аукціон:");

jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_BIDPLACED_SUBJECT', "Ви зробили ставку на аукціон:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_BIDPLACED_BODY', "Ви зробили ставку на аукціон. Переглянути аукціон можна за таким посиланням:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_OUTBID_SUBJECT', "Вас перевищили! Аукціон:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_OUTBID_BODY', "Ви перевищили вартість аукціону. Ви можете переглянути аукціон, перейшовши за таким посиланням:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_SUBJECT', "Ви виграли аукціон! Аукціон:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_BODY', "Ви виграли аукціон. Переглянути аукціон можна за цим посиланням:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_BODY2', "Будь ласка, переконайтеся, що ви негайно сплатили продавцю. Ваш рахунок -фактура тут:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_SELLER_AUCTION_ENDED_SUBJECT', "Аукціон завершився. Аукціон:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_SELLER_AUCTION_ENDED_BODY', "Цей аукціон завершився. Аукціон можна побачити тут:");

jr_define ('_JOMRES_AUCTIONHOUSE_BOOKINGNOTE', "Аукціон завершено. Дані переможця:");

jr_define ('_JOMRES_SHORTCODES_06000AUCTION_HOUSE', "Відображення сторінки Будинку аукціонів.");