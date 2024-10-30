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


jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHANNEL_ID_NOT_SET', "No s'ha definit l'identificador del canal");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MANAGER_ID_NOT_SET', "No s'ha definit l'identificador de gestor");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_TITLE', "Marc del gestor de canals");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_FRONTEND_TITLE', "Canals");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_INSTALLED_CHANNELS', "Canals instal·lats");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHOOSE_CHANNEL', "Selecciona un canal");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHOOSE_CHANNEL_CHOOSE_DICTIONARY_TYPE', "Tria el tipus de diccionari");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHANNEL_NONE_INSTALLED', "Error, no hi ha canals instal·lats");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_SANITY_CHECKS_TITLE', "Comprovacions de seny del gestor de canals");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_SANITY_CHECKS_DESC', "Seleccioneu un canal. Un cop hàgiu fet això, comprovarem la vostra configuració i ressaltarem els possibles problemes que pugueu haver d'abordar.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_TITLE', "Assignació de recursos");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_DESC', "Els diferents canals tenen el que es coneix com a diccionaris. Aquests són termes per descriure recursos com tipus d'habitacions, funcions d'habitacions, funcions de propietats, etc. recursos perquè les propietats importades i exportades als canals tinguin els recursos correctes. En aquesta pàgina, primer seleccionareu un canal. Un cop fet, se us dirigirà a una pàgina nova on podreu seleccionar els tipus de recursos que voleu mapar. als recursos del canal (per exemple, funcions de propietat). Un cop seleccionat el tipus de recurs, podreu triar els recursos de Jomres i del canal entre ells. ");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_SELECT_RESOURCE', "Aquí heu de seleccionar el recurs (diccionari)");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_NO_LOCAL_ITEMS', "No hi ha elements locals per a aquest ítem del diccionari, de manera que no hi ha res amb què assignar-se.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_CHANNEL_DICTIONARY_CLASS_DOESNT_EXIST', "Error, el canal no té una classe de diccionari.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_MAP_ITEM_TYPES_INSTRUCTIONS', "En aquesta pàgina haureu de mapar els elements del diccionari del gestor de canals amb els de Jomres.");

jr_define ('CHANNELMANAGEMENT_FRAMEWORK_USER_ACCOUNTS', "Comptes de gestor de canals");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_USER_ACCOUNTS_DESC', "Si us plau, deseu la informació d'autorització per a qualsevol gestor de canal amb el qual tingueu comptes.");
jr_define ('ACABAR', 'Acabar l\'edició');
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_EXTRAS_NOTINSTALLED', "Error, el connector Extras opcionals no està instal·lat.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_CHANNEL_NAME_NOT_SUPPLIED', "No es proporciona el nom del canal");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_NEW_PROPERTY_OBJECT_NOT_SUPPLIED', "Nou objecte de propietat no subministrat");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_THISJRUSER_OBJECT_NOT_SUPPLIES', "l'objecte thisJRUser no subministrat");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING', "Inici de la importació de propietats");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTED', "Propietat importada correctament");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_FAILED', "No s'ha pogut importar la propietat");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT', "Importa totes les propietats");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_ONE', "Importar propietat");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_UNPUBLISHED_CANNOT_IMPORT', "Les propietats que no estan marcades com publicades / activades al servidor remot o les propietats que no tenen cap element de registre de canvis no es poden importar.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORTING', "Inici de la importació de la tarifa");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORTED', "Aranzel importat correctament");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORT_FAILED', "No s'ha pogut importar la tarifa");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_SETTINGS_FAILED_VALIDATION', "No es pot validar la configuració de la propietat, s'ha intentat importar una configuració de propietat no reconeguda");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_PAGETITLE', "Propietats importades");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_PROPERTY_NAME', "Nom de la propietat");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_CHANNEL_NAME', "Nom del canal");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_LOCAL_PROPERTY_UID', "UID de propietat local");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_REMOTE_PROPERTY_UID', "UID de propietat remota");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_EDIT_REMOTE_PROPERTY', "Edita remot");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_EDIT_LOCAL_PROPERTY', "Veure local");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_DELETE_LOCAL_PROPERTY', "Suprimeix local");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MENUITEM_DASHBOARD', "Tauler");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MENUITEM_ACCOUNTS', "Comptes del canal");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_THIN_CHANNELS_NOT_INSTALLED', "No hi ha connectors de canal prim instal·lats, encara no podeu utilitzar aquesta característica.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_INFO', "Les propietats no assignades que gestioneu es poden assignar a un canal. Si canvieu el canal, doneu a qualsevol canal amb accés a l'API vàlid");