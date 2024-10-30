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

jr_define('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_TITLE',"Domyślne ustawienia właściwości");
jr_define('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_CONFIGTITLE',"Tytuł konfiguracji ogólnej (jeśli jest dostępny, niektóre mogą nie być)");
jr_define('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_VARIABLENAME',"Nazwa zmiennej");
jr_define('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_CURRENTVALUE',"Aktualna wartość");
jr_define('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_WARNING',"Jest to zaawansowana funkcja, jeśli nie masz do niej konkretnego zastosowania, lepiej jej nie używać. Ta wtyczka pozwala modyfikować domyślne wartości nowej właściwości. upewnij się, że rozumiesz, co robi zmienna przed jej zmianą, ponieważ zmiana jej tutaj może mieć daleko idący wpływ na system Jomres.Puste elementy to zazwyczaj starsze ustawienia, które nie są już używane, ale pozostawione na miejscu ze względu na zgodność wsteczną lub są ustawieniami, które nie można modyfikować w obszarze Konfiguracja właściwości.");
jr_define('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_NEWVALUE',"Nowa wartość");