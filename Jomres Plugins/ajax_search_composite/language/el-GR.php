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
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_TITLE',"Ajax Search Composite");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYSTARS',"Αναζήτηση κατά αστέρια");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYPRICES',"Αναζήτηση κατά τιμές");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYFEATURES',"Αναζήτηση βάσει χαρακτηριστικών");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYCOUNTRY',"Αναζήτηση ανά χώρα");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYREGION',"Αναζήτηση ανά περιοχή");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYTOWN',"Αναζήτηση ανά πόλη");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYROOMTYPE',"Αναζήτηση ανά τύπο δωματίου");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYPROPERTYTYPE',"Sαναζήτηση ανά τύπο ιδιοκτησίας");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYGUESTNUMBER',"Αναζήτηση με αριθμούς επισκεπτών");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYDATES',"Αναζήτηση κατά ημερομηνίες");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_TITLE',"Στυλ προτύπου");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_DESC',"Προεπιλογή: Κυρίως απλά πλαίσια ελέγχου ή κουμπιά αν υπάρχουν στο Bootstrap. Modals: Τα κουμπιά ανοίγουν για να επιτρέπουν στους χρήστες να επιλέγουν φίλτρα αναζήτησης. Ακορντεόν σχεδιασμένο για το επάνω μέρος της σελίδας, οι περιοχές σύρονται προς τα κάτω για να αποκαλυφθούν φίλτρα. Πολυεπιλογή: Αναπτυσσόμενο μενού κουμπιών για την αποκάλυψη φίλτρων.");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_BUTTONS',"Κουμπιά (κάθετος προσανατολισμός)");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_MODALS',"Modals (κάθετος προσανατολισμός)");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_ACCORDION',"Ακορντεόν (οριζόντιος προσανατολισμός)");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_MULTISELECT',"Πολυεπιλογή (οριζόντιος προσανατολισμός)");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_SHOWFILTERS',"Εμφάνιση φίλτρων");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_HIDEFILTERS',"Απόκρυψη φίλτρων");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_INFO',"Χρησιμοποιεί το πλαίσιο αναζήτησης ajax. Σας επιτρέπει να τοποθετήσετε μια ενότητα αναζήτησης που προσφέρει αναζήτηση βάσει διαθεσιμότητας, εύρους τιμών, χαρακτηριστικών, τύπου ιδιοκτησίας, τύπου δωματίου, αριθμών επισκεπτών, αστέρων, χώρας, περιοχής και πόλης σε πλαϊνή γραμμή ή επάνω γραμμή. Λάβετε υπόψη ότι το παράδειγμα που εμφανίζεται εδώ δεν θα λειτουργήσει καθώς ορισμένα από τα ορίσματα ακυρώνουν το ένα το άλλο, επιλέξτε ό, τι χρειάζεστε από τα διαθέσιμα ορίσματα (εκτός από το απαιτούμενο όρισμα). Αυτός ο σύντομος κωδικός είναι λίγο διαφορετικός από τους περισσότερους άλλους σύντομους κώδικες, καθώς πρέπει να συνοδεύεται από ειδικό div μετά τη δήλωση σύντομου κώδικα με ένα αναγνωριστικό asamodule_search_results, στο οποίο το πρόσθετο τοποθετεί την επιστρεφόμενη λίστα ιδιοτήτων.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_AJS_PLUGIN',"Απαιτείται. Το επιχείρημα πρέπει να είναι ajax_search_composite");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_STYLE',"Στυλ πεδίων αναζήτησης. Οι επιλογές είναι κουμπιά modals ακορντεόν πολυεπιλογή Εάν δεν οριστεί, το πρόσθετο θα χρησιμοποιήσει την επιλογή που έχει διαμορφωθεί στη Διαμόρφωση τοποθεσίας. Το Multiselect/Accordion είναι ιδανικό για οριζόντια εμφάνιση, οι άλλες δύο επιλογές είναι οι καλύτερες για τοποθέτηση σε πλαϊνή γραμμή.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PROPERTY_DETAILS',"Εμφάνιση της φόρμας αναζήτησης στο εάν η εργασία της σελίδας έχει οριστεί σε viewproperty (σελίδα λεπτομερειών ιδιοτήτων). 0 για Όχι, 1 για Ναι.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_PROPERTY_UIDS',"Το προκαταρκτικό φιλτράρισμα είναι το σημείο όπου επιλέγετε μόνο εκείνες τις ιδιότητες που ικανοποιούν την προϋπόθεση προφίλτρου που μπορούν να εμφανιστούν στα αποτελέσματα αναζήτησης. Προ-φιλτράρισμα κατά ιδιότητα uid, οπότε μόνο ορισμένες ιδιότητες μπορούν να εμφανιστούν στα αποτελέσματα αναζήτησης. Τα επιχειρήματα είναι μια λίστα με uids ιδιοτήτων διαχωρισμένη με κόμμα");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_PTYPES',"Προ-φιλτράρετε κατά τύπο ιδιότητας, επομένως μόνο τα χαρακτηριστικά αυτού/αυτών των τύπων μπορούν να εμφανιστούν στα αποτελέσματα αναζήτησης. Τα επιχειρήματα είναι μια λίστα αναγνωριστικών τύπου ιδιοτήτων χωρισμένη με κόμμα.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_COUNTRY',"Προ-φιλτράρετε κατά κωδικό χώρας, οπότε μόνο τα ακίνητα σε αυτές τις χώρες μπορούν να εμφανίζονται στα αποτελέσματα αναζήτησης. Τα επιχειρήματα είναι ένας κατάλογος κωδικών χωρών ISO χωρισμένος με κόμμα.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_REGION',"Προ-φιλτράρετε κατά όνομα περιοχής, οπότε μόνο τα χαρακτηριστικά σε αυτές τις περιοχές μπορούν να εμφανίζονται στα αποτελέσματα αναζήτησης. Τα ορίσματα είναι μια λίστα με ονόματα περιοχών που διαχωρίζονται με κόμμα και πρέπει να αντιστοιχούν σε περιοχές όπως είναι αποθηκευμένες στη βάση δεδομένων. Εάν ορίσετε τη χώρα σε, για παράδειγμα, Γερμανία (DE), τότε δεν θα εμφανίζονται ιδιοκτησίες από άλλες χώρες με παρόμοια ονόματα περιοχής.");


jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_STARS',"Enable/Disable the Stars input in the form. Be aware that if you have set an option via the Ajax search composite settings tab in Site Configuration to No then setting asc_by_stars in the arguments list will have no effect.");

jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_PRICE',"Enable/Disable the Stars input in the form. Be aware that if you have set an option via the Ajax search composite settings tab in Site Configuration to No then setting asc_by_price in the arguments list will have no effect.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_FEATURES',"Enable/Disable the Property features input in the form. Be aware that if you have set an option via the Ajax search composite settings tab in Site Configuration to No then setting asc_by_features in the arguments list will have no effect.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_COUNTRY',"Enable/Disable the Country input in the form. Be aware that if you have set an option via the Ajax search composite settings tab in Site Configuration to No then setting asc_by_country in the arguments list will have no effect.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_REGION',"Enable/Disable the Region input in the form. Be aware that if you have set an option via the Ajax search composite settings tab in Site Configuration to No then setting asc_by_region in the arguments list will have no effect.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_TOWN',"Enable/Disable the Town input in the form. Be aware that if you have set an option via the Ajax search composite settings tab in Site Configuration to No then setting asc_by_town in the arguments list will have no effect.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_ROOMTYPE',"Enable/Disable the Room type input in the form. Be aware that if you have set an option via the Ajax search composite settings tab in Site Configuration to No then setting asc_by_roomtype in the arguments list will have no effect.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_PROPERTY_TYPE',"Enable/Disable the Property type input in the form. Be aware that if you have set an option via the Ajax search composite settings tab in Site Configuration to No then setting asc_by_propertytype in the arguments list will have no effect.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_GUESTNUMBER',"Enable/Disable the Guest numbers input in the form. Be aware that if you have set an option via the Ajax search composite settings tab in Site Configuration to No then setting asc_by_guestnumber in the arguments list will have no effect.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_DATE',"Enable/Disable the Date input in the form. Be aware that if you have set an option via the Ajax search composite settings tab in Site Configuration to No then setting asc_by_date in the arguments list will have no effect.");

