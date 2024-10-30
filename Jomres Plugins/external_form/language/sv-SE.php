<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.24.0
 *
 * @copyright	2005-2021 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/
//#################################################################
defined('_JOMRES_INITCHECK') or die('');
//#################################################################


jr_define ('EXTERNAL_FORM', "Extern form");
jr_define ('EXTERNAL_FORM_PLUGIN_SHORTCODE', 'Plugin shortcode (t.ex. "rsform")');
jr_define ('EXTERNAL_FORM_PLUGIN_ARG1', 'Argument 1 (t.ex. "1")');
jr_define ('EXTERNAL_FORM_PLUGIN_ARG2', "Argument 2 (valfritt)");
jr_define ('EXTERNAL_FORM_INFO', "Gör att du kan inkludera ett formulär från ett externt formulärplugin i flikarna i fastighetsinformationen. Ställ in plugin -kortkoden till något som rsform och lägg till extra argument efter behov. Behöver inte vara en form, kan vara vad som helst som kallas en mambot, men en form skulle vara en typisk användning. ");