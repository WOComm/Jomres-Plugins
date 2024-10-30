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

jr_define('_PHPLIST_INSTRUCTIONS',"Tento doplnok integruje Jomres s PHPList a umožňuje vám automaticky pridať meno a e-mail zákazníkov do zoznamu adresátov, keď urobia rezerváciu.");
jr_define('_PHPLIST_HSKIPCONFEMAIL',"Preskočiť e-mail s potvrdením odberu?");
jr_define ('_PHPLIST_HSENDHTMLEMAILS', "Odosielať e -maily HTML?");
jr_define('_PHPLIST_HPHPLISTURL',"Základná adresa URL úvodnej stránky zoznamu PHP");
jr_define('_PHPLIST_HPHPLISTURL_DESC',"Webová adresa musí mať koncovú lomku a nepoužívať v nej žiadne parametre");
jr_define('_PHPLIST_HUSER',"Používateľské meno správcu zoznamu PHP");
jr_define('_PHPLIST_HPASS',"heslo správcu PHP zoznamu");
jr_define('_PHPLIST_HATTRIB1',"atribút1");
jr_define('_PHPLIST_HATTRIB1_DESC',"Názov atribútu/poľa zoznamu PHP, do ktorého chcete uložiť krstné meno hosťa. Pre žiadne ponechajte prázdne.");
jr_define('_PHPLIST_HATTRIB2',"atribút2");
jr_define('_PHPLIST_HATTRIB2_DESC',"názov atribútu/pola zoznamu PHP, do ktorého chcete uložiť priezvisko hosťa. Ak nechcete zadať žiadne, ponechajte pole prázdne.");
jr_define('_PHPLIST_HLIST_ID',"ID zoznamu adries");