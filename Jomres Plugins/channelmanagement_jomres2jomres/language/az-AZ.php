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
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_TITLE', "Jomres 2 Jomres Integration");

jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_TITLE', "Ana sayt müştəri id");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_DESC', "Ana saytın müştəri identifikatoru. Ana saytda bütün api xüsusiyyət plaginləri quraşdırılmış, Kanal İdarəetmə Çərçivəsi plagininin quraşdırıldığı və müştəri idini yaratdıqda/redaktə etdikdə unikal müştəri idinə və sirrinə ehtiyacınız olacaq. gizli açar cütlüyünə bütün mövcud sahələrə girişi verməlisiniz. ");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_TITLE', "Ana sayt müştərisinin sirri");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_DESC', "Ana sayt müştəri sirri");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENTSITE_TITLE', "Ana URL");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENTSITE_DESC', "Ana Jomres saytının url.");

jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_NOT_SET', "Xəta, Ana sayt müştəri idiniz təyin olunmayıb. Müştəri idinizi saxlamaq üçün Sayt Konfiqurasiyası> Kanal Meneceri hesabları sekmesine daxil olun.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_NOT_SET', "Xəta, Ana saytınızın sirri təyin edilməyib. Sirinizi saxlamaq üçün Sayt Konfiqurasiyası> Kanal İdarəçisi hesabları sekmesine daxil olun.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENT_NOT_SET', "Xəta, Ana saytınızın gizli url -i təyin edilməyib. Ana sayt urlinizi saxlamaq üçün Sayt Konfiqurasiyası> Kanal Meneceri hesabları sekmesine daxil olun.");

jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_NOT_SET_ADMIN_SANITY_CHECK_MESSAGE', "Xəta, Müştəri idiniz təyin olunmayıb. İstifadəçi adınızı saxlamaq üçün Sayt Konfiqurasiyası> Kanal İdarəçisi Hesabları sekmesine daxil olun.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_NOT_SET_ADMIN_SANITY_CHECK_MESSAGE', "Xəta, Müştəri idiniz təyin olunmayıb. Parolunuzu saxlamaq üçün Sayt Konfiqurasiyası> Kanal Meneceri Hesabları sekmesine daxil olun.");

jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_TITLE', "Kanal qurulması");

jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_MESSAGE', "Jomres 2 Jomres: Yeni xassələri idxal edin.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_BUTTON_IMPORT', "İTHALAT");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_BUTTON_EXPORT', "İXRACAT");

jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_PROPERTYID_NOTSET', "Mülkiyyət id təyin olunmayıb");

jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET', "Eşlenen lüğət elementləri ayarlanmadı");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_PROPERTYTYPE_NOTFOUND', "Yerli mülk növü tapılmadı. Mülkiyyət növü yaradılıbsa, zəhmət olmasa uzaq xidmətin mülkiyyət növünü yerli mülkiyyət tipinə uyğunlaşdırdığınızdan əmin olun.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_REMOTEPROPERTYTYPE_NOTFOUND', "Uzaqdan mülkiyyət növü kanal tərəfindən qaytarılmadı.");

jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_LOCAL_PROPERTYTYPE_NOTFOUND', "Yerli mülkiyyət növü keçilmədi.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_BOOKING_MODEL_NOT_FOUND', "Rezervasyon modelini təyin etmək mümkün olmadı (mrp və ya srp).");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_BOOKING_MODEL_NOT_FOUND_IN_PROPERTY_TYPE', "Mülkiyyət növü id tapdıqdan sonra sifariş modelini (mrp və ya srp) təyin etmək mümkün olmadı.");

jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_COUNTRY_CODE_NOT_FOUND', "Ölkə kodu təyin edilə bilmədi");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_REGION_ID_NOT_FOUND', "Region id təyin edilə bilmədi");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_VALIDATE_SETTINGS_FAILED', "Ayarlar silsiləsi düzgün təsdiqlənmədi");

jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_PTYPES', "Mülkiyyət növləri idarəçi tərəfindən xəritələnməyib");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_PFEATURES', "Mülkiyyət xüsusiyyətləri idarəçi tərəfindən xəritələnməyib");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_ROOM_TYPES', "Otaq növləri idarəçi tərəfindən xəritələnməyib");