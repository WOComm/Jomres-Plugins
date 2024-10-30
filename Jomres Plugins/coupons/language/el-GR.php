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

jr_define ('JOMRES_COUPONS_SCAN', "Σάρωση αυτού του κωδικού στο τηλέφωνό σας και κράτηση τώρα!");
jr_define ('JOMRES_COUPONS_GETADISCOUNT', "Λάβετε έκπτωση");
jr_define ('JOMRES_COUPONS_PERCENT', "%");
jr_define ("JOMRES_COUPONS_OFFACCOMMODATION", "εκτός κόστους διαμονής");
jr_define ('JOMRES_COUPONS_IFYOUBOOKBETWEEN', "εάν κάνετε κράτηση μεταξύ");
jr_define ('JOMRES_COUPONS_AND', "και");
jr_define ('JOMRES_COUPONS_FORDATESBETWEEN', "για ημερομηνίες μεταξύ");
jr_define ('JOMRES_COUPONS_ALTERNATIVELY', "Εναλλακτικά, εισάγετε αυτόν τον κωδικό έκπτωσης κατά την κράτησή σας:");
jr_define ('JOMRES_COUPONS_PRINT_COUPONS', "Εκτύπωση κουπονιών");

jr_define ('_JRPORTAL_COUPONS_BOOKING_VALIDFROM', 'Η κράτηση ισχύει από');
jr_define ('_JRPORTAL_COUPONS_BOOKING_VALIDTO', 'Η κράτηση ισχύει για');
jr_define ('_JRPORTAL_COUPONS_GUESTNAME', 'Όνομα επισκέπτη');
jr_define ('_JRPORTAL_COUPONS_DESC_478', "Οι κωδικοί έκπτωσης μπορούν να δημιουργηθούν και να περάσουν στους επισκέπτες ως κίνητρο για κρατήσεις. <br/>
Ισχύει από και μέχρι ημερομηνίες αναφέρονται στις ημερομηνίες στις οποίες μπορεί να πραγματοποιηθεί κράτηση, ενώ η Κράτηση που ισχύει από/έως ημερομηνίες αναφέρεται στις ημερομηνίες που πρέπει να καλύψει η κράτηση για να είναι έγκυρο το κουπόνι. Εάν μια κράτηση πέσει εκτός αυτής της περιόδου, τότε θα ισχύσουν κανονικές τιμές για τις ημέρες εκτός αυτής της περιόδου. <br/>
Εάν θέλετε η κράτηση να είναι διαθέσιμη σε έναν συγκεκριμένο επισκέπτη, επιλέξτε το όνομα αυτού του επισκέπτη στο αναπτυσσόμενο μενού για να περιορίσετε το κουπόνι μόνο σε αυτόν τον επισκέπτη. ");
jr_define ('_JRPORTAL_COUPONS_DESC_ADMIN', "Οι κωδικοί έκπτωσης που δημιουργούνται εδώ θα ισχύουν για όλες τις ιδιότητες του ιστότοπου.");
jr_define ('_JRPORTAL_COUPONS_BOOKING_DISCOUNT_FEEDBACK', 'Με το κουπόνι σας, αυτή η κράτηση έχει εκπτώσεις από');
jr_define ('_JRPORTAL_COUPONS_BOOKING_DISCOUNT_FEEDBACK_TO', ' to ');