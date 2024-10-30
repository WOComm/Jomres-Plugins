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
	jr_define( '_JOMRES_SHORTCODES_06000PROPERTY_GRID', "Tulajdonságrács. Tulajdonságok sorát jeleníti meg, ideális céloldalhoz." );

	jr_define( '_JOMRES_SHORTCODES_06000PROPERTY_GRID_PROPERTY_UIDS', "Használja a property_uids-t vagy a property_cols-t. A property_uids elfogadja a megjeleníteni kívánt tulajdonság-uidok vesszővel elválasztott listáját. Legfeljebb 6 tulajdonság jeleníthető meg" );
	jr_define( '_JOMRES_SHORTCODES_06000PROPERTY_GRID_PROPERTY_COLS', "Alternatív megoldásként válassza ki a megjelenítendő oszlopok számát 1 és 6 között. A megjelenítendő adatbázisból véletlenszerű tulajdonságok kerülnek kiválasztásra." );