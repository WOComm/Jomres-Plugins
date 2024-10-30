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
jr_define ('TOOL_HYPHEN_CHECK_TITLE', "Spojovník");
jr_define ('TOOL_HYPHEN_CHECK_DESCRIPTION', "Tento nástroj je určen ke kontrole všech zpoždění vlastností a dlouhých polí. Některé mohou mít nesprávné entity html v polích lat nebo long namísto skutečných spojovníků. Kde je tento nástroj nalezen, převede je na spojovníky.");
jr_define('TOOL_HYPHEN_CHECK_DONE_SOMEFOUND',"Některé vlastnosti nalezené s html entitami, které byly nyní převedeny na skutečné pomlčky. Počet převedených vlastností je ");
jr_define('TOOL_HYPHEN_CHECK_DONE_NONEFOUND',"Vše je v pořádku, nebyly nalezeny žádné vlastnosti s html entitami, kde by měly být skutečné pomlčky.");