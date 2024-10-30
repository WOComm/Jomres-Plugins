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
jr_define('TOOL_HYPHEN_CHECK_TITLE',"Bindestrichprüfung");
jr_define('TOOL_HYPHEN_CHECK_DESCRIPTION',"Dieses Tool wurde entwickelt, um alle Property-Lag- und Long-Felder zu überprüfen. Einige haben möglicherweise fälschlicherweise HTML-Entitäten in den Lat- oder Long-Feldern anstelle von tatsächlichen Bindestrichen. Wo gefunden, wandelt dieses Tool diese in Bindestriche um.");
jr_define('TOOL_HYPHEN_CHECK_DONE_SOMEFOUND',"Einige Eigenschaften mit HTML-Entitäten gefunden, die jetzt in tatsächliche Bindestriche umgewandelt wurden. Die Anzahl der konvertierten Eigenschaften ist ");
jr_define('TOOL_HYPHEN_CHECK_DONE_NONEFOUND',"Alles ist gut, es wurden keine Eigenschaften mit HTML-Entitäten gefunden, wo die eigentlichen Bindestriche sein sollten.");