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
jr_define ('EXTERNAL_FORM', "Formulari extern");
jr_define ('EXTERNAL_FORM_PLUGIN_SHORTCODE', 'Codi curt del complement (per exemple, "rsform")');
jr_define ('EXTERNAL_FORM_PLUGIN_ARG1', 'Argument 1 (per exemple, "1")');
jr_define ('EXTERNAL_FORM_PLUGIN_ARG2', "Argument 2 (opcional)");
jr_define ('EXTERNAL_FORM_INFO', "Us permet incloure un formulari d'un connector de formulari extern a les pestanyes dels detalls de la propietat. Establiu el codi curt del complement a alguna cosa com 'rsform' i afegiu arguments addicionals si cal. No cal que sigui un forma, pot ser qualsevol cosa que s'anomeni mambot, però una forma seria un ús típic. ");