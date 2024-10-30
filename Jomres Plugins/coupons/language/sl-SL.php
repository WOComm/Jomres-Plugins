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



jr_define ('JOMRES_COUPONS_SCAN', "Skeniraj to kodo v telefon in rezerviraj zdaj!");
jr_define ('JOMRES_COUPONS_GETADISCOUNT', "Pridobite popust na");
jr_define ('JOMRES_COUPONS_PERCENT', "%");
jr_define ('JOMRES_COUPONS_OFFACCOMMODATION', "off stroški vaše nastanitve");
jr_define ('JOMRES_COUPONS_IFYOUBOOKBETWEEN', "če rezervirate med");
jr_define ('JOMRES_COUPONS_AND', "in");
jr_define ('JOMRES_COUPONS_FORDATESBETWEEN', "za datume med");
jr_define ('JOMRES_COUPONS_ALTERNATIVELY', "Druga možnost je, da pri rezervaciji vnesete to kodo za popust:");
jr_define ('JOMRES_COUPONS_PRINT_COUPONS', "Natisni kupone");

jr_define ('_JRPORTAL_COUPONS_BOOKING_VALIDFROM', 'Rezervacija velja od');
jr_define ('_JRPORTAL_COUPONS_BOOKING_VALIDTO', 'Rezervacija velja za');
jr_define ('_JRPORTAL_COUPONS_GUESTNAME', 'Ime gosta');
jr_define ('_JRPORTAL_COUPONS_DESC_478', "Kode za popust lahko ustvarite in posredujete gostom kot spodbudo za rezervacijo. <br/>
Veljavni datumi od in do se nanašajo na datume, na katere je mogoče opraviti rezervacijo, medtem ko se rezervacija, veljavna od/do datumov, nanašajo na datume, ki jih mora rezervacija pokriti, da je kupon veljaven. Če rezervacija ne velja za to obdobje, bodo za dneve izven tega obdobja veljale običajne cene. <br/>
Če želite, da je rezervacija na voljo enemu določenemu gostu, v spustnem meniju izberite ime tega gosta, da omejite kupon samo na tega gosta. ");
jr_define ('_JRPORTAL_COUPONS_DESC_ADMIN', "Tu ustvarjene kode za popust bodo veljale za vse nepremičnine na spletnem mestu.");
jr_define ('_JRPORTAL_COUPONS_BOOKING_DISCOUNT_FEEDBACK', 'Z vašim kuponom je ta rezervacija znižana');
jr_define ('_JRPORTAL_COUPONS_BOOKING_DISCOUNT_FEEDBACK_TO', ' do ');