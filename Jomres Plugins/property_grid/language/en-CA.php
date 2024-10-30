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


	jr_define( '_JOMRES_SHORTCODES_06000PROPERTY_GRID', "Property grid. Displays a row of properties, ideal for a landing page." );

	jr_define( '_JOMRES_SHORTCODES_06000PROPERTY_GRID_PROPERTY_UIDS', "Use either property_uids or property_cols. property_uids accepts a comma seperated list of property uids that you want to show. A maximum of 6 properties can be shown" );
	jr_define( '_JOMRES_SHORTCODES_06000PROPERTY_GRID_PROPERTY_COLS', "Alternatively, choose a number of columns to show between 1 and 6. Random properties will be selected from the database to be shown." );
