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
	jr_define('CONVERSATIONS',"Conversations");
	jr_define('CONVERSATION',"Μιλάτε με ");
	jr_define('CONVERASTIONS_GROUPS',"Ομάδες");
jr_define('CONVERSATIONS_WELCOME_MESSAGE_1',"Γεια, καλώς ήρθατε στο ");
jr_define('CONVERSATIONS_WELCOME_MESSAGE_2',"Πώς μπορώ να σε βοηθήσω;");
jr_define('CONVERSATIONS_PLACEHOLDER',"Εισαγάγετε το μήνυμά σας...");
jr_define('CONVERSATIONS_MEMBERS',"Μέλη ομάδας");
jr_define('CONVERSATIONS_NO_CONVERSATIONS_MANAGER',"Δεν υπάρχουν ακόμα μηνύματα εδώ.");
jr_define('CONVERSATIONS_NO_CONVERSATIONS_GUEST',"Δεν υπάρχουν ακόμα μηνύματα εδώ. Μπορείτε να ξεκινήσετε μια νέα συνομιλία μεταβαίνοντας σε μια ιδιοκτησία και κάνοντας κλικ στο κουμπί επαφής για αυτήν την ιδιοκτησία.");
jr_define('CONVERSATION_NAME',"Όνομα συνομιλίας");
jr_define('CONVERSATION_GROUP_ID',"Αναγνωριστικό ομάδας");
jr_define('CONVERSATION_UNDREAD_MESSAGES',"Μη αναγνωσμένα μηνύματα");
jr_define('CONVERSATION_LAST_MESSAGE',"Τελευταίο μήνυμα");
jr_define('CONVERSATION_LEAVE_GROUP',"Αποχώρηση από την ομάδα");
jr_define('LIST_CONVERSATIONS_INFO',"Εδώ μπορείτε να δείτε μια λίστα συνομιλιών. Σημείωση, τα μη αναγνωσμένα μηνύματα αναφέρονται σε μηνύματα που εσείς προσωπικά δεν έχετε διαβάσει, μπορεί να έχουν διαβάσει και έχουν απαντηθεί από άλλα μέλη της ομάδας. Κάντε κλικ στο όνομα της συνομιλίας για να ανοίξετε τη συνομιλία σε νέο παράθυρο.");
jr_define('CONVERSATION_MODAL_TITLE',"Ειδοποίηση συνομιλίας");
jr_define('CONVERSATION_MODAL_NUDGE',"Έχετε νέα μηνύματα.");
jr_define('CONVERSATION_MODAL_GO',"Προβολή συνομιλιών");
jr_define('MESSAGING_SYSTEM_SITE_CONFIG_TAB_TITLE',"Σύστημα ανταλλαγής μηνυμάτων");
jr_define('MESSAGING_SYSTEM_SITE_CONFIG_LOGIN_MODULE_ID',"αναγνωριστικό μονάδας σύνδεσης Joomla");
jr_define('MESSAGING_SYSTEM_SITE_CONFIG_LOGIN_MODULE_DESC'," Το αναγνωριστικό της μονάδας σύνδεσής σας. Ανατρέξτε στην Προσθήκη Πληροφορίες Προσθήκης για περισσότερες πληροφορίες σχετικά με αυτήν τη ρύθμιση. ");
jr_define('MESSAGING_SYSTEM_SEARCH_FIELD_PLACEHOLDER',"Αναζήτηση");
jr_define('MESSAGING_SYSTEM_USER_TYPES_REGISTERED',"Εγγεγραμμένος χρήστης");
jr_define('MESSAGING_SYSTEM_USER_TYPES_PROPERTY_MANAGER',"Διαχείριση ιδιοκτησίας");
jr_define('MESSAGING_SYSTEM_USER_TYPES_ADMINISTRATOR',"Διαχειριστής");
jr_define('MESSAGING_SYSTEM_SITE_CONFIG_LOGIN_WIDGET_SHORTCODE',"Σύντομος κωδικός σύνδεσης WordPress");
jr_define('MESSAGING_SYSTEM_SITE_CONFIG_LOGIN_WIDGET_SHORTCODE_DESC',"Ο σύντομος κωδικός του γραφικού στοιχείου σύνδεσής σας. Ανατρέξτε στην Προσθήκη Πληροφορίες Προσθήκης για περισσότερες πληροφορίες σχετικά με αυτήν τη ρύθμιση. ");
jr_define('MESSAGING_SYSTEM_REST_API_LOCATION_WARNING',"Αυτήν τη στιγμή, η εγκατάσταση του Jomres βρίσκεται στον κατάλογο /wp-content/plugins/jomres/jomres/, επομένως δεν μπορείτε να χρησιμοποιήσετε ακόμα το σύστημα ανταλλαγής μηνυμάτων. Επισκεφτείτε το Διαχειριστής > Jomres > Δοκιμαστική σελίδα > Επαναφορά για περισσότερες πληροφορίες και οδηγίες. Για να καταργήσετε αυτό το μήνυμα, είτε μετακινήστε τα αρχεία όπως υποδεικνύεται σε αυτήν τη σελίδα είτε απεγκαταστήστε το πρόσθετο Messaging.");
jr_define('MESSAGING_SYSTEM_BSVERSION_WARNING',"Λυπούμαστε, το σύστημα ανταλλαγής μηνυμάτων Jomres λειτουργεί μόνο σε ιστότοπους με θέματα/πρότυπα που υποστηρίζουν το Bootstrap 5 και όπου η ρύθμιση Site Configuration > Διάφορα καρτέλα > Έκδοση Bootstrap έχει οριστεί σε Bootstrap 5 ή Nomeot." );