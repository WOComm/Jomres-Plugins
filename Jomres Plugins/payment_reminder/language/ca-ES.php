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
jr_define('_JRPORTAL_PAYMENT_REMINDER_TITLE',"Recordatoris de pagament");
jr_define('_JRPORTAL_PAYMENT_REMINDER_NR_DAYS_TITLE1',"Envia un correu electrònic de recordatori de pagament..");
jr_define('_JRPORTAL_PAYMENT_REMINDER_NR_DAYS_TITLE2',"..dies després de fer la reserva provisional");
jr_define('_JRPORTAL_PAYMENT_REMINDER_INSTRUCTIONS',"Aquest connector s'executa automàticament en segon pla i envia un correu electrònic de recordatori de pagament als hostes que han fet reserves provisionals que no estan marcades com a pagades dins d'un interval que trieu. Això és útil quan accepteu reserves de pagament. utilitzant mètodes de pagament fora de línia (transferència bancària, xec). Si una reserva no es paga en un termini de X dies des del moment en què es va fer la reserva, s'enviarà un correu electrònic de recordatori de pagament al convidat. També en rebràs una còpia. . Si també utilitzeu el connector de gestió de reserves provisionals, assegureu-vos que l'interval en què voleu enviar el correu electrònic de recordatori de pagament sigui almenys 1 dia inferior al establert per suprimir o cancel·lar la reserva no pagada.");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_TITLE',"Recordatori de pagament de la vostra reserva a ");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY1',"Teniu una reserva sense pagar al ");
jr_define ('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY2', "Per assegurar la vostra reserva, cal fer un ingrés de");
jr_define ('_JOMRES_PAYMENT_REMINDER_EMAIL_BOOKINGNO', "Número de reserva");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY3',". Contacteu-nos si voleu parlar de les opcions de pagament.<br /><br />Gràcies.");