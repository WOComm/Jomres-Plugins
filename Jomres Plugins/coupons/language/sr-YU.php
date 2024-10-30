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

jr_define('JOMRES_COUPONS_SCAN',"Skeniraj kod mobilnim telefonom i rezerviši sada!");
jr_define('JOMRES_COUPONS_GETADISCOUNT',"Ostvarite popust od");
jr_define('JOMRES_COUPONS_PERCENT',"%");
jr_define('JOMRES_COUPONS_OFFACCOMMODATION'," na cenu smeštaja");
jr_define('JOMRES_COUPONS_IFYOUBOOKBETWEEN',"ako rezervišete između");
jr_define('JOMRES_COUPONS_AND'," i ");
jr_define('JOMRES_COUPONS_FORDATESBETWEEN'," za datume između ");
jr_define('JOMRES_COUPONS_ALTERNATIVELY',"Takođe, kod sa kupona možete uneti i prilikom pravljenja rezervacije : ");
jr_define('JOMRES_COUPONS_PRINT_COUPONS',"Štampaj kupone");

jr_define('_JRPORTAL_COUPONS_BOOKING_VALIDFROM', 'Rezervacija važi od');
jr_define('_JRPORTAL_COUPONS_BOOKING_VALIDTO', 'rezervacija važi do');
jr_define('_JRPORTAL_COUPONS_GUESTNAME', 'Ime gosta');
jr_define('_JRPORTAL_COUPONS_DESC_478', "Kodovi za popust se mogu generisati i prosleđivati gostima kao podsticaj da naprave rezervacije.<br/>
Važeći od i do datum,a odnose se na datume na koje se može izvršiti rezervacija, dok se Rezervacija koja važi od/do datuma odnosi na datume koje rezervacija mora da pokrije da bi kupon bio važeći. Ako rezervacija padne van tog perioda, onda će se uobičajene stope primenjivati na dane van tog perioda.<br/>
Ako želite da rezervacija bude dostupna jednom određenom gostu, izaberite ime tog gosta u padajućem meniju da biste ograničili kupon samo na tog gosta.");
jr_define('_JRPORTAL_COUPONS_DESC_ADMIN', "Discount codes created here will be applicable to all properties on the website.");
jr_define('_JRPORTAL_COUPONS_BOOKING_DISCOUNT_FEEDBACK', 'With your coupon, this booking has been discounted from ');
jr_define('_JRPORTAL_COUPONS_BOOKING_DISCOUNT_FEEDBACK_TO', ' to ');
