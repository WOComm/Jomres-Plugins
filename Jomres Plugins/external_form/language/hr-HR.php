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

jr_define ('EXTERNAL_FORM', "Vanjski obrazac");
jr_define ('EXTERNAL_FORM_PLUGIN_SHORTCODE', 'Kratki kôd dodatka (npr. "rsform")');
jr_define ('EXTERNAL_FORM_PLUGIN_ARG1', 'Argument 1 (npr. "1")');
jr_define ('EXTERNAL_FORM_PLUGIN_ARG2', "Argument 2 (izborno)");
jr_define ('EXTERNAL_FORM_INFO', "Omogućuje vam uključivanje obrasca iz vanjskog dodatka za obrazac u kartice detalja svojstva. Postavite kratki kôd dodatka na nešto poput \"rsform\" i dodajte dodatne argumente po potrebi. Ne mora biti oblik, može biti bilo što što se naziva mambot, ali oblik bi bio tipična upotreba. ");