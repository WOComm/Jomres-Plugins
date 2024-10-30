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
jr_define('_OCCUPANCIES_TITLE',"Mindestbelegung");

jr_define('_OCCUPANCIES_DESCRIPTION',"Sie können die Mindestbelegung für bestimmte Zimmertypen festlegen, wenn Sie sicherstellen möchten, dass der Gast im Buchungsformular eine bestimmte Anzahl von Gasttypen ausgewählt hat, bevor die entsprechende Zimmer- und Tarifkombination angezeigt wird." );
jr_define('_OCCUPANCIES_DESCRIPTION_INFO',"Hier können Sie für jede Zimmerkategorie eine Mindestbelegung festlegen. Eine Zimmer-/Tarifkombination wird nicht angeboten, wenn der Gast nicht die entsprechende Anzahl an Gästetypen ausgewählt hat. Bitte wählen Sie für jede Zimmerkategorie die Anzahl der Gäste einer bestimmten Kategorie, die im Buchungsformular mindestens angegeben werden sollte, bevor die Zimmerkategorie angeboten wird. Wenn Ihnen die Belegung für eine Zimmerkategorie egal ist, lassen Sie die Gästenummer dieser Zimmerkategorie auf 0 (Null). ");
jr_define('_OCCUPANCIES_NUMBER_OF_GUESTTYPE',"Gasttypnummer");
jr_define('_OCCUPANCIES_NO_GUESTTYPES',"Sie haben noch keine Gasttypen erstellt. Bitte erstellen Sie einige Gasttypen, bevor Sie diese Funktion verwenden.");

jr_define('_OCCUPANCIES_EDIT',"Mindestbelegung bearbeiten für ");