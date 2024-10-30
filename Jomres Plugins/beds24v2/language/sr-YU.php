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
jr_define( 'BEDS24V2_CHANNEL_MANAGEMENT', 'Channel Management (Beds24)' );

jr_define( 'BEDS24V2_WEBHOOKS_AUTH_METHOD', 'Beds24' );
jr_define( 'BEDS24V2_WEBHOOKS_AUTH_METHOD_NOTES', 'If you have a Beds24 account and want to update Beds24 when you have a booking, please select this option. Set the URL to https://www.beds24.com/api/json/ ' );
jr_define( 'BEDS24V2_ERROR_USER_NO_KEY', 'This user has no API keys set, so cannot continue. Please visit their page in the User Management > Property Managers page and create a new API key for them using the link provided on that page.' );
jr_define( 'BEDS24V2_ERROR_USER_NO_PROPERTIES', 'This user has no Jomres properties that they can assign to Beds24 properties, or vice-versa' );
jr_define( 'BEDS24V2_NOT_SUBSCRIBED', "The manager you're logged in as does not appear to have an account with Beds24, so you will need to first register for their service, then save this API key on <a href='https://www.beds24.com/control2.php?pagetype=accountpassword' target='_blank'>Beds24's website here.</a>" );
jr_define( 'BEDS24V2_NOT_SUBSCRIBED_KEY', "Copy and paste this API key into the LINK field in your Beds24 account to continue." );
jr_define( 'BEDS24V2_NOT_SUBSCRIBED_RELOAD', "When you have done that, please click the button below to continue." );
jr_define( 'BEDS24V2_DISPLAY_PROPERTIES_TITLE', "Beds24 property linking" );
jr_define( 'BEDS24V2_DISPLAY_PROPERTIES_INFO', "This page allows you to view the properties that you have access to in this system, plus those that exist on the Channel Manager. It also allows you to import properties from the Channel Manager into this system, or export existing properties to the Channel Manager. <br/> If you have properties both in this system and Beds24 and you want to link them to each other, you can use the Property apikey to do that. Visit Beds24 > Settings > Properties (ensure that the property selected in the dropdown is the same as the one you want to link) then in the Link submenu save the 'Property apikey' in the 'propKey' field in Beds24. Once you have done that, reload the page. This system will see that the two properties are associated with the same key and create the needed associations. Once the two properties are linked, remember to visit the View Property page, find the notification url, and paste that into the Link page 'Notify Url' field. That will ensure that Beds24 use the correct link to synchronise bookings with that property when it receives bookings. " );
jr_define( 'BEDS24V2_DISPLAY_PROPERTIES_NO_PROPERTIES', "Error : There are no properties that you can link to in Beds24. This may be because all properties you have rights to have already been linked to another account on this system." );
jr_define( 'BEDS24V2_DISPLAY_PROPERTIES_PROPERTY_UID', "Property uid" );
jr_define( 'BEDS24V2_DISPLAY_PROPERTIES_PROPERTY_NAME', "Property name" );
jr_define( 'BEDS24V2_DISPLAY_PROPERTIES_BEDS24_PROPERTY_UID', "Beds24 Property Uid" );
jr_define( 'BEDS24V2_DISPLAY_PROPERTIES_BEDS24_PROPERTY_NAME', "Beds24 Property name" );
jr_define( 'BEDS24V2_DISPLAY_PROPERTY_APIKEY', "Property apikey" );
jr_define('BEDS24_LISTPROPERTIES_IMPORT', "Import");
jr_define('BEDS24_LISTPROPERTIES_ASSOCIATE_ROOM_TYPES', "Configure room types");
jr_define('BEDS24_LISTPROPERTIES_ASSOCIATE_ROOM_TYPES_DESC', "Here you need to link room types in your Beds24 account with those stored in this system.");
jr_define('_BEDS24_DISPLAY_BOOKINGS_JOMRESROOMS_BEDS24TYPENAME', "Beds24 room type");

jr_define('BEDS24_LISTPROPERTIES_IMPORT_CANNOT_NOAPIKEY', "Cannot import this property yet as you haven't set the Property Key in the Property Link page.");
jr_define('BEDS24_LISTPROPERTIES_IMPORT_CANNOT_NOROOMS', "Cannot import this property yet as it doesn't have any rooms. Please create one or more rooms (rooms in Beds24 are the same as room types in Jomres) and don't forget to set the minimum price. Once you have done that you can import the room type into Jomres and associate them with current Jomres room types. After that you will be able to modify the tariffs, but a minimum price needs to be set.");
jr_define('_BEDS24_SUGGESTED_KEY', "We suggest you use this API Key. When you have done that, reload this page.");
jr_define('BEDS24_LISTPROPERTIES_EXPORT', "Export");
jr_define( 'BEDS24V2_REST_API_INTRO', "Here you can see your REST API key pair and the path to the API . If you save these details in your account on Beds24 then Beds24 24 will be able to contact this site through it's API." );
jr_define( 'BEDS24V2_REST_API_CLIENT_ID', "Client ID" );
jr_define( 'BEDS24V2_REST_API_CLIENT_SECRET', "Client Secret" );
jr_define( 'BEDS24V2_REST_API_ENDPOINT', "URI (endpoint)" );
jr_define('BEDS24_LISTPROPERTIES_CONFIGURE', "View property");
jr_define('BEDS24_ROOM_TYPES_TITLE', "Room type associations");
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
jr_define( 'BEDS24V2_GDPR_ANONYMISE_GUESTS', "Anonymise guests?" );
jr_define( 'BEDS24V2_GDPR_ANONYMISE_GUESTS_DESC', "When bookings are sent to the channel manager, we recommend that you anonymise the guest details. If you set this option to yes, when booking information is sent to the channel manager the guest name, email address are not. OTAs will have an accurate record of your availability without you needing to share more information than necessary. This means that you are compliant with the GDPR because if the guest should later choose to delete their details on this system (you are not notified when this happens), their details are not left with other data controllers over whom you have no control. If needed, you can still cross-reference bookings in this system with those on the channel manager, the Reservation Details page will show you the booking number for this booking as it is stored on the channel manager." );
jr_define( 'BEDS24V2_MASTER_APIKEY', "EXPERIMENTAL FEATURE - Master Beds24 API key" );
jr_define( 'BEDS24V2_MASTER_APIKEY_DESC', "IF YOU ALREADY HAVE AN INSTALLATION OF JOMRES WITH PROPERTIES LINKED TO BEDS24 READ THE ENTIRE DESCRIPTION HERE. By default Jomres is designed to be a multi-vendor booking platform. Managers who have their own beds24 accounts can import their properties to and from beds24 securely. This setting allows you to override that functionality by having a single api key for all properties. This means that you only need one account with Beds24 however it also means that all charges will be accrued by that one account. Any manager with access to a property will be able to send updates to the property on the beds24 servers. Leave blank to ignore this setting and force property managers to use their own Beds24 accounts. The API key can take any form you want, so long as the key here matches the one in the <a href='https://www.beds24.com/control2.php?pagetype=accountpassword' target='_blank'><em>API Key 1</em> </a> field.  IF YOU ALREADY HAVE AN INSTALLATION OF JOMRES WITH PROPERTIES LINKED TO BEDS24 : You can switch to using this feature, however it would require that you first truncate (empty) these tables, delete the existing properties that are already in Jomres, and that you then re-import the properties from Beds24 into Jomres. XXXXX_jomres_beds24_contract_booking_number_xref ,  XXXXX_jomres_beds24_property_uid_xref  , XXXXX_jomres_beds24_rest_api_key_xref  , XXXXX_jomres_beds24_room_type_xref. <br/> <br/> When setting your API key in the <em>API Key N</em> section of Beds24's Account Access page it's vital that you set the <em>API Key Access</em> field to 'Allow whitelist IP only' and you set the IP number to <strong>".$this_servers_ip_number ."</strong> This applies equally for the master API key configuration here, and in the frontend if a property manager is configuring their own individual API keys." );
jr_define( 'BEDS24V2_WHITELIST_WARNING', "If your properties have already been connected to Beds24, be aware that Beds24 have recently introduced a policy where all servers connecting to your account have to have been whitelisted. You can do this on the Account Access  page, where your Access key has been entered. Select the Whitelist IP dropdown and set the IP number to " );