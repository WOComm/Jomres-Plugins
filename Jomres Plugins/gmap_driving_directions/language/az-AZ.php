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
jr_define('_JRPORTAL_GMAPS_DD_YES',"Bəli");
jr_define('_JRPORTAL_GMAPS_DD_NO',"Xeyr");
jr_define ('_GOOGLE_ADDRESS', "Ünvan");
jr_define('_GOOGLE_INPUT_FIELDSET_POSTALCODE',"Poçt kodu");
jr_define ('_GOOGLE_INPUT_FIELDSET_TOWN', "Şəhər");
jr_define('_GOOGLE_INITIALIZE_ERROR1',"Maksimum 9 keçid nöqtəsi çatdı");
jr_define('_GOOGLE_INITIALIZE_ERROR2',"Google bu marşrut və seçilmiş seçimlər üçün istiqamətləri hesablaya bilmədi");
jr_define('_GOOGLE_DIRECTION_PRINT',"Çap istiqamətləri");
jr_define('_GOOGLE_ROUTEPLANNING',"Marşrutunuzu planlaşdırın ");
jr_define('_GOOGLE_ROUTEPLANNING_HYOURLOCATION',"Məkanınız (marşrutun başlanğıc nöqtəsi)");
jr_define('_GOOGLE_ROUTEPLANNING_HROUTEOPTIONS',"Marşrut seçimləri");
jr_define('_GOOGLE_ROUTEPLANNING_HOPTIMIZEFOR',"Optimallaşdır");
jr_define('_GOOGLE_ROUTEPLANNING_HDRIVING',"Sürüş");
jr_define('_GOOGLE_ROUTEPLANNING_HWALKING',"Gəzinti");
jr_define('_GOOGLE_ROUTEPLANNING_HCYCLING',"Velosiped sürmə");
jr_define('_GOOGLE_ROUTEPLANNING_HHIGHWAYS',"Magistral yollardan qaçın");
jr_define('_GOOGLE_ROUTEPLANNING_HTOLLS',"Ödənişli yollardan qaçın");
jr_define ('_GOOGLE_SELECT_BUTTON', "İstiqamətləri əldə et");
jr_define('_GOOGLE_SELECT_RESETMAP',"Xəritəni sıfırla");
jr_define ('_GOOGLE_ROUTEPLANNING_INSTRUCTIONS', "Hedefiniz (marşrutun bitmə nöqtəsi) artıq xəritədə qeyd edilmişdir. Zəhmət olmasa, təyinat nöqtəsinə istiqamət almaq üçün yerinizi daxil edin və marşrut seçimlərinizi seçin. 9 -a qədər seçmək üçün xəritəni vura bilərsiniz. başlanğıc nöqtəsindən təyinat nöqtəsinə qədər yol nöqtələri. ");