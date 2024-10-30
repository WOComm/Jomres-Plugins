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

jr_define ('_OAUTH_SCOPE_CHANNEL_MANAGEMENT', "Gestió de canals");
jr_define ('_OAUTH_SCOPE_CHANNEL_MANAGEMENT_DESC', "El client pot realitzar activitats de gestió de canals. Tingueu en compte que això proporciona al client una potència considerable al sistema per modificar els vostres comptes i propietats.");

jr_define ('_OAUTH_SCOPE_CHANNEL_MANAGEMENT_CLEANING_PRICE', "Neteja");

jr_define ('_CMF_CANCELLED_BOOKING', "El gestor de canals ha cancel·lat la reserva");

jr_define ('_CMF_CLEANING_STRING', "Neteja"); // No canvieu això si ja heu importat propietats. Les propietats amb despeses de neteja tenen un extra amb aquest nom
jr_define ('_CMF_SECURITY_STRING', "Dipòsit de seguretat"); // No canvieu això si ja heu importat propietats. Les propietats amb dipòsits de seguretat tenen un Extra amb aquest nom


jr_define ('_CMF_API_PRIVACY', "Privadesa de l'API");
jr_define ('_CMF_API_PRIVACY_ON', "Privadesa activada");
jr_define ('_CMF_API_PRIVACY_OFF', "Privadesa desactivada");

jr_define ("_CMF_API_PRIVACY_DESC", "La informació d'una propietat només la pot veure el canal que la va crear. Per exemple, si heu donat diferents parells de claus API tant al canal A com al canal B, la informació d'una propietat creada pel canal A no pot el canal B el podrà veure ... tret que desactiveu la privadesa de l'API per permetre que tots els canals vegin tota la informació de la propietat a través de l'API. Establiu la privadesa de l'API a Desactivada si compartiu aquesta propietat amb un altre lloc que vulgui mostrar la propietat. Si no compartiu aquesta propietat amb cap altre lloc, deixeu la privadesa de l'API activada. ");
