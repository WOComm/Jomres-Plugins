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
##################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
##################################################################




jr_define('_JOMRES_DATAWIPE_TITLE',"Gegevens wissen");
jr_define('_JOMRES_DATAWIPE_DESC',"Met deze functie kunt u gegevens verwijderen die zijn verzameld bij het maken van boekingen. Het is bedoeld voor gebruik door ontwikkelaars die veel ontwikkelingsgegevens op hun installaties hebben gemaakt (zoals testboekingen, abonnementen) en die wist de informatie uit het systeem, terwijl de eigendoms- en tariefinformatie behouden blijft.<br/> De plug-in verwijdert ALLE cron-logs, gebruikersfavorieten, notities, boekingen, facturen, abonnees, abonnementen, gasten, auditgegevens, klikaantallen en beoordelingen." );
jr_define('_JOMRES_DATAWIPE_WARNING',"Deze gegevens kunnen alleen worden opgehaald uit een reservekopie van uw systeem, dus u moet begrijpen dat dit een zeer schadelijk script is. Als gevolg hiervan wordt aanbevolen dat u het eenmaal hebt gebruikt waarvoor het bedoeld is doel dat u het daarna weer verwijdert.");
jr_define('_JOMRES_DATAWIPE_GO',"Klik om gegevens te wissen");
jr_define('_JOMRES_DATAWIPE_EMPTYING',"Leegmakend ");
jr_define('_JOMRES_DATAWIPE_EMPTYING_SUCCESS',"Succesvol geleegd.");
jr_define('_JOMRES_DATAWIPE_EMPTYING_FAILURE',"Kan de tabel niet legen.");