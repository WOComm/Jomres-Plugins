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


jr_define ('_JOMRES_BOOKING_INQUIRY_HEMAIL_TITLE', "Assunto do email");
jr_define ('_JOMRES_BOOKING_REJECTION_HCONTENT', "Texto do e-mail (você pode editar este texto para preencher o motivo da rejeição desta reserva, oferecer alternativas, etc.)");
jr_define ('_JOMRES_BOOKING_REJECTION_INSTRUCTIONS', "Esta consulta de reserva será rejeitada e cancelada. O seguinte e-mail será enviado ao cliente.");
jr_define ('_JOMRES_BOOKING_REJECTION_IMPOSSIBLE', "Esta consulta de reserva não pode ser rejeitada porque já foi rejeitada ou aprovada.");
jr_define ('_JOMRES_BOOKING_APPROVAL_HCONTENT', "Texto de e-mail (você pode editar este texto para preencher as instruções de pagamento para esta reserva, etc.)");
jr_define ('_JOMRES_BOOKING_APPROVAL_INSTRUCTIONS', "Esta consulta de reserva será aceita e a disponibilidade será atualizada no calendário. O seguinte e-mail será enviado ao cliente.");
jr_define ('_JOMRES_BOOKING_APPROVAL_IMPOSSIBLE', "Esta consulta de reserva não pode ser aprovada porque já foi rejeitada ou aprovada.");
jr_define ('_JOMRES_ADMIN_NEWENQUIRY_EMAILNAME', "Novo e-mail de consulta do administrador do site");
jr_define ('_JOMRES_ADMIN_NEWENQUIRY_EMAILDESC', "Email enviado ao administrador do site no momento da reserva se a reserva requer primeiro aprovação e o gateway global do paypal está ativado");
jr_define ('_JOMRES_HOTEL_NEWENQUIRY_EMAILNAME', "Novo e-mail de inquérito do hotel");
jr_define ('_JOMRES_HOTEL_NEWENQUIRY_EMAILDESC', "Email enviado ao hotel no momento da reserva se a reserva requerer aprovação primeiro");
jr_define ('_JOMRES_GUEST_NEWENQUIRY_EMAILNAME', "Novo e-mail de inquérito do convidado");
jr_define ('_JOMRES_GUEST_NEWENQUIRY_EMAILDESC', "Email enviado ao hóspede no momento da reserva se a reserva requer aprovação primeiro");
jr_define ('_JOMRES_GUEST_APPROVEENQUIRY_EMAILNAME', "E-mail de aprovação de consulta de convidado");
jr_define ('_JOMRES_GUEST_APPROVEENQUIRY_EMAILDESC', "Email enviado manualmente ao hóspede pelo gerente da propriedade para confirmação de disponibilidade para consulta");
jr_define ('_JOMRES_GUEST_REJECTENQUIRY_EMAILNAME', "E-mail de rejeição de consulta de convidado");
jr_define ('_JOMRES_GUEST_REJECTENQUIRY_EMAILDESC', "Email enviado manualmente ao hóspede pelo gerente da propriedade se a propriedade não estiver disponível para os detalhes do inquérito");