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


jr_define ('_JOMRES_BOOKING_INQUIRY_HEMAIL_TITLE', "Subiectul e-mailului");
jr_define ('_JOMRES_BOOKING_REJECTION_HCONTENT', "Text prin e-mail (puteți edita acest text pentru a completa un motiv pentru respingerea acestei rezervări, pentru a oferi alternative etc.)");
jr_define ('_JOMRES_BOOKING_REJECTION_INSTRUCTIONS', "Această solicitare de rezervare va fi respinsă și anulată. Următorul e-mail va fi trimis clientului.");
jr_define ('_JOMRES_BOOKING_REJECTION_IMPOSSIBLE', "Această solicitare de rezervare nu poate fi respinsă deoarece a fost deja respinsă sau aprobată.");
jr_define ('_JOMRES_BOOKING_APPROVAL_HCONTENT', "Text prin e-mail (puteți edita acest text pentru a completa instrucțiunile de plată pentru această rezervare etc.)");
jr_define ('_JOMRES_BOOKING_APPROVAL_INSTRUCTIONS', "Această solicitare de rezervare va fi acceptată și disponibilitatea va fi actualizată în calendar. Următorul e-mail va fi trimis clientului.");
jr_define ('_JOMRES_BOOKING_APPROVAL_IMPOSSIBLE', "Această solicitare de rezervare nu poate fi aprobată deoarece a fost deja respinsă sau aprobată.");
jr_define ('_JOMRES_ADMIN_NEWENQUIRY_EMAILNAME', "Adresă de e-mail pentru anchetă nouă pentru anchetă");
jr_define ('_JOMRES_ADMIN_NEWENQUIRY_EMAILDESC', "E-mail trimis administratorului site-ului la momentul rezervării dacă rezervarea necesită aprobarea mai întâi și gateway-ul paypal global este activat");
jr_define ('_JOMRES_HOTEL_NEWENQUIRY_EMAILNAME', "Adresa de e-mail pentru hotel nouă");
jr_define ('_JOMRES_HOTEL_NEWENQUIRY_EMAILDESC', "E-mail trimis la hotel la momentul rezervării dacă rezervarea necesită aprobarea mai întâi");
jr_define ('_JOMRES_GUEST_NEWENQUIRY_EMAILNAME', "Adresă de e-mail pentru invitație nouă");
jr_define ('_JOMRES_GUEST_NEWENQUIRY_EMAILDESC', "E-mail trimis oaspeților la momentul rezervării, dacă rezervarea necesită mai întâi aprobarea");
jr_define ('_JOMRES_GUEST_APPROVEENQUIRY_EMAILNAME', "Adresa de e-mail pentru aprobarea cererii de oaspeți");
jr_define ('_JOMRES_GUEST_APPROVEENQUIRY_EMAILDESC', "E-mail trimis manual oaspetelui de către administratorul proprietății pentru a confirma disponibilitatea pentru o anchetă");
jr_define ('_JOMRES_GUEST_REJECTENQUIRY_EMAILNAME', "Adresa de e-mail pentru respingerea cererii de oaspeți");
jr_define ('_JOMRES_GUEST_REJECTENQUIRY_EMAILDESC', "E-mail trimis manual oaspetelui de administratorul proprietății dacă proprietatea nu este disponibilă pentru detaliile anchetei");