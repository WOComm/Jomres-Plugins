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


jr_define ('TOOL_HYPHEN_CHECK_TITLE', "Verificar hífen");
jr_define ('TOOL_HYPHEN_CHECK_DESCRIPTION', "Esta ferramenta foi projetada para verificar todos os campos de latência e longos de propriedade. Alguns podem ter entidades html incorretamente nos campos de latitude ou longitude em vez de hifens reais. Onde encontrada esta ferramenta os converte em hifens.");
jr_define ('TOOL_HYPHEN_CHECK_DONE_SOMEFOUND', "Algumas propriedades encontradas com entidades html, que agora foram convertidas em hifens reais. O número de propriedades convertidas é");
jr_define ('TOOL_HYPHEN_CHECK_DONE_NONEFOUND', "Tudo está bem, nenhuma propriedade foi encontrada com entidades html onde os hifens reais deveriam estar.");