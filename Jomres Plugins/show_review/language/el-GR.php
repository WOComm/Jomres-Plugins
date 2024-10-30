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

jr_define('_JOMRES_SHORTCODES_06000SHOW_SINGLE_REVIEW',"Εμφάνιση μεμονωμένης κριτικής");
jr_define('_JOMRES_SHORTCODES_06000SHOW_SINGLE_REVIEW_ARG_PROPERTY_UID',"Uid ιδιοκτησίας");
jr_define('_JOMRES_SHORTCODES_06000SHOW_SINGLE_REVIEW_ARG_ALT_SCORE_THREASHOLD',"Όριο βαθμολογίας. Εμφάνιση κριτικών μόνο με βαθμολογία >= όριο.");
jr_define('_JOMRES_SHORTCODES_06000SHOW_SINGLE_REVIEW_ARG_ALT_IS_SNIPPET',"(Προαιρετικό) 1 ή 0. Εάν το 1, τότε εμφανίζεται ένα μικρό τμήμα κειμένου, εάν το 0 δείχνει ολόκληρο το τμήμα του κειμένου. Προεπιλογή 0.");
jr_define('_JOMRES_SHORTCODES_0600SHOW_SINGLE_REVIEW_ARG_ALT_REVIEW_ID',"(Προαιρετικό) Αναγνωριστικό αξιολόγησης. Εάν δεν οριστεί, θα εμφανιστεί μια τυχαία αξιολόγηση )");
jr_define('_JOMRES_SHORTCODES_06000SHOW_SINGLE_REVIEW_ARG_ALT_TEMPLATE_PATH',"(Προαιρετικό) Διαδρομή προτύπου. Μπορεί να χρησιμοποιηθεί μόνο όταν περάσει από τη μεταβλητή componentArgs");
jr_define('_JOMRES_SHORTCODES_06000SHOW_SINGLE_REVIEW_ARG_ALT_TEMPLATE_NAME',"(Προαιρετικό) Όνομα προτύπου");