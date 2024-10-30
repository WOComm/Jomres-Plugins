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
jr_define('_JOMRES_DATAWIPE_TITLE',"Czyszczenie danych");
jr_define('_JOMRES_DATAWIPE_DESC',"Ta funkcja umożliwia usuwanie danych zbieranych podczas dokonywania rezerwacji. Jest przeznaczona dla programistów, którzy stworzyli wiele danych programistycznych w swoich instalacjach (takich jak rezerwacje testowe, subskrypcje) i chcą wyczyść informacje z systemu, zachowując informacje o nieruchomościach i taryfach.<br/> Wtyczka usunie WSZYSTKIE dzienniki cron, ulubione użytkowników, notatki, rezerwacje, faktury, subskrybentów, subskrypcje, gości, dane audytu, liczbę kliknięć i recenzje." );
jr_define('_JOMRES_DATAWIPE_WARNING',"Te dane można pobrać tylko z kopii zapasowej twojego systemu, więc musisz zrozumieć, że jest to bardzo szkodliwy skrypt. W rezultacie zaleca się, aby po użyciu go zgodnie z przeznaczeniem w celu ponownego odinstalowania go później.");
jr_define('_JOMRES_DATAWIPE_GO',"Kliknij, aby wyczyścić dane");
jr_define('_JOMRES_DATAWIPE_EMPTYING',"Opróżnianie");
jr_define('_JOMRES_DATAWIPE_EMPTYING_SUCCESS',"Opróżniono pomyślnie.");
jr_define('_JOMRES_DATAWIPE_EMPTYING_FAILURE',"Opróżnienie tabeli nie powiodło się.");