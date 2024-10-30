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
// Because the server may be using a proxy for outgoing calls it's better to call the Jomres App server and ask it to respond with this server's IP address. Once we know that, then we are able to give the documentation the correct IP number to configure in Beds24's API Key N field(s)
$cURLConnection = curl_init();

curl_setopt($cURLConnection, CURLOPT_URL, 'https://api.ipify.org?format=json');
curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
curl_setopt($cURLConnection, CURLOPT_CONNECTTIMEOUT, 1);
curl_setopt($cURLConnection, CURLOPT_TIMEOUT, 1);

$ip_number_response = curl_exec($cURLConnection);
curl_close($cURLConnection);

$jsonArrayResponse = json_decode($ip_number_response);

if (isset( $jsonArrayResponse->ip)) {
    $this_servers_ip_number = $jsonArrayResponse->ip;
} else {
    $this_servers_ip_number = 'Unknown, ask your server hosts support team';
}

jr_define ('BEDS24V2_CHANNEL_MANAGEMENT', 'Channel Management (Beds24)');

jr_define ('BEDS24V2_WEBHOOKS_AUTH_METHOD', 'Beds24');
jr_define ('BEDS24V2_WEBHOOKS_AUTH_METHOD_NOTES', 'Hvis du har en Beds24 -konto og vil opdatere Beds24, når du har en reservation, skal du vælge denne mulighed. Indstil URL\'en til https://www.beds24.com/api/json/');
jr_define ('BEDS24V2_ERROR_USER_NO_KEY', 'Denne bruger har ingen API -nøgler angivet, så kan ikke fortsætte. Besøg deres side på siden Brugeradministration> Ejendomsadministratorer og opret en ny API -nøgle til dem ved hjælp af linket på den side.');
jr_define ('BEDS24V2_ERROR_USER_NO_PROPERTIES', 'Denne bruger har ingen Jomres-egenskaber, som de kan tildele Beds24-ejendomme eller omvendt');
jr_define ('BEDS24V2_NOT_SUBSCRIBED', "Den manager, du er logget ind på, ser ikke ud til at have en konto hos Beds24, så du skal først registrere dig for deres service og derefter gemme denne API -nøgle på <a href = 'https://www.beds24.com/control2.php?pagetype=accountpassword' target='_blank'> Beds24's websted her. </a> ");
jr_define ('BEDS24V2_NOT_SUBSCRIBED_KEY', "Kopier og indsæt denne API -nøgle i LINK -feltet i din Beds24 -konto for at fortsætte.");
jr_define ('BEDS24V2_NOT_SUBSCRIBED_RELOAD', "Når du har gjort det, skal du klikke på knappen herunder for at fortsætte.");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_TITLE', "Beds24 ejendomsforbindelse");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_INFO', "Denne side giver dig mulighed for at se de egenskaber, du har adgang til i dette system, plus dem, der findes i Channel Manager. Det giver dig også mulighed for at importere egenskaber fra Channel Manager til dette system eller eksportere eksisterende ejendomme til Channel Manager. <br/> Hvis du har egenskaber både i dette system og Beds24, og du vil linke dem til hinanden, kan du bruge egenskaben apikey til at gøre det. Besøg Beds24> Indstillinger> Egenskaber (sørg for, at den ejendom, der er valgt i rullemenuen, er den samme som den, du vil linke), og derefter i undermenuen Link skal du gemme 'Egenskab apikey' i feltet 'propKey' i Beds24. Når du har gjort det, skal du genindlæse siden. Dette system vil se, at de to ejendomme er knyttet til den samme nøgle og opret de nødvendige associationer. Når de to ejendomme er forbundet, skal du huske at besøge siden Vis ejendom, finde underretningsadressen og indsætte det i feltet \"Notify Url\" for linkside. Det vil sikre, at Beds24 bruger det korrekte link til at synkronisere bookinger med denne ejendom, når den modtager bookinger. ");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_NO_PROPERTIES', "Fejl: Der er ingen egenskaber, du kan linke til i Beds24. Det kan skyldes, at alle ejendomme, du har rettigheder til, allerede er blevet linket til en anden konto på dette system.");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_PROPERTY_UID', "Egenskab uid");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_PROPERTY_NAME', "Ejendomsnavn");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_BEDS24_PROPERTY_UID', "Beds24 Property Uid");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_BEDS24_PROPERTY_NAME', "Beds24 ejendomsnavn");
jr_define ('BEDS24V2_DISPLAY_PROPERTY_APIKEY', "Property apikey");
jr_define ('BEDS24_LISTPROPERTIES_IMPORT', "Import");
jr_define ('BEDS24_LISTPROPERTIES_ASSOCIATE_ROOM_TYPES', "Konfigurer rumtyper");
jr_define ('BEDS24_LISTPROPERTIES_ASSOCIATE_ROOM_TYPES_DESC', "Her skal du linke rumtyper i din Beds24 -konto til dem, der er gemt i dette system.");
jr_define ('_BEDS24_DISPLAY_BOOKINGS_JOMRESROOMS_BEDS24TYPENAME', "Seng24 værelsestype");

jr_define ('BEDS24_LISTPROPERTIES_IMPORT_CANNOT_NOAPIKEY', "Kan ikke importere denne ejendom endnu, da du ikke har angivet ejendomsnøglen på siden Property Link.");
jr_define ('BEDS24_LISTPROPERTIES_IMPORT_CANNOT_NOROOMS', "Kan ikke importere denne ejendom endnu, da den ikke har nogen værelser. Opret et eller flere værelser (værelser i Beds24 er de samme som værelsestyper i Jomres), og glem ikke at angive minimumsprisen . Når du har gjort det, kan du importere værelsestypen til Jomres og knytte dem til nuværende Jomres -værelsestyper. Herefter kan du ændre taksterne, men der skal fastsættes en minimumspris. ");
jr_define ('_BEDS24_SUGGESTED_KEY', "Vi foreslår, at du bruger denne API -nøgle. Når du har gjort det, skal du genindlæse denne side.");
jr_define ('BEDS24_LISTPROPERTIES_EXPORT', "Eksporter");
jr_define ('BEDS24V2_REST_API_INTRO', "Her kan du se dit REST API -nøglepar og stien til API'en. Hvis du gemmer disse oplysninger på din konto på Beds24, vil Beds24 24 kunne kontakte dette websted via dets API.");
jr_define ('BEDS24V2_REST_API_CLIENT_ID', "Client ID");
jr_define ('BEDS24V2_REST_API_CLIENT_SECRET', "Klienthemmelighed");
jr_define ('BEDS24V2_REST_API_ENDPOINT', "URI (slutpunkt)");
jr_define ('BEDS24_LISTPROPERTIES_CONFIGURE', "Vis ejendom");
jr_define ('BEDS24_ROOM_TYPES_TITLE', "Værelsestypeforeninger");

jr_define ('BEDS24_ROOM_TYPES_INFO', "Denne side giver dig mulighed for at knytte dine værelsestyper til dem, der er gemt på Beds24 -serverne.");
jr_define ('BEDS24_ROOM_TYPES_INFO2', "Indtil værelsestyper er forbundet, kan du ikke modtage bookingoplysninger sendt af Beds24. Hvis din ejendom er blevet importeret/eksporteret til eller fra Beds24, har vi automatisk oprettet links til dig, men hvis du tilføjer en ny værelsestype, eller slet en, så kan denne side bruges til at sikre, at værelsestypen er korrekt forbundet. ");
jr_define ('BEDS24_ROOM_TYPES_INFO3', "Vælg de senge24 -værelsestyper, du vil knytte til rumtyperne i dette system, og klik på Gem for at opdatere ændringerne til Senge24");
jr_define ('BEDS24_ROOM_TYPES_YOURS', "Dine værelsestyper");
jr_define ('BEDS24_ROOM_TYPES_BEDS24', "senge24 værelsestyper");
jr_define ('BEDS24_ROOM_TYPES_NONE', "Denne ejendom har ingen værelsestyper, så den kan ikke knyttes til nogen sengetøjstyper i Beds24. Vil du importere værelsestyper fra Beds24?");
jr_define ('BEDS24_IMPORT_ROOMS', "Importer værelser");
jr_define ('BEDS24_EXPORT_BOOKINGS', "Eksporter bookinger");
jr_define ('BEDS24_IMPORT_BOOKINGS', "Importer bookinger");
jr_define ('BEDS24_IMPORT_EXPORT', "Du kan importere og eksportere eksisterende bookinger fra og til Beds24 med et klik på en knap. Bookinger importeret fra Beds24 importeres fra i går og inkluderer alle næste års bookinger. Du skal kun bruge disse knapper efter først importere eller eksportere ejendommen til systemet. Når opsætningen foretages, importeres og/eller eksporteres automatisk. ");
jr_define ('_BEDS24_CHANNEL_MANAGEMENT_UPDATE_PRICING_YESNO', "Opdater priser til Beds24?");
jr_define ('_BEDS24_CHANNEL_MANAGEMENT_UPDATE_PRICING_YESNO_DESC', "Du kan vælge at opdatere Beds24 med bare tilgængelighed eller både tilgængelighed og priser. Hvis du bruger bestemte situationer, hvor du vil bruge Beds24 -kontrolpanelet til at angive specifikke priser for bestemte kanaler, skal du lade dette sæt være til Ingen.");
jr_define ('_BEDS24_CONTROL_PANEL_DIRECT', "Direkte link");
jr_define ('BEDS24_IMPORT_NOTIFICATION_URLS', "Hvis du importerede denne ejendom til Jomres, skal du manuelt ændre meddelelsesadressen i dine Senge24 -> Ejendom -> Linkindstillinger til følgende:");
jr_define ('BEDS24V2_ERROR_KEYS_SHOULD_BE_REGENERATED', "Du har i øjeblikket ingen egenskaber forbundet med Beds24 -ejendomme. Du skal nulstille din managers API -nøgler, før dine ledere kan forsøge at oprette forbindelse til Beds24. Dette sikrer, at de alle har unikke nøgler.");
jr_define ('BEDS24V2_ERROR_KEYS_REBUILD', "Nulstil manager -API -nøgler nu");
jr_define ('BEDS24V2_ERROR_KEYS_DISMISS', "Ignorer advarsel");
jr_define ('BEDS24V2_ERROR_KEYS_DONE', "Manager API -nøgler er blevet nulstillet");

jr_define ('BEDS24V2_ADMINISTRATOR_LINKS_TITLE', "Beds24 ejendomsforbindelser");
jr_define ('BEDS24_ASSIGN_MANAGER', "Beds24 Change Manager");
jr_define ('BEDS24_ASSIGN_MANAGER_DESC', "Når en leder ser siden Kanalstyring (Bed24) i frontend, forbindes alle ejendomme, der deler en API -nøgle i både Jomres og Beds24, automatisk til Jomres. På samme måde er alle ejendomme importeret eller eksporteret af lederen. er knyttet. Du kan ændre den manager, en ejendom er knyttet til ved at ændre manager -rullemenuen på denne side og derefter klikke på Gem. ");
jr_define ('BEDS24V2_TARIFFS_TITLE', "Tarifeksport");
jr_define ('BEDS24V2_TARIFF_EXPORT_DESC', "Du kan eksportere de takster, du har oprettet til Beds24, til en bestemt dagspris. Hvis du vil bruge denne funktion, skal du indstille 'Opdater priser til Beds24?' i ejendomskonfiguration til Nej. kan også være nødvendigt at konfigurere din ejendom i Beds24 -kontrolpanelet, så du kan have flere dagspriser. For at gøre det skal du gå til Indstillinger> Egenskaber> Værelser> Daglige priser og konfigurere 'Antal daglige priser' til det antal priser, du ønsker . Når du har gjort det, vil du kunne klikke på en af ​​P -knapperne for at indstille den daglige hastighed. ");
jr_define ('BEDS24V2_TARIFF_EXPORT_TARIFFNAME', "Tarifnavn");
jr_define ('BEDS24V2_TARIFF_EXPORT_TARIFF_ROOM_TYPE', "Rumtype");
jr_define ('BEDS24V2_BOOKING_RESEND', "Send besked igen");
jr_define ('BEDS24V2_BOOKING_DATA_AT_B24', "Dette er reservationsoplysningerne, der er gemt på Beds24. Medmindre du er sikker på, at dataene er forkerte, skal du ikke skulle sende reservationen igen til Beds24.");
jr_define ('BEDS24V2_BOOKING_NO_DATA_AT_B24', "Denne booking ser ikke ud til at være knyttet til en reservation på Beds24. Du kan bruge knappen Send igen til at eksportere denne reservation til beds24.");

jr_define( 'BEDS24V2_GDPR_ANONYMISE_GUESTS', "Anonymise guests?" );
jr_define( 'BEDS24V2_GDPR_ANONYMISE_GUESTS_DESC', "When bookings are sent to the channel manager, we recommend that you anonymise the guest details. If you set this option to yes, when booking information is sent to the channel manager the guest name, email address are not. OTAs will have an accurate record of your availability without you needing to share more information than necessary. This means that you are compliant with the GDPR because if the guest should later choose to delete their details on this system (you are not notified when this happens), their details are not left with other data controllers over whom you have no control. If needed, you can still cross-reference bookings in this system with those on the channel manager, the Reservation Details page will show you the booking number for this booking as it is stored on the channel manager." );
jr_define( 'BEDS24V2_MASTER_APIKEY', "EXPERIMENTAL FEATURE - Master Beds24 API key" );
jr_define( 'BEDS24V2_MASTER_APIKEY_DESC', "IF YOU ALREADY HAVE AN INSTALLATION OF JOMRES WITH PROPERTIES LINKED TO BEDS24 READ THE ENTIRE DESCRIPTION HERE. By default Jomres is designed to be a multi-vendor booking platform. Managers who have their own beds24 accounts can import their properties to and from beds24 securely. This setting allows you to override that functionality by having a single api key for all properties. This means that you only need one account with Beds24 however it also means that all charges will be accrued by that one account. Any manager with access to a property will be able to send updates to the property on the beds24 servers. Leave blank to ignore this setting and force property managers to use their own Beds24 accounts. The API key can take any form you want, so long as the key here matches the one in the <a href='https://www.beds24.com/control2.php?pagetype=accountpassword' target='_blank'><em>API Key 1</em> </a> field.  IF YOU ALREADY HAVE AN INSTALLATION OF JOMRES WITH PROPERTIES LINKED TO BEDS24 : You can switch to using this feature, however it would require that you first truncate (empty) these tables, delete the existing properties that are already in Jomres, and that you then re-import the properties from Beds24 into Jomres. XXXXX_jomres_beds24_contract_booking_number_xref ,  XXXXX_jomres_beds24_property_uid_xref  , XXXXX_jomres_beds24_rest_api_key_xref  , XXXXX_jomres_beds24_room_type_xref. <br/> <br/> When setting your API key in the <em>API Key N</em> section of Beds24's Account Access page it's vital that you set the <em>API Key Access</em> field to 'Allow whitelist IP only' and you set the IP number to <strong>".$this_servers_ip_number ."</strong> This applies equally for the master API key configuration here, and in the frontend if a property manager is configuring their own individual API keys." );
jr_define( 'BEDS24V2_WHITELIST_WARNING', "If your properties have already been connected to Beds24, be aware that Beds24 have recently introduced a policy where all servers connecting to your account have to have been whitelisted. You can do this on the Account Access  page, where your Access key has been entered. Select the Whitelist IP dropdown and set the IP number to " );
