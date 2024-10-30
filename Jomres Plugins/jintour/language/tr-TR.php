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

jr_define('_JINTOUR_TITLE',"Tur/Etkinlik yönetimi");

jr_define('_JINTOUR_PROFILES_TITLE',"Tur/Aktivite profilleri");
jr_define('_JINTOUR_PROFILES_NEW',"Yeni tur/aktivite profili");
jr_define('_JINTOUR_PROFILES_DELETE',"Tur/aktivite profilini sil");

jr_define('_JINTOUR_PROFILE_TITLE',"Profil başlığı");
jr_define('_JINTOUR_PROFILE_DESCRIPTION',"Açıklama");
jr_define('_JINTOUR_PROFILE_DESCRIPTION_INFO',"Yol programı dahil turunuzun/etkinliğinizin açıklamasını girin.");
jr_define('_JINTOUR_PROFILE_DAYS_OF_WEEK',"Haftanın günleri");
jr_define('_JINTOUR_PROFILE_DAYS_OF_WEEK_INFO',"");
jr_define('_JINTOUR_PROFILE_PRICE_ADULTS',"Yetişkin fiyatı");
jr_define('_JINTOUR_PROFILE_PRICE_KIDS',"Alt fiyat");
jr_define('_JINTOUR_PROFILE_PRICE_KIDS_INFO',"Bir seçeneğin rezervasyon formunda görünmesini engellemek için fiyatı 0 (sıfır) olarak bırakın");
jr_define('_JINTOUR_PROFILE_SPACES_ADULTS',"Yetişkin alanlar");
jr_define('_JINTOUR_PROFILE_SPACES_KIDS',"Alt alanlar");
jr_define('_JINTOUR_PROFILE_SPACES_INFO',"Tur/etkinlikteki boş yer sayısı");
jr_define('_JINTOUR_PROFILE_START_DATE',"Sezon başlangıcı");
jr_define('_JINTOUR_PROFILE_END_DATE',"Sezon sonu");

jr_define('_JINTOUR_PROFILE_GENERATE_INFO',"Bir tur/aktivite profili oluşturduktan sonra, o profilin ayarlarına dayalı olarak turlar/aktiviteler oluşturmanız gerekecektir. Turu/aktiviteyi oluşturun, ardından profili oluşturmak için o profilin yanındaki Yeşil ok simgesine tıklayın. turların/aktivitelerin kendileri.Turlar/aktiviteler oluşturulduktan sonra, isterseniz bireysel turları/aktiviteleri silebilirsiniz.");
jr_define('_JINTOUR_PROFILE_GENERATE',"Tur/etkinlik oluştur");

jr_define('_JINTOUR_TOUR_TITLE',"Etkinlik başlığı");
jr_define('_JINTOUR_TOUR_DATE',"Tarih");
jr_define('_JINTOUR_TOUR_ADULTS',"Yetişkinler");
jr_define('_JINTOUR_TOUR_KIDS',"Çocuklar");
jr_define('_JINTOUR_TOUR_ITINERY',"Yol Programı");

jr_define('_JINTOUR_TOUR_SAVE_AUDIT',"Yeni turlar oluşturuldu");
jr_define('_JINTOUR_TOUR_CANCEL_AUDIT',"Tur rezervasyonu iptal edildi");
jr_define('_JINTOUR_TOUR_SAVE_MESSAGE',"Yeni turlar oluşturuldu");
jr_define('_JINTOUR_TOUR_SPACES_CURRENTLY_AVAILABLE',"Şu anda müsait olan yerler");

jr_define('_JINTOUR_TOUR_EMAIL_ADMIN_SUBJECT',"Tur/kaynak kimliği için Yeni Rezervasyon ");
jr_define('_JINTOUR_TOUR_EMAIL_ADMIN_MESSAGE',"Bir yönetici turu/kaynağı için yeni bir rezervasyon yapıldı. Bu turun yönetici alanı sayfasını görüntülemek için lütfen aşağıdaki bağlantıyı görüntüleyin ");

jr_define('_JINTOUR_TITLE_CONFIG',"Jomres Integrated Tours Konfigürasyonu");
jr_define('_JINTOUR_TITLE_WHOLESITE',"Tüm kurulum bir Jintour kurulumu mu?");
jr_define('_JINTOUR_TITLE_WHOLESITE_DESC',"Bunu Evet olarak ayarlarsanız, tüm tesisler tur mülkleri olacaktır. Hayır olarak ayarlarsanız, yeni mülkler oluşturulduğunda hem Tur hem de Otel/Apartman tipi mülklere sahip olabilirsiniz. ");

jr_define('_JINTOUR_REGPROP_MANAGEMENTPROCESS_TOURS',"Turlar");
jr_define('_JINTOUR_REGPROP_MANAGEMENTPROCESS_TOURS_DESC',"Belirli tarihlerde mevcut olan ürünler için (ör. turlar, konser biletleri) rezervasyon teklif ediyorsanız tur seçeneğini seçin.");
jr_define('_JINTOUR_SHOWDEPARTURE',"Kalkış giriş alanını göstersin mi?");
jr_define('_JINTOUR_SHOWDEPARTURE_DESC',"Hem varış hem de ayrılış tarihini göstermek istiyorsanız bunu Evet olarak ayarlayın. Hem gelen hem de giden tarihleri ​​bilmeniz gereken otobüs yolculukları, uçak biletleri vb. sunuyorsanız bu yararlı olacaktır, kalkış tarihini göstermek, birden fazla tarih için kaynak sunmanıza olanak tanırken, Hayır olarak ayarlanmış ayarda yalnızca bir tarih için rezervasyonlar kabul edilebilir.");

jr_define('_JINTOUR_PROFILES_TITLE_LIST',"Tur Listesi");