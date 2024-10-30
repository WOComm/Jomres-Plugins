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

jr_define ('_DEEPL_TITLE', "DeepL fordítások");
jr_define ('_DEEPL_DESCRIPTION', "A DeepL egy kedvező árú, online fordítószolgáltatás, amellyel automatikusan lefordíthatja a Jomres nyelvű karakterláncokat. Ezek a fordítások, miután megkapták őket a DeepL szolgáltatástól, helyben kerülnek tárolásra, és a Címkefordítások funkció segítségével finomítsa őket. Ez jelentősen felgyorsítja a webhely több nyelven történő működésének folyamatát. <a href='https://support.deepl.com/hc/en-us/articles/360019925219' target='_blank'> Támogatott nyelvek </a> ");
jr_define ('_DEEPL_API_KEY_SETTING', "DeepL hitelesítési kulcs");
jr_define ('_DEEPL_API_KEY_SETTING_DESC', "Szükséged lesz egy érvényes API-kulcsra a <a href='https://www.deepl.com/pro?cta=header-prices/' target='_blank'> DeepL. </a > Miután feliratkozott, megtalálja a hitelesítési kulcsot a <a href='https://www.deepl.com/en/pro-account/' target='_blank'> fiókjában. </a> Miután mentette a kulcsot a Jomres -ban, webhelye lelassulhat egy kis időre, mivel sok fordítást kell lehívni a DeepL szolgáltatásból. Légy türelmes, és töltse be néhányszor az oldalt. Ezt követően finomhangolhatja a testreszabásokat a sávos fordítások oldalon. ");