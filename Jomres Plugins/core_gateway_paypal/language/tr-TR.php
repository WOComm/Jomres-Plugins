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

jr_define('PAYPAL_API_KEY_TITLE',"Paypal API Anahtarı");
jr_define('PAYPAL_API_KEY_TITLE_DESC',"Hem canlı hem de Sandbox hesaplarınız için Paypal Müşteri Kimliğinizi ve Sırrınızı yapılandırın. Yapılandırıldıktan sonra Paypal üzerinden hem rezervasyon hem de fatura ödemelerini alabileceksiniz.");

jr_define('PAYPAL_API_CLIENTID',"Müşteri Kimliği");
jr_define('PAYPAL_API_SECRET',"Gizli");
jr_define('PAYPAL_API_CLIENTID_SANDBOX',"Korumalı Alan İstemci Kimliği");
jr_define('PAYPAL_API_SECRET_SANDBOX',"Sandbox Secret");

jr_define('PAYPAL_API_CLIENTID_FINDING',"Müşteri Kimliğinizi ve Sırrınızı nasıl buluyorsunuz?");

jr_define('PAYPAL_API_CLIENTID_STEP1','https://developer.paypal.com/ adresine gidin ve Oturum Açın.');
jr_define('PAYPAL_API_CLIENTID_STEP2',"Yan menüden Uygulamalarım ve kimlik bilgilerine gidin.");
jr_define('PAYPAL_API_CLIENTID_STEP3',"Yeni bir Uygulama oluşturmak için Uygulama Oluştur'a tıklayın");
jr_define('PAYPAL_API_CLIENTID_STEP4',"Uygulamanıza bir ad verin, ardından Uygulama Oluştur'a tıklayın.");
jr_define('PAYPAL_API_CLIENTID_STEP5',"Bu sayfada Müşteri Kimliğinizi ve Sırrınızı görebilirsiniz. Bu anahtarları yukarıdaki ilgili alanlara kopyalayıp yapıştırın.");