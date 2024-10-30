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

jr_define ('PAYPAL_API_KEY_TITLE', "Paypal API Açarı");
jr_define ('PAYPAL_API_KEY_TITLE_DESC', "Həm canlı, həm də Sandbox hesablarınız üçün Paypal Müştəri ID və Gizli konfiqurasiya edin. Konfiqurasiya edildikdən sonra Paypal vasitəsi ilə həm sifariş, həm də faktura ödənişlərini götürə biləcəksiniz.");

jr_define ('PAYPAL_API_CLIENTID', "Müştəri Kimliyi");
jr_define ('PAYPAL_API_SECRET', "Gizli");
jr_define ('PAYPAL_API_CLIENTID_SANDBOX', "Sandbox Müştəri Kimliyi");
jr_define ('PAYPAL_API_SECRET_SANDBOX', "Sandbox Secret");

jr_define ('PAYPAL_API_CLIENTID_FINDING', "Müştəri ID -ni və Sirrini necə tapırsan?");

jr_define ('PAYPAL_API_CLIENTID_STEP1', 'https://developer.paypal.com/ saytına daxil olun və daxil olun.');
jr_define ('PAYPAL_API_CLIENTID_STEP2', "Yan menyuda Tətbiqlərimə və etimadnaməmə keçin.");
jr_define ('PAYPAL_API_CLIENTID_STEP3', "Yeni Tətbiq yaratmaq üçün Tətbiq Yarat düyməsini basın");
jr_define ('PAYPAL_API_CLIENTID_STEP4', "Tətbiqinizə bir ad verin, sonra Tətbiq Yarat düyməsini basın.");
jr_define ('PAYPAL_API_CLIENTID_STEP5', "Bu səhifədə Müştəri ID -nizi və Sirrinizi görə bilərsiniz. Bu düymələri kopyalayın və yuxarıdakı müvafiq sahələrə yapışdırın.");