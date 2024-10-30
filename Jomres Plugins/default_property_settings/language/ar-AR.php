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


jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_TITLE', "Configuración de propiedad predeterminada");
jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_CONFIGTITLE', "Título de configuración general (si está disponible, es posible que algunos no lo estén)");
jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_VARIABLENAME', "Nombre de variable");
jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_CURRENTVALUE', "Valor actual");
jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_WARNING', "Esta es una característica avanzada, si no tiene un uso específico para ella, es mejor que no la use. Este complemento le permite modificar los valores predeterminados de una nueva propiedad. Hacer asegúrese de que comprende lo que hace la variable antes de cambiarla, ya que cambiarla aquí puede tener efectos de gran alcance en su sistema Jomres. Los elementos en blanco son generalmente configuraciones más antiguas que ya no se usan, pero que se dejan in situ por razones de compatibilidad con versiones anteriores, o son configuraciones que no se puede modificar a través del área de Configuración de la propiedad. ");
jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_NEWVALUE', "Nuevo valor");