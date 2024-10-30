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

jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_TITLE', "Απλή κράτηση");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_DESC', "Οι μαύρες κρατήσεις είναι κρατήσεις που καταλαμβάνουν δωμάτιο, δωμάτια ή ιδιοκτησία, αλλά δεν διαθέτουν στοιχεία χρέωσης ή τιμολογίου. Συνήθως χρησιμοποιούνται για να υποδείξουν κρατήσεις που έγιναν μέσω άλλου μέσου (π.χ. τηλέφωνο). Θα δημιουργούσατε μαύρες κρατήσεις για να διασφαλίσετε ότι οι πόροι αυτοί δεν μπορούν να πραγματοποιηθούν στο διαδίκτυο, είτε από τον διαχειριστή της ιδιοκτησίας είτε από έναν επισκέπτη. ");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_SELECTAROOM', "Πρέπει να επιλέξετε τουλάχιστον ένα δωμάτιο.");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_ROOM_BOOKED', "Κράτηση με επιτυχία.");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_ROOM_NOT_BOOKED', "Δεν ήταν δυνατή η κράτηση, καθώς έχει ήδη κάνει κράτηση σε αυτό το χρονικό διάστημα.");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_ROOM_BOOKED_BY', "Δωμάτιο αποκλεισμένο από");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_INSTRUCTIONS_MRP', "Χρησιμοποιήστε αυτό το ημερολόγιο για να μαυρίσετε εύκολα τους πόρους βιβλίων. Επιλέξτε ένα δωμάτιο ή δωμάτια, στη συνέχεια κάντε κλικ στην πρώτη και τελευταία ημερομηνία της μαύρης κράτησης και οι πόροι θα είναι μαύροι. Εάν η μαύρη κράτηση είναι μόνο για μία ημερομηνία και, στη συνέχεια, κάντε κλικ σε αυτήν την ημερομηνία δύο φορές. ");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_INSTRUCTIONS_SRP', "Χρησιμοποιήστε αυτό το ημερολόγιο για να μαυρίσετε εύκολα τους πόρους βιβλίων. Κάντε κλικ στην πρώτη και την τελευταία ημερομηνία της μαύρης κράτησης και οι πόροι θα έχουν μαύρη κράτηση. Εάν η μαύρη κράτηση είναι μόνο για μια ημερομηνία, κάντε κλικ σε αυτήν την ημερομηνία δύο φορές . ");

jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_ADDALL', "Προσθήκη όλων");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_REMOVEALL', "Κατάργηση όλων");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_ITEMSSELCTED', "επιλεγμένα στοιχεία");
