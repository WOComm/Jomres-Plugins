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
##################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
##################################################################




jr_define('_JRPORTAL_WIRE_TRANSFER',"Overschrijving");
jr_define('_JRPORTAL_WIRE_TRANSFER_TITLE',"Instellingen voor overboeking");
jr_define('_JRPORTAL_WIRE_TRANSFER_ADMIN_INSTRUCTIONS',"Hier kunt u de bankrekeninggegevens definiëren die worden gebruikt voor alle eigendommen waarvoor de Wire Transfer Gateway is ingeschakeld. Als u ervoor kiest om de bankrekeninggegevens die in de frontend zijn ingesteld te negeren, worden de hier ingestelde gegevens gebruikt. Als u ervoor kiest om dit niet te doen, worden de bankrekeninggegevens gebruikt die zijn gedefinieerd in de configuratie van de frontend-gateway.");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_OVERRIDE_ACTIVE',"Ingestelde bankrekeninggegevens voor alle eigendommen overschrijven? ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_ACCOUNT_HOLDER',"Accounthouder: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_IBAN',"IBAN: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_SWIFT',"SWIFT-code: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_BIC',"BIC-code: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_NAME',"Banknaam: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_ACCOUNT_HOLDER1',"Accounthouder: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_IBAN1',"IBAN: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_SWIFT1',"SWIFT-code: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_BIC1',"BIC-code: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_NAME1',"Banknaam: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_ACCOUNT_HOLDER2',"Accounthouder: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_IBAN2',"IBAN: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_SWIFT2',"SWIFT-code: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_BIC2',"BIC-code: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_NAME2',"Banknaam: ");
jr_define('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_EMAIL_TITLE',"Betalingsgegevens voor uw boeking bij ");
jr_define('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_EMAIL_HELLO',"Beste ");
jr_define('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_EMAIL_THANKYOU',"Bedankt voor uw boeking bij ");
jr_define('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_SENDDEPOSITTO',"Om uw boeking te garanderen, dient u uw aanbetaling van  over te maken");
jr_define('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_BELOWADDRESS_EMAIL'," naar de bankrekening hieronder.");
jr_define('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_BELOWADDRESS'," naar de onderstaande bankrekening. Een kopie van de bankrekeninggegevens wordt ook per e-mail naar u verzonden nadat u deze boeking heeft ingediend.");
jr_define('_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_CONTACTUS1',"Als u vragen heeft, neem dan gerust contact met ons op. U kunt ons bellen op ");
jr_define('_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_CONTACTUS2'," of e-mail ons op ");
jr_define('_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_CONTACTUS_EMAIL',"Als je vragen hebt, neem dan gerust contact met ons op.");
jr_define('_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_PRINT',"Bankgegevens afdrukken");
jr_define('_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_SUBMIT',"Verzenden");