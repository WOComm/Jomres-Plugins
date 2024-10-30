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


jr_define ('_PAGEVIEW_RECORDER_ENABLED', "Înregistrați toate vizualizările de pagină în db?");
jr_define ('_PAGEVIEW_RECORDER_DESC', "Dacă este activat, toate vizualizările de pagină vor fi înregistrate în baza de date. AVERTISMENT! Tabelul de vizualizări a paginii bazei de date poate deveni foarte mare într-un interval de timp foarte scurt! Utilizați cu grijă.");