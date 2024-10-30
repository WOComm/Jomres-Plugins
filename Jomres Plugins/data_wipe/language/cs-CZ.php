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

jr_define ('_JOMRES_DATAWIPE_TITLE', "Vymazání dat");
jr_define ('_JOMRES_DATAWIPE_DESC', "Tato funkce vám umožňuje odstranit data shromážděná při rezervaci. Je určena pro vývojáře, kteří vytvořili mnoho vývojových dat o svých instalacích (jako jsou testovací rezervace, předplatné) a chtějí vymazat informace ze systému při zachování informací o majetku a tarifu. <br/> Plugin odstraní VŠECHNY protokoly cron, oblíbené uživatele, poznámky, rezervace, faktury, předplatitele, předplatná, hosty, data auditu, počty kliknutí a recenze. " );
jr_define ('_JOMRES_DATAWIPE_WARNING', "Tato data lze načíst pouze ze záložní kopie vašeho systému, takže musíte pochopit, že se jedná o velmi škodlivý skript. V důsledku toho se doporučuje, abyste po použití na určený účel účel, abyste jej poté znovu odinstalovali. ");
jr_define ('_JOMRES_DATAWIPE_GO', "Kliknutím smažete data");
jr_define ('_JOMRES_DATAWIPE_EMPTYING', "Emptying");
jr_define ('_JOMRES_DATAWIPE_EMPTYING_SUCCESS', "Úspěšně vyprázdněno.");
jr_define ('_JOMRES_DATAWIPE_EMPTYING_FAILURE', "Nepodařilo se vyprázdnit stůl.");