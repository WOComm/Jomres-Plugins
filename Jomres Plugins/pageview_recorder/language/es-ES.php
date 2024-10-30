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

jr_define ('_PAGEVIEW_RECORDER_ENABLED', "¿Registrar todas las páginas vistas en la base de datos?");
jr_define ('_PAGEVIEW_RECORDER_DESC', "Si está habilitado, todas las visitas a la página se registrarán en la base de datos. ADVERTENCIA! La tabla de visitas a la página de la base de datos puede volverse muy grande en muy poco tiempo. Úselo con cuidado.");