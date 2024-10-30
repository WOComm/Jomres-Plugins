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

	jr_define( '_JOMRES_SHORTCODES_06000PROPERTY_GRID', "Mreža svojstava. Prikazuje red svojstava, idealno za odredišnu stranicu." );

	jr_define( '_JOMRES_SHORTCODES_06000PROPERTY_GRID_PROPERTY_UIDS', "Koristite ili property_uids ili property_cols. property_uids prihvaća popis uid-ova svojstava odvojenih zarezima koje želite prikazati. Može se prikazati najviše 6 svojstava" );
	jr_define( '_JOMRES_SHORTCODES_06000PROPERTY_GRID_PROPERTY_COLS', "Alternativno, odaberite broj stupaca za prikaz između 1 i 6. Nasumična svojstva bit će odabrana iz baze podataka koja će se prikazati." );