<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.24.0
 *
 * @copyright	2005-2021 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/
//#################################################################
defined('_JOMRES_INITCHECK') or die('');
//#################################################################


jr_define ('_DEEPL_TITLE', "DeepL -översättningar");
jr_define ('_DEEPL_DESCRIPTION', "DeepL är en rimlig översättningstjänst som du kan använda för att översätta Jomres-språksträngar automatiskt. Dessa översättningar, när de har mottagits från DeepL-tjänsten, lagras lokalt och du kan använda funktionen Etikettöversättningar för att förfina dem. Detta påskyndar avsevärt processen med att få din webbplats att fungera med flera språk. <a href='https://support.deepl.com/hc/en-us/articles/360019925219' target='_blank'> Stöds språk </a> ");
jr_define ('_DEEPL_API_KEY_SETTING', "DeepL Authentication Key");
jr_define ('_DEEPL_API_KEY_SETTING_DESC', "Du behöver en giltig API-nyckel från <a href='https://www.deepl.com/pro?cta=header-prices/' target='_blank'> DeepL. </a > När du har prenumererat hittar du autentiseringsnyckeln i <a href='https://www.deepl.com/en/pro-account/' target='_blank'> ditt konto. </a> Efter dig har sparat nyckeln i Jomres din webbplats kan sakta ner en liten stund eftersom det kommer att finnas många översättningar som måste hämtas från DeepL -tjänsten. Ha tålamod och ladda om sidan några gånger. Efteråt kan du finjustera anpassningarna på sidan med översättningar för etiketter. ");