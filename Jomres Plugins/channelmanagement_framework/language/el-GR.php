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

jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHANNEL_ID_NOT_SET', "Το αναγνωριστικό καναλιού δεν έχει οριστεί");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MANAGER_ID_NOT_SET', "Το αναγνωριστικό διαχειριστή δεν έχει οριστεί");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_TITLE', "Channel Manager Framework");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_FRONTEND_TITLE', "Κανάλια");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_INSTALLED_CHANNELS', "Εγκατεστημένα κανάλια");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHOOSE_CHANNEL', "Επιλογή καναλιού");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHOOSE_CHANNEL_CHOOSE_DICTIONARY_TYPE', "Επιλογή τύπου λεξικού");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHANNEL_NONE_INSTALLED', "Σφάλμα, δεν έχουν εγκατασταθεί κανάλια");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_SANITY_CHECKS_TITLE', "Έλεγχοι υγιεινής του Διαχειριστή καναλιού");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_SANITY_CHECKS_DESC', "Επιλέξτε ένα κανάλι. Μόλις το κάνετε αυτό, θα ελέγξουμε τη διαμόρφωσή σας και θα επισημάνουμε τυχόν προβλήματα που μπορεί να χρειαστεί να αντιμετωπίσετε.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_TITLE', "Χαρτογράφηση πόρων");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_DESC', "Διαφορετικά κανάλια έχουν αυτό που είναι γνωστό ως Λεξικά. Αυτοί είναι όροι για να περιγράψουν πόρους όπως τύπους δωματίων, χαρακτηριστικά δωματίων, χαρακτηριστικά ιδιοκτησίας κ.λπ. Πριν χρησιμοποιήσετε το κανάλι, πρέπει να αντιστοιχίσετε διαφορετικούς πόρους Jomres με μεμονωμένα κανάλια πόρους έτσι ώστε οι ιδιότητες που εισάγονται και εξάγονται στα κανάλια να έχουν τους σωστούς πόρους. Σε αυτήν τη σελίδα θα επιλέξετε πρώτα ένα κανάλι. Μόλις τελειώσετε θα μεταφερθείτε σε μια νέα σελίδα όπου θα μπορείτε να επιλέξετε τους τύπους πόρων που θέλετε να αντιστοιχίσετε στους πόρους του καναλιού (για παράδειγμα, χαρακτηριστικά ιδιοκτησίας). Μόλις επιλεγεί ο τύπος πόρου, θα μπορείτε να επιλέξετε τους πόρους Jomres και Channel μεταξύ τους. ");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_SELECT_RESOURCE', "Εδώ πρέπει να επιλέξετε τον πόρο (λεξικό)");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_NO_LOCAL_ITEMS', "Δεν υπάρχουν τοπικά στοιχεία για αυτό το λεξικό, επομένως δεν υπάρχει τίποτα για αντιστοίχιση.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_CHANNEL_DICTIONARY_CLASS_DOESNT_EXIST', "Σφάλμα, το κανάλι δεν διαθέτει κατηγορία λεξικού.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_MAP_ITEM_TYPES_INSTRUCTIONS', "Σε αυτή τη σελίδα θα χρειαστεί να αντιστοιχίσετε τα στοιχεία λεξικού του διαχειριστή καναλιού με αυτά στο Jomres.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_USER_ACCOUNTS', "Λογαριασμοί διαχειριστή καναλιού");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_USER_ACCOUNTS_DESC', "Αποθηκεύστε τις πληροφορίες εξουσιοδότησης για οποιονδήποτε διαχειριστή καναλιού μπορεί να έχετε λογαριασμούς.");
jr_define ("ΤΕΛΟΣ", "Τέλος επεξεργασίας");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_EXTRAS_NOTINSTALLED', "Σφάλμα, η προαιρετική προσθήκη δεν είναι εγκατεστημένη.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_CHANNEL_NAME_NOT_SUPPLIED', "Το όνομα του καναλιού δεν παρέχεται");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_NEW_PROPERTY_OBJECT_NOT_SUPPLIED', "Δεν παρέχεται νέο αντικείμενο ιδιοκτησίας");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_THISJRUSER_OBJECT_NOT_SUPPLIES', "thisJRUser object not provided");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING', "Έναρξη εισαγωγής ακινήτου");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTED', "Επιτυχής εισαγωγή ιδιοκτησίας");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_FAILED', "Αποτυχία εισαγωγής ιδιοκτησίας");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT', "Εισαγωγή όλων των ιδιοτήτων");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_ONE', "Εισαγωγή ιδιοκτησίας");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_UNPUBLISHED_CANNOT_IMPORT',"Δεν είναι δυνατή η εισαγωγή ιδιοτήτων που δεν έχουν επισημανθεί ως δημοσιευμένες/ενεργοποιημένες στον απομακρυσμένο διακομιστή ή ιδιότητες που δεν έχουν στοιχεία αλλαγής αλλαγής.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORTING', "Έναρξη εισαγωγής τιμολογίου");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORTED', "Επιτυχής εισαγωγή τιμολογίου");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORT_FAILED', "Αποτυχία εισαγωγής τιμολογίου");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_SETTINGS_FAILED_VALIDATION', "Δεν ήταν δυνατή η επικύρωση των ρυθμίσεων ιδιοκτησίας, επιχειρήθηκε η εισαγωγή μιας μη αναγνωρισμένης ρύθμισης ιδιοκτησίας");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_PAGETITLE', "Εισαγόμενες ιδιότητες");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_PROPERTY_NAME', "Όνομα ιδιοκτησίας");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_CHANNEL_NAME', "Όνομα καναλιού");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_LOCAL_PROPERTY_UID', "Τοπική ιδιοκτησία uid");
jr_define ("CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_REMOTE_PROPERTY_UID", "Απομακρυσμένη ιδιότητα uid");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_EDIT_REMOTE_PROPERTY', "Επεξεργασία τηλεχειριστηρίου");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_EDIT_LOCAL_PROPERTY', "Προβολή τοπικού");
jr_define ("CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_DELETE_LOCAL_PROPERTY", "Διαγραφή τοπικού");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MENUITEM_DASHBOARD', "Πίνακας ελέγχου");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MENUITEM_ACCOUNTS', "Λογαριασμοί καναλιού");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_THIN_CHANNELS_NOT_INSTALLED', "Δεν υπάρχουν εγκατεστημένες προσθήκες λεπτού καναλιού, δεν μπορείτε να χρησιμοποιήσετε αυτήν τη δυνατότητα ακόμα.");
