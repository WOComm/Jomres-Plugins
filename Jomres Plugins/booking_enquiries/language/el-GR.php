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
jr_define ('_JOMRES_BOOKING_INQUIRY_HEMAIL_TITLE', "Θέμα ηλεκτρονικού ταχυδρομείου");
jr_define ('_JOMRES_BOOKING_REJECTION_HCONTENT', "Κείμενο ηλεκτρονικού ταχυδρομείου (μπορείτε να επεξεργαστείτε αυτό το κείμενο για να συμπληρώσετε έναν λόγο απόρριψης αυτής της κράτησης, να προσφέρετε εναλλακτικές λύσεις κ.λπ.)");
jr_define ('_JOMRES_BOOKING_REJECTION_INSTRUCTIONS', "Αυτή η ερώτηση κράτησης θα απορριφθεί και θα ακυρωθεί. Το ακόλουθο μήνυμα ηλεκτρονικού ταχυδρομείου θα σταλεί στον πελάτη.");
jr_define ('_JOMRES_BOOKING_REJECTION_IMPOSSIBLE', "Αυτή η ερώτηση κράτησης δεν μπορεί να απορριφθεί επειδή έχει ήδη απορριφθεί ή εγκριθεί.");
jr_define ('_JOMRES_BOOKING_APPROVAL_HCONTENT', "Κείμενο ηλεκτρονικού ταχυδρομείου (μπορείτε να επεξεργαστείτε αυτό το κείμενο για να συμπληρώσετε τις οδηγίες πληρωμής για αυτήν την κράτηση κ.λπ.)");
jr_define ('_JOMRES_BOOKING_APPROVAL_INSTRUCTIONS', "Αυτή η ερώτηση κράτησης θα γίνει αποδεκτή και η διαθεσιμότητα θα ενημερωθεί στο ημερολόγιο. Το ακόλουθο μήνυμα ηλεκτρονικού ταχυδρομείου θα σταλεί στον πελάτη.");
jr_define ('_JOMRES_BOOKING_APPROVAL_IMPOSSIBLE', "Αυτή η ερώτηση κράτησης δεν μπορεί να εγκριθεί επειδή έχει ήδη απορριφθεί ή εγκριθεί.");
jr_define ('_JOMRES_ADMIN_NEWENQUIRY_EMAILNAME', "Νέα διεύθυνση ηλεκτρονικού ταχυδρομείου ερωτήσεων διαχειριστή ιστότοπου");
jr_define ('_JOMRES_ADMIN_NEWENQUIRY_EMAILDESC', "Ηλεκτρονικό ταχυδρομείο που αποστέλλεται στον διαχειριστή του ιστότοπου την ώρα της κράτησης, εάν η κράτηση απαιτεί πρώτα έγκριση και η γενική πύλη paypal είναι ενεργοποιημένη");
jr_define ('_JOMRES_HOTEL_NEWENQUIRY_EMAILNAME', "Email New Inquiry Email");
jr_define ('_JOMRES_HOTEL_NEWENQUIRY_EMAILDESC', "Αποστολή email στο ξενοδοχείο κατά την ώρα της κράτησης εάν η κράτηση απαιτεί πρώτα έγκριση");
jr_define ('_JOMRES_GUEST_NEWENQUIRY_EMAILNAME', "Νέα διεύθυνση ηλεκτρονικού ταχυδρομείου ερωτήσεων επισκεπτών");
jr_define ('_JOMRES_GUEST_NEWENQUIRY_EMAILDESC', "Ηλεκτρονικό ταχυδρομείο που αποστέλλεται στον επισκέπτη την ώρα της κράτησης εάν η κράτηση απαιτεί πρώτα έγκριση");
jr_define ('_JOMRES_GUEST_APPROVEENQUIRY_EMAILNAME', "Email έγκρισης ερώτησης επισκέπτη");
jr_define ('_JOMRES_GUEST_APPROVEENQUIRY_EMAILDESC', "Μη αυτόματη αποστολή μηνύματος ηλεκτρονικού ταχυδρομείου στον επισκέπτη από τον διαχειριστή ιδιοκτησίας για επιβεβαίωση διαθεσιμότητας για ένα ερώτημα");
jr_define ('_JOMRES_GUEST_REJECTENQUIRY_EMAILNAME', "Διεύθυνση ηλεκτρονικού ταχυδρομείου απόρριψης ερωτήματος επισκέπτη");
jr_define ('_JOMRES_GUEST_REJECTENQUIRY_EMAILDESC', "Μη αυτόματη αποστολή μηνύματος ηλεκτρονικού ταχυδρομείου στον επισκέπτη από τον διαχειριστή του ακινήτου εάν το ακίνητο δεν είναι διαθέσιμο για τα στοιχεία του ερωτήματος");