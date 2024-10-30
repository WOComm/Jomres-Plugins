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
jr_define('EXTERNAL_FORM',"Formularz zewnętrzny");
jr_define('EXTERNAL_FORM_PLUGIN_SHORTCODE','Skrócony kod wtyczki (np. "rsform")');
jr_define('EXTERNAL_FORM_PLUGIN_ARG1','Argument 1 (np. "1")');
jr_define('EXTERNAL_FORM_PLUGIN_ARG2',"Argument 2 (opcjonalnie)");
jr_define('EXTERNAL_FORM_INFO',"Pozwala na dołączenie formularza z wtyczki formularza zewnętrznego do zakładek szczegółów właściwości. Ustaw krótki kod wtyczki na coś takiego jak 'rsform' i dodaj dodatkowe argumenty w razie potrzeby. Nie musi być forma może być wszystkim, co nazywa się mambotem, ale forma byłaby typowym zastosowaniem.");