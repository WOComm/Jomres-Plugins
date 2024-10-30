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
jr_define('_JINTOUR_TITLE',"Διαχείριση περιηγήσεων/δραστηριοτήτων");

jr_define('_JINTOUR_PROFILES_TITLE',"Προφίλ περιήγησης/δραστηριότητας");
jr_define('_JINTOUR_PROFILES_NEW',"Νέο προφίλ περιήγησης/δραστηριότητας");
jr_define ('_JINTOUR_PROFILES_DELETE', "Διαγραφή προφίλ περιήγησης/δραστηριότητας");

jr_define ('_JINTOUR_PROFILE_TITLE', "Τίτλος προφίλ");
jr_define('_JINTOUR_PROFILE_DESCRIPTION',"Περιγραφή");
jr_define('_JINTOUR_PROFILE_DESCRIPTION_INFO',"Εισαγάγετε μια περιγραφή της περιήγησης/δραστηριότητάς σας, συμπεριλαμβανομένου του δρομολογίου της.");
jr_define('_JINTOUR_PROFILE_DAYS_OF_WEEK',"Ημέρες της εβδομάδας");
jr_define('_JINTOUR_PROFILE_DAYS_OF_WEEK_INFO',"");
jr_define('_JINTOUR_PROFILE_PRICE_ADULTS',"Τιμή για ενήλικες");
jr_define ('_JINTOUR_PROFILE_PRICE_KIDS', "Τιμή παιδιού");
jr_define('_JINTOUR_PROFILE_PRICE_KIDS_INFO',"Για να εξαιρέσετε μια επιλογή από την εμφάνιση στη φόρμα κράτησης, αφήστε την τιμή ως 0 (μηδέν)");
jr_define('_JINTOUR_PROFILE_SPACES_ADULTS',"Χώροι για ενήλικες");
jr_define('_JINTOUR_PROFILE_SPACES_KIDS',"Παιδικά κενά");
jr_define('_JINTOUR_PROFILE_SPACES_INFO',"Ο αριθμός των διαθέσιμων θέσεων στην περιήγηση/δραστηριότητα");
jr_define('_JINTOUR_PROFILE_START_DATE',"Έναρξη σεζόν");
jr_define('_JINTOUR_PROFILE_END_DATE',"Τέλος σεζόν");

jr_define ('_JINTOUR_PROFILE_GENERATE_INFO', "Μόλις δημιουργήσετε ένα προφίλ περιοδείας/δραστηριότητας, θα χρειαστεί να δημιουργήσετε περιηγήσεις/δραστηριότητες με βάση τις ρυθμίσεις αυτού του προφίλ. Δημιουργήστε την περιήγηση/δραστηριότητα και, στη συνέχεια, κάντε κλικ στο εικονίδιο με το πράσινο βέλος δίπλα στο προφίλ αυτό Οι ίδιες οι περιηγήσεις/δραστηριότητες. Μόλις δημιουργηθούν οι περιηγήσεις/δραστηριότητες, θα μπορείτε να διαγράψετε μεμονωμένες περιηγήσεις/δραστηριότητες, εάν το επιθυμείτε.").
jr_define('_JINTOUR_PROFILE_GENERATE',"Δημιουργία περιηγήσεων/δραστηριοτήτων");

jr_define ('_JINTOUR_TOUR_TITLE', "Τίτλος δραστηριότητας");
jr_define('_JINTOUR_TOUR_DATE',"Ημερομηνία");
jr_define('_JINTOUR_TOUR_ADULTS',"Ενήλικες");
jr_define('_JINTOUR_TOUR_KIDS',"Παιδιά");
jr_define('_JINTOUR_TOUR_ITINERY',"Δρομολόγιο");

jr_define('_JINTOUR_TOUR_SAVE_AUDIT',"Δημιουργήθηκαν νέες περιηγήσεις");
jr_define('_JINTOUR_TOUR_CANCEL_AUDIT',"Η κράτηση εκδρομής ακυρώθηκε");
jr_define('_JINTOUR_TOUR_SAVE_MESSAGE',"Δημιουργήθηκαν νέες περιηγήσεις");
jr_define('_JINTOUR_TOUR_SPACES_CURRENTLY_AVAILABLE',"Διαθέσιμοι χώροι αυτήν τη στιγμή");

jr_define ('_JINTOUR_TOUR_EMAIL_ADMIN_SUBJECT', "Νέα κράτηση για περιοδεία/αναγνωριστικό πόρου");
jr_define('_JINTOUR_TOUR_EMAIL_ADMIN_MESSAGE',"Έχει πραγματοποιηθεί μια νέα κράτηση για μια περιήγηση/πόρου διαχειριστή. Δείτε τον παρακάτω σύνδεσμο για να δείτε τη σελίδα της περιοχής διαχειριστή αυτής της περιοδείας ");

jr_define('_JINTOUR_TITLE_CONFIG',"Διαμόρφωση ολοκληρωμένων περιηγήσεων Jomres");
jr_define('_JINTOUR_TITLE_WHOLESITE',"Είναι όλη η εγκατάσταση εγκατάσταση Jintour;");
jr_define('_JINTOUR_TITLE_WHOLESITE_DESC',"Εάν το ορίσετε σε Ναι, τότε όλες οι ιδιοκτησίες θα είναι ιδιοκτησίες περιήγησης. Εάν το ορίσετε σε Όχι, τότε όταν δημιουργηθούν νέες ιδιότητες θα μπορείτε να έχετε ιδιότητες τύπου περιήγησης και ξενοδοχείου/διαμερίσματος. ");

jr_define('_JINTOUR_REGPROP_MANAGEMENTPROCESS_TOURS',"Περιηγήσεις");
jr_define ('_JINTOUR_REGPROP_MANAGEMENTPROCESS_TOURS_DESC', "Επιλέξτε την επιλογή περιηγήσεων εάν προσφέρετε κρατήσεις για αντικείμενα που είναι διαθέσιμα σε συγκεκριμένες ημερομηνίες (π.χ. περιηγήσεις, εισιτήρια σε μια συναυλία.)");
jr_define('_JINTOUR_SHOWDEPARTURE',"Εμφάνιση του πεδίου εισαγωγής αναχώρησης;");
jr_define ('_JINTOUR_SHOWDEPARTURE_DESC', "Ορίστε το σε Ναι, εάν θέλετε να εμφανίσετε και ημερομηνία άφιξης και αναχώρησης. Αυτό θα ήταν χρήσιμο εάν προσφέρετε ταξίδια με λεωφορείο, αεροπορικά εισιτήρια κ.λπ., όπου πρέπει να γνωρίζετε εισερχόμενες και εξερχόμενες ημερομηνίες, Η εμφάνιση της ημερομηνίας αναχώρησης σάς επιτρέπει να προσφέρετε πόρους σε πολλές ημερομηνίες, ενώ με τη ρύθμιση που έχει οριστεί σε Όχι, μπορούν να γίνουν δεκτές μόνο κρατήσεις για μία ημερομηνία.").

jr_define('_JINTOUR_PROFILES_TITLE_LIST',"Λίστα περιηγήσεων");