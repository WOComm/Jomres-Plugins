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
	jr_define( '_JOMRES_SHORTCODES_06000PROPERTY_GRID', "Egenskapsrutenett. Viser en rad med egenskaper, ideell for en landingsside." );

	jr_define( '_JOMRES_SHORTCODES_06000PROPERTY_GRID_PROPERTY_UIDS', "Bruk enten property_uids eller property_cols. property_uids aksepterer en kommadelt liste over egenskaps-uids som du ønsker å vise. Maksimalt 6 egenskaper kan vises" );
	jr_define( '_JOMRES_SHORTCODES_06000PROPERTY_GRID_PROPERTY_COLS', "Alternativt, velg et antall kolonner som skal vises mellom 1 og 6. Tilfeldige egenskaper vil bli valgt fra databasen som skal vises." );