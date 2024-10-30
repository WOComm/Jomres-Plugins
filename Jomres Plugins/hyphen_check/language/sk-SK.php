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

jr_define('TOOL_HYPHEN_CHECK_TITLE',"Kontrola spojovníka");
jr_define('TOOL_HYPHEN_CHECK_DESCRIPTION',"Tento nástroj je určený na kontrolu všetkých oneskorení vlastností a dlhých polí. Niektoré môžu mať nesprávne html entity v poliach lat alebo long namiesto skutočných pomlčiek. Ak sa nájde, tento nástroj ich prevedie na pomlčky.");
jr_define('TOOL_HYPHEN_CHECK_DONE_SOMEFOUND',"Našli sa niektoré vlastnosti s html entitami, ktoré boli teraz skonvertované na skutočné pomlčky. Počet prevedených vlastností je ");
jr_define('TOOL_HYPHEN_CHECK_DONE_NONEFOUND',"Všetko je v poriadku, nenašli sa žiadne vlastnosti s html entitami, kde by mali byť skutočné pomlčky.");