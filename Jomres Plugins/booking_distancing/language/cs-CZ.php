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
jr_define ('_JOMRES_QBLOCK_TITLE', "Vzdálenost při rezervaci");
jr_define ('_JOMRES_QBLOCK_SETTING', "Povolit distancování rezervací?");
jr_define ('_JOMRES_QBLOCK_DESCRIPTION', "Toto nastavení vám umožňuje povolit distancování rezervací. Je -li aktivováno, před a po každé rezervaci se vytvoří černá rezervace na N dní, což vám poskytne čas zajistit, aby byla nemovitost důkladně vyčištěna před dalším hostem přichází. ");
jr_define ('_JOMRES_QBLOCK_BLACKBOOKING_NOTE', "Vzdálenost rezervace pro ID rezervace");
jr_define ('_JOMRES_QBLOCK_DAYS', "počet dní blokování");
jr_define ('_JOMRES_QBLOCK_DAYS_DESC', "Na kolik dní má být místnost/nemovitost zablokována?");