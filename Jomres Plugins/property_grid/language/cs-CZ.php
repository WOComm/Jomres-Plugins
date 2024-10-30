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

	jr_define( '_JOMRES_SHORTCODES_06000PROPERTY_GRID', "Mřížka vlastností. Zobrazuje řadu vlastností, ideální pro vstupní stránku." );

	jr_define( '_JOMRES_SHORTCODES_06000PROPERTY_GRID_PROPERTY_UIDS', "Použijte buď property_uids nebo property_cols. property_uids akceptuje čárkami oddělený seznam uid vlastností, které chcete zobrazit. Lze zobrazit maximálně 6 vlastností" );
	jr_define( '_JOMRES_SHORTCODES_06000PROPERTY_GRID_PROPERTY_COLS', "Alternativně zvolte počet sloupců pro zobrazení mezi 1 a 6. Z databáze budou vybrány náhodné vlastnosti, které se zobrazí." );