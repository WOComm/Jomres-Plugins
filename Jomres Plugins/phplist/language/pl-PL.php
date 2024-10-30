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
jr_define('_PHPLIST_INSTRUCTIONS',"Wtyczka integruje Jomres z PHPList i umożliwia automatyczne dodawanie nazwy i adresu e-mail klienta do listy mailingowej podczas dokonywania rezerwacji.");
jr_define('_PHPLIST_HSKIPCONFEMAIL',"Pominąć e-mail z potwierdzeniem subskrypcji?");
jr_define('_PHPLIST_HSENDHTMLEMAILS',"Wysyłać e-maile w formacie HTML?");
jr_define('_PHPLIST_HPHPLISTURL',"Podstawowy adres URL strony głównej PHPList");
jr_define('_PHPLIST_HPHPLISTURL_DESC',"URL musi mieć końcowy ukośnik i nie może zawierać żadnych parametrów");
jr_define('_PHPLIST_HUSER',"Nazwa użytkownika administratora PHPList");
jr_define('_PHPLIST_HPASS',"Hasło administratora PHPList");
jr_define('_PHPLIST_HATTRIB1',"atrybut1");
jr_define('_PHPLIST_HATTRIB1_DESC',"Nazwa atrybutu/pola PHPList, w którym chcesz przechowywać imię gościa. Pozostaw puste dla żadnego.");
jr_define('_PHPLIST_HATTRIB2',"atrybut2");
jr_define('_PHPLIST_HATTRIB2_DESC',"Nazwa atrybutu/pola PHPList, w którym chcesz zapisać nazwisko gościa. Pozostaw puste dla żadnego.");
jr_define('_PHPLIST_HLIST_ID',"Identyfikator listy mailingowej");