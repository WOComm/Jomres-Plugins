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


jr_define ('_JRPORTAL_PAYMENT_REMINDER_TITLE', "Lembretes de pagamento");
jr_define ('_JRPORTAL_PAYMENT_REMINDER_NR_DAYS_TITLE1', "Enviar email de lembrete de pagamento ..");
jr_define ('_JRPORTAL_PAYMENT_REMINDER_NR_DAYS_TITLE2', ".. dias após a reserva provisória ter sido feita");
jr_define ('_JRPORTAL_PAYMENT_REMINDER_INSTRUCTIONS', "Este plugin é executado automaticamente em segundo plano e envia um e-mail de lembrete de pagamento aos convidados que fizeram reservas provisórias que não foram marcadas como pagas dentro de um intervalo de sua escolha. Isso é útil quando você aceita reservas que são pagas usando métodos de pagamento offline (transferência eletrônica, cheque). Se uma reserva não for paga dentro de X dias a partir do momento em que a reserva foi feita, um e-mail de lembrete de pagamento é enviado ao hóspede. Você também receberá uma cópia dele . Se você também usa o plugin de Gerenciamento de Reservas Provisórias, certifique-se de que o intervalo no qual deseja enviar o e-mail de lembrete de pagamento é pelo menos 1 dia inferior ao definido para excluir ou cancelar a reserva não paga. ");
jr_define ('_JOMRES_PAYMENT_REMINDER_EMAIL_TITLE', "Lembrete de pagamento da sua reserva no");
jr_define ('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY1', "Você tem uma reserva não paga no");
jr_define ('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY2', "Para garantir a sua reserva é necessário efectuar um depósito de pagamento de");
jr_define ('_JOMRES_PAYMENT_REMINDER_EMAIL_BOOKINGNO', "Número da reserva");
jr_define ('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY3', ". Entre em contato conosco se desejar discutir as opções de pagamento. <br /> <br /> Obrigado.");