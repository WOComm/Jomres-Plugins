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
jr_define('_JRPORTAL_WIRE_TRANSFER',"Τραδικό έμβασμα");
jr_define('_JRPORTAL_WIRE_TRANSFER_TITLE',"Ρυθμίσεις τραπεζικής μεταφοράς");
jr_define('_JRPORTAL_WIRE_TRANSFER_ADMIN_INSTRUCTIONS',"Εδώ μπορείτε να ορίσετε τα στοιχεία τραπεζικού λογαριασμού που θα χρησιμοποιούνται για όλες τις ιδιοκτησίες που έχουν ενεργοποιημένη την πύλη τραπεζικής μεταφοράς. Εάν επιλέξετε να παρακάμψετε τα στοιχεία τραπεζικού λογαριασμού που έχουν οριστεί στη διεπαφή, τότε τα στοιχεία που ορίζονται εδώ θα είναι χρησιμοποιείται. Εάν επιλέξετε να μην το κάνετε, τότε θα χρησιμοποιηθούν τα στοιχεία τραπεζικού λογαριασμού που ορίζονται στη διαμόρφωση πύλης frontend.").
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_OVERRIDE_ACTIVE',"Παράκαμψη των στοιχείων τραπεζικού λογαριασμού που έχουν οριστεί για όλα τα ακίνητα; ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_ACCOUNT_HOLDER',"Κάτοχος λογαριασμού: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_IBAN',"IBAN: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_SWIFT',"Κωδικός SWIFT: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_BIC',"Κωδικός BIC: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_NAME',"Όνομα τράπεζας: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_ACCOUNT_HOLDER1',"Κάτοχος λογαριασμού: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_IBAN1',"IBAN: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_SWIFT1',"Κωδικός SWIFT: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_BIC1',"Κωδικός BIC: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_NAME1',"Όνομα τράπεζας: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_ACCOUNT_HOLDER2',"Κάτοχος λογαριασμού: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_IBAN2',"IBAN: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_SWIFT2',"Κωδικός SWIFT: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_BIC2',"Κωδικός BIC: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_NAME2',"Όνομα τράπεζας: ");
jr_define('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_EMAIL_TITLE',"Λεπτομέρειες πληρωμής για την κράτησή σας στο ");
jr_define('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_EMAIL_HELLO',"Αγαπητέ ");
jr_define('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_EMAIL_THANKYOU',"Σας ευχαριστούμε για την κράτησή σας στο ");
jr_define('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_SENDDEPOSITTO',"Για να εξασφαλίσετε την κράτησή σας, παρακαλούμε να μεταφέρετε την κατάθεσή σας ");
jr_define('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_BELOWADDRESS_EMAIL'," στον τραπεζικό λογαριασμό παρακάτω.");
jr_define('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_BELOWADDRESS'," στον τραπεζικό λογαριασμό παρακάτω. Ένα αντίγραφο των στοιχείων του τραπεζικού λογαριασμού θα σας σταλεί επίσης μέσω email μετά την υποβολή αυτής της κράτησης.");
jr_define('_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_CONTACTUS1',"Εάν έχετε ερωτήσεις, μη διστάσετε να επικοινωνήσετε μαζί μας. Μπορείτε να μας καλέσετε στο ");
jr_define('_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_CONTACTUS2'," ή στείλτε μας email στο ");
jr_define('_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_CONTACTUS_EMAIL',"Εάν έχετε ερωτήσεις, μη διστάσετε να επικοινωνήσετε μαζί μας.");
jr_define('_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_PRINT',"Εκτύπωση στοιχείων τραπεζικού λογαριασμού");
jr_define('_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_SUBMIT',"Υποβολή");