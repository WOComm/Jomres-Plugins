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
jr_define('_JRPORTAL_WESTERN_UNION_TITLE',"Configuració de Western Union");
jr_define('_JRPORTAL_WESTERN_UNION_ADMIN_INSTRUCTIONS',"Aquí podeu definir els detalls del compte WU que s'utilitzaran per a totes les propietats que tinguin habilitada la WU Gateway. Si decidiu anul·lar els detalls del compte WU establerts a la interfície, s'utilitzaran els detalls establerts aquí. . Si trieu no fer-ho, s'utilitzaran els detalls del compte WU definits a la configuració de la passarel·la d'entrada.");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_OVERRIDE_ACTIVE',"Anul·lar els detalls del compte WU establerts per a totes les propietats? ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER',"Sucursal de Western Union: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN',"Nom del beneficiari: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT',"Identificador del beneficiari: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC',"Adreça del beneficiari: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME',"Altra informació: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER1',"Sucursal de Western Union: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN1',"Nom del beneficiari: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT1',"Identificador del beneficiari: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC1',"Adreça del beneficiari: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME1',"Altra informació: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER2',"Sucursal de Western Union: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN2',"Nom del beneficiari: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT2',"Identificador del beneficiari: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC2',"Adreça del beneficiari: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME2',"Altra informació: ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_TITLE',"Detalls de pagament de la vostra reserva a ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_HELLO',"Benvolgut");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_THANKYOU',"Gràcies per la vostra reserva a ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_SENDDEPOSITTO',"Per tal de garantir la vostra reserva, envieu el vostre dipòsit de ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_BELOWADDRESS_EMAIL'," al compte de Western Union a continuació.");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_BELOWADDRESS'," al compte de Western Union a continuació. També se us enviarà una còpia de la informació del compte de Western Union per correu electrònic després d'enviar aquesta reserva.");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS1',"Si teniu cap pregunta, no dubteu a posar-vos en contacte amb nosaltres. Podeu trucar-nos a ");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS2'," o envieu-nos un correu electrònic a ");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS_EMAIL',"Si teniu cap pregunta, no dubteu a posar-vos en contacte amb nosaltres.");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_PRINT',"Imprimeix els detalls del compte de Western Union");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_SUBMIT',"Envia");