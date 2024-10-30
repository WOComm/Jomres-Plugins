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

jr_define('EXTERNAL_FORM',"Modulo esterno");
jr_define('EXTERNAL_FORM_PLUGIN_SHORTCODE','Shortcode del plugin (es. "rsform")');
jr_define('EXTERNAL_FORM_PLUGIN_ARG1','Argomento 1 (es. "1")');
jr_define('EXTERNAL_FORM_PLUGIN_ARG2',"Argomento 2 (opzionale)");
jr_define('EXTERNAL_FORM_INFO',"Ti consente di includere un modulo da un plug-in di moduli esterno nelle schede dei dettagli della proprietà. Imposta lo shortcode del plug-in su qualcosa come 'rsform' e aggiungi argomenti extra se necessario. Non deve essere un form, può essere qualsiasi cosa si chiami mambot, ma un form sarebbe un uso tipico.");