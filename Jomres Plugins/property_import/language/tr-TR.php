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

jr_define('_JOMRES_PROPERTY_IMPORT_TITLE',"Mülk İçe Aktarma");
jr_define('_JOMRES_PROPERTY_IMPORT_DESC',"Bu özellik, özellikleri CSV dosyası aracılığıyla içe aktarmanıza olanak tanır. Gerekli çeşitli kontroller nedeniyle, oluşturulan mülklerin sayısını bir seferde 50'den fazla olmayacak şekilde sınırlamanızı öneririz. ");
jr_define('_JOMRES_PROPERTY_IMPORT_SELECT',"Lütfen yüklemek istediğiniz dosyayı seçin.");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELDS',"csv dosyası 11 sütun içermeli ve alanlar html içermemelidir. Tüm alanlar zorunludur.");

jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_NAME',"Mülk adı");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_NAME_TYPE',"Metin");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_ROOMS',"Oda sayısı (bu bir villa/yazlık ise, gerçek mülkteki oda sayısından bağımsız olarak bu 1 olmalıdır. Sadece oteller/B&B'ler vb. birden fazla odaya sahip olmalıdır). Tamsayı .");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_ROOMS_TYPE',"Tamsayı");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_PRICE',"Para birimi kodları olmadan gecelik fiyat.");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_PRICE_TYPE',"Yüzer");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_EMAIL_ADDRESS',"E-posta adresi");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_EMAIL_ADDRESS_TYPE',"Metin");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_STREET',"Sokak");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_STREET_TYPE',"Metin");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TOWN',"Kasaba");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TOWN_TYPE',"Metin");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_REGION',"Bölge. Bu, Bölgeler tablosunda saklanan bölgelerin kimlikleriyle eşleşmelidir");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_REGION_TYPE',"Tamsayı");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_COUNTRY',"Mülkün bulunduğu ülke. Kısa kod, örneğin GB veya DE, tam ülke adı değil");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_COUNTRY_TYPE',"Metin");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_POSTCODE',"Posta Kodu");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_POSTCODE_TYPE',"Metin");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TELEPHONE',"Telefon numarası");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TELEPHONE_TYPE',"Metin");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_DESCRIPTION',"Mülkün tam açıklaması. Maksimum 500 karakter");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_DESCRIPTION_TYPE',"Metin");

jr_define('_JOMRES_PROPERTY_IMPORT_PROPERTY_TYPE_NOT_SENT',"Hata, özellik türü ayarlanmadı.");
jr_define('_JOMRES_PROPERTY_IMPORT_NO_ROOM_TYPES_FOR_PROPERTY_TYPE',"Hata, bu mülk türü için oda tipimiz yok. Yönetici alanında Site Yapısı'nı ziyaret ederek bunu düzeltebilirsiniz.");
jr_define('_JOMRES_PROPERTY_IMPORT_NO_FILE',"Hata, bir dosya yüklemeyi mi unuttunuz? ");

jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_TOO_MANY_COLUMNS',"Çok fazla sütun bulundu, dosya hatalı biçimlendirilmiş veya csv verileri düzgün oluşturulmamış.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_PROPERTY_NAME_NOT_SET',"Özellik adı ayarlanmadı.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NUMBER_OF_ROOMS_INCORRECT',"Oda sayısı ayarlanmadı.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_PRICE_NOT_SET',"Gecelik fiyat belirlenmedi.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_COULD_NOT_VALIDATE_EMAIL_ADDRESS',"E-posta adresi doğrulanamadı.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_STREET',"Sokak ayarlanmadı.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_TOWN',"Kasaba kurulmadı.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_REGION',"Bölge ayarlanmadı.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_COUNTRY',"Ülke ayarlanmadı.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_POSTCODE',"Posta kodu ayarlanmadı.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_TELEPHONE',"Telefon kurulmadı.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_DESCRIPTION',"Açıklama ayarlanmadı.");

jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_SUCCESS',"Özellik başarıyla içe aktarıldı!");

jr_define('_JOMRES_PROPERTY_IMPORT_FAILED_PROPERTIES',"İçe aktarılamayan bir veya daha fazla mülkünüz olduğundan, yalnızca bu özellikleri aşağıdaki alana aktardık. Bu özellikleri excel/open office calc/CSV dosya işleyici seçiminize kopyalayabilir ve düzeltebilirsiniz tüm özellikleri yeniden içe aktarmak zorunda kalmadan sorunlar.");