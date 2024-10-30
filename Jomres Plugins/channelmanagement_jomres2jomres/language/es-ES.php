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

jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_TITLE', "Integración de Jomres 2 Jomres");

jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_TITLE', "ID de cliente del sitio principal");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_DESC', "El ID de cliente del sitio principal. En el sitio principal, necesitará un ID de cliente único y un secreto con todos los complementos de funciones de API instalados, el complemento Channel Management Framework instalado y cuando cree / edite el ID de cliente / par de claves secretas, necesitará darle acceso a todos los ámbitos disponibles. ");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_TITLE', "Secreto de cliente del sitio principal");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_DESC', "El secreto del cliente del sitio principal");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENTSITE_TITLE', "URL principal");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENTSITE_DESC', "La URL del sitio principal de Jomres.");

jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_NOT_SET', "Error, el ID de cliente de su sitio principal no está configurado. Visite la pestaña Configuración del sitio> Cuentas de Channel Manager para guardar su ID de cliente.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_NOT_SET', "Error, el secreto de su sitio principal no está configurado. Visite la pestaña Configuración del sitio> Cuentas de Channel Manager para guardar su secreto");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENT_NOT_SET', "Error, la URL secreta de su sitio principal no está configurada. Visite la pestaña Configuración del sitio> Cuentas de Channel Manager para guardar la URL de su sitio principal");

jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_NOT_SET_ADMIN_SANITY_CHECK_MESSAGE', "Error, su identificación de cliente no está configurada. Visite Configuración del sitio> pestaña Cuentas de Channel Manager para guardar su nombre de usuario");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_NOT_SET_ADMIN_SANITY_CHECK_MESSAGE', "Error, su identificación de cliente no está configurada. Visite Configuración del sitio> pestaña Cuentas de Channel Manager para guardar su contraseña.");

jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_TITLE', "Configuración de canal");

jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_MESSAGE', "Jomres 2 Jomres: Importar nuevas propiedades.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_BUTTON_IMPORT', "IMPORTAR");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_BUTTON_EXPORT', "EXPORTAR");

jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_PROPERTYID_NOTSET', "ID de propiedad no establecido");

jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET', "Elementos de diccionario asignados no establecidos");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_PROPERTYPE_NOTFOUND', "No se encontró el tipo de propiedad local. Si se ha creado el tipo de propiedad, asegúrese de haber asignado el tipo de propiedad del servicio remoto al tipo de propiedad local.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_REMOTEPROPERTYPE_NOTFOUND', "Tipo de propiedad remota no devuelto por el canal.");

jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_LOCAL_PROPERTYPE_NOTFOUND', "Tipo de propiedad local no pasado.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_BOOKING_MODEL_NOT_FOUND', "No se pudo determinar el modelo de reserva (mrp o srp).");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_BOOKING_MODEL_NOT_FOUND_IN_PROPERTY_TYPE', "No se pudo determinar el modelo de reserva (mrp o srp) después de encontrar la identificación del tipo de propiedad.");

jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_COUNTRY_CODE_NOT_FOUND', "No se pudo determinar el código de país");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_REGION_ID_NOT_FOUND', "No se pudo determinar el ID de la región");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_VALIDATE_SETTINGS_FAILED', "No se pudo validar correctamente la matriz de configuración");

jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_PTYPES', "Tipos de propiedad no asignados por el administrador");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_PFEATURES', "Características de la propiedad no asignadas por el administrador");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_ROOM_TYPES', "Tipos de habitaciones no asignados por el administrador");