<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.24.0
 *
 * @copyright	2005-2021 Vince Wooll
 * Translated to pt-PT by Mario Oliveira, Camara de Lobos, Madeira Island, Portugal, 17Set2010 - www.marioliveira.net - Updated 21Jun2011 for ver 5.1
 * Jomres is currently available for use in all personal or commercial projects under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/
//#################################################################
defined('_JOMRES_INITCHECK') or die('Direct Access to this file is not allowed.');
//#################################################################


jr_define ('_JRPORTAL_UNPAID_BOOKINGS_TITLE', "Tratamento de reservas não pagas");
jr_define ('_JRPORTAL_UNPAID_BOOKINGS_DELETEORCANCEL', "Cancelar ou excluir as reservas provisórias (não pagas)?");
jr_define ('_JRPORTAL_UNPAID_BOOKINGS_NR_DAYS_TITLE', "Alfer quantos dias a partir da hora da reserva?");
jr_define ('_JRPORTAL_UNPAID_BOOKINGS_INSTRUCTIONS', "Este plug-in é executado automaticamente em segundo plano e exclui ou cancela todas as reservas provisórias que não estão marcadas como pagas dentro de um intervalo de sua escolha. Isso é útil quando você aceita reservas que são pagas usando métodos de pagamento offline (transferência transferência, cheque). Se uma reserva não for paga dentro de X dias a partir do momento em que a reserva foi feita, a reserva será excluída ou cancelada e o calendário mostrará as datas reservadas como disponíveis, para que outra pessoa possa reservar esses dias . Quando uma reserva é apagada ou cancelada, você e o hóspede receberão uma notificação por e-mail. Se você optar por cancelar uma reserva, então a reserva e sua fatura serão marcadas como canceladas e não serão apagadas do banco de dados , para que você possa acessá-los mais tarde. Se você optar por excluí-lo, a reserva e sua fatura serão excluídas do banco de dados. ");
jr_define ('_JRPORTAL_UNPAID_BOOKINGS_EMAIL_TITLE', "Reserva cancelada");
jr_define ('_JOMRES_EMAIL_CANCEL_BOOKING_MSGBODY1', "A sua reserva foi automaticamente cancelada devido ao não pagamento do depósito exigido. Esta não é mais uma reserva válida. Se desejar reservar novamente, visite nosso website e refaça a reserva. A seguir estão as detalhes da reserva cancelada. ");
jr_define ('_JOMRES_EMAIL_CANCEL_BOOKING_MSGBODY2', "Se achar que recebeu esta notificação por engano, não hesite em nos contactar.");