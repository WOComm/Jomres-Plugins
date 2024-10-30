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


jr_define ('_JOMRES_DATAWIPE_TITLE', "Datasletning");
jr_define ('_JOMRES_DATAWIPE_DESC', "Denne funktion giver dig mulighed for at slette data, der indsamles, når bookinger foretages. Den er beregnet til brug af udviklere, der har oprettet en masse udviklingsdata på deres installationer (f.eks. testbookinger, abonnementer) og ønsker at slette oplysningerne fra systemet, samtidig med at ejendoms- og toldoplysninger bevares. <br/> Pluginet fjerner ALLE cron -logfiler, brugerfavoritter, noter, bookinger, fakturaer, abonnenter, abonnementer, gæster, revisionsdata, kliktællinger og anmeldelser. " );
jr_define ('_JOMRES_DATAWIPE_WARNING', "Disse data kan kun hentes fra en sikkerhedskopi af dit system, så du skal forstå, at dette er et meget skadeligt script. Som et resultat anbefales det, at når du har brugt det til det, det er beregnet til formål, at du afinstallerer det igen bagefter. ");
jr_define ('_JOMRES_DATAWIPE_GO', "Klik for at slette data");
jr_define ('_JOMRES_DATAWIPE_EMPTYING', "Tømning");
jr_define ('_JOMRES_DATAWIPE_EMPTYING_SUCCESS', "Tømt med succes.");
jr_define ('_JOMRES_DATAWIPE_EMPTYING_FAILURE', "Kunne ikke tømme tabellen.");