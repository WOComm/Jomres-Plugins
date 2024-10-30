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
jr_define('_CLONE_TARIFFS_TITLE',"Klonovanie taríf");
jr_define('_CLONE_TARIFFS_INFO',"Tu môžete naklonovať tarifu z cieľovej nehnuteľnosti na zdrojovú. Budete mať k dispozícii iba vlastnosti, ktoré máte oprávnenie spravovať.");
jr_define('_CLONE_TARIFFS_SOURCE',"Vlastnosť zdroja");
jr_define('_CLONE_TARIFFS_TARIFF_TO_CLONE',"Tarif na klonovanie");
jr_define('_CLONE_TARIFFS_TARGET',"Cieľová nehnuteľnosť");
jr_define('_CLONE_TARIFFS_TARGET_ROOMTYPE',"Typ miestnosti v cieľovom objekte");
jr_define('_CLONE_TARIFFS_TARGET_WARNING',"Ak je režim úpravy taríf cieľovej vlastnosti odlišný od režimu úpravy taríf zdrojovej vlastnosti, potom keď dôjde ku klonovaniu, pôvodné tarify cieľovej nehnuteľnosti budú vymazané a jej režim úpravy taríf sa zmení tak, aby odrážal režim zdroja nastavenie nehnuteľnosti.");
jr_define('_CLONE_TARIFFS_TARGET_DELETE_EXISTING',"Vymazať existujúce tarify na cieľovom majetku?");
jr_define('_CLONE_TARIFFS_TARGET_DELETE_OPTION',"Ak je režim úpravy taríf cieľovej vlastnosti rovnaký ako zdrojová vlastnosť, potom sa existujúce tarify nevymažú. Môžete sa však rozhodnúť to prepísať nastavením tejto možnosti na Áno.");