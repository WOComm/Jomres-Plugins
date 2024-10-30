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

jr_define('_OAUTH_SCOPE_CHANNEL_MANAGEMENT',"Kanal Yönetimi");
jr_define('_OAUTH_SCOPE_CHANNEL_MANAGEMENT_DESC',"Müşteri Kanal Yönetimi faaliyetlerini gerçekleştirebilir. Not, bu müşteriye hesaplarınızı ve mülklerinizi değiştirmesi için sistemde önemli bir güç verir.");

jr_define('_OAUTH_SCOPE_CHANNEL_MANAGEMENT_CLEANING_PRICE',"Temizlik");

jr_define('_CMF_CANCELLED_BOOKING',"Kanal yöneticisi rezervasyonu iptal etti");

jr_define('_CMF_CLEANING_STRING',"Temizlik"); // Zaten içe aktardığınız özellikler varsa bunu değiştirmeyin. Temizlik ücreti olan mülklerde bu isimde bir Ekstra vardır.
jr_define('_CMF_SECURITY_STRING',"Güvenlik depozitosu"); // Zaten içe aktardığınız özellikler varsa bunu değiştirmeyin. Depozitolu mülklerin bu isimde bir Ekstrası vardır.


jr_define('_CMF_API_PRIVACY',"API Gizliliği");
jr_define('_CMF_API_PRIVACY_ON',"Gizlilik açık");
jr_define('_CMF_API_PRIVACY_OFF',"Gizlilik kapalı");

jr_define('_CMF_API_PRIVACY_DESC',"Bir mülkün bilgileri yalnızca onu oluşturan kanal tarafından görülebilir. Örneğin, hem Kanal A hem de Kanal B'ye farklı API anahtar çiftleri verdiyseniz, Kanal A tarafından oluşturulan bir özelliğin bilgileri görüntülenemez. Tüm kanalların API aracılığıyla mülkün tüm bilgilerini görmesine izin vermek için API Gizliliğini kapatmadığınız sürece Kanal B tarafından görülemez... Bu mülkü mülkü listelemek isteyen başka bir siteyle paylaşıyorsanız API Gizliliğini Kapalı olarak ayarlayın. Bu özelliği başka sitelerle paylaşmıyorsanız, API Gizliliğini Açık olarak bırakın.");
