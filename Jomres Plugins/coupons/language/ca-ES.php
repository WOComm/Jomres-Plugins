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

jr_define ('JOMRES_COUPONS_SCAN', "Escaneja aquest codi al telèfon i reserva ara!");
jr_define ('JOMRES_COUPONS_GETADISCOUNT', "Obteniu un descompte de");
jr_define ('JOMRES_COUPONS_PERCENT', "%");
jr_define ('JOMRES_COUPONS_OFFACCOMMODATION', "descompte del cost del vostre allotjament");
jr_define ('JOMRES_COUPONS_IFYOUBOOKBETWEEN', "si reserveu entre");
jr_define ('JOMRES_COUPONS_AND', "i");
jr_define ('JOMRES_COUPONS_FORDATESBETWEEN', "per a dates entre");
jr_define ('JOMRES_COUPONS_ALTERNATIVELY', "Alternativament, introduïu aquest codi de descompte en fer la vostra reserva:");
jr_define ('JOMRES_COUPONS_PRINT_COUPONS', "Imprimir cupons");

jr_define ('_JRPORTAL_COUPONS_BOOKING_VALIDFROM', 'Reserva vàlida des de');
jr_define ('_JRPORTAL_COUPONS_BOOKING_VALIDTO', 'Reserva vàlida a');
jr_define ('_JRPORTAL_COUPONS_GUESTNAME', 'Nom del convidat');
jr_define ('_JRPORTAL_COUPONS_DESC_478', "Es poden generar codis de descompte i passar-los als clients com a incentiu per fer reserves. <br/>
Les dates vàlides des de i fins a es refereixen a les dates en què es pot fer una reserva, mentre que la reserva vàlida des de / fins a dates es refereix a les dates que la reserva ha de cobrir perquè el cupó sigui vàlid. Si una reserva queda fora d'aquest període, s'aplicaran tarifes normals als dies fora d'aquest període. <br/>
Si voleu que la reserva estigui disponible per a un convidat concret, trieu el nom del convidat al menú desplegable per limitar el cupó només a aquest convidat. ");
jr_define ('_JRPORTAL_COUPONS_DESC_ADMIN', "Els codis de descompte creats aquí seran aplicables a totes les propietats del lloc web.");
jr_define ('_JRPORTAL_COUPONS_BOOKING_DISCOUNT_FEEDBACK', 'Amb el vostre cupó, s\'ha descomptat aquesta reserva a partir de');
jr_define ('_JRPORTAL_COUPONS_BOOKING_DISCOUNT_FEEDBACK_TO', ' a ');