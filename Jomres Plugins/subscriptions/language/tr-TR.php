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

jr_define('_SUBSCRIPTIONS_ACTIVE',"Aktif");
jr_define('_SUBSCRIPTIONS_EXPIRED',"Aktif değil");
jr_define('_SUBSCRIPTIONS_HPAYMENT_STATUS',"Ödeme durumu");
jr_define('_SUBSCRIPTIONS_HSUBSCRIPTION_LEVEL',"Seviye");
jr_define('_SUBSCRIPTIONS_EDIT_TITLE',"Aboneliği düzenle");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_TITLE',"Abonelik sona erme hatırlatma e-postası gönderilsin mi?");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_DAYS_A',"Hatırlatma e-postası gönder");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_DAYS_B',"aboneliğin sona ermesine günler kala");
jr_define('_SUBSCRIPTIONS_SEND_EXPIRATION_EMAIL_TITLE',"Abonelik süresi dolduğunda e-posta gönderilsin mi?");
jr_define('_SUBSCRIPTIONS_MY',"Aboneliklerim");
jr_define('_SUBSCRIPTIONS_HRENEW',"Yenile");
jr_define('_SUBSCRIPTIONS_HRENEWAL',"Abonelik yenileme");
jr_define('_SUBSCRIPTIONS_HALREADY_SUBSCRIBED',"Zaten abone oldunuz, lütfen bunun yerine bir yenileme satın alın.");
jr_define('_SUBSCRIPTIONS_HEDIT',"Abonelik paketini düzenle");
jr_define('_SUBSCRIPTIONS_USERID_DESC',"Kullanıcı adının ilk birkaç harfini yazın, kullanıcı adlarını içeren bir açılır menü göreceksiniz. Seçmek için bir kullanıcı adını tıklayın.");
jr_define('_SUBSCRIPTIONS_PACKAGE_NO_LOGER_PUBLISHED',"Bu abonelik paketi artık mevcut olmadığından yenilenemez, lütfen yükseltmeyi düşünün.");
jr_define('_SUBSCRIPTIONS_NOT_SUBSCRIBED_TO_PACKAGE_ID',"Bu pakete abone olmadığınız için yenileyemezsiniz.");
jr_define('_SUBSCRIPTIONS_NO_RENEWAL_OPTIONS_FOR_PACKAGE',"Bu paket için yenileme seçeneği yok");
jr_define('_SUBSCRIPTIONS_CANCEL',"Aboneliği iptal et");
jr_define('_SUBSCRIPTIONS_HFREQUENCY_DAYS',"Sıklık (gün)");
jr_define('_SUBSCRIPTIONS_HFREQUENCY_DAYS_DESC',"Abonelik süresi gün olarak");
jr_define('_SUBSCRIPTIONS_HRENEWAL_NOTALLOWED',"Bu paket için yenilenmeye izin verilmez.");
jr_define('_SUBSCRIPTIONS_HRENEWAL_PRICE',"Yenileme fiyatı");
jr_define('_SUBSCRIPTIONS_HRENEWAL_PRICE_EXPL',"Bu paket için yenilemeleri devre dışı bırakmak veya yenileme için bir fiyat girmek için bunu 0 olarak ayarlayın");
jr_define('_SUBSCRIPTIONS_HPACKAGE_FEATURES',"Paket seçenekleri");
jr_define('_SUBSCRIPTIONS_HPACKAGE_DETAILS',"Paket detayları");
jr_define('_SUBSCRIPTIONS_HPACKAGE_YOUR',"Abonelik paketiniz");
jr_define('_SUBSCRIPTIONS_HACCESS_TO_FEATURE_NOTALLOWED',"Abonelik paketiniz bu özelliğe erişim içermiyor. Bu özelliği kullanmak için aboneliğinizi yükseltmeniz gerekir.");
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TEXT1', "Aboneliğinizin süresi doldu ve tüm kayıtlarınız yayından kaldırıldı. Kayıtlarınız artık misafirler tarafından görülemez ve artık web sitemizden online rezervasyon alamayacaksınız. Hizmetlerimizi kullanmaya devam etmek için yayınla ilanlarınızı ve online rezervasyon almaya başlayın, lütfen hesabınıza giriş yapın ve bir yenileme satın alın." );
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE1',"Aboneliğinizin adresi");
jr_define('_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE2',"süresi doldu");
jr_define( '_JRPORTAL_SUBSCRIPTION_REMINDER_EMAIL_TEXT1',"Bu, aboneliğinizin yakında sona ereceğini bildirmek için bir bildirimdir. Hizmetlerimizi kullanmaya devam etmek için lütfen hesabınıza giriş yapın ve bir yenileme satın alın." );
jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_TITLE',"Abonelik paketleri");
jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_NAME',"Ad" );
jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_DESCRIPTION',"Açıklama");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PUBLISHED',"Yayınlandı");
jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FREQUENCY',"Sıklık");
jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FULLAMOUNT',"Fiyat");
jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PROPERTYLIMIT',"İş limiti");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PROPERTYLIMIT_DESC',"Bu abonelik paketi ile eklenebilecek maksimum işletme sayısı");
jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_SUBSCRIBE',"Abone Ol");
jr_define('_JRPORTAL_SUBSCRIPTIONS_USE', "Abonelik işleme işlevini kullanın");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_SUBSCRIBING_ERROR_NOPACKAGEID',"Üzgünüz, ancak bu paket kimliği tanınmadı." );
jr_define( '_JRPORTAL_INVOICES_SUBSCRIPTION_PROFILE_ERROR_EXPL',"Henüz hesap bilgilerinizi girmemişsiniz. Mülkünüzü sitede listelemek için, daha ileri gitmeden önce hesap bilgilerinizi tamamlamanız gerekiyor." );
jr_define( '_JRPORTAL_SUBSCRIPTION_ALLSLOTSUSED',"Abonelik paketinizdeki tüm mülk alanlarını kullandınız, bu nedenle yeni liste oluşturamayacaksınız. Daha fazla liste oluşturmak istiyorsanız lütfen paketinizi yükseltin." );
jr_define('_JOMRES_CHART_SUBSCRIPTIONS_DESC',"Yıl/ay bazında gelir");
jr_define('_SUBSCRIPTION_WARNING',"Abonelikleri etkinleştirdiniz ancak henüz herhangi bir abonelik paketi oluşturmamışsınız gibi görünüyor. Sahipler, en az bir abonelik paketi oluşturulana kadar sitenizdeki mülkleri kaydedemeyecek.");
jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_APIACCESS',"API Erişimi");

	jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE_SUBSCRIPTION_1',"Bu özelliğe yükselterek bu özelliğe erişebilirsiniz " );
	jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE_SUBSCRIPTION_2'," Abonelik Paketi. " );
	jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE', 'Yükselt');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_ALREADY_SUBSCRIBED', 'Abone oldum');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_GATEWAY_SETTINGS', 'Abonelik ağ geçidi ayarları');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_NOT_SUBSCRIBED', 'Şu anda herhangi bir abonelik paketine abone değilsiniz. Hizmetlerimizi kullanmaya devam etmek için lütfen bir pakete abone olun.');
