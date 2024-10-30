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
jr_define('_JRPORTAL_WESTERN_UNION_TITLE',"Western Union-innstillinger");
jr_define('_JRPORTAL_WESTERN_UNION_ADMIN_INSTRUCTIONS',"Her kan du definere WU-kontodetaljene som skal brukes for alle eiendommer som har WU-gatewayen aktivert. Hvis du velger å overstyre WU-kontodetaljene satt i frontend, vil detaljene som er angitt her bli brukt . Hvis du velger å ikke gjøre det, vil WU-kontodetaljene som er definert i frontend-gateway-konfigurasjonen bli brukt.");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_OVERRIDE_ACTIVE',"Overstyre WU-kontodetaljer satt for alle eiendommer? ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER',"Western Union Branch: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN',"Støttemottakers navn: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT',"Begunstigelses-ID: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC',"Begunstigelsesadresse: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME',"Annen informasjon: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER1',"Western Union Branch: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN1',"Støttemottakers navn: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT1',"Begunstigelses-ID: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC1',"Begunstigelsesadresse: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME1',"Annen info: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER2',"Western Union Branch: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN2',"Støttemottakers navn: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT2',"Begunstigelses-ID: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC2',"Begunstigelsesadresse: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME2',"Annen info: ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_TITLE',"Betalingsdetaljer for bestillingen din på ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_HELLO',"Kjære ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_THANKYOU',"Takk for bestillingen på ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_SENDDEPOSITTO',"For å sikre bestillingen din, vennligst send et depositum på ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_BELOWADDRESS_EMAIL'," til Western Union-kontoen nedenfor.");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_BELOWADDRESS'," til Western Union-kontoen nedenfor. En kopi av Western Union-kontoinformasjonen vil også bli sendt til deg på e-post etter at du har sendt inn denne bestillingen.");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS1',"Hvis du har spørsmål, ikke nøl med å kontakte oss. Du kan ringe oss på ");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS2'," eller send oss ​​en e-post på ");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS_EMAIL',"Hvis du har spørsmål, ikke nøl med å kontakte oss.");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_PRINT',"Skriv ut Western Union-kontodetaljer");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_SUBMIT',"Send inn");