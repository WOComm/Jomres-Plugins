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
jr_define('TOOL_HYPHEN_CHECK_TITLE',"Átkötőjel-ellenőrzés");
jr_define('TOOL_HYPHEN_CHECK_DESCRIPTION',"Ez az eszköz az összes tulajdonság késés és hosszú mezők ellenőrzésére szolgál. Egyes esetekben hibásan html entitások szerepelnek a lat vagy long mezőben a tényleges kötőjelek helyett. Ahol ez az eszköz ezeket kötőjelekké alakítja.");
jr_define('TOOL_HYPHEN_CHECK_DONE_SOMEFOUND',"Néhány tulajdonság található html-entitással, amelyeket most tényleges kötőjelekké alakítottunk át. Az átalakított tulajdonságok száma ");
jr_define ('TOOL_HYPHEN_CHECK_DONE_NONEFOUND', "Minden rendben van, nem találtunk olyan tulajdonságokat a html entitásoknál, ahol a kötőjelnek lennie kellene.");