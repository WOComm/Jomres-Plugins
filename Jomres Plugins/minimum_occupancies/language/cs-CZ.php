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
jr_define ('_OCCUPANCIES_TITLE', "Minimální obsazení");

jr_define('_OCCUPANCIES_DESCRIPTION',"Můžete nastavit minimální úrovně obsazenosti pro konkrétní typy pokojů, pokud chcete zajistit, aby si host v rezervačním formuláři vybral určitý počet typů hostů, než se zobrazí vhodná kombinace pokoje a tarifu." );
jr_define('_OCCUPANCIES_DESCRIPTION_INFO',"Zde můžete vytvořit minimální úroveň obsazenosti pro každý typ pokoje. Kombinace pokoje/tarifu nebude nabídnuta, pokud si host nezvolil odpovídající počet typů hostů. Pro každý typ pokoje prosím vyberte počet hostů daného typu, který by měl být minimální v rezervačním formuláři, než bude typ pokoje nabídnut. Pokud vás nezajímá, jaká by měla být úroveň obsazenosti pro daný typ pokoje, ponechte číslo hosta daného typu pokoje nastavené na 0 (nula). ");
jr_define('_OCCUPANCIES_NUMBER_OF_GUESTTYPE',"Číslo typu hosta");
jr_define('_OCCUPANCIES_NO_GUESTTYPES',"Zatím nemáte vytvořené žádné typy hostů. Před použitím této funkce prosím vytvořte nějaké typy hostů.");

jr_define ('_OCCUPANCIES_EDIT', "Upravit minimální obsazenost pro");