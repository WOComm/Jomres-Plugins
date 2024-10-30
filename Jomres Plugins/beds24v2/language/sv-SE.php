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
jr_define ('BEDS24V2_WEBHOOKS_AUTH_METHOD_NOTES', 'Om du har ett Beds24 -konto och vill uppdatera Beds24 när du har en bokning, välj det här alternativet. Ange webbadressen till https://www.beds24.com/api/json/');
jr_define ('BEDS24V2_ERROR_USER_NO_KEY', 'Den här användaren har inga API -nycklar inställda, så kan inte fortsätta. Besök deras sida på sidan Användarhantering> Fastighetshanterare och skapa en ny API -nyckel för dem med länken på den sidan.');
jr_define ('BEDS24V2_ERROR_USER_NO_PROPERTIES', 'Den här användaren har inga Jomres-egenskaper som de kan tilldela Beds24-egenskaper eller vice versa');
jr_define ('BEDS24V2_NOT_SUBSCRIBED', "Chefen du är inloggad på verkar inte ha ett konto hos Beds24, så du måste först registrera dig för deras tjänst och sedan spara denna API -nyckel på <a href = 'https://www.beds24.com/control2.php?pagetype=accountpassword' target='_blank'> Beds24: s webbplats här. </a> ");
jr_define ('BEDS24V2_NOT_SUBSCRIBED_KEY', "Kopiera och klistra in denna API -nyckel i LINK -fältet i ditt Beds24 -konto för att fortsätta.");
jr_define ('BEDS24V2_NOT_SUBSCRIBED_RELOAD', "När du har gjort det, klicka på knappen nedan för att fortsätta.");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_TITLE', "Beds24 property linking");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_INFO', "På den här sidan kan du se de egenskaper som du har åtkomst till i detta system, plus de som finns i Channel Manager. Det låter dig också importera egenskaper från Channel Manager till detta system, eller exportera befintliga fastigheter till Channel Manager. <br/> Om du har egenskaper både i detta system och Beds24 och du vill länka dem till varandra kan du använda egenskapen apikey för att göra det. Besök Beds24> Inställningar> Egenskaper (se till att egenskapen som är markerad i rullgardinsmenyn är densamma som den du vill länka) och sedan i länken undermenyn sparar du 'Egenskaps apikey' i fältet 'propKey' i Beds24. När du har gjort det, ladda om sidan. Detta system kommer att se att de två egenskaperna är associerade med samma nyckel och skapa de associationer som behövs. När de två egenskaperna är länkade, kom ihåg att besöka sidan Visa egendom, hitta aviseringsadressen och klistra in den i länksidan Meddela webbadress. Det kommer se till att Beds24 använder rätt länk för att synkronisera bokningar med egenskapen när den tar emot bokningar. ");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_NO_PROPERTIES', "Fel: Det finns inga fastigheter som du kan länka till i Beds24. Det kan bero på att alla fastigheter du har rättigheter till redan har länkats till ett annat konto på detta system.");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_PROPERTY_UID', "Egenskaps uid");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_PROPERTY_NAME', "Egenskapsnamn");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_BEDS24_PROPERTY_UID', "Beds24 Property Uid");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_BEDS24_PROPERTY_NAME', "Beds24 fastighetsnamn");
jr_define ('BEDS24V2_DISPLAY_PROPERTY_APIKEY', "Property apikey");
jr_define ('BEDS24_LISTPROPERTIES_IMPORT', "Importera");
jr_define ('BEDS24_LISTPROPERTIES_ASSOCIATE_ROOM_TYPES', "Konfigurera rumstyper");
jr_define ('BEDS24_LISTPROPERTIES_ASSOCIATE_ROOM_TYPES_DESC', "Här måste du länka rumstyper i ditt Beds24 -konto till de som är lagrade i detta system.");
jr_define ('_BEDS24_DISPLAY_BOOKINGS_JOMRESROOMS_BEDS24TYPENAME', "Rumstyp sängar24");

jr_define ('BEDS24_LISTPROPERTIES_IMPORT_CANNOT_NOAPIKEY', "Kan inte importera den här egenskapen ännu eftersom du inte har ställt in egendomsnyckeln på egenskapslänksidan.");
jr_define ('BEDS24_LISTPROPERTIES_IMPORT_CANNOT_NOROOMS', "Kan inte importera den här egenskapen ännu eftersom den inte har några rum. Skapa ett eller flera rum (rum i Beds24 är samma som rumstyper i Jomres) och glöm inte att ange minimipriset . När du har gjort det kan du importera rumstypen till Jomres och associera dem med nuvarande Jomres -rumstyper. Efter det kommer du att kunna ändra avgifterna, men ett minimipris måste anges. ");
jr_define ('_BEDS24_SUGGESTED_KEY', "Vi föreslår att du använder den här API -nyckeln. När du har gjort det, ladda om den här sidan.");
jr_define ('BEDS24_LISTPROPERTIES_EXPORT', "Export");
jr_define ('BEDS24V2_REST_API_INTRO', "Här kan du se ditt REST API -nyckelpar och sökvägen till API: et. Om du sparar dessa detaljer i ditt konto på Beds24 kommer Beds24 24 att kunna kontakta den här webbplatsen via dess API.");
jr_define ('BEDS24V2_REST_API_CLIENT_ID', "Client ID");
jr_define ('BEDS24V2_REST_API_CLIENT_SECRET', "Klienthemlighet");
jr_define ('BEDS24V2_REST_API_ENDPOINT', "URI (slutpunkt)");
jr_define ('BEDS24_LISTPROPERTIES_CONFIGURE', "Visa egendom");
jr_define ('BEDS24_ROOM_TYPES_TITLE', "Rumstypsföreningar");

jr_define ('BEDS24_ROOM_TYPES_INFO', "Denna sida låter dig associera dina rumstyper med de som är lagrade på Beds24 -servrarna.");
jr_define ('BEDS24_ROOM_TYPES_INFO2', "Innan rumstyperna är länkade kan du inte få bokningsinformation skickad av Beds24. Om din fastighet har importerats/exporterats till eller från Beds24 har vi automatiskt skapat länkar åt dig, men om du lägger till en ny rumstyp, eller ta bort en, kan den här sidan användas för att säkerställa att rumstypen är korrekt associerad. ");
jr_define ('BEDS24_ROOM_TYPES_INFO3', "Välj de typer av sängar24 som du vill koppla till rumstyperna i detta system och klicka på Spara för att uppdatera ändringarna till sängar24.");
jr_define ('BEDS24_ROOM_TYPES_YOURS', "Dina rumstyper");
jr_define ('BEDS24_ROOM_TYPES_BEDS24', "Sängar24 rumstyper");
jr_define ('BEDS24_ROOM_TYPES_NONE', "Den här egenskapen har inga rumstyper, så den kan inte länkas till några typer av Beds24. Vill du importera rumstyper från Beds24?");
jr_define ('BEDS24_IMPORT_ROOMS', "Importera rum");
jr_define ('BEDS24_EXPORT_BOOKINGS', "Exportera bokningar");
jr_define ('BEDS24_IMPORT_BOOKINGS', "Importera bokningar");
jr_define ('BEDS24_IMPORT_EXPORT', "Du kan importera och exportera befintliga bokningar från och till Beds24 med ett klick på en knapp. Bokningar som importeras från Beds24 importeras från igår och inkluderar alla nästa års bokningar. Du bör bara använda dessa knappar efter först importerar eller exporterar egendomen till systemet. När installationen är klar kommer import och/eller export att ske automatiskt. ");
jr_define ('_BEDS24_CHANNEL_MANAGEMENT_UPDATE_PRICING_YESNO', "Uppdatera priser till Beds24?");
jr_define ('_BEDS24_CHANNEL_MANAGEMENT_UPDATE_PRICING_YESNO_DESC', "Du kan välja att uppdatera Beds24 med bara tillgänglighet eller både tillgänglighet och priser. Om du använder specifika situationer där du vill använda Beds24 -kontrollpanelen för att ställa in specifika priser för specifika kanaler bör du lämna den här inställningen till Nej.");
jr_define ('_BEDS24_CONTROL_PANEL_DIRECT', "Direktlänk");
jr_define ('BEDS24_IMPORT_NOTIFICATION_URLS', "Om du importerade den här egenskapen till Jomres måste du manuellt ändra aviseringsadressen i dina sängar24 -> egendom -> länkinställningar till följande:");
jr_define ('BEDS24V2_ERROR_KEYS_SHOULD_BE_REGENERATED', "Du har för närvarande inga egenskaper kopplade till Beds24 -egenskaper. Du måste återställa din chefs API -nycklar innan dina chefer kan försöka ansluta till Beds24. Detta säkerställer att alla har unika nycklar.");
jr_define ('BEDS24V2_ERROR_KEYS_REBUILD', "Återställ API -nycklar för chef nu");
jr_define ('BEDS24V2_ERROR_KEYS_DISMISS', "Ignorera varning");
jr_define ('BEDS24V2_ERROR_KEYS_DONE', "Manager API -nycklar har återställts");

jr_define ('BEDS24V2_ADMINISTRATOR_LINKS_TITLE', "Beds24 fastighetslänkar");
jr_define ('BEDS24_ASSIGN_MANAGER', "Beds24 Change Manager");
jr_define ('BEDS24_ASSIGN_MANAGER_DESC', "När en chef ser sidan Kanalhantering (Bed24) i frontend, länkas alla egenskaper som delar en API -nyckel i både Jomres och Beds24 automatiskt in i Jomres. Likaså importeras eller exporteras egenskaper från chefen är länkade. Du kan ändra chefen som en egenskap är länkad till genom att ändra chefsmenyn på den här sidan och klicka på Spara. ");
jr_define ('BEDS24V2_TARIFFS_TITLE', "Tariffexport");
jr_define ('BEDS24V2_TARIFF_EXPORT_DESC', "Du kan exportera de tariffer du har skapat till Beds24 till en specifik dagskurs. Om du ska använda den här funktionen bör du ställa in alternativet Uppdatera priser till Beds24? i egenskapskonfiguration till Nej. kan också behöva konfigurera din egendom i kontrollpanelen Beds24 så att du kan ha flera dagspriser. För att göra det går du till Inställningar> Egenskaper> Rum> Dagspriser och konfigurerar Antal dagspriser till det antal priser du vill ha . När du har gjort det kommer du att kunna klicka på en av P -knapparna för att ställa in den dagliga hastigheten. ");
jr_define ('BEDS24V2_TARIFF_EXPORT_TARIFFNAME', "Tariff name");
jr_define ('BEDS24V2_TARIFF_EXPORT_TARIFF_ROOM_TYPE', "Rumstyp");
jr_define ('BEDS24V2_BOOKING_RESEND', "Skicka meddelande igen");
jr_define ('BEDS24V2_BOOKING_DATA_AT_B24', "Detta är bokningsinformationen som lagras på Beds24. Om du inte är säker på att uppgifterna är felaktiga borde du inte behöva skicka bokningen igen till Beds24.");
jr_define ('BEDS24V2_BOOKING_NO_DATA_AT_B24', "Den här bokningen verkar inte vara kopplad till en bokning på Beds24. Du kan använda knappen Skicka om för att exportera den här bokningen till beds24.");

jr_define ('BEDS24V2_GDPR_ANONYMISE_GUESTS', "Anonymisera gäster?");
jr_define ('BEDS24V2_GDPR_ANONYMISE_GUESTS_DESC', "När bokningar skickas till kanalhanteraren rekommenderar vi att du anonymiserar gästinformationen. Om du ställer in det här alternativet till ja, när bokningsinformation skickas till kanalhanteraren är gästnamnet, e -postadressen inte . OTA: er kommer att ha en noggrann registrering av din tillgänglighet utan att du behöver dela mer information än nödvändigt. Detta innebär att du följer GDPR för att om gästen senare skulle välja att radera sina uppgifter på detta system (du meddelas inte när detta händer), deras uppgifter lämnas inte kvar hos andra datakontrollanter som du inte har kontroll över. Om det behövs kan du fortfarande korsreferera bokningar i detta system med dem på kanalhanteraren, sidan Reservationsinformation visar dig bokningsnumret för denna bokning eftersom den lagras i kanalhanteraren. ");
jr_define ('BEDS24V2_MASTER_APIKEY', "EXPERIMENTAL FEATURE - Master Beds24 API key");
jr_define ('BEDS24V2_MASTER_APIKEY_DESC', "OM DU ALLTID HAR EN INSTALLATION AV JOMRES MED EGENSKAPER LÄNKADE TILL BEDS24 LÄS HELA BESKRIVNINGEN HÄR. Som standard är Jomres utformad för att vara en multi-leverantörs bokningsplattform. Chefer som kan ha sina egna sängar som kan ha egna sängar egenskaper till och från sängar24 säkert. Med den här inställningen kan du åsidosätta den funktionaliteten genom att ha en enda api -nyckel för alla fastigheter. Det betyder att du bara behöver ett konto hos Beds24 men det betyder också att alla avgifter kommer att samlas på det enda kontot. Varje chef med tillgång till en fastighet kommer att kunna skicka uppdateringar till fastigheten på beds24 -servrarna. Lämna det tomt för att ignorera den här inställningen och tvinga fastighetsförvaltare att använda sina egna Beds24 -konton. API -nyckeln kan ha vilken form du vill, så länge eftersom nyckeln här matchar den i <a href='https://www.beds24.com/control2.php?pagetype=accountpassword' target='_blank'> <em> API Key 1 </em> </ a> fält. OM DU ALLTID HAR EN INSTALLATI PÅ JOMRES MED EGENSKAPER LÄNKADE TILL BEDS24: Du kan byta till att använda den här funktionen, men det skulle kräva att du först trunkerar (tömmer) dessa tabeller, raderar befintliga egenskaper som redan finns i Jomres och att du sedan importerar egenskaperna igen från sängar24 till Jomres. XXXXX_jomres_beds24_contract_booking_number_xref, XXXXX_jomres_beds24_property_uid_xref, XXXXX_jomres_beds24_rest_api_key_xref, XXXXX_jomres_beds24_room_type_xref. <br/> <br/> När du ställer in din API -nyckel i avsnittet <em> API -nyckel N </em> på Beds24s kontoåtkomstsida är det viktigt att du anger fältet <em> API -nyckeltillgång </em> till ' Tillåt endast vitlista IP 'och du ställer in IP -numret till <strong> ". $this_servers_ip_number." </strong> Detta gäller lika för huvud -API -nyckelkonfigurationen här och i frontend om en fastighetsförvaltare konfigurerar sitt eget individuella API nycklar. ");
jr_define ('BEDS24V2_WHITELIST_WARNING', "Om dina fastigheter redan har anslutits till Beds24, var medveten om att Beds24 nyligen har infört en policy där alla servrar som ansluter till ditt konto måste ha vitlistats. Du kan göra detta på sidan Kontotillgång, där din Access -nyckel har angetts. Välj rullgardinsmenyn Vitlista IP och ställ in IP -numret till ");