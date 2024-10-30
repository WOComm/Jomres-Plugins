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
jr_define('_PHPLIST_INSTRUCTIONS',"Denne plugin integrerer Jomres med PHPList og lar deg automatisk legge til kunders navn og e-post til en e-postliste når de foretar en bestilling.");
jr_define('_PHPLIST_HSKIPCONFEMAIL',"Hopp over abonnementsbekreftelse på e-post?");
jr_define('_PHPLIST_HSENDHTMLEMAILS',"Sende HTML-e-post?");
jr_define('_PHPLIST_HPHPLISTURL',"PHPList basis-URL forside");
jr_define('_PHPLIST_HPHPLISTURL_DESC',"Nettadressen må ha en etterfølgende skråstrek og ikke bruk noen parametere i den");
jr_define('_PHPLIST_HUSER',"PHPList admin brukernavn");
jr_define ('_PHPLIST_HPASS', "PHPList admin -passord");
jr_define('_PHPLIST_HATTRIB1',"attributt1");
jr_define('_PHPLIST_HATTRIB1_DESC',"PHPListattributt/feltnavn der du vil lagre gjestens fornavn. La stå tomt for ingen.");
jr_define ('_PHPLIST_HATTRIB2', "attributt2");
jr_define('_PHPLIST_HATTRIB2_DESC',"PHPListattributt/feltnavn der du vil lagre gjestens etternavn. La stå tomt for ingen.");
jr_define('_PHPLIST_HLIST_ID',"E-postliste-ID");