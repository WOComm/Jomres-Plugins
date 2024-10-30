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
jr_define ('TOOL_HYPHEN_CHECK_TITLE', "Bindestrekksjekk");
jr_define('TOOL_HYPHEN_CHECK_DESCRIPTION',"Dette verktøyet er laget for å sjekke alle egenskapsforsinkelser og lange felt. Noen kan feilaktig ha html-enheter i lat- eller lange-feltene i stedet for faktiske bindestreker. Hvor det finnes, konverterer dette verktøyet disse til bindestreker.");
jr_define('TOOL_HYPHEN_CHECK_DONE_SOMEFOUND',"Noen egenskaper funnet med html-enheter, som nå er konvertert til faktiske bindestreker. Antall eiendommer som er konvertert er ");
jr_define('TOOL_HYPHEN_CHECK_DONE_NONEFOUND',"Alt er bra, ingen egenskaper ble funnet med html-enheter der faktiske bindestreker skal være.");