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

jr_define ('_DEEPL_TITLE', "Traducciones de DeepL");
jr_define ('_DEEPL_DESCRIPTION', "DeepL es un servicio de traducción en línea a un precio razonable que puede utilizar para traducir cadenas de idiomas de Jomres automáticamente. Estas traducciones, una vez recibidas del servicio DeepL, se almacenan localmente y puede utilizar la función de traducción de etiquetas para refinarlos. Esto acelera significativamente el proceso de hacer que su sitio web funcione con varios idiomas. <a href='https://support.deepl.com/hc/en-us/articles/360019925219' target='_blank'> Compatible idiomas </a> ");
jr_define ('_DEEPL_API_KEY_SETTING', "Clave de autenticación de DeepL");
jr_define ('_DEEPL_API_KEY_SETTING_DESC', "Necesitará una clave API válida de <a href='https://www.deepl.com/pro?cta=header-prices/' target='_blank'> DeepL. </ a > Una vez que se haya suscrito, encontrará la clave de autenticación en <a href='https://www.deepl.com/en/pro-account/' target='_blank'> su cuenta. </a> haya guardado la clave en Jomres, es posible que su sitio se ralentice por un tiempo, ya que habrá muchas traducciones que deberán extraerse del servicio DeepL. Tenga paciencia y vuelva a cargar la página varias veces. Luego, puede ajustar las personalizaciones en la página de traducciones de etiquetas. ");