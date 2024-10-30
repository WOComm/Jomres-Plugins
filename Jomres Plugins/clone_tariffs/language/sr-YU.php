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

jr_define('_CLONE_TARIFFS_TITLE',"Kloniranje tarifa");
jr_define('_CLONE_TARIFFS_INFO',"Ovde možete klonirati tarifu iz ciljnog svojstva u izvorno svojstvo (iz jednog objekta u drugi). Biće vam dostupni samo objekti za koje imate ovlašćenje da njima upravljate.");
jr_define('_CLONE_TARIFFS_SOURCE',"Izvorni objekat");
jr_define('_CLONE_TARIFFS_TARIFF_TO_CLONE',"Tarifa za kloniranje");
jr_define('_CLONE_TARIFFS_TARGET',"Ciljani objekat");
jr_define('_CLONE_TARIFFS_TARGET_ROOMTYPE',"Tip sobe ciljanog objekta");
jr_define('_CLONE_TARIFFS_TARGET_WARNING',"Ako se režim za uređivanje tarife ciljnog objekta razlikuje od režima za uređivanje tarife izvornog objekta, onda kada se kloniranje dogodi, originalne tarife ciljnog objekta će biti izbrisane i njegov režim za uređivanje tarife će biti promenjen tako da odražava postavku izvornog objekta.");
jr_define('_CLONE_TARIFFS_TARGET_DELETE_EXISTING',"Izbrišite postojeće tarife na targetiranom objektu?");
jr_define('_CLONE_TARIFFS_TARGET_DELETE_OPTION',"Ako je režim za uređivanje tarifa ciljnog objekta isti kao izvorni objekat, postojeće tarife neće biti izbrisane. Međutim, možete izabrati da ovo zaobiđete tako što ćete ovu opciju postaviti na Da.");
