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

jr_define ('STRIPE_TITLE', "Zolaq");
jr_define ('STRIPE_CONNECT_CONFIG_INFO', "Bu Stripe şluzu, sayt meneceri olaraq sifariş zamanı Əmlak menecerlərinə edilən ödənişlərin bir hissəsini almağınıza imkan vermək üçün xüsusi olaraq hazırlanmışdır. İstifadə etməzdən əvvəl Stripe ilə öz inteqrasiyanızı qurmalısınız. Qoşulun. <a href = 'http://www.jomres.net/manual/site-managers-guide/23-control-panel/payment-methods/340-core-gateway-stripe' target='_blank' class = 'btn btn-primary'>  Bu plagin üçün sənədləri burada tapa bilərsiniz. </a> <br/> Bu səhifədə Saxla düyməsini tıklasanız, bu plaginin problemsiz işləməsini təmin etmək üçün  bütün digər keçidlər deaktiv ediləcək </ güclü> Başlamadan əvvəl, Stripe Connect səhifənizə getdiyinizə və bir platform qurduğunuza əmin olun. Bunu etdikdən sonra hesabınızı qurmaq üçün ekrandakı təlimatları izləyin. Menecerlər hesablarını sizinlə əlaqələndirmədən əvvəl Ayarlar> Bağlantı Ayarları və \"OAuth ayarları\" sahəsində Standart Hesablar üçün OAuth'u aktiv etməlisiniz və sonra Saxla düyməsini basın (qeyd edin, bunu həm Test, həm də Canlı rejimdə etməlisiniz). ");

jr_define ('STRIPE_REGISTER_CONNECT', "Bizimlə əlaqə saxlayın!");
jr_define ('STRIPE_REGISTER_CONNECT_BLURB', "Qeydiyyatdan keçdiniz, lakin əlaqə hələ tamamlanmadı. Stripe hesabınızı veb saytımıza bağlamalısınız. Bunu bitirdikdən sonra bütün mülklərinizi saytımıza əlavə edə və rezervasiyalara başlaya bilərsiniz. . ");

jr_define ('STRIPE_REGISTER_WELCOME_EMAIL_TITLE', "Xoş gəldiniz");
jr_define ('STRIPE_REGISTER_WELCOME_EMAIL_BLURB', "Mülkiyyətinizi qurmağa başlamazdan əvvəl bizi Stripe hesabınızla əlaqələndirməlisiniz. Başlamaq üçün linki vurun.");

jr_define ('STRIPE_SETUP_INFO', "İndi hesabınızı öz hesabımıza bağlamalıyıq, bu, sizin adınızdan ödənişlər almağımıza imkan verəcək, buna görə də əlaqəni təsdiqləyə biləcəyiniz Stripe -ə aparılacaq Bağlan düyməsini basın.");
jr_define ('STRIPE_SETUP_DONE', "Artıq bizimlə əlaqəniz var, burada başqa işiniz yoxdur! Bu pəncərəni bağlayın və gəlin bizneslə məşğul olaq.");
jr_define ('STRIPE_SETUP_THANKS', "Bizimlə əlaqə qurduğunuz üçün təşəkkür edirik! İndi bu pəncərəni bağlaya bilərsiniz.");
jr_define ('STRIPE_SETUP_DISCONNECT', "Hesabınızı ayırın.");
jr_define ('STRIPE_SETUP_DISCONNECTED', "Hesab bağlantısı kəsildi, indi bu pəncərəni bağlaya bilərsiniz.");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_CLIENT_ID', "Stripe Connect Client ID");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_CLIENT_ID_DESC', "Stripe Müştəri ID'nizi <a href='https://dashboard.stripe.com/account/applications/settings' target='_blank'> Tablosuna> Parametrlər> Bağlan. açarlar Yaradıcılar menyu seçiminin altındadır. </a> ");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_RETURN_URL', "Zəhmət olmasa Yönləndirmə URI -nizi <a href='https://dashboard.stripe.com/account/applications/settings' target='_blank'> Bağlanın> Ayarlar </a> bölməsində yönləndirmə URI'nizi təyin etdiyinizə əmin olun. üçün <br/> ");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_SECRET_KEY', "Gizli açar");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_PUBLIC_KEY', "Açar açar");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_COMMISSION', "Sizin Komissiyanız");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_COMMISSION_DESC', "Bu komissiya sifariş zamanı əmlak menecerinə göndərilən ödənişdən alınır. Daha sonra Stripe tərəfindən Stripe hesabınıza daxil edilir. <br/> Bu, mülkiyyət menecerlərindən alacağınız komissiya faizidir. Komisyon haqqınız depozit dəyərinə deyil, RESİMLİYYƏTİN BÜTÜN qiymətinə əsasən hesablanır. <br/> Bu dəyəri nə qədər təyin etsəniz, Sayt Konfiqurasiyasını -> Rezervasiya Formu -> Minimum Depozit rəqəmini belə konfiqurasiya etməyi məsləhət görürük. bu rəqəmdən ən azı iki dəfə çoxdur, buna görə 10% komissiya almaq istəyirsinizsə, Minimum Depozitin 20% olmasını etməlisiniz. ");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_EURO', "Şerit haqqı Avropa");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_DESC', "Bu, Stripe-in ​​saytınızda ödəniş etdiyiniz üçün sizdən tutduğu faizdir. Hal-hazırda Avropa Kartları üçün 1,4%, Avropa olmayan kartlar üçün isə 2,9% -dir. Bu rəqəm sifariş və qiymətləri təyin etmək üçün lazımdır. ödəniş vaxtı. ");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_NONEURO', "Avro olmayan zolaq haqqı");

jr_define ('STRIPE_PAYMENT_FORM_CREDITCARD', "Kart nömrəsi");
jr_define ('STRIPE_PAYMENT_FORM_EXPIRATION', "Bitmə müddəti (AA/YY)");
jr_define ('STRIPE_PAYMENT_FORM_CVC', "CVC");
jr_define ('STRIPE_PAYMENT_FORM_ZIP', "Faturalandırma Zipi");
jr_define ('STRIPE_PAYMENT_FORM_SECURE', "Təhlükəsiz Ödəniş Formu");
jr_define ('STRIPE_PAYMENT_FORM_BILLINGDETAILS', "Faktura Detalları");
jr_define ('STRIPE_PAYMENT_FORM_CARDDETAILS', "Kart Təfərrüatları");
jr_define ('STRIPE_PAYMENT_FORM_HOLDER', "Kart Sahibinin Adı");
jr_define ('STRIPE_PAYMENT_FORM_PAYNOW', "İndi ödəyin");
jr_define ('STRIPE_PAYMENT_FORM_TOPAY', "İndi ödəmək üçün");

jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_STREET_EMPTY', 'Küçə tələb olunur və boş ola bilməz');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_LENGTH', 'Küçə 6 -dan çox və 96 simvoldan az olmalıdır');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CITY_EMPTY', 'Şəhər tələb olunur və boş ola bilməz');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_ZIP_EMPTY', 'Zip lazımdır və boş ola bilməz');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_ZIP_LENGTH', 'Zip 3 -dən çox və 12 simvoldan az olmalıdır');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_EMPTY', 'E -poçt ünvanı tələb olunur və boş qala bilməz');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_INVALID', 'Giriş etibarlı bir e -poçt ünvanı deyil');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_LENGTH', 'E -poçt 6 -dan çox və 65 simvoldan az olmalıdır');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDHOLDER_EMPTY', 'Kart sahibinin adı tələb olunur və boş qala bilməz');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDHOLDER_LENGTH', 'Kart sahibinin adı 6 -dan çox və 70 simvoldan az olmalıdır');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_EMPTY', 'Kredit kartı nömrəsi tələb olunur və boş qala bilməz');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_INVALID', 'Kredit kartı nömrəsi etibarsızdır');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_MONTH_EMPTY', 'İstifadə müddəti tələb olunur');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_MONTH_DIGITS', 'Bitmə ayı yalnız rəqəmlərdən ibarət ola bilər');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_YEAR_EMPTY', 'Son istifadə ili tələb olunur');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_YEAR_DIGITS', 'Son istifadə ili yalnız rəqəmlərdən ibarət ola bilər');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CCV_EMPTY', 'Cvv tələb olunur və boş qala bilməz');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CCV_INVALID', 'Dəyər etibarlı bir CVV deyil');

jr_define ('STRIPE_PAYMENT_FAILED', "Üzr istəyirik, hazırda ödənişinizi emal edə bilmədik.");
jr_define ('STRIPE_PAYMENT_TRY_AGAIN', "Zəhmət olmasa yenidən cəhd edin");

jr_define ('STRIPE_PAYMENT_ERROR_DECLINED', "Ödəniş rədd edildi.");
jr_define ('STRIPE_PAYMENT_ERROR_RATE_LIMIT', "Çox tez API -yə edilən sorğular");
jr_define ('STRIPE_PAYMENT_ERROR_INVALID_PARAMETERS', "Stripe API'sinə etibarsız parametrlər verildi");
jr_define ('STRIPE_PAYMENT_ERROR_AUTH_FAILED', "Stripe API'si ilə Doğrulama uğursuz oldu");
jr_define ('STRIPE_PAYMENT_ERROR_NETWORK_FAULT', "Stripe ilə şəbəkə əlaqəsi uğursuz oldu (internet bağlantınız kəsildi?)");
jr_define ('STRIPE_PAYMENT_ERROR_UNCAUGHT', "Tutulmamış bir səhv baş verdi");