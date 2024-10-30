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

jr_define ('EXTERNAL_FORM', "Externý formulár");
jr_define ('EXTERNAL_FORM_PLUGIN_SHORTCODE', 'Plugin shortcode (napr. "rsform")');
jr_define ('EXTERNAL_FORM_PLUGIN_ARG1', 'argument 1 (napr. "1")');
jr_define ('EXTERNAL_FORM_PLUGIN_ARG2', "Argument 2 (voliteľné)");
jr_define ('EXTERNAL_FORM_INFO', "Umožňuje vám zahrnúť formulár z doplnku externého formulára na karty podrobností vlastníctva. Nastavte krátky kód doplnku na niečo ako 'rsform' a podľa potreby pridajte ďalšie argumenty. Nemusí to byť forma, môže to byť čokoľvek, čo sa nazýva mambot, ale forma by bola typickým použitím. ");