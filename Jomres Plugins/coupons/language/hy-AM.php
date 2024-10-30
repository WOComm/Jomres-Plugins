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

jr_define ('JOMRES_COUPONS_SCAN', "Szkennelje be ezt a kódot a telefonjába, és foglaljon most!");
jr_define ('JOMRES_COUPONS_GETADISCOUNT', "Kedvezményt kap");
jr_define ('JOMRES_COUPONS_PERCENT', "%");
jr_define ('JOMRES_COUPONS_OFFACCOMMODATION', "a szállás árából");
jr_define ('JOMRES_COUPONS_IFYOUBOOKBETWEEN', "ha között foglalsz");
jr_define ('JOMRES_COUPONS_AND', "és");
jr_define ('JOMRES_COUPONS_FORDATESBETWEEN', "közötti dátumokhoz");
jr_define ('JOMRES_COUPONS_ALTERNATIVELY', "Alternatív megoldásként adja meg ezt a kedvezménykódot a foglalás során:");
jr_define ('JOMRES_COUPONS_PRINT_COUPONS', "Nyomtatási kuponok");

jr_define ('_JRPORTAL_COUPONS_BOOKING_VALIDFROM', 'A foglalás érvényes:');
jr_define ('_JRPORTAL_COUPONS_BOOKING_VALIDTO', 'A foglalás érvényes');
jr_define ('_JRPORTAL_COUPONS_GUESTNAME', 'Vendég neve');
jr_define ('_JRPORTAL_COUPONS_DESC_478', "Kedvezménykódok generálhatók és továbbíthatók a vendégeknek a foglalás ösztönzésére. <br/>
Érvényes dátum és dátum azokra a dátumokra vonatkozik, amelyeken a foglalás végrehajtható, míg a dátumtól kezdve érvényes foglalás azokra a dátumokra vonatkozik, amelyeket a foglalásnak le kell fednie, hogy a kupon érvényes legyen. Ha a foglalás ezen az időszakon kívül esik, akkor az adott időszakon kívüli napokra a normál árak érvényesek. <br/>
Ha azt szeretné, hogy a foglalás csak egy bizonyos vendég számára legyen elérhető, válassza ki a vendég nevét a legördülő menüből, hogy a kupont csak erre a vendégre korlátozza. ");
jr_define ('_JRPORTAL_COUPONS_DESC_ADMIN', "Az itt létrehozott kedvezménykódok a webhely összes ingatlanára érvényesek lesznek.");
jr_define ('_JRPORTAL_COUPONS_BOOKING_DISCOUNT_FEEDBACK', 'A kuponnal ezt a foglalást kedvezményes áron');
jr_define ('_JRPORTAL_COUPONS_BOOKING_DISCOUNT_FEEDBACK_TO', ' to ');