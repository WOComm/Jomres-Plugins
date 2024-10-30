<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 10.5.3
 *
 * @copyright	2005-2022 Vince Wooll
 * Jomres is currently available for use in all personal or commercial projects under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/
//#################################################################
defined('_JOMRES_INITCHECK') or die('');
//#################################################################
	jr_define('BRAINTREE_TITLE',"ブレインツリー");
	jr_define('BRAINTREE_MARKETING',"<h3>グローバル決済パートナーで収益アップ</h3>
PayPal、Venmo (米国内)、クレジット カードとデビット カード、および Apple Pay や Google Pay などの一般的なデジタル ウォレットを 1 つのシームレスな統合で提供する唯一の支払いプラットフォームを使用して、より多くの購入者にリーチし、コンバージョン率を高めます。 " );

	jr_define('BRAINTREE_MERCHANT_ID',"ライブマーチャント ID");
	jr_define('BRAINTREE_MERCHANT_PUBLIC_KEY',"ライブ公開鍵");
	jr_define('BRAINTREE_MERCHANT_PRIVATE_KEY',"ライブ秘密鍵");

	jr_define('BRAINTREE_API_TEST_MODE',"テストモード");
	jr_define('BRAINTREE_API_TEST_MODE_DESC',"テスト モードを使用している場合は、マーチャント ID、公開キー、秘密キーが異なります。");

	jr_define('BRAINTREE_TEST_MERCHANT_ID',"マーチャント ID のテスト");
	jr_define('BRAINTREE_TEST_MERCHANT_PUBLIC_KEY',"公開鍵のテスト");
	jr_define('BRAINTREE_TEST_MERCHANT_PRIVATE_KEY',"秘密鍵のテスト");