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
jr_define('QUICK_REGISTER_TITLE',"Γρήγορη εγγραφή");
jr_define('QUICK_REGISTER',"Εγγραφή");
jr_define('QUICK_REGISTER_BLURB',"Έχετε κάποιο ακίνητο που θα θέλατε να καταχωρίσετε; Κάντε κλικ εδώ για να συμμετάσχετε στο πάρτι!");
jr_define('QUICK_REGISTER_EMAIL_ADD',"Εισαγάγετε τη διεύθυνση email σας και θα σας ξεκινήσουμε");
jr_define('QUICK_REGISTER_EMAIL',"Διεύθυνση ηλεκτρονικού ταχυδρομείου");
jr_define('QUICK_REGISTER_EMAIL_SAVE',"Ας το κάνουμε!");
jr_define('QUICK_REGISTER_EMAIL_CLICKLINK',"Μόλις λάβετε το email εγγραφής σας, θα μπορείτε να συνδεθείτε και να προσθέσετε την ιδιοκτησία σας στον ιστότοπό μας.");
jr_define('QUICK_REGISTER_EMAIL_THANKS',"Ευχαριστούμε για την εγγραφή!");
jr_define('QUICK_REGISTER_EMAIL_THANKS_BLURB',"Θα λάβετε σύντομα ένα email, κάντε κλικ στον σύνδεσμο εκεί και θα σας καθοδηγήσουμε στη διαδικασία προσθήκης της ιδιοκτησίας σας στον ιστότοπο.");
jr_define('QUICK_LOGIN',"Σύνδεση");
jr_define('QUICK_REGISTER_PASSWORD',"Κωδικός πρόσβασης");
jr_define('QUICK_REGISTER_WELCOME_EMAIL_TITLE',"Καλώς ήρθατε στο ");
jr_define('QUICK_REGISTER_WELCOME_EMAIL_LOGIN',"Ας ξεκινήσουμε με τη δημιουργία της πρώτης σας ιδιοκτησίας. Πρώτα συνδεθείτε στον ιστότοπο μέσω αυτού του συνδέσμου : ");
jr_define('QUICK_REGISTER_WELCOME_EMAIL_CREATE',"Μόλις συνδεθείτε, επισκεφτείτε αυτήν τη σελίδα για να δημιουργήσετε την πρώτη σας ιδιοκτησία : ");
jr_define('QUICK_REGISTER_WELCOME_EMAIL_DONE',"Τώρα ακολουθήστε τις οδηγίες στην οθόνη και αν έχετε οποιεσδήποτε ερωτήσεις, μη διστάσετε να επικοινωνήσετε μαζί μας εδώ ");
jr_define('QUICK_REGISTER_CONFIG_TITLE',"Εμφάνιση κάτω από τη γραμμή εργαλείων;");
jr_define('QUICK_REGISTER_CONFIG_DESC',"Εάν το ορίσετε σε ναι, τότε τα κουμπιά Γρήγορη εγγραφή θα εμφανιστούν κάτω από τη γραμμή εργαλείων σε μη εγγεγραμμένους και μη συνδεδεμένους χρήστες. Εάν το ορίσετε σε όχι, τότε θα χρειαστεί να χρησιμοποιήσετε το ASAModule για να τοποθετήσετε τα κουμπιά δημιουργώντας μια νέα λειτουργική μονάδα ASAModule και ορίζοντας την εργασία σε quick_register, μπορείτε στη συνέχεια να τοποθετήσετε αυτήν τη λειτουργική μονάδα οπουδήποτε θέλετε.");