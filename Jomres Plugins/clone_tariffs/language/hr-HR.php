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

jr_define('_CLONE_TARIFFS_TITLE',"Clone tarife");
jr_define('_CLONE_TARIFFS_INFO',"Ovdje možete klonirati tarifu iz ciljnog svojstva u izvorno svojstvo. Bit će vam dostupna samo svojstva za koja imate ovlasti za upravljanje.");
jr_define('_CLONE_TARIFFS_SOURCE',"Izvorno svojstvo");
jr_define('_CLONE_TARIFFS_TARIFF_TO_CLONE',"Tarifa za kloniranje");
jr_define('_CLONE_TARIFFS_TARGET',"Ciljano svojstvo");
jr_define('_CLONE_TARIFFS_TARGET_ROOMTYPE',"Ciljana vrsta sobe nekretnine");
jr_define('_CLONE_TARIFFS_TARGET_WARNING',"Ako se način uređivanja tarife ciljnog svojstva razlikuje od načina uređivanja tarife izvornog svojstva, onda kada se kloniranje dogodi, izvorne tarife ciljnog svojstva bit će izbrisane i njegov način uređivanja tarife će se promijeniti kako bi odražavao način uređivanja izvora postavka imovine.");
jr_define('_CLONE_TARIFFS_TARGET_DELETE_EXISTING',"Izbrisati postojeće tarife na Target svojstvu?");
jr_define('_CLONE_TARIFFS_TARGET_DELETE_OPTION',"Ako je način uređivanja tarifa Target svojstva isti kao izvorni svojstvo, postojeće tarife neće biti izbrisane. Možete, međutim, odabrati da to nadjačate tako da ovu opciju postavite na Da.");