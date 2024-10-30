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


jr_define ('_JOMRES_DATAWIPE_TITLE', "Ștergerea datelor");
jr_define ("_ JOMRES_DATAWIPE_DESC", "Această caracteristică vă permite să ștergeți datele colectate la efectuarea rezervărilor. Este destinată utilizării de către dezvoltatori care au creat o mulțime de date de dezvoltare pe instalațiile lor (cum ar fi rezervări de testare, abonamente) și doresc să ștergeți informațiile din sistem, păstrând în același timp informațiile despre proprietate și tarif. <br/> Pluginul va elimina TOATE jurnalele cron, preferințele utilizatorilor, notele, rezervările, facturile, abonații, abonamentele, oaspeții, datele de audit, numărul de clicuri și recenziile. " );
jr_define ('_JOMRES_DATAWIPE_WARNING', "Aceste date pot fi preluate numai dintr-o copie de rezervă a sistemului dvs., deci trebuie să înțelegeți că acesta este un script foarte dăunător. Ca urmare, se recomandă ca odată ce le-ați utilizat pentru că este destinat scopul că îl dezinstalați din nou după aceea. ");
jr_define ('_JOMRES_DATAWIPE_GO', "Faceți clic pentru a șterge datele");
jr_define ('_JOMRES_DATAWIPE_EMPTYING', "Golire");
jr_define ('_JOMRES_DATAWIPE_EMPTYING_SUCCESS', "Golit cu succes.");
jr_define ('_JOMRES_DATAWIPE_EMPTYING_FAILURE', "Nu s-a putut goli masa.");