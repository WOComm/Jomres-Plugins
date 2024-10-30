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

	jr_define( '_JOMRES_SHORTCODES_06000PROPERTY_GRID', "Ejendomsgitter. Viser en række af egenskaber, ideel til en destinationsside." );

	jr_define( '_JOMRES_SHORTCODES_06000PROPERTY_GRID_PROPERTY_UIDS', "Brug enten property_uids eller property_cols. property_uids accepterer en kommasepareret liste over egenskabs-uids, som du ønsker at vise. Der kan maksimalt vises 6 egenskaber" );
	jr_define( '_JOMRES_SHORTCODES_06000PROPERTY_GRID_PROPERTY_COLS', "Alternativt kan du vælge et antal kolonner, der skal vises mellem 1 og 6. Tilfældige egenskaber vil blive valgt fra databasen, der skal vises." );
