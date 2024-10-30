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
jr_define('_SUBSCRIPTIONS_ACTIVE',"Ενεργό");
jr_define('_SUBSCRIPTIONS_EXPIRED',"Μη ενεργό");
jr_define('_SUBSCRIPTIONS_HPAYMENT_STATUS',"Κατάσταση πληρωμής");
jr_define('_SUBSCRIPTIONS_HSUBSCRIPTION_LEVEL',"Επίπεδο");
jr_define('_SUBSCRIPTIONS_EDIT_TITLE',"Επεξεργασία συνδρομής");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_TITLE',"Αποστολή email υπενθύμισης λήξης συνδρομής;");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_DAYS_A',"Αποστολή email υπενθύμισης");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_DAYS_B',"ημέρες πριν από τη λήξη της συνδρομής");
jr_define('_SUBSCRIPTIONS_SEND_EXPIRATION_EMAIL_TITLE',"Αποστολή email όταν λήξει η συνδρομή;");
jr_define('_SUBSCRIPTIONS_MY',"Οι συνδρομές μου");
jr_define('_SUBSCRIPTIONS_HRENEW',"Ανανέωση");
jr_define('_SUBSCRIPTIONS_HRENEWAL',"Ανανέωση συνδρομής");
jr_define('_SUBSCRIPTIONS_HALREADY_SUBSCRIBED',"Έχετε ήδη εγγραφεί, αγοράστε μια ανανέωση.");
jr_define('_SUBSCRIPTIONS_HEDIT',"Επεξεργασία πακέτου συνδρομής");
jr_define('_SUBSCRIPTIONS_USERID_DESC',"Πληκτρολογήστε τα πρώτα γράμματα του ονόματος χρήστη και θα δείτε ένα αναπτυσσόμενο μενού με ονόματα χρήστη. Κάντε κλικ σε ένα όνομα χρήστη για να το επιλέξετε.");
jr_define('_SUBSCRIPTIONS_PACKAGE_NO_LOGER_PUBLISHED',"Αυτό το πακέτο συνδρομής δεν είναι πλέον διαθέσιμο, επομένως δεν μπορεί να ανανεωθεί, σκεφτείτε να το αναβαθμίσετε.");
jr_define('_SUBSCRIPTIONS_NOT_SUBSCRIBED_TO_PACKAGE_ID',"Δεν έχετε εγγραφεί σε αυτό το πακέτο, επομένως δεν μπορείτε να το ανανεώσετε.");
jr_define('_SUBSCRIPTIONS_NO_RENEWAL_OPTIONS_FOR_PACKAGE',"Δεν υπάρχουν επιλογές ανανέωσης για αυτό το πακέτο");
jr_define('_SUBSCRIPTIONS_CANCEL',"Ακύρωση συνδρομής");
jr_define('_SUBSCRIPTIONS_HFREQUENCY_DAYS',"Συχνότητα (ημέρες)");
jr_define('_SUBSCRIPTIONS_HFREQUENCY_DAYS_DESC',"Διάρκεια συνδρομής σε ημέρες");
jr_define('_SUBSCRIPTIONS_HRENEWAL_NOTALLOWED',"Δεν επιτρέπονται ανανεώσεις για αυτό το πακέτο.");
jr_define('_SUBSCRIPTIONS_HRENEWAL_PRICE',"Τιμή ανανέωσης");
jr_define('_SUBSCRIPTIONS_HRENEWAL_PRICE_EXPL',"Ρυθμίστε το σε 0 για να απενεργοποιήσετε τις ανανεώσεις για αυτό το πακέτο ή να εισαγάγετε μια τιμή για την ανανέωση");
jr_define('_SUBSCRIPTIONS_HPACKAGE_FEATURES',"Επιλογές πακέτου");
jr_define('_SUBSCRIPTIONS_HPACKAGE_DETAILS',"Λεπτομέρειες πακέτου");
jr_define('_SUBSCRIPTIONS_HPACKAGE_YOUR',"Το πακέτο συνδρομής σας");
jr_define('_SUBSCRIPTIONS_HACCESS_TO_FEATURE_NOTALLOWED',"Το πακέτο συνδρομής σας δεν περιλαμβάνει πρόσβαση σε αυτήν τη δυνατότητα. Για να χρησιμοποιήσετε αυτήν τη δυνατότητα, θα χρειαστεί να αναβαθμίσετε τη συνδρομή σας.");
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TEXT1', "Η συνδρομή σας έχει λήξει και όλες οι καταχωρίσεις σας έχουν καταργηθεί. Οι καταχωρίσεις σας δεν είναι πλέον ορατές στους επισκέπτες και δεν θα μπορείτε πλέον να λαμβάνετε online κρατήσεις από τον ιστότοπό μας. Για να συνεχίσετε να χρησιμοποιείτε τις υπηρεσίες μας, δημοσιεύστε τις καταχωρίσεις σας και αρχίστε να λαμβάνετε online κρατήσεις, συνδεθείτε στον λογαριασμό σας και αγοράστε μια ανανέωση." );
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE1',"Η συνδρομή σας στο" );
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE2',"έχει λήξει");
jr_define( '_JRPORTAL_SUBSCRIPTION_REMINDER_EMAIL_TEXT1',"Αυτή είναι μια ειδοποίηση για να σας ενημερώσουμε ότι η συνδρομή σας θα λήξει σύντομα. Για να συνεχίσετε να χρησιμοποιείτε τις υπηρεσίες μας, συνδεθείτε στον λογαριασμό σας και αγοράστε μια ανανέωση." );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_TITLE',"Πακέτα συνδρομής" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_NAME',"Όνομα" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_DESCRIPTION',"Περιγραφή" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PUBLISHED',"Δημοσιευμένο" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FREQUENCY',"Συχνότητα" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FULLAMOUNT',"Τιμή" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PROPERTYLIMIT',"Επιχειρηματικό όριο" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PROPERTYLIMIT_DESC',"Μέγιστος αριθμός επιχειρήσεων που μπορούν να προστεθούν με αυτό το πακέτο συνδρομής" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_SUBSCRIBE',"Εγγραφή" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_USE', "Χρήση λειτουργικότητας χειρισμού συνδρομής" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_SUBSCRIBING_ERROR_NOPACKAGEID',"Λυπούμαστε, αλλά αυτό το αναγνωριστικό πακέτου δεν αναγνωρίζεται." );
jr_define( '_JRPORTAL_INVOICES_SUBSCRIPTION_PROFILE_ERROR_EXPL',"Φαίνεται ότι δεν έχετε συμπληρώσει ακόμη τα στοιχεία του λογαριασμού σας. Για να καταχωρίσετε την ιδιοκτησία σας στον ιστότοπο, πρέπει να συμπληρώσετε τα στοιχεία του λογαριασμού σας για να προχωρήσουμε περαιτέρω." );
jr_define( '_JRPORTAL_SUBSCRIPTION_ALLSLOTSUSED',"Έχετε χρησιμοποιήσει όλες τις θέσεις υποδοχής ιδιοκτησίας που είναι διαθέσιμες στο πακέτο συνδρομής σας, επομένως δεν θα μπορείτε να δημιουργήσετε νέες καταχωρίσεις. Αναβαθμίστε το πακέτο σας εάν θέλετε να δημιουργήσετε περισσότερες καταχωρίσεις." );
jr_define('_JOMRES_CHART_SUBSCRIPTIONS_DESC',"Έσοδα ανά έτος/μήνα");
jr_define('_SUBSCRIPTION_WARNING',"Έχετε ενεργοποιήσει τις συνδρομές, αλλά φαίνεται ότι δεν έχετε δημιουργήσει ακόμη πακέτα συνδρομής. Οι κάτοχοι δεν θα μπορούν να καταχωρήσουν ιδιότητες στον ιστότοπό σας έως ότου δημιουργηθεί τουλάχιστον ένα πακέτο συνδρομής.");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_APIACCESS',"API Access" );

	jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE_SUBSCRIPTION_1',"Μπορείτε να αποκτήσετε πρόσβαση σε αυτήν τη δυνατότητα κάνοντας αναβάθμιση στο " );
	jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE_SUBSCRIPTION_2'," Πακέτο Συνδρομής. " );
	jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE', 'Αναβάθμιση');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_ALREADY_SUBSCRIBED', 'Εγγεγραμμένος');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_GATEWAY_SETTINGS', 'Ρυθμίσεις πύλης συνδρομής');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_NOT_SUBSCRIBED', 'Δεν είστε συνδρομητής αυτήν τη στιγμή σε κανένα πακέτο συνδρομής. Εγγραφείτε σε ένα πακέτο για να συνεχίσετε να χρησιμοποιείτε τις υπηρεσίες μας.');
