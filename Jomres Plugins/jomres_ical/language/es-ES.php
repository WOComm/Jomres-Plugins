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

jr_define ('_JOMRES_ICAL_EVENT', 'Evento iCal');
jr_define ('_JOMRES_ICAL_FEED', 'Fuente iCal');
jr_define ('_JOMRES_ICAL_FEED_LINK', 'URL del feed de iCal');
jr_define ('_JOMRES_ICAL_FEEDS', 'iCal Feed / s');
jr_define ('_JOMRES_ICAL_FEEDS_DESC', 'Tus feeds de iCal pueden mostrar las próximas reservas en un calendario remoto, incluido tu dispositivo móvil, Google Calendar, Apple Calendar, Thunderbird, Outlook y más. Utiliza las siguientes URL para suscribirte a los feeds en su software de calendario. ');
jr_define ('_JOMRES_ICAL_ANON', 'URL de fuente de iCal anónima');
jr_define ('_JOMRES_ICAL_ALLOW_ANON', '¿Permitir el acceso anónimo a las fuentes de iCal?');
jr_define ('_JOMRES_ICAL_ALLOW_ANON_DESC', 'Si esta opción está habilitada, su feed de eventos de iCal estará disponible para todos, pero sin reserva ni detalles de invitados.');
jr_define ('_JOMRES_ICAL_IMPORT', 'Importación iCal');
jr_define ('_JOMRES_ICAL_SELECT', 'Seleccionar archivo para importar');
jr_define ('_JOMRES_ICAL_NO_FILE_UPLOADED', 'Error, no se cargó ningún archivo.');
jr_define ('_JOMRES_ICAL_IMPORT_INFO', "Al importar un archivo iCal, la fecha de finalización del evento debe ser la fecha de salida del invitado. El resumen debe ser el nombre del invitado. La descripción del evento puede contener todos los demás detalles.");

jr_define ('_JOMRES_ICAL_ERROR_BOOKING_NUMBER_EXISTS', 'Este número de reserva ya existe en el sistema.');
jr_define ('_JOMRES_ICAL_ERROR_NO_ROOMS', 'No hay habitaciones disponibles en las fechas seleccionadas.');
jr_define ('_JOMRES_ICAL_ERROR_NO_EVENTS', 'No se encontraron eventos en el archivo ics.');
jr_define ('_JOMRES_ICAL_SUCCESS', 'Evento importado correctamente');
jr_define ('_JOMRES_ICAL_FAILURE', 'No se pudo importar el evento');

jr_define ('_JOMRES_ICAL_RESULT_HEADER_SUMMARY', 'Nombre de invitado');
jr_define ('_JOMRES_ICAL_RESULT_HEADER_DESCRIPTION', 'Descripción del evento');
jr_define ('_JOMRES_ICAL_RESULT_HEADER_START', 'Inicio');
jr_define ('_JOMRES_ICAL_RESULT_HEADER_END', 'Fin');
jr_define ('_JOMRES_ICAL_RESULT_HEADER_RESULT', 'Resultado');
jr_define ('_JOMRES_ICAL_WITHHELD', 'Retenido');
jr_define ('_JOMRES_ICAL_FEED_SETTINGS_DESC', 'Sus feeds de iCal pueden mostrar las próximas reservas en un calendario remoto que incluye su dispositivo móvil, Google Calendar, Apple Calendar, Thunderbird, Outlook y más.');
jr_define ('_JOMRES_ICAL_SYNC_SETTINGS_DESC', 'Esta función te permite sincronizar reservas de sitios como Airbnb, Homeway y otros con Jomres. Tendrás que ingresar la URL del feed de iCal de tu propiedad para cada sitio con el que quieras sincronizar. reserve su propiedad en Airbnb, por ejemplo, esas fechas también se mostrarán como bloqueadas (reservas negras) en este sitio de Jomres, por lo que nadie también puede reservar esas fechas aquí. Esto no sincronizará los detalles de la reserva entre sitios (como detalles de huéspedes, precios, facturas, etc.) pero es una forma agradable y fácil de evitar reservas dobles sincronizando solo la disponibilidad. ');
jr_define ('_JOMRES_ICAL_SYNC_SETTINGS', 'Configuración de sincronización de iCal');
jr_define ('_JOMRES_ICAL_FEED_SETTINGS', 'Configuración de feeds de iCal');
jr_define ('_JOMRES_ICAL_SYNC_URL1', 'URL externa de iCal');
jr_define ('_JOMRES_ICAL_FEED_INCLUDE_ENQUIRIES', '¿También incluir consultas de reserva?');
jr_define ('_JOMRES_ICAL_FEED_INCLUDE_ENQUIRIES_DESC', 'Si está habilitado, también incluirá las reservas que aún no están aprobadas (si la función de aprobación de reservas está habilitada). Mantener esta opción deshabilitada es una excelente manera de ocultar las reservas del calendario que tal vez estén esperando confirmación en un estado no aprobado / de consulta. Si las reservas no requieren aprobación (la función de aprobación de reservas está desactivada), todas las reservas se exportarán. ');

jr_define ('_JOMRES_ICAL_REMOTE_FEED', 'iCal Remote Feeds');
jr_define ('_JOMRES_ICAL_REMOTE_FEED_URL', 'URL remota');
jr_define ('_JOMRES_ICAL_REMOTE_FEED_ROOM_UID', 'UID de habitación');
jr_define ('_JOMRES_ICAL_REMOTE_FEED_ROOM_NAME', 'Nombre / número de la habitación');
jr_define ('_JOMRES_ICAL_REMOTE_INFO', "Seleccione la habitación a la que afectará este feed y la URL del sitio remoto. Al importar un archivo iCal, la fecha de finalización del evento debe ser la fecha de salida del invitado. El resumen debe ser el nombre del invitado. Evento la descripción puede contener todos los demás detalles. ");

jr_define ('_JOMRES_ICAL_REMOTE_FEED_SAVED', 'Fuente remota de Ical creada');
jr_define ('_JOMRES_ICAL_REMOTE_FEED_DELETED', 'Fuente remota de Ical eliminada');