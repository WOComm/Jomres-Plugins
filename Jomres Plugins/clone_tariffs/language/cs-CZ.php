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
jr_define('_CLONE_TARIFFS_TITLE',"Klonovací tarify");
jr_define('_CLONE_TARIFFS_INFO',"Zde můžete naklonovat tarif z cílové vlastnosti do zdrojové vlastnosti. K dispozici vám budou pouze vlastnosti, které máte oprávnění spravovat.");
jr_define('_CLONE_TARIFFS_SOURCE',"Vlastnost zdroje");
jr_define('_CLONE_TARIFFS_TARIFF_TO_CLONE',"Tarif pro klonování");
jr_define('_CLONE_TARIFFS_TARGET',"Cílová vlastnost");
jr_define('_CLONE_TARIFFS_TARGET_ROOMTYPE',"Typ místnosti cílové nemovitosti");
jr_define('_CLONE_TARIFFS_TARGET_WARNING',"Pokud se režim úpravy tarifu cílové vlastnosti liší od režimu úpravy tarifu zdrojové vlastnosti, pak při klonování budou původní tarify cílové vlastnosti odstraněny a její režim úpravy tarifů se změní tak, aby odrážel režim Zdroje nastavení nemovitosti.");
jr_define('_CLONE_TARIFFS_TARGET_DELETE_EXISTING',"Smazat stávající tarify na majetku Target?");
jr_define('_CLONE_TARIFFS_TARGET_DELETE_OPTION',"Pokud je režim úpravy tarifu vlastnosti Cíl stejný jako u vlastnosti Zdroj, pak stávající tarify nebudou smazány. Můžete se však rozhodnout to přepsat nastavením této možnosti na Ano.");