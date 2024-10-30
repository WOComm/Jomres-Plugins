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
jr_define ('_JRPORTAL_GMAPS_DD_YES', "Ano");
jr_define('_JRPORTAL_GMAPS_DD_NO',"Ne");
jr_define('_GOOGLE_ADDRESS',"Adresa");
jr_define('_GOOGLE_INPUT_FIELDSET_POSTALCODE',"PSČ");
jr_define('_GOOGLE_INPUT_FIELDSET_TOWN',"Město");
jr_define('_GOOGLE_INITIALIZE_ERROR1',"Dosaženo maximálního počtu 9 navigačních bodů");
jr_define('_GOOGLE_INITIALIZE_ERROR2',"Google nemohl vypočítat trasu pro tuto trasu a vybrané možnosti");
jr_define('_GOOGLE_DIRECTION_PRINT',"Vytisknout trasu");
jr_define('_GOOGLE_ROUTEPLANNING',"Naplánujte si trasu do ");
jr_define('_GOOGLE_ROUTEPLANNING_HYOURLOCATION',"Vaše poloha (počáteční bod trasy)");
jr_define ('_GOOGLE_ROUTEPLANNING_HROUTEOPTIONS', "Možnosti trasy");
jr_define('_GOOGLE_ROUTEPLANNING_HOPTIMIZEFOR',"Optimalizovat pro");
jr_define('_GOOGLE_ROUTEPLANNING_HDRIVING',"Řízení");
jr_define('_GOOGLE_ROUTEPLANNING_HWALKING',"Chůze");
jr_define('_GOOGLE_ROUTEPLANNING_HCYCLING',"Cyklistika");
jr_define('_GOOGLE_ROUTEPLANNING_HHIGHWAYS',"Vyhýbejte se dálnicím");
jr_define ('_GOOGLE_ROUTEPLANNING_HTOLLS', "Vyhněte se mýtnému");
jr_define('_GOOGLE_SELECT_BUTTON',"Zjistit trasu");
jr_define('_GOOGLE_SELECT_RESETMAP',"Resetovat mapu");
jr_define('_GOOGLE_ROUTEPLANNING_INSTRUCTIONS',"Váš cíl (koncový bod trasy) je již označen na mapě. Zadejte prosím svou polohu a zvolte možnosti trasy, abyste získali pokyny k cílovému bodu. Můžete také kliknout na mapu a vybrat až 9 trasové body z vašeho výchozího bodu do cílového bodu.");