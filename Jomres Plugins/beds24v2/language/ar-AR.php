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

// Because the server may be using a proxy for outgoing calls it's better to call the Jomres App server and ask it to respond with this server's IP address. Once we know that, then we are able to give the documentation the correct IP number to configure in Beds24's API Key N field(s)
$cURLConnection = curl_init();

curl_setopt($cURLConnection, CURLOPT_URL, 'https://api.ipify.org?format=json');
curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
curl_setopt($cURLConnection, CURLOPT_CONNECTTIMEOUT, 1);
curl_setopt($cURLConnection, CURLOPT_TIMEOUT, 1);

$ip_number_response = curl_exec($cURLConnection);
curl_close($cURLConnection);

$jsonArrayResponse = json_decode($ip_number_response);

if (isset( $jsonArrayResponse->ip)) {
    $this_servers_ip_number = $jsonArrayResponse->ip;
} else {
    $this_servers_ip_number = 'Unknown, ask your server hosts support team';
}

jr_define ('BEDS24V2_CHANNEL_MANAGEMENT', 'Gestión de canales (Beds24)');

jr_define ('CAMAS24V2_WEBHOOKS_AUTH_METHOD', 'Camas24');
jr_define ('BEDS24V2_WEBHOOKS_AUTH_METHOD_NOTES', 'Si tiene una cuenta Beds24 y desea actualizar Beds24 cuando tenga una reserva, seleccione esta opción. Establezca la URL en https://www.beds24.com/api/json/');
jr_define ('BEDS24V2_ERROR_USER_NO_KEY', 'Este usuario no tiene claves API configuradas, por lo que no puede continuar. Visite su página en la página Administración de usuarios> Administradores de propiedades y cree una nueva clave API para ellos usando el enlace provisto en esa página.');
jr_define ('BEDS24V2_ERROR_USER_NO_PROPERTIES', 'Este usuario no tiene propiedades de Jomres que pueda asignar a las propiedades de Beds24, o viceversa');
jr_define ('BEDS24V2_NOT_SUBSCRIBED', "El administrador con el que inició sesión no parece tener una cuenta con Beds24, por lo que primero deberá registrarse en su servicio y luego guardar esta clave API en <a href = 'https://www.beds24.com/control2.php?pagetype=accountpassword' target='_blank'> Sitio web de Beds24 aquí. </a> ");
jr_define ('BEDS24V2_NOT_SUBSCRIBED_KEY', "Copia y pega esta clave API en el campo LINK de tu cuenta Beds24 para continuar");
jr_define ('BEDS24V2_NOT_SUBSCRIBED_RELOAD', "Cuando haya terminado, haga clic en el botón de abajo para continuar");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_TITLE', "Vinculación de propiedades Beds24");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_INFO', "Esta página le permite ver las propiedades a las que tiene acceso en este sistema, más las que existen en el Administrador de canales. También le permite importar propiedades desde el Administrador de canales a este sistema, o exportar propiedades existentes al Channel Manager. <br/> Si tiene propiedades tanto en este sistema como en Beds24 y desea vincularlas entre sí, puede usar Property apikey para hacerlo. Visite Beds24> Configuración> Propiedades (asegúrese de que la propiedad seleccionada en el menú desplegable es la misma que la que desea vincular) luego, en el submenú Vínculo, guarde la 'Propiedad apikey' en el campo 'propKey' en Beds24. Una vez que haya hecho eso, vuelva a cargar la página. Este sistema compruebe que las dos propiedades están asociadas con la misma clave y cree las asociaciones necesarias. Una vez que las dos propiedades estén vinculadas, recuerde visitar la página Ver propiedad, busque la URL de notificación y péguela en el campo \"Notificar URL\" de la página del vínculo. Esa voluntad asegúrese de que Beds24 utilice el enlace correcto para sincronizar las reservas con esa propiedad cuando reciba reservas. ");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_NO_PROPERTIES', "Error: No hay propiedades a las que pueda vincular en Beds24. Esto puede deberse a que todas las propiedades para las que tiene derechos ya se han vinculado a otra cuenta en este sistema.");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_PROPERTY_UID', "Uid de propiedad");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_PROPERTY_NAME', "Nombre de la propiedad");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_BEDS24_PROPERTY_UID', "Uid de propiedad Beds24");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_BEDS24_PROPERTY_NAME', "Beds24 Nombre de la propiedad");
jr_define ('BEDS24V2_DISPLAY_PROPERTY_APIKEY', "Propiedad apikey");
jr_define ('BEDS24_LISTPROPERTIES_IMPORT', "Importar");
jr_define ('BEDS24_LISTPROPERTIES_ASSOCIATE_ROOM_TYPES', "Configurar tipos de habitación");
jr_define ('BEDS24_LISTPROPERTIES_ASSOCIATE_ROOM_TYPES_DESC', "Aquí debe vincular los tipos de habitación en su cuenta Beds24 con los almacenados en este sistema.");
jr_define ('_BEDS24_DISPLAY_BOOKINGS_JOMRESROOMS_BEDS24TYPENAME', "Tipo de habitación Beds24");

jr_define ('BEDS24_LISTPROPERTIES_IMPORT_CANNOT_NOAPIKEY', "No se puede importar esta propiedad todavía porque no ha configurado la Clave de propiedad en la página Enlace de propiedad.");
jr_define ('BEDS24_LISTPROPERTIES_IMPORT_CANNOT_NOROOMS', "No se puede importar esta propiedad todavía porque no tiene habitaciones. Cree una o más habitaciones (las habitaciones en Beds24 son las mismas que los tipos de habitaciones en Jomres) y no olvide establecer el precio mínimo . Una vez hecho esto, puede importar el tipo de habitación en Jomres y asociarlo con los tipos de habitación actuales de Jomres. Después de eso, podrá modificar las tarifas, pero es necesario establecer un precio mínimo. ");
jr_define ('_BEDS24_SUGGESTED_KEY', "Le sugerimos que utilice esta clave API. Cuando haya hecho eso, vuelva a cargar esta página");
jr_define ('BEDS24_LISTPROPERTIES_EXPORT', "Exportar");
jr_define ('BEDS24V2_REST_API_INTRO', "Aquí puede ver su par de claves REST API y la ruta a la API. Si guarda estos detalles en su cuenta en Beds24, Beds24 24 podrá contactar este sitio a través de su API.");
jr_define ('BEDS24V2_REST_API_CLIENT_ID', "ID de cliente");
jr_define ('BEDS24V2_REST_API_CLIENT_SECRET', "Secreto del cliente");
jr_define ('BEDS24V2_REST_API_ENDPOINT', "URI (punto final)");
jr_define ('BEDS24_LISTPROPERTIES_CONFIGURE', "Ver propiedad");
jr_define ('BEDS24_ROOM_TYPES_TITLE', "Asociaciones de tipo de habitación");

jr_define ('BEDS24_ROOM_TYPES_INFO', "Esta página le permite asociar sus tipos de habitación con los almacenados en los servidores Beds24.");
jr_define ('BEDS24_ROOM_TYPES_INFO2', "Hasta que los tipos de habitación estén vinculados, no podrá recibir la información de reserva enviada por Beds24. Si su propiedad ha sido importada / exportada desde o hacia Beds24, entonces hemos creado enlaces automáticamente para usted, sin embargo, si agrega un nuevo tipo de habitación, o elimine uno, esta página se puede utilizar para asegurarse de que el tipo de habitación esté correctamente asociado. ");
jr_define ('BEDS24_ROOM_TYPES_INFO3', "Elija los tipos de habitaciones Beds24 que desea asociar con los tipos de habitaciones en este sistema y, cuando termine, haga clic en Guardar para actualizar los cambios en Beds24.");
jr_define ('BEDS24_ROOM_TYPES_YOURS', "Tus tipos de habitación");
jr_define ('BEDS24_ROOM_TYPES_BEDS24', "Camas24 tipos de habitaciones");
jr_define ('BEDS24_ROOM_TYPES_NONE', "Esta propiedad no tiene ningún tipo de habitación, por lo que no se puede vincular a ningún tipo de habitación Beds24. ¿Desea importar tipos de habitaciones desde Beds24?");
jr_define ('BEDS24_IMPORT_ROOMS', "Importar habitaciones");
jr_define ('BEDS24_EXPORT_BOOKINGS', "Exportar reservas");
jr_define ('BEDS24_IMPORT_BOOKINGS', "Importar reservas");
jr_define ('BEDS24_IMPORT_EXPORT', "Puede importar y exportar reservas existentes desde y hacia Beds24 con solo hacer clic en un botón. Las reservas importadas desde Beds24 se importan desde ayer e incluirán todas las reservas del próximo año. Solo debe usar estos botones después primero importando o exportando la propiedad al sistema. Una vez configurada, la importación y / o exportación se realizará automáticamente. ");
jr_define ('_BEDS24_CHANNEL_MANAGEMENT_UPDATE_PRICING_YESNO', "¿Actualizar precios a Beds24?");
jr_define ('_BEDS24_CHANNEL_MANAGEMENT_UPDATE_PRICING_YESNO_DESC', "Puede optar por actualizar Beds24 solo con disponibilidad o tanto disponibilidad como precios. Si tiene situaciones específicas en las que desea usar el panel de control Beds24 para establecer precios específicos para canales específicos, debe dejar esto configurado para No.");
jr_define ('_BEDS24_CONTROL_PANEL_DIRECT', "Enlace directo");
jr_define ('BEDS24_IMPORT_NOTIFICATION_URLS', "Si importó esta propiedad en Jomres, deberá cambiar manualmente la URL de notificación en su Beds24 -> Propiedad -> Configuración de enlace a lo siguiente:");
jr_define ('BEDS24V2_ERROR_KEYS_SHOULD_BE_REGENERATED', "Actualmente no tiene ninguna propiedad asociada con las propiedades de Beds24. Debe restablecer las claves API de su administrador antes de permitir que sus administradores intenten conectarse con Beds24. Esto garantizará que todos tengan claves únicas");
jr_define ('BEDS24V2_ERROR_KEYS_REBUILD', "Restablecer las claves API del administrador ahora");
jr_define ('BEDS24V2_ERROR_KEYS_DISMISS', "Ignorar advertencia");
jr_define ('BEDS24V2_ERROR_KEYS_DONE', "Se restablecieron las claves de la API del administrador");

jr_define ('BEDS24V2_ADMINISTRATOR_LINKS_TITLE', "Enlaces de propiedad Beds24");
jr_define ('BEDS24_ASSIGN_MANAGER', "Administrador de cambios de Beds24");
jr_define ('BEDS24_ASSIGN_MANAGER_DESC', "Cuando un administrador ve la página de Gestión de canales (Bed24) en la interfaz, cualquier propiedad que comparta una clave API tanto en Jomres como en Beds24 se vincula automáticamente dentro de Jomres. Del mismo modo, cualquier propiedad importada o exportada por el administrador están vinculados. Puede cambiar el administrador al que está vinculada una propiedad cambiando el menú desplegable del administrador en esta página y luego haciendo clic en Guardar. ");
jr_define ('BEDS24V2_TARIFFS_TITLE', "Exportación arancelaria");
jr_define ('BEDS24V2_TARIFF_EXPORT_DESC', "Puede exportar las tarifas que ha creado a Beds24 a una tarifa diaria específica. Si va a utilizar esta función, debe establecer la opción '¿Actualizar precios a Beds24?' en Configuración de la propiedad en No. Usted Es posible que también deba configurar su propiedad en el panel de control Beds24 para que pueda tener múltiples tarifas diarias. Para hacerlo, vaya a Configuración> Propiedades> Habitaciones> Precios diarios y configure el 'Número de precios diarios' según el número de precios que desee. . Una vez que haya hecho eso, podrá hacer clic en uno de los botones P para establecer esa tarifa diaria. ");
jr_define ('BEDS24V2_TARIFF_EXPORT_TARIFFNAME', "Nombre de la tarifa");
jr_define ('BEDS24V2_TARIFF_EXPORT_TARIFF_ROOM_TYPE', "Tipo de habitación");
jr_define ('BEDS24V2_BOOKING_RESEND', "Reenviar notificación");
jr_define ('BEDS24V2_BOOKING_DATA_AT_B24', "Esta es la información de la reserva almacenada en Beds24. A menos que esté seguro de que los datos son incorrectos, no debería tener que volver a enviar la reserva a Beds24.");
jr_define ('BEDS24V2_BOOKING_NO_DATA_AT_B24', "Esta reserva no parece estar asociada con una reserva en Beds24. Puede usar el botón Reenviar para exportar esta reserva a beds24.");

jr_define( 'BEDS24V2_GDPR_ANONYMISE_GUESTS', "Anonymise guests?" );
jr_define( 'BEDS24V2_GDPR_ANONYMISE_GUESTS_DESC', "When bookings are sent to the channel manager, we recommend that you anonymise the guest details. If you set this option to yes, when booking information is sent to the channel manager the guest name, email address are not. OTAs will have an accurate record of your availability without you needing to share more information than necessary. This means that you are compliant with the GDPR because if the guest should later choose to delete their details on this system (you are not notified when this happens), their details are not left with other data controllers over whom you have no control. If needed, you can still cross-reference bookings in this system with those on the channel manager, the Reservation Details page will show you the booking number for this booking as it is stored on the channel manager." );
jr_define( 'BEDS24V2_MASTER_APIKEY', "EXPERIMENTAL FEATURE - Master Beds24 API key" );
jr_define( 'BEDS24V2_MASTER_APIKEY_DESC', "IF YOU ALREADY HAVE AN INSTALLATION OF JOMRES WITH PROPERTIES LINKED TO BEDS24 READ THE ENTIRE DESCRIPTION HERE. By default Jomres is designed to be a multi-vendor booking platform. Managers who have their own beds24 accounts can import their properties to and from beds24 securely. This setting allows you to override that functionality by having a single api key for all properties. This means that you only need one account with Beds24 however it also means that all charges will be accrued by that one account. Any manager with access to a property will be able to send updates to the property on the beds24 servers. Leave blank to ignore this setting and force property managers to use their own Beds24 accounts. The API key can take any form you want, so long as the key here matches the one in the <a href='https://www.beds24.com/control2.php?pagetype=accountpassword' target='_blank'><em>API Key 1</em> </a> field.  IF YOU ALREADY HAVE AN INSTALLATION OF JOMRES WITH PROPERTIES LINKED TO BEDS24 : You can switch to using this feature, however it would require that you first truncate (empty) these tables, delete the existing properties that are already in Jomres, and that you then re-import the properties from Beds24 into Jomres. XXXXX_jomres_beds24_contract_booking_number_xref ,  XXXXX_jomres_beds24_property_uid_xref  , XXXXX_jomres_beds24_rest_api_key_xref  , XXXXX_jomres_beds24_room_type_xref. <br/> <br/> When setting your API key in the <em>API Key N</em> section of Beds24's Account Access page it's vital that you set the <em>API Key Access</em> field to 'Allow whitelist IP only' and you set the IP number to <strong>".$this_servers_ip_number ."</strong> This applies equally for the master API key configuration here, and in the frontend if a property manager is configuring their own individual API keys." );
jr_define( 'BEDS24V2_WHITELIST_WARNING', "If your properties have already been connected to Beds24, be aware that Beds24 have recently introduced a policy where all servers connecting to your account have to have been whitelisted. You can do this on the Account Access  page, where your Access key has been entered. Select the Whitelist IP dropdown and set the IP number to " );
