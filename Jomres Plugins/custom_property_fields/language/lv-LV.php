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

jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_TITLE', "Pielāgota īpašuma lauki");
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_TITLE_EDIT', "Rediģēt pielāgoto rekvizītu lauku");
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_INFO', "Izmantojiet šo līdzekli, lai īpašumiem izveidotu pielāgotus informācijas laukus. Šo informāciju pievieno īpašuma pārvaldnieks un tā tiek parādīta jaunā cilnē īpašuma informācijas lapā.");
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_MANAGER_TITLE', "Cita informācija par īpašumu");
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_INSTRUCTIONS', "Šos pielāgotos rekvizītu laukus var parādīt rekvizītu detaļās atsevišķā cilnē vai īpašumu sarakstā. Jums būs manuāli jārediģē /".JOMRES_ROOT_DIRECTORY."/core-plugins/custom_property_fields/templates/tabcontent_01_custom_property_fields.html (for the property details tab) and/or /".JOMRES_ROOT_DIRECTORY."/core-plugins/custom_property_fields/templates/propertylist_custom_property_fields.html (rekvizītu saraksta fragmentam), lai sasniegtu vajadzīgo izkārtojumu. Izmantojot laukus, kas ievadīti iepriekš, pamata izkārtojums izskatītos apmēram šādi, un to var izmantot kā piemēru, no kura jūs varat izveidot savu izkārtojumu. ");