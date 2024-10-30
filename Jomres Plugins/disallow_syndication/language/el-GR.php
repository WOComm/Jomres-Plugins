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
jr_define ('DISALLOW_SYNDICATION_TITLE', "Disallow Syndication");
jr_define('DISALLOW_SYNDICATION_DESCRIPTION','The Jomres.net syndication feature is new functionality designed to share properties between sites although bookings can only be made on the Home server. ');

jr_define ('DISALLOW_SYNDICATION_DESCRIPTION_MORE', "Σκοπός αυτού είναι να καταστήσει δυνατή την εμπιστοσύνη των ιστότοπων στις μηχανές αναζήτησης. Είναι μια δωρεάν λειτουργία, διαθέσιμη σε όλους τους χρήστες του Jomres. Οι κάτοχοι άδειας ενεργού Jomres μπορούν, εάν επιθυμούν να καταργήσουν ιστότοπος από το δίκτυο κοινοπραξίας μέσω αυτής της σελίδας. Το Localhost δεν μπορεί να προστεθεί στο δίκτυο και εάν για οποιονδήποτε λόγο υπάρχει πρόβλημα με τη συνδεσιμότητα, δεν θα μπορείτε να προσθέσετε τον ιστότοπό σας στο δίκτυο. Ελέγξτε τη δοκιμαστική σελίδα συνδεσιμότητας REST API εάν υπάρχουν αμφιβολίες. ");

jr_define ('DISALLOW_SYNDICATION_INSTRUCTIONS_DISALLOW', "Κάντε κλικ σε αυτόν τον σύνδεσμο για να αφαιρέσετε τον ιστότοπό σας από το δίκτυο.");
jr_define ('DISALLOW_SYNDICATION_INSTRUCTIONS_ALLOW', "Κάντε κλικ σε αυτόν τον σύνδεσμο για να προσθέσετε τον ιστότοπό σας στο δίκτυο.");

jr_define ('DISALLOW_SYNDICATION_DISALLOW', "Κατάργηση αυτού του ιστότοπου από το δίκτυο");
jr_define ('DISALLOW_SYNDICATION_ALLOW', "Προσθήκη αυτού του ιστότοπου στο δίκτυο");

jr_define ('DISALLOW_SYNDICATION_INVALID_KEY', "Λυπούμαστε, το κλειδί υποστήριξης δεν είναι έγκυρο ή δεν είναι ενεργό, δεν μπορείτε να αλλάξετε την κατάσταση διανομής αυτής της εγκατάστασης.");