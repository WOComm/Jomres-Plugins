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
jr_define( '_JOMRES_ICAL_EVENT', 'iCal Hadisə');
jr_define( '_JOMRES_ICAL_FEED', 'iCal Feed');
jr_define( '_JOMRES_ICAL_FEED_LINK', 'iCal Feed URL' );
jr_define( '_JOMRES_ICAL_FEEDS', 'iCal Feed/s' );
jr_define( '_JOMRES_ICAL_FEEDS_DESC', 'iCal lentiniz mobil cihazınız, Google Təqviminiz, Apple Təqviminiz, Thunderbird, Outlook və s. daxil olmaqla uzaq təqvimdə qarşıdan gələn rezervasiyaları göstərə bilər. Lentə abunə olmaq üçün aşağıdakı URL-lərdən istifadə edin. Təqvim proqramınız.' );
jr_define ('_JOMRES_ICAL_ANON', 'Anonim iCal Feed URL');
jr_define( '_JOMRES_ICAL_ALLOW_ANON', 'iCal feed/s-ə anonim girişə icazə verilsin?' );
jr_define ('_JOMRES_ICAL_ALLOW_ANON_DESC', 'Bu seçim aktiv edilsə, iCal hadisələr lentiniz hər kəs üçün əlçatan olacaq, ancaq sifariş vermədən və ya qonaq məlumatları olmadan.');
jr_define( '_JOMRES_ICAL_IMPORT', 'iCal Import' );
jr_define( '_JOMRES_ICAL_SELECT', 'İdxal etmək üçün faylı seçin' );
jr_define( '_JOMRES_ICAL_NO_FILE_UPLOADED', 'Xəta, heç bir fayl yüklənmədi.' );
jr_define ('_JOMRES_ICAL_IMPORT_INFO', "iCal faylını idxal edərkən, Tədbirin bitmə tarixi qonağın gediş tarixi olmalıdır. Xülasə Qonağın adı olmalıdır. Tədbirin təsviri digər bütün detalları ehtiva edə bilər.");

jr_define( '_JOMRES_ICAL_ERROR_BOOKING_NUMBER_EXISTS', 'Bu rezervasiya nömrəsi sistemdə artıq mövcuddur.' );
jr_define( '_JOMRES_ICAL_ERROR_NO_ROOMS', 'Seçilmiş tarixlərdə otaq yoxdur.' );
jr_define( '_JOMRES_ICAL_ERROR_NO_EVENTS', 'ICS faylında heç bir hadisə tapılmadı.' );
jr_define( '_JOMRES_ICAL_SUCCESS', 'Tədbir uğurla idxal edildi' );
jr_define( '_JOMRES_ICAL_FAILURE', 'Hadisə idxal edilə bilmədi' );

jr_define( '_JOMRES_ICAL_RESULT_HEADER_SUMMARY', 'Qonaq adı' );
jr_define( '_JOMRES_ICAL_RESULT_HEADER_DESCRIPTION', 'Hadisə təsviri' );
jr_define( '_JOMRES_ICAL_RESULT_HEADER_START', 'Başlat' );
jr_define ('_JOMRES_ICAL_RESULT_HEADER_END', 'Son');
jr_define( '_JOMRES_ICAL_RESULT_HEADER_RESULT', 'Nəticə' );
jr_define( '_JOMRES_ICAL_WITHHELD', 'Saxlanılır' );
jr_define( '_JOMRES_ICAL_FEED_SETTINGS_DESC', 'iCal lentiniz mobil cihazınız, Google Təqvim, Apple Təqvim, Thunderbird, Outlook və s. daxil olmaqla uzaq təqvimdə qarşıdan gələn sifarişləri göstərə bilər.' );
jr_define( '_JOMRES_ICAL_SYNC_SETTINGS_DESC', 'Bu funksiya sizə Airbnb, Homeway və digər saytlardan sifarişləri Jomres ilə sinxronlaşdırmağa imkan verir. Sinxronizasiya etmək istədiyiniz hər bir sayt üçün mülkünüzün iCal lent url-ni daxil etməli olacaqsınız. Kimsə məsələn, Airbnb-də əmlakınızı bron edin, həmin tarixlər də bu Jomres saytında bloklanmış (qara sifarişlər) kimi göstəriləcək, ona görə də heç kim burada həmin tarixləri sifariş edə bilməz. Bu, rezervasiya təfərrüatlarını saytlar arasında sinxronlaşdırmayacaq (qonaq detalları, qiymətlər, fakturalar və s.) lakin bu, yalnız mövcudluğu sinxronlaşdırmaqla ikiqat rezervasiyalardan qaçmağın gözəl və asan yoludur.' );
jr_define ('_JOMRES_ICAL_SYNC_SETTINGS', 'iCal Sync Ayarları');
jr_define( '_JOMRES_ICAL_FEED_SETTINGS', 'iCal Feed Parametrləri' );
jr_define( '_JOMRES_ICAL_SYNC_URL1', 'Xarici iCal URL' );
jr_define( '_JOMRES_ICAL_FEED_INCLUDE_ENQUIRIES', 'Rezervasiya sorğuları da daxil edilsin?' );
jr_define( '_JOMRES_ICAL_FEED_INCLUDE_ENQUIRIES_DESC', 'Aktivdirsə, o, hələ təsdiqlənməmiş rezervasiyaları da əhatə edəcək (əgər rezervasiyaların təsdiqi funksiyası aktivdirsə). Bu seçimi qeyri-aktiv saxlamaq təsdiqlənməyi gözləyən təqvimləri gizlətmək üçün əla yoldur. təsdiqlənməmiş/sorğu statusu. Əgər rezervasiyalar təsdiq tələb etmirsə (sifarişlərin təsdiqi funksiyası deaktivdir), bütün rezervasiyalar ixrac olunacaq.' );

jr_define ('_JOMRES_ICAL_REMOTE_FEED', 'iCal Uzaqdan Beslemeler');
jr_define( '_JOMRES_ICAL_REMOTE_FEED_URL', 'Uzaq URL' );
jr_define( '_JOMRES_ICAL_REMOTE_FEED_ROOM_UID', 'Otaq UID' );
jr_define( '_JOMRES_ICAL_REMOTE_FEED_ROOM_NAME', 'Otaq Adı/nömrəsi' );
jr_define( '_JOMRES_ICAL_REMOTE_INFO', "Bu lentin təsir edəcəyi otağı və uzaq saytın url-ni seçin. iCal faylını idxal edərkən Tədbirin bitmə tarixi qonağın gediş tarixi olmalıdır. Xülasə Qonağın adı olmalıdır. Tədbir təsvir bütün digər təfərrüatları ehtiva edə bilər." );

jr_define( '_JOMRES_ICAL_REMOTE_FEED_SAVED', 'Ical uzaqdan lent yaradıldı' );
jr_define ('_JOMRES_ICAL_REMOTE_FEED_DELETED', 'Buzlu uzaq lent silindi');