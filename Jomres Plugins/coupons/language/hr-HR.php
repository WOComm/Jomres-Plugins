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

jr_define ('JOMRES_COUPONS_SCAN', "Skenirajte ovaj kôd u svoj telefon i rezervirajte odmah!");
jr_define ('JOMRES_COUPONS_GETADISCOUNT', "Ostvarite popust na");
jr_define ('JOMRES_COUPONS_PERCENT', "%");
jr_define ('JOMRES_COUPONS_OFFACCOMMODATION', "off cost of your accommodation");
jr_define ('JOMRES_COUPONS_IFYOUBOOKBETWEEN', "ako rezervirate između");
jr_define ('JOMRES_COUPONS_AND', "i");
jr_define ('JOMRES_COUPONS_FORDATESBETWEEN', "za datume između");
jr_define ('JOMRES_COUPONS_ALTERNATIVELY', "Alternativno, prilikom rezervacije unesite ovaj kod za popust:");
jr_define ('JOMRES_COUPONS_PRINT_COUPONS', "Ispis kupona");

jr_define ('_JRPORTAL_COUPONS_BOOKING_VALIDFROM', 'Rezervacija vrijedi od');
jr_define ('_JRPORTAL_COUPONS_BOOKING_VALIDTO', 'Rezervacija vrijedi do');
jr_define ('_JRPORTAL_COUPONS_GUESTNAME', 'Ime gosta');
jr_define ('_JRPORTAL_COUPONS_DESC_478', "Kodovi za popuste mogu se generirati i proslijediti gostima kao poticaj za rezervacije. <br/>
Važeći od i do datumi odnose se na datume na koje je moguće izvršiti rezervaciju, dok se rezervacija koja važi od/do datuma odnosi na datume koje rezervacija mora pokriti da bi kupon bio važeći. Ako rezervacija padne izvan tog razdoblja, za dane izvan tog razdoblja primjenjivat će se normalne cijene. <br/>
Ako želite da rezervacija bude dostupna jednom određenom gostu, odaberite ime tog gosta u padajućem izborniku kako biste kupon ograničili samo na tog gosta. ");
jr_define ('_JRPORTAL_COUPONS_DESC_ADMIN', "Ovdje stvoreni kodovi popusta bit će primjenjivi na sve nekretnine na web stranici.");
jr_define ('_JRPORTAL_COUPONS_BOOKING_DISCOUNT_FEEDBACK', 'S vašim je kuponom ova rezervacija snižena');
jr_define ('_JRPORTAL_COUPONS_BOOKING_DISCOUNT_FEEDBACK_TO', ' do ');