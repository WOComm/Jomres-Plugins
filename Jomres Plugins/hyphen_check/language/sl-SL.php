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



jr_define('TOOL_HYPHEN_CHECK_TITLE',"Preverjanje vezaja");
jr_define('TOOL_HYPHEN_CHECK_DESCRIPTION',"To orodje je zasnovano za preverjanje vseh zamikov lastnosti in dolgih polj. Nekatera imajo morda napačno entitete html v poljih lat ali long namesto dejanskih vezajev. Kjer najdemo, to orodje pretvori te v vezaje.");
jr_define('TOOL_HYPHEN_CHECK_DONE_SOMEFOUND',"Nekatere lastnosti so bile najdene z entitetami html, ki so bile zdaj pretvorjene v dejanske vezaje. Število pretvorjenih lastnosti je ");
jr_define('TOOL_HYPHEN_CHECK_DONE_NONEFOUND',"Vse je dobro, ni bilo mogoče najti lastnosti z entitetami html, kjer bi morali biti dejanski vezaji.");