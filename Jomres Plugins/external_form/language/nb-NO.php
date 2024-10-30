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
jr_define ('EXTERNAL_FORM', "Eksternt skjema");
jr_define ('EXTERNAL_FORM_PLUGIN_SHORTCODE', 'Plugin shortcode (e.g. "rsform")');
jr_define ('EXTERNAL_FORM_PLUGIN_ARG1', 'Argument 1 (f.eks. "1")');
jr_define ('EXTERNAL_FORM_PLUGIN_ARG2', "Argument 2 (valgfritt)");
jr_define ('EXTERNAL_FORM_INFO', "Lar deg inkludere et skjema fra et eksternt skjema -plugin i fanene i eiendomsdetaljene. Sett inn plugin -snarveien til noe som rsform og legg til ekstra argumenter etter behov. Trenger ikke å være en form, kan være hva som helst som kalles en mambot, men en form ville være en typisk bruk. ");