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



jr_define('_OCCUPANCIES_TITLE',"Minimalna zasedenost");

jr_define('_OCCUPANCIES_DESCRIPTION',"Nastavite lahko najmanjšo zasedenost za določene vrste sob, če želite zagotoviti, da je gost izbral določeno število vrst gostov v obrazcu za rezervacijo, preden se prikaže ustrezna kombinacija sobe in tarife." );
jr_define('_OCCUPANCIES_DESCRIPTION_INFO',"Tu lahko ustvarite najnižjo raven zasedenosti za vsako vrsto sobe. Kombinacija soba/tarifa ne bo na voljo, če gost ni izbral ustreznega števila vrst gostov. Za vsako vrsto sobe izberite število gostov določene vrste, ki mora biti minimalno v obrazcu za rezervacijo, preden se ponudi vrsta sobe. Če vam ni vseeno, kakšna naj bo zasedenost za vrsto sobe, pustite številko gosta te vrste sobe nastavljeno na 0 (nič). ");
jr_define('_OCCUPANCIES_NUMBER_OF_GUESTTYPE',"Številka vrste gosta");
jr_define('_OCCUPANCIES_NO_GUESTTYPES',"Še niste ustvarili nobene vrste gostov. Pred uporabo te funkcije ustvarite nekaj vrst gostov.");

jr_define('_OCCUPANCIES_EDIT',"Uredi najmanjšo zasedenost za ");