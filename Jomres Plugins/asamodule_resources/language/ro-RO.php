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


jr_define ('_JOMRES_SHORTCODES_06000ASAMODULE_RESOURCES', "Afișează o proprietate camere / resurse într-un widget / modul ASAModule. Util pentru site-urile web cu o singură proprietate.");

jr_define ('_JOMRES_SHORTCODES_06000ASAMODULE_RESOURCES_ASAMODULE_RESOURCES_PUID', "Obligatoriu. Uidul de proprietate pentru care doriți să afișați resursele.");
jr_define ('_JOMRES_SHORTCODES_06000ASAMODULE_RESOURCES_ASAMODULE_RESOURCES_IDS', "Obligatoriu. ID-urile resurselor (de ex. camere) pe care doriți să le afișați. Listă de ID-uri separate prin virgulă.");
jr_define ('_JOMRES_SHORTCODES_06000ASAMODULE_RESOURCES_ARRIVALDATE', "Opțional. Setați data sosirii în formatul care corespunde cu Configurarea site-ului> fila Calendar> Setarea formatului de introducere a calendarului. De exemplu, 01/02/2018. Acest lucru vă permite să afișați prețurile camerei specifice la anumite date în viitor, presupunând că ați stabilit tarife care acoperă acele date. ");
