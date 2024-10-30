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

jr_define('_JOMRES_AUCTIONHOUSE_TITLE',"Müzayede evi");
jr_define('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTIONTITLE',"Satın Alma");
jr_define('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTIONTITLE',"Satış");

jr_define('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTION_AUCTIONSHOME',"Ana Sayfa Müzayede");
jr_define('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTION_MYBIDS',"Teklif verdiğim ürünler");

jr_define('_JOMRES_AUCTIONHOUSE_EVERYBODY_MENUOPTION_DASHBOARD',"Açık artırmaları listele");

jr_define('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_DASHBOARD',"Mülkiyet kontrol paneli");
jr_define('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_LISTAUCTIONS',"Açık artırmalarınızı listeleyin");
jr_define('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_CREATE_NEW_AUCTION',"Yeni açık artırma");
jr_define('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_EDIT_AUCTION',"Açık artırmayı düzenle");
jr_define('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_CANCEL_AUCTION',"Açık artırmayı iptal et");
jr_define('_JOMRES_AUCTIONHOUSE_ADMIN_CANCEL_AUCTION',"Açık artırmayı erken sonlandır");

jr_define('_JOMRES_AUCTIONHOUSE_SELLER_CREATE_CHOOSEPROPERTY',"Lütfen bu açık artırmayı ilişkilendirmek istediğiniz mülkü seçiniz.");
jr_define('_JOMRES_AUCTIONHOUSE_SELLER_CREATE_INCLUDINGROOMS',"Bu müzayedeye oda/mülk'ü dahil ediyor musunuz?");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_MRP',"Lütfen bu açık artırmaya dahil etmek istediğiniz odaları seçin. Önce rezervasyon için tarihleri ​​seçin, ardından odaları seçebilirsiniz. ");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_SRP',"Lütfen açık artırma kapsamında mülkü rezerve etmek istediğiniz tarihleri ​​seçin.");
jr_define('_JOMRES_AUCTIONHOUSE_TERMS_LINK',"Şartlar ve koşullar");
jr_define('_JOMRES_AUCTIONHOUSE_TERMS_TEXT',"Şartlar ve koşullar");

jr_define('_JOMRES_AUCTIONHOUSE_TERMS_DETAILED',"Ayrıntılı şartlar ve koşullar.");

jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_TITLE',"Açık Artırma Başlığı");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION',"Açıklama");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_VALUE',"Bu açık artırmanın değeri");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_VALUE_INFO',"Lütfen teklif ettiğiniz paketin değerini giriniz. Alıcılara gösterilmeyecektir.");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE',"Rezerve");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE_NOTMET',"Rezerv karşılanmadı");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BUYNOW_PRICE',"Şimdi satın alın");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_DAYSTORUN',"Bu müzayede kaç gün sürmeli?");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BLACKBOOKING_NOTE',"Açık artırma için müzayede evi rezervasyonu (iptal etmeyin): ");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_TAX_NOTE',"Teklif verdiğinizde faturanıza ek vergi ekleneceğini unutmayın ");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_DISCLAIMER',"Teklif Ver veya Şimdi Satın Al düğmesine tıklarsanız, satıcıdan ürün veya paketi satın almak için yasal olarak bağlayıcı bir sözleşme yapmış olursunuz. Bu site, satıcı tarafından listelenen içerikten sorumlu değildir.") ;


jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_TITLE_ERROR',"Hata, bir başlık eklemelisiniz.");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION_ERROR',"Hata, bir açıklama eklemelisiniz.");

jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_ACTIVE_AUCTIONS',"Aktif açık artırmalar");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_FINISHED_AUCTIONS',"Bitmiş açık artırmalar");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_MAXIBID',"En yüksek teklif");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_NOBIDS',"Teklif yok");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_TIMELEFT',"Kalan süre");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BID',"Teklifinizi verin");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BID_PLACED',"Teklifiniz verildi!");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BID_YOURBIDHIGHEST',"Bu müzayedeyi kazanıyorsunuz!");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BID_OUTBID',"Daha fazla teklif aldınız!");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BID_WON',"Tebrikler, bu açık artırmayı kazandınız!");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BID_LOST',"Üzgünüz, bu açık artırmayı kaybettiniz.");

jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_ENDED',"Açık artırma tamamlandı");

jr_define('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_NOTLOGGEDIN',"Üzgünüz, giriş yapmadığınız için bu açık artırmaya teklif veremezsiniz.");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_ENDED',"Maalesef bu açık artırma sona erdiği için bu açık artırmaya teklif veremezsiniz.");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_NOTFOUND',"Üzgünüz, bu açık artırmaya teklif veremezsiniz, bu açık artırma kimliğini bulamıyoruz.");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_TOOLOW',"Maalesef teklifiniz çok düşüktü.");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_OWNAUCTION',"Kendi müzayedenize teklif veremezsiniz.");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_EDITPROFILE',"Bilgilerinizi girmediğiniz için henüz bu açık artırmaya teklif veremezsiniz. Önce hesap ayrıntılarınızı doldurmak için lütfen yukarıdaki 'Hesabı Düzenle' bağlantısını tıklayın.");

jr_define('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_NOTLOGGEDIN',"Üzgünüz, giriş yapmadığınız için bu açık artırmayı iptal edemezsiniz.");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_ALREADYBID',"Maalesef bu müzayedeyi iptal edemezsiniz çünkü daha önce teklif verilmiş. Sadece teklif verilmeyen müzayedeler iptal edilebilir.");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_ENDED',"Üzgünüz, bu açık artırma zaten sona erdiği için iptal edemezsiniz.");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_NOTYOURS',"Üzgünüz, bu açık artırmaya erişim hakkınız olmadığı için bu açık artırmayı iptal edemezsiniz.");

jr_define('_JOMRES_AUCTIONHOUSE_COUNTDOWN_DAYS',"d");
jr_define('_JOMRES_AUCTIONHOUSE_COUNTDOWN_HOURS',"h");
jr_define('_JOMRES_AUCTIONHOUSE_COUNTDOWN_MINUTES',"m");
jr_define('_JOMRES_AUCTIONHOUSE_COUNTDOWN_SECONDS',"s");

jr_define('_JOMRES_AUCTIONHOUSE_LISTS',"İzleme listeleriniz");
jr_define('_JOMRES_AUCTIONHOUSE_LISTS_COUNT',"Listedeki numara");
jr_define('_JOMRES_AUCTIONHOUSE_DEFAULTLIST',"İzleme Listesi");
jr_define('_JOMRES_AUCTIONHOUSE_ADDTOWATCHLIST_INSTRUCTIONS',"İzleme listesine ekle");
jr_define('_JOMRES_AUCTIONHOUSE_LISTS_ADD',"İzleme listesi ekle");
jr_define('_JOMRES_AUCTIONHOUSE_LISTS_NEWLIST_NAME',"Yeni liste adını girin");
jr_define('_JOMRES_AUCTIONHOUSE_LISTS_SAVENEWLIST',"Yeni izleme listesini kaydet");
jr_define('_JOMRES_AUCTIONHOUSE_LISTS_ADDED_TO_LIST',"Açık artırma listeye eklendi");
jr_define('_JOMRES_AUCTIONHOUSE_LISTS_NO_LISTS',"Henüz izleme listeniz yok. İlk listenizi oluşturmak için izleme listenize bir açık artırma ekleyebilir veya manuel olarak liste eklemek için menüdeki İzleme Listesi Ekle seçeneğini kullanabilirsiniz.");
jr_define('_JOMRES_AUCTIONHOUSE_LIST_DOESNOTEXIST',"Hata, bu izleme listesi mevcut değil.");

jr_define('_JOMRES_AUCTIONHOUSE_PROPERTY_DETAILS_AUCTIONINFO',"Bu mülk açık artırma programımıza katılıyor ve açık artırma için bir veya daha fazla paket sunuyor, lütfen aşağıdaki listeye bakın.");
jr_define('_JOMRES_AUCTIONHOUSE_PROPERTY_DETAILS_MOREINFO',"Hakkında bilgi ");

jr_define('_JOMRES_AUCTIONHOUSE_INVOICING_COMMISSIONWORD',"Açık artırma komisyonu");
jr_define('_JOMRES_AUCTIONHOUSE_INVOICING_PREAMBLE',"Açık Artırma : ");

jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_BIDPLACED_SUBJECT',"Açık artırma için bir teklif verdiniz: ");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_BIDPLACED_BODY',"Bir müzayede için teklif verdiniz. Müzayedeyi aşağıdaki bağlantıyı ziyaret ederek görebilirsiniz: ");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_OUTBID_SUBJECT',"Teklifiniz geçti! Açık Artırma : ");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_OUTBID_BODY',"Bir müzayedede fazla teklif aldınız. Müzayedeyi aşağıdaki bağlantıyı ziyaret ederek görebilirsiniz: ");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_SUBJECT',"Bir müzayede kazandınız! Müzayede : ");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_BODY',"Bir müzayede kazandınız. Müzayedeyi aşağıdaki bağlantıyı ziyaret ederek görebilirsiniz: ");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_BODY2',"Lütfen satıcıya derhal ödeme yaptığınızdan emin olun. Faturanız burada : ");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_SELLER_AUCTION_ENDED_SUBJECT',"Açık artırma sona erdi. Açık artırma : ");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_SELLER_AUCTION_ENDED_BODY',"Bu açık artırma sona erdi. Açık artırmayı burada görebilirsiniz : ");

jr_define('_JOMRES_AUCTIONHOUSE_BOOKINGNOTE',"Açık artırma tamamlandı. Kazananın detayları aşağıdadır: ");

jr_define( '_JOMRES_SHORTCODES_06000AUCTION_HOUSE', "Müzayede Evi sayfasını görüntüler." );


