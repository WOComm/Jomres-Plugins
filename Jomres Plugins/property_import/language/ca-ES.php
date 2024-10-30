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
jr_define('_JOMRES_PROPERTY_IMPORT_TITLE',"Importació de propietats");
jr_define('_JOMRES_PROPERTY_IMPORT_DESC',"Aquesta característica us permet importar propietats mitjançant un fitxer CSV. A causa de les diverses comprovacions necessàries, us recomanem que limiteu el nombre de propietats creades a lots de no més de 50 alhora. ");
jr_define('_JOMRES_PROPERTY_IMPORT_SELECT',"Si us plau, trieu el fitxer que voleu carregar.");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELDS',"El fitxer csv ha de tenir 11 columnes i els camps no han de contenir cap html. Tots els camps són obligatoris.");

jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_NAME',"Nom de la propietat");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_NAME_TYPE',"Text");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_ROOMS',"El nombre d'habitacions (si es tracta d'una vila/casa de camp, independentment del nombre d'habitacions de la propietat real, hauria de ser 1. Només els hotels/B&Bs, etc. han de tenir més d'una habitació). Sencer . ");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_ROOMS_TYPE',"Enter");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_PRICE',"Preu per nit sense codis de moneda.");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_PRICE_TYPE',"Float");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_EMAIL_ADDRESS',"Adreça de correu electrònic");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_EMAIL_ADDRESS_TYPE',"Text");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_STREET',"Carrer");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_STREET_TYPE',"Text");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TOWN', "Ciutat");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TOWN_TYPE',"Text");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_REGION',"Regió. Cal que es correspongui amb els identificadors de les regions emmagatzemades a la taula Regions");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_REGION_TYPE',"Enter");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_COUNTRY',"País de la propietat. Codi curt, p. ex. GB o DE, no el nom complet del país");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_COUNTRY_TYPE',"Text");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_POSTCODE',"Codi postal");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_POSTCODE_TYPE',"Text");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TELEPHONE',"Número de telèfon");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TELEPHONE_TYPE',"Text");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_DESCRIPTION',"La descripció completa de la propietat. Màxim de 500 caràcters");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_DESCRIPTION_TYPE',"Text");

jr_define('_JOMRES_PROPERTY_IMPORT_PROPERTY_TYPE_NOT_SENT',"Error, no s'ha definit el tipus de propietat.");
jr_define ('_JOMRES_PROPERTY_IMPORT_NO_ROOM_TYPES_FOR_PROPERTY_TYPE', "Error, no tenim cap tipus d'habitació per a aquest tipus de propietat. Podeu corregir-ho visitant Estructura del lloc a l'àrea d'administrador.");
jr_define('_JOMRES_PROPERTY_IMPORT_NO_FILE',"Vaja, t'has oblidat de pujar un fitxer? ");

jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_TOO_MANY_COLUMNS',"S'han trobat massa columnes, el fitxer té un format incorrecte o les dades csv no estan ben construïdes.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_PROPERTY_NAME_NOT_SET',"El nom de la propietat no s'ha definit.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NUMBER_OF_ROOMS_INCORRECT',"El nombre d'habitacions no s'ha definit.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_PRICE_NOT_SET',"No s'ha establert el preu per nit.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_COULD_NOT_VALIDATE_EMAIL_ADDRESS',"No s'ha pogut validar l'adreça de correu electrònic.");
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_STREET', "El carrer no s'ha definit.");
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_TOWN', "La ciutat no s'ha definit.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_REGION',"La regió no s'ha definit.");
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_COUNTRY', "El país no s'ha definit.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_POSTCODE',"El codi postal no s'ha definit.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_TELEPHONE',"El telèfon no s'ha configurat.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_DESCRIPTION',"La descripció no s'ha establert.");

jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_SUCCESS', "La propietat s'ha importat correctament!");

jr_define('_JOMRES_PROPERTY_IMPORT_FAILED_PROPERTIES',"Com que teniu una o més propietats que no s'han importat, només hem exportat aquestes propietats al camp següent. Podeu copiar aquestes propietats a Excell/Open Office calc/la vostra elecció del gestor de fitxers CSV i corregir-les. els problemes sense haver de tornar a importar totes les propietats de nou.");