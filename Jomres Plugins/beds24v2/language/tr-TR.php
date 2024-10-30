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
jr_define('BEDS24V2_CHANNEL_MANAGEMENT', 'Kanal Yönetimi (Beds24)');

jr_define('BEDS24V2_WEBHOOKS_AUTH_METHOD', 'Beds24');
jr_define( 'BEDS24V2_WEBHOOKS_AUTH_METHOD_NOTES', 'Beds24 hesabınız varsa ve rezervasyonunuz olduğunda Beds24\'ü güncellemek istiyorsanız, lütfen bu seçeneği seçin. URL\'yi https://www.beds24.com/api/json/ olarak ayarlayın ');
jr_define( 'BEDS24V2_ERROR_USER_NO_KEY', 'Bu kullanıcının ayarlanmış bir API anahtarı yok, bu yüzden devam edemez. Lütfen Kullanıcı Yönetimi > Mülk Yöneticileri sayfasındaki sayfalarını ziyaret edin ve o sayfada sağlanan bağlantıyı kullanarak onlar için yeni bir API anahtarı oluşturun.' );
jr_define( 'BEDS24V2_ERROR_USER_NO_PROPERTIES', 'Bu kullanıcının Beds24 özelliklerine atayabileceği bir Jomres özelliği yok veya tam tersi');
jr_define( 'BEDS24V2_NOT_SUBSCRIBED', "Giriş yaptığınız yöneticinin Beds24'te bir hesabı yok gibi görünüyor, bu nedenle önce onların hizmetine kaydolmanız, ardından bu API anahtarını <a href='https://www.beds24.com/control2.php?pagetype=accountpassword' target='_blank'>Beds24'ün web sitesi burada.</a>" );
jr_define( 'BEDS24V2_NOT_SUBSCRIBED_KEY', "Devam etmek için bu API anahtarını kopyalayıp Beds24 hesabınızdaki LINK alanına yapıştırın." );
jr_define('BEDS24V2_NOT_SUBSCRIBED_RELOAD', "Bunu yaptıktan sonra devam etmek için lütfen aşağıdaki butona tıklayın.");
jr_define('BEDS24V2_DISPLAY_PROPERTIES_TITLE', "Beds24 mülk bağlantısı");
jr_define( 'BEDS24V2_DISPLAY_PROPERTIES_INFO', "Bu sayfa, bu sistemde erişiminiz olan özelliklerin yanı sıra Kanal Yöneticisi'nde bulunan özellikleri görüntülemenizi sağlar. Ayrıca Kanal Yöneticisi'nden bu sisteme özellikleri içe aktarmanıza veya dışa aktarmanıza olanak tanır. <br/> Hem bu sistemde hem de Beds24'te mülkleriniz varsa ve bunları birbirine bağlamak istiyorsanız, bunu yapmak için Özellik apikeyini kullanabilirsiniz. Açılır menüde seçilen özellik, bağlamak istediğiniz ile aynıdır) ardından Bağlantı alt menüsünde Beds24'teki 'propKey' alanına 'Property apikey'i kaydedin.Bunu yaptıktan sonra sayfayı yeniden yükleyin.Bu sistem iki özelliğin aynı anahtarla ilişkili olduğunu görün ve gerekli ilişkilendirmeleri oluşturun.İki özellik bağlandıktan sonra, Mülkü Görüntüle sayfasını ziyaret etmeyi unutmayın, bildirim url'sini bulun ve bunu Bağlantı sayfasının 'Url'ye Bildir' alanına yapıştırın. bu olacak Beds24'ün rezervasyonları aldığında bu tesisle rezervasyonları senkronize etmek için doğru bağlantıyı kullandığından emin olun. ");
jr_define( 'BEDS24V2_DISPLAY_PROPERTIES_NO_PROPERTIES', "Hata : Beds24'te bağlanabileceğiniz bir mülk yok. Bunun nedeni, haklarına sahip olduğunuz tüm mülklerin bu sistemdeki başka bir hesaba bağlanmış olması olabilir." );
jr_define('BEDS24V2_DISPLAY_PROPERTIES_PROPERTY_UID', "Mülkiyet uid");
jr_define('BEDS24V2_DISPLAY_PROPERTIES_PROPERTY_NAME', "Mülk adı");
jr_define('BEDS24V2_DISPLAY_PROPERTIES_BEDS24_PROPERTY_UID', "Beds24 Özellik Uid");
jr_define('BEDS24V2_DISPLAY_PROPERTIES_BEDS24_PROPERTY_NAME', "Beds24 Mülk adı");
jr_define('BEDS24V2_DISPLAY_PROPERTY_APIKEY', "Özellik apikey");
jr_define('BEDS24_LISTPROPERTIES_IMPORT', "İçe Aktar");
jr_define('BEDS24_LISTPROPERTIES_ASSOCIATE_ROOM_TYPES', "Oda tiplerini yapılandırın");
jr_define('BEDS24_LISTPROPERTIES_ASSOCIATE_ROOM_TYPES_DESC', "Buradan Beds24 hesabınızdaki oda tiplerini bu sistemde kayıtlı olanlarla ilişkilendirmeniz gerekiyor.");
jr_define('_BEDS24_DISPLAY_BOOKINGS_JOMRESROOMS_BEDS24TYPENAME', "Beds24 oda tipi");

jr_define('BEDS24_LISTPROPERTIES_IMPORT_CANNOT_NOAPIKEY', "Özellik Bağlantısı sayfasında Özellik Anahtarını ayarlamadığınız için bu özellik henüz içe aktarılamıyor.");
jr_define('BEDS24_LISTPROPERTIES_IMPORT_CANNOT_NOROOMS', "Bu mülk henüz odası olmadığı için içe aktarılamıyor. Lütfen bir veya daha fazla oda oluşturun (Beds24'teki odalar Jomres'teki oda tipleriyle aynıdır) ve minimum fiyatı belirlemeyi unutmayın Bunu yaptıktan sonra oda tipini Jomres'e aktarabilir ve mevcut Jomres oda tipleri ile ilişkilendirebilirsiniz.Bundan sonra tarifeleri değiştirebileceksiniz, ancak bir minimum fiyat belirlemeniz gerekiyor.");
jr_define('_BEDS24_SUGGESTED_KEY', "Bu API Anahtarını kullanmanızı öneririz. Bunu yaptıktan sonra bu sayfayı yeniden yükleyin.");
jr_define('BEDS24_LISTPROPERTIES_EXPORT', "Dışa Aktar");
jr_define( 'BEDS24V2_REST_API_INTRO', "Burada REST API anahtar çiftinizi ve API'ye giden yolu görebilirsiniz. Bu ayrıntıları Beds24'teki hesabınıza kaydederseniz Beds24 24, API'si aracılığıyla bu siteyle iletişim kurabilir.");
jr_define('BEDS24V2_REST_API_CLIENT_ID', "Müşteri Kimliği");
jr_define('BEDS24V2_REST_API_CLIENT_SECRET', "Müşteri Sırrı");
jr_define('BEDS24V2_REST_API_ENDPOINT', "URI (uç nokta)");
jr_define('BEDS24_LISTPROPERTIES_CONFIGURE', "Özelliği görüntüle");
jr_define('BEDS24_ROOM_TYPES_TITLE', "Oda tipi ilişkilendirmeleri");

jr_define('BEDS24_ROOM_TYPES_INFO', "Bu sayfa, oda tiplerinizi Beds24 sunucularında kayıtlı olanlarla ilişkilendirmenizi sağlar.");
jr_define('BEDS24_ROOM_TYPES_INFO2', "Oda tipleri birbirine bağlanana kadar Beds24 tarafından gönderilen rezervasyon bilgilerini alamazsınız. Tesisiniz Beds24'e veya Beds24'ten içeri/dışa aktarılmışsa, sizin için otomatik olarak bağlantılar oluşturduk, ancak bir oda tipini yenileyin veya birini silin, o zaman bu sayfa oda tipinin doğru şekilde ilişkilendirildiğinden emin olmak için kullanılabilir.");
jr_define('BEDS24_ROOM_TYPES_INFO3', "Bu sistemdeki oda tipleriyle ilişkilendirmek istediğiniz Beds24 oda tiplerini seçiniz ve bitince Kaydet'e tıklayarak değişiklikleri Beds24'e güncelleyiniz.");
jr_define('BEDS24_ROOM_TYPES_YOURS', "Oda tipleriniz");
jr_define('BEDS24_ROOM_TYPES_BEDS24', "Beds24 oda tipleri");
jr_define('BEDS24_ROOM_TYPES_NONE', "Bu tesiste herhangi bir oda tipi olmadığı için herhangi bir Beds24 oda tipine bağlanamaz. Beds24'ten oda tiplerini aktarmak ister misiniz?");
jr_define('BEDS24_IMPORT_ROOMS', "Odaları içe aktar");
jr_define('BEDS24_EXPORT_BOOKINGS', "İhracat rezervasyonları");
jr_define('BEDS24_IMPORT_BOOKINGS', "Rezervasyonları içe aktar");
jr_define('BEDS24_IMPORT_EXPORT', "Bir düğmeye tıklayarak Beds24'ten mevcut rezervasyonları içe ve dışa aktarabilirsiniz. Beds24'ten içe aktarılan rezervasyonlar dünden içe aktarılır ve bir sonraki yılın tüm rezervasyonlarını içerecektir. Bu düğmeleri yalnızca daha sonra kullanmalısınız. önce mülkün sisteme alınması veya dışa aktarılması. Kurulum yapıldıktan sonra içe aktarma ve/veya dışa aktarma otomatik olarak yapılacaktır.");
jr_define('_BEDS24_CHANNEL_MANAGEMENT_UPDATE_PRICING_YESNO', "Fiyatlar Beds24 olarak güncellensin mi?");
jr_define('_BEDS24_CHANNEL_MANAGEMENT_UPDATE_PRICING_YESNO_DESC', "Beds24'ü yalnızca müsaitlik veya hem müsaitlik hem de fiyatlar ile güncellemeyi seçebilirsiniz. Belirli kanallar için belirli fiyatlar ayarlamak için Beds24 kontrol panelini kullanmak istediğiniz belirli durumlar varsa, bu ayarı bırakmalısınız. Numara.");
jr_define('_BEDS24_CONTROL_PANEL_DIRECT', "Doğrudan bağlantı");
jr_define('BEDS24_IMPORT_NOTIFICATION_URLS', "Bu mülkü Jomres'e aktardıysanız, Beds24 -> Mülk -> Bağlantı ayarlarınızdaki Bildir URL'sini manuel olarak aşağıdaki şekilde değiştirmeniz gerekecektir :");
jr_define('BEDS24V2_ERROR_KEYS_SHOULD_BE_REGENERATED', "Şu anda Beds24 özellikleriyle ilişkili herhangi bir mülkünüz yok. Yöneticilerinizin Beds24 ile bağlantı kurmasına izin vermeden önce yöneticinizin API anahtarlarını sıfırlamanız gerekir. Bu, hepsinin benzersiz anahtarlara sahip olmasını sağlayacaktır.");
jr_define('BEDS24V2_ERROR_KEYS_REBUILD', "Yönetici API anahtarlarını şimdi sıfırlayın");
jr_define('BEDS24V2_ERROR_KEYS_DISMISS', "Uyarıyı yoksay");
jr_define('BEDS24V2_ERROR_KEYS_DONE', "Yönetici API anahtarları sıfırlandı");

jr_define('BEDS24V2_ADMINISTRATOR_LINKS_TITLE', "Beds24 mülk bağlantıları");
jr_define('BEDS24_ASSIGN_MANAGER', "Beds24 Değişim Yöneticisi");
jr_define('BEDS24_ASSIGN_MANAGER_DESC', "Bir yönetici ön uçta Kanal Yönetimi (Bed24) sayfasını görüntülediğinde, hem Jomres hem de Beds24'te bir API anahtarını paylaşan tüm özellikler Jomres içinde otomatik olarak bağlanır. Aynı şekilde yönetici tarafından içe veya dışa aktarılan tüm özellikler Bu sayfadaki yönetici açılır menüsünü değiştirip Kaydet'i tıklayarak bir mülkün bağlı olduğu yöneticiyi değiştirebilirsiniz.");
jr_define('BEDS24V2_TARIFFS_TITLE', "Tarife ihracat");
jr_define( 'BEDS24V2_TARIFF_EXPORT_DESC', "Beds24'e oluşturduğunuz tarifeleri belirli bir günlük tarifeye aktarabilirsiniz. Bu özelliği kullanacaksanız Emlak Konfigürasyonunda 'Fiyatları Beds24'e Güncelle?' seçeneğini Hayır olarak ayarlamalısınız. Beds24 kontrol panelinde birden fazla günlük tarifeye sahip olabilmeniz için mülkünüzü de yapılandırmanız gerekebilir.Bunu yapmak için Ayarlar > Özellikler > Odalar > Günlük fiyatlar'a gidin ve 'Günlük Fiyat Sayısı'nı istediğiniz fiyat sayısına ayarlayın. . Bunu yaptıktan sonra, o günlük oranı ayarlamak için P düğmelerinden birine tıklayabileceksiniz." );
jr_define('BEDS24V2_TARIFF_EXPORT_TARIFFNAME', "Tarife adı");
jr_define('BEDS24V2_TARIFF_EXPORT_TARIFF_ROOM_TYPE', "Oda tipi");
jr_define('BEDS24V2_BOOKING_RESEND', "Bildirimi tekrar gönder");
jr_define( 'BEDS24V2_BOOKING_DATA_AT_B24', "Bu, Beds24'te saklanan rezervasyon bilgisidir. Verilerin yanlış olduğundan emin değilseniz, rezervasyonu yeniden Beds24'e göndermeniz gerekmez.");
jr_define( 'BEDS24V2_BOOKING_NO_DATA_AT_B24', "Bu rezervasyon Beds24'teki bir rezervasyonla ilişkili görünmüyor. Bu rezervasyonu bed24'e aktarmak için Yeniden Gönder düğmesini kullanabilirsiniz." );

jr_define('BEDS24V2_GDPR_ANONYMISE_GUESTS', "Misafirleri anonimleştirilsin mi?");
jr_define( 'BEDS24V2_GDPR_ANONYMISE_GUESTS_DESC', "Rezervasyonlar kanal yöneticisine gönderildiğinde konuk bilgilerini anonimleştirmenizi öneririz. Bu seçeneği evet olarak ayarlarsanız, rezervasyon bilgileri kanal yöneticisine gönderildiğinde konuk adı, e-posta adresi değil OTA'lar, gereğinden fazla bilgi paylaşmanıza gerek kalmadan, uygunluk durumunuzun doğru bir kaydına sahip olacaktır. Bu, GDPR ile uyumlu olduğunuz anlamına gelir, çünkü misafirin daha sonra bu sistemdeki ayrıntılarını silmeyi seçmesi durumunda (bu durumda size bildirilmez). olursa) bilgileriniz üzerinde kontrolünüz olmayan diğer veri sorumlularına bırakılmaz.Gerektiğinde bu sistemdeki rezervasyonlar ile kanal yöneticisindekiler arasında çapraz referans yapabilirsiniz, Rezervasyon Detayları sayfası size rezervasyon numarasını gösterecektir. bu rezervasyon, kanal yöneticisinde saklandığı şekliyle." );
jr_define('BEDS24V2_MASTER_APIKEY', "DENEYSEL ÖZELLİK - Master Beds24 API anahtarı");
jr_define( 'BEDS24V2_MASTER_APIKEY_DESC', "ÖZELLİKLERİ BEDS24 İLE BAĞLANTILI JOMRES'İN ZATEN KURULUMU VARSA BURADAKİ AÇIKLAMANIN TÜMÜNÜ OKUYUN. Beds24'e güvenli bir şekilde gidiş geliş mülkler. Bu ayar, tüm mülkler için tek bir API anahtarına sahip olarak bu işlevi geçersiz kılmanıza olanak tanır. Bu, Beds24'te yalnızca bir hesaba ihtiyacınız olduğu anlamına gelir, ancak aynı zamanda tüm ücretlerin o hesap tarafından tahakkuk ettirileceği anlamına gelir. Bir mülke erişimi olan herhangi bir yönetici, bed24 sunucularındaki mülke güncellemeler gönderebilir. Bu ayarı yok saymak ve mülk yöneticilerini kendi Beds24 hesaplarını kullanmaya zorlamak için boş bırakın. API anahtarı istediğiniz herhangi bir biçimde olabilir, çok uzun süre buradaki anahtar, <a href='https://www.beds24.com/control2.php?pagetype=accountpassword' target='_blank'><em>API Anahtarı 1</em> </em> içindeki anahtarla eşleştiğinden a> alanı ZATEN KURULUMUNUZ VARSA ON OF ÖZELLİKLERİ BEDS24'E BAĞLANTILI : Bu özelliği kullanmaya geçebilirsiniz, ancak önce bu tabloları kısaltmanız (boşaltmanız), Jomres'te bulunan mevcut özellikleri silmeniz ve ardından özellikleri yeniden içe aktarmanız gerekir. Beds24'ten Jomres'e. XXXXX_jomres_beds24_contract_booking_number_xref , XXXXX_jomres_beds24_property_uid_xref , XXXXX_jomres_beds24_rest_api_key_xref , XXXXX_jomres_beds24_room_type_xref. <br/> <br/> Beds24'ün Hesap Erişimi sayfasının <em>API Anahtarı N</em> bölümünde API anahtarınızı ayarlarken, <em>API Anahtar Erişimi</em> alanını ' olarak ayarlamanız çok önemlidir. Yalnızca beyaz liste IP'sine izin ver' ve IP numarasını <strong>".$this_servers_ip_number ."</strong> olarak ayarlarsınız. Bu, buradaki ana API anahtarı yapılandırması için ve bir mülk yöneticisi kendi bireysel API'sini yapılandırıyorsa ön uç için aynı şekilde geçerlidir. anahtarlar." );
jr_define( 'BEDS24V2_WHITELIST_WARNING', "Tesisleriniz Beds24'e zaten bağlıysa, Beds24'ün yakın zamanda hesabınıza bağlanan tüm sunucuların beyaz listeye alınmasını gerektiren bir politika getirdiğini unutmayın. Bunu Hesap Erişimi sayfasından yapabilirsiniz. Erişim anahtarınız girildi. Beyaz Liste IP açılır menüsünü seçin ve IP numarasını " );

