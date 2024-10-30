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


jr_define ('_DEEPL_TITLE', "traduções DeepL");
jr_define ('_DEEPL_DESCRIPTION', "DeepL é um serviço de tradução in-line com preços razoáveis ​​que você pode usar para traduzir strings de idioma Jomres automaticamente. Essas traduções, uma vez recebidas do serviço DeepL, são armazenadas localmente e você pode usar o recurso de traduções de rótulos para refiná-los. Isso acelera significativamente o processo de fazer seu site funcionar em vários idiomas. <a href='https://support.deepl.com/hc/en-us/articles/360019925219' target='_blank'> Compatível idiomas </a> ");
jr_define ('_DEEPL_API_KEY_SETTING', "Chave de autenticação DeepL");
jr_define ('_DEEPL_API_KEY_SETTING_DESC', "Você precisará de uma chave de API válida de <a href='https://www.deepl.com/pro?cta=header-prices/' target='_blank'> DeepL. </ a > Depois de se inscrever, você encontrará a chave de autenticação em <a href='https://www.deepl.com/en/pro-account/' target='_blank'> sua conta. </a> Depois de ter salvo a chave no Jomres, seu site pode ficar lento por um tempo, pois haverá muitas traduções que precisarão ser retiradas do serviço DeepL. Seja paciente e recarregue a página algumas vezes. Depois disso, você pode ajustar as personalizações na página de traduções de etiquetas. ");