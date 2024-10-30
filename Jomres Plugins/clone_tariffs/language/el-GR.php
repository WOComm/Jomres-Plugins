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
jr_define('_CLONE_TARIFFS_TITLE',"Τιμολόγια κλωνοποίησης");
jr_define('_CLONE_TARIFFS_INFO',"Εδώ μπορείτε να κλωνοποιήσετε ένα τιμολόγιο από μια ιδιότητα προορισμού σε μια ιδιοκτησία προέλευσης. Μόνο οι ιδιότητες που έχετε εξουσιοδότηση στον διαχειριστή θα είναι διαθέσιμες σε εσάς.");
jr_define('_CLONE_TARIFFS_SOURCE',"Ιδιότητα πηγής");
jr_define('_CLONE_TARIFFS_TARIFF_TO_CLONE',"Ταρίφ για κλωνοποίηση");
jr_define('_CLONE_TARIFFS_TARGET',"Ιδιότητα στόχευσης");
jr_define('_CLONE_TARIFFS_TARGET_ROOMTYPE',"Στόχευση τύπου δωματίου ιδιοκτησίας");
jr_define('_CLONE_TARIFFS_TARGET_WARNING',"Εάν η λειτουργία επεξεργασίας τιμολογίου της ιδιότητας στόχου είναι διαφορετική από τη λειτουργία επεξεργασίας τιμολογίου της ιδιότητας Πηγή, τότε όταν πραγματοποιηθεί η κλωνοποίηση, τα αρχικά τιμολόγια της ιδιότητας στόχου θα διαγραφούν και η λειτουργία επεξεργασίας τιμολογίου θα αλλάξει για να αντικατοπτρίζει αυτήν την κατάσταση ρύθμιση ιδιοκτησίας.");
jr_define('_CLONE_TARIFFS_TARGET_DELETE_EXISTING',"Διαγραφή υπαρχόντων τιμολογίων στην ιδιότητα Target;");
jr_define('_CLONE_TARIFFS_TARGET_DELETE_OPTION',"Εάν η λειτουργία επεξεργασίας τιμολογίων της ιδιότητας στόχου είναι ίδια με την ιδιότητα Source, τότε τα υπάρχοντα τιμολόγια δεν θα διαγραφούν. Μπορείτε, ωστόσο, να επιλέξετε να το παρακάμψετε ορίζοντας αυτήν την επιλογή σε Ναι.");