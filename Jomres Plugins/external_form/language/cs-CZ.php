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
jr_define ('EXTERNAL_FORM', "Externí formulář");
jr_define ('EXTERNAL_FORM_PLUGIN_SHORTCODE', 'Plugin shortcode (např. "rsform")');
jr_define ('EXTERNAL_FORM_PLUGIN_ARG1', 'Argument 1 (např. "1")');
jr_define ('EXTERNAL_FORM_PLUGIN_ARG2', "Argument 2 (volitelně)");
jr_define ('EXTERNAL_FORM_INFO', "Umožňuje zahrnout formulář z doplňku externího formuláře do záložek podrobností vlastnosti. Nastavte krátký kód pluginu na něco jako 'rsform' a podle potřeby přidejte další argumenty. Nemusí to být forma může být cokoli, čemu se říká mambot, ale forma by byla typickým použitím. ");