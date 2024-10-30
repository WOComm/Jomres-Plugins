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


jr_define ('_PHPLIST_INSTRUCTIONS', "Dette plugin integrerer Jomres med PHPList og giver dig mulighed for automatisk at tilføje kundernes navn og e -mail til en mailingliste, når de foretager en reservation.");
jr_define('_PHPLIST_HSKIPCONFEMAIL',"Spring bekræftelses-e-mail på abonnement?");
jr_define ('_PHPLIST_HSENDHTMLEMAILS', "Vil du sende HTML -e -mails?");
jr_define('_PHPLIST_HPHPLISTURL',"PHPLliste forside-URL");
jr_define('_PHPLIST_HPHPLISTURL_DESC',"URL'en skal have en afsluttende skråstreg og brug ingen params i den");
jr_define ('_PHPLIST_HUSER', "PHPList admin brugernavn");
jr_define ('_PHPLIST_HPASS', "PHPList admin password");
jr_define ('_PHPLIST_HATTRIB1', "attribut1");
jr_define ('_PHPLIST_HATTRIB1_DESC', "PHPList -attribut/feltnavn, hvor du vil gemme gæstens fornavn. Lad det stå tomt for ingen.");
jr_define('_PHPLIST_HATTRIB2',"attribut2");
jr_define('_PHPLIST_HATTRIB2_DESC',"PHPList attribut/feltnavn, hvor du vil gemme gæstens efternavn. Lad være tom for ingen.");
jr_define('_PHPLIST_HLIST_ID',"Postliste-id");