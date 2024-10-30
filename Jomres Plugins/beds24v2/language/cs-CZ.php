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
jr_define ('BEDS24V2_WEBHOOKS_AUTH_METHOD_NOTES', 'Pokud máte účet Beds24 a chcete aktualizovat Beds24, když máte rezervaci, vyberte prosím tuto možnost. Nastavte URL na https://www.beds24.com/api/json/');
jr_define ('BEDS24V2_ERROR_USER_NO_KEY', 'Tento uživatel nemá nastaveny žádné klíče API, takže nemůže pokračovat. Navštivte jejich stránku na stránce Správa uživatelů> Správci vlastností a vytvořte jim nový klíč API pomocí odkazu uvedeného na této stránce.');
jr_define ('BEDS24V2_ERROR_USER_NO_PROPERTIES', 'Tento uživatel nemá žádné vlastnosti Jomres, které by mohl přiřadit vlastnostem Beds24, nebo naopak');
jr_define ('BEDS24V2_NOT_SUBSCRIBED', "Zdá se, že správce, ke kterému jste přihlášeni, nemá účet u Beds24, takže se budete muset nejprve zaregistrovat pro jeho službu a poté uložit tento klíč API na <a href = 'https://www.beds24.com/control2.php?pagetype=accountpassword' target='_blank'> web Beds24 zde. </a> ");
jr_define ('BEDS24V2_NOT_SUBSCRIBED_KEY', "Chcete -li pokračovat, zkopírujte a vložte tento klíč API do pole LINK ve svém účtu Beds24.");
jr_define ('BEDS24V2_NOT_SUBSCRIBED_RELOAD', "Až to uděláte, pokračujte prosím kliknutím na tlačítko níže.");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_TITLE', "propojení vlastností Beds24");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_INFO', "Tato stránka vám umožňuje zobrazit vlastnosti, ke kterým máte v tomto systému přístup, plus ty, které existují ve Správci kanálů. Také vám umožňuje importovat vlastnosti ze Správce kanálů do tohoto systému nebo exportovat stávající vlastnosti do Správce kanálů. <br/> Pokud máte vlastnosti jak v tomto systému, tak v Beds24, a chcete je navzájem propojit, můžete k tomu použít vlastnost. Navštivte Beds24> Nastavení> Vlastnosti (zajistěte, aby vlastnost vybraná v rozevíracím seznamu je stejná jako ta, kterou chcete propojit), pak v podnabídce Odkaz uložte \"Vlastnost apikey\" do pole \"propKey\" v Beds24. Až to uděláte, znovu načtěte stránku. Tento systém bude podívejte se, že tyto dvě vlastnosti jsou spojeny se stejným klíčem, a vytvořte potřebná přidružení. Jakmile budou obě vlastnosti propojeny, nezapomeňte navštívit stránku Zobrazit vlastnost, najít adresu URL oznámení a vložit ji do pole Odkaz na stránku \"Oznámit adresu URL\". To bude zajistěte, aby Beds24 používal správný odkaz k synchronizaci rezervací s touto vlastností, když přijímá rezervace. ");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_NO_PROPERTIES', "Chyba: V Beds24 neexistují žádné vlastnosti, na které byste mohli odkazovat. Důvodem může být to, že všechny vlastnosti, na které máte práva, již byly propojeny s jiným účtem v tomto systému.");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_PROPERTY_UID', "Vlastnost uid");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_PROPERTY_NAME', "název nemovitosti");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_BEDS24_PROPERTY_UID', "Beds24 Property Uid");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_BEDS24_PROPERTY_NAME', "Beds24 Property name");
jr_define ('BEDS24V2_DISPLAY_PROPERTY_APIKEY', "Property apikey");
jr_define ('BEDS24_LISTPROPERTIES_IMPORT', "Import");
jr_define ('BEDS24_LISTPROPERTIES_ASSOCIATE_ROOM_TYPES', "Konfigurace typů místností");
jr_define ('BEDS24_LISTPROPERTIES_ASSOCIATE_ROOM_TYPES_DESC', "Zde musíte propojit typy pokojů ve vašem účtu Beds24 s těmi, které jsou uloženy v tomto systému.");
jr_define ('_BEDS24_DISPLAY_BOOKINGS_JOMRESROOMS_BEDS24TYPENAME', "typ pokoje Beds24");

jr_define ('BEDS24_LISTPROPERTIES_IMPORT_CANNOT_NOAPIKEY', "Tuto vlastnost zatím nelze importovat, protože jste na stránce Odkaz na vlastnost nenastavili klíč vlastnosti.");
jr_define ('BEDS24_LISTPROPERTIES_IMPORT_CANNOT_NOROOMS', "Tuto vlastnost nelze importovat, protože nemá žádné pokoje. Vytvořte jednu nebo více pokojů (pokoje v Beds24 jsou stejné jako typy pokojů v Jomres) a nezapomeňte nastavit minimální cenu . Až to uděláte, můžete importovat typ místnosti do Jomres a spojit je s aktuálními typy pokojů Jomres. Poté budete moci upravit tarify, ale bude třeba nastavit minimální cenu. ");
jr_define ('_BEDS24_SUGGESTED_KEY', "Doporučujeme použít tento klíč API. Až to uděláte, znovu načtěte tuto stránku.");
jr_define ('BEDS24_LISTPROPERTIES_EXPORT', "Export");
jr_define ('BEDS24V2_REST_API_INTRO', "Zde můžete vidět svůj pár klíčů REST API a cestu k API. Pokud tyto podrobnosti uložíte do svého účtu na Beds24, Beds24 24 bude moci kontaktovat tento web prostřednictvím jeho API.");
jr_define ('BEDS24V2_REST_API_CLIENT_ID', "ID klienta");
jr_define ('BEDS24V2_REST_API_CLIENT_SECRET', "Client Secret");
jr_define ('BEDS24V2_REST_API_ENDPOINT', "URI (koncový bod)");
jr_define ('BEDS24_LISTPROPERTIES_CONFIGURE', "Zobrazit vlastnost");
jr_define ('BEDS24_ROOM_TYPES_TITLE', "Přidružení typu místnosti");

jr_define('BEDS24_ROOM_TYPES_INFO', "This page allows you to associate your room types with those stored in the Beds24 servers.");
jr_define('BEDS24_ROOM_TYPES_INFO2', "Until room types are linked, you can't received booking information sent by Beds24. If your property has been imported/exported to or from Beds24 then we have automatically created links for you, however if you add a new room type, or delete one, then this page can be used to ensure that the room type are correctly associated.");
jr_define('BEDS24_ROOM_TYPES_INFO3', "Choose the Beds24 room types that you want to associate with the room types in this system, and when done click Save to update the changes to Beds24.");
jr_define('BEDS24_ROOM_TYPES_YOURS', "Your room types");
jr_define('BEDS24_ROOM_TYPES_BEDS24', "Beds24 room types");
jr_define('BEDS24_ROOM_TYPES_NONE', "This property does not have any room types, so it can't be linked to any Beds24 room types. Would you like to import room types from Beds24?");
jr_define('BEDS24_IMPORT_ROOMS', "Import rooms");
jr_define('BEDS24_EXPORT_BOOKINGS', "Export bookings");
jr_define('BEDS24_IMPORT_BOOKINGS', "Import bookings");
jr_define('BEDS24_IMPORT_EXPORT', "You can import and export existing bookings from and to Beds24 at the click of a button. Bookings imported from Beds24 are imported from yesterday and will include all of the next year's bookings. You should only use these buttons after first importing or exporting the property into the system. Once setup, import and/or export will be done automatically.");
jr_define('_BEDS24_CHANNEL_MANAGEMENT_UPDATE_PRICING_YESNO', "Update prices to Beds24?");
jr_define('_BEDS24_CHANNEL_MANAGEMENT_UPDATE_PRICING_YESNO_DESC', "You can choose to update Beds24 with just availability or both availability and prices. If you use have specific situations where you want to use the Beds24 control panel for setting specific prices for specific channels you should leave this set to No.");
jr_define('_BEDS24_CONTROL_PANEL_DIRECT', "Direct link");
jr_define('BEDS24_IMPORT_NOTIFICATION_URLS', "If you imported this property into Jomres, you will need to manually change the Notify Url in your Beds24 -> Property -> Link settings to the following :");
jr_define('BEDS24V2_ERROR_KEYS_SHOULD_BE_REGENERATED', "You do not currently have any properties associated with Beds24 properties. You must reset your manager's API keys before allowing your managers to attempt to connect with Beds24. This will ensure that they all have unique keys.");
jr_define('BEDS24V2_ERROR_KEYS_REBUILD', "Reset manager API keys now");
jr_define('BEDS24V2_ERROR_KEYS_DISMISS', "Ignore warning");
jr_define('BEDS24V2_ERROR_KEYS_DONE', "Manager API keys have been reset");

jr_define( 'BEDS24V2_ADMINISTRATOR_LINKS_TITLE', "Beds24 property links" );
jr_define('BEDS24_ASSIGN_MANAGER', "Beds24 Change Manager");
jr_define('BEDS24_ASSIGN_MANAGER_DESC', "When a manager views the Channel Management (Bed24) page in the frontend, any properties that share an API key in both Jomres and Beds24 are automatically linked within Jomres. Likewise, any properties imported or exported by the manager are linked. You can change the manager a property is linked to by changing the manager dropdown on this page then clicking Save.");
jr_define( 'BEDS24V2_TARIFFS_TITLE', "Tariff export" );
jr_define( 'BEDS24V2_TARIFF_EXPORT_DESC', "You can export the tariffs you have created to Beds24 to a specific daily rate. If you are going to use this feature you should set the 'Update prices to Beds24?' option in Property Configuration to No. You may also need to configure your property in the Beds24 control panel so that you can have multiple daily rates. To do that go to Settings > Properties > Rooms > Daily prices and configure the 'Number of Daily Prices' to the number of prices you want. Once you have done that, you will be able to click one of the P buttons to set that daily rate." );
jr_define( 'BEDS24V2_TARIFF_EXPORT_TARIFFNAME', "Tariff name" );
jr_define( 'BEDS24V2_TARIFF_EXPORT_TARIFF_ROOM_TYPE', "Room type" );
jr_define( 'BEDS24V2_BOOKING_RESEND', "Resend notification" );
jr_define( 'BEDS24V2_BOOKING_DATA_AT_B24', "This is the booking information as stored on Beds24. Unless you are sure that the data is incorrect you should not need to re-send the booking to Beds24. " );
jr_define( 'BEDS24V2_BOOKING_NO_DATA_AT_B24', "This booking does not appear to be associated with a booking on Beds24. You can use the Resend button to export this booking to beds24." );

jr_define ('BEDS24V2_GDPR_ANONYMISE_GUESTS', "Anonymizovat hosty?");
jr_define ('BEDS24V2_GDPR_ANONYMISE_GUESTS_DESC', "Při odesílání rezervací správci kanálu doporučujeme anonymizovat údaje o hostovi. Pokud nastavíte tuto možnost na ano, budou při zasílání informací o rezervaci správci kanálu jméno hosta, e -mailová adresa . OTA budou mít přesný záznam o vaší dostupnosti, aniž byste museli sdílet více informací, než je nutné. To znamená, že jste v souladu s GDPR, protože pokud by se host později rozhodl vymazat své údaje v tomto systému (nejste upozorněni, když stane se), jejich údaje nezůstanou jiným správcům údajů, nad nimiž nemáte žádnou kontrolu. V případě potřeby můžete v tomto systému stále porovnávat rezervace s těmi ve správci kanálů, stránka s podrobnostmi rezervace vám zobrazí číslo rezervace pro tato rezervace, jak je uložena ve správci kanálů. ");
jr_define ('BEDS24V2_MASTER_APIKEY', "EXPERIMENTAL FEATURE - Master Beds24 API key");
jr_define ('BEDS24V2_MASTER_APIKEY_DESC', "POKUD JSTE MĚLI INSTALACI JOMRES S VLASTNOSTMI SPOJENÝMI S BEDS24 PŘEČTĚTE SI CELÝ POPIS ZDE. Standardně je Jomres navržen tak, aby mohl být jejich vlastními rezervačními platformami pro více prodejců. vlastnosti bezpečně do az lůžka 24. Toto nastavení vám umožňuje tuto funkci přepsat tím, že pro všechny služby budete mít jeden klíč API. To znamená, že u Beds24 potřebujete pouze jeden účet, ale také to znamená, že všechny poplatky budou připsány na jeden účet. Každý správce s přístupem ke službě bude moci odesílat aktualizace do služby na serverech bed24. Ponechte prázdné, pokud chcete toto nastavení ignorovat a donutit správce nemovitostí používat vlastní účty Beds24. Klíč API může mít libovolnou podobu, tak dlouho klíč zde odpovídá klíči v <a href='https://www.beds24.com/control2.php?pagetype=accountpassword' target='_blank'> <em> API Key 1 </em> </ a> pole. POKUD JIŽ MÁTE INSTALACE ON OF JOMRES WITH PROPERTIES LINKED TO BEDS24: You can switch to using this feature, however it would require that you first truncate (empty) these tables, delete the existing properties that are already in Jomres, and that you re-import the properties z Beds24 do Jomres. XXXXX_jomres_beds24_contract_booking_number_xref, XXXXX_jomres_beds24_property_uid_xref, XXXXX_jomres_beds24_rest_api_key_xref, XXXXX_jomres_beds24_room_type_xref. <br/> <br/> Při nastavování klíče API v části <em> Klíč API N </em> na stránce přístupu k účtu Beds24 je důležité, abyste pole <em> Přístup pomocí klíče API </em> nastavili na ' Povolit pouze whitelist IP 'a nastavíte číslo IP na <strong> ". $this_servers_ip_number." </strong> To platí stejně pro konfiguraci hlavního klíče API zde i pro frontend, pokud správce vlastností konfiguruje vlastní individuální API klíče. ");
jr_define ('BEDS24V2_WHITELIST_WARNING', "Pokud již byly vaše služby připojeny k Beds24, mějte na paměti, že Beds24 nedávno zavedly zásadu, kdy všechny servery připojující se k vašemu účtu musí být na seznamu povolených. Můžete to udělat na stránce Přístup k účtu, kde váš přístupový klíč byl zadán. Vyberte rozevírací seznam IP Whitelist a nastavte IP číslo na ");