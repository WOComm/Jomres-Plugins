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


jr_define ('EXTERNAL_FORM', "Formulario externo");
jr_define ('EXTERNAL_FORM_PLUGIN_SHORTCODE', 'Código corto del complemento (por ejemplo, "rsform")');
jr_define ('EXTERNAL_FORM_PLUGIN_ARG1', 'Argumento 1 (por ejemplo, "1")');
jr_define ('EXTERNAL_FORM_PLUGIN_ARG2', "Argumento 2 (opcional)");
jr_define ('EXTERNAL_FORM_INFO', "Le permite incluir un formulario de un complemento de formulario externo en las pestañas de los detalles de la propiedad. Establezca el código corto del complemento en algo como 'rsform' y agregue argumentos adicionales según sea necesario. No es necesario que sea un forma, puede ser cualquier cosa que se llame mambot, pero una forma sería un uso típico. ");