<?php
/**
 * Plugin
 * @author Vince Wooll <sales@jomres.net>
 * @version Jomres 9
* @package Jomres
* @copyright	2005-2016 Vince Wooll
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly, however all images, css and javascript which are copyright Vince Wooll are not GPL licensed and are not freely distributable. 
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

jr_define('_JOMRES_PROPERTY_IMPORT_TITLE',"Importazione Struttura");
jr_define('_JOMRES_PROPERTY_IMPORT_DESC',"Questa funzione consente di importare strutture tramite file CSV. A causa dei vari controlli richiesti, si consiglia di limitare il numero di strutture create per lotto a non più 50 alla volta. ");
jr_define('_JOMRES_PROPERTY_IMPORT_SELECT',"Scegli il file che desideri caricare.");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELDS',"Il file csv dovrebbe avere 11 colonne e i campi non dovrebbero contenere alcun codice HTML. Tutti i campi sono obbligatori.");

jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_NAME',"Nome della struttura");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_NAME_TYPE',"Testo");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_ROOMS',"Il numero di camere ( se si tratta di una villa/cottage, indipendentemente dal numero di camere nella struttura reale, questo dovrebbe essere 1. Solo gli hotel / B&B ecc. Dovrebbero avere più di una camera). Numero intero.");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_ROOMS_TYPE',"Numero intero");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_PRICE',"Tariffa per notte senza codici valuta.");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_PRICE_TYPE',"Float");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_EMAIL_ADDRESS',"Indirizzo Email");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_EMAIL_ADDRESS_TYPE',"Testo");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_STREET',"Street");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_STREET_TYPE',"Testo");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TOWN',"Town");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TOWN_TYPE',"Testo");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_REGION',"Regione. Questo deve corrispondere agli ID delle regioni memorizzate nella tabella Regioni");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_REGION_TYPE',"Numero intero");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_COUNTRY',"PNazione della struttura. Codice breve, ad esempio GB o DE, non il nome completo della nazione");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_COUNTRY_TYPE',"Testo");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_POSTCODE',"Codice Avviamento Postale");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_POSTCODE_TYPE',"Testo");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TELEPHONE',"Numero di telefono");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TELEPHONE_TYPE',"Testo");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_DESCRIPTION',"La descrizione completa della struttura. Massimo 500 caratteri");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_DESCRIPTION_TYPE',"Testo");

jr_define('_JOMRES_PROPERTY_IMPORT_PROPERTY_TYPE_NOT_SENT',"Errore, non è stata impostata la tipologia di struttura");
jr_define('_JOMRES_PROPERTY_IMPORT_NO_ROOM_TYPES_FOR_PROPERTY_TYPE',"Errore, non sono presenti tipologie di camera per questa tipologia di struttura. Puoi correggerlo visitando la sezione Struttura del Sito nell'area amministratore.");
jr_define('_JOMRES_PROPERTY_IMPORT_NO_FILE',"Ops, hai dimenticato di caricare un file? ");

jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_TOO_MANY_COLUMNS',"Troppe colonne trovate, o il file non è valido oppure i dati csv non sono costruiti correttamente.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_PROPERTY_NAME_NOT_SET',"Il nome della struttura non è stato impostato.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NUMBER_OF_ROOMS_INCORRECT',"Il numero di camere non è stato impostato.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_PRICE_NOT_SET',"La tariffa per notte non è stata impostata.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_COULD_NOT_VALIDATE_EMAIL_ADDRESS',"Impossibile convalidare l'indirizzo e-mail.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_STREET',"La via non è stata impostata.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_TOWN',"La città non è stata impostata.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_REGION',"La regione non è stata impostata.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_COUNTRY',"La nazione non è stata impostata.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_POSTCODE',"Il codice di avviamento postale non è stato impostato.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_TELEPHONE',"Il numero di telefono non è stato impostato.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_DESCRIPTION',"La descrizione non è stata impostata.");

jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_SUCCESS',"La struttura è stata importata correttamente!");

jr_define('_JOMRES_PROPERTY_IMPORT_FAILED_PROPERTIES',"Poiché l'importazione non è andata a buon fine per una o più strutture, sono state esportate solo le strutture nel campo sottostante. Puoi copiare queste strutture in excel/open office calc/un programma di tua scelta per gestire i file CSV e risolvere i problemi senza dover reimportare nuovamente tutte le strutture.");
