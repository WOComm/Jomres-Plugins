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


jr_define ('_JRPORTAL_WIRE_TRANSFER', "Transferência Bancária");
jr_define ('_JRPORTAL_WIRE_TRANSFER_TITLE', "Configurações de transferência eletrônica");
jr_define ('_JRPORTAL_WIRE_TRANSFER_ADMIN_INSTRUCTIONS', "Aqui você pode definir os detalhes da conta bancária que serão usados ​​para todas as propriedades que têm o Gateway de transferência eletrônica ativado. Se você escolher substituir os detalhes da conta bancária definidos no frontend, os detalhes definidos aqui serão usado. Se você decidir não usar, os detalhes da conta bancária definidos na configuração do gateway de front-end serão usados. ");
jr_define ('_JOMRES_WIRE_TRANSFER_GATEWAY_OVERRIDE_ACTIVE', "Substituir os detalhes da conta bancária definidos para todas as propriedades?");
jr_define ('_JOMRES_WIRE_TRANSFER_GATEWAY_ACCOUNT_HOLDER', "Titular da conta:");
jr_define ('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_IBAN', "IBAN:");
jr_define ('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_SWIFT', "Código SWIFT:");
jr_define ('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_BIC', "Código BIC:");
jr_define ('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_NAME', "Nome do banco:");
jr_define ('_JOMRES_WIRE_TRANSFER_GATEWAY_ACCOUNT_HOLDER1', "Titular da conta:");
jr_define ('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_IBAN1', "IBAN:");
jr_define ('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_SWIFT1', "Código SWIFT:");
jr_define ('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_BIC1', "Código BIC:");
jr_define ('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_NAME1', "Nome do banco:");
jr_define ('_JOMRES_WIRE_TRANSFER_GATEWAY_ACCOUNT_HOLDER2', "Titular da conta:");
jr_define ('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_IBAN2', "IBAN:");
jr_define ('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_SWIFT2', "Código SWIFT:");
jr_define ('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_BIC2', "Código BIC:");
jr_define ('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_NAME2', "Nome do banco:");
jr_define ('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_EMAIL_TITLE', "Detalhes de pagamento para sua reserva em");
jr_define ('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_EMAIL_HELLO', "Prezado");
jr_define ('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_EMAIL_THANKYOU', "Obrigado pela sua reserva em");
jr_define ('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_SENDDEPOSITTO', "Para garantir a sua reserva, por favor transfira o seu depósito de");
jr_define ('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_BELOWADDRESS_EMAIL', "para a conta bancária abaixo.");
jr_define ('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_BELOWADDRESS', "para a conta bancária abaixo. Uma cópia das informações da conta bancária também será enviada a você por e-mail após o envio desta reserva.");
jr_define ('_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_CONTACTUS1', "Se você tiver alguma dúvida, não hesite em nos contatar. Você pode nos ligar em");
jr_define ('_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_CONTACTUS2', "ou envie-nos um e-mail para");
jr_define ('_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_CONTACTUS_EMAIL', "Se você tiver alguma dúvida, não hesite em nos contatar.");
jr_define ('_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_PRINT', "Imprimir detalhes da conta bancária");
jr_define ('_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_SUBMIT', "Enviar");