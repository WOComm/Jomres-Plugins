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
jr_define('TOOL_HYPHEN_CHECK_TITLE',"Έλεγχος παύλας");
jr_define('TOOL_HYPHEN_CHECK_DESCRIPTION',"Αυτό το εργαλείο έχει σχεδιαστεί για να ελέγχει όλες τις καθυστερήσεις ιδιοτήτων και τα μεγάλα πεδία. Ορισμένα ενδέχεται να έχουν λανθασμένα οντότητες html στα πεδία lat ή μεγάλα αντί για πραγματικές παύλες. Όπου βρέθηκε, αυτό το εργαλείο μετατρέπει αυτές σε παύλες.");
jr_define('TOOL_HYPHEN_CHECK_DONE_SOMEFOUND',"Βρέθηκαν ορισμένες ιδιότητες με οντότητες html, οι οποίες έχουν πλέον μετατραπεί σε πραγματικές παύλες. Ο αριθμός των ιδιοτήτων που μετατράπηκαν είναι ");
jr_define('TOOL_HYPHEN_CHECK_DONE_NONEFOUND' , "Όλα είναι καλά, δεν βρέθηκαν ιδιότητες με οντότητες html όπου θα έπρεπε να υπάρχουν οι πραγματικές παύλες.");