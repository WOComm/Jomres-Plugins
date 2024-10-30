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

jr_define ('_DEEPL_TITLE', "Traduccions DeepL");
jr_define ("_ DEEPL_DESCRIPTION", "DeepL és un servei de traducció en línia a un preu raonable que podeu utilitzar per traduir automàticament les cadenes d'idioma Jomres. Aquestes traduccions, un cop rebudes del servei DeepL, s'emmagatzemen localment i podeu utilitzar la funció refineu-los. Això agilitza significativament el procés perquè el vostre lloc web funcioni amb diversos idiomes. <a href='https://support.deepl.com/hc/en-us/articles/360019925219' target='_blank'> Suport idiomes </a> ");
jr_define ('_DEEPL_API_KEY_SETTING', "Clau d'autenticació DeepL");
jr_define ('_DEEPL_API_KEY_SETTING_DESC', "Necessitareu una clau d'API vàlida a <a href='https://www.deepl.com/pro?cta=header-prices/' target='_blank'> DeepL. </ a > Un cop us hàgiu subscrit, trobareu la clau d'autenticació al <a href='https://www.deepl.com/ca/pro-account/' target='_blank'> vostre compte. </a> Després heu desat la clau a Jomres, el vostre lloc pot ralentir-se durant un temps, ja que hi haurà moltes traduccions que cal treure del servei DeepL. Tingueu paciència i torneu a carregar la pàgina unes quantes vegades. Després podreu ajustar les personalitzacions a la pàgina de traduccions. ");