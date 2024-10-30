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


jr_define('TOOL_HYPHEN_CHECK_TITLE',"Beststreckkontroll");
jr_define('TOOL_HYPHEN_CHECK_DESCRIPTION',"Det här verktyget är utformat för att kontrollera all egenskapsfördröjning och långa fält. Vissa kan felaktigt ha html-entiteter i lat- eller långa fält istället för faktiska bindestreck. Där det hittas konverterar detta verktyg dessa till bindestreck.");
jr_define('TOOL_HYPHEN_CHECK_DONE_SOMEFOUND',"Vissa egenskaper hittades med html-enheter, som nu har konverterats till faktiska bindestreck. Antalet konverterade egenskaper är ");
jr_define ('TOOL_HYPHEN_CHECK_DONE_NONEFOUND', "Allt är bra, inga egenskaper hittades med html -enheter där faktiska bindestreck ska vara.");