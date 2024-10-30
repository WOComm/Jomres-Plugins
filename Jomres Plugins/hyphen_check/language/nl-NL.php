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
##################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
##################################################################



jr_define('TOOL_HYPHEN_CHECK_TITLE',"Afbreekstreepje controleren");
jr_define('TOOL_HYPHEN_CHECK_DESCRIPTION',"Deze tool is ontworpen om alle eigenschapsvertragingen en lange velden te controleren. Sommige kunnen ten onrechte html-entiteiten in de lat- of lange velden hebben in plaats van echte koppeltekens. Waar gevonden, converteert deze tool die naar koppeltekens.");
jr_define('TOOL_HYPHEN_CHECK_DONE_SOMEFOUND',"Sommige eigenschappen gevonden met html-entiteiten, die nu zijn geconverteerd naar echte koppeltekens. Het aantal geconverteerde eigenschappen is ");
jr_define('TOOL_HYPHEN_CHECK_DONE_NONEFOUND',"Alles is goed, er zijn geen eigenschappen gevonden met html-entiteiten waar daadwerkelijke koppeltekens zouden moeten staan.");
