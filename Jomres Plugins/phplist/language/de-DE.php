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
jr_define('_PHPLIST_INSTRUCTIONS',"Dieses Plugin integriert Jomres in PHPList und ermöglicht es Ihnen, den Namen und die E-Mail-Adresse von Kunden automatisch zu einer Mailingliste hinzuzufügen, wenn sie eine Buchung vornehmen.");
jr_define('_PHPLIST_HSKIPCONFEMAIL',"Bestätigungs-E-Mail überspringen?");
jr_define('_PHPLIST_HSENDHTMLEMAILS',"HTML-E-Mails senden?");
jr_define('_PHPLIST_HPHPLISTURL',"PHPList Startseiten-Basis-URL");
jr_define('_PHPLIST_HPHPLISTURL_DESC',"Die URL muss einen abschließenden Schrägstrich haben und darf keine Parameter enthalten");
jr_define('_PHPLIST_HUSER',"PHPList Admin-Benutzername");
jr_define('_PHPLIST_HPASS',"PHPlist-Administratorkennwort");
jr_define('_PHPLIST_HATTRIB1',"Attribut1");
jr_define('_PHPLIST_HATTRIB1_DESC',"PHPList Attribut/Feldname, in dem der Gast-Vorname gespeichert werden soll. Für keinen leer lassen.");
jr_define('_PHPLIST_HATTRIB2',"Attribut2");
jr_define('_PHPLIST_HATTRIB2_DESC',"PHPList Attribut/Feldname, in dem der Gast-Nachname gespeichert werden soll. Für keinen leer lassen.");
jr_define('_PHPLIST_HLIST_ID',"Mailinglisten-ID");