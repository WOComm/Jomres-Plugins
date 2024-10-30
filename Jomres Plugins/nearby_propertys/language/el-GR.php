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
jr_define ('_JRPORTAL_NEARBY_PROPERTYS_TITLE', "Nearby Properties");
jr_define('_JRPORTAL_NEARBY_PROPERTYS_TITLE_FRONTEND',"Κοντινές ιδιότητες ");
jr_define('_JRPORTAL_NEARBY_PROPERTYS_HRADIUS',"Radius ");
jr_define ('_JRPORTAL_NEARBY_PROPERTYS_HLISTLIMIT', "Μέγιστος αριθμός κοντινών ιδιοκτησιών προς εμφάνιση");
jr_define('_JRPORTAL_NEARBY_PROPERTYS_HPTYPE_ENABLED',"Εμφάνιση μόνο ιδιοτήτων με τον ίδιο τύπο ιδιότητας με την ιδιότητα που προβάλλεται αυτήν τη στιγμή; ");
jr_define('_JRPORTAL_NEARBY_PROPERTYS_DISTANCE'," κατά προσέγγιση ");
jr_define ('_JRPORTAL_NEARBY_PROPERTYS_DISTANCE_KM', "km");
jr_define('_JRPORTAL_NEARBY_PROPERTYS_DISTANCE_MILES',"μίλια");
jr_define('_JRPORTAL_NEARBY_PROPERTYS_INSTRUCTIONS',"Πριν χρησιμοποιήσετε αυτήν την προσθήκη, πρέπει να βεβαιωθείτε ότι έχετε εισαγάγει τις σωστές συντεταγμένες γεωγραφικού πλάτους και μήκους για όλες τις ιδιοκτησίες. Δεν είναι απαραίτητο να ενεργοποιήσετε τους Χάρτες Google εάν δεν το θέλετε, αλλά απλώς εισαγάγετε το συντεταγμένες επειδή θα χρησιμοποιηθούν για την αναζήτηση κοντινών ιδιοκτησιών στην επιλεγμένη ακτίνα και τον υπολογισμό της απόστασης από την τρέχουσα ιδιότητα (την ιδιότητα που προβάλλεται αυτήν τη στιγμή).");
jr_define('_JRPORTAL_NEARBY_PROPERTYS_NOTHINGNEARBY',"Δεν υπάρχουν άλλα ακίνητα σε κοντινή απόσταση.");
jr_define('_JRPORTAL_NEARBY_PROPERTYS_NOTHINGNEARBY2'," εντός ");