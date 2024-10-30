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


jr_define('_JRPORTAL_WESTERN_UNION',"Western Union");
jr_define('_JRPORTAL_WESTERN_UNION_TITLE',"Western Union-inställningar");
jr_define('_JRPORTAL_WESTERN_UNION_ADMIN_INSTRUCTIONS',"Här kan du definiera WU-kontodetaljerna som kommer att användas för alla egenskaper som har WU-gatewayen aktiverad. Om du väljer att åsidosätta WU-kontodetaljerna som ställts in i frontend, kommer detaljerna som anges här att användas . Om du väljer att inte göra det kommer WU-kontodetaljerna som definieras i frontend-gateway-konfigurationen att användas.");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_OVERRIDE_ACTIVE',"Åsidosätta WU-kontodetaljer som ställts in för alla egenskaper? ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER',"Western Union Branch: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN',"Förmånstagarens namn: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT',"Förmånstagarens ID: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC',"Förmånstagarens adress: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME',"Övrig information: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER1',"Western Union Branch: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN1',"Förmånstagarens namn: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT1',"Förmånstagarens ID: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC1',"Förmånstagarens adress: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME1',"Övrig information: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER2',"Western Union Branch: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN2',"Förmånstagarens namn: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT2',"Förmånstagarens ID: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC2',"Förmånstagarens adress: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME2',"Övrig information: ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_TITLE',"Betalningsinformation för din bokning på ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_HELLO',"Kära ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_THANKYOU',"Tack för din bokning på ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_SENDDEPOSITTO',"För att säkra din bokning, skicka din deposition på ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_BELOWADDRESS_EMAIL'," till Western Union-kontot nedan.");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_BELOWADDRESS'," till Western Union-kontot nedan. En kopia av Western Union-kontoinformationen kommer också att skickas till dig via e-post efter att du har skickat in denna bokning.");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS1',"Om du har några frågor, tveka inte att kontakta oss. Du kan ringa oss på ");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS2'," eller maila oss på ");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS_EMAIL',"Om du har några frågor, tveka inte att kontakta oss.");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_PRINT',"Skriv ut Western Union-kontodetaljer");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_SUBMIT',"Skicka");