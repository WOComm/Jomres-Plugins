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

jr_define('_JOMRES_ICAL_EVENT', 'iCal Olayı');
jr_define('_JOMRES_ICAL_FEED', 'iCal Feed');
jr_define( '_JOMRES_ICAL_FEED_LINK', 'iCal Besleme URL\'si');
jr_define('_JOMRES_ICAL_FEEDS', 'iCal Feed/s');
jr_define( '_JOMRES_ICAL_FEEDS_DESC', 'iCal beslemeleriniz mobil cihazınız, Google Takvim, Apple Takvim, Thunderbird, Outlook ve daha fazlası dahil olmak üzere uzak bir takvimde yaklaşan rezervasyonları görüntüleyebilir. takvim yazılımınız.' );
jr_define( '_JOMRES_ICAL_ANON', 'Anonim iCal Besleme URL\'si');
jr_define( '_JOMRES_ICAL_ALLOW_ANON', 'iCal beslemelerine/beslemelerine anonim erişime izin verilsin mi?');
jr_define( '_JOMRES_ICAL_ALLOW_ANON_DESC', 'Bu seçenek etkinleştirilirse, iCal etkinlikleri özet akışınıza rezervasyon veya konuk bilgileri olmadan herkes erişebilir.');
jr_define('_JOMRES_ICAL_IMPORT', 'iCal İçe Aktarma');
jr_define('_JOMRES_ICAL_SELECT', 'İçe aktarılacak dosyayı seçin');
jr_define( '_JOMRES_ICAL_NO_FILE_UPLOADED', 'Hata, dosya yüklenmedi.' );
jr_define( '_JOMRES_ICAL_IMPORT_INFO', "Bir iCal dosyasını içe aktarırken, Etkinlik bitiş tarihi konuğun ayrılış tarihi olmalıdır. Özet, Misafirin adı olmalıdır. Etkinlik açıklaması diğer tüm ayrıntıları içerebilir." );

jr_define( '_JOMRES_ICAL_ERROR_BOOKING_NUMBER_EXISTS', 'Bu rezervasyon numarası sistemde zaten mevcut.' );
jr_define( '_JOMRES_ICAL_ERROR_NO_ROOMS', 'Seçilen tarihlerde müsait oda bulunmamaktadır.' );
jr_define( '_JOMRES_ICAL_ERROR_NO_EVENTS', 'ics dosyasında hiçbir olay bulunamadı.' );
jr_define( '_JOMRES_ICAL_SUCCESS', 'Olay başarıyla içe aktarıldı');
jr_define('_JOMRES_ICAL_FAILURE', 'Olay içe aktarılamadı');

jr_define('_JOMRES_ICAL_RESULT_HEADER_SUMMARY', 'Misafir adı');
jr_define('_JOMRES_ICAL_RESULT_HEADER_DESCRIPTION', 'Olay açıklaması');
jr_define( '_JOMRES_ICAL_RESULT_HEADER_START', 'Başlat');
jr_define( '_JOMRES_ICAL_RESULT_HEADER_END', 'Son');
jr_define('_JOMRES_ICAL_RESULT_HEADER_RESULT', 'Sonuç');
jr_define( '_JOMRES_ICAL_WITHHELD', 'Gizli');
jr_define( '_JOMRES_ICAL_FEED_SETTINGS_DESC', 'iCal beslemeniz/beslemeleriniz mobil cihazınız, Google Takvim, Apple Takvim, Thunderbird, Outlook ve daha fazlası dahil olmak üzere uzak bir takvimde yaklaşan rezervasyonları görüntüleyebilir.' );
jr_define( '_JOMRES_ICAL_SYNC_SETTINGS_DESC', 'Bu özellik, Airbnb, Homeway ve diğerleri gibi sitelerdeki rezervasyonları Jomres ile senkronize etmenize olanak tanır. Senkronize etmek istediğiniz her site için tesisinizin iCal besleme URL\'sini girmeniz gerekir. örneğin tesisinizi Airbnb\'de rezerve edin, bu tarihler bu Jomres sitesinde de engellenmiş (siyah rezervasyonlar) olarak gösterilecektir, böylece hiç kimse bu tarihler için burada rezervasyon yapamaz.Bu, rezervasyon ayrıntılarını siteler arasında senkronize etmez (misafir bilgileri, fiyatlar, faturalar vb.) ancak bu, yalnızca müsaitlik durumunu senkronize ederek çifte rezervasyonları önlemenin güzel ve kolay bir yolu.' );
jr_define('_JOMRES_ICAL_SYNC_SETTINGS', 'iCal Sync Ayarları');
jr_define( '_JOMRES_ICAL_FEED_SETTINGS', 'iCal Feed Ayarları');
jr_define('_JOMRES_ICAL_SYNC_URL1', 'Harici iCal URL');
jr_define( '_JOMRES_ICAL_FEED_INCLUDE_ENQUIRIES', 'Rezervasyon sorguları da dahil mi?' );
jr_define( '_JOMRES_ICAL_FEED_INCLUDE_ENQUIRIES_DESC', 'Etkinleştirilirse, henüz onaylanmamış rezervasyonları da içerecektir (rezervasyon onay özelliği etkinse). Bu seçeneği devre dışı bırakmak, belki de onay bekleyen rezervasyonları takvimden gizlemek için harika bir yoldur. onaylanmamış/sorgulama durumu. Rezervasyonlar onay gerektirmiyorsa (rezervasyon onay özelliği devre dışı bırakılır), tüm rezervasyonlar dışa aktarılacaktır.' );

jr_define( '_JOMRES_ICAL_REMOTE_FEED', 'iCal Uzaktan Beslemeler');
jr_define('_JOMRES_ICAL_REMOTE_FEED_URL', 'Uzak URL');
jr_define('_JOMRES_ICAL_REMOTE_FEED_ROOM_UID', 'Oda UID\'si');
jr_define( '_JOMRES_ICAL_REMOTE_FEED_ROOM_NAME', 'Oda Adı/numarası');
jr_define( '_JOMRES_ICAL_REMOTE_INFO', "Bu beslemenin etkileyeceği odayı ve uzak sitenin url'sini seçin. Bir iCal dosyasını içe aktarırken, Etkinlik bitiş tarihi konuğun çıkış tarihi olmalıdır. Özet, Konuğun adı olmalıdır. Etkinlik açıklama diğer tüm ayrıntıları içerebilir." );

jr_define( '_JOMRES_ICAL_REMOTE_FEED_SAVED', 'Ical uzaktan besleme oluşturuldu');
jr_define( '_JOMRES_ICAL_REMOTE_FEED_DELETED', 'Ical uzaktan besleme silindi');