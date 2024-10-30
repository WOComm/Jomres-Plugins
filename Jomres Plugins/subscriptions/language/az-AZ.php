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
jr_define('_SUBSCRIPTIONS_ACTIVE',"Aktiv");
jr_define('_SUBSCRIPTIONS_EXPIRED',"Aktiv deyil");
jr_define('_SUBSCRIPTIONS_HPAYMENT_STATUS',"Ödəniş statusu");
jr_define('_SUBSCRIPTIONS_HSUBSCRIPTION_LEVEL',"Səviyyə");
jr_define('_SUBSCRIPTIONS_EDIT_TITLE',"Abunəliyi redaktə et");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_TITLE',"Abunəlik müddətinin bitməsini xatırladan e-poçt göndərilsinmi?");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_DAYS_A', "Xatırlatma e-poçtu göndər");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_DAYS_B',"abunəliyin bitməsinə günlər qalmış");
jr_define('_SUBSCRIPTIONS_SEND_EXPIRATION_EMAIL_TITLE',"Abunəlik müddəti bitdikdə e-poçt göndərilsin?");
jr_define('_SUBSCRIPTIONS_MY',"Abunələrim");
jr_define('_SUBSCRIPTIONS_HRENEW',"Yenilə");
jr_define('_SUBSCRIPTIONS_HRENEWAL',"Abunəliyin yenilənməsi");
jr_define('_SUBSCRIPTIONS_HALREADY_SUBSCRIBED',"Artıq abunə olmusunuz, lütfən, əvəzində yeniləməni alın.");
jr_define('_SUBSCRIPTIONS_HEDIT',"Abunə paketini redaktə et");
jr_define('_SUBSCRIPTIONS_USERID_DESC',"İstifadəçi adının ilk bir neçə hərfini yazın və istifadəçi adları ilə açılan menyunu görəcəksiniz. Onu seçmək üçün istifadəçi adına klikləyin.");
jr_define('_SUBSCRIPTIONS_PACKAGE_NO_LOGER_PUBLISHED',"Bu abunəlik paketi artıq mövcud deyil, ona görə də onu yeniləmək mümkün deyil, lütfən, onu təkmilləşdirməyi düşünün.");
jr_define('_SUBSCRIPTIONS_NOT_SUBSCRIBED_TO_PACKAGE_ID',"Siz bu paketə abunə deyilsiniz, ona görə də onu yeniləyə bilməzsiniz.");
jr_define('_SUBSCRIPTIONS_NO_RENEWAL_OPTIONS_FOR_PACKAGE',"Bu paket üçün yenilənmə variantları yoxdur");
jr_define('_SUBSCRIPTIONS_CANCEL',"Abunəliyi ləğv et");
jr_define('_SUBSCRIPTIONS_HFREQUENCY_DAYS',"Tezlik (günlər)");
jr_define('_SUBSCRIPTIONS_HFREQUENCY_DAYS_DESC',"Abunəlik müddəti günlərlə");
jr_define('_SUBSCRIPTIONS_HRENEWAL_NOTALLOWED',"Bu paket üçün yeniləmələrə icazə verilmir.");
jr_define('_SUBSCRIPTIONS_HRENEWAL_PRICE',"Yeniləmə qiyməti");
jr_define('_SUBSCRIPTIONS_HRENEWAL_PRICE_EXPL',"Bu paketin yenilənməsini söndürmək üçün bunu 0-a təyin edin və ya yeniləmə üçün qiymət daxil edin");
jr_define('_SUBSCRIPTIONS_HPACKAGE_FEATURES',"Paket seçimləri");
jr_define('_SUBSCRIPTIONS_HPACKAGE_DETAILS',"Paket təfərrüatları");
jr_define('_SUBSCRIPTIONS_HPACKAGE_YOUR',"Abunəlik paketiniz");
jr_define('_SUBSCRIPTIONS_HACCESS_TO_FEATURE_NOTALLOWED',"Abunəlik paketinizə bu funksiyaya giriş daxil deyil. Bu funksiyadan istifadə etmək üçün abunəliyinizi təkmilləşdirməli olacaqsınız.");
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TEXT1', "Abunəliyiniz başa çatıb və bütün elanlarınız dərc edilib. Siyahılarınız artıq qonaqlara görünmür və siz daha bizim vebsaytımızdan onlayn sifarişlər ala bilməyəcəksiniz. Xidmətlərimizdən istifadə etməyə davam etmək üçün dərc edin. elanlarınızı əldə edin və onlayn rezervasiyalar almağa başlayın, lütfən hesabınıza daxil olun və yeniləməni alın." );
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE1',"Abunəliyiniz" );
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE2',"müddəti bitdi" );
jr_define( '_JRPORTAL_SUBSCRIPTION_REMINDER_EMAIL_TEXT1',"Bu, abunəliyiniz tezliklə bitəcəyini bildirmək üçün göndərilmiş bildirişdir. Xidmətlərimizdən istifadə etməyə davam etmək üçün hesabınıza daxil olun və yeniləmə əldə edin." );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_TITLE',"Abunəlik paketləri" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_NAME',"Ad" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_DESCRIPTION',"Təsvir" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PUBLISHED',"Nəşr olundu");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_REQUENCY',"Tezlik" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FULLAMOUNT',"Qiymət" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PROPERTYLIMIT',"Biznes limiti" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PROPERTYLIMIT_DESC',"Bu abunə paketi ilə əlavə edilə bilən bizneslərin maksimum sayı" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_SUBSCRIBE',"Abunə ol" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_USE', "Abunə ilə işləmə funksiyasından istifadə edin" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_SUBSCRIBING_ERROR_NOPACKAGEID',"Bağışlayın, lakin bu paket ID-si tanınmayıb." );
jr_define( '_JRPORTAL_INVOICES_SUBSCRIPTION_PROFILE_ERROR_EXPL',"Siz hələ hesab məlumatlarınızı doldurmamısınız. Saytda əmlakınızı siyahıya salmaq üçün daha irəli getməzdən əvvəl sizdən hesab məlumatlarınızı tamamlamağınız lazımdır." );
jr_define( '_JRPORTAL_SUBSCRIPTION_ALLSLOTSUSED',"Abunəlik paketinizdə mövcud olan bütün əmlak yuvalarından istifadə etmisiniz, ona görə də heç bir yeni siyahı yarada bilməyəcəksiniz. Daha çox siyahı yaratmaq istəyirsinizsə, paketinizi təkmilləşdirin." );
jr_define('_JOMRES_CHART_SUBSCRIPTIONS_DESC',"İl/ay üzrə gəlir");
jr_define('_SUBSCRIPTION_WARNING',"Abunəlikləri aktiv etmisiniz, lakin görünür ki, hələ heç bir abunə paketi yaratmamısınız. Ən azı bir abunə paketi yaradılana qədər sahiblər saytınızda mülkləri qeydiyyatdan keçirə bilməyəcəklər.");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_APIACCESS',"API Access" );


	jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE_SUBSCRIPTION_1',"Siz bu xüsusiyyətə keçidi təkmilləşdirməklə əldə edə bilərsiniz " );
	jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE_SUBSCRIPTION_2'," Abunəlik Paketi. " );
	jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE', 'Təkmilləşdirin');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_ALREADY_SUBSCRIBED', 'Abunə Olunmuş');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_GATEWAY_SETTINGS', 'Abunəlik şlüz parametrləri');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_NOT_SUBSCRIBED', 'Hazırda heç bir abunə paketinə abunə deyilsiniz. Xidmətlərimizdən istifadə etməyə davam etmək üçün paketə abunə olun.');