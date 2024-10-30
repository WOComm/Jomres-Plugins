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

jr_define( '_JOMRES_SHORTCODES_06000ASAMODULE_RESOURCES', "Pokazuje pomieszczenia/zasoby własności w widżecie/module ASAModule. Przydatne dla witryn z pojedynczymi obiektami." );

jr_define( '_JOMRES_SHORTCODES_06000ASAMODULE_RESOURCES_ASAMODULE_RESOURCES_PUID', "Wymagane. Identyfikator właściwości, dla którego chcesz wyświetlić zasoby." );
jr_define( '_JOMRES_SHORTCODES_06000ASAMODULE_RESOURCES_ASAMODULE_RESOURCES_IDS', "Wymagane. Identyfikatory zasobów (np. pokoi), które chcesz pokazać. Lista identyfikatorów oddzielonych przecinkami." );
jr_define( '_JOMRES_SHORTCODES_06000ASAMODULE_RESOURCES_ARRIVALDATE', "Opcjonalne. Ustaw datę przyjazdu w formacie odpowiadającym ustawieniu Konfiguracja witryny > Kalendarz > Format wprowadzania danych kalendarza. Np. 01.02.2018. Pozwala to wyświetlić określone ceny pokoi w określonych dniach w przyszłość, zakładając, że masz ustawione taryfy obejmujące te daty." );
