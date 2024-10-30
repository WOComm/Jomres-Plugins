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

jr_define ('_OAUTH_SCOPE_CHANNEL_MANAGEMENT', "Gestión de canales");
jr_define ('_OAUTH_SCOPE_CHANNEL_MANAGEMENT_DESC', "El cliente puede realizar actividades de administración de canales. Tenga en cuenta que esto le da al cliente un poder considerable en el sistema para modificar sus cuentas y propiedades.");

jr_define ('_OAUTH_SCOPE_CHANNEL_MANAGEMENT_CLEANING_PRICE', "Limpieza");

jr_define ('_CMF_CANCELLED_BOOKING', "El administrador del canal canceló la reserva");

jr_define ('_CMF_CLEANING_STRING', "Limpieza"); // No cambie esto si ya ha importado propiedades. Las propiedades con tarifas de limpieza tienen un extra con este nombre
jr_define ('_CMF_SECURITY_STRING', "Depósito de seguridad"); // No cambie esto si ya ha importado propiedades. Las propiedades con depósitos de seguridad tienen un extra con este nombre


jr_define ('_CMF_API_PRIVACY', "Privacidad API");
jr_define ('_CMF_API_PRIVACY_ON', "Privacidad activada");
jr_define ('_CMF_API_PRIVACY_OFF', "Privacidad desactivada");

jr_define ('_CMF_API_PRIVACY_DESC', "La información de una propiedad solo puede ser vista por el canal que la creó. Por ejemplo, si ha proporcionado diferentes pares de claves API tanto para el canal A como para el canal B, la información de una propiedad creada por el canal A no puede ser visto por el canal B ... a menos que desactive la privacidad de la API para permitir que todos los canales vean toda la información de la propiedad a través de la API. Establezca la privacidad de la API en Desactivado si comparte esta propiedad con otro sitio que desee incluir la propiedad en la lista. Si no comparte esta propiedad con ningún otro sitio, deje la Privacidad de API configurada en Activado. ");