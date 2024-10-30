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


jr_define('_CLONE_TARIFFS_TITLE',"Tarife de clonare");
jr_define('_CLONE_TARIFFS_INFO',"Aici puteți clona un tarif de la o proprietate țintă la o proprietate sursă. Numai proprietățile pe care aveți autoritatea de a le administra vă vor fi disponibile.");
jr_define('_CLONE_TARIFFS_SOURCE',"Proprietatea sursei");
jr_define('_CLONE_TARIFFS_TARIFF_TO_CLONE',"Tarif de clonat");
jr_define('_CLONE_TARIFFS_TARGET',"Proprietate țintă");
jr_define('_CLONE_TARIFFS_TARGET_ROOMTYPE',"Tip de cameră de proprietate vizată");
jr_define('_CLONE_TARIFFS_TARGET_WARNING',"Dacă modul de editare a tarifelor proprietății țintă este diferit de modul de editare a tarifelor proprietății Sursă, atunci când are loc clonarea, tarifele originale ale proprietății țintă vor fi șterse și modul de editare a tarifelor acestuia se va schimba pentru a reflecta pe cel al sursei. setarea proprietății.");
jr_define('_CLONE_TARIFFS_TARGET_DELETE_EXISTING',"Ștergeți tarifele existente pe proprietatea țintă?");
jr_define('_CLONE_TARIFFS_TARGET_DELETE_OPTION',"Dacă modul de editare a tarifului proprietății țintă este același cu proprietatea Sursă, atunci tarifele existente nu vor fi șterse. Puteți, totuși, să alegeți să înlocuiți această opțiune setând această opțiune la Da.");