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
jr_define('_JRPORTAL_GMAPS_DD_YES',"Tak");
jr_define('_JRPORTAL_GMAPS_DD_NO',"Nie");
jr_define('_GOOGLE_ADDRESS',"Adres");
jr_define('_GOOGLE_INPUT_FIELDSET_POSTALCODE',"Kod pocztowy");
jr_define('_GOOGLE_INPUT_FIELDSET_TOWN',"Miasto");
jr_define('_GOOGLE_INITIALIZE_ERROR1',"Osiągnięto maksymalną liczbę 9 punktów trasy");
jr_define('_GOOGLE_INITIALIZE_ERROR2',"Google nie może obliczyć wskazówek dojazdu dla tej trasy i wybranych opcji");
jr_define('_GOOGLE_DIRECTION_PRINT',"Drukuj wskazówki");
jr_define('_GOOGLE_ROUTEPLANNING',"Zaplanuj trasę do ");
jr_define('_GOOGLE_ROUTEPLANNING_HYOURLOCATION',"Twoja lokalizacja (punkt początkowy trasy)");
jr_define('_GOOGLE_ROUTEPLANNING_HROUTEOPTIONS',"Opcje trasy");
jr_define('_GOOGLE_ROUTEPLANNING_HOPTIMIZEFOR',"Optymalizuj dla");
jr_define('_GOOGLE_ROUTEPLANNING_HDRIVING',"Jazda");
jr_define('_GOOGLE_ROUTEPLANNING_HWALKING',"Chodzenie");
jr_define('_GOOGLE_ROUTEPLANNING_HCYCLING',"Jazda na rowerze");
jr_define('_GOOGLE_ROUTEPLANNING_HHIGHWAYS',"Unikaj autostrad");
jr_define('_GOOGLE_ROUTEPLANNING_HTOLLS',"Unikaj opłat");
jr_define('_GOOGLE_SELECT_BUTTON',"Wyznacz trasę");
jr_define('_GOOGLE_SELECT_RESETMAP',"Zresetuj mapę");
jr_define('_GOOGLE_ROUTEPLANNING_INSTRUCTIONS',"Twoje miejsce docelowe (punkt końcowy trasy) jest już zaznaczone na mapie. Wprowadź swoją lokalizację i wybierz opcje trasy, aby uzyskać wskazówki dojazdu do punktu docelowego. Możesz także kliknąć mapę, aby wybrać do 9 punkty trasy od punktu początkowego do punktu docelowego.");