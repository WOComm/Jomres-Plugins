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
jr_define ('_PHPLIST_INSTRUCTIONS', "Bu plagin Jomres'i PHPList ilə birləşdirir və sifariş verərkən müştərilərin adını və e -poçtunu avtomatik olaraq poçt siyahısına əlavə etməyə imkan verir.");
jr_define ('_PHPLIST_HSKIPCONFEMAIL', "Abunəlik təsdiq e -poçtu atlansın?");
jr_define('_PHPLIST_HSENDHTMLEMAILS',"HTML e-poçtları göndərilsin?");
jr_define ('_PHPLIST_HPHPLISTURL', "PHPList ön səhifəsinin əsas URL'si");
jr_define('_PHPLIST_HPHPLISTURL_DESC',"url-də arxa xətt olmalıdır və heç bir parametrdən istifadə etməyin");
jr_define('_PHPLIST_HUSER',"PHPList admin istifadəçi adı");
jr_define('_PHPLIST_HPASS',"PHPList admin parolu");
jr_define('_PHPLIST_HATTRIB1',"atribut1");
jr_define('_PHPLIST_HATTRIB1_DESC',"Qonaq adını saxlamaq istədiyiniz PHPList atribut/sahə adı. Heç biri üçün boş qoymayın.");
jr_define('_PHPLIST_HATTRIB2',"atribut2");
jr_define('_PHPLIST_HATTRIB2_DESC',"Qonaq soyadını saxlamaq istədiyiniz PHPList atribut/sahə adı. Heç biri üçün boş qoymayın.");
jr_define('_PHPLIST_HLIST_ID',"Poçt siyahısı ID");