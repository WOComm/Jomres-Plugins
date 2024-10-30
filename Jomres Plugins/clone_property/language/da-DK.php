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


jr_define ('_JRPORTAL_CLONEPROPERTY_TITLE', "Clone property");
jr_define ('_JRPORTAL_CLONEPROPERTY_CHOOSEPROPERTY', "Vælg den ejendom, du vil klone:");
jr_define ('_JRPORTAL_CLONEPROPERTY_NEWPROPERTY_NAME', "Ny ejendoms navn:");
jr_define ('_JRPORTAL_CLONEPROPERTY_NOTES', "Vær opmærksom på, at klonegenskaber ikke har nogen takster, du bør bruge klonpriser -plugin'et, hvis du ønsker at kopiere takster eller oprette tarifferne manuelt. Ingen plugin -indstillinger importeres, hvis de er tilgængelige. Ejendommen er ikke krydsrefereret med eventuelle ejendomsadministratorer. <br/> Clone Property bør kun bruges til at kopiere en ejendom, når den nye ejendom derefter vil bruge den samme ejendomstype og værelsestype. ");
jr_define ('_JRPORTAL_CLONEPROPERTY_DONE', "Ejendom klonet");