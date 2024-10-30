<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.24.0
 *
 * @copyright	2005-2021 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/
//#################################################################
defined('_JOMRES_INITCHECK') or die('');
//#################################################################

jr_define ('JOMRES_COUPONS_SCAN', "Skenējiet šo kodu savā tālrunī un rezervējiet tūlīt!");
jr_define ('JOMRES_COUPONS_GETADISCOUNT', "Saņemt atlaidi");
jr_define ('JOMRES_COUPONS_PERCENT', "%");
jr_define ('JOMRES_COUPONS_OFFACCOMMODATION', "no jūsu izmitināšanas izmaksām");
jr_define ('JOMRES_COUPONS_IFYOUBOOKBETWEEN', "ja rezervējat starp");
jr_define ('JOMRES_COUPONS_AND', "un");
jr_define ('JOMRES_COUPONS_FORDATESBETWEEN', "datumiem starp");
jr_define ('JOMRES_COUPONS_ALTERNATIVELY', "Alternatīvi, rezervēšanas laikā ievadiet šo atlaides kodu:");
jr_define ('JOMRES_COUPONS_PRINT_COUPONS', "Drukāt kuponus");

jr_define ('_JRPORTAL_COUPONS_BOOKING_VALIDFROM', 'Rezervācija derīga no');
jr_define ('_JRPORTAL_COUPONS_BOOKING_VALIDTO', 'Rezervācija derīga');
jr_define ('_JRPORTAL_COUPONS_GUESTNAME', 'Viesa vārds');
jr_define ('_JRPORTAL_COUPONS_DESC_478', "Atlaižu kodus var ģenerēt un nodot viesiem, lai veicinātu rezervāciju. <br/>
Derīgs no un līdz datumiem attiecas uz datumiem, kuros var veikt rezervāciju, savukārt rezervācija, kas ir spēkā no/līdz datumiem, attiecas uz datumiem, kas rezervējumam jāaptver, lai kupons būtu derīgs. Ja rezervācija neattiecas uz šo periodu, tad dienas, kas atrodas ārpus šī perioda, tiks piemērotas parastās cenas. <br/>
Ja vēlaties, lai rezervācija būtu pieejama vienam konkrētam viesim, nolaižamajā izvēlnē izvēlieties šī viesa vārdu, lai ierobežotu kuponu tikai šim viesim. ");
jr_define ('_JRPORTAL_COUPONS_DESC_ADMIN', "Šeit izveidotie atlaižu kodi būs piemērojami visiem vietnes īpašumiem.");
jr_define ('_JRPORTAL_COUPONS_BOOKING_DISCOUNT_FEEDBACK', 'Ar jūsu kuponu šī rezervācija ir diskontēta no');
jr_define ('_JRPORTAL_COUPONS_BOOKING_DISCOUNT_FEEDBACK_TO', ' līdz ');