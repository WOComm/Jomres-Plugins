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
jr_define('_JOMRES_PROPERTY_IMPORT_TITLE',"Εισαγωγή ιδιοκτησίας");
jr_define('_JOMRES_PROPERTY_IMPORT_DESC',"Αυτή η δυνατότητα σάς επιτρέπει να εισάγετε ιδιότητες μέσω αρχείου CSV. Λόγω των διάφορων ελέγχων που απαιτούνται, σας συνιστούμε να περιορίσετε τον αριθμό των ιδιοτήτων που δημιουργούνται σε παρτίδες που δεν υπερβαίνουν τις 50 κάθε φορά. ");
jr_define('_JOMRES_PROPERTY_IMPORT_SELECT',"Παρακαλώ επιλέξτε το αρχείο που θέλετε να ανεβάσετε.");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELDS',"Το αρχείο csv πρέπει να έχει 11 στήλες και τα πεδία δεν πρέπει να περιέχουν html. Όλα τα πεδία είναι υποχρεωτικά.");

jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_NAME',"Όνομα ιδιοκτησίας");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_NAME_TYPE',"Κείμενο");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_ROOMS',"Ο αριθμός των δωματίων (αν πρόκειται για βίλα/εξοχική κατοικία, ανεξάρτητα από τον αριθμό των δωματίων στην πραγματική ιδιοκτησία, τότε θα πρέπει να είναι 1. Μόνο τα ξενοδοχεία/B&B κ.λπ. πρέπει να έχουν περισσότερα από ένα δωμάτια). Ακέραιος αριθμός . ");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_ROOMS_TYPE',"Ακέραιος αριθμός");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_PRICE',"Τιμή ανά διανυκτέρευση χωρίς κωδικούς νομισμάτων.");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_PRICE_TYPE',"Float");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_EMAIL_ADDRESS',"Διεύθυνση ηλεκτρονικού ταχυδρομείου");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_EMAIL_ADDRESS_TYPE',"Κείμενο");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_STREET', "Οδός");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_STREET_TYPE',"Κείμενο");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TOWN', "Πόλη");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TOWN_TYPE', "Κείμενο");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_REGION',"Περιοχή. Αυτό πρέπει να αντιστοιχεί με τα αναγνωριστικά των περιοχών που είναι αποθηκευμένες στον πίνακα Περιοχές");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_REGION_TYPE',"Ακέραιος αριθμός");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_COUNTRY',"Χώρα ιδιοκτησίας. Σύντομος κωδικός, π.χ. GB ή DE, όχι το πλήρες όνομα της χώρας");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_COUNTRY_TYPE', "Κείμενο");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_POSTCODE',"Ταχυδρομικός κώδικας");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_POSTCODE_TYPE',"Κείμενο");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TELEPHONE',"Αριθμός τηλεφώνου");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TELEPHONE_TYPE',"Κείμενο");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_DESCRIPTION',"Η πλήρης περιγραφή της ιδιότητας. Μέγιστος αριθμός 500 χαρακτήρων");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_DESCRIPTION_TYPE',"Κείμενο");

jr_define('_JOMRES_PROPERTY_IMPORT_PROPERTY_TYPE_NOT_SENT',"Σφάλμα, ο τύπος ιδιότητας δεν ορίστηκε.");
jr_define('_JOMRES_PROPERTY_IMPORT_NO_ROOM_TYPES_FOR_PROPERTY_TYPE',"Σφάλμα, δεν έχουμε τύπους δωματίων για αυτόν τον τύπο ιδιοκτησίας. Μπορείτε να το διορθώσετε μεταβαίνοντας στη Δομή τοποθεσίας στην περιοχή διαχειριστή.");
jr_define('_JOMRES_PROPERTY_IMPORT_NO_FILE',"Ωχ, ξεχάσατε να ανεβάσετε ένα αρχείο; ");

jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_TOO_MANY_COLUMNS', "Βρέθηκαν πάρα πολλές στήλες, είτε το αρχείο έχει παραμορφωθεί είτε τα δεδομένα csv δεν έχουν κατασκευαστεί σωστά.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_PROPERTY_NAME_NOT_SET',"Το όνομα της ιδιοκτησίας δεν ορίστηκε.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NUMBER_OF_ROOMS_INCORRECT',"Ο αριθμός των δωματίων δεν ορίστηκε.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_PRICE_NOT_SET',"Η τιμή ανά διανυκτέρευση δεν ορίστηκε.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_COULD_NOT_VALIDATE_EMAIL_ADDRESS',"Δεν ήταν δυνατή η επικύρωση της διεύθυνσης email.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_STREET',"Η οδός δεν ορίστηκε.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_TOWN',"Η πόλη δεν ορίστηκε.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_REGION',"Η περιοχή δεν ορίστηκε.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_COUNTRY',"Η χώρα δεν ορίστηκε.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_POSTCODE',"Ο ταχυδρομικός κώδικας δεν ορίστηκε.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_TELEPHONE',"Το τηλέφωνο δεν έχει ρυθμιστεί.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_DESCRIPTION',"Η περιγραφή δεν ορίστηκε.");

jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_SUCCESS',"Η ιδιότητα εισήχθη με επιτυχία!");

jr_define ('_JOMRES_PROPERTY_IMPORT_FAILED_PROPERTIES', "Καθώς έχετε μία ή περισσότερες ιδιότητες που απέτυχαν στην εισαγωγή, εξάγαμε ακριβώς αυτές τις ιδιότητες στο παρακάτω πεδίο. Μπορείτε να αντιγράψετε αυτές τις ιδιότητες σε excell/open office calc/επιλογή χειριστή αρχείων CSV και επιδιόρθωση τα ζητήματα χωρίς να χρειάζεται να εισαγάγετε ξανά όλα τα ακίνητα.");