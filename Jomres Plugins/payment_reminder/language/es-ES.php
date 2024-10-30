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

jr_define ('_JRPORTAL_PAYMENT_REMINDER_TITLE', "Recordatorios de pago");
jr_define ('_JRPORTAL_PAYMENT_REMINDER_NR_DAYS_TITLE1', "Enviar correo electrónico de recordatorio de pago ...");
jr_define ('_JRPORTAL_PAYMENT_REMINDER_NR_DAYS_TITLE2', ".. días después de que se realizó la reserva provisional");
jr_define ('_JRPORTAL_PAYMENT_REMINDER_INSTRUCTIONS', "Este complemento se ejecuta automáticamente en segundo plano y envía un correo electrónico de recordatorio de pago a los huéspedes que realizaron reservas provisionales que no están marcadas como pagadas dentro de un intervalo de su elección. Esto es útil cuando acepta reservas pagadas utilizando métodos de pago fuera de línea (transferencia bancaria, cheque). Si una reserva no se paga dentro de X días desde el momento en que se realizó la reserva, se enviará un correo electrónico de recordatorio de pago al huésped. También recibirá una copia de la misma . Si también utiliza el complemento Gestión de reservas provisionales, asegúrese de que el intervalo en el que desea enviar el correo electrónico de recordatorio de pago sea al menos 1 día más bajo que el establecido para eliminar o cancelar la reserva no pagada. ");
jr_define ('_JOMRES_PAYMENT_REMINDER_EMAIL_TITLE', "Recordatorio de pago de su reserva en el");
jr_define ('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY1', "Tiene una reserva sin pagar en el");
jr_define ('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY2', "Para asegurar su reserva, es necesario realizar un pago de depósito de");
jr_define ('_JOMRES_PAYMENT_REMINDER_EMAIL_BOOKINGNO', "Número de reserva");
jr_define ('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY3', ". Comuníquese con nosotros si desea analizar las opciones de pago. <br /> <br /> Gracias.");