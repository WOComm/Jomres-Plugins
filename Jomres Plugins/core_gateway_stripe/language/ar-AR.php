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


jr_define ('STRIPE_TITLE', "Stripe");
jr_define ('STRIPE_CONNECT_CONFIG_INFO', "Esta puerta de enlace de Stripe está diseñada específicamente para permitirle, como administrador del sitio, recibir una parte de los pagos realizados a los administradores de propiedades en el momento de la reserva. Antes de que se pueda utilizar, primero debe configurar su propia integración con Stripe Connect. <a href = 'http://www.jomres.net/manual/site-managers-guide/23-control-panel/payment-methods/340-core-gateway-stripe' target='_blank' class = 'btn btn-primary'>  La documentación de este complemento se puede encontrar aquí. </a> <br/> Si hace clic en Guardar en esta página, para permitir que este complemento funcione sin problemas  todas las demás puertas de enlace se desactivarán </ fuerte> Antes de comenzar, asegúrese de haber ido a su página de Stripe Connect e indicado que está configurando una plataforma. Una vez hecho esto, siga las instrucciones en pantalla para configurar su cuenta. Antes de que los gerentes puedan conectar su cuenta con la suya debe visitar Configuración> Configuración de conexión y en el área \"Configuración de OAuth\" habilitó OAuth para cuentas estándar y luego haga clic en Guardar (tenga en cuenta que deberá hacer esto en los modos de prueba y en vivo). ");

jr_define ('STRIPE_REGISTER_CONNECT', "¡Conéctese con nosotros!");
jr_define ('STRIPE_REGISTER_CONNECT_BLURB', "Te registraste, pero la conexión aún no está completa. Debes conectar tu cuenta de Stripe con nuestro sitio web. Una vez hecho esto, puedes agregar todas tus propiedades a nuestro sitio y comenzar a realizar reservas . ");

jr_define ('STRIPE_REGISTER_WELCOME_EMAIL_TITLE', "Bienvenido a");
jr_define ('STRIPE_REGISTER_WELCOME_EMAIL_BLURB', "Antes de que pueda comenzar a configurar sus propiedades, debe conectarnos con su cuenta de Stripe. Haga clic en el enlace para comenzar");

jr_define ('STRIPE_SETUP_INFO', "Ahora necesitamos conectar su cuenta a la nuestra, esto nos permitirá aceptar pagos en su nombre, así que haga clic en el botón Conectar para ir a Stripe, donde podrá confirmar la conexión");
jr_define ('STRIPE_SETUP_DONE', "Ya estás conectado con nosotros, ¡no hay nada más que hacer aquí! Cierra esta ventana y sigamos con el negocio de hacer negocios.");
jr_define ('STRIPE_SETUP_THANKS', "¡Gracias por conectarte con nosotros! Puedes cerrar esta ventana ahora");
jr_define ('STRIPE_SETUP_DISCONNECT', "Desconecta tu cuenta");
jr_define ('STRIPE_SETUP_DISCONNECTED', "Cuenta desconectada, puedes cerrar esta ventana ahora");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_CLIENT_ID', "ID de cliente de Stripe Connect");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_CLIENT_ID_DESC', "Puede obtener su ID de cliente de Stripe en su <a href='https://dashboard.stripe.com/account/applications/settings' target='_blank'> Panel de control> Configuración> Conectar. API las claves se encuentran en la opción de menú Desarrolladores. </a> ");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_RETURN_URL', "Asegúrese de configurar su URI de redireccionamiento en <a href='https://dashboard.stripe.com/account/applications/settings' target='_blank'> Conectar> Configuración </a> a <br/> ");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_SECRET_KEY', "Clave secreta");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_PUBLIC_KEY', "Clave pública");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_COMMISSION', "Tu Comisión");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_COMMISSION_DESC', "Esta comisión se toma del pago enviado al administrador de la propiedad en el momento de la reserva. Luego, Stripe la coloca en su cuenta de Stripe. <br/> Este es el porcentaje de comisión que le cobrará a los administradores de la propiedad. sus reservas. Su comisión se cobra en función del costo COMPLETO de la reserva, no el valor del depósito. <br/> Independientemente de lo que establezca este valor, le recomendamos que configure la Configuración del sitio -> Formulario de reserva -> La cifra de depósito mínimo para que sea al menos el doble de esta cifra, por lo que si desea cobrar una comisión del 10%, debe hacer que el depósito mínimo sea del 20%. ");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_EURO', "Tarifa de franja europea");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_DESC', "Este es el porcentaje que Stripe le cobra por realizar pagos en su sitio. Actualmente, cobran un 1,4% para las tarjetas europeas y un 2,9% para las tarjetas no europeas. Esta cifra es necesaria para determinar los precios al hacer la reserva y tiempo de pago. ");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_NONEURO', "Tarifa de franjas sin euro");

jr_define ('STRIPE_PAYMENT_FORM_CREDITCARD', "Número de tarjeta");
jr_define ('STRIPE_PAYMENT_FORM_EXPIRATION', "Caducidad (MM / AA)");
jr_define ('STRIPE_PAYMENT_FORM_CVC', "CVC");
jr_define ('STRIPE_PAYMENT_FORM_ZIP', "Código postal de facturación");

jr_define ('STRIPE_PAYMENT_FORM_SECURE', "Formulario de pago seguro");
jr_define ('STRIPE_PAYMENT_FORM_BILLINGDETAILS', "Detalles de facturación");
jr_define ('STRIPE_PAYMENT_FORM_CARDDETAILS', "Detalles de la tarjeta");
jr_define ('STRIPE_PAYMENT_FORM_HOLDER', "Nombre del titular de la tarjeta");
jr_define ('STRIPE_PAYMENT_FORM_PAYNOW', "Paga ahora");
jr_define ('STRIPE_PAYMENT_FORM_TOPAY', "Para pagar ahora");

jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_STREET_EMPTY', 'La calle es obligatoria y no puede estar vacía');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_LENGTH', 'La calle debe tener más de 6 y menos de 96 caracteres de longitud');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CITY_EMPTY', 'La ciudad es obligatoria y no puede estar vacía');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_ZIP_EMPTY', 'El zip es obligatorio y no puede estar vacío');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_ZIP_LENGTH', 'El zip debe tener más de 3 y menos de 12 caracteres');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_EMPTY', 'La dirección de correo electrónico es obligatoria y no puede estar vacía');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_INVALID', 'La entrada no es una dirección de correo electrónico válida');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_LENGTH', 'El correo electrónico debe tener más de 6 y menos de 65 caracteres');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDHOLDER_EMPTY', 'El nombre del titular de la tarjeta es obligatorio y no puede estar vacío');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDHOLDER_LENGTH', 'El nombre del titular de la tarjeta debe tener más de 6 y menos de 70 caracteres');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_EMPTY', 'El número de la tarjeta de crédito es obligatorio y no puede estar vacío');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_INVALID', 'El número de tarjeta de crédito no es válido');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_MONTH_EMPTY', 'El mes de vencimiento es obligatorio');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_MONTH_DIGITS', 'El mes de vencimiento solo puede contener dígitos');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_YEAR_EMPTY', 'El año de vencimiento es obligatorio');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_YEAR_DIGITS', 'El año de vencimiento solo puede contener dígitos');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CCV_EMPTY', 'El cvv es obligatorio y no puede estar vacío');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CCV_INVALID', 'El valor no es un CVV válido');

jr_define ('STRIPE_PAYMENT_FAILED', "Lo sentimos, no pudimos procesar su pago en este momento");
jr_define ('STRIPE_PAYMENT_TRY_AGAIN', "Inténtelo de nuevo");

jr_define ('STRIPE_PAYMENT_ERROR_DECLINED', "Pago rechazado");
jr_define ('STRIPE_PAYMENT_ERROR_RATE_LIMIT', "Demasiadas solicitudes hechas a la API demasiado rápido");
jr_define ('STRIPE_PAYMENT_ERROR_INVALID_PARAMETERS', "Se proporcionaron parámetros no válidos a la API de Stripe");
jr_define ('STRIPE_PAYMENT_ERROR_AUTH_FAILED', "Falló la autenticación con la API de Stripe");
jr_define ('STRIPE_PAYMENT_ERROR_NETWORK_FAULT', "Falló la comunicación de red con Stripe (¿se ha interrumpido su conexión a Internet?)");
jr_define ('STRIPE_PAYMENT_ERROR_UNCAUGHT', "Ocurrió un error no detectado");