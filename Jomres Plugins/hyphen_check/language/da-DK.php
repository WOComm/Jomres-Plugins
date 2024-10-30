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


jr_define('TOOL_HYPHEN_CHECK_TITLE',"Bindstreg check");
jr_define('TOOL_HYPHEN_CHECK_DESCRIPTION',"Dette værktøj er designet til at kontrollere alle egenskabsforsinkelser og lange felter. Nogle kan fejlagtigt have html-enheder i lat- eller lange-felterne i stedet for faktiske bindestreger. Hvor det findes, konverterer dette værktøj dem til bindestreger.");
jr_define('TOOL_HYPHEN_CHECK_DONE_SOMEFOUND',"Nogle egenskaber fundet med html-enheder, som nu er blevet konverteret til faktiske bindestreger. Antallet af egenskaber konverteret er ");
jr_define('TOOL_HYPHEN_CHECK_DONE_NONEFOUND',"Alt er godt, ingen egenskaber blev fundet med html-enheder, hvor de faktiske bindestreger skulle være.");