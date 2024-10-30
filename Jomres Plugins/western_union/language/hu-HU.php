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
jr_define('_JRPORTAL_WESTERN_UNION',"Western Union");
jr_define('_JRPORTAL_WESTERN_UNION_TITLE',"Western Union beállítások");
jr_define('_JRPORTAL_WESTERN_UNION_ADMIN_INSTRUCTIONS',"Ha úgy dönt, hogy nem, akkor az előtér-átjáró konfigurációjában meghatározott WU-fiókadatok kerülnek felhasználásra.");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_OVERRIDE_ACTIVE',"Az összes tulajdonhoz beállított WU-fiók adatainak felülírása? ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER',"Western Union Branch: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN',"Kedvezményezett neve: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT',"Kedvezményezett azonosítója: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC',"Kedvezményezett címe: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME',"Egyéb információ: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER1',"Western Union Branch: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN1',"Kedvezményezett neve: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT1',"Kedvezményezett azonosítója: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC1',"Kedvezményezett címe: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME1',"Egyéb információ: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER2',"Western Union Branch: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN2',"Kedvezményezett neve: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT2',"Kedvezményezett azonosítója: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC2',"Kedvezményezett címe: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME2',"Egyéb információ: ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_TITLE',"Fizetési adatok a következő címen történő foglalásához");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_HELLO',"Kedves ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_THANKYOU',"Köszönjük, hogy foglalta a következő címen: ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_SENDDEPOSITTO',"Foglalása biztonsága érdekében küldje el összegű letétjét.");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_BELOWADDRESS_EMAIL'," az alábbi Western Union-fiókhoz.");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_BELOWADDRESS'," az alábbi Western Union-fiókhoz. A Western Union fiókadatok másolatát e-mailben is elküldjük Önnek, miután elküldte ezt a foglalást.");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS1',"Ha bármilyen kérdése van, ne habozzon kapcsolatba lépni velünk. Hívhat minket a ");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS2'," vagy írjon nekünk e-mailt a ");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS_EMAIL',"Ha bármilyen kérdése van, ne habozzon kapcsolatba lépni velünk.");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_PRINT',"Nyomtassa ki a Western Union fiók adatait");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_SUBMIT',"Küldés");