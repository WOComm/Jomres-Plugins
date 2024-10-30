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

jr_define( 'BEDS24V2_CHANNEL_MANAGEMENT', 'チャネル管理(Beds24)');

jr_define( 'BEDS24V2_WEBHOOKS_AUTH_METHOD', 'Beds24');
jr_define( 'BEDS24V2_WEBHOOKS_AUTH_METHOD_NOTES', 'Beds24アカウントをお持ちで,予約時にBeds24を更新する場合は,このオプションを選択してください。URLをhttps://www.beds24.com/api/json/に設定してください');
jr_define( 'BEDS24V2_ERROR_USER_NO_KEY', 'このユーザーにはAPIキーが設定されていないため,続行できません。[ユーザー管理]> [プロパティマネージャー]ページのページにアクセスし,そのページにあるリンクを使用して新しいAPIキーを作成してください。');
jr_define( 'BEDS24V2_ERROR_USER_NO_PROPERTIES', 'このユーザーには,Beds24プロパティに割り当てることができるJomresプロパティがありません。その逆も同様です。');
jr_define( 'BEDS24V2_NOT_SUBSCRIBED', "ログインしているマネージャーはBeds24のアカウントを持っていないようです。そのため,最初にサービスに登録してから,このAPIキーを<a href='https://www.beds24.com/control2.php?pagetype=accountpassword' target='_blank'> Beds24のウェブサイトはこちら</a> ");
jr_define( 'BEDS24V2_NOT_SUBSCRIBED_KEY', "続行するには,このAPIキーをコピーしてBeds24アカウントのLINKフィールドに貼り付けてください。");
jr_define( 'BEDS24V2_NOT_SUBSCRIBED_RELOAD', "それが完了したら,下のボタンをクリックして続行してください。");
jr_define( 'BEDS24V2_DISPLAY_PROPERTIES_TITLE', "Beds24プロパティのリンク");
jr_define( 'BEDS24V2_DISPLAY_PROPERTIES_INFO', "このページでは,このシステムでアクセスできるプロパティと,チャネルマネージャーに存在するプロパティを表示できます。また,チャネルマネージャーからこのシステムにプロパティをインポートしたり,エクスポートしたりすることもできます。チャネルマネージャへの既存のプロパティ。<br/>このシステムとBeds24の両方にプロパティがあり,それらを相互にリンクする場合は,プロパティapikeyを使用してそれを行うことができます。Beds24>設定>プロパティにアクセスします(ドロップダウンで選択したプロパティは,リンクするプロパティと同じです)次に,[リンク]サブメニューで,Beds24の[propKey]フィールドに[Propertyapikey]を保存します。それが完了したら,ページをリロードします。このシステムは2つのプロパティが同じキーに関連付けられていることを確認し,必要な関連付けを作成します。2つのプロパティがリンクされたら,[プロパティの表示]ページにアクセスし,通知URLを見つけて,[リンク]ページの[通知]フィールドに貼り付けます。それはBeds24が予約を受け取ったときに,正しいリンクを使用して予約をそのプロパティと同期するようにします。 ");
jr_define( 'BEDS24V2_DISPLAY_PROPERTIES_NO_PROPERTIES', "エラー：Beds24にリンクできるプロパティがありません。これは,このシステムの別のアカウントに既にリンクされている権限を持つすべてのプロパティが原因である可能性があります。");
jr_define( 'BEDS24V2_DISPLAY_PROPERTIES_PROPERTY_UID', "プロパティuid");
jr_define( 'BEDS24V2_DISPLAY_PROPERTIES_PROPERTY_NAME', "プロパティ名");
jr_define( 'BEDS24V2_DISPLAY_PROPERTIES_BEDS24_PROPERTY_UID', "Beds24プロパティUid");
jr_define( 'BEDS24V2_DISPLAY_PROPERTIES_BEDS24_PROPERTY_NAME', "Beds24プロパティ名");
jr_define( 'BEDS24V2_DISPLAY_PROPERTY_APIKEY', "プロパティapikey");
jr_define( 'BEDS24_LISTPROPERTIES_IMPORT', "インポート");
jr_define( 'BEDS24_LISTPROPERTIES_ASSOCIATE_ROOM_TYPES', "部屋のタイプを構成する");
jr_define( 'BEDS24_LISTPROPERTIES_ASSOCIATE_ROOM_TYPES_DESC', "ここでは,Beds24アカウントの部屋タイプをこのシステムに保存されている部屋タイプにリンクする必要があります。");
jr_define( '_BEDS24_DISPLAY_BOOKINGS_JOMRESROOMS_BEDS24TYPENAME', "Beds24部屋タイプ");

jr_define( 'BEDS24_LISTPROPERTIES_IMPORT_CANNOT_NOAPIKEY', "プロパティリンクページでプロパティキーを設定していないため,このプロパティをまだインポートできません。");
jr_define( 'BEDS24_LISTPROPERTIES_IMPORT_CANNOT_NOROOMS', "部屋がないため,このプロパティはまだインポートできません。1つ以上の部屋を作成してください(Beds24の部屋はJomresの部屋タイプと同じです)。最低価格を設定することを忘れないでください。 。完了したら,部屋タイプをJomresにインポートして,現在のJomres部屋タイプに関連付けることができます。その後,料金を変更できますが,最低価格を設定する必要があります。 ");
jr_define( '_BEDS24_SUGGESTED_KEY', "このAPIキーを使用することをお勧めします。それが完了したら,このページをリロードしてください。");
jr_define( 'BEDS24_LISTPROPERTIES_EXPORT', "エクスポート");
jr_define( 'BEDS24V2_REST_API_INTRO', "ここに,REST APIキーペアとAPIへのパスが表示されます。これらの詳細をBeds24のアカウントに保存すると,Beds24 24はAPIを介してこのサイトにアクセスできるようになります。");
jr_define( 'BEDS24V2_REST_API_CLIENT_ID', "クライアントID");
jr_define( 'BEDS24V2_REST_API_CLIENT_SECRET', "クライアントシークレット");
jr_define( 'BEDS24V2_REST_API_ENDPOINT', "URI(エンドポイント)");
jr_define( 'BEDS24_LISTPROPERTIES_CONFIGURE', "プロパティの表示");
jr_define( 'BEDS24_ROOM_TYPES_TITLE', "部屋タイプの関連付け");
    
    jr_define( 'BEDS24_ROOM_TYPES_INFO', "このページでは,部屋のタイプをBeds24サーバーに保存されているタイプに関連付けることができます。");
jr_define( 'BEDS24_ROOM_TYPES_INFO2', "部屋のタイプがリンクされるまで,Beds24から送信された予約情報を受信できません。プロパティがBeds24との間でインポート/エクスポートされている場合は,リンクが自動的に作成されますが,新しい部屋タイプ,または1つを削除すると,このページを使用して,部屋タイプが正しく関連付けられていることを確認できます。 ");
jr_define( 'BEDS24_ROOM_TYPES_INFO3', "このシステムの部屋タイプに関連付けるBeds24部屋タイプを選択し,完了したら[保存]をクリックしてBeds24への変更を更新します。");
jr_define( 'BEDS24_ROOM_TYPES_YOURS', "あなたの部屋のタイプ");
jr_define( 'BEDS24_ROOM_TYPES_BEDS24', "Beds24部屋タイプ");
jr_define( 'BEDS24_ROOM_TYPES_NONE', "このプロパティには部屋タイプがないため,Beds24の部屋タイプにリンクできません。Beds24から部屋タイプをインポートしますか？");
jr_define( 'BEDS24_IMPORT_ROOMS', "部屋のインポート");
jr_define( 'BEDS24_EXPORT_BOOKINGS', "予約のエクスポート");
jr_define( 'BEDS24_IMPORT_BOOKINGS', "予約のインポート");
jr_define( 'BEDS24_IMPORT_EXPORT', "ボタンをクリックするだけで,Beds24との間で既存の予約をインポートおよびエクスポートできます。Beds24からインポートされた予約は昨日からインポートされ,翌年のすべての予約が含まれます。これらのボタンは,後でのみ使用してください。最初にプロパティをシステムにインポートまたはエクスポートします。セットアップが完了すると,インポートまたはエクスポート,あるいはその両方が自動的に実行されます。 ");
jr_define( '_BEDS24_CHANNEL_MANAGEMENT_UPDATE_PRICING_YESNO', "価格をBeds24に更新しますか？");
jr_define( '_BEDS24_CHANNEL_MANAGEMENT_UPDATE_PRICING_YESNO_DESC', "Beds24を可用性のみ,または可用性と価格の両方で更新することを選択できます。特定のチャネルの特定の価格を設定するためにBeds24コントロールパネルを使用する特定の状況を使用する場合は,この設定をそのままにしておく必要があります。番号。");
jr_define( '_BEDS24_CONTROL_PANEL_DIRECT', "直接リンク");
jr_define( 'BEDS24_IMPORT_NOTIFICATION_URLS', "このプロパティをJomresにインポートした場合は,Beds24->プロパティ->リンク設定の通知URLを手動で次のように変更する必要があります：");
jr_define( 'BEDS24V2_ERROR_KEYS_SHOULD_BE_REGENERATED', "現在,Beds24プロパティに関連付けられているプロパティはありません。マネージャーがBeds24に接続しようとする前に,マネージャーのAPIキーをリセットする必要があります。これにより,すべてのプロパティに一意のキーが確実に割り当てられます。");
jr_define( 'BEDS24V2_ERROR_KEYS_REBUILD', "マネージャーAPIキーを今すぐリセット");
jr_define( 'BEDS24V2_ERROR_KEYS_DISMISS', "警告を無視");
jr_define( 'BEDS24V2_ERROR_KEYS_DONE', "マネージャーAPIキーがリセットされました");

jr_define( 'BEDS24V2_ADMINISTRATOR_LINKS_TITLE', "Beds24プロパティリンク");
jr_define( 'BEDS24_ASSIGN_MANAGER', "Beds24変更マネージャー");
jr_define( 'BEDS24_ASSIGN_MANAGER_DESC', "マネージャーがフロントエンドのチャネル管理(Bed24)ページを表示すると,JomresとBeds24の両方でAPIキーを共有するプロパティは,Jomres内で自動的にリンクされます。同様に,マネージャーによってインポートまたはエクスポートされたプロパティもすべてこのページのマネージャドロップダウンを変更してから[保存]をクリックすると,プロパティがリンクされているマネージャを変更できます。 ");
jr_define( 'BEDS24V2_TARIFFS_TITLE', "関税のエクスポート");
jr_define( 'BEDS24V2_TARIFF_EXPORT_DESC', "作成した料金をBeds24に特定の日割りでエクスポートできます。この機能を使用する場合は,プロパティ構成の[価格をBeds24に更新しますか？]オプションを[いいえ]に設定する必要があります。また,Beds24コントロールパネルでプロパティを構成して,複数の1日の料金を設定できるようにする必要がある場合もあります。これを行うには,[設定]> [プロパティ]> [部屋]> [1日の料金]に移動し,[1日の料金の数]を希望の価格に設定します。 。それが完了すると,Pボタンの1つをクリックして,その1日あたりの料金を設定できるようになります。 ");
jr_define( 'BEDS24V2_TARIFF_EXPORT_TARIFFNAME', "関税名");
jr_define( 'BEDS24V2_TARIFF_EXPORT_TARIFF_ROOM_TYPE', "部屋のタイプ");
jr_define( 'BEDS24V2_BOOKING_RESEND', "再送信通知");
jr_define( 'BEDS24V2_BOOKING_DATA_AT_B24', "これは,Beds24に保存されている予約情報です。データが正しくないことが確実でない限り,予約をBeds24に再送信する必要はありません。");
jr_define( 'BEDS24V2_BOOKING_NO_DATA_AT_B24', "この予約はBeds24の予約に関連付けられていないようです。[再送信]ボタンを使用して,この予約をbeds24にエクスポートできます。");
    
    jr_define( 'BEDS24V2_GDPR_ANONYMISE_GUESTS', "ゲストを匿名化しますか？");
jr_define( 'BEDS24V2_GDPR_ANONYMISE_GUESTS_DESC', "予約がチャネルマネージャーに送信されるときは,ゲストの詳細を匿名化することをお勧めします。このオプションをyesに設定すると,予約情報がチャネルマネージャーに送信されるときに,ゲスト名,電子メールアドレスは送信されません。 。OTAは,必要以上の情報を共有しなくても,可用性の正確な記録を保持します。これは,ゲストが後でこのシステムの詳細を削除することを選択した場合に,GDPRに準拠していることを意味します(これが発生しても通知されません)発生),それらの詳細は,あなたが制御できない他のデータコントローラーに残されません。必要に応じて,このシステムの予約をチャネルマネージャーの予約と相互参照できます。[予約の詳細]ページには,の予約番号が表示されます。この予約はチャネルマネージャーに保存されているためです。 ");
jr_define( 'BEDS24V2_MASTER_APIKEY', "実験的機能-マスターBeds24APIキー");
jr_define( 'BEDS24V2_MASTER_APIKEY_DESC', "BEDS24にリンクされたプロパティを持つJOMRESのインストールがすでにある場合は,ここですべての説明をお読みください。デフォルトでは,Jomresはマルチベンダー予約プラットフォームとして設計されています。独自のbeds24アカウントを持つマネージャーは自分のbeds24アカウントをインポートできます。この設定では,すべてのプロパティに1つのAPIキーを設定することで,その機能を上書きできます。つまり,Beds24のアカウントは1つだけ必要ですが,すべての料金はその1つのアカウントで発生します。プロパティにアクセスできるすべてのマネージャーは,beds24サーバー上のプロパティに更新を送信できます。この設定を無視してプロパティマネージャーに独自のBeds24アカウントを使用させるには,空白のままにします。APIキーは,任意の形式をとることができます。ここでのキーは<ahref = 'https：//www.beds24.com/control2.php？pagetype = accountpassword' target = '_blank'> <em> APIキー1 </ em>のキーと一致するため,</ em> </ a>フィールド。すでにインストールを行っている場合BEDS24にリンクされたプロパティを持つJOMRESの場合：この機能の使用に切り替えることができますが,最初にこれらのテーブルを切り捨て(空にし),すでにJomresにある既存のプロパティを削除してから,プロパティを再インポートする必要があります。 Beds24からJomresへ。 XXXXX_jomres_beds24_contract_booking_number_xref,XXXXX_jomres_beds24_property_uid_xref,XXXXX_jomres_beds24_rest_api_key_xref,XXXXX_jomres_beds24_room_type_xref。 <br/> <br/> Beds24のアカウントアクセスページの<em> API Key N </ em>セクションでAPIキーを設定するときは,<em> API Key Access </ em>フィールドを 'に設定することが重要です。ホワイトリストIPのみを許可する 'で,IP番号を<strong> ".$this_servers_ip_number." </ strong>に設定します。これは,ここでのマスターAPIキー構成,およびプロパティマネージャーが独自の個別APIを構成している場合のフロントエンドにも同様に適用されます。キー。 ");
jr_define( 'BEDS24V2_WHITELIST_WARNING', "プロパティがすでにBeds24に接続されている場合,Beds24は最近,アカウントに接続しているすべてのサーバーをホワイトリストに登録する必要があるポリシーを導入したことに注意してください。これは,[アカウントアクセス]ページで行うことができます。アクセスキーが入力されました。[ホワイトリストIP]ドロップダウンを選択し,IP番号を に設定します。");