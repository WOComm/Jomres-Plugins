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
jr_define('_JRPORTAL_WESTERN_UNION',"Western Union");
jr_define('_JRPORTAL_WESTERN_UNION_TITLE',"Ρυθμίσεις Western Union");
jr_define('_JRPORTAL_WESTERN_UNION_ADMIN_INSTRUCTIONS',"Εδώ μπορείτε να ορίσετε τα στοιχεία λογαριασμού WU που θα χρησιμοποιούνται για όλες τις ιδιοκτησίες που έχουν ενεργοποιημένη την πύλη WU. Εάν επιλέξετε να παρακάμψετε τα στοιχεία του λογαριασμού WU που έχουν οριστεί στη διεπαφή, τότε θα χρησιμοποιηθούν οι λεπτομέρειες που έχουν οριστεί εδώ Εάν επιλέξετε να μην το κάνετε, τότε θα χρησιμοποιηθούν τα στοιχεία του λογαριασμού WU που ορίζονται στη διαμόρφωση της πύλης frontend.");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_OVERRIDE_ACTIVE',"Παράκαμψη των στοιχείων λογαριασμού WU που έχουν οριστεί για όλες τις ιδιότητες; ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER',"Κλάδος Western Union: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN',"Όνομα δικαιούχου: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT',"Αναγνωριστικό δικαιούχου: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC',"Διεύθυνση Δικαιούχου: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME',"Άλλες πληροφορίες: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER1',"Κλάδος Western Union: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN1',"Όνομα δικαιούχου: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT1',"Αναγνωριστικό δικαιούχου: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC1',"Διεύθυνση Δικαιούχου: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME1',"Άλλες πληροφορίες: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER2',"Κλάδος Western Union: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN2',"Όνομα δικαιούχου: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT2',"Αναγνωριστικό δικαιούχου: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC2',"Διεύθυνση Δικαιούχου: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME2',"Άλλες πληροφορίες: ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_TITLE',"Λεπτομέρειες πληρωμής για την κράτησή σας στο ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_HELLO',"Αγαπητέ ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_THANKYOU',"Σας ευχαριστούμε για την κράτησή σας στο ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_SENDDEPOSITTO',"Για να εξασφαλίσετε την κράτησή σας, στείλτε την κατάθεσή σας ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_BELOWADDRESS_EMAIL'," στον λογαριασμό Western Union παρακάτω.");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_BELOWADDRESS'," στον παρακάτω λογαριασμό Western Union. Ένα αντίγραφο των στοιχείων του λογαριασμού Western Union θα σας σταλεί επίσης μέσω email αφού υποβάλετε αυτήν την κράτηση.");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS1',"Εάν έχετε ερωτήσεις, μη διστάσετε να επικοινωνήσετε μαζί μας. Μπορείτε να μας καλέσετε στο ");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS2'," ή στείλτε μας email στο ");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS_EMAIL',"Εάν έχετε ερωτήσεις, μη διστάσετε να επικοινωνήσετε μαζί μας.");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_PRINT',"Εκτύπωση στοιχείων λογαριασμού Western Union");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_SUBMIT',"Υποβολή");