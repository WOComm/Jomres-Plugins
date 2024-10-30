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

jr_define('_OAUTH_SCOPE_CHANNEL_MANAGEMENT', "チャネル管理");
jr_define('_OAUTH_SCOPE_CHANNEL_MANAGEMENT_DESC', "クライアントはチャネル管理アクティビティを実行できます。これにより,クライアントはシステム内でアカウントとプロパティを変更するためのかなりの能力を得ることができます。");

jr_define('_OAUTH_SCOPE_CHANNEL_MANAGEMENT_CLEANING_PRICE', "クリーニング");

jr_define('_CMF_CANCELLED_BOOKING', "チャネルマネージャーが予約をキャンセルしました");

jr_define('_CMF_CLEANING_STRING', "クリーニング"); //プロパティをすでにインポートしている場合は,これを変更しないでください。清掃料金のある物件には,この名前のエクストラがあります
jr_define('_CMF_SECURITY_STRING', "保証金"); //プロパティをすでにインポートしている場合は,これを変更しないでください。保証金のある物件には,この名前のエクストラがあります


jr_define('_CMF_API_PRIVACY', "APIプライバシー");
jr_define('_CMF_API_PRIVACY_ON', "プライバシーオン");
jr_define('_CMF_API_PRIVACY_OFF', "プライバシーオフ");

jr_define('_CMF_API_PRIVACY_DESC', "プロパティの情報は,それを作成したチャネルでのみ表示できます。たとえば,チャネルAとチャネルBの両方に異なるAPIキーペアを指定した場合,チャネルAで作成されたプロパティの情報は表示できません。 APIプライバシーをオフにして,すべてのチャネルがAPIを介してプロパティのすべての情報を表示できるようにしない限り,チャネルBに表示されます。プロパティを一覧表示する別のサイトとこのプロパティを共有する場合は,APIプライバシーをオフに設定します。このプロパティを他のサイトと共有していない場合は,APIプライバシーをオンのままにします。 ");