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

jr_define('_PHPLIST_INSTRUCTIONS',"Ovaj dodatak integrira Jomres s PHPListom i omogućuje vam da automatski dodate ime korisnika i e-poštu na popis za slanje e-pošte kada izvrše rezervaciju.");
jr_define('_PHPLIST_HSKIPCONFEMAIL',"Preskočiti e-poštu za potvrdu pretplate?");
jr_define('_PHPLIST_HSENDHTMLEMAILS',"Pošalji HTML e-poruke?");
jr_define ('_PHPLIST_HPHPLISTURL', "Osnovni URL naslovne stranice PHPList");
jr_define ('_PHPLIST_HPHPLISTURL_DESC', "Url mora imati kosu crtu i ne koristiti parametre u njoj");
jr_define('_PHPLIST_HUSER',"PHPList administratorsko korisničko ime");
jr_define ('_PHPLIST_HPASS', "Administratorska lozinka PHPList");
jr_define('_PHPLIST_HATTRIB1',"atribut1");
jr_define('_PHPLIST_HATTRIB1_DESC',"PHPList atribut/ime polja gdje želite pohraniti ime gosta. Ostavite prazno za ništa.");
jr_define('_PHPLIST_HATTRIB2',"atribut2");
jr_define ('_PHPLIST_HATTRIB2_DESC', "PHPList atribut/naziv polja u koje želite pohraniti prezime gosta. Ostavite prazno za ništa.");
jr_define ('_PHPLIST_HLIST_ID', "ID popisa adresa");