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

jr_define('TOOL_HYPHEN_CHECK_TITLE',"Controllo trattino");
jr_define('TOOL_HYPHEN_CHECK_DESCRIPTION',"Questo strumento è progettato per controllare tutti i lag di proprietà e i campi long. Alcuni potrebbero avere erroneamente entità html nei campi lat o long invece dei veri trattini. Dove trovato questo strumento li converte in trattini.");
jr_define('TOOL_HYPHEN_CHECK_DONE_SOMEFOUND',"Alcune proprietà trovate con entità html, che ora sono state convertite in veri trattini. Il numero di proprietà convertite è ");
jr_define('TOOL_HYPHEN_CHECK_DONE_NONEFOUND',"Va tutto bene, non sono state trovate proprietà con entità html dove dovrebbero essere i trattini.");