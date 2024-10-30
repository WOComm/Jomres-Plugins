<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.24.0
 *
 * @copyright	2005-2021 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/
//#################################################################
defined('_JOMRES_INITCHECK') or die('');
//#################################################################

jr_define ('DISALLOW_SYNDICATION_TITLE', "Neatļaut sindikāciju");
jr_define ('DISALLOW_SYNDICATION_DESCRIPTION', 'Jomres.net sindikācijas funkcija ir jauna funkcionalitāte, kas paredzēta īpašumu kopīgošanai starp vietnēm, lai gan rezervācijas var veikt tikai mājas serverī.');

jr_define ('DISALLOW_SYNDICATION_DESCRIPTION_MORE', "Tā mērķis ir ļaut vietnēm veidot uzticību meklētājprogrammām. Tā ir bezmaksas funkcija, kas pieejama visiem Jomres lietotājiem. Aktīvie Jomres licences turētāji var, ja vēlas, noņemt savu vietni no sindikācijas tīkla, izmantojot šo lapu. Localhost nevar pievienot tīklam, un, ja kāda iemesla dēļ rodas problēmas ar savienojumu, jūs nevarēsit pievienot savu vietni tīklam. Pārbaudiet REST API savienojamības pārbaudes lapu, ja ir šaubas. ");

jr_define ('DISALLOW_SYNDICATION_INSTRUCTIONS_DISALLOW', "Noklikšķiniet uz šīs saites, lai noņemtu savu vietni no tīkla.");
jr_define ('DISALLOW_SYNDICATION_INSTRUCTIONS_ALLOW', "Noklikšķiniet uz šīs saites, lai pievienotu savu vietni tīklam.");

jr_define ('DISALLOW_SYNDICATION_DISALLOW', "Noņemt šo vietni no tīkla");
jr_define ('DISALLOW_SYNDICATION_ALLOW', "Pievienot šo vietni tīklam");

jr_define ('DISALLOW_SYNDICATION_INVALID_KEY', "Diemžēl jūsu atbalsta atslēga nav derīga vai nav aktīva, jūs nevarat mainīt šīs instalācijas sindikācijas statusu.");