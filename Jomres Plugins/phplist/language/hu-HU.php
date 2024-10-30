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
jr_define ('_PHPLIST_INSTRUCTIONS', "Ez a beépülő modul integrálja a Jomres -t a PHPList -el, és lehetővé teszi, hogy a foglalás során automatikusan hozzáadja az ügyfelek nevét és e -mail címét a levelezőlistához.");
jr_define('_PHPLIST_HSKIPCONFEMAIL',"A feliratkozást megerősítő e-mail kihagyása?");
jr_define('_PHPLIST_HSENDHTMLEMAILS',"HTML e-maileket küld?");
jr_define('_PHPLIST_HPHPLISTURL',"PHPLista kezdőlap alap URL-je");
jr_define('_PHPLIST_HPHPLISTURL_DESC',"Az url-nek perjelnek kell lennie, és ne használjon paramétereket");
jr_define('_PHPLIST_HUSER',"PHPLista rendszergazdai felhasználónév");
jr_define('_PHPLIST_HPASS',"PHPList rendszergazdai jelszó");
jr_define('_PHPLIST_HATTRIB1',"attribútum1");
jr_define('_PHPLIST_HATTRIB1_DESC',"PHPLista attribútum/mező neve, ahol a vendég keresztnevét tárolni szeretné. Hagyja üresen, ha nincs.");
jr_define('_PHPLIST_HATTRIB2',"attribútum2");
jr_define('_PHPLIST_HATTRIB2_DESC',"PHPLista attribútum/mező neve, ahol a vendég vezetéknevét tárolni szeretné. Hagyja üresen, ha nincs.");
jr_define('_PHPLIST_HLIST_ID',"Levelezőlista azonosítója");