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

jr_define('_CLONE_TARIFFS_TITLE',"Tarifes de clonació");
jr_define('_CLONE_TARIFFS_INFO',"Aquí podeu clonar una tarifa d'una propietat de destinació a una propietat d'origen. Només tindran a la vostra disposició les propietats que teniu autorització per gestionar.");
jr_define('_CLONE_TARIFFS_SOURCE',"Propietat de la font");
jr_define('_CLONE_TARIFFS_TARIFF_TO_CLONE',"Tarifa per clonar");
jr_define('_CLONE_TARIFFS_TARGET',"Propietat de destinació");
jr_define('_CLONE_TARIFFS_TARGET_ROOMTYPE',"Tipus d'habitació de propietat objectiu");
jr_define('_CLONE_TARIFFS_TARGET_WARNING',"Si el mode d'edició de tarifes de la propietat de destinació és diferent del mode d'edició de tarifes de la propietat d'origen, quan es produeixi la clonació, les tarifes originals de la propietat de destinació s'eliminaran i el seu mode d'edició de tarifes es canviarà per reflectir el de la font. configuració de la propietat.");
jr_define('_CLONE_TARIFFS_TARGET_DELETE_EXISTING',"Elimineu les tarifes existents a la propietat Target?");
jr_define('_CLONE_TARIFFS_TARGET_DELETE_OPTION',"Si el mode d'edició de tarifes de la propietat de destinació és el mateix que la propietat d'origen, les tarifes existents no s'eliminaran. Tanmateix, podeu optar per anul·lar-ho establint aquesta opció a Sí.");