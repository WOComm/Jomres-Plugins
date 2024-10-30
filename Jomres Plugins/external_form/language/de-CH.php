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
jr_define('EXTERNAL_FORM',"Externes Formular");
jr_define('EXTERNAL_FORM_PLUGIN_SHORTCODE','Plugin-Shortcode (z.B. "rsform")');
jr_define('EXTERNAL_FORM_PLUGIN_ARG1','Argument 1 (z.B. "1")');
jr_define('EXTERNAL_FORM_PLUGIN_ARG2',"Argument 2 (optional)");
jr_define('EXTERNAL_FORM_INFO',"Ermöglicht das Einbinden eines Formulars aus einem externen Formular-Plugin in die Registerkarten der Eigenschaftsdetails. Setzen Sie den Plugin-Shortcode auf 'rsform' und fügen Sie nach Bedarf zusätzliche Argumente hinzu Form, kann alles sein, was als Mambot bezeichnet wird, aber eine Form wäre eine typische Verwendung.");