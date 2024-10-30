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
##################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
##################################################################

jr_define('_PHPLIST_INSTRUCTIONS',"Deze plug-in integreert Jomres met PHPList en stelt je in staat om automatisch de naam en het e-mailadres van de klant toe te voegen aan een mailinglijst wanneer ze een boeking maken.");
jr_define('_PHPLIST_HSKIPCONFEMAIL',"Sla de bevestigingsmail van het abonnement over?");
jr_define('_PHPLIST_HSENDHTMLEMAILS',"HTML-e-mails verzenden?");
jr_define('_PHPLIST_HPPHPLISTURL',"PHPList voorpagina basis-URL");
jr_define('_PHPLIST_HPPHPLISTURL_DESC',"De url moet een schuine streep aan het einde hebben en mag geen parameters gebruiken");
jr_define('_PHPLIST_HUSER',"PHPList admin gebruikersnaam");
jr_define('_PHPLIST_HPASS',"PHPList beheerderswachtwoord");
jr_define('_PHPLIST_HATTRIB1',"attribuut1");
jr_define('_PHPLIST_HATTRIB1_DESC',"PHPList attribuut/veldnaam waar u de voornaam van de gast wilt opslaan. Laat niets leeg.");
jr_define('_PHPLIST_HATTRIB2',"attribuut2");
jr_define('_PHPLIST_HATTRIB2_DESC',"PHPList attribuut/veldnaam waar u de achternaam van de gast wilt opslaan. Laat niets leeg voor niets.");
jr_define('_PHPLIST_HLIST_ID',"Mailinglijst-ID");