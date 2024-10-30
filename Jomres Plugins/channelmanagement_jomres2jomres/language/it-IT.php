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

jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_TITLE',"Integrazione Jomres 2 Jomres");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_TITLE',"ID client sito padre");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_DESC',"L'ID client del sito padre. Sul sito principale avrai bisogno di un ID client univoco e di un segreto con tutti i plug-in delle funzionalità API installati, il plug-in Channel Management Framework installato e quando crei/modifichi l'id client/ coppia di chiavi segrete sarà necessario dargli accesso a tutti gli ambiti disponibili.");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_TITLE',"Segreto client del sito padre");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_DESC',"Il segreto del client del sito padre");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENTSITE_TITLE',"URL padre");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENTSITE_DESC',"L'URL del sito principale di Jomres. ");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_NOT_SET',"Errore, l'ID client del tuo sito padre non è impostato. Visita la configurazione del sito > scheda Account Channel Manager per salvare l'id client.");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_NOT_SET',"Errore, il segreto del tuo sito principale non è impostato. Visita la scheda Configurazione del sito > Account Channel Manager per salvare il tuo segreto.");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENT_NOT_SET',"Errore, l'URL segreto del tuo sito principale non è impostato. Visita la scheda Configurazione del sito > Account Channel Manager per salvare l'URL del tuo sito principale.");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_NOT_SET_ADMIN_SANITY_CHECK_MESSAGE',"Errore, il tuo ID cliente non è impostato. Visita Configurazione sito > scheda Account Channel Manager per salvare il tuo nome utente.");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_NOT_SET_ADMIN_SANITY_CHECK_MESSAGE',"Errore, il tuo ID cliente non è impostato. Visita la configurazione del sito > la scheda Account Channel Manager per salvare la tua password.");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_TITLE',"Impostazione canale");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_MESSAGE',"Jomres 2 Jomres: Importa nuove proprietà.");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_BUTTON_IMPORT',"IMPORT");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_BUTTON_EXPORT',"EXPORT");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_PROPERTYID_NOTSET',"ID proprietà non impostato");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPPEDDICTIONARYITEMS_NOTSET',"Elementi del dizionario mappati non impostati");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_PROPERTYTYPE_NOTFOUND',"Tipo di proprietà locale non trovato. Se il tipo di proprietà è stato creato, assicurati di aver mappato il tipo di proprietà del servizio remoto al tipo di proprietà locale.");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_REMOTEPROPERTYTYPE_NOTFOUND',"Tipo di proprietà remota non restituito dal canale.");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_LOCAL_PROPERTYTYPE_NOTFOUND',"Tipo di proprietà locale non passato.");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_BOOKING_MODEL_NOT_FOUND',"Impossibile determinare il modello di prenotazione (mrp o srp).");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_BOOKING_MODEL_NOT_FOUND_IN_PROPERTY_TYPE',"Impossibile determinare il modello di prenotazione (mrp o srp) dopo aver trovato l'id del tipo di proprietà.");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_COUNTRY_CODE_NOT_FOUND',"Impossibile determinare il prefisso internazionale");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_REGION_ID_NOT_FOUND',"Impossibile determinare l'id della regione");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_VALIDATE_SETTINGS_FAILED',"Impossibile convalidare correttamente l'array delle impostazioni");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPPEDDICTIONARYITEMS_NOTSET_PTYPES',"Tipi di proprietà non mappati dall'amministratore");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPPEDDICTIONARYITEMS_NOTSET_PFEATURES',"Caratteristiche della proprietà non mappate dall'amministratore");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPPEDDICTIONARYITEMS_NOTSET_ROOM_TYPES',"Tipi di stanza non mappati dall'amministratore");