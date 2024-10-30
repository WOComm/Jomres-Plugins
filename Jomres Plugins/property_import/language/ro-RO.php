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


jr_define('_JOMRES_PROPERTY_IMPORT_TITLE',"Import de proprietate");
jr_define('_JOMRES_PROPERTY_IMPORT_DESC',"Această caracteristică vă permite să importați proprietăți prin fișierul CSV. Din cauza diferitelor verificări necesare, vă recomandăm să limitați numărul de proprietăți create la loturi de cel mult 50 la un moment dat. ");
jr_define('_JOMRES_PROPERTY_IMPORT_SELECT',"Vă rugăm să alegeți fișierul pe care doriți să îl încărcați.");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELDS', "Fișierul CSV ar trebui să aibă 11 coloane, iar câmpurile să nu conțină niciun html. Toate câmpurile sunt obligatorii.");

jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_NAME',"Numele proprietății");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_NAME_TYPE',"Text");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_ROOMS',"Numărul de camere (dacă aceasta este o vilă/casă, atunci indiferent de numărul de camere din proprietatea reală, atunci acesta ar trebui să fie 1. Numai hoteluri/pensiuni etc. ar trebui să aibă mai multe camere). Întreg . ");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_ROOMS_TYPE',"Integer");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_PRICE', "Preț pe noapte fără coduri valutare.");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_PRICE_TYPE',"Float");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_EMAIL_ADDRESS',"Adresa de e-mail");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_EMAIL_ADDRESS_TYPE', "Text");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_STREET',"Strada");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_STREET_TYPE',"Text");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TOWN',"Oraș");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TOWN_TYPE', "Text");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_REGION',"Regiune. Aceasta trebuie să corespundă cu ID-urile regiunilor stocate în tabelul Regions");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_REGION_TYPE', "Întreg");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_COUNTRY',"Țara proprietății. Cod scurt, de exemplu GB sau DE, nu numele complet al țării");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_COUNTRY_TYPE',"Text");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_POSTCODE',"Cod poștal");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_POSTCODE_TYPE',"Text");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TELEPHONE',"Număr de telefon");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TELEPHONE_TYPE', "Text");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_DESCRIPTION',"Descrierea completă a proprietății. Maximum 500 de caractere");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_DESCRIPTION_TYPE',"Text");

jr_define('_JOMRES_PROPERTY_IMPORT_PROPERTY_TYPE_NOT_SENT',"Eroare, tipul de proprietate nu a fost setat.");
jr_define('_JOMRES_PROPERTY_IMPORT_NO_ROOM_TYPES_FOR_PROPERTY_TYPE',"Eroare, nu avem niciun tip de cameră pentru acel tip de proprietate. Puteți corecta acest lucru vizitând Structura site-ului în zona de administrator.");
jr_define('_JOMRES_PROPERTY_IMPORT_NO_FILE',"Hopa, ai uitat să încarci un fișier? ");

jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_TOO_MANY_COLUMNS',"Au fost găsite prea multe coloane, fie fișierul este malformat, fie datele csv nu sunt corect construite.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_PROPERTY_NAME_NOT_SET',"Numele proprietății nu a fost setat.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NUMBER_OF_ROOMS_INCORRECT',"Numărul de camere nu a fost setat.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_PRICE_NOT_SET',"Prețul pe noapte nu a fost setat.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_COULD_NOT_VALIDATE_EMAIL_ADDRESS',"Nu s-a putut valida adresa de e-mail.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_STREET',"Strada nu a fost setată.");
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_TOWN', "Orașul nu a fost setat.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_REGION',"Regiunea nu a fost setată.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_COUNTRY',"Țara nu a fost setată.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_POSTCODE',"Codul poștal nu a fost setat.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_TELEPHONE',"Telefonul nu a fost setat.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_DESCRIPTION',"Descrierea nu a fost setată.");

jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_SUCCESS', "Proprietatea a fost importată cu succes!");

jr_define ('_JOMRES_PROPERTY_IMPORT_FAILED_PROPERTIES', "Deoarece aveți una sau mai multe proprietăți care nu au reușit să importe, am exportat doar acele proprietăți în câmpul de mai jos. Puteți copia aceste proprietăți în excel / open office calc / alegerea dvs. de gestionare a fișierelor CSV și remedierea problemele fără a fi nevoie să reimportați din nou toate proprietățile.");