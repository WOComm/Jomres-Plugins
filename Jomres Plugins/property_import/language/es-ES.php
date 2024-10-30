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

jr_define ('_JOMRES_PROPERTY_IMPORT_TITLE', "Importación de propiedad");
jr_define ('_JOMRES_PROPERTY_IMPORT_DESC', "Esta función le permite importar propiedades a través de un archivo CSV. Debido a las diversas comprobaciones necesarias, le recomendamos que limite el número de propiedades creadas a lotes de no más de 50 a la vez");
jr_define ('_JOMRES_PROPERTY_IMPORT_SELECT', "Elija el archivo que desea cargar");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELDS', "El archivo csv debe tener 11 columnas y los campos no deben contener html. Todos los campos son obligatorios.");

jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_NAME', "Nombre de la propiedad");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_NAME_TYPE', "Texto");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_ROOMS', "El número de habitaciones (si se trata de una villa / cabaña, independientemente del número de habitaciones en la propiedad real, entonces debe ser 1. Solo los hoteles / B & Bs, etc. deben tener más de una habitación). Entero . ");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_ROOMS_TYPE', "Entero");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_PRICE', "Precio por noche sin códigos de moneda.");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_PRICE_TYPE', "Flotante");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_EMAIL_ADDRESS', "Dirección de correo electrónico");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_EMAIL_ADDRESS_TYPE', "Texto");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_STREET', "Calle");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_STREET_TYPE', "Texto");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TOWN', "Ciudad");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TOWN_TYPE', "Texto");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_REGION', "Región. Esto debe corresponder con los ID de las regiones almacenadas en la tabla de Regiones");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_REGION_TYPE', "Entero");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_COUNTRY', "País de la propiedad. Código corto, por ejemplo, GB o DE, no el nombre completo del país");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_COUNTRY_TYPE', "Texto");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_POSTCODE', "Código postal");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_POSTCODE_TYPE', "Texto");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TELEPHONE', "Número de teléfono");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TELEPHONE_TYPE', "Texto");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_DESCRIPTION', "La descripción completa de la propiedad. Máximo 500 caracteres");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_DESCRIPTION_TYPE', "Texto");

jr_define ('_JOMRES_PROPERTY_IMPORT_PROPERTY_TYPE_NOT_SENT', "Error, el tipo de propiedad no se estableció");
jr_define ('_JOMRES_PROPERTY_IMPORT_NO_ROOM_TYPES_FOR_PROPERTY_TYPE', "Error, no tenemos ningún tipo de habitación para ese tipo de propiedad. Puede corregir esto visitando Estructura del sitio en el área de administrador.");
jr_define ('_JOMRES_PROPERTY_IMPORT_NO_FILE', "Ups, ¿olvidaste subir un archivo?");

jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_TOO_MANY_COLUMNS', "Se encontraron demasiadas columnas, o el archivo está mal formado o los datos csv no están construidos correctamente.");
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_PROPERTY_NAME_NOT_SET', "No se estableció el nombre de la propiedad.");
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_NUMBER_OF_ROOMS_INCORRECT', "No se estableció el número de habitaciones.");
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_PRICE_NOT_SET', "No se estableció el precio por noche");
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_COULD_NOT_VALIDATE_EMAIL_ADDRESS', "No se pudo validar la dirección de correo electrónico.");
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_STREET', "La calle no se estableció");
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_TOWN', "No se estableció la ciudad.");
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_REGION', "No se estableció la región.");
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_COUNTRY', "No se estableció el país");
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_POSTCODE', "No se estableció el código postal.");
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_TELEPHONE', "No se configuró el teléfono");
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_DESCRIPTION', "No se estableció la descripción.");

jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_SUCCESS', "¡La propiedad se importó correctamente!");

jr_define ('_JOMRES_PROPERTY_IMPORT_FAILED_PROPERTIES', "Como tiene una o más propiedades que no pudieron importar, exportamos solo esas propiedades al campo siguiente. Puede copiar estas propiedades en excell / open office calc / su elección de controlador de archivos CSV y corregir los problemas sin tener que volver a importar todas las propiedades. ");