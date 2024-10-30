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

jr_define ('STRIPE_TITLE', "Stripe");
jr_define ('STRIPE_CONNECT_CONFIG_INFO', "Αυτή η πύλη Stripe έχει σχεδιαστεί ειδικά για να σας επιτρέπει ως διαχειριστής ιστότοπου να λαμβάνετε μέρος των πληρωμών που έγιναν στους Διαχειριστές ακινήτων την ώρα της κράτησης. Πριν να χρησιμοποιηθεί, πρέπει πρώτα να ρυθμίσετε τη δική σας ενσωμάτωση με το Stripe Συνδεθείτε. <a href = 'http://www.jomres.net/manual/site-managers-guide/23-control-panel/payment-methods/340-core-gateway-stripe' target='_blank' class = 'btn btn-primary'>  Τεκμηρίωση για αυτό το πρόσθετο μπορείτε να βρείτε εδώ. </a> <br/> Εάν κάνετε κλικ στην επιλογή Αποθήκευση σε αυτήν τη σελίδα, για να ενεργοποιήσετε αυτήν την προσθήκη απρόσκοπτα  όλες οι άλλες πύλες θα απενεργοποιηθούν </ Ισχυρή> Πριν ξεκινήσετε, βεβαιωθείτε ότι έχετε μεταβεί στη σελίδα Stripe Connect και έχετε δηλώσει ότι δημιουργείτε μια πλατφόρμα. Μόλις ολοκληρωθεί αυτό, ακολουθήστε τις οδηγίες στην οθόνη για να ρυθμίσετε τον λογαριασμό σας. Πριν οι διαχειριστές μπορούν να συνδέσουν τον λογαριασμό τους με τον δικό σας πρέπει να επισκεφθείτε τις Ρυθμίσεις> Ρυθμίσεις σύνδεσης και στην περιοχή \"Ρυθμίσεις OAuth\" ενεργοποιημένη OAuth για τυπικούς λογαριασμούς και, στη συνέχεια, κάντε κλικ στην επιλογή Αποθήκευση (σημειώστε, θα πρέπει να το κάνετε και στις δύο δοκιμαστικές και ζωντανές λειτουργίες). ");

jr_define ('STRIPE_REGISTER_CONNECT', "Συνδεθείτε μαζί μας!");
jr_define ('STRIPE_REGISTER_CONNECT_BLURB', "Έχετε εγγραφεί, αλλά η σύνδεση δεν έχει ολοκληρωθεί ακόμα. Πρέπει να συνδέσετε τον λογαριασμό σας Stripe με τον ιστότοπό μας. Μόλις ολοκληρωθεί, μπορείτε να προσθέσετε όλες τις ιδιοκτησίες σας στον ιστότοπό μας και να αρχίσετε να κάνετε κρατήσεις . ");

jr_define ('STRIPE_REGISTER_WELCOME_EMAIL_TITLE', "Καλώς ορίσατε");
jr_define ('STRIPE_REGISTER_WELCOME_EMAIL_BLURB', "Προτού ξεκινήσετε να ρυθμίζετε τις ιδιότητες σας, πρέπει να μας συνδέσετε με τον λογαριασμό σας Stripe. Κάντε κλικ στον σύνδεσμο για να ξεκινήσετε.");

jr_define('STRIPE_SETUP_INFO',"Τώρα πρέπει να συνδέσουμε τον λογαριασμό σας με τον δικό μας, αυτό θα μας επιτρέψει να λάβουμε πληρωμές για λογαριασμό σας, οπότε κάντε κλικ στο κουμπί Σύνδεση για να μεταφερθείτε στο Stripe, όπου μπορείτε να επιβεβαιώσετε τη σύνδεση.");

jr_define ('STRIPE_SETUP_DONE', "Είστε ήδη συνδεδεμένοι μαζί μας, τίποτα άλλο να κάνετε εδώ! Κλείστε αυτό το παράθυρο και ας συνεχίσουμε με την επιχειρηματική δραστηριότητα.");
jr_define ('STRIPE_SETUP_THANKS', "Σας ευχαριστούμε που συνδεθήκατε μαζί μας! Μπορείτε να κλείσετε αυτό το παράθυρο τώρα.");
jr_define ('STRIPE_SETUP_DISCONNECT', "Αποσύνδεση του λογαριασμού σας.");
jr_define ('STRIPE_SETUP_DISCONNECTED', "Ο λογαριασμός αποσυνδέθηκε, μπορείτε να κλείσετε αυτό το παράθυρο τώρα.");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_CLIENT_ID', "Stripe Connect Client ID");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_CLIENT_ID_DESC', "Μπορείτε να λάβετε το αναγνωριστικό πελάτη Stripe από το <a href='https://dashboard.stripe.com/account/applications/settings' target='_blank'> Πίνακας ελέγχου> τα κλειδιά βρίσκονται στην επιλογή μενού Προγραμματιστές. </a> ");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_RETURN_URL', "Βεβαιωθείτε ότι έχετε ορίσει το URI ανακατεύθυνσης στο <a href='https://dashboard.stripe.com/account/applications/settings' target='_blank'> Σύνδεση> Ρυθμίσεις </a> έως <br/> ");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_SECRET_KEY', "Μυστικό κλειδί");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_PUBLIC_KEY', "Δημόσιο κλειδί");
jr_define ('STRIPE_PAYMENT_FORM_SECURE', "Ασφαλής φόρμα πληρωμής");
jr_define ('STRIPE_PAYMENT_FORM_BILLINGDETAILS', "Λεπτομέρειες χρέωσης");
jr_define ('STRIPE_PAYMENT_FORM_CARDDETAILS', "Στοιχεία κάρτας");
jr_define ('STRIPE_PAYMENT_FORM_HOLDER', "Όνομα κατόχου κάρτας");
jr_define ('STRIPE_PAYMENT_FORM_PAYNOW', "Πληρώστε τώρα");
jr_define ('STRIPE_PAYMENT_FORM_TOPAY', "Πληρωμή τώρα");

jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_STREET_EMPTY', 'Ο δρόμος απαιτείται και δεν μπορεί να είναι άδειος');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_LENGTH', 'Ο δρόμος πρέπει να έχει περισσότερους από 6 και λιγότερους από 96 χαρακτήρες');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CITY_EMPTY', 'Η πόλη απαιτείται και δεν μπορεί να είναι κενή');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_ZIP_EMPTY', 'Το φερμουάρ απαιτείται και δεν μπορεί να είναι κενό');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_ZIP_LENGTH', 'Το zip πρέπει να έχει μήκος μεγαλύτερο από 3 και λιγότερο από 12 χαρακτήρες');
jr_define ("STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_EMPTY", "Η διεύθυνση ηλεκτρονικού ταχυδρομείου είναι απαραίτητη και δεν μπορεί να είναι κενή");
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_INVALID', 'Η εισαγωγή δεν είναι έγκυρη διεύθυνση ηλεκτρονικού ταχυδρομείου');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_LENGTH', 'Το μήνυμα ηλεκτρονικού ταχυδρομείου πρέπει να έχει περισσότερους από 6 και λιγότερους από 65 χαρακτήρες') ;
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDHOLDER_EMPTY', 'Το όνομα του κατόχου της κάρτας απαιτείται και δεν μπορεί να είναι κενό');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDHOLDER_LENGTH', 'Το όνομα του κατόχου της κάρτας πρέπει να έχει περισσότερους από 6 και λιγότερο από 70 χαρακτήρες') ;
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_EMPTY', 'Ο αριθμός της πιστωτικής κάρτας είναι υποχρεωτικός και δεν μπορεί να είναι άδειος');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_INVALID', 'Ο αριθμός της πιστωτικής κάρτας δεν είναι έγκυρος');
jr_define ("STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_MONTH_EMPTY", "Απαιτείται ο μήνας λήξης");
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_MONTH_DIGITS', 'Ο μήνας λήξης μπορεί να περιέχει μόνο ψηφία') ;
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_YEAR_EMPTY', 'Απαιτείται το έτος λήξης') ;
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_YEAR_DIGITS', 'Το έτος λήξης μπορεί να περιέχει μόνο ψηφία') ;
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CCV_EMPTY', 'Το cvv απαιτείται και δεν μπορεί να είναι κενό');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CCV_INVALID', 'Η τιμή δεν είναι έγκυρο CVV');

jr_define ('STRIPE_PAYMENT_FAILED', "Λυπούμαστε, δεν ήταν δυνατή η επεξεργασία της πληρωμής σας αυτήν τη στιγμή.");
jr_define ('STRIPE_PAYMENT_TRY_AGAIN', "Δοκιμάστε ξανά");

jr_define ('STRIPE_PAYMENT_ERROR_DECLINED', "Η πληρωμή απορρίφθηκε.");
jr_define ('STRIPE_PAYMENT_ERROR_RATE_LIMIT', "Πάρα πολλά αιτήματα που έγιναν στο API πολύ γρήγορα");
jr_define ('STRIPE_PAYMENT_ERROR_INVALID_PARAMETERS', "Μη έγκυρες παράμετροι παρέχονται στο API του Stripe");
jr_define ('STRIPE_PAYMENT_ERROR_AUTH_FAILED', "Ο έλεγχος ταυτότητας με το API του Stripe απέτυχε");
jr_define ('STRIPE_PAYMENT_ERROR_NETWORK_FAULT', "Η επικοινωνία δικτύου με το Stripe απέτυχε (η σύνδεσή σας στο Διαδίκτυο έχει διακοπεί;)");
jr_define ('STRIPE_PAYMENT_ERROR_UNCAUGHT', "Παρουσιάστηκε σφάλμα που δεν εντοπίστηκε");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_COMMISSION', "Your Commission");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_COMMISSION_DESC', "Αυτή η προμήθεια λαμβάνεται από την πληρωμή που αποστέλλεται στον διαχειριστή ακινήτου την ώρα της κράτησης. Στη συνέχεια τοποθετείται στον λογαριασμό σας Stripe από τη Stripe. <br/> Αυτό είναι το ποσοστό της προμήθειας που θα χρεώνετε στους διαχειριστές ακινήτων για Οι προμήθειές σας χρεώνονται με βάση ΟΛΟ το κόστος της κράτησης και όχι την αξία της κατάθεσης. <br/> Σε όποιο σημείο ορίσετε αυτήν την τιμή, σας συνιστούμε να διαμορφώσετε τη Διαμόρφωση ιστότοπου -> Φόρμα κράτησης -> Το ελάχιστο ποσό κατάθεσης τουλάχιστον διπλάσιο από αυτόν τον αριθμό, οπότε αν θέλετε να χρεώσετε προμήθεια 10%, τότε θα πρέπει να κάνετε την Ελάχιστη Κατάθεση 20%. ");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_EURO', "Stripe Fee European");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_DESC', "Αυτό είναι το ποσοστό που σας χρεώνει η Stripe για πληρωμές στον ιστότοπό σας. Επί του παρόντος χρεώνουν 1,4% για ευρωπαϊκές κάρτες και 2,9% για μη ευρωπαϊκές κάρτες. Αυτός ο αριθμός απαιτείται για τον καθορισμό των τιμών κατά την κράτηση και χρόνος πληρωμής. ");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_NONEURO', "Προμήθεια λωρίδων εκτός ευρώ");

jr_define ('STRIPE_PAYMENT_FORM_CREDITCARD', "Αριθμός κάρτας");
jr_define ('STRIPE_PAYMENT_FORM_EXPIRATION', "Λήξη (ΜΜ/ΕΕ)");
jr_define ('STRIPE_PAYMENT_FORM_CVC', "CVC");
jr_define ('STRIPE_PAYMENT_FORM_ZIP', "Billing Zip");
