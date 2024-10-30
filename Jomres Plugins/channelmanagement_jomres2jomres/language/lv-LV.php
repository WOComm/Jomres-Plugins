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

jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_TITLE', "Jomres 2 Jomres integrācija");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_TITLE', "Vecāku vietnes klienta ID");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_DESC', "Mātes vietnes klienta ID. Mātes vietnē jums būs nepieciešams unikāls klienta ID un noslēpums, kurā ir instalēti visi API funkciju spraudņi, instalēts kanālu pārvaldības sistēmas spraudnis un kad veidojat/rediģējat klienta ID/ slepeno atslēgu pāri, jums būs jāpiešķir tai piekļuve visām pieejamajām darbības jomām. ");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_TITLE', "Vecāku vietnes klienta noslēpums");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_DESC', "Galvenās vietnes klienta noslēpums");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENTSITE_TITLE', "Vecāku URL");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENTSITE_DESC', "URL uz Jomres mātes vietni.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_NOT_SET', "Kļūda, jūsu vecāku vietnes klienta ID nav iestatīts. Apmeklējiet cilni Vietnes konfigurācija> Kanālu pārvaldnieka konti, lai saglabātu klienta ID.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_NOT_SET', "Kļūda, jūsu vecāku vietnes noslēpums nav iestatīts. Lai saglabātu noslēpumu, apmeklējiet cilni Vietnes konfigurācija> Kanālu pārvaldnieka konti.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENT_NOT_SET', "Kļūda, jūsu vecāku vietnes slepenais URL nav iestatīts. Apmeklējiet cilni Vietnes konfigurācija> Kanālu pārvaldnieka konti, lai saglabātu vecāku vietnes URL.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_NOT_SET_ADMIN_SANITY_CHECK_MESSAGE', "Kļūda, jūsu klienta ID nav iestatīts. Lai saglabātu savu lietotājvārdu, apmeklējiet cilni Vietnes konfigurācija> Kanālu pārvaldnieka konti");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_NOT_SET_ADMIN_SANITY_CHECK_MESSAGE', "Kļūda, jūsu klienta ID nav iestatīts. Lai saglabātu paroli, apmeklējiet cilni Vietnes konfigurācija> Kanālu pārvaldnieka konti");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_TITLE', "Kanāla iestatīšana");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_MESSAGE', "Jomres 2 Jomres: jaunu īpašumu importēšana.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_BUTTON_IMPORT', "IMPORT");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_BUTTON_EXPORT', "EKSPORTS");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_PROPERTYID_NOTSET', "Īpašuma ID nav iestatīts");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET', "Kartes vārdnīcas vienumi nav iestatīti");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_PROPERTYTYPE_NOTFOUND', "Vietējā īpašuma veids nav atrasts. Ja īpašuma veids ir izveidots, lūdzu, pārliecinieties, vai esat saistījis attālā pakalpojuma īpašuma tipu ar vietējā īpašuma tipu.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_REMOTEPROPERTYTYPE_NOTFOUND', "Kanāls neatgriež attālā īpašuma veidu.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_LOCAL_PROPERTYTYPE_NOTFOUND', "Vietējā īpašuma veids nav nodots.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_BOOKING_MODEL_NOT_FOUND', "Nevarēja noteikt rezervācijas modeli (mrp vai srp).");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_BOOKING_MODEL_NOT_FOUND_IN_PROPERTY_TYPE', "Nevarēja noteikt rezervācijas modeli (mrp vai srp) pēc īpašuma tipa ID atrašanas.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_COUNTRY_CODE_NOT_FOUND', "Nevarēja noteikt valsts kodu");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_REGION_ID_NOT_FOUND', "Nevarēja noteikt reģiona ID");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_VALIDATE_SETTINGS_FAILED', "Nevarēja pareizi apstiprināt iestatījumu masīvu");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_PTYPES', "Administratora nav kartēti īpašuma veidi");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_PFEATURES', "Īpašuma iezīmes, kuras nav kartējis administrators");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_ROOM_TYPES', "Administratori nav kartējuši telpu tipus");