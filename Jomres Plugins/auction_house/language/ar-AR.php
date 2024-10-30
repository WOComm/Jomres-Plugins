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


jr_define ('_JOMRES_AUCTIONHOUSE_TITLE', "Casa de subastas");
jr_define ('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTIONTITLE', "Comprando");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTIONTITLE', "Vender");

jr_define ('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTION_AUCTIONSHOME', "Inicio de subastas");
jr_define ('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTION_MYBIDS', "Artículos por los que he pujado");

jr_define ('_JOMRES_AUCTIONHOUSE_EVERYBODY_MENUOPTION_DASHBOARD', "Listar subastas");

jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_DASHBOARD', "Panel de propiedades");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_LISTAUCTIONS', "Enumere sus subastas");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_CREATE_NEW_AUCTION', "Nueva subasta");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_EDIT_AUCTION', "Editar subasta");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_CANCEL_AUCTION', "Cancelar subasta");
jr_define ('_JOMRES_AUCTIONHOUSE_ADMIN_CANCEL_AUCTION', "Finalizar la subasta antes");

jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_CREATE_CHOOSEPROPERTY', "Elija la propiedad con la que desea asociar esta subasta.");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_CREATE_INCLUDINGROOMS', "¿Incluirá habitaciones / la propiedad en esta subasta?");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_MRP', "Seleccione las habitaciones que desea incluir en esta subasta. Primero elija las fechas para la reserva, luego podrá seleccionar las habitaciones.");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_SRP', "Elija las fechas en las que desea reservar la propiedad como parte de la subasta.");
jr_define ('_JOMRES_AUCTIONHOUSE_TERMS_LINK', "Términos y condiciones");
jr_define ('_JOMRES_AUCTIONHOUSE_TERMS_TEXT', "Términos y condiciones");

jr_define ('_JOMRES_AUCTIONHOUSE_TERMS_DETAILED', "Términos y condiciones detallados.");

jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TITLE', "Título de la subasta");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION', "Descripción");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_VALUE', "Valor de esta subasta");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_VALUE_INFO', "Ingrese el valor del paquete que está ofreciendo. No se mostrará a los compradores.");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE', "Reservar");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE_NOTMET', "Reserva no satisfecha");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BUYNOW_PRICE', "Comprar ahora");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DAYSTORUN', "¿Cuántos días debería durar esta subasta?");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BLACKBOOKING_NOTE', "Reserva de la casa de subastas (no cancelar) para la subasta:");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TAX_NOTE', "Tenga en cuenta que cuando haga una oferta, su factura incluirá el impuesto adicional de");
    jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DISCLAIMER', "Si hace clic en el botón Pujar o Comprar ahora, está celebrando un contrato legalmente vinculante para comprar el artículo o el paquete del vendedor. Este sitio no es responsable del contenido indicado por el vendedor") ;


jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TITLE_ERROR', "Error, debes incluir un título.");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION_ERROR', "Error, debes incluir una descripción.");

jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_ACTIVE_AUCTIONS', "Subastas activas");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_FINISHED_AUCTIONS', "Subastas terminadas");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_MAXIBID', "Oferta más alta");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_NOBIDS', "Sin pujas");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TIMELEFT', "Tiempo restante");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID', "Haga su oferta");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_PLACED', "¡Su oferta ha sido colocada!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_YOURBIDHIGHEST', "¡Estás ganando esta subasta!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_OUTBID', "¡Le han sobrepujado!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_WON', "¡Felicitaciones, ganó esta subasta!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_LOST', "Lo siento, perdió esta subasta.");

jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_ENDED', "La subasta ha finalizado");

jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_NOTLOGGEDIN', "Lo sentimos, no puede ofertar en esta subasta porque no ha iniciado sesión");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_ENDED', "Lo sentimos, no puede ofertar en esta subasta porque ha finalizado");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_NOTFOUND', "Lo sentimos, no puede ofertar en esta subasta, no podemos encontrar ese ID de subasta.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_TOOLOW', "Lo sentimos, su oferta fue demasiado baja");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_OWNAUCTION', "No puede pujar en su propia subasta");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_EDITPROFILE', "No puede ofertar en esta subasta todavía porque no ha ingresado sus datos. Por favor, haga clic en el enlace de arriba 'Editar cuenta' para completar los detalles de su cuenta primero.");

jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_NOTLOGGEDIN', "Lo sentimos, no puede cancelar esta subasta porque no ha iniciado sesión");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_ALREADYBID', "Lo sentimos, no puede cancelar esta subasta porque ya se ha pujado. Sólo se pueden cancelar las subastas que no tienen pujas.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_ENDED', "Lo sentimos, no puede cancelar esta subasta porque ya ha finalizado");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_NOTYOURS', "Lo sentimos, no puede cancelar esta subasta porque no tiene derechos de acceso a esta subasta.");

jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_DAYS', "d");
jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_HOURS', "h");
jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_MINUTES', "m");
jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_SECONDS', "s");

jr_define ('_JOMRES_AUCTIONHOUSE_LISTS', "Tus listas de seguimiento");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_COUNT', "Número en la lista");
jr_define ('_JOMRES_AUCTIONHOUSE_DEFAULTLIST', "Lista de seguimiento");
jr_define ('_JOMRES_AUCTIONHOUSE_ADDTOWATCHLIST_INSTRUCTIONS', "Agregar a la lista de seguimiento");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_ADD', "Agregar lista de seguimiento");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_NEWLIST_NAME', "Ingrese el nuevo nombre de la lista");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_SAVENEWLIST', "Guardar nueva lista de seguimiento");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_ADDED_TO_LIST', "Subasta agregada a la lista");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_NO_LISTS', "Aún no tiene ninguna lista de seguimiento. Puede agregar una subasta a su lista de seguimiento para crear su primera lista, o usar la opción Agregar lista de seguimiento en el menú para agregar manualmente una lista");
jr_define ('_JOMRES_AUCTIONHOUSE_LIST_DOESNOTEXIST', "Error, esa lista de vigilancia no existe");

jr_define ('_JOMRES_AUCTIONHOUSE_PROPERTY_DETAILS_AUCTIONINFO', "Esta propiedad participa en nuestro programa de subasta y ofrece uno o más paquetes para subasta, consulte la lista a continuación.");
jr_define ('_JOMRES_AUCTIONHOUSE_PROPERTY_DETAILS_MOREINFO', "Información sobre");

jr_define ('_JOMRES_AUCTIONHOUSE_INVOICING_COMMISSIONWORD', "Comisión de subasta");
jr_define ('_JOMRES_AUCTIONHOUSE_INVOICING_PREAMBLE', "Subasta:");

jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_BIDPLACED_SUBJECT', "Ha realizado una oferta para subasta:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_BIDPLACED_BODY', "Ha realizado una oferta para una subasta. Puede ver la subasta visitando el siguiente enlace:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_OUTBID_SUBJECT', "¡Le han sobrepujado! Subasta:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_OUTBID_BODY', "Ha sido sobrepujado en una subasta. Puede ver la subasta visitando el siguiente enlace:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_SUBJECT', "¡Ha ganado una subasta! Subasta:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_BODY', "Has ganado una subasta. Puedes ver la subasta visitando el siguiente enlace:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_BODY2', "Asegúrese de pagar al vendedor de inmediato. Su factura está aquí:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_SELLER_AUCTION_ENDED_SUBJECT', "La subasta ha finalizado. Subasta:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_SELLER_AUCTION_ENDED_BODY', "Esta subasta ha finalizado. Puede ver la subasta aquí:");

jr_define ('_JOMRES_AUCTIONHOUSE_BOOKINGNOTE', "Subasta completada. Los detalles del ganador son los siguientes:");

jr_define ('_JOMRES_SHORTCODES_06000AUCTION_HOUSE', "Muestra la página de la casa de subastas.");