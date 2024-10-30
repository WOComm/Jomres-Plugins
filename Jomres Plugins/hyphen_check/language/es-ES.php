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

jr_define ('TOOL_HYPHEN_CHECK_TITLE', "Verificación de guión");
jr_define ('TOOL_HYPHEN_CHECK_DESCRIPTION', "Esta herramienta está diseñada para verificar todos los campos largos y de retraso de propiedad. Algunos pueden tener entidades html incorrectamente en los campos lat o long en lugar de guiones reales. Donde se encuentre, esta herramienta los convierte en guiones.");
jr_define ('TOOL_HYPHEN_CHECK_DONE_SOMEFOUND', "Algunas propiedades encontradas con entidades html, que ahora se han convertido en guiones reales. El número de propiedades convertidas es");
jr_define ('TOOL_HYPHEN_CHECK_DONE_NONEFOUND', "Todo está bien, no se encontraron propiedades con entidades html donde deberían estar los guiones reales");