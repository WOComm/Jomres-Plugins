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

jr_define('_JOMRES_AUCTIONHOUSE_TITLE',"Dom aukcyjny");
jr_define('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTIONTITLE',"Zakupy");
jr_define('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTIONTITLE',"Sprzedaż");

jr_define('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTION_AUCTIONSHOME',"Dom aukcyjny");
jr_define('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTION_MYBIDS',"Przedmioty licytowane");

jr_define('_JOMRES_AUCTIONHOUSE_EVERYBODY_MENUOPTION_DASHBOARD',"Wyświetl aukcje");

jr_define('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_DASHBOARD',"Panel usługi");
jr_define('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_LISTAUCTIONS',"Wymień swoje aukcje");
jr_define('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_CREATE_NEW_AUCTION',"Nowa aukcja");
jr_define('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_EDIT_AUCTION',"Edytuj aukcję");
jr_define('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_CANCEL_AUCTION',"Anuluj aukcję");
jr_define('_JOMRES_AUCTIONHOUSE_ADMIN_CANCEL_AUCTION',"Zakończ aukcję wcześniej");

jr_define('_JOMRES_AUCTIONHOUSE_SELLER_CREATE_CHOOSEPROPERTY',"Wybierz właściwość, z którą chcesz powiązać tę aukcję.");
jr_define('_JOMRES_AUCTIONHOUSE_SELLER_CREATE_INCLUDINGROOMS',"Czy uwzględniasz pokoje/nieruchomość w tej aukcji?");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_MRP',"Wybierz pokoje, które chcesz uwzględnić w tej aukcji. Najpierw wybierz daty rezerwacji, a następnie wybierz pokoje. ");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_SRP',"Wybierz daty, w których chcesz zarezerwować nieruchomość w ramach aukcji.");
jr_define('_JOMRES_AUCTIONHOUSE_TERMS_LINK',"Regulamin");
jr_define('_JOMRES_AUCTIONHOUSE_TERMS_TEXT',"Regulamin");

jr_define('_JOMRES_AUCTIONHOUSE_TERMS_DETAILED',"Szczegółowe warunki.");

jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_TITLE',"Tytuł aukcji");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION',"Opis");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_VALUE',"Wartość tej aukcji");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_VALUE_INFO',"Wprowadź wartość pakietu, który oferujesz. Nie będzie pokazywana kupującym.");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE',"Rezerwa");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE_NOTMET',"Rezerwa nie spełniona");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BUYNOW_PRICE',"Kup teraz");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_DAYSTORUN',"Ile dni ma trwać ta aukcja?");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BLACKBOOKING_NOTE',"Rezerwacja domu aukcyjnego (nie anuluj) na aukcję : ");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_TAX_NOTE',"Pamiętaj, że podczas licytacji faktura będzie zawierać dodatkowy podatek w wysokości ");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_DISCLAIMER',"Jeśli klikniesz przycisk Licytuj lub Kup teraz, zawierasz prawnie wiążącą umowę zakupu przedmiotu lub pakietu od sprzedającego. Ta witryna nie ponosi odpowiedzialności za treści podane przez sprzedającego.") ;


jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_TITLE_ERROR',"Błąd, musisz podać tytuł.");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION_ERROR',"Błąd, musisz dołączyć opis.");

jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_ACTIVE_AUCTIONS',"Aktywne aukcje");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_FINISHED_AUCTIONS',"Zakończone aukcje");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_MAXIBID',"Najwyższa oferta");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_NOBIDS',"Brak ofert");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_TIMELEFT',"Pozostały czas");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BID',"Złóż ofertę");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BID_PLACED',"Twoja oferta została złożona!");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BID_YOURBIDHIGHEST',"Wygrywasz tę aukcję!");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BID_OUTBID',"Zostałeś przebity!");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BID_WON',"Gratulacje, wygrałeś tę aukcję!");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BID_LOST',"Przepraszamy, przegrałeś tę aukcję.");

jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_ENDED',"Aukcja zakończona");

jr_define('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_NOTLOGGEDIN',"Niestety nie możesz licytować w tej aukcji, ponieważ nie jesteś zalogowany.");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_ENDED',"Niestety nie możesz licytować w tej aukcji, ponieważ się zakończyła.");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_NOTFOUND',"Niestety nie możesz licytować w tej aukcji, nie możemy znaleźć tego identyfikatora aukcji.");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_TOOLOW',"Przepraszamy, Twoja oferta była za niska.");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_OWNAUCTION',"Nie możesz licytować we własnej aukcji.");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_EDITPROFILE',"Nie możesz jeszcze licytować w tej aukcji, ponieważ nie wprowadziłeś swoich danych. Kliknij link powyżej 'Edytuj konto', aby najpierw wypełnić dane konta.");

jr_define('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_NOTLOGGEDIN',"Niestety nie możesz anulować tej aukcji, ponieważ nie jesteś zalogowany.");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_ALREADYBID',"Niestety nie możesz anulować tej aukcji, ponieważ została już licytowana. Tylko aukcje, które nie mają ofert, mogą zostać anulowane.");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_ENDED',"Niestety nie możesz anulować tej aukcji, ponieważ już się zakończyła.");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_NOTYOURS',"Niestety nie możesz anulować tej aukcji, ponieważ nie masz do niej praw dostępu.");

jr_define('_JOMRES_AUCTIONHOUSE_COUNTDOWN_DAYS',"d");
jr_define('_JOMRES_AUCTIONHOUSE_COUNTDOWN_HOURS',"h");
jr_define('_JOMRES_AUCTIONHOUSE_COUNTDOWN_MINUTES',"m");
jr_define('_JOMRES_AUCTIONHOUSE_COUNTDOWN_SECONDS',"s");

jr_define('_JOMRES_AUCTIONHOUSE_LISTS',"Twoje listy obserwowanych");
jr_define('_JOMRES_AUCTIONHOUSE_LISTS_COUNT',"Numer na liście");
jr_define('_JOMRES_AUCTIONHOUSE_DEFAULTLIST',"Lista obserwowanych");
jr_define('_JOMRES_AUCTIONHOUSE_ADDTOWATCHLIST_INSTRUCTIONS',"Dodaj do listy obserwowanych");
jr_define('_JOMRES_AUCTIONHOUSE_LISTS_ADD',"Dodaj listę obserwowanych");
jr_define('_JOMRES_AUCTIONHOUSE_LISTS_NEWLIST_NAME',"Wprowadź nową nazwę listy");
jr_define('_JOMRES_AUCTIONHOUSE_LISTS_SAVENEWLIST',"Zapisz nową listę obserwowanych");
jr_define('_JOMRES_AUCTIONHOUSE_LISTS_ADDED_TO_LIST',"Aukcja dodana do listy");
jr_define('_JOMRES_AUCTIONHOUSE_LISTS_NO_LISTS',"Nie masz jeszcze żadnych list obserwowanych. Możesz dodać aukcję do swojej listy obserwowanych, aby utworzyć pierwszą listę, lub użyć opcji Dodaj listę obserwowanych w menu, aby ręcznie dodać listę.");
jr_define('_JOMRES_AUCTIONHOUSE_LIST_DOESNOTEXIST',"Błąd, ta lista obserwowanych nie istnieje.");

jr_define('_JOMRES_AUCTIONHOUSE_PROPERTY_DETAILS_AUCTIONINFO',"Ta nieruchomość uczestniczy w naszym programie aukcyjnym i oferuje jeden lub więcej pakietów na aukcję, zobacz poniższą listę.");
jr_define('_JOMRES_AUCTIONHOUSE_PROPERTY_DETAILS_MOREINFO',"Informacje o ");

jr_define('_JOMRES_AUCTIONHOUSE_INVOICING_COMMISSIONWORD',"Prowizja aukcji");
jr_define('_JOMRES_AUCTIONHOUSE_INVOICING_PREAMBLE',"Aukcja: ");

jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_BIDPLACED_SUBJECT',"Złożyłeś ofertę na aukcji: ");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_BIDPLACED_BODY',"Złożyłeś ofertę w aukcji. Możesz zobaczyć aukcję, klikając poniższy link: ");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_OUTBID_SUBJECT',"Zostałeś przebity! Aukcja: ");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_OUTBID_BODY',"Zostałeś przebity w aukcji. Możesz zobaczyć aukcję, klikając poniższy link: ");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_SUBJECT',"Wygrałeś aukcję! Aukcja : ");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_BODY',"Wygrałeś aukcję. Możesz zobaczyć aukcję odwiedzając następujący link: ");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_BODY2',"Upewnij się, że niezwłocznie zapłacisz sprzedawcy. Twoja faktura jest tutaj: ");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_SELLER_AUCTION_ENDED_SUBJECT',"Aukcja zakończona. Aukcja : ");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_SELLER_AUCTION_ENDED_BODY',"Ta aukcja się zakończyła. Możesz zobaczyć aukcję tutaj: ");

jr_define('_JOMRES_AUCTIONHOUSE_BOOKINGNOTE',"Aukcja zakończona. Szczegóły zwycięzcy są następujące: ");

jr_define( '_JOMRES_SHORTCODES_06000AUCTION_HOUSE', "Wyświetla stronę domu aukcyjnego." );
