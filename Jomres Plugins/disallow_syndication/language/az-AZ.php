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
jr_define ('DISALLOW_SYNDICATION_TITLE', "Sindikasiyaya icazə verməyin");
jr_define ('DISALLOW_SYNDICATION_DESCRIPTION', 'Jomres.net sindikasiya xüsusiyyəti, saytlar arasında xassələri bölüşmək üçün nəzərdə tutulmuş yeni funksionallıqdır, lakin sifariş yalnız Ev serverində edilə bilər.');

jr_define ('DISALLOW_SYNDICATION_DESCRIPTION_MORE', "Bunun məqsədi saytların axtarış motorları ilə etibar yaratmalarını təmin etməkdir. Bu, bütün Jomres istifadəçiləri üçün əlçatan olan pulsuz bir xüsusiyyətdir. Aktiv Jomres lisenziya sahibləri, əgər istəsələr, sənədlərini silmək istəyə bilərlər. bu səhifədən sindikat şəbəkəsindən sayt. Localhost şəbəkəyə əlavə edilə bilməz və hər hansı bir səbəbdən əlaqə problemi varsa, saytınızı şəbəkəyə əlavə edə bilməyəcəksiniz. REST API keçid test səhifəsinə baxın hər hansı bir şübhə var. ");

jr_define ('DISALLOW_SYNDICATION_INSTRUCTIONS_DISALLOW', "Saytınızı şəbəkədən çıxarmaq üçün bu linki vurun.");
jr_define ('DISALLOW_SYNDICATION_INSTRUCTIONS_ALLOW', "Saytınızı şəbəkəyə əlavə etmək üçün bu linki vurun.");

jr_define ('DISALLOW_SYNDICATION_DISALLOW', "Bu saytı şəbəkədən silin");
jr_define ('DISALLOW_SYNDICATION_ALLOW', "Bu saytı şəbəkəyə əlavə et");

jr_define ('DISALLOW_SYNDICATION_INVALID_KEY', "Üzr istəyirik, dəstək açarınız etibarlı deyil və ya aktiv deyil, bu quraşdırmanın sindikat vəziyyətini dəyişə bilməzsiniz.");