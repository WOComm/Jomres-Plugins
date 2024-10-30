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
jr_define ('_JOMRES_DATAWIPE_TITLE', "Məlumatların silinməsi");
jr_define ('_JOMRES_DATAWIPE_DESC', "Bu xüsusiyyət, sifariş verilərkən toplanan məlumatları silmək imkanı verir. Quraşdırmalarında (test sifarişləri, abunəliklər kimi) bir çox inkişaf məlumatı yaradan və bunu etmək istəyən inkişaf etdiricilərin istifadəsi üçün nəzərdə tutulmuşdur. Əmlak və tarif məlumatlarını saxlayarkən məlumatları sistemdən silin. <br/> Plugin ALL cron qeydlərini, istifadəçilərin sevimlilərini, qeydlərini, sifarişlərini, fakturalarını, abunəçilərini, abunələrini, qonaqlarını, yoxlama məlumatlarını, klik saylarını və rəyləri siləcək. " );
jr_define ('_JOMRES_DATAWIPE_WARNING', "Bu məlumatlar yalnız sisteminizin ehtiyat nüsxəsindən götürülə bilər, buna görə də bunun çox zərərli bir skript olduğunu başa düşməlisiniz. Nəticədə onu təyinatı üzrə istifadə etdikdən sonra tövsiyə olunur. məqsəd ondan sonra yenidən silməkdir. ");
jr_define ('_JOMRES_DATAWIPE_GO', "Veriləri silmək üçün tıklayın");
jr_define ('_JOMRES_DATAWIPE_EMPTYING', "Boşaltma");
jr_define ('_JOMRES_DATAWIPE_EMPTYING_SUCCESS', "Uğurla boşaldıldı");
jr_define ('_JOMRES_DATAWIPE_EMPTYING_FAILURE', "Cədvəl boşalmadı.");