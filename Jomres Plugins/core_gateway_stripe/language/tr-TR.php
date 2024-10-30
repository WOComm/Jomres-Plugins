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

jr_define('STRIPE_TITLE',"Şerit");
jr_define('STRIPE_CONNECT_CONFIG_INFO',"Bu Stripe ağ geçidi, site yöneticisi olarak rezervasyon sırasında Mülk Yöneticilerine yapılan ödemelerin bir kısmını almanıza izin vermek için özel olarak tasarlanmıştır. Kullanılabilmesi için önce Stripe ile kendi entegrasyonunuzu kurmanız gerekir. Bağlan. <a href='http://www.jomres.net/manual/site-managers-guide/23-control-panel/payment-methods/340-core-gateway-stripe' target='_blank' class= 'btn btn-primary'>Bu eklentinin belgelerini burada bulabilirsiniz.</a><br/>Bu sayfada Kaydet'i tıklarsanız, bu eklentinin sorunsuz çalışmasını sağlamak için diğer tüm ağ geçitleri devre dışı bırakılır</a> güçlü Başlamadan önce, Stripe Connect sayfanıza gittiğinizden ve bir platform kurduğunuzu belirttiğinizden emin olun. Bu yapıldıktan sonra, hesabınızı kurmak için ekrandaki talimatları izleyin. Yöneticilerin hesaplarını sizinkiyle bağlayabilmesi için önce Ayarlar > Bağlantı Ayarları'nı ziyaret etmeli ve \"OAuth ayarları\" alanında Standart Hesaplar için OAuth etkinleştirilmiş olmalıdır ve ardından Kaydet'e tıklayın (bunu hem Test hem de Canlı modlarında yapmanız gerekeceğini unutmayın). ");

jr_define('STRIPE_REGISTER_CONNECT',"Bizimle bağlantı kurun!");
jr_define('STRIPE_REGISTER_CONNECT_BLURB',"Kayıt oldunuz, ancak bağlantı henüz tamamlanmadı. Stripe hesabınızı web sitemize bağlamanız gerekiyor. Bu yapıldıktan sonra, tüm mülklerinizi sitemize ekleyebilir ve rezervasyon almaya başlayabilirsiniz. .");

jr_define('STRIPE_REGISTER_WELCOME_EMAIL_TITLE',"Hoş Geldiniz ");
jr_define('STRIPE_REGISTER_WELCOME_EMAIL_BLURB',"Mülk(ler)inizi kurmaya başlamadan önce, bizi Stripe hesabınıza bağlamanız gerekir. Başlamak için bağlantıya tıklayın.");

jr_define('STRIPE_SETUP_INFO',"Artık hesabınızı bizimkine bağlamamız gerekiyor, bu sizin adınıza ödeme almamıza izin verecek, bu nedenle Bağlantıyı onaylayabileceğiniz Stripe'a gitmek için Bağlan düğmesine tıklayın.");
jr_define('STRIPE_SETUP_DONE',"Bizimle zaten bağlantınız var, burada yapacak başka bir şey yok! Bu pencereyi kapatın ve hadi iş yapma işine geçelim.");
jr_define('STRIPE_SETUP_THANKS',"Bizimle bağlantı kurduğunuz için teşekkür ederiz! Bu pencereyi şimdi kapatabilirsiniz.");
jr_define('STRIPE_SETUP_DISCONNECT',"Hesabınızın bağlantısını kesin.");
jr_define('STRIPE_SETUP_DISCONNECTED',"Hesabın bağlantısı kesildi, şimdi bu pencereyi kapatabilirsiniz.");

jr_define('STRIPE_CONNECT_SITE_CONFIG_CLIENT_ID',"Stripe Connect İstemci Kimliği");
jr_define('STRIPE_CONNECT_SITE_CONFIG_CLIENT_ID_DESC',"Stripe İstemci Kimliğinizi <a href='https://dashboard.stripe.com/account/applications/settings' target='_blank'>Dashboard > Settings > Connect API'nizden alabilirsiniz. tuşları, Geliştiriciler menü seçeneğinin altındadır.</a>");
jr_define('STRIPE_CONNECT_SITE_CONFIG_RETURN_URL',"Lütfen <a href='https://dashboard.stripe.com/account/applications/settings' target='_blank'>Bağlan > Ayarlar</a>'da Yönlendirme URI'nizi ayarladığınızdan emin olun. <br/> ");

jr_define('STRIPE_CONNECT_SITE_CONFIG_SECRET_KEY',"Gizli anahtar");
jr_define('STRIPE_CONNECT_SITE_CONFIG_PUBLIC_KEY',"Genel anahtar");

jr_define('STRIPE_CONNECT_SITE_CONFIG_COMMISSION',"Komisyonunuz");
jr_define('STRIPE_CONNECT_SITE_CONFIG_COMMISSION_DESC',"Bu komisyon, rezervasyon sırasında mülk yöneticisine gönderilen ödemeden alınır. Daha sonra Stripe tarafından Stripe hesabınıza yatırılır. <br/> Bu, mülk yöneticilerinden alacağınız komisyon yüzdesidir. Komisyonunuz, depozito değerine değil, rezervasyonun TÜM maliyetine göre ücretlendirilir.<br/> Bu değeri ne olarak ayarlarsanız yapın, Site Yapılandırması ->Rezervasyon Formu -> Minimum Depozito rakamını şu şekilde yapılandırmanızı öneririz. bu rakamın en az iki katı, yani %10 komisyon almak istiyorsanız Minimum Depozitoyu %20 yapmalısınız.");

jr_define('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_EURO',"Stripe Ücreti Avrupa");
jr_define('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_DESC',"Bu, Stripe'ın sitenizde ödeme yaptığınız için sizden aldığı yüzdedir. Şu anda Avrupa Kartları için %1,4 ve Avrupa dışı kartlar için %2,9. Bu rakam, rezervasyon sırasında fiyatları belirlemek ve ödeme süresi.");
jr_define('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_NONEURO',"Stripe Ücreti euro olmayan");

jr_define('STRIPE_PAYMENT_FORM_CREDITCARD',"Kart Numarası");
jr_define('STRIPE_PAYMENT_FORM_EXPIRATION',"Son kullanma (AA/YY)");
jr_define('STRIPE_PAYMENT_FORM_CVC',"CVC");
jr_define('STRIPE_PAYMENT_FORM_ZIP',"Fatura Postası");

jr_define('STRIPE_PAYMENT_FORM_SECURE',"Güvenli Ödeme Formu");
jr_define('STRIPE_PAYMENT_FORM_BILLINGDETAILS',"Fatura Ayrıntıları");
jr_define('STRIPE_PAYMENT_FORM_CARDDETAILS',"Kart Detayları");
jr_define('STRIPE_PAYMENT_FORM_HOLDER',"Kart Sahibinin Adı");
jr_define('STRIPE_PAYMENT_FORM_PAYNOW',"Şimdi ödeyin");
jr_define('STRIPE_PAYMENT_FORM_TOPAY',"Şimdi ödemek için");

jr_define('STRIPE_PAYMENT_FORM_VALIDATION_STREET_EMPTY','Sokak gerekli ve boş olamaz');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_LENGTH','Sokak 6 karakterden uzun ve 96 karakterden kısa olmalıdır');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CITY_EMPTY','Şehir gerekli ve boş olamaz');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_ZIP_EMPTY','Zip gerekli ve boş olamaz');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_ZIP_LENGTH','Zip 3 karakterden uzun ve 12 karakterden kısa olmalıdır');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_EMPTY','E-posta adresi gerekli ve boş bırakılamaz');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_INVALID','Girilen geçerli bir e-posta adresi değil');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_LENGTH','E-posta 6 karakterden uzun ve 65 karakterden kısa olmalıdır');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CARDHOLDER_EMPTY','Kart sahibinin adı gereklidir ve boş bırakılamaz');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CARDHOLDER_LENGTH','Kart sahibinin adı 6 karakterden uzun ve 70 karakterden kısa olmalıdır');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_EMPTY','Kredi kartı numarası gereklidir ve boş bırakılamaz');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_INVALID','Kredi kartı numarası geçersiz');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_MONTH_EMPTY','Son kullanma ayı gerekli');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_MONTH_DIGITS','Son kullanma ayı sadece rakam içerebilir');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_YEAR_EMPTY','Son kullanma yılı gerekli');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_YEAR_DIGITS','Son kullanma yılı sadece rakam içerebilir');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CCV_EMPTY','Cvv gereklidir ve boş olamaz');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CCV_INVALID','Değer geçerli bir CVV değil');

jr_define('STRIPE_PAYMENT_FAILED',"Üzgünüz, şu anda ödemenizi işleme koyamadık.");
jr_define('STRIPE_PAYMENT_TRY_AGAIN',"Lütfen tekrar deneyiniz");

jr_define('STRIPE_PAYMENT_ERROR_DECLINED',"Ödeme reddedildi.");
jr_define('STRIPE_PAYMENT_ERROR_RATE_LIMIT',"API'ye çok hızlı istek yapıldı");
jr_define('STRIPE_PAYMENT_ERROR_INVALID_PARAMETERS',"Stripe API'sine geçersiz parametreler sağlandı");
jr_define('STRIPE_PAYMENT_ERROR_AUTH_FAILED',"Stripe API'si ile kimlik doğrulama başarısız oldu");
jr_define('STRIPE_PAYMENT_ERROR_NETWORK_FAULT',"Stripe ile ağ iletişimi başarısız oldu (internet bağlantınız koptu mu?)");
jr_define('STRIPE_PAYMENT_ERROR_UNCAUGHT',"Yakalanmayan bir hata oluştu");