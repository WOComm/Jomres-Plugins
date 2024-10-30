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


jr_define('TOOL_HYPHEN_CHECK_TITLE',"Verificare cratima");
jr_define('TOOL_HYPHEN_CHECK_DESCRIPTION',"Acest instrument este conceput pentru a verifica toate întârzierile de proprietate și câmpurile lungi. Unele pot avea în mod incorect entități html în câmpurile lat sau lung în loc de cratime reale. Acolo unde este găsit, acest instrument le convertește în cratime.");
jr_define('TOOL_HYPHEN_CHECK_DONE_SOMEFOUND',"Unele proprietăți găsite cu entități html, care acum au fost convertite în cratime reale. Numărul de proprietăți convertite este ");
jr_define('TOOL_HYPHEN_CHECK_DONE_NONEFOUND',"Totul este bine, nu au fost găsite proprietăți cu entități html unde ar trebui să fie cratimele reale.");