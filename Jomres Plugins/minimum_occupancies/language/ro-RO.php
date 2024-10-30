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


jr_define('_OCCUPANCIES_TITLE',"Ocupări minime");

jr_define('_OCCUPANCIES_DESCRIPTION',"Puteți seta nivelurile minime de ocupare pentru anumite tipuri de camere, dacă doriți să vă asigurați că oaspetele a selectat un anumit număr de tipuri de oaspeți în formularul de rezervare înainte ca combinația corespunzătoare de cameră și tarif să fie afișată." );
jr_define('_OCCUPANCIES_DESCRIPTION_INFO',"Aici puteți crea un nivel minim de ocupare pentru fiecare tip de cameră. O combinație cameră/tarif nu va fi oferită dacă oaspetele nu a selectat numărul adecvat de tipuri de oaspeți. Pentru fiecare tip de cameră, vă rugăm să selectați numărul de oaspeți de un anumit tip, care ar trebui să fie un minim în formularul de rezervare înainte de oferirea tipului de cameră. Dacă nu vă pasă care ar trebui să fie nivelul de ocupare pentru un tip de cameră, lăsați numărul de oaspeți al tipului de cameră setat la 0 (zero).");
jr_define ('_OCCUPANCIES_NUMBER_OF_GUESTTYPE', "Număr tip invitat");
jr_define('_OCCUPANCIES_NO_GUESTTYPES',"Nu ați creat încă niciun tip de invitați. Vă rugăm să creați câteva tipuri de invitați înainte de a utiliza această funcție.");

jr_define('_OCCUPANCIES_EDIT',"Editați ocuparea minimă pentru ");