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

jr_define('_PAGEVIEW_RECORDER_ENABLED',"Registra tutte le visualizzazioni di pagina in db?");
jr_define('_PAGEVIEW_RECORDER_DESC',"Se abilitato, tutte le visualizzazioni di pagina verranno registrate nel database. ATTENZIONE! La tabella delle visualizzazioni di pagina del database potrebbe diventare molto grande in un brevissimo lasso di tempo! Usare con cautela.");