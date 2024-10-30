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



jr_define ('EXTERNAL_FORM', "Zunanji obrazec");
jr_define ('EXTERNAL_FORM_PLUGIN_SHORTCODE', 'Kratka koda vtičnika (npr. "rsform")');
jr_define ('EXTERNAL_FORM_PLUGIN_ARG1', 'Argument 1 (npr. "1") ');
jr_define ('EXTERNAL_FORM_PLUGIN_ARG2', "Argument 2 (neobvezno)");
jr_define ('EXTERNAL_FORM_INFO', "Omogoča vključitev obrazca iz vtičnika zunanjega obrazca v zavihke podrobnosti o lastnosti. Nastavite kratko kodo vtičnika na nekaj podobnega \"rsform\" in po potrebi dodajte dodatne argumente. Ni nujno, da je form je lahko karkoli, kar se imenuje mambot, vendar bi bila oblika tipična uporaba. ");