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
jr_define( 'FIREWALL_CHECK', 'Έλεγχος τείχους προστασίας' );
jr_define( 'FIREWALL_CHECK_DESC', 'Αυτή η προσθήκη είναι ένας απλός έλεγχος για να δείτε εάν αυτός ο διακομιστής μπορεί να συνδεθεί με απομακρυσμένες υπηρεσίες. Εάν δεν μπορεί, αυτό μπορεί να υποδηλώνει ότι υπάρχουν κανόνες τείχους προστασίας που εμποδίζουν τα δύο μηχανήματα να μιλούν μεταξύ τους. Εάν υπάρχει είναι, τότε ίσως χρειαστεί να συζητήσετε την προσαρμογή των κανόνων του τείχους προστασίας με τους κεντρικούς υπολογιστές του διακομιστή ιστού σας. Οι απαντήσεις 404 & 403 μπορούν να θεωρηθούν εντάξει επειδή λαμβάνετε απάντηση από την απομακρυσμένη υπηρεσία.' );
jr_define ("FIREWALL_CHECK_REMOTE_SERVICE", "Απομακρυσμένη υπηρεσία");
jr_define( 'FIREWALL_CHECK_STATUSCODE', 'Κωδικός κατάστασης' );
jr_define( 'FIREWALL_CHECK_IP_NUMBER', 'Αριθμός IP' );