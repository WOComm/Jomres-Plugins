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

jr_define ('_JOMRES_QBLOCK_TITLE', "vzdialenosť od rezervácie");
jr_define ('_JOMRES_QBLOCK_SETTING', "Povoliť rezervovanie vzdialenosti?");
jr_define ('_JOMRES_QBLOCK_DESCRIPTION', "Toto nastavenie vám umožňuje povoliť dištancovanie sa od rezervácie. Keď je táto možnosť povolená, pred a po každej rezervácii sa potom vytvorí čierna rezervácia na N dní, čo vám poskytne čas na zabezpečenie dôkladného vyčistenia objektu pred ďalším hosťom. prichádza. ");
jr_define ('_JOMRES_QBLOCK_BLACKBOOKING_NOTE', "vzdialenosť od rezervácie pre ID rezervácie");
jr_define ('_JOMRES_QBLOCK_DAYS', "Počet dní na zablokovanie");
jr_define ('_JOMRES_QBLOCK_DAYS_DESC', "Na koľko dní by mala byť miestnosť/nehnuteľnosť zablokovaná?");