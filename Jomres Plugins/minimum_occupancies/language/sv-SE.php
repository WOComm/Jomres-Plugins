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


jr_define('_OCCUPANCIES_TITLE',"Minsta beläggning");

jr_define('_OCCUPANCIES_DESCRIPTION',"Du kan ställa in lägsta beläggningsnivåer för specifika rumstyper, om du vill säkerställa att gästen har valt ett visst antal gästtyper i bokningsformuläret innan lämplig rums- och priskombination visas." );
jr_define('_OCCUPANCIES_DESCRIPTION_INFO',"Här kan du skapa en lägsta beläggningsnivå för varje rumstyp. En kombination av rum/pris kommer inte att erbjudas om gästen inte har valt lämpligt antal gästtyper. För varje rumstyp, välj antal gäster av en given typ som det bör finnas ett minimum i bokningsformuläret innan rumstypen erbjuds. Om du inte bryr dig om hur beläggningsnivån för en rumstyp ska vara, låt den rumstypens gästnummer vara inställt på 0 (noll). ");
jr_define('_OCCUPANCIES_NUMBER_OF_GUESTTYPE',"Gästtypnummer");
jr_define ('_OCCUPANCIES_NO_GUESTTYPES', "Du har inte skapat några gästtyper än. Skapa några gästtyper innan du använder den här funktionen.");

jr_define('_OCCUPANCIES_EDIT',"Redigera lägsta beläggning för ");