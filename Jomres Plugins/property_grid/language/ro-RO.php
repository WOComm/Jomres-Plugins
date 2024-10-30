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
	jr_define( '_JOMRES_SHORTCODES_06000PROPERTY_GRID', "Grilă de proprietăți. Afișează un rând de proprietăți, ideal pentru o pagină de destinație." );

	jr_define( '_JOMRES_SHORTCODES_06000PROPERTY_GRID_PROPERTY_UIDS', "Utilizați fie property_uids, fie property_cols. property_uids acceptă o listă separată prin virgulă de uid-uri de proprietate pe care doriți să le afișați. Pot fi afișate maximum 6 proprietăți" );
	jr_define( '_JOMRES_SHORTCODES_06000PROPERTY_GRID_PROPERTY_COLS', "Alternativ, alegeți un număr de coloane de afișat între 1 și 6. Proprietățile aleatorii vor fi selectate din baza de date pentru a fi afișate." );