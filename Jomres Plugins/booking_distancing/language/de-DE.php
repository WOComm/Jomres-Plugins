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
jr_define('_JOMRES_QBLOCK_TITLE',"Buchungsdistanzierung");
jr_define('_JOMRES_QBLOCK_SETTING',"Buchungsdistanzierung aktivieren?");
jr_define('_JOMRES_QBLOCK_DESCRIPTION',"Mit dieser Einstellung können Sie die Buchungsdistanzierung aktivieren. Wenn aktiviert, wird vor und nach jeder Buchung eine schwarze Buchung für N Tage erstellt, die Ihnen Zeit gibt, um sicherzustellen, dass die Unterkunft vor dem nächsten Gast gründlich gereinigt wurde kommt an.");
jr_define('_JOMRES_QBLOCK_BLACKBOOKING_NOTE',"Buchungsabstand für Buchungs-ID ");
jr_define('_JOMRES_QBLOCK_DAYS',"Anzahl der zu blockierenden Tage");
jr_define('_JOMRES_QBLOCK_DAYS_DESC',"Für wie viele Tage soll der Raum/das Objekt gesperrt werden?");