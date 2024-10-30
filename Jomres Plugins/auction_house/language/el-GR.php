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

jr_define ('_JOMRES_AUCTIONHOUSE_TITLE', "Auction house");
jr_define ('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTIONTITLE', "Αγορά");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTIONTITLE', "Πωλείται");

jr_define ('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTION_AUCTIONSHOME', "Δημοπρασίες στο σπίτι");
jr_define ('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTION_MYBIDS', "Στοιχεία στα οποία έχω υποβάλει προσφορά");

jr_define ('_JOMRES_AUCTIONHOUSE_EVERYBODY_MENUOPTION_DASHBOARD', "Λίστα δημοπρασιών");

jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_DASHBOARD', "Πίνακας ελέγχου ιδιοτήτων");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_LISTAUCTIONS', "Καταχωρίστε τις δημοπρασίες σας");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_CREATE_NEW_AUCTION', "Νέα δημοπρασία");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_EDIT_AUCTION', "Επεξεργασία δημοπρασίας");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_CANCEL_AUCTION', "Ακύρωση δημοπρασίας");
jr_define ('_JOMRES_AUCTIONHOUSE_ADMIN_CANCEL_AUCTION', "Λήξη πρόωρης δημοπρασίας");

jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_CREATE_CHOOSEPROPERTY', "Επιλέξτε το ακίνητο με το οποίο θέλετε να συσχετίσετε αυτήν τη δημοπρασία.");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_CREATE_INCLUDINGROOMS', "Περιλαμβάνετε τα δωμάτια/το ακίνητο σε αυτήν τη δημοπρασία;");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_MRP', "Επιλέξτε τα δωμάτια που θέλετε να συμπεριλάβετε σε αυτήν τη δημοπρασία. Αρχικά επιλέξτε τις ημερομηνίες για την κράτηση και μετά μπορείτε να επιλέξετε τα δωμάτια.");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_SRP', "Επιλέξτε τις ημερομηνίες που θέλετε να κλείσετε το ακίνητο ως μέρος της δημοπρασίας.");
jr_define ('_JOMRES_AUCTIONHOUSE_TERMS_LINK', "Όροι και προϋποθέσεις");
jr_define ('_JOMRES_AUCTIONHOUSE_TERMS_TEXT', "Όροι και προϋποθέσεις");

jr_define ('_JOMRES_AUCTIONHOUSE_TERMS_DETAILED', "Λεπτομερείς όροι και προϋποθέσεις.");

jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TITLE', "Τίτλος δημοπρασίας");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION', "Περιγραφή");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_VALUE', "Αξία αυτής της δημοπρασίας");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_VALUE_INFO', "Εισαγάγετε την τιμή του πακέτου που προσφέρετε. Δεν θα εμφανίζεται στους αγοραστές.");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE', "Κράτηση");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE_NOTMET', "Η κράτηση δεν εκπληρώθηκε");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BUYNOW_PRICE', "Αγορά τώρα");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DAYSTORUN', "Πόσες ημέρες πρέπει να διαρκέσει αυτή η δημοπρασία;");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BLACKBOOKING_NOTE', "Κράτηση σε οίκο δημοπρασιών (μην ακυρώσετε) για δημοπρασία:");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TAX_NOTE', "Σημειώστε ότι όταν προσφέρετε το τιμολόγιό σας θα περιλαμβάνει επιπλέον φόρο");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DISCLAIMER', "Εάν κάνετε κλικ στο κουμπί Προσφορά ή Αγορά τώρα, συνάπτετε μια νομικά δεσμευτική σύμβαση για την αγορά του προϊόντος ή του πακέτου από τον πωλητή. Αυτός ο ιστότοπος δεν είναι υπεύθυνος για το περιεχόμενο που παρατίθεται από τον πωλητή.");


    jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TITLE_ERROR', "Σφάλμα, πρέπει να συμπεριλάβετε έναν τίτλο.");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION_ERROR', "Σφάλμα, πρέπει να συμπεριλάβετε μια περιγραφή.");

jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_ACTIVE_AUCTIONS', "Ενεργές δημοπρασίες");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_FINISHED_AUCTIONS', "Ολοκληρωμένες δημοπρασίες");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_MAXIBID', "Υψηλότερη προσφορά");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_NOBIDS', "Χωρίς προσφορές");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TIMELEFT', "Απομένει χρόνος");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID', "Τοποθετήστε την προσφορά σας");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_PLACED', "Η προσφορά σας έχει τοποθετηθεί!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_YOURBIDHIGHEST', "Κερδίζετε αυτή τη δημοπρασία!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_OUTBID', "Έχετε υπερβάλει!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_WON', "Συγχαρητήρια, κερδίσατε αυτή τη δημοπρασία!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_LOST', "Συγγνώμη, χάσατε αυτήν τη δημοπρασία.");

jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_ENDED', "Ο πλειστηριασμός ολοκληρώθηκε");

jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_NOTLOGGEDIN', "Λυπούμαστε, δεν μπορείτε να υποβάλετε προσφορά σε αυτήν τη δημοπρασία επειδή δεν είστε συνδεδεμένοι.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_ENDED', "Λυπούμαστε, δεν μπορείτε να υποβάλετε προσφορά σε αυτήν τη δημοπρασία επειδή τελείωσε.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_NOTFOUND', "Λυπούμαστε, δεν μπορείτε να υποβάλετε προσφορά σε αυτήν τη δημοπρασία, δεν μπορούμε να βρούμε αυτό το αναγνωριστικό δημοπρασίας.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_TOOLOW', "Συγγνώμη, η προσφορά σας ήταν πολύ χαμηλή.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_OWNAUCTION', "Δεν μπορείτε να υποβάλετε προσφορά για τη δική σας δημοπρασία.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_EDITPROFILE', "Δεν μπορείτε ακόμη να υποβάλετε προσφορά σε αυτήν τη δημοπρασία επειδή δεν έχετε καταχωρίσει τα στοιχεία σας. Κάντε κλικ στον παραπάνω σύνδεσμο \"Επεξεργασία λογαριασμού\" για να συμπληρώσετε πρώτα τα στοιχεία του λογαριασμού σας.");

jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_NOTLOGGEDIN', "Λυπούμαστε, δεν μπορείτε να ακυρώσετε αυτήν τη δημοπρασία επειδή δεν έχετε συνδεθεί");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_ALREADYBID', "Λυπούμαστε, δεν μπορείτε να ακυρώσετε αυτήν τη δημοπρασία επειδή έχει ήδη υποβληθεί προσφορά. Μόνο οι πλειστηριασμοί που δεν έχουν προσφορές μπορούν να ακυρωθούν.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_ENDED', "Συγγνώμη, δεν μπορείτε να ακυρώσετε αυτήν τη δημοπρασία καθώς έχει ήδη λήξει.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_NOTYOURS', "Λυπούμαστε, δεν μπορείτε να ακυρώσετε αυτήν τη δημοπρασία, καθώς δεν έχετε δικαιώματα πρόσβασης σε αυτήν τη δημοπρασία.");

jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_DAYS', "d");
jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_HOURS', "h");
jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_MINUTES', "m");
jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_SECONDS', "s");

jr_define ('_JOMRES_AUCTIONHOUSE_LISTS', "Οι λίστες παρακολούθησής σας");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_COUNT', "Αριθμός στη λίστα");
jr_define ('_JOMRES_AUCTIONHOUSE_DEFAULTLIST', "Λίστα παρακολούθησης");
jr_define ('_JOMRES_AUCTIONHOUSE_ADDTOWATCHLIST_INSTRUCTIONS', "Προσθήκη στη λίστα παρακολούθησης");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_ADD', "Προσθήκη λίστας παρακολούθησης");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_NEWLIST_NAME', "Εισαγάγετε το νέο όνομα λίστας");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_SAVENEWLIST', "Αποθήκευση νέας λίστας παρακολούθησης");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_ADDED_TO_LIST', "Δημοπρασία προστέθηκε στη λίστα");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_NO_LISTS', "Δεν έχετε ακόμη λίστες παρακολούθησης. Μπορείτε είτε να προσθέσετε μια δημοπρασία στη λίστα παρακολούθησής σας για να δημιουργήσετε την πρώτη σας λίστα, είτε να χρησιμοποιήσετε την επιλογή Προσθήκη λίστας παρακολούθησης στο μενού για να προσθέσετε μη αυτόματα μια λίστα.");
jr_define ('_JOMRES_AUCTIONHOUSE_LIST_DOESNOTEXIST', "Σφάλμα, αυτή η λίστα παρακολούθησης δεν υπάρχει.");

jr_define ('_JOMRES_AUCTIONHOUSE_PROPERTY_DETAILS_AUCTIONINFO', "Αυτό το ακίνητο συμμετέχει στο πρόγραμμα δημοπρασιών μας και προσφέρει ένα ή περισσότερα πακέτα για δημοπρασία, δείτε την παρακάτω λίστα.");
jr_define ('_JOMRES_AUCTIONHOUSE_PROPERTY_DETAILS_MOREINFO', "Πληροφορίες σχετικά");

jr_define ('_JOMRES_AUCTIONHOUSE_INVOICING_COMMISSIONWORD', "Προμήθεια δημοπρασίας");
jr_define ('_JOMRES_AUCTIONHOUSE_INVOICING_PREAMBLE', "Δημοπρασία:");

jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_BIDPLACED_SUBJECT', "Έχετε υποβάλει προσφορά για δημοπρασία:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_BIDPLACED_BODY', "Έχετε υποβάλει προσφορά για δημοπρασία. Μπορείτε να δείτε τη δημοπρασία επισκέπτοντας τον ακόλουθο σύνδεσμο:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_OUTBID_SUBJECT', "Έχετε υπερβεί! Δημοπρασία:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_OUTBID_BODY', "Έχετε υπερβεί σε δημοπρασία. Μπορείτε να δείτε τη δημοπρασία μεταβαίνοντας στον ακόλουθο σύνδεσμο:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_SUBJECT', "Κερδίσατε μια δημοπρασία! Δημοπρασία:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_BODY', "Κερδίσατε μια δημοπρασία. Μπορείτε να δείτε τη δημοπρασία μεταβαίνοντας στον ακόλουθο σύνδεσμο:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_BODY2', "Βεβαιωθείτε ότι πληρώνετε αμέσως τον πωλητή. Το τιμολόγιό σας βρίσκεται εδώ:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_SELLER_AUCTION_ENDED_SUBJECT', "Ο πλειστηριασμός ολοκληρώθηκε. Δημοπρασία:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_SELLER_AUCTION_ENDED_BODY', "Αυτή η δημοπρασία ολοκληρώθηκε. Μπορείτε να δείτε τη δημοπρασία εδώ:");

jr_define ('_JOMRES_AUCTIONHOUSE_BOOKINGNOTE', "Η δημοπρασία ολοκληρώθηκε. Ακολουθούν τα στοιχεία του νικητή:");

jr_define ('_JOMRES_SHORTCODES_06000AUCTION_HOUSE', "Εμφανίζει τη σελίδα του Οίκου Δημοπρασιών.");
