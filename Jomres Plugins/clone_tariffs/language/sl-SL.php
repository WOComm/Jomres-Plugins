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

jr_define('_CLONE_TARIFFS_TITLE',"Tarife za kloniranje");
jr_define('_CLONE_TARIFFS_INFO',"Tukaj lahko klonirate tarifo iz ciljne lastnosti v izvorno lastnost. Na voljo vam bodo samo lastnosti, za katere imate pooblastilo za upravljanje.");
jr_define('_CLONE_TARIFFS_SOURCE',"Izvorna lastnost");
jr_define('_CLONE_TARIFFS_TARIFF_TO_CLONE',"Tarifa za kloniranje");
jr_define('_CLONE_TARIFFS_TARGET',"Ciljna lastnost");
jr_define('_CLONE_TARIFFS_TARGET_ROOMTYPE',"Ciljna vrsta sobe v lastništvu");
jr_define('_CLONE_TARIFFS_TARGET_WARNING',"Če je način urejanja tarif ciljne lastnosti drugačen od načina urejanja tarif izvorne lastnosti, bodo, ko se izvede kloniranje, izvirne tarife ciljne lastnosti izbrisane in njen način urejanja tarife se spremeni tako, da odraža način urejanja tarife izvorne lastnosti nastavitev lastnine.");
jr_define('_CLONE_TARIFFS_TARGET_DELETE_EXISTING',"Izbriši obstoječe tarife na ciljni lastnini?");
jr_define('_CLONE_TARIFFS_TARGET_DELETE_OPTION',"Če je način urejanja tarif ciljne lastnosti enak kot lastnost Source, obstoječe tarife ne bodo izbrisane. Lahko pa to preglasite tako, da to možnost nastavite na Da.");