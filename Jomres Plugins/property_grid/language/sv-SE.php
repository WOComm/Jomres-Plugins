<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.24.0
 *
 * @copyright	2005-2021 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/
//#################################################################
defined('_JOMRES_INITCHECK') or die('');
//#################################################################
	jr_define( '_JOMRES_SHORTCODES_06000PROPERTY_GRID', "Egenskapsrutnät. Visar en rad med egenskaper, perfekt för en målsida." );

	jr_define( '_JOMRES_SHORTCODES_06000PROPERTY_GRID_PROPERTY_UIDS', "Använd antingen property_uids eller property_cols. property_uids accepterar en kommaseparerad lista över egenskaps-uids som du vill visa. Maximalt 6 egenskaper kan visas" );
	jr_define( '_JOMRES_SHORTCODES_06000PROPERTY_GRID_PROPERTY_COLS', "Alternativt, välj ett antal kolumner att visa mellan 1 och 6. Slumpmässiga egenskaper kommer att väljas från databasen som ska visas." );