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
jr_define('_OCCUPANCIES_TITLE',"Ocupació mínima");

jr_define ('_OCCUPANCIES_DESCRIPTION', "Podeu establir els nivells mínims d'ocupació per a tipus d'habitació específics, si voleu assegurar-vos que el client hagi seleccionat un nombre determinat de tipus de convidats al formulari de reserva abans que es mostri la combinació adequada d'habitacions i tarifes." );
jr_define('_OCCUPANCIES_DESCRIPTION_INFO',"Aquí podeu crear un nivell d'ocupació mínim per a cada tipus d'habitació. No s'oferirà una combinació d'habitació/tarifa si el client no ha seleccionat el nombre adequat de tipus de convidats. Per a cada tipus d'habitació, seleccioneu el nombre d'hostes d'un tipus determinat que hi hauria d'haver un mínim al formulari de reserva abans d'oferir el tipus d'habitació. Si no us importa quin ha de ser el nivell d'ocupació d'un tipus d'habitació, deixeu el número de convidat d'aquest tipus d'habitació establert a 0 (zero). ");
jr_define('_OCCUPANCIES_NUMBER_OF_GUESTTYPE',"Número de tipus de convidat");
jr_define ('_OCCUPANCIES_NO_GUESTTYPES', "Encara no heu creat cap tipus de convidat. Creeu alguns tipus de convidats abans d'utilitzar aquesta funció.");

jr_define('_OCCUPANCIES_EDIT',"Edita l'ocupació mínima per a ");