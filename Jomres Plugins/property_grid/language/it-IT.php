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

	jr_define( '_JOMRES_SHORTCODES_06000PROPERTY_GRID', "Griglia delle proprietà. Visualizza una riga di proprietà, ideale per una pagina di destinazione.");

	jr_define( '_JOMRES_SHORTCODES_06000PROPERTY_GRID_PROPERTY_UIDS', "Usa o property_uids o property_cols. property_uids accetta un elenco separato da virgole di uid di proprietà che vuoi mostrare. È possibile visualizzare un massimo di 6 proprietà");
	jr_define( '_JOMRES_SHORTCODES_06000PROPERTY_GRID_PROPERTY_COLS', "In alternativa, scegli un numero di colonne da mostrare tra 1 e 6. Le proprietà casuali verranno selezionate dal database da mostrare." );