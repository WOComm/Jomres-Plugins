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
jr_define ('EXTERNAL_FORM', "Külső forma");
jr_define ('EXTERNAL_FORM_PLUGIN_SHORTCODE', 'Plugin rövid kódja (pl. "rsform")');
jr_define ('EXTERNAL_FORM_PLUGIN_ARG1', '1 argumentum (pl. "1")');
jr_define ('EXTERNAL_FORM_PLUGIN_ARG2', "2. érv (nem kötelező)");
jr_define ('EXTERNAL_FORM_INFO', "Lehetővé teszi egy űrlap beillesztését egy külső űrlapbővítményből a tulajdonság részletei lapjaira. Állítsa a beépülő modul rövid kódját \"rsform\" -ra, és adjon hozzá további érveket, ha szükséges. Nem szükséges űrlap lehet bármi, amit mambotnak neveznek, de a forma tipikus felhasználás. ");