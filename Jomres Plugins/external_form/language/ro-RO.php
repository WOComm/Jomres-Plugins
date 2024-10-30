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


jr_define ('EXTERNAL_FORM', "Formular extern");
jr_define ('EXTERNAL_FORM_PLUGIN_SHORTCODE', 'Cod scurt al pluginului (de ex. "rsform")');
jr_define ('EXTERNAL_FORM_PLUGIN_ARG1', 'Argument 1 (de ex. "1")');
jr_define ('EXTERNAL_FORM_PLUGIN_ARG2', "Argument 2 (opțional)");
jr_define ('EXTERNAL_FORM_INFO', "Vă permite să includeți un formular dintr-un plugin de formular extern în filele detaliilor proprietății. Setați codul scurt al pluginului la ceva de genul 'rsform' și adăugați argumente suplimentare după cum este necesar. Nu trebuie să fie un forma, poate fi orice se numește mambot, dar o formă ar fi o utilizare tipică. ");