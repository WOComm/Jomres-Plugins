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

jr_define('CHANNELMANAGEMENT_FRAMEWORK_CHANNEL_ID_NOT_SET',"Kanal Kimliği ayarlanmadı");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_MANAGER_ID_NOT_SET',"Yönetici Kimliği ayarlanmadı");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_TITLE',"Kanal Yöneticisi Çerçevesi");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_FRONTEND_TITLE',"Kanallar");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_INSTALLED_CHANNELS',"Yüklü Kanallar");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_CHOOSE_CHANNEL',"Bir Kanal Seçin");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_CHOOSE_CHANNEL_CHOOSE_DICTIONARY_TYPE',"Sözlük türünü seçin");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_CHANNEL_NONE_INSTALLED',"Hata, yüklü kanal yok");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_SANITY_CHECKS_TITLE',"Kanal Yöneticisi Sağlık kontrolleri");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_SANITY_CHECKS_DESC',"Bir kanal seçin. Bunu yaptıktan sonra, yapılandırmanızı kontrol edeceğiz ve çözmeniz gerekebilecek olası sorunları vurgulayacağız.");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_TITLE',"Kaynak eşleştirme");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_DESC',"Farklı kanalların Sözlükler olarak bilinen özellikleri vardır. Bunlar, oda tipleri, oda özellikleri, mülk özellikleri vb. gibi kaynakları tanımlayan terimlerdir. Kanalı kullanmadan önce farklı Jomres kaynaklarını tek tek kanalların özellikleriyle eşlemeniz gerekir. Böylece, kanallardan içe aktarılan ve kanallara aktarılan özelliklerin doğru kaynaklara sahip olması sağlanır. Bu sayfada önce bir Kanal seçeceksiniz. Tamamlandığında, eşlemek istediğiniz kaynak türlerini seçebileceğiniz yeni bir sayfaya yönlendirileceksiniz. Kanalın kaynaklarına (örneğin, özellik özellikleri) Kaynak türü seçildikten sonra Jomres ve Kanalın kaynaklarını birbirleriyle seçebileceksiniz.");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_SELECT_RESOURCE',"Buradan kaynağı seçmelisiniz (sözlük) ");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_NO_LOCAL_ITEMS',"Bu sözlük öğesi için yerel öğe yok, dolayısıyla eşlenecek bir şey yok.");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_CHANNEL_DICTIONARY_CLASS_DOESNT_EXIST',"Hata, kanalın sözlük sınıfı yok.");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_MAP_ITEM_TYPES_INSTRUCTIONS',"Bu sayfada kanal yöneticisinin sözlük öğelerini Jomres'tekilerle eşleştirmeniz gerekecek.");

jr_define('CHANNELMANAGEMENT_FRAMEWORK_USER_ACCOUNTS',"Kanal Yönetici Hesapları");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_USER_ACCOUNTS_DESC',"Lütfen hesap sahibi olabileceğiniz tüm kanal yöneticileri için yetkilendirme bilgilerini kaydedin.");
jr_define('BİTİR', 'Düzenlemeyi bitir');
jr_define('CHANNELMANAGEMENT_FRAMEWORK_EXTRAS_NOTINSTALLED',"Hata, İsteğe Bağlı Ekstralar eklentisi kurulu değil.");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_CHANNEL_NAME_NOT_SUPPLIED',"Kanal adı sağlanmadı");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_NEW_PROPERTY_OBJECT_NOT_SUPPLIED',"Yeni özellik nesnesi sağlanmadı");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_THISJRUSER_OBJECT_NOT_SUPPLIES',"thisJRUser nesnesi sağlanmadı");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING',"Özelliğin içe aktarılmasını başlatma ");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTED',"Özellik başarıyla içe aktarıldı ");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_FAILED',"Özellik içe aktarılamadı ");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT',"Tüm özellikleri içe aktar");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_ONE',"Özelliği içe aktar");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_UNPUBLISHED_CANNOT_IMPORT',"Uzak sunucuda yayınlanmamış/etkinleştirilmemiş veya herhangi bir değişiklik günlüğü öğesi içermeyen özellikler içe aktarılamaz.");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORTING',"Tarife ithalatı başlatılıyor ");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORTED',"Tarife başarıyla alındı ​​");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORT_FAILED',"Tarife içe aktarılamadı ");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_SETTINGS_FAILED_VALIDATION',"Özellik ayarları doğrulanamadı, tanınmayan bir özellik ayarı içe aktarılmaya çalışıldı ");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_PAGETITLE',"İçe aktarılan özellikler");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_PROPERTY_NAME',"Mülk adı");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_CHANNEL_NAME',"Kanal adı");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_LOCAL_PROPERTY_UID',"Yerel özellik kullanıcı kimliği");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_REMOTE_PROPERTY_UID',"Uzak özellik kullanıcı kimliği");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_EDIT_REMOTE_PROPERTY',"Uzaktan düzenle");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_EDIT_LOCAL_PROPERTY',"Yerel görüntüle");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_DELETE_LOCAL_PROPERTY',"Yerel olarak sil");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_MENUITEM_DASHBOARD',"Dashboard");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_MENUITEM_ACCOUNTS',"Kanal hesapları");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_THIN_CHANNELS_NOT_INSTALLED',"Yüklü ince kanal eklentisi yok, henüz bu özelliği kullanamazsınız.");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_INFO',"Yönettiğiniz atanmamış özellikler bir kanala atanabilir. Kanalı değiştirirseniz geçerli API erişimi olan herhangi bir kanala vermiş olursunuz ");