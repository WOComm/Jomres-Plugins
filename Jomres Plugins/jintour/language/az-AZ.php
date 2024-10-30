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
jr_define('_JINTOUR_TITLE',"Tur/Fəaliyyətin idarə edilməsi");

jr_define('_JINTOUR_PROFILES_TITLE',"Tur/Fəaliyyət profilləri");
jr_define ('_JINTOUR_PROFILES_NEW', "Yeni tur/fəaliyyət profili");
jr_define('_JINTOUR_PROFILES_DELETE',"Tur/fəaliyyət profilini silin");

jr_define('_JINTOUR_PROFILE_TITLE',"Profil başlığı");
jr_define ('_JINTOUR_PROFILE_DESCRIPTION', "Təsvir");
jr_define('_JINTOUR_PROFILE_DESCRIPTION_INFO',"Turunuzun/fəaliyyətinizin təsvirini, o cümlədən onun marşrutunu daxil edin.");
jr_define('_JINTOUR_PROFILE_HƏFTƏNİN_GÜNLƏRİ',"Həftənin günləri");
jr_define ('_JINTOUR_PROFILE_DAYS_OF_WEEK_INFO', "");
jr_define('_JINTOUR_PROFILE_PRICE_ADULTS',"Böyüklər üçün qiymət");
jr_define('_JINTOUR_PROFILE_PRICE_KIDS',"Uşaq qiyməti");
jr_define('_JINTOUR_PROFILE_PRICE_KIDS_INFO',"Opsiyonun rezervasiya formasında görünməsini istisna etmək üçün qiyməti 0 (sıfır) olaraq buraxın");
jr_define('_JINTOUR_PROFILE_SPACES_ADULTS',"Yetkinlər üçün boşluqlar");
jr_define('_JINTOUR_PROFILE_SPACES_KIDS',"Uşaq boşluqları");
jr_define('_JINTOUR_PROFILE_SPACES_INFO',"Tur/fəaliyyətdə mövcud boşluqların sayı");
jr_define('_JINTOUR_PROFILE_START_DATE',"Mövsümün başlanğıcı");
jr_define ('_JINTOUR_PROFILE_END_DATE', "Mövsüm başa çatır");

jr_define('_JINTOUR_PROFILE_GENERATE_INFO',"Tur/fəaliyyət profili yaratdıqdan sonra həmin profilin parametrlərinə əsasən turlar/fəaliyyətlər yaratmalı olacaqsınız. Tur/fəaliyyət yaradın, sonra həmin profilin yanındakı Yaşıl oxu işarəsinə klikləyin. turların/fəaliyyətlərin özləri. Turlar/fəaliyyətlər yaradıldıqdan sonra siz istəsəniz, fərdi turları/fəaliyyətləri silə biləcəksiniz.");
jr_define('_JINTOUR_PROFILE_GENERATE',"Turlar/fəaliyyətlər yaradın");

jr_define('_JINTOUR_TOUR_TITLE',"Fəaliyyət başlığı");
jr_define('_JINTOUR_TOUR_DATE',"Tarix");
jr_define('_JINTOUR_TOUR_ADULTS',"Böyüklər");
jr_define('_JINTOUR_TOUR_KIDS',"Uşaqlar");
jr_define('_JINTOUR_TOUR_ITINERY',"Marşrut proqramı");

jr_define('_JINTOUR_TOUR_SAVE_AUDIT',"Yeni turlar yaradıldı");
jr_define('_JINTOUR_TOUR_CANCEL_AUDIT',"Tur sifarişi ləğv edildi");
jr_define('_JINTOUR_TOUR_SAVE_MESSAGE',"Yeni turlar yaradıldı");
jr_define('_JINTOUR_TOUR_SPACES_CURRENTLY_AVAILABLE',"Hazırda mövcud boşluqlar");

jr_define ('_JINTOUR_TOUR_EMAIL_ADMIN_SUBJECT', "Tur/resurs id üçün yeni Rezervasiya");
jr_define('_JINTOUR_TOUR_EMAIL_ADMIN_MESSAGE',"Administrator turu/resursu üçün yeni rezervasiya edildi. Həmin turun administrator sahəsi səhifəsinə baxmaq üçün aşağıdakı linkə baxın ");

jr_define('_JINTOUR_TITLE_CONFIG',"Jomres İnteqrasiya edilmiş Turlar Konfiqurasiyası");
jr_define('_JINTOUR_TITLE_WHOLESITE',"Bütün quraşdırma Jintour quraşdırmasıdır?");
jr_define('_JINTOUR_TITLE_WHOLESITE_DESC',"Bunu Bəli kimi təyin etsəniz, bütün xüsusiyyətlər tur xassələri olacaq. Əgər onu Xeyr olaraq təyin etsəniz, yeni mülklər yaradılanda siz həm Tur, həm də Otel/Mənzil tipli xassələrə malik olacaqsınız. ");

jr_define('_JINTOUR_REGPROP_MANAGEMENTPROCESS_TOURS',"Turlar");
jr_define('_JINTOUR_REGPROP_MANAGEMENTPROCESS_TOURS_DESC',"Müəyyən tarixlərdə mövcud olan əşyalar üçün (məsələn, turlar, konsert biletləri) sifarişlər təklif edirsinizsə, turlar seçimini seçin");
jr_define('_JINTOUR_SHOWDEPARTURE',"Gediş giriş sahəsini göstərin?");
jr_define('_JINTOUR_SHOWDEPARTURE_DESC',"Həm gəliş, həm də gediş tarixini göstərmək istəyirsinizsə, bunu Bəli olaraq təyin edin. Bu, həm gələn, həm də gedən tarixləri bilməli olduğunuz avtobus səfərləri, təyyarə biletləri və s. təklif edirsinizsə faydalı olardı, gediş tarixinin göstərilməsi, birdən çox tarix üzərində qaynaqlar təklif etməyə imkan verir, halbuki Xeyr olaraq təyin edildikdə, yalnız bir tarix üçün rezervasyonlar qəbul edilə bilər. ");

jr_define('_JINTOUR_PROFILES_TITLE_LIST',"Turlar Siyahısı");