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

jr_define ('_SUBSCRIPTIONS_ACTIVE', "Activo");
jr_define ('_SUSCRIPCIONES_EXPIRADAS', "No activo");
jr_define ('_SUBSCRIPTIONS_HPAYMENT_STATUS', "Estado de pago");
jr_define ('_SUBSCRIPTIONS_HSUBSCRIPTION_LEVEL', "Nivel");
jr_define ('_SUBSCRIPTIONS_EDIT_TITLE', "Editar suscripción");
jr_define ('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_TITLE', "¿Enviar correo electrónico de recordatorio de caducidad de suscripción?");
jr_define ('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_DAYS_A', "Enviar correo electrónico de recordatorio");
jr_define ('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_DAYS_B', "días antes de que expire la suscripción");
jr_define ('_SUBSCRIPTIONS_SEND_EXPIRATION_EMAIL_TITLE', "¿Enviar correo electrónico cuando expire la suscripción?");
jr_define ('_SUBSCRIPTIONS_MY', "Mis suscripciones");
jr_define ('_SUSCRIPCIONES_HRENEW', "Renovar");
jr_define ('_SUBSCRIPTIONS_HRENEWAL', "Renovación de suscripción");
jr_define ('_SUBSCRIPTIONS_HALREADY_SUBSCRIBED', "Ya se ha suscrito, compre una renovación en su lugar.");
jr_define ('_SUBSCRIPTIONS_HEDIT', "Editar paquete de suscripción");
jr_define ('_SUBSCRIPTIONS_USERID_DESC', "Escriba las primeras letras del nombre de usuario y verá un menú desplegable con los nombres de usuario. Haga clic en un nombre de usuario para seleccionarlo");
jr_define ('_SUBSCRIPTIONS_PACKAGE_NO_LOGER_PUBLISHED', "Este paquete de suscripción ya no está disponible, por lo que no se puede renovar, considere actualizarlo");
jr_define ('_SUBSCRIPTIONS_NOT_SUBSCRIBED_TO_PACKAGE_ID', "No estás suscrito a este paquete, así que no puedes renovarlo");
jr_define ('_SUBSCRIPTIONS_NO_RENEWAL_OPTIONS_FOR_PACKAGE', "No hay opciones de renovación para este paquete");
jr_define ('_SUBSCRIPTIONS_CANCEL', "Cancelar suscripción");
jr_define ('_SUBSCRIPTIONS_HFREQUENCY_DAYS', "Frecuencia (días)");
jr_define ('_SUBSCRIPTIONS_HFREQUENCY_DAYS_DESC', "Duración de la suscripción en días");
jr_define ('_SUBSCRIPTIONS_HRENEWAL_NOTALLOWED', "No se permiten renovaciones para este paquete");
jr_define ('_SUBSCRIPTIONS_HRENEWAL_PRICE', "Precio de renovación");
jr_define ('_SUBSCRIPTIONS_HRENEWAL_PRICE_EXPL', "Establezca esto en 0 para deshabilitar las renovaciones para este paquete o ingrese un precio para la renovación");
jr_define ('_SUBSCRIPTIONS_HPACKAGE_FEATURES', "Opciones de paquete");
jr_define ('_SUBSCRIPTIONS_HPACKAGE_DETAILS', "Detalles del paquete");
jr_define ('_SUBSCRIPTIONS_HPACKAGE_YOUR', "Su paquete de suscripción");
jr_define ('_SUBSCRIPTIONS_HACCESS_TO_FEATURE_NOTALLOWED', "Su paquete de suscripción no incluye acceso a esta función. Para utilizar esta función, deberá actualizar su suscripción.");
jr_define ('_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TEXT1', "Tu suscripción ha caducado y todos tus anuncios no se han publicado. Tus anuncios ya no son visibles para los invitados y ya no podrás recibir reservas en línea desde nuestro sitio web. Para continuar usando nuestros servicios, publica sus anuncios y comience a recibir reservas en línea, inicie sesión en su cuenta y compre una renovación. ");
jr_define ('_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE1', "Su suscripción en");
jr_define ('_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE2', "ha expirado");
jr_define ('_JRPORTAL_SUBSCRIPTION_REMINDER_EMAIL_TEXT1', "Esta es una notificación para informarle que su suscripción caducará pronto. Para continuar usando nuestros servicios, ingrese a su cuenta y compre una renovación.");
jr_define ('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_TITLE', "Paquetes de suscripción");
jr_define ('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_NAME', "Nombre");
jr_define ('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_DESCRIPTION', "Descripción");
jr_define ('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PUBLISHED', "Publicado");
jr_define ('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FREQUENCY', "Frecuencia");
jr_define ('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FULLAMOUNT', "Precio");
jr_define ('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PROPERTYLIMIT', "Límite comercial");
jr_define ('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PROPERTYLIMIT_DESC', "Número máximo de empresas que se pueden agregar con este paquete de suscripción");
jr_define ('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_SUBSCRIBE', "Suscribirse");
jr_define ('_JRPORTAL_SUBSCRIPTIONS_USE', "Utilizar la funcionalidad de gestión de suscripciones");
jr_define ('_JRPORTAL_SUBSCRIPTIONS_SUBSCRIBING_ERROR_NOPACKAGEID', "Lo sentimos, pero no se reconoce ese ID de paquete");
jr_define ('_JRPORTAL_INVOICES_SUBSCRIPTION_PROFILE_ERROR_EXPL', "Parece que aún no ha completado los detalles de su cuenta. Para incluir su propiedad en el sitio, necesitamos que complete los detalles de su cuenta antes de que podamos continuar");
jr_define ('_JRPORTAL_SUBSCRIPTION_ALLSLOTSUSED', "Ha utilizado todos los espacios de propiedad disponibles en su paquete de suscripción, por lo que no podrá crear nuevos listados. Actualice su paquete si desea crear más listados.");
jr_define ('_JOMRES_CHART_SUBSCRIPTIONS_DESC', "Ingresos por año / mes");
jr_define ('_SUBSCRIPTION_WARNING', "Ha habilitado las suscripciones pero parece que aún no ha creado ningún paquete de suscripción. Los propietarios no podrán registrar propiedades en su sitio hasta que se cree al menos un paquete de suscripción.");
jr_define ('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_APIACCESS', "Acceso API");

	jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE_SUBSCRIPTION_1',"Puede acceder a esta función actualizando a " );
	jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE_SUBSCRIPTION_2'," Paquete de Suscripción. " );
	jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE', 'Actualizar');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_ALREADY_SUBSCRIBED', 'Suscrito');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_GATEWAY_SETTINGS', 'Configuración de puerta de enlace de suscripción');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_NOT_SUBSCRIBED', 'Actualmente no está suscrito a ningún paquete de suscripción. Suscríbase a un paquete para continuar usando nuestros servicios.');
