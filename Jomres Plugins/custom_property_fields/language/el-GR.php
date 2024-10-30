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

jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_TITLE', "Προσαρμοσμένα πεδία ιδιοκτησίας");
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_TITLE_EDIT', "Επεξεργασία προσαρμοσμένου πεδίου ιδιοκτησίας");
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_INFO', "Χρησιμοποιήστε αυτήν τη λειτουργία για να δημιουργήσετε προσαρμοσμένα πεδία πληροφοριών για ιδιότητες. Αυτές οι πληροφορίες προστίθενται από έναν διαχειριστή ιδιοτήτων και εμφανίζονται σε μια νέα καρτέλα στη σελίδα λεπτομερειών ιδιοτήτων.");
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_MANAGER_TITLE', "Άλλες πληροφορίες ιδιοκτησίας");
jr_define ( '_JOMRES_CUSTOM_PROPERTY_FIELDS_INSTRUCTIONS', "Αυτά τα πεδία προσαρμοσμένη ιδιότητα μπορεί να εμφανίζεται σε λεπτομέρειες σε μια καρτέλα διαχωρισμένα, ή στον κατάλογο ιδιοκτησίας. Θα πρέπει να το χέρι /".JOMRES_ROOT_DIRECTORY."/core-plugins/custom_property_fields/templates/tabcontent_01_custom_property_fields.html (for the property details tab) and/or /".JOMRES_ROOT_DIRECTORY."/core-plugins/custom_property_fields/templates/propertylist_custom_property_fields.html (για την καρτέλα Λεπτομέρειες ιδιοκτησίας) ή/και /".JOMRES_ROOT_DIRECTORY."/core-plugins/custom_property_fields/templates/propertylist_custom_property_fields.html (για το απόσπασμα λίστας ιδιοτήτων) για να επιτύχετε τη διάταξη που απαιτείτε. Με τα πεδία που αναφέρονται παραπάνω, μια βασική διάταξη θα μοιάζει με την ακόλουθη, την οποία μπορείτε να χρησιμοποιήσετε ως παράδειγμα από το οποίο μπορείτε να δημιουργήσετε τη δική σας διάταξη. ");