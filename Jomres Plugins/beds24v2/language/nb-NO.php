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
jr_define ('BEDS24V2_WEBHOOKS_AUTH_METHOD_NOTES', 'If you have a Beds24 account and want to update Beds24 when you have booking, select this option. Set the URL to https://www.beds24.com/api/json/');
jr_define ('BEDS24V2_ERROR_USER_NO_KEY', 'Denne brukeren har ingen API -nøkler angitt, så kan ikke fortsette. Besøk siden på siden Brukeradministrasjon> Eiendomsadministratorer og opprett en ny API -nøkkel for dem ved hjelp av lenken på siden.');
jr_define ('BEDS24V2_ERROR_USER_NO_PROPERTIES', 'Denne brukeren har ingen Jomres-egenskaper som de kan tilordne til Beds24-eiendommer, eller omvendt');
jr_define ('BEDS24V2_NOT_SUBSCRIBED', "Lederen du er logget på som ikke ser ut til å ha en konto hos Beds24, så du må først registrere deg for tjenesten og deretter lagre denne API -nøkkelen på <a href = 'https://www.beds24.com/control2.php?pagetype=accountpassword' target='_blank'> Beds24s nettsted her. </a> ");
jr_define ('BEDS24V2_NOT_SUBSCRIBED_KEY', "Kopier og lim inn denne API -nøkkelen i LINK -feltet i Beds24 -kontoen din for å fortsette.");
jr_define ('BEDS24V2_NOT_SUBSCRIBED_RELOAD', "Når du har gjort det, klikk på knappen nedenfor for å fortsette.");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_TITLE', "Beds24 property linking");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_INFO', "Denne siden lar deg se egenskapene du har tilgang til i dette systemet, pluss de som finnes i Channel Manager. Den lar deg også importere eiendommer fra Channel Manager til dette systemet, eller eksportere eksisterende eiendommer til Channel Manager. <br/> Hvis du har egenskaper både i dette systemet og Beds24 og du vil koble dem til hverandre, kan du bruke Property apikey til å gjøre det. Gå til Beds24> Innstillinger> Egenskaper (sørg for at egenskapen som er valgt i rullegardinmenyen, er den samme som du vil koble til), og deretter lagrer du \"Egenskaps apikey\" i \"propKey\" -feltet i Beds24 i undermenyen Link. Når du har gjort det, laster du inn siden på nytt. Dette systemet vil se at de to egenskapene er knyttet til den samme nøkkelen og opprett de nødvendige assosiasjonene. Når de to egenskapene er koblet sammen, må du huske å gå til siden Vis eiendom, finne varslingsadressen og lime den inn i feltet \"Varsel url\" i lenkesiden. Det vil sørg for at Beds24 bruker den riktige lenken for å synkronisere bestillinger med den egenskapen når den mottar bestillinger. ");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_NO_PROPERTIES', "Feil: Det er ingen eiendommer du kan koble til i Beds24. Dette kan skyldes at alle eiendommer du har rettigheter til allerede har blitt koblet til en annen konto på dette systemet.");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_PROPERTY_UID', "Property uid");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_PROPERTY_NAME', "Eiendomsnavn");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_BEDS24_PROPERTY_UID', "Beds24 Property Uid");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_BEDS24_PROPERTY_NAME', "Beds24 eiendomsnavn");
jr_define ('BEDS24V2_DISPLAY_PROPERTY_APIKEY', "Property apikey");
jr_define ('BEDS24_LISTPROPERTIES_IMPORT', "Import");
jr_define ('BEDS24_LISTPROPERTIES_ASSOCIATE_ROOM_TYPES', "Konfigurer romtyper");
jr_define ('BEDS24_LISTPROPERTIES_ASSOCIATE_ROOM_TYPES_DESC', "Her må du koble romtyper i Beds24 -kontoen din til de som er lagret i dette systemet.");
jr_define ('_BEDS24_DISPLAY_BOOKINGS_JOMRESROOMS_BEDS24TYPENAME', "Beds24 room type");

jr_define ('BEDS24_LISTPROPERTIES_IMPORT_CANNOT_NOAPIKEY', "Kan ikke importere denne eiendommen ennå ettersom du ikke har angitt eiendomsnøkkelen på siden Egenskapslink.");
jr_define ('BEDS24_LISTPROPERTIES_IMPORT_CANNOT_NOROOMS', "Kan ikke importere denne eiendommen enda, siden den ikke har rom. Opprett ett eller flere rom (rom i Beds24 er de samme som romtypene i Jomres) og ikke glem å angi minsteprisen . Når du har gjort det, kan du importere romtypen til Jomres og knytte dem til gjeldende Jomres -romtyper. Etter det vil du kunne endre takstene, men en minimumspris må angis. ");
jr_define ('_BEDS24_SUGGESTED_KEY', "Vi foreslår at du bruker denne API -nøkkelen. Når du har gjort det, må du laste inn denne siden på nytt.");
jr_define ('BEDS24_LISTPROPERTIES_EXPORT', "Eksporter");
jr_define ('BEDS24V2_REST_API_INTRO', "Her kan du se REST API -nøkkelparet og banen til API -en. Hvis du lagrer disse detaljene i kontoen din på Beds24, vil Beds24 24 kunne kontakte dette nettstedet via sitt API.");
jr_define ('BEDS24V2_REST_API_CLIENT_ID', "Klient -ID");
jr_define ('BEDS24V2_REST_API_CLIENT_SECRET', "Klienthemmelighet");
jr_define ('BEDS24V2_REST_API_ENDPOINT', "URI (endepunkt)");
jr_define ('BEDS24_LISTPROPERTIES_CONFIGURE', "View property");
jr_define ('BEDS24_ROOM_TYPES_TITLE', "Romtypeforeninger");

jr_define ('BEDS24_ROOM_TYPES_INFO', "Denne siden lar deg knytte romtypene dine til de som er lagret på Beds24 -serverne.");
jr_define ('BEDS24_ROOM_TYPES_INFO2', "Inntil romtyper er knyttet sammen, kan du ikke motta bestillingsinformasjon sendt av Beds24. Hvis eiendommen din er importert/eksportert til eller fra Beds24, har vi automatisk opprettet lenker for deg, men hvis du legger til en ny romtype, eller slett en, så kan denne siden brukes til å sikre at romtypen er riktig assosiert. ");
jr_define ('BEDS24_ROOM_TYPES_INFO3', "Velg Beds24 -romtypene du vil knytte til romtypene i dette systemet, og klikk på Lagre for å oppdatere endringene til Beds24.");
jr_define ('BEDS24_ROOM_TYPES_YOURS', "Dine romtyper");
jr_define ('BEDS24_ROOM_TYPES_BEDS24', "senger24 romtyper");
jr_define ('BEDS24_ROOM_TYPES_NONE', "Denne egenskapen har ingen romtyper, så den kan ikke kobles til noen typer rom24. Vil du importere romtyper fra Beds24?");
jr_define ('BEDS24_IMPORT_ROOMS', "Importer rom");
jr_define ('BEDS24_EXPORT_BOOKINGS', "Eksporter bestillinger");
jr_define ('BEDS24_IMPORT_BOOKINGS', "Importer bestillinger");
jr_define ('BEDS24_IMPORT_EXPORT', "Du kan importere og eksportere eksisterende bestillinger fra og til Beds24 med et klikk på en knapp. Bestillinger importert fra Beds24 importeres fra i går og inkluderer alle neste års bestillinger. Du bør bare bruke disse knappene etter først importere eller eksportere eiendommen til systemet. Når installasjonen er fullført, vil import og/eller eksport bli utført automatisk. ");
jr_define ('_BEDS24_CHANNEL_MANAGEMENT_UPDATE_PRICING_YESNO', "Oppdater priser til Beds24?");
jr_define ('_BEDS24_CHANNEL_MANAGEMENT_UPDATE_PRICING_YESNO_DESC', "Du kan velge å oppdatere Beds24 med bare tilgjengelighet eller både tilgjengelighet og priser. Hvis du bruker spesifikke situasjoner der du vil bruke Beds24 -kontrollpanelet for å angi spesifikke priser for bestemte kanaler, bør du la dette settet stå til Nei.");
jr_define ('_BEDS24_CONTROL_PANEL_DIRECT', "Direkte lenke");
jr_define ('BEDS24_IMPORT_NOTIFICATION_URLS', "Hvis du importerte denne egenskapen til Jomres, må du manuelt endre varslingsadressen i senger24 -> eiendom -> koblingsinnstillinger til følgende:");
jr_define ('BEDS24V2_ERROR_KEYS_SHOULD_BE_REGENERATED', "Du har for øyeblikket ingen eiendommer knyttet til Beds24 -eiendommer. Du må tilbakestille lederens API -nøkler før lederne dine kan prøve å koble til Beds24. Dette sikrer at de alle har unike nøkler.");
jr_define ('BEDS24V2_ERROR_KEYS_REBUILD', "Tilbakestill administrator -API -nøkler nå");
jr_define ('BEDS24V2_ERROR_KEYS_DISMISS', "Ignorer advarsel");
jr_define ('BEDS24V2_ERROR_KEYS_DONE', "Manager API -nøkler er tilbakestilt");

jr_define ('BEDS24V2_ADMINISTRATOR_LINKS_TITLE', "Beds24 eiendomslinker");
jr_define ('BEDS24_ASSIGN_MANAGER', "Beds24 Change Manager");
jr_define ('BEDS24_ASSIGN_MANAGER_DESC', "Når en leder ser siden Channel Management (Bed24) i frontend, blir alle eiendommer som deler en API -nøkkel i både Jomres og Beds24 automatisk knyttet til Jomres. På samme måte blir alle eiendommer importert eller eksportert av lederen. er koblet til. Du kan endre lederen en eiendom er knyttet til ved å endre lederrullegardinmenyen på denne siden og deretter klikke Lagre. ");
jr_define ('BEDS24V2_TARIFFS_TITLE', "Tariffeksport");
jr_define ('BEDS24V2_TARIFF_EXPORT_DESC', "Du kan eksportere tariffene du har opprettet til Beds24 til en bestemt daglig rate. Hvis du skal bruke denne funksjonen, bør du angi alternativet \"Oppdater priser til Beds24?\" i Eiendomskonfigurasjon til Nei. kan også være nødvendig å konfigurere eiendommen din i Beds24 -kontrollpanelet slik at du kan ha flere dagspriser. For å gjøre det, gå til Innstillinger> Egenskaper> Rom> Daglige priser og konfigurer \"Antall daglige priser\" til antall priser du vil ha . Når du har gjort det, vil du kunne klikke på en av P -knappene for å angi den daglige prisen. ");
jr_define ('BEDS24V2_TARIFF_EXPORT_TARIFFNAME', "Tariff name");
jr_define ('BEDS24V2_TARIFF_EXPORT_TARIFF_ROOM_TYPE', "Romtype");
jr_define ('BEDS24V2_BOOKING_RESEND', "Send melding på nytt");
jr_define ('BEDS24V2_BOOKING_DATA_AT_B24', "Dette er bestillingsinformasjonen lagret på Beds24. Med mindre du er sikker på at dataene er feil, trenger du ikke å sende reservasjonen på nytt til Beds24.");
jr_define ('BEDS24V2_BOOKING_NO_DATA_AT_B24', "Denne bestillingen ser ikke ut til å være knyttet til en bestilling på Beds24. Du kan bruke knappen Send på nytt for å eksportere denne bestillingen til beds24.");

jr_define ('BEDS24V2_GDPR_ANONYMISE_GUESTS', "Anonymize guests?");
jr_define ('BEDS24V2_GDPR_ANONYMISE_GUESTS_DESC', "Når bestillinger sendes til kanalsjefen, anbefaler vi at du anonymiserer gjesteopplysningene. Hvis du angir dette alternativet til ja, når bestillingsinformasjon sendes til kanalsjefen, blir navnet på e -postadressen ikke . OTA -er vil ha en nøyaktig oversikt over tilgjengeligheten din uten at du trenger å dele mer informasjon enn nødvendig. Dette betyr at du er i samsvar med GDPR fordi hvis gjesten senere skulle velge å slette sine detaljer på dette systemet (du blir ikke varslet når dette skjer), blir deres detaljer ikke etterlatt hos andre dataansvarlige som du ikke har kontroll over. Om nødvendig kan du fremdeles kryssreferere bestillinger i dette systemet med de på kanalbehandling, siden Reservasjonsdetaljer viser deg bestillingsnummeret for denne bestillingen som den er lagret i kanalsjefen. ");
jr_define ('BEDS24V2_MASTER_APIKEY', "EXPERIMENTAL FEATURE - Master Beds24 API key");
jr_define ('BEDS24V2_MASTER_APIKEY_DESC', "HVIS DU ALLEREDE HAR EN INSTALLASJON AV JOMRES MED EIENDOMMER KOBLET TIL BEDS24 LES HELE BESKRIVELSEN HER. Som standard er Jomres designet for å være en multi-leverandør bestillingsplattform. Managers som kan ha sine egne senger. eiendommer til og fra senger24 sikkert. Denne innstillingen lar deg overstyre denne funksjonaliteten ved å ha en enkelt api -nøkkel for alle eiendommer. Dette betyr at du bare trenger én konto hos Beds24, men det betyr også at alle kostnader vil påløpe den ene kontoen. Enhver leder med tilgang til en eiendom vil kunne sende oppdateringer til eiendommen på beds24 -serverne. La stå tomt for å ignorere denne innstillingen og tvinge eiendomsforvaltere til å bruke sine egne Beds24 -kontoer. API -nøkkelen kan ha hvilken som helst form du ønsker, så lenge ettersom nøkkelen her samsvarer med nøkkelen i <a href='https://www.beds24.com/control2.php?pagetype=accountpassword' target='_blank'> <em> API -nøkkel 1 </em> </ a> felt. HVIS DU ALLEREDE HAR EN INSTALLATI PÅ JOMRER MED EIENDOMMER SOM ER KOBLET TIL BEDS24: Du kan bytte til å bruke denne funksjonen, men det vil kreve at du først avkorter (tømmer) disse tabellene, sletter de eksisterende egenskapene som allerede er i Jomres, og at du deretter importerer eiendommene på nytt. fra Beds24 til Jomres. XXXXX_jomres_beds24_contract_booking_number_xref, XXXXX_jomres_beds24_property_uid_xref, XXXXX_jomres_beds24_rest_api_key_xref, XXXXX_jomres_beds24_room_type_xref. <br/> <br/> Når du angir API -nøkkelen i delen <em> API -nøkkel N </em> på Beds24s kontotilgangsside, er det avgjørende at du setter feltet <em> API -nøkkeladgang </em> til ' Tillat bare hviteliste -IP ', og du angir IP -nummeret til <strong> ". $this_servers_ip_number." </strong> Dette gjelder like for hoved -API -nøkkelkonfigurasjonen her, og i frontend hvis en eiendomsforvalter konfigurerer sitt eget individuelle API nøkler. ");
jr_define ('BEDS24V2_WHITELIST_WARNING', "Hvis eiendommene dine allerede har blitt koblet til Beds24, vær oppmerksom på at Beds24 nylig har innført en policy der alle servere som kobler seg til kontoen din må ha blitt godkjent. Du kan gjøre dette på siden Kontotilgang, der tilgangsnøkkelen din er angitt. Velg rullegardinmenyen Hviteliste og angi IP -nummeret til ");