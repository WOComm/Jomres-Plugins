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


jr_define ('_COMMON_STRINGS_TITLE', "Variabile șablon comune");

jr_define ('_COMMON_STRINGS_INFO', "Instrument pentru dezvoltatori. Conceput pentru a afișa dezvoltatorilor șiruri comune care sunt disponibile pentru toate șabloanele fără a fi nevoie să le adăugați la scriptul de apelare al șablonului. <br/> De exemplu, în această listă este definiția COMMON_NEXT. Un dezvoltator poate adăuga acest lucru la un șablon Jomres fără a fi necesar să îl definiți în scriptul de apelare. Ați adăuga șirul comun la șablon la fel ca orice alt șir, introducând &#123;COMMON_NEXT&#125; în șablon. <br/> În lista de mai jos veți vedea constanta așa cum este definită în fișierul de limbă și, lângă aceasta, ieșirea pe care o va afișa (sub rezerva existenței unor personalizări lingvistice specifice proprietății). Rețineți, în cazul constantei COMMON_LAST_VIEWED_PROPERTY_UID, uidul proprietății variază și nu este afișat în această listă. ");
jr_define ('_COMMON_STRINGS_CONSTANT', "Constant");
jr_define ('_COMMON_STRINGS_VALUE', "Ieșire");