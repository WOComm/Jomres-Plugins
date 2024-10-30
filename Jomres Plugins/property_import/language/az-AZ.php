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
jr_define('_JOMRES_PROPERTY_IMPORT_TITLE',"Əmlak İdxalı");
jr_define('_JOMRES_PROPERTY_IMPORT_DESC',"Bu xüsusiyyət CSV faylı vasitəsilə xassələri idxal etməyə imkan verir. Tələb olunan müxtəlif yoxlamalar səbəbindən, yaradılan xassələrin sayını bir dəfədə 50-dən çox olmayan partiyalarla məhdudlaşdırmağınızı tövsiyə edirik. ");
jr_define ('_JOMRES_PROPERTY_IMPORT_SELECT', "Yükləmək istədiyiniz faylı seçin.");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELDS',"Csv faylında 11 sütun olmalıdır və sahələrdə heç bir html olmamalıdır. Bütün sahələr tələb olunur.");

jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_NAME', "Mülkiyyət adı");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_NAME_TYPE',"Mətn");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_ROOMS',"Otaqların sayı (əgər bu villa/kottecdirsə, faktiki mülkiyyətdəki otaqların sayından asılı olmayaraq, bu, 1 olmalıdır. Yalnız otellərdə/yataqxanalarda və s.-də birdən çox otaq olmalıdır). Tam ədəd . ");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_ROOMS_TYPE',"Tam ədəd");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_PRICE',"Valyuta kodları olmadan bir gecəlik qiymət.");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_PRICE_TYPE',"Float");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_EMAIL_ADDRESS',"E-poçt ünvanı");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_EMAIL_ADDRESS_TYPE',"Mətn");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_STREET',"Küçə");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_STREET_TYPE', "Mətn");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TOWN', "Şəhər");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TOWN_TYPE', "Mətn");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_REGION', "Region. Bunun Regionlar cədvəlində saxlanılan bölgələrin idləri ilə uyğun olması lazımdır");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_REGION_TYPE', "Tam ədəd");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_COUNTRY',"Mülk ölkəsi. Qısa kod, məsələn GB və ya DE, tam ölkənin adı deyil");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_COUNTRY_TYPE',"Mətn");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_POSTCODE',"Poçt kodu");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_POSTCODE_TYPE',"Mətn");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TELEPHONE',"Telefon nömrəsi");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TELEPHONE_TYPE',"Mətn");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_DESCRIPTION', "Mülkiyyətin tam təsviri. Maksimum 500 simvol");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_DESCRIPTION_TYPE',"Mətn");

jr_define ('_JOMRES_PROPERTY_IMPORT_PROPERTY_TYPE_NOT_SENT', "Xəta, mülkiyyət növü təyin olunmadı.");
jr_define('_JOMRES_PROPERTY_IMPORT_NO_ROOM_TYPES_FOR_PROPERTY_TYPE',"Xəta, bizdə həmin əmlak növü üçün otaq tipləri yoxdur. Administrator sahəsində Sayt Strukturuna daxil olaraq bunu düzəldə bilərsiniz.");
jr_define('_JOMRES_PROPERTY_IMPORT_NO_FILE',"Af, fayl yükləməyi unutmusunuz? ");

jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_TOO_MANY_COLUMNS',"Həddindən artıq çox sütun tapıldı, ya fayl səhv formalaşdırılıb, ya da csv məlumatları düzgün qurulmayıb.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_PROPERTY_NAME_NOT_SET',"Əmlak adı təyin olunmayıb.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NUMBER_OF_ROOMS_YANLIŞ',"Otaqların sayı təyin olunmayıb.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_PRICE_NOT_SET',"Bir gecəlik qiymət təyin olunmayıb.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_CULD_NOT_VALIDATE_EMAIL_ADDRESS',"E-poçt ünvanını yoxlamaq mümkün olmadı.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_STREET',"Küçə təyin olunmayıb.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_TOWN',"Şəhər təyin olunmayıb.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_REGION',"Region təyin edilmədi.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_COUNTRY',"Ölkə təyin edilmədi.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_POSTCODE',"Poçt kodu təyin edilmədi.");
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_TELEPHONE', "Telefon qurulmadı.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_DESCRIPTION',"Təsvir təyin edilmədi.");

jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_SUCCESS',"Əmlak uğurla idxal edildi!");

jr_define('_JOMRES_PROPERTY_IMPORT_FAILED_PROPERTIES',"İdxal edə bilməyən bir və ya bir neçə xassəniz olduğundan, biz yalnız həmin xassələri aşağıdakı sahəyə ixrac etdik. Siz bu xassələri excell/açıq ofis kalkına/seçdiyiniz CSV fayl işləyicisinə köçürə və düzəldə bilərsiniz. bütün əmlakları yenidən idxal etmədən məsələlər.");