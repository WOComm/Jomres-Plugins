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

jr_define('_JOMRES_ICAL_EVENT', 'iCal notikums');
jr_define( '_JOMRES_ICAL_FEED', 'iCal Feed' );
jr_define( '_JOMRES_ICAL_FEED_LINK', 'iCal plūsmas URL' );
jr_define( '_JOMRES_ICAL_FEEDS', 'iCal Feed/s' );
jr_define ('_JOMRES_ICAL_FEEDS_DESC', 'Jūsu iCal plūsma (-s) var parādīt gaidāmās rezervācijas attālā kalendārā, tostarp jūsu mobilajā ierīcē, Google kalendārā, Apple kalendārā, Thunderbird, Outlook un citur. Lai abonētu plūsmu, izmantojiet šo URL. jūsu kalendāra programmatūra.' );
jr_define( '_JOMRES_ICAL_ANON', 'Anonimizēts iCal plūsmas URL' );
jr_define( '_JOMRES_ICAL_ALLOW_ANON', 'Atļaut anonīmu piekļuvi iCal plūsmai/-ām?' );
jr_define( '_JOMRES_ICAL_ALLOW_ANON_DESC', 'Ja šī opcija ir iespējota, jūsu iCal notikumu plūsma būs pieejama visiem, taču bez rezervācijas vai viesa informācijas.' );
jr_define( '_JOMRES_ICAL_IMPORT', 'iCal Import' );
jr_define( '_JOMRES_ICAL_SELECT', 'Izvēlēties importējamo failu');
jr_define( '_JOMRES_ICAL_NO_FILE_UPLOADED', 'Kļūda, fails netika augšupielādēts.' );
jr_define( '_JOMRES_ICAL_IMPORT_INFO', "Importējot iCal failu, notikuma beigu datumam ir jābūt viesa izbraukšanas datumam. Kopsavilkumam jābūt viesa vārdam. Pasākuma aprakstā var būt ietverta visa cita informācija." );

jr_define( '_JOMRES_ICAL_ERROR_BOOKING_NUMBER_EXISTS', 'Šis rezervācijas numurs jau pastāv sistēmā.' );
jr_define( '_JOMRES_ICAL_ERROR_NO_ROOMS', 'Izvēlētajos datumos neviena telpa nav pieejama.' );
jr_define( '_JOMRES_ICAL_ERROR_NO_EVENTS', 'ics failā netika atrasts neviens notikums.' );
jr_define ('_JOMRES_ICAL_SUCCESS', 'Notikums veiksmīgi importēts');
jr_define( '_JOMRES_ICAL_FAILURE', 'Notikumu nevarēja importēt' );

jr_define( '_JOMRES_ICAL_RESULT_HEADER_SUMMARY', 'Viesa vārds');
jr_define( '_JOMRES_ICAL_RESULT_HEADER_DESCRIPTION', 'Notikuma apraksts' );
jr_define( '_JOMRES_ICAL_RESULT_HEADER_START', 'Sākt');
jr_define('_JOMRES_ICAL_RESULT_HEADER_END', 'Beigas');
jr_define( '_JOMRES_ICAL_RESULT_HEADER_RESULT', 'Rezultāts');
jr_define( '_JOMRES_ICAL_WITHHELD', 'Aizturēts');
jr_define( '_JOMRES_ICAL_FEED_SETTINGS_DESC', 'Jūsu iCal plūsma/-es var parādīt gaidāmās rezervācijas attālā kalendārā, tostarp jūsu mobilajā ierīcē, Google kalendārā, Apple kalendārā, Thunderbird, Outlook un citās.' );
jr_define( '_JOMRES_ICAL_SYNC_SETTINGS_DESC', 'Šī funkcija ļauj sinhronizēt rezervācijas no tādām vietnēm kā Airbnb, Homeway un citām vietnēm ar Jomres. Jums būs jāievada sava īpašuma iCal plūsmas URL katrai vietnei, ar kuru vēlaties sinhronizēt. Ja kāds to darīs rezervējiet savu īpašumu, piemēram, Airbnb, arī šajā Jomres vietnē šie datumi tiks rādīti kā bloķēti (melnās rezervācijas), tāpēc neviens nevar arī rezervēt šos datumus šeit. Tas nesinhronizēs rezervācijas informāciju starp vietnēm (piemēram, informāciju par viesiem, cenas, rēķini utt.), bet tas ir jauks un vienkāršs veids, kā izvairīties no dubultām rezervācijām, sinhronizējot tikai pieejamību. ');
jr_define( '_JOMRES_ICAL_SYNC_SETTINGS', 'iCal sinhronizācijas iestatījumi');
jr_define( '_JOMRES_ICAL_FEED_SETTINGS', 'iCal plūsmas iestatījumi');
jr_define ('_JOMRES_ICAL_SYNC_URL1', 'Ārējais iCal URL');
jr_define( '_JOMRES_ICAL_FEED_INCLUDE_ENQUIRIES', 'Vai iekļaut arī rezervācijas jautājumus?' );
jr_define( '_JOMRES_ICAL_FEED_INCLUDE_ENQUIRIES_DESC', 'Ja iespējots, tajā tiks iekļautas arī rezervācijas, kas vēl nav apstiprinātas (ja ir iespējota rezervāciju apstiprināšanas funkcija). Šīs opcijas atspējošana ir lielisks veids, kā paslēpt kalendārā rezervācijas, kuras, iespējams, gaida apstiprinājumu neapstiprināta/pieprasījuma statuss. Ja rezervācijām nav nepieciešams apstiprinājums (rezervāciju apstiprināšanas funkcija ir atspējota), visas rezervācijas tiks eksportētas.' );

jr_define('_JOMRES_ICAL_REMOTE_FEED', 'iCal attālās plūsmas');
jr_define( '_JOMRES_ICAL_REMOTE_FEED_URL', 'Attālais URL');
jr_define( '_JOMRES_ICAL_REMOTE_FEED_ROOM_UID', 'Istabas UID');
jr_define ('_JOMRES_ICAL_REMOTE_FEED_ROOM_NAME', 'Istabas nosaukums/numurs');
jr_define ('_JOMRES_ICAL_REMOTE_INFO', "Atlasiet telpu, ko šī plūsma ietekmēs, un attālās vietnes URL. Importējot iCal failu, notikuma beigu datumam jābūt viesa izbraukšanas datumam. Kopsavilkumam jābūt viesa vārdam. aprakstā var būt ietverta visa cita informācija." );

jr_define( '_JOMRES_ICAL_REMOTE_FEED_SAVED', 'Ical attālā plūsma izveidota' );
jr_define( '_JOMRES_ICAL_REMOTE_FEED_DELETED', 'Ical attālā plūsma dzēsta' );