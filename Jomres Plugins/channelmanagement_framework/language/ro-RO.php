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

jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHANNEL_ID_NOT_SET', "ID-ul canalului nu este setat");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MANAGER_ID_NOT_SET', "ID-ul managerului nu este setat");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_TITLE', "Channel Manager Framework");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_FRONTEND_TITLE', "Canale");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_INSTALLED_CHANNELS', "Canale instalate");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHOOSE_CHANNEL', "Selectați un canal");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHOOSE_CHANNEL_CHOOSE_DICTIONARY_TYPE', "Alegeți tipul dicționarului");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHANNEL_NONE_INSTALLED', "Eroare, nu există canale instalate");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_SANITY_CHECKS_TITLE', "Verificări de sănătate ale managerului de canal");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_SANITY_CHECKS_DESC', "Selectați un canal. După ce ați făcut acest lucru, vă vom verifica configurația și vom evidenția eventualele probleme pe care este posibil să trebuiască să le abordați.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_TITLE', "Cartografierea resurselor");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_DESC', "Diferite canale au ceea ce sunt cunoscute sub numele de Dicționare. Aceștia sunt termeni pentru a descrie resurse, cum ar fi tipurile de cameră, caracteristicile camerei, caracteristicile proprietății etc. Înainte de a putea utiliza canalul, trebuie să mapați diferite resurse Jomres cu canalele individuale resurse, astfel încât proprietățile importate și exportate pe canale să aibă resursele corecte. În această pagină veți selecta mai întâi un canal. După ce ați terminat, veți fi dus la o nouă pagină unde veți putea selecta tipurile de resurse pe care doriți să le mapați. la resursele Canalului (de exemplu, caracteristicile proprietății). Odată selectat tipul de resursă, veți putea alege resursele Jomres și Canal împreună. ");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_SELECT_RESOURCE', "Aici trebuie să selectați resursa (dicționar)");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_NO_LOCAL_ITEMS', "Nu există articole locale pentru acest articol din dicționar, deci nu există nimic de asociat.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_CHANNEL_DICTIONARY_CLASS_DOESNT_EXIST', "Eroare, canalul nu are o clasă de dicționar.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_MAP_ITEM_TYPES_INSTRUCTIONS', "Pe această pagină va trebui să mapați elementele din dicționarul administratorului de canale cu cele din Jomres.");

jr_define ('CHANNELMANAGEMENT_FRAMEWORK_USER_ACCOUNTS', "Conturi manager canale");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_USER_ACCOUNTS_DESC', "Vă rugăm să salvați informațiile de autorizare pentru orice manager de canal cu care ați putea avea conturi.");
jr_define ('FINISH', 'Finish editing');
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_EXTRAS_NOTINSTALLED', "Eroare, pluginul Opțional Extras nu este instalat.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_CHANNEL_NAME_NOT_SUPPLIED', "Numele canalului nu este furnizat");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_NEW_PROPERTY_OBJECT_NOT_SUPPLIED', "Obiectul de proprietate nou nu este furnizat");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_THISJRUSER_OBJECT_NOT_SUPPLIES', "acest obiect JRUser nu este furnizat");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING', "Începând importul proprietății");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTED', "Proprietatea importată cu succes");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_FAILED', "Nu s-a putut importa proprietatea");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT', "Import toate proprietățile");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_ONE', "Import proprietate");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_UNPUBLISHED_CANNOT_IMPORT', "Proprietățile care nu sunt marcate ca publicate / activate pe serverul de la distanță sau proprietățile care nu au niciun articol din jurnalul de schimbări, nu pot fi importate.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORTING', "Începând importul tarifului");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORTED', "Tarif importat cu succes");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORT_FAILED', "Tariful de import nu a reușit");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_SETTINGS_FAILED_VALIDATION', "Imposibil de validat setările proprietății, s-a încercat importarea unei setări de proprietate nerecunoscute");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_PAGETITLE', "Proprietăți importate");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_PROPERTY_NAME', "Numele proprietății");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_CHANNEL_NAME', "Numele canalului");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_LOCAL_PROPERTY_UID', "UID proprietate locală");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_REMOTE_PROPERTY_UID', "UID proprietate la distanță");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_EDIT_REMOTE_PROPERTY', "Editați telecomanda");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_EDIT_LOCAL_PROPERTY', "Vizualizare locală");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_DELETE_LOCAL_PROPERTY', "Delete local");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MENUITEM_DASHBOARD', "Tablou de bord");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MENUITEM_ACCOUNTS', "Conturi de canal");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_THIN_CHANNELS_NOT_INSTALLED', "Nu există pluginuri de canal subțire instalate, nu puteți utiliza încă această caracteristică.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_INFO', "Proprietățile neatribuite pe care le gestionați pot fi atribuite unui canal. Dacă schimbați canalul, dați oricărui canal cu acces API valid");