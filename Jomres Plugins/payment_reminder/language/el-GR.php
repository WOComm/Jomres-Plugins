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
jr_define('_JRPORTAL_PAYMENT_REMINDER_TITLE',"Υπενθυμίσεις πληρωμών");
jr_define('_JRPORTAL_PAYMENT_REMINDER_NR_DAYS_TITLE1',"Αποστολή email υπενθύμισης πληρωμής..");
jr_define ('_JRPORTAL_PAYMENT_REMINDER_NR_DAYS_TITLE2', ".. ημέρες μετά την προσωρινή κράτηση");
jr_define('_JRPORTAL_PAYMENT_REMINDER_INSTRUCTIONS',"Αυτή η προσθήκη εκτελείται αυτόματα στο παρασκήνιο και στέλνει ένα μήνυμα ηλεκτρονικού ταχυδρομείου υπενθύμισης πληρωμής στους επισκέπτες ότι πραγματοποίησαν προσωρινές κρατήσεις που δεν έχουν επισημανθεί ως πληρωμές εντός ενός διαστήματος της επιλογής σας. Αυτό είναι χρήσιμο όταν αποδέχεστε κρατήσεις με πληρωμή χρησιμοποιώντας μεθόδους πληρωμής εκτός σύνδεσης (μεταφορά χρημάτων, επιταγή). Εάν μια κράτηση δεν πληρωθεί εντός X ημερών από τη στιγμή που πραγματοποιήθηκε η κράτηση, τότε αποστέλλεται στον επισκέπτη ένα email υπενθύμισης πληρωμής. Θα λάβετε επίσης ένα αντίγραφο αυτής . Εάν χρησιμοποιείτε επίσης την προσθήκη Προσωρινής Διαχείρισης Κρατήσεων, τότε βεβαιωθείτε ότι το διάστημα στο οποίο θέλετε να στείλετε το μήνυμα ηλεκτρονικού ταχυδρομείου υπενθύμισης πληρωμής είναι τουλάχιστον 1 ημέρα χαμηλότερο από αυτό που ορίστηκε για τη διαγραφή ή την ακύρωση της κράτησης χωρίς πληρωμή.").
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_TITLE',"Υπενθύμιση πληρωμής για την κράτησή σας στο ");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY1',"Έχετε μια κράτηση χωρίς πληρωμή στο ");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY2',"Για να διασφαλίσετε την κράτησή σας, είναι απαραίτητο να πραγματοποιήσετε μια προκαταβολή ύψους ");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_BOOKINGNO',"Αριθμός κράτησης");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY3',". Επικοινωνήστε μαζί μας εάν θέλετε να συζητήσουμε τις επιλογές πληρωμής.<br /><br />Σας ευχαριστούμε.");