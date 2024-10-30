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

jr_define ('_OAUTH_SCOPE_CHANNEL_MANAGEMENT', "Kanal İdarəçiliyi");
jr_define ('_OAUTH_SCOPE_CHANNEL_MANAGEMENT_DESC', "Müştəri Kanal İdarəetmə fəaliyyətlərini həyata keçirə bilər. Qeyd edək ki, bu, müştəriyə hesablarınızı və xüsusiyyətlərinizi dəyişdirmək üçün sistemdə xeyli güc verir.");

jr_define ('_OAUTH_SCOPE_CHANNEL_MANAGEMENT_CLEANING_PRICE', "Təmizləmə");

jr_define ('_CMF_CANCELLED_BOOKING', "Kanal meneceri sifarişi ləğv etdi");

jr_define ('_CMF_CLEANING_STRING', "Təmizləmə"); // Xüsusiyyətləri artıq idxal etmisinizsə bunu dəyişməyin. Təmizlik haqqı olan mülklərin bu adı olan bir Əlavə var
jr_define ('_CMF_SECURITY_STRING', "Təhlükəsizlik depoziti"); // Xüsusiyyətləri artıq idxal etmisinizsə bunu dəyişməyin. Təhlükəsizlik depozitləri olan mülklərin bu adda Əlavə var


jr_define ('_CMF_API_PRIVACY', "API Məxfiliyi");
jr_define ('_CMF_API_PRIVACY_ON', "Gizlilik aktivdir");
jr_define ('_CMF_API_PRIVACY_OFF', "Gizlilik deaktivdir");

jr_define ('_CMF_API_PRIVACY_DESC', "Mülkiyyət məlumatı yalnız onu yaradan kanal tərəfindən görülə bilər. Məsələn, həm Kanal A, həm də Kanal B -yə fərqli API açar cütləri vermisinizsə, Kanal A tərəfindən yaradılan bir mülkün məlumatı Kanal B tərəfindən görülə bilər ... bütün kanalların API vasitəsilə bütün mülkiyyət məlumatlarını görməsinə icazə vermək üçün API Məxfiliyini söndürməsəniz. Bu mülkü mülkiyyət siyahısına salmaq istəyən başqa bir saytla paylaşırsınızsa API Məxfiliyini Off olaraq təyin edin. Bu mülkü başqa saytlarla paylaşmırsınızsa, API Məxfiliyini On olaraq qoyun. ");