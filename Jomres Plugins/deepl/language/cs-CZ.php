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

jr_define ('_DEEPL_TITLE', "DeepL translations");
jr_define ('_DEEPL_DESCRIPTION', "DeepL je cenově dostupná in-line překladová služba, kterou můžete použít k automatickému překladu jazykových řetězců Jomres. Tyto překlady, jakmile jsou přijaty ze služby DeepL, jsou uloženy lokálně a funkci Label Translations můžete použít k upřesněte je. Tím se výrazně zrychlí proces fungování vašeho webu ve více jazycích. <a href='https://support.deepl.com/hc/en-us/articles/360019925219' target='_blank'> Podporováno jazyky </a> ");
jr_define ('_DEEPL_API_KEY_SETTING', "ověřovací klíč DeepL");
jr_define ('_DEEPL_API_KEY_SETTING_DESC', "Budete potřebovat platný klíč API od <a href='https://www.deepl.com/pro?cta=header-prices/' target='_blank'> DeepL. </a > Jakmile se přihlásíte k odběru, najdete ověřovací klíč v <a href='https://www.deepl.com/en/pro-account/' target='_blank'> vašem účtu. </a> Poté, co uložili jste klíč do Jomres, váš web se může na chvíli zpomalit, protože bude potřeba stáhnout mnoho překladů ze služby DeepL. Buďte trpěliví a stránku několikrát znovu načtěte. Poté můžete úpravy doladit na stránce lable translations. ");