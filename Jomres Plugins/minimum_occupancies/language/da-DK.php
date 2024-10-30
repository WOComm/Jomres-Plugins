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


jr_define ('_OCCUPANCIES_TITLE', "Minimum Occupies");

jr_define('_OCCUPANCIES_DESCRIPTION',"Du kan indstille minimumsbelægningsniveauerne for specifikke værelsestyper, hvis du vil sikre dig, at gæsten har valgt et bestemt antal gæstetyper i reservationsformularen, før den relevante værelses- og takstkombination vises." );
jr_define('_OCCUPANCIES_DESCRIPTION_INFO',"Her kan du oprette et minimumsbelægningsniveau for hver værelsestype. En værelse/takstkombination vil ikke blive tilbudt, hvis gæsten ikke har valgt det passende antal gæstetyper. For hver værelsestype skal du vælge antal gæster af en given type, der skal være et minimum i reservationsformularen, før værelsestypen tilbydes. Hvis du er ligeglad med, hvad belægningsniveauet for en værelsestype skal være, så lad den pågældende værelsestypes gæstenummer stå på 0 (nul). ");
jr_define('_OCCUPANCIES_NUMBER_OF_GUESTTYPE',"Gæstetypenummer");
jr_define('_OCCUPANCIES_NO_GUESTTYPES',"Du har ikke oprettet nogen gæstetyper endnu. Opret venligst nogle gæstetyper, før du bruger denne funktion.");

jr_define('_OCCUPANCIES_EDIT',"Rediger minimum belægning for ");