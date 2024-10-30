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

jr_define ('_OAUTH_SCOPE_CHANNEL_MANAGEMENT', "Διαχείριση καναλιών");
jr_define ('_OAUTH_SCOPE_CHANNEL_MANAGEMENT_DESC', "Ο πελάτης μπορεί να εκτελέσει δραστηριότητες διαχείρισης καναλιού. Σημειώστε, αυτό δίνει στον πελάτη σημαντική δύναμη στο σύστημα να τροποποιεί τους λογαριασμούς και τις ιδιότητες σας.");

jr_define ('_OAUTH_SCOPE_CHANNEL_MANAGEMENT_CLEANING_PRICE', "Καθαρισμός");

jr_define ('_CMF_CANCELLED_BOOKING', "Ο διαχειριστής καναλιού ακύρωσε την κράτηση");

jr_define ('_CMF_CLEANING_STRING', "Καθαρισμός"); // Μην το αλλάξετε αν έχετε ήδη εισαγάγει ιδιότητες. Τα ακίνητα με τέλη καθαριότητας έχουν επιπλέον με αυτό το όνομα
jr_define ('_CMF_SECURITY_STRING', "Κατάθεση εγγύησης"); // Μην το αλλάξετε αν έχετε ήδη εισαγάγει ιδιότητες. Τα ακίνητα με καταθέσεις ασφαλείας έχουν ένα πρόσθετο με αυτό το όνομα


jr_define ('_CMF_API_PRIVACY', "Απόρρητο API");
jr_define ('_CMF_API_PRIVACY_ON', "Privacy on");
jr_define ('_CMF_API_PRIVACY_OFF', "Privacy off");

jr_define ('_CMF_API_PRIVACY_DESC', "Οι πληροφορίες μιας ιδιότητας μπορούν να προβληθούν μόνο από το κανάλι που την δημιούργησε. Για παράδειγμα, εάν έχετε δώσει διαφορετικά ζεύγη κλειδιών API τόσο στο κανάλι Α όσο και στο κανάλι Β, οι πληροφορίες μιας ιδιότητας που δημιουργείται από το κανάλι Α δεν μπορούν να είναι ορατός από το κανάλι Β ... εκτός εάν απενεργοποιήσετε το απόρρητο API για να επιτρέψετε σε όλα τα κανάλια να βλέπουν όλες τις πληροφορίες της ιδιοκτησίας μέσω του API. Ορίστε το απόρρητο του API σε Απενεργοποιημένο εάν μοιράζεστε αυτήν την ιδιότητα με έναν άλλο ιστότοπο που θέλει να καταχωρήσει την ιδιότητα. Εάν δεν μοιράζεστε αυτήν την ιδιότητα με άλλους ιστότοπους, αφήστε το Απόρρητο του API να είναι ενεργοποιημένο. ");
