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


jr_define ('EXTERNAL_FORM', "Formulário externo");
jr_define ('EXTERNAL_FORM_PLUGIN_SHORTCODE', 'Código abreviado do plug-in (por exemplo, "rsform")');
jr_define ('EXTERNAL_FORM_PLUGIN_ARG1', 'Argumento 1 (por exemplo, "1")');
jr_define ('EXTERNAL_FORM_PLUGIN_ARG2', "Argumento 2 (opcional)");
jr_define ('EXTERNAL_FORM_INFO', "Permite que você inclua um formulário de um plug-in de formulário externo nas guias dos detalhes da propriedade. Defina o código de acesso do plug-in para algo como 'rsform' e adicione argumentos extras conforme necessário. Não precisa ser um formulário, pode ser qualquer coisa chamada de mambot, mas um formulário seria um uso típico. ");