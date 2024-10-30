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
jr_define('_JRPORTAL_GMAPS_DD_YES',"Ja");
jr_define('_JRPORTAL_GMAPS_DD_NO',"Nein");
jr_define('_GOOGLE_ADDRESS',"Adresse");
jr_define('_GOOGLE_INPUT_FIELDSET_POSTALCODE',"Postleitzahl");
jr_define('_GOOGLE_INPUT_FIELDSET_TOWN',"Stadt");
jr_define('_GOOGLE_INITIALIZE_ERROR1',"Maximale Anzahl von 9 Wegpunkten erreicht");
jr_define('_GOOGLE_INITIALIZE_ERROR2',"Google konnte die Wegbeschreibung für diese Route und die ausgewählten Optionen nicht berechnen");
jr_define('_GOOGLE_DIRECTION_PRINT',"Anfahrtsbeschreibung drucken");
jr_define('_GOOGLE_ROUTEPLANNING',"Planen Sie Ihre Route nach ");
jr_define('_GOOGLE_ROUTEPLANNING_HYOURLOCATION',"Ihr Standort (Startpunkt der Route)");
jr_define('_GOOGLE_ROUTEPLANNING_HROUTEOPTIONS',"Routenoptionen");
jr_define('_GOOGLE_ROUTEPLANNING_HOPTIMIZEFOR',"Optimieren für");
jr_define('_GOOGLE_ROUTEPLANNING_HDRIVING',"Fahren");
jr_define('_GOOGLE_ROUTEPLANNING_HWALKING',"Gehen");
jr_define('_GOOGLE_ROUTEPLANNING_HCYCLING',"Radfahren");
jr_define('_GOOGLE_ROUTEPLANNING_HHIGHWAYS',"Autobahnen vermeiden");
jr_define('_GOOGLE_ROUTEPLANNING_HTOLLS',"Maut vermeiden");
jr_define('_GOOGLE_SELECT_BUTTON',"Route abrufen");
jr_define('_GOOGLE_SELECT_RESETMAP',"Karte zurücksetzen");
jr_define('_GOOGLE_ROUTEPLANNING_INSTRUCTIONS',"Ihr Ziel (Routenendpunkt) ist bereits auf der Karte markiert. Bitte geben Sie Ihren Standort ein und wählen Sie Ihre Routenoptionen, um eine Wegbeschreibung zum Zielpunkt zu erhalten. Sie können auch auf die Karte klicken, um bis zu 9 . auszuwählen Wegpunkte von Ihrem Startpunkt zum Zielpunkt.");