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
jr_define('BEDS24V2_CHANNEL_MANAGEMENT', '通道管理(Beds24)');

jr_define('BEDS24V2_WEBHOOKS_AUTH_METHOD', 'Beds24');
jr_define( 'BEDS24V2_WEBHOOKS_AUTH_METHOD_NOTES', '如果您有Beds24账号，想在预订时更新Beds24，请选择此选项。设置网址为https://www.beds24.com/api/json/ ');
jr_define( 'BEDS24V2_ERROR_USER_NO_KEY', '此用户没有设置 API 密钥，因此无法继续。请访问他们在用户管理 > 物业经理页面中的页面，并使用该页面上提供的链接为他们创建一个新的 API 密钥。');
jr_define( 'BEDS24V2_ERROR_USER_NO_PROPERTIES', '该用户没有可分配给 Beds24 属性的 Jomres 属性，反之亦然');
jr_define( 'BEDS24V2_NOT_SUBSCRIBED', "您登录的经理似乎没有 Beds24 帐户，因此您需要先注册他们的服务，然后将此 API 密钥保存在 <a href='https://www.beds24.com/control2.php?pagetype=accountpassword' target='_blank'>Beds24 的网站在这里。</a>" );
jr_define( 'BEDS24V2_NOT_SUBSCRIBED_KEY', "将此 API 密钥复制并粘贴到您 Beds24 帐户的 LINK 字段中以继续。");
jr_define( 'BEDS24V2_NOT_SUBSCRIBED_RELOAD', "完成后，请点击下面的按钮继续。");
jr_define('BEDS24V2_DISPLAY_PROPERTIES_TITLE', "Beds24 属性链接");
jr_define( 'BEDS24V2_DISPLAY_PROPERTIES_INFO', '此页面允许您查看您在此系统中有权访问的属性，以及通道管理器上存在的属性。它还允许您将属性从通道管理器导入此系统，或导出将现有属性添加到频道管理器。<br/>如果您在此系统和 Beds24 中都有属性，并且您想将它们相互链接，您可以使用属性 apikey 来执行此操作。访问 Beds24 > 设置 > 属性(确保在下拉列表中选择的属性与您要链接的属性相同)然后在链接子菜单中保存 Beds24 的"propKey字段中的 Property apikey。完成此操作后，重新加载页面。该系统将看到这两个属性与相同的键相关联并创建所需的关联。一旦这两个属性被链接，记得访问查看属性页面，找到通知 url，并将其粘贴到链接页面的"通知 URL\"字段中。那会确保 Beds24 在收到预订时使用正确的链接将预订与该酒店同步。 ');
jr_define( 'BEDS24V2_DISPLAY_PROPERTIES_NO_PROPERTIES', "错误：在 Beds24 中没有您可以链接的属性。这可能是因为您有权访问的所有属性都已关联到此系统上的另一个帐户。");
jr_define('BEDS24V2_DISPLAY_PROPERTIES_PROPERTY_UID', "属性 uid" );
jr_define('BEDS24V2_DISPLAY_PROPERTIES_PROPERTY_NAME', "物业名称");
jr_define('BEDS24V2_DISPLAY_PROPERTIES_BEDS24_PROPERTY_UID', "Beds24 属性 Uid");
jr_define('BEDS24V2_DISPLAY_PROPERTIES_BEDS24_PROPERTY_NAME', "Beds24 属性名称");
jr_define('BEDS24V2_DISPLAY_PROPERTY_APIKEY', "属性apikey");
jr_define('BEDS24_LISTPROPERTIES_IMPORT', "导入");
jr_define('BEDS24_LISTPROPERTIES_ASSOCIATE_ROOM_TYPES', "配置房间类型");
jr_define('BEDS24_LISTPROPERTIES_ASSOCIATE_ROOM_TYPES_DESC', "这里您需要将您 Beds24 帐户中的房间类型与存储在该系统中的房间类型相关联。");
jr_define('_BEDS24_DISPLAY_BOOKINGS_JOMRESROOMS_BEDS24TYPENAME', "Beds24 房间类型");

jr_define('BEDS24_LISTPROPERTIES_IMPORT_CANNOT_NOAPIKEY', "无法导入此属性，因为您尚未在属性链接页面中设置属性键。");
jr_define('BEDS24_LISTPROPERTIES_IMPORT_CANNOT_NOROOMS', "目前还不能导入此属性，因为它没有任何房间。请创建一个或多个房间(Beds24 中的房间与 Jomres 中的房间类型相同)并且不要忘记设置最低价格. 完成后，您可以将房间类型导入 Jomres 并将它们与当前的 Jomres 房间类型相关联。之后您将能够修改关税，但需要设置最低价格。");
jr_define('_BEDS24_SUGGESTED_KEY', "我们建议您使用此 API 密钥。完成后，重新加载此页面。");
jr_define('BEDS24_LISTPROPERTIES_EXPORT', "出口");
jr_define( 'BEDS24V2_REST_API_INTRO', "在这里您可以看到您的 REST API 密钥对和 API 的路径。如果您将这些详细信息保存在您在 Beds24 上的帐户中，那么 Beds24 24 将能够通过它的 API 联系该站点。");
jr_define('BEDS24V2_REST_API_CLIENT_ID', "客户端 ID");
jr_define('BEDS24V2_REST_API_CLIENT_SECRET', "客户端密码");
jr_define('BEDS24V2_REST_API_ENDPOINT', "URI (endpoint)");
jr_define('BEDS24_LISTPROPERTIES_CONFIGURE', "查看属性");
jr_define('BEDS24_ROOM_TYPES_TITLE', "房间类型关联");

jr_define('BEDS24_ROOM_TYPES_INFO', "此页面允许您将您的房间类型与存储在 Beds24 服务器中的房间类型相关联。");
jr_define('BEDS24_ROOM_TYPES_INFO2', "在链接房间类型之前，您无法收到 Beds24 发送的预订信息。如果您的财产已导入/导出至 Beds24，那么我们会自动为您创建链接，但是如果您添加新房型，或者删除一个，那么这个页面就可以保证房型关联正确。");
jr_define('BEDS24_ROOM_TYPES_INFO3', "选择你想与系统中房间类型关联的 Beds24 房间类型，完成后点击保存更新对 Beds24 的更改。");
jr_define('BEDS24_ROOM_TYPES_YOURS', "您的房间类型");
jr_define('BEDS24_ROOM_TYPES_BEDS24', "Beds24 房间类型");
jr_define('BEDS24_ROOM_TYPES_NONE', "此属性没有任何房型，因此不能与任何 Beds24 房型关联。您想从 Beds24 中导入房型吗？");
jr_define('BEDS24_IMPORT_ROOMS', "导入房间");
jr_define('BEDS24_EXPORT_BOOKINGS', "出口预订");
jr_define('BEDS24_IMPORT_BOOKINGS', "导入预订");
jr_define('BEDS24_IMPORT_EXPORT', "您可以通过单击按钮从 Beds24 导入和导出现有预订。从 Beds24 导入的预订是从昨天导入的，将包括下一年的所有预订。您应该只在之后使用这些按钮首先将属性导入或导出到系统中。设置后，导入和/或导出将自动完成。");
jr_define('_BEDS24_CHANNEL_MANAGEMENT_UPDATE_PRICING_YESNO', "更新 Beds24 的价格？");
jr_define('_BEDS24_CHANNEL_MANAGEMENT_UPDATE_PRICING_YESNO_DESC', "您可以选择只更新 Beds24 的可用性或可用性和价格。如果您在特定情况下使用 Beds24 控制面板为特定频道设置特定价格，则应将此设置保留为不。");
jr_define('_BEDS24_CONTROL_PANEL_DIRECT', "直接链接");
jr_define('BEDS24_IMPORT_NOTIFICATION_URLS', "如果您将此属性导入 Jomres，则需要手动将 Beds24 -> 属性 -> 链接设置中的通知 URL 更改为以下内容:");
jr_define('BEDS24V2_ERROR_KEYS_SHOULD_BE_REGENERATED', "您目前没有任何与 Beds24 相关联的属性。在允许您的经理尝试与 Beds24 连接之前，您必须重置您经理的 API 密钥。这将确保他们都有唯一的密钥。");
jr_define('BEDS24V2_ERROR_KEYS_REBUILD', "立即重置管理器 API 密钥");
jr_define('BEDS24V2_ERROR_KEYS_DISMISS', "忽略警告");
jr_define('BEDS24V2_ERROR_KEYS_DONE', "Manager API 密钥已被重置");

jr_define('BEDS24V2_ADMINISTRATOR_LINKS_TITLE', "Beds24 属性链接");
jr_define('BEDS24_ASSIGN_MANAGER', "Beds24 变更经理");
jr_define('BEDS24_ASSIGN_MANAGER_DESC', "当经理在前端查看频道管理 (Bed24) 页面时，任何在 Jomres 和 Beds24 中共享 API 密钥的属性都会在 Jomres 中自动链接。同样，任何由经理导入或导出的属性已链接。您可以通过更改此页面上的经理下拉列表然后单击保存来更改属性链接到的经理。");
jr_define('BEDS24V2_TARIFFS_TITLE', "关税出口");
jr_define( 'BEDS24V2_TARIFF_EXPORT_DESC', "您可以将您创建的费率导出到 Beds24 到特定的每日费率。如果您要使用此功能，您应该将属性配置中的更新价格到 Beds24？选项设置为否。您可能还需要在 Beds24 控制面板中配置您的属性，以便您可以有多个每日价格。为此，请转到设置 > 属性 > 房间 > 每日价格，然后将每日价格数量配置为您想要的价格数量. 完成此操作后，您将能够单击 P 按钮之一来设置该每日费率。");
jr_define('BEDS24V2_TARIFF_EXPORT_TARIFFNAME', "关税名称");
jr_define('BEDS24V2_TARIFF_EXPORT_TARIFF_ROOM_TYPE', "房间类型");
jr_define('BEDS24V2_BOOKING_RESEND', "重新发送通知");
jr_define( 'BEDS24V2_BOOKING_DATA_AT_B24', "这是存储在 Beds24 上的预订信息。除非您确定数据不正确，否则您不需要将预订重新发送到 Beds24。");
jr_define( 'BEDS24V2_BOOKING_NO_DATA_AT_B24', "此预订似乎与 Beds24 上的预订无关。您可以使用重新发送按钮将此预订导出到 bed24。");
    
    jr_define( 'BEDS24V2_GDPR_ANONYMISE_GUESTS', "匿名客人？" );
jr_define( 'BEDS24V2_GDPR_ANONYMISE_GUESTS_DESC', '将预订发送给渠道经理时，我们建议您将客人详细信息匿名化。如果将此选项设置为是，当预订信息发送给渠道经理时，客人姓名,电子邮件地址不会. OTA 将准确记录您的可用性，而您无需共享不必要的信息。这意味着您符合 GDPR，因为如果客人稍后选择删除其在此系统上的详细信息(当此情况发生时您不会收到通知)发生)，他们的详细信息不会留给您无法控制的其他数据控制者。如果需要，您仍然可以将本系统中的预订与渠道管理器中的预订进行交叉引用，"预订详情页面将显示您的预订编号此预订存储在渠道管理器中。');
jr_define('BEDS24V2_MASTER_APIKEY', "实验功能 - Master Beds24 API 密钥");
jr_define( 'BEDS24V2_MASTER_APIKEY_DESC', '如果您已经安装了与 BEDS24 相关联的 JOMRES，请在此处阅读整个描述。默认情况下，Jomres 被设计为一个多供应商预订平台。拥有自己的 Bed24 帐户的经理可以导入安全地往返beds24的属性。此设置允许您通过为所有属性使用一个api密钥来覆盖该功能。这意味着您只需要一个Beds24帐户，但这也意味着所有费用都将由该帐户累积。任何有权访问物业的经理都可以向beds24 服务器上的物业发送更新。留空可忽略此设置并强制物业经理使用他们自己的 Beds24 帐户。API 密钥可以采用您想要的任何形式，只要因为此处的密钥与 <a href=\'https://www.beds24.com/control2.php?pagetype=accountpassword\' target=\'_blank\'><em>API Key 1</em> </em> 中的密钥匹配a> 字段。如果您已经安装了具有链接到 BEDS24 的属性的 JOMRES 上：您可以切换到使用此功能，但是它需要您首先截断(清空)这些表，删除已经在 J​​omres 中的现有属性，然后重新导入属性从 Beds24 到 Jomres。 XXXXX_jomres_beds24_contract_booking_number_xref,XXXXX_jomres_beds24_property_uid_xref,XXXXX_jomres_beds24_rest_api_key_xref,XXXXX_jomres_beds24_room_type_xref。 <br/> <br/> 在 Beds24 帐户访问页面的 <em>API 密钥 N</em> 部分设置 API 密钥时，将 <em>API 密钥访问</em> 字段设置为" Allow whitelist IP only 并且您将 IP 编号设置为 <strong>".$this_servers_ip_number ."</strong> 这同样适用于此处的主 API 密钥配置，如果物业经理正在配置他们自己的个人 API，则在前端键。');
jr_define( 'BEDS24V2_WHITELIST_WARNING', "如果您的物业已经连接到 Beds24，请注意 Beds24 最近引入了一项政策，即所有连接到您帐户的服务器都必须被列入白名单。您可以在帐户访问页面上执行此操作，其中您的访问密钥已输入。选择白名单 IP 下拉列表并将 IP 号码设置为");