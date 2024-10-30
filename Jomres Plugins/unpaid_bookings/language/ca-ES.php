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
jr_define('_JRPORTAL_UNPAID_BOOKINGS_TITLE',"Gestió de reserves no pagades");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_DELETEORCANCEL',"Cancel·lar o eliminar les reserves provisionals (no pagades)? ");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_NR_DAYS_TITLE',"Quants dies des de l'hora de la reserva?");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_INSTRUCTIONS',"Aquest connector s'executa automàticament en segon pla i elimina o cancel·la totes les reserves provisionals que no estan marcades com a pagades dins d'un interval que trieu. Això és útil quan accepteu reserves que es paguen mitjançant mètodes de pagament fora de línia transferència, xec). Si una reserva no es paga en un termini de X dies des del moment en què es va fer la reserva, la reserva s'eliminarà o cancel·larà i el calendari mostrarà les dates reservades com a disponibles, perquè algú més pugui reservar aquests dies. . Quan s'elimina o cancel·la una reserva, tant tu com el convidat rebran una notificació per correu electrònic. Si decideixes cancel·lar una reserva, la reserva i la seva factura es marcaran com a cancel·lades i no s'eliminaran de la base de dades. , perquè pugueu accedir-hi més endavant. Si decidiu eliminar-lo, la reserva i la seva factura s'eliminaran de la base de dades.");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_EMAIL_TITLE',"Reserva cancel·lada");
jr_define('_JOMRES_EMAIL_CANCEL_BOOKING_MSGBODY1',"La teva reserva s'ha cancel·lat automàticament a causa de l'impagament del dipòsit requerit. Aquesta ja no és una reserva vàlida. Si vols reservar de nou, visita el nostre lloc web i torna a fer la reserva. A continuació es mostren les detalls de la reserva cancel·lada.");
jr_define('_JOMRES_EMAIL_CANCEL_BOOKING_MSGBODY2',"Si creus que has rebut aquesta notificació per error, no dubtis a contactar amb nosaltres.");