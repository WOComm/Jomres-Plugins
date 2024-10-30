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


jr_define ('_JRPORTAL_WIRE_TRANSFER', "Transferencia bancaria");
jr_define ('_JRPORTAL_WIRE_TRANSFER_TITLE', "Configuración de transferencia bancaria");
jr_define ('_JRPORTAL_WIRE_TRANSFER_ADMIN_INSTRUCTIONS', "Aquí puede definir los detalles de la cuenta bancaria que se utilizarán para todas las propiedades que tengan la puerta de enlace de transferencias bancarias habilitada. Si elige anular los detalles de la cuenta bancaria configurados en la interfaz, los detalles establecidos aquí serán Si decide no hacerlo, se utilizarán los datos de la cuenta bancaria definidos en la configuración de la puerta de enlace del frontend. ");
jr_define ('_JOMRES_WIRE_TRANSFER_GATEWAY_OVERRIDE_ACTIVE', "¿Anular detalles de cuenta bancaria establecidos para todas las propiedades?");
jr_define ('_JOMRES_WIRE_TRANSFER_GATEWAY_ACCOUNT_HOLDER', "Titular de la cuenta:");
jr_define ('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_IBAN', "IBAN:");
jr_define ('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_SWIFT', "Código SWIFT:");
jr_define ('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_BIC', "Código BIC:");
jr_define ('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_NAME', "Nombre del banco:");
jr_define ('_JOMRES_WIRE_TRANSFER_GATEWAY_ACCOUNT_HOLDER1', "Titular de la cuenta:");
jr_define ('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_IBAN1', "IBAN:");
jr_define ('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_SWIFT1', "Código SWIFT:");
jr_define ('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_BIC1', "Código BIC:");
jr_define ('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_NAME1', "Nombre del banco:");
jr_define ('_JOMRES_WIRE_TRANSFER_GATEWAY_ACCOUNT_HOLDER2', "Titular de la cuenta:");
jr_define ('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_IBAN2', "IBAN:");
jr_define ('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_SWIFT2', "Código SWIFT:");
jr_define ('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_BIC2', "Código BIC:");
jr_define ('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_NAME2', "Nombre del banco:");
jr_define ('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_EMAIL_TITLE', "Detalles de pago de su reserva en");
jr_define ('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_EMAIL_HELLO', "Estimado");
jr_define ('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_EMAIL_THANKYOU', "Gracias por su reserva en");
jr_define ('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_SENDDEPOSITTO', "Para asegurar su reserva, por favor transfiera su depósito de");
jr_define ('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_BELOWADDRESS_EMAIL', "a la cuenta bancaria de abajo.");
jr_define ('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_BELOWADDRESS', "a la cuenta bancaria a continuación. También se le enviará una copia de la información de la cuenta bancaria por correo electrónico después de enviar esta reserva.");
jr_define ('_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_CONTACTUS1', "Si tiene alguna pregunta, no dude en ponerse en contacto con nosotros. Puede llamarnos al");
jr_define ('_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_CONTACTUS2', "o envíenos un correo electrónico a");
jr_define ('_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_CONTACTUS_EMAIL', "Si tiene alguna pregunta, no dude en ponerse en contacto con nosotros");
jr_define ('_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_PRINT', "Imprimir detalles de la cuenta bancaria");
jr_define ('_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_SUBMIT', "Enviar");