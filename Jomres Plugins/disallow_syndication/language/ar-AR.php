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


jr_define ('DISALLOW_SYNDICATION_TITLE', "No permitir distribución");
jr_define ('DISALLOW_SYNDICATION_DESCRIPTION', 'La función de distribución de Jomres.net es una nueva funcionalidad diseñada para compartir propiedades entre sitios, aunque las reservas solo se pueden realizar en el servidor de inicio.');

jr_define ('DISALLOW_SYNDICATION_DESCRIPTION_MORE', "El propósito de esto es hacer posible que los sitios generen confianza con los motores de búsqueda. Es una función gratuita, disponible para todos los usuarios de Jomres. Los titulares de licencias de Active Jomres pueden, si desean optar por eliminar su sitio de la red de distribución a través de esta página. Localhost no se puede agregar a la red, y si por alguna razón hay un problema con la conectividad, no podrá agregar su sitio a la red. Consulte la página de prueba de conectividad de la API REST si tienen alguna duda. ");

jr_define ('DISALLOW_SYNDICATION_INSTRUCTIONS_DISALLOW', "Haga clic en este enlace para eliminar su sitio de la red");
jr_define ('DISALLOW_SYNDICATION_INSTRUCTIONS_ALLOW', "Haga clic en este enlace para agregar su sitio a la red");

jr_define ('DISALLOW_SYNDICATION_DISALLOW', "Eliminar este sitio de la red");
jr_define ('DISALLOW_SYNDICATION_ALLOW', "Agregar este sitio a la red");

jr_define ('DISALLOW_SYNDICATION_INVALID_KEY', "Lo sentimos, su clave de soporte no es válida o no está activa, no puede cambiar el estado de distribución de esta instalación.");