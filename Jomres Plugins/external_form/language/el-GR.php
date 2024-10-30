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
jr_define ("EXTERNAL_FORM", "External Form");
jr_define ('EXTERNAL_FORM_PLUGIN_SHORTCODE', 'Shortcode Plugin (π.χ. "rsform")');
jr_define ('EXTERNAL_FORM_PLUGIN_ARG1', 'Argument 1 (π.χ. "1")');
jr_define ('EXTERNAL_FORM_PLUGIN_ARG2', "Επιχείρημα 2 (προαιρετικό)");
jr_define('EXTERNAL_FORM_INFO',"Σας επιτρέπει να συμπεριλάβετε μια φόρμα από μια εξωτερική προσθήκη φόρμας στις καρτέλες των λεπτομερειών της ιδιότητας. Ορίστε τον σύντομο κώδικα προσθήκης σε κάτι σαν 'rsform' και προσθέστε επιπλέον ορίσματα όπως απαιτείται. Δεν χρειάζεται να είναι μια μορφή, μπορεί να είναι οτιδήποτε ονομάζεται mambot, αλλά μια μορφή θα ήταν μια τυπική χρήση.");