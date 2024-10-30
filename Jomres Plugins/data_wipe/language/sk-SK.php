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

jr_define ('_JOMRES_DATAWIPE_TITLE', "Vymazanie údajov");
jr_define ('_JOMRES_DATAWIPE_DESC', "Táto funkcia vám umožňuje odstrániť údaje, ktoré sa zhromažďujú pri vytváraní rezervácií. Je určený pre vývojárov, ktorí vytvorili veľké množstvo vývojových údajov o svojich inštaláciách (napríklad rezervácie testov, predplatné) a chcú vymažte informácie zo systému, pričom zachováte informácie o majetku a tarifách. <br/> Plugin odstráni VŠETKY protokoly cron, obľúbené položky používateľov, poznámky, rezervácie, faktúry, predplatiteľov, predplatné, hostí, údaje auditu, počty kliknutí a recenzie. " );
jr_define ('_JOMRES_DATAWIPE_WARNING', "Tieto údaje je možné získať iba zo záložnej kópie vášho systému, takže musíte pochopiť, že ide o veľmi škodlivý skript. V dôsledku toho sa odporúča, aby ste ho raz použili, pretože bol určený. účel, aby ste ho potom znova odinštalovali. ");
jr_define ('_JOMRES_DATAWIPE_GO', "Kliknutím vymažete údaje");
jr_define ('_JOMRES_DATAWIPE_EMPTYING', "Emptying");
jr_define ('_JOMRES_DATAWIPE_EMPTYING_SUCCESS', "Úspešne vyprázdnené.");
jr_define ('_JOMRES_DATAWIPE_EMPTYING_FAILURE', "Nepodarilo sa vyprázdniť stôl.");