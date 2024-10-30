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
jr_define ('_JOMRES_DATAWIPE_TITLE', "Διαγραφή δεδομένων");
jr_define ('_JOMRES_DATAWIPE_DESC', "Αυτή η δυνατότητα σάς επιτρέπει να διαγράφετε δεδομένα που συλλέγονται κατά την πραγματοποίηση των κρατήσεων. Προορίζεται για χρήση από προγραμματιστές που έχουν δημιουργήσει πολλά δεδομένα ανάπτυξης στις εγκαταστάσεις τους (όπως δοκιμαστικές κρατήσεις, συνδρομές) και θέλουν σκουπίστε τις πληροφορίες από το σύστημα, διατηρώντας παράλληλα τις πληροφορίες ιδιοκτησίας και τιμολογίου. <br/> Το πρόσθετο θα καταργήσει ΟΛΑ τα αρχεία καταγραφής cron, τα αγαπημένα των χρηστών, τις σημειώσεις, τις κρατήσεις, τα τιμολόγια, τους συνδρομητές, τις συνδρομές, τους επισκέπτες, τα δεδομένα ελέγχου, τον αριθμό των κλικ και τις κριτικές. " );
jr_define ('_JOMRES_DATAWIPE_WARNING', "Αυτά τα δεδομένα μπορούν να ανακτηθούν μόνο από ένα αντίγραφο ασφαλείας του συστήματός σας, οπότε πρέπει να καταλάβετε ότι πρόκειται για ένα πολύ επιζήμιο σενάριο. Ως αποτέλεσμα, συνιστάται να το χρησιμοποιήσετε αφού προορίζεται σκοπός είναι να το απεγκαταστήσετε ξανά μετά. ");
jr_define ('_JOMRES_DATAWIPE_GO', "Κάντε κλικ για να σκουπίσετε δεδομένα");
jr_define ('_JOMRES_DATAWIPE_EMPTYING', "Emptying");
jr_define ('_JOMRES_DATAWIPE_EMPTYING_SUCCESS', "Αδειάστηκε επιτυχώς.");
jr_define ('_JOMRES_DATAWIPE_EMPTYING_FAILURE', "Αποτυχία εκκένωσης του πίνακα.");