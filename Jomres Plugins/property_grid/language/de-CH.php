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

	jr_define( '_JOMRES_SHORTCODES_06000PROPERTY_GRID', "Eigenschaftenraster. Zeigt eine Reihe von Eigenschaften an, ideal für eine Zielseite." );

	jr_define( '_JOMRES_SHORTCODES_06000PROPERTY_GRID_PROPERTY_UIDS', "Verwenden Sie entweder property_uids oder property_cols. property_uids akzeptiert eine durch Kommas getrennte Liste von Eigenschafts-UIDs, die Sie anzeigen möchten. Es können maximal 6 Eigenschaften angezeigt werden" );
	jr_define( '_JOMRES_SHORTCODES_06000PROPERTY_GRID_PROPERTY_COLS', "Wählen Sie alternativ eine Anzahl von anzuzeigenden Spalten zwischen 1 und 6. Zufällige anzuzeigende Eigenschaften werden aus der Datenbank ausgewählt." );