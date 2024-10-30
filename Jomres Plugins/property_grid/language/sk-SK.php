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
	jr_define( '_JOMRES_SHORTCODES_06000PROPERTY_GRID', "Mrežka vlastností. Zobrazuje rad vlastností, ideálne pre vstupnú stránku." );

	jr_define( '_JOMRES_SHORTCODES_06000PROPERTY_GRID_PROPERTY_UIDS', "Použite buď property_uids alebo property_cols. property_uids akceptuje čiarkami oddelený zoznam uid vlastností, ktoré chcete zobraziť. Môže sa zobraziť maximálne 6 vlastností" );
	jr_define( '_JOMRES_SHORTCODES_06000PROPERTY_GRID_PROPERTY_COLS', "Alternatívne vyberte počet stĺpcov na zobrazenie medzi 1 a 6. Z databázy budú vybrané náhodné vlastnosti, ktoré sa majú zobraziť." );