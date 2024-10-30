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
jr_define( '_JOMRES_ICAL_EVENT', 'iCal Event' );
jr_define( '_JOMRES_ICAL_FEED', 'iCal Feed' );
jr_define( '_JOMRES_ICAL_FEED_LINK', 'iCal Feed URL' );
jr_define ('_JOMRES_ICAL_FEEDS', 'iCal Feed/s');
jr_define( '_JOMRES_ICAL_FEEDS_DESC', 'Η ροή ή οι ροές iCal μπορούν να εμφανίσουν επερχόμενες κρατήσεις σε ένα απομακρυσμένο ημερολόγιο, συμπεριλαμβανομένης της κινητής συσκευής, του Google Calendar, του Apple Calendar, του Thunderbird, του Outlook και άλλων. Χρησιμοποιήστε την παρακάτω διεύθυνση URL για να εγγραφείτε στις ροές το λογισμικό του ημερολογίου σας.' );
jr_define( '_JOMRES_ICAL_ANON', 'Anonymised iCal Feed URL' );
jr_define( '_JOMRES_ICAL_ALLOW_ANON', 'Να επιτρέπεται η ανώνυμη πρόσβαση σε τροφοδοσίες iCal;' );
jr_define( '_JOMRES_ICAL_ALLOW_ANON_DESC', 'Εάν είναι ενεργοποιημένη αυτή η επιλογή, η ροή συμβάντων iCal θα είναι διαθέσιμη σε όλους, αλλά χωρίς κράτηση ή στοιχεία επισκέπτη.' );
jr_define( '_JOMRES_ICAL_IMPORT', 'ICal Import' );
jr_define( '_JOMRES_ICAL_SELECT', 'Επιλογή αρχείου για εισαγωγή' );
jr_define( '_JOMRES_ICAL_NO_FILE_UPLOADED', 'Σφάλμα, δεν μεταφορτώθηκε αρχείο.' );
jr_define( '_JOMRES_ICAL_IMPORT_INFO', "Κατά την εισαγωγή ενός αρχείου iCal, η ημερομηνία λήξης του συμβάντος πρέπει να είναι η ημερομηνία αναχώρησης του επισκέπτη. Η σύνοψη πρέπει να είναι το όνομα του επισκέπτη. Η περιγραφή του συμβάντος μπορεί να περιέχει όλες τις άλλες λεπτομέρειες." );

jr_define ('_JOMRES_ICAL_ERROR_BOOKING_NUMBER_EXISTS', 'Αυτός ο αριθμός κράτησης υπάρχει ήδη στο σύστημα.');
jr_define ('_JOMRES_ICAL_ERROR_NO_ROOMS', 'Δεν υπάρχουν διαθέσιμα δωμάτια στις επιλεγμένες ημερομηνίες.');
jr_define( '_JOMRES_ICAL_ERROR_NO_EVENTS', 'Δεν βρέθηκαν συμβάντα στο αρχείο ics.' );
jr_define ('_JOMRES_ICAL_SUCCESS', 'Το συμβάν εισήχθη με επιτυχία');
jr_define ('_JOMRES_ICAL_FAILURE', 'Δεν ήταν δυνατή η εισαγωγή συμβάντος');

jr_define( '_JOMRES_ICAL_RESULT_HEADER_SUMMARY', 'Όνομα επισκέπτη' );
jr_define( '_JOMRES_ICAL_RESULT_HEADER_DESCRIPTION', 'Περιγραφή συμβάντος' );
jr_define( '_JOMRES_ICAL_RESULT_HEADER_START', 'Έναρξη' );
jr_define( '_JOMRES_ICAL_RESULT_HEADER_END', 'Τέλος' );
jr_define( '_JOMRES_ICAL_RESULT_HEADER_RESULT', 'Αποτέλεσμα' );
jr_define ('_JOMRES_ICAL_WITHHELD', 'Παρακρατείται');
jr_define( '_JOMRES_ICAL_FEED_SETTINGS_DESC', 'Οι ροές iCal σας μπορούν να εμφανίζουν επερχόμενες κρατήσεις σε ένα απομακρυσμένο ημερολόγιο, συμπεριλαμβανομένης της κινητής συσκευής σας, του Ημερολογίου Google, του Ημερολογίου της Apple, του Thunderbird, του Outlook και άλλων.' );
jr_define( '_JOMRES_ICAL_SYNC_SETTINGS_DESC', 'Αυτή η δυνατότητα σάς επιτρέπει να συγχρονίζετε κρατήσεις από ιστότοπους όπως το Airbnb, το Homeway και άλλους με το Jomres. Θα πρέπει να εισαγάγετε τη διεύθυνση URL ροής iCal της ιδιοκτησίας σας για κάθε ιστότοπο με τον οποίο θέλετε να συγχρονίσετε. κλείστε το ακίνητό σας στην Airbnb, για παράδειγμα, αυτές οι ημερομηνίες θα εμφανίζονται ως αποκλεισμένες (μαύρες κρατήσεις) και σε αυτόν τον ιστότοπο του Jomres, επομένως κανείς δεν μπορεί επίσης να κάνει κράτηση για αυτές τις ημερομηνίες εδώ. Αυτό δεν θα συγχρονίσει τις λεπτομέρειες κράτησης μεταξύ ιστότοπων (όπως στοιχεία επισκεπτών, τιμές, τιμολόγια, κ.λπ.), αλλά είναι ένας ωραίος και εύκολος τρόπος για να αποφύγετε διπλές κρατήσεις συγχρονίζοντας μόνο τη διαθεσιμότητα.');
jr_define( '_JOMRES_ICAL_SYNC_SETTINGS', 'iCal Sync Settings' );
jr_define ('_JOMRES_ICAL_FEED_SETTINGS', 'iCal Feed Settings');
jr_define ('_JOMRES_ICAL_SYNC_URL1', 'Εξωτερική διεύθυνση iCal');
jr_define( '_JOMRES_ICAL_FEED_INCLUDE_ENQUIRIES', 'Συμπεριλαμβάνονται επίσης ερωτήματα κράτησης;' );
jr_define ('_JOMRES_ICAL_FEED_INCLUDE_ENQUIRIES_DESC', 'Εάν είναι ενεργοποιημένο, θα περιλαμβάνει επίσης κρατήσεις που δεν έχουν ακόμη εγκριθεί (εάν είναι ενεργοποιημένη η δυνατότητα έγκρισης κρατήσεων). Η απενεργοποίηση αυτής της επιλογής είναι ένας πολύ καλός τρόπος για να αποκρύψετε κρατήσεις από το ημερολόγιο που ίσως περιμένουν επιβεβαίωση κατάσταση μη εγκεκριμένης/ερώτησης. Εάν οι κρατήσεις δεν απαιτούν έγκριση (η λειτουργία έγκρισης κρατήσεων είναι απενεργοποιημένη), όλες οι κρατήσεις θα εξαχθούν.' ).

jr_define( '_JOMRES_ICAL_REMOTE_FEED', 'iCal Remote Feeds' );
jr_define( '_JOMRES_ICAL_REMOTE_FEED_URL', 'Απομακρυσμένη διεύθυνση URL' );
jr_define( '_JOMRES_ICAL_REMOTE_FEED_ROOM_UID', 'UID δωματίου' );
jr_define( '_JOMRES_ICAL_REMOTE_FEED_ROOM_NAME', 'Όνομα/αριθμός δωματίου' );
jr_define( '_JOMRES_ICAL_REMOTE_INFO', "Επιλέξτε το δωμάτιο που θα επηρεάσει αυτή η ροή και τη διεύθυνση url του απομακρυσμένου ιστότοπου. Κατά την εισαγωγή ενός αρχείου iCal, η ημερομηνία λήξης του συμβάντος πρέπει να είναι η ημερομηνία αναχώρησης του επισκέπτη. Η σύνοψη πρέπει να είναι το όνομα του επισκέπτη. Συμβάν Η περιγραφή μπορεί να περιέχει όλες τις άλλες λεπτομέρειες.").

jr_define( '_JOMRES_ICAL_REMOTE_FEED_SAVED', 'Δημιουργήθηκε Ical απομακρυσμένη τροφοδοσία' );
jr_define( '_JOMRES_ICAL_REMOTE_FEED_DELETED', 'Ical remote feed deleted' );