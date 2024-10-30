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


jr_define ('EXTERNAL_FORM', "Ekstern form");
jr_define ('EXTERNAL_FORM_PLUGIN_SHORTCODE', 'Plugin shortcode (e.g. "rsform")');
jr_define ('EXTERNAL_FORM_PLUGIN_ARG1', 'Argument 1 (f.eks. "1")');
jr_define ('EXTERNAL_FORM_PLUGIN_ARG2', "Argument 2 (valgfrit)");
jr_define ('EXTERNAL_FORM_INFO', "Giver dig mulighed for at medtage en formular fra et eksternt formular -plugin i fanerne i ejendomsdetaljerne. Indstil plugin -kortkoden til noget som 'rsform' og tilføj ekstra argumenter efter behov. Behøver ikke at være en form, kan være alt, hvad der kaldes som en mambot, men en form ville være en typisk brug. ");