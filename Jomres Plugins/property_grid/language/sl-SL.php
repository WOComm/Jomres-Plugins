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

	jr_define( '_JOMRES_SHORTCODES_06000PROPERTY_GRID', "Mreža lastnosti. Prikaže vrstico lastnosti, idealno za ciljno stran." );

	jr_define( '_JOMRES_SHORTCODES_06000PROPERTY_GRID_PROPERTY_UIDS', "Uporabite lastnost_uids ali lastnost_cols. property_uids sprejema seznam uid-jev lastnosti, ločenih z vejicami, ki jih želite prikazati. Prikazanih je lahko največ 6 lastnosti" );
	jr_define( '_JOMRES_SHORTCODES_06000PROPERTY_GRID_PROPERTY_COLS', "Izberete lahko tudi število stolpcev za prikaz med 1 in 6. Naključne lastnosti bodo izbrane iz baze podatkov, ki bo prikazana." );