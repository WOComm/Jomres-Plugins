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

jr_define('JOMRES_COUPONS_SCAN',"Zeskanuj ten kod do telefonu i zarezerwuj teraz!");
jr_define('JOMRES_COUPONS_GETADISCOUNT',"Uzyskaj zniżkę w wysokości");
jr_define('JOMRES_COUPONS_PERCENT',"%");
jr_define('JOMRES_COUPONS_OFFACCOMMODATION',"poniżej kosztów zakwaterowania");
jr_define('JOMRES_COUPONS_IFYOUBOOKBETWEEN',"jeśli zarezerwujesz między");
jr_define('JOMRES_COUPONS_AND'," i ");
jr_define('JOMRES_COUPONS_FORDATESBETWEEN'," dla dat pomiędzy ");
jr_define('JOMRES_COUPONS_ALTERNATIVELY',"Alternatywnie wprowadź ten kod rabatowy podczas dokonywania rezerwacji: ");
jr_define('JOMRES_COUPONS_PRINT_COUPONS',"Drukuj kupony");

jr_define('_JRPORTAL_COUPONS_BOOKING_VALIDFROM', 'Rezerwacja ważna od');
jr_define('_JRPORTAL_COUPONS_BOOKING_VALIDTO', 'Rezerwacja ważna do');
jr_define('_JRPORTAL_COUPONS_GUESTNAME', 'Nazwa gościa');
jr_define('_JRPORTAL_COUPONS_DESC_478', "Kody rabatowe mogą być generowane i przekazywane gościom jako zachęta do dokonywania rezerwacji.<br/>
Terminy Ważność od i do odnoszą się do dat, w których można dokonać rezerwacji, natomiast Rezerwacje ważne od/do odnoszą się do dat, które musi obejmować rezerwacja, aby kupon był ważny. Jeśli rezerwacja wypada poza tym okresem, normalne stawki będą obowiązywać w dniach poza tym okresem.<br/>
Jeśli chcesz, aby rezerwacja była dostępna dla jednego konkretnego gościa, wybierz nazwisko tego gościa z listy rozwijanej, aby ograniczyć kupon tylko do tego gościa.");
jr_define('_JRPORTAL_COUPONS_DESC_ADMIN', "Utworzone tutaj kody rabatowe będą miały zastosowanie do wszystkich usług w witrynie.");
jr_define('_JRPORTAL_COUPONS_BOOKING_DISCOUNT_FEEDBACK', 'Z Twoim kuponem ta rezerwacja została obniżona z ');
jr_define('_JRPORTAL_COUPONS_BOOKING_DISCOUNT_FEEDBACK_TO', ' do ');