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

jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHANNEL_ID_NOT_SET', "Kanal ID təyin edilməyib");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MANAGER_ID_NOT_SET', "Menecer ID təyin edilməyib");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_TITLE', "Kanal Meneceri Çərçivəsi");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_FRONTEND_TITLE', "Kanallar");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_INSTALLED_CHANNELS', "Quraşdırılmış Kanallar");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHOOSE_CHANNEL', "Kanal Seçin");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHOOSE_CHANNEL_CHOOSE_DICTIONARY_TYPE', "Lüğət növünü seçin");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHANNEL_NONE_INSTALLED', "Hata, kanal quraşdırılmadı");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_SANITY_CHECKS_TITLE', "Kanal Meneceri Sağlamlıq yoxlamaları");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_SANITY_CHECKS_DESC', "Bir kanal seçin. Bunu etdikdən sonra konfiqurasiyanızı yoxlayacağıq və həll etməyiniz lazım olan hər hansı bir problemi vurğulayacağıq.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_TITLE', "Mənbə Xəritəçəkmə");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_DESC', "Fərqli kanallar lüğətlər olaraq bilinir. Bunlar otaq növləri, otaq xüsusiyyətləri, mülkiyyət xüsusiyyətləri və s. kimi mənbələri təsvir etmək üçün istifadə olunan terminlərdir. Kanaldan istifadə etməzdən əvvəl ayrı -ayrı kanallar ilə fərqli Jomres resurslarını xəritələmək lazımdır. mənbələr, kanallardan idxal edilən və kanallara ixrac edilən xüsusiyyətlərin doğru qaynaqlara sahib olması üçün. Bu səhifədə əvvəlcə bir Kanal seçəcəksiniz. Bitirdikdən sonra, xəritəyə daxil etmək istədiyiniz resurs növlərini seçə biləcəyiniz yeni bir səhifəyə aparılacaqsınız. Kanalın mənbələrinə (məsələn, mülkiyyət xüsusiyyətləri). Mənbə növü seçildikdən sonra Jomres və Kanalın mənbələrini bir -birinizlə seçə biləcəksiniz. ");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_SELECT_RESOURCE', "Burada mənbəni (lüğət) seçməlisiniz");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_NO_LOCAL_ITEMS', "Bu lüğət maddəsi üçün heç bir yerli maddə yoxdur, buna görə də xəritədə heç nə yoxdur.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_CHANNEL_DICTIONARY_CLASS_DOESNT_EXIST', "Xəta, kanalın lüğət sinfi yoxdur.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_MAP_ITEM_TYPES_INSTRUCTIONS', "Bu səhifədə kanal menecerinin lüğət elementlərini Jomresdə olanlar ilə xəritələməlisiniz.");

jr_define ('CHANNELMANAGEMENT_FRAMEWORK_USER_ACCOUNTS', "Kanal Yöneticisi Hesabları");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_USER_ACCOUNTS_DESC', "Zəhmət olmasa hesablarınız ola biləcək hər hansı kanal meneceri üçün icazə məlumatlarını yadda saxlayın.");
jr_define ('FINISH', 'Redaktəni bitirin');
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_EXTRAS_NOTINSTALLED', "Xəta, Əlavə Əlavələr plagini quraşdırılmadı.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_CHANNEL_NAME_NOT_SUPPLIED', "Kanal adı verilmir");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_NEW_PROPERTY_OBJECT_NOT_SUPPLIED', "Yeni mülkiyyət obyekti verilmir");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_THISJRUSER_OBJECT_NOT_SUPPLIES', "thisJRUser obyekti verilmir");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING', "Əmlak idxalına başlama");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTED', "Əmlak uğurla idxal edildi");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_FAILED', "Əmlak idxal edilə bilmədi");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT', "Bütün xassələri idxal et");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_ONE', "Əmlak idxalı");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_UNPUBLISHED_CANNOT_IMPORT', "Uzaq serverdə yayımlanmış/aktivləşdirilmiş kimi işarələnməyən və ya heç bir dəyişiklik maddəsi olmayan xüsusiyyətlər idxal edilə bilməz.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORTING', "Tarif idxalına başlama");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORTED', "Tarif uğurla idxal edildi");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORT_FAILED', "Tarif idxal edilə bilmədi");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_SETTINGS_FAILED_VALIDATION', "Mülkiyyət parametrləri doğrulanmadı, tanınmayan bir xüsusiyyət ayarı idxal edilməyə çalışıldı");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_PAGETITLE', "İdxal olunan xüsusiyyətlər");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_PROPERTY_NAME', "Mülkiyyət adı");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_CHANNEL_NAME', "Kanal adı");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_LOCAL_PROPERTY_UID', "Yerli mülkiyyət uid");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_REMOTE_PROPERTY_UID', "Uzaqdan mülkiyyət uid");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_EDIT_REMOTE_PROPERTY', "Uzaqdan idarə et");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_EDIT_LOCAL_PROPERTY', "Yerli görünüş");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_DELETE_LOCAL_PROPERTY', "Yerli sil");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MENUITEM_DASHBOARD', "Tablosuna");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MENUITEM_ACCOUNTS', "Kanal hesabları");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_THIN_CHANNELS_NOT_INSTALLED', "Quraşdırılmış nazik kanal plaginləri yoxdur, bu funksiyadan hələ istifadə edə bilməzsiniz");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_INFO', "İdarə etdiyiniz təyin edilməmiş xüsusiyyətlər bir kanala təyin edilə bilər. Kanalı dəyişdirsəniz etibarlı API girişi olan hər hansı bir kanalı verirsiniz");