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

jr_define('_JOMRES_AUCTIONHOUSE_TITLE',"Auktionshaus");
jr_define('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTIONTITLE',"Kaufen");
jr_define('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTIONTITLE',"Verkaufen");

jr_define('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTION_AUCTIONSHOME',"Auktionshaus");
jr_define('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTION_MYBIDS',"Artikel, auf die ich geboten habe");

jr_define('_JOMRES_AUCTIONHOUSE_EVERYBODY_MENUOPTION_DASHBOARD',"Auktionen auflisten");

jr_define('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_DASHBOARD',"Eigenschafts-Dashboard");
jr_define('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_LISTAUCTIONS',"Listen Sie Ihre Auktionen auf");
jr_define('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_CREATE_NEW_AUCTION',"Neue Auktion");
jr_define('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_EDIT_AUCTION',"Auktion bearbeiten");
jr_define('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_CANCEL_AUCTION',"Auktion abbrechen");
jr_define('_JOMRES_AUCTIONHOUSE_ADMIN_CANCEL_AUCTION',"Auktion vorzeitig beenden");

jr_define('_JOMRES_AUCTIONHOUSE_SELLER_CREATE_CHOOSEPROPERTY',"Bitte wählen Sie die Immobilie aus, mit der Sie diese Auktion verknüpfen möchten.");
jr_define('_JOMRES_AUCTIONHOUSE_SELLER_CREATE_INCLUDINGROOMS',"Nehmen Sie Zimmer/das Objekt in diese Auktion ein?");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_MRP',"Bitte wählen Sie die Zimmer aus, die Sie in diese Auktion aufnehmen möchten. Wählen Sie zuerst die Daten für die Buchung aus, dann können Sie die Zimmer auswählen. ");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_SRP',"Bitte wählen Sie die Daten aus, an denen Sie die Immobilie als Teil der Auktion buchen möchten.");
jr_define('_JOMRES_AUCTIONHOUSE_TERMS_LINK',"Allgemeine Geschäftsbedingungen");
jr_define('_JOMRES_AUCTIONHOUSE_TERMS_TEXT',"Allgemeine Geschäftsbedingungen");

jr_define('_JOMRES_AUCTIONHOUSE_TERMS_DETAILED',"Detaillierte Geschäftsbedingungen.");

jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_TITLE',"Auktionstitel");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION',"Beschreibung");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_VALUE',"Wert dieser Auktion");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_VALUE_INFO',"Bitte geben Sie den Wert des Pakets ein, das Sie anbieten. Es wird Käufern nicht angezeigt.");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE',"Reservieren");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE_NOTMET',"Reserve nicht erfüllt");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BUYNOW_PRICE',"Jetzt kaufen");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_DAYSTORUN',"Wie viele Tage soll diese Auktion laufen?");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BLACKBOOKING_NOTE',"Auktionshausbuchung (nicht stornieren) für Auktion : ");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_TAX_NOTE',"Beachten Sie, dass Ihre Rechnung beim Bieten eine zusätzliche Steuer von ");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_DISCLAIMER',"Wenn Sie auf die Schaltfläche \"Jetzt bieten\" oder \"Jetzt kaufen\" klicken, gehen Sie einen rechtsverbindlichen Vertrag über den Kauf des Artikels oder Pakets vom Verkäufer ein. Diese Website ist nicht für den vom Verkäufer aufgelisteten Inhalt verantwortlich.") ;


jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_TITLE_ERROR',"Fehler, Sie müssen einen Titel angeben.");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION_ERROR',"Fehler, Sie müssen eine Beschreibung eingeben.");

jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_ACTIVE_AUCTIONS',"Aktive Auktionen");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_FINISHED_AUCTIONS',"Abgeschlossene Auktionen");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_MAXIBID',"Höchstes Gebot");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_NOBIDS',"Keine Gebote");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_TIMELEFT',"Verbleibende Zeit");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BID',"Geben Sie Ihr Gebot ab");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BID_PLCED',"Ihr Gebot wurde abgegeben!");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BID_YOURBIDHIGHEST',"Sie gewinnen diese Auktion!");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BID_OUTBID',"Sie wurden überboten!");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BID_WON',"Herzlichen Glückwunsch, Sie haben diese Auktion gewonnen!");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BID_LOST',"Leider haben Sie diese Auktion verloren.");

jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_ENDED',"Auktion ist beendet");

jr_define('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_NOTLOGGEDIN',"Sie können leider nicht auf diese Auktion bieten, da Sie nicht eingeloggt sind.");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_ENDED',"Sie können leider nicht für diese Auktion bieten, da sie beendet ist.");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_NOTFOUND',"Sie können leider nicht für diese Auktion bieten, wir können diese Auktions-ID nicht finden.");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_TOOLOW',"Leider war Ihr Gebot zu niedrig.");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_OWNAUCTION',"Sie können nicht auf Ihre eigene Auktion bieten.");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_EDITPROFILE',"Sie können noch nicht für diese Auktion bieten, da Sie noch keine Daten eingegeben haben. Bitte klicken Sie auf den Link oben 'Konto bearbeiten', um zuerst Ihre Kontodaten einzugeben.");

jr_define('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_NOTLOGGEDIN',"Sie können diese Auktion leider nicht abbrechen, da Sie nicht eingeloggt sind.");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_ALREADYBID',"Sie können diese Auktion leider nicht stornieren, da bereits geboten wurde. Nur Auktionen ohne Gebote können storniert werden.");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_ENDED',"Sie können diese Auktion leider nicht stornieren, da sie bereits beendet ist.");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_NOTYOURS',"Sie können diese Auktion leider nicht stornieren, da Sie keine Zugriffsrechte auf diese Auktion haben.");

jr_define('_JOMRES_AUCTIONHOUSE_COUNTDOWN_DAYS',"d");
jr_define('_JOMRES_AUCTIONHOUSE_COUNTDOWN_HOURS',"h");
jr_define('_JOMRES_AUCTIONHOUSE_COUNTDOWN_MINUTES',"m");
jr_define('_JOMRES_AUCTIONHOUSE_COUNTDOWN_SECONDS',"s");

jr_define('_JOMRES_AUCTIONHOUSE_LISTS',"Ihre Merklisten");
jr_define('_JOMRES_AUCTIONHOUSE_LISTS_COUNT',"Nummer in Liste");
jr_define('_JOMRES_AUCTIONHOUSE_DEFAULTLIST',"Überwachungsliste");
jr_define('_JOMRES_AUCTIONHOUSE_ADDTOWATCHLIST_INSTRUCTIONS',"Zur Merkliste hinzufügen");
jr_define('_JOMRES_AUCTIONHOUSE_LISTS_ADD',"Überwachungsliste hinzufügen");
jr_define('_JOMRES_AUCTIONHOUSE_LISTS_NEWLIST_NAME',"Geben Sie den neuen Listennamen ein");
jr_define('_JOMRES_AUCTIONHOUSE_LISTS_SAVENEWLIST',"Neue Merkliste speichern");
jr_define('_JOMRES_AUCTIONHOUSE_LISTS_ADDED_TO_LIST',"Auktion zur Liste hinzugefügt");
jr_define('_JOMRES_AUCTIONHOUSE_LISTS_NO_LISTS',"Sie haben noch keine Watchlists. Sie können entweder eine Auktion zu Ihrer Watchlist hinzufügen, um Ihre erste Liste zu erstellen, oder die Option Watchlist hinzufügen im Menü verwenden, um manuell eine Liste hinzuzufügen.");
jr_define('_JOMRES_AUCTIONHOUSE_LIST_DOESNOTEXIST',"Fehler, diese Merkliste existiert nicht.");

jr_define('_JOMRES_AUCTIONHOUSE_PROPERTY_DETAILS_AUCTIONINFO',"Dieses Objekt nimmt an unserem Auktionsprogramm teil und bietet ein oder mehrere Pakete zur Auktion an, siehe Liste unten.");
jr_define('_JOMRES_AUCTIONHOUSE_PROPERTY_DETAILS_MOREINFO',"Informationen über ");

jr_define('_JOMRES_AUCTIONHOUSE_INVOICING_COMMISSIONWORD',"Auktionsprovision");
jr_define('_JOMRES_AUCTIONHOUSE_INVOICING_PREAMBLE',"Auktion: ");

jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_BIDPLACED_SUBJECT',"Sie haben ein Gebot für eine Auktion abgegeben: ");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_BIDPLACED_BODY',"Sie haben ein Gebot für eine Auktion abgegeben. Sie können die Auktion unter folgendem Link sehen: ");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_OUTBID_SUBJECT',"Sie wurden überboten! Auktion : ");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_OUTBID_BODY',"Sie wurden bei einer Auktion überboten. Sie können die Auktion unter folgendem Link einsehen: ");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_SUBJECT',"Sie haben eine Auktion gewonnen! Auktion : ");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_BODY',"Sie haben eine Auktion gewonnen. Sie können die Auktion unter folgendem Link einsehen: ");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_BODY2',"Bitte stellen Sie sicher, dass Sie den Verkäufer umgehend bezahlen. Ihre Rechnung finden Sie hier: ");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_SELLER_AUCTION_ENDED_SUBJECT',"Auktion ist beendet. Auktion: ");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_SELLER_AUCTION_ENDED_BODY',"Diese Auktion ist beendet. Sie können die Auktion hier sehen: ");

jr_define('_JOMRES_AUCTIONHOUSE_BOOKINGNOTE',"Auktion abgeschlossen. Details zum Gewinner folgen: ");

jr_define( '_JOMRES_SHORTCODES_06000AUCTION_HOUSE', "Zeigt die Auktionshausseite an." );
