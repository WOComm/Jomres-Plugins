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


jr_define('_JRPORTAL_WIRE_TRANSFER',"Wire Transfer");
jr_define('_JRPORTAL_WIRE_TRANSFER_TITLE',"Inställningar för banköverföring");
jr_define('_JRPORTAL_WIRE_TRANSFER_ADMIN_INSTRUCTIONS',"Här kan du definiera bankkontouppgifterna som kommer att användas för alla fastigheter som har Wire Transfer Gateway aktiverad. Om du väljer att åsidosätta bankkontouppgifterna som ställts in i frontend, kommer informationen som anges här att vara används. Om du väljer att inte göra det kommer bankkontouppgifterna som definierats i frontend-gateway-konfigurationen att användas.");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_OVERRIDE_ACTIVE',"Åsidosätt bankkontouppgifter för alla egenskaper? ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_ACCOUNT_HOLDER',"Kontoinnehavare: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_IBAN',"IBAN: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_SWIFT',"SWIFT-kod: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_BIC',"BIC-kod: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_NAME',"Bankens namn: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_ACCOUNT_HOLDER1',"Kontoinnehavare: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_IBAN1',"IBAN: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_SWIFT1',"SWIFT-kod: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_BIC1',"BIC-kod: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_NAME1',"Bankens namn: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_ACCOUNT_HOLDER2',"Kontoinnehavare: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_IBAN2',"IBAN: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_SWIFT2',"SWIFT-kod: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_BIC2',"BIC-kod: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_NAME2',"Bankens namn: ");
jr_define('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_EMAIL_TITLE',"Betalningsinformation för din bokning på ");
jr_define('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_EMAIL_HELLO',"Kära ");
jr_define('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_EMAIL_THANKYOU',"Tack för din bokning på ");
jr_define('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_SENDDEPOSITTO',"För att säkra din bokning, vänligen banköverföring din insättning på ");
jr_define('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_BELOWADDRESS_EMAIL'," till bankkontot nedan.");
jr_define('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_BELOWADDRESS'," till bankkontot nedan. En kopia av bankkontoinformationen kommer också att skickas till dig via e-post efter att du har skickat denna bokning.");
jr_define('_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_CONTACTUS1',"Om du har några frågor, tveka inte att kontakta oss. Du kan ringa oss på ");
jr_define('_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_CONTACTUS2'," eller maila oss på ");
jr_define('_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_CONTACTUS_EMAIL',"Om du har några frågor, tveka inte att kontakta oss.");
jr_define('_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_PRINT',"Skriv ut bankkontouppgifter");
jr_define('_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_SUBMIT',"Skicka");