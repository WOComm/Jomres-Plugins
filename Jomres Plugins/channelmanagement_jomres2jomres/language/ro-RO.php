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


jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_TITLE', "Jomres 2 Jomres Integration");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_TITLE', "ID client client părinte");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_DESC', "ID-ul clientului site-ului părinte. Pe site-ul părinte veți avea nevoie de un ID de client unic și secret cu toate pluginurile de caracteristici API instalate, pluginul Channel Management Framework instalat și când creați / editați ID-ul clientului / pereche de chei secrete va trebui să îi oferi acces la toate domeniile disponibile. ");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_TITLE', "Secretul clientului site-ului părinte");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_DESC', "Secretul clientului site-ului părinte");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENTSITE_TITLE', "URL părinte");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENTSITE_DESC', "Adresa URL către site-ul părinte Jomres.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_NOT_SET', "Eroare, ID-ul clientului site-ului părinte nu este setat. Accesați fila Configurare site> Conturi Channel Manager pentru a salva ID-ul clientului dvs.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_NOT_SET', "Eroare, secretul site-ului părinte nu este setat. Accesați fila Configurare site> Conturi Channel Manager pentru a vă salva secretul.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENT_NOT_SET', "Eroare, adresa secretă a site-ului părinte nu este setată. Accesați fila Configurare site> Conturi Channel Manager pentru a salva adresa URL a site-ului părinte.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_NOT_SET_ADMIN_SANITY_CHECK_MESSAGE', "Eroare, ID-ul clientului dvs. nu este setat. Accesați Configurarea site-ului> fila Conturi manager canal pentru a vă salva numele de utilizator.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_NOT_SET_ADMIN_SANITY_CHECK_MESSAGE', "Eroare, ID-ul clientului dvs. nu este setat. Accesați Configurarea site-ului> fila Conturi manager canal pentru a vă salva parola.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_TITLE', "Configurare canal");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_MESSAGE', "Jomres 2 Jomres: Importați proprietăți noi.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_BUTTON_IMPORT', "IMPORT");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_BUTTON_EXPORT', "EXPORT");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_PROPERTYID_NOTSET', "ID-ul proprietății nu este setat");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET', "Elementele de dicționar mapate nu sunt setate");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_PROPERTYTYPE_NOTFOUND', "Tipul de proprietate locală nu a fost găsit. Dacă s-a creat tipul de proprietate, asigurați-vă că ați mapat tipul de proprietate al serviciului la distanță cu tipul de proprietate locală.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_REMOTEPROPERTYTYPE_NOTFOUND', "Tipul proprietății la distanță nu este returnat de canal.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_LOCAL_PROPERTYTYPE_NOTFOUND', "Tipul de proprietate locală nu a fost trecut.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_BOOKING_MODEL_NOT_FOUND', "Nu s-a putut determina modelul de rezervare (mrp sau srp).");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_BOOKING_MODEL_NOT_FOUND_IN_PROPERTY_TYPE', "Nu s-a putut determina modelul de rezervare (mrp sau srp) după găsirea ID-ului tipului de proprietate.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_COUNTRY_CODE_NOT_FOUND', "Nu s-a putut determina codul țării");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_REGION_ID_NOT_FOUND', "Nu s-a putut determina id-ul regiunii");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_VALIDATE_SETTINGS_FAILED', "Nu s-a putut valida corect setul de setări");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_PTYPES', "Tipuri de proprietăți care nu sunt mapate de administrator");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_PFEATURES', "Caracteristicile proprietății nu sunt mapate de administrator");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_ROOM_TYPES', "Tipuri de camere care nu sunt mapate de administrator");