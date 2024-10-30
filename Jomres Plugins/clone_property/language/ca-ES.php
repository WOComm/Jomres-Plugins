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

jr_define ('_JRPORTAL_CLONEPROPERTY_TITLE', "Propietat de clonació");
jr_define ('_JRPORTAL_CLONEPROPERTY_CHOOSEPROPERTY', "Seleccioneu la propietat que voleu clonar:");
jr_define ('_JRPORTAL_CLONEPROPERTY_NEWPROPERTY_NAME', "Nom de la propietat nova:");
jr_define ('_JRPORTAL_CLONEPROPERTY_NOTES', "Tingueu en compte que les propietats de clonació no tenen tarifes, heu d'utilitzar el connector Clonar tarifes si voleu copiar les tarifes o crear les tarifes manualment. No s'importen configuracions de connectors, si estan disponibles. La propietat no es fa referència creuada amb qualsevol administrador de propietats. <br/> Clonar la propietat només s'ha d'utilitzar per duplicar una propietat quan la propietat nova faci servir el mateix tipus de propietat i el mateix tipus d'habitació. ");
jr_define ('_JRPORTAL_CLONEPROPERTY_DONE', "Propietat clonada");