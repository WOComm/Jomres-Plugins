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


jr_define('_PHPLIST_INSTRUCTIONS',"Acest plugin integrează Jomres cu PHPList și vă permite să adăugați automat numele și e-mailul clienților la o listă de corespondență atunci când efectuează o rezervare.");
jr_define('_PHPLIST_HSKIPCONFEMAIL',"Omiteți e-mailul de confirmare a abonamentului?");
jr_define('_PHPLIST_HSENDHTMLEMAILS',"Trimite e-mailuri HTML?");
jr_define('_PHPLIST_HPHPLISTURL',"Adresa URL de bază a paginii principale PHPList");
jr_define ('_PHPLIST_HPHPLISTURL_DESC', "Adresa URL trebuie să aibă o bară finală și nu folosiți niciun parametru în ea");
jr_define('_PHPLIST_HUSER',"Nume utilizator administrator PHPList");
jr_define('_PHPLIST_HPASS',"Parola administrator PHPList");
jr_define('_PHPLIST_HATTRIB1',"atribut1");
jr_define('_PHPLIST_HATTRIB1_DESC',"Atributul PHPList/numele câmpului în care doriți să stocați prenumele oaspetelui. Lăsați necompletat pentru niciunul.");
jr_define('_PHPLIST_HATTRIB2',"atribut2");
jr_define('_PHPLIST_HATTRIB2_DESC',"Atributul PHPList/numele câmpului în care doriți să stocați numele de familie al oaspetelui. Lăsați necompletat pentru niciunul.");
jr_define('_PHPLIST_HLIST_ID',"ID-ul listei de corespondență");