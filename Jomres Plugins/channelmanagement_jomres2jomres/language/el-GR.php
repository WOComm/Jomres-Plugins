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

jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_TITLE', "Jomres 2 Jomres Integration");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_TITLE', "Αναγνωριστικό πελάτη γονικού ιστότοπου");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_DESC',"Αναγνωριστικό πελάτη του γονικού ιστότοπου. Στον μητρικό ιστότοπο θα χρειαστείτε ένα μοναδικό αναγνωριστικό πελάτη και μυστικό με όλες τις πρόσθετες δυνατότητες api εγκατεστημένες, το πρόσθετο Channel Management Framework εγκατεστημένο και όταν δημιουργείτε/επεξεργαστείτε το ζευγάρι αναγνωριστικού/μυστικού κλειδιού πελάτη θα πρέπει να του δώσετε πρόσβαση σε όλα τα διαθέσιμα πεδία εφαρμογής.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_TITLE', "Μυστικό πελάτη γονικού ιστότοπου");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_DESC', "Το μυστικό του πελάτη του γονικού ιστότοπου");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENTSITE_TITLE', "Parent url");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENTSITE_DESC', "Το url στον γονικό ιστότοπο Jomres");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_NOT_SET', "Σφάλμα, το αναγνωριστικό πελάτη του ιστότοπου γονέα σας δεν έχει οριστεί. Επισκεφτείτε την καρτέλα Διαμόρφωση ιστότοπου> Λογαριασμοί διαχειριστή καναλιού για να αποθηκεύσετε το αναγνωριστικό πελάτη.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_NOT_SET', "Σφάλμα, το μυστικό του γονικού σας ιστότοπου δεν έχει οριστεί. Επισκεφθείτε την καρτέλα Διαμόρφωση ιστότοπου> Λογαριασμοί διαχειριστή καναλιού για να αποθηκεύσετε το μυστικό σας.");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENT_NOT_SET',"Σφάλμα, η μυστική διεύθυνση URL του ιστότοπού σας γονέα δεν έχει οριστεί. Επισκεφτείτε την καρτέλα Διαμόρφωση ιστότοπου> Λογαριασμοί διαχειριστή καναλιού για να αποθηκεύσετε τη διεύθυνση URL του γονικού σας ιστότοπου.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_NOT_SET_ADMIN_SANITY_CHECK_MESSAGE', "Σφάλμα, το αναγνωριστικό πελάτη δεν έχει οριστεί. Επισκεφτείτε τη Διαμόρφωση ιστότοπου> Καρτέλα Λογαριασμοί διαχειριστή καναλιού για να αποθηκεύσετε το όνομα χρήστη σας.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_NOT_SET_ADMIN_SANITY_CHECK_MESSAGE', "Σφάλμα, το αναγνωριστικό πελάτη δεν έχει οριστεί. Επισκεφτείτε τη Διαμόρφωση ιστότοπου> Καρτέλα Λογαριασμοί καναλιού για να αποθηκεύσετε τον κωδικό πρόσβασής σας.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_TITLE', "Ρύθμιση καναλιού");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_MESSAGE', "Jomres 2 Jomres: Εισαγωγή νέων ιδιοτήτων.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_BUTTON_IMPORT', "IMPORT");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_BUTTON_EXPORT', "EXPORT");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_PROPERTYID_NOTSET', "Το αναγνωριστικό ιδιοκτησίας δεν έχει οριστεί");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET', "Τα αντιστοιχισμένα στοιχεία λεξικού δεν έχουν οριστεί");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_PROPERTYTYPE_NOTFOUND', "Ο τύπος τοπικής ιδιοκτησίας δεν βρέθηκε. Εάν ο τύπος ιδιοκτησίας έχει δημιουργηθεί, βεβαιωθείτε ότι έχετε αντιστοιχίσει τον τύπο ιδιότητας της απομακρυσμένης υπηρεσίας στον τύπο της τοπικής ιδιότητας.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_REMOTEPROPERTYTYPE_NOTFOUND', "Ο τύπος απομακρυσμένης ιδιότητας δεν επιστρέφεται μέσω καναλιού.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_LOCAL_PROPERTYTYPE_NOTFOUND', "Ο τύπος τοπικής ιδιοκτησίας δεν έχει περάσει.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_BOOKING_MODEL_NOT_FOUND', "Δεν ήταν δυνατός ο προσδιορισμός του μοντέλου κράτησης (mrp ή srp).");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_BOOKING_MODEL_NOT_FOUND_IN_PROPERTY_TYPE', "Δεν ήταν δυνατός ο προσδιορισμός του μοντέλου κράτησης (mrp ή srp) μετά την εύρεση αναγνωριστικού τύπου ιδιοκτησίας.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_COUNTRY_CODE_NOT_FOUND', "Δεν ήταν δυνατός ο προσδιορισμός του κωδικού χώρας");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_REGION_ID_NOT_FOUND', "Δεν ήταν δυνατό να προσδιοριστεί το αναγνωριστικό περιοχής");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_VALIDATE_SETTINGS_FAILED', "Δεν ήταν δυνατή η σωστή επικύρωση του πίνακα ρυθμίσεων");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_PTYPES', "Τύποι ιδιοτήτων που δεν αντιστοιχίζονται από διαχειριστή");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_PFEATURES', "Χαρακτηριστικά ιδιοτήτων που δεν αντιστοιχίζονται από διαχειριστή");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_ROOM_TYPES', "Τύποι δωματίων που δεν αντιστοιχίζονται από διαχειριστή");