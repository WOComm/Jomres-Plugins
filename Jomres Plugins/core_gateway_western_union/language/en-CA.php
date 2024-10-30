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
jr_define('_JRPORTAL_WESTERN_UNION_TITLE',"Western Union Settings");
jr_define('_JRPORTAL_WESTERN_UNION_ADMIN_INSTRUCTIONS',"Here you can define the WU account details that will be used for all properties that have the WU Gateway enabled. If you choose to override the WU account details set in frontend, then the details set here will be used. If you chosee not to, then the WU account details defined in frontend gateway config will be used.");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_OVERRIDE_ACTIVE',"Override WU account details set for all properties? ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER',"Western Union Branch: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN',"Beneficiary Name: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT',"Beneficiary ID: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC',"Beneficiary Address: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME',"Other Info: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER1',"Western Union Branch: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN1',"Beneficiary Name: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT1',"Beneficiary ID: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC1',"Beneficiary Address: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME1',"Other Info: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER2',"Western Union Branch: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN2',"Beneficiary Name: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT2',"Beneficiary ID: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC2',"Beneficiary Address: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME2',"Other Info: ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_TITLE',"Payment details for your booking at ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_HELLO',"Dear ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_THANKYOU',"Thank you for your booking at ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_SENDDEPOSITTO',"In order to secure your booking, please send your deposit of ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_BELOWADDRESS_EMAIL'," to the Western Union account below.");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_BELOWADDRESS'," to the Western Union account below. A copy of the Western Union account information will also be sent to you by email after you submit this booking.");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS1',"If you have any questions, please do not hesitate to contact us. You can ring us on ");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS2'," or email us at ");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS_EMAIL',"If you have any questions, please do not hesitate to contact us.");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_PRINT',"Print Western Union account details");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_SUBMIT',"Submit");


	jr_define('JOMRES_WESTERN_UNION_GATEWAY_WU_CHOSEN',"Guest will pay by Western Union");
