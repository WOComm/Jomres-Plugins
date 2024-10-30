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
jr_define('_CLONE_TARIFFS_TITLE',"Klonuj taryfy");
jr_define('_CLONE_TARIFFS_INFO',"Tutaj możesz sklonować taryfę z właściwości docelowej do właściwości źródłowej. Tylko te właściwości, do których zarządzania masz uprawnienia, będą dostępne.");
jr_define('_CLONE_TARIFFS_SOURCE',"Właściwość źródła");
jr_define('_CLONE_TARIFFS_TARIFF_TO_CLONE',"Taryfa do sklonowania");
jr_define('_CLONE_TARIFFS_TARGET',"Właściwość docelowa");
jr_define('_CLONE_TARIFFS_TARGET_ROOMTYPE',"Typ pokoju właściwości docelowej");
jr_define('_CLONE_TARIFFS_TARGET_WARNING',"Jeżeli tryb edycji taryfy właściwości docelowej różni się od trybu edycji taryfy właściwości Źródłowej, to po wykonaniu klonowania oryginalne taryfy właściwości docelowej zostaną usunięte, a tryb edycji taryfy zostanie zmieniony w celu odzwierciedlenia trybu źródłowego ustawienie właściwości.");
jr_define('_CLONE_TARIFFS_TARGET_DELETE_EXISTING',"Usunąć istniejące taryfy we właściwościach docelowych?");
jr_define('_CLONE_TARIFFS_TARGET_DELETE_OPTION',"Jeżeli tryb edycji taryf właściwości docelowej jest taki sam jak właściwość Źródło, istniejące taryfy nie zostaną usunięte. Możesz jednak zmienić to ustawienie, ustawiając tę ​​opcję na Tak.");