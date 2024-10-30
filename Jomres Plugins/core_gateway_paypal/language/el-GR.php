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

jr_define ('PAYPAL_API_KEY_TITLE', "Paypal API Key");
jr_define('PAYPAL_API_KEY_TITLE_DESC',"Διαμορφώστε το Paypal Client ID και το Secret για τους λογαριασμούς σας ζωντανά και Sandbox. Μόλις διαμορφωθεί, θα μπορείτε να πραγματοποιείτε πληρωμές κρατήσεων και τιμολογίων μέσω Paypal.");

jr_define ('PAYPAL_API_CLIENTID', "Client ID");
jr_define ('PAYPAL_API_SECRET', "Secret");
jr_define ("PAYPAL_API_CLIENTID_SANDBOX", "Sandbox Client ID");
jr_define ('PAYPAL_API_SECRET_SANDBOX', "Sandbox Secret");

jr_define ('PAYPAL_API_CLIENTID_FINDING', "Πώς βρίσκετε το αναγνωριστικό πελάτη και το μυστικό σας;");

jr_define ('PAYPAL_API_CLIENTID_STEP1', 'Μεταβείτε στη διεύθυνση https://developer.paypal.com/ και συνδεθείτε.');
jr_define ('PAYPAL_API_CLIENTID_STEP2', "Μετάβαση στις εφαρμογές μου και διαπιστευτήρια στο πλευρικό μενού.");
jr_define ('PAYPAL_API_CLIENTID_STEP3', "κάντε κλικ στην επιλογή Δημιουργία εφαρμογής για να δημιουργήσετε μια νέα εφαρμογή");
jr_define ('PAYPAL_API_CLIENTID_STEP4', "Δώστε ένα όνομα στην εφαρμογή σας και, στη συνέχεια, κάντε κλικ στην επιλογή Δημιουργία εφαρμογής.");
jr_define ('PAYPAL_API_CLIENTID_STEP5', "Σε αυτήν τη σελίδα μπορείτε να δείτε το αναγνωριστικό πελάτη και το μυστικό σας. Αντιγράψτε και επικολλήστε αυτά τα κλειδιά στα αντίστοιχα παραπάνω πεδία παραπάνω.");