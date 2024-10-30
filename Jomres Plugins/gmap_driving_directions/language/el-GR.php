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
jr_define('_JRPORTAL_GMAPS_DD_YES',"Ναι");
jr_define('_JRPORTAL_GMAPS_DD_NO',"Όχι");
jr_define('_GOOGLE_ADDRESS' , "Διεύθυνση");
jr_define('_GOOGLE_INPUT_FIELDSET_POSTALCODE' , "Ταχυδρομικός κώδικας");
jr_define ('_GOOGLE_INPUT_FIELDSET_TOWN', "Πόλη");
jr_define('_GOOGLE_INITIALIZE_ERROR1',"Μέγιστος αριθμός 9 σημείων διαδρομής έχει επιτευχθεί");
jr_define('_GOOGLE_INITIALIZE_ERROR2',"Η Google δεν μπόρεσε να υπολογίσει τις οδηγίες για αυτήν τη διαδρομή και τις επιλεγμένες επιλογές");
jr_define ('_GOOGLE_DIRECTION_PRINT', "Εκτύπωση οδηγιών");
jr_define('_GOOGLE_ROUTEPLANNING',"Σχεδιάστε τη διαδρομή σας προς το ");
jr_define('_GOOGLE_ROUTEPLANNING_HYOURLOCATION',"Η τοποθεσία σας (σημείο εκκίνησης διαδρομής)");
jr_define('_GOOGLE_ROUTEPLANNING_HROUTEOPTIONS' , "Επιλογές διαδρομής");
jr_define('_GOOGLE_ROUTEPLANNING_HOPTIMIZEFOR' , "Βελτιστοποίηση για");
jr_define('_GOOGLE_ROUTEPLANNING_HDRIVING' , "Οδήγηση");
jr_define ('_GOOGLE_ROUTEPLANNING_HWALKING', "Walking");
jr_define('_GOOGLE_ROUTEPLANNING_HCYCLING' , "Ποδηλασία");
jr_define ('_GOOGLE_ROUTEPLANNING_HHIGHWAYS', "Αποφύγετε τους αυτοκινητόδρομους");
jr_define('_GOOGLE_ROUTEPLANNING_HTOLLS' , "Αποφυγή διοδίων");
jr_define('_GOOGLE_SELECT_BUTTON' , "Λήψη οδηγιών");
jr_define('_GOOGLE_SELECT_RESETMAP' , "Επαναφορά χάρτη");
jr_define('_GOOGLE_ROUTEPLANNING_INSTRUCTIONS',"Ο προορισμός σας (σημείο λήξης διαδρομής) έχει ήδη σημειωθεί στον χάρτη. Εισαγάγετε την τοποθεσία σας και επιλέξτε τις επιλογές διαδρομής για να λάβετε οδηγίες προς το σημείο προορισμού. Μπορείτε επίσης να κάνετε κλικ στον χάρτη για να επιλέξετε έως και 9 σημεία διαδρομής από το σημείο εκκίνησης μέχρι το σημείο προορισμού.");