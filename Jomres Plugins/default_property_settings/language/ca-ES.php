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
jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_TITLE', "Configuració de propietats predeterminada");
jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_CONFIGTITLE', "Títol de configuració general (si està disponible, pot ser que alguns no ho siguin)");
jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_VARIABLENAME', "Nom de la variable");
jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_CURRENTVALUE', "valor actual");
jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_WARNING', "Aquesta és una característica avançada, si no en feu un ús específic, és millor que no la feu servir. Aquest connector us permet modificar els valors predeterminats d'una nova propietat. Feu segur que enteneu el que fa la variable abans de canviar-la, ja que canviar-la aquí pot afectar de gran abast al vostre sistema Jomres. Els elements en blanc generalment són configuracions anteriors que ja no s’utilitzen, però que es deixen in situ per motius de compatibilitat inversa o no es pot modificar mitjançant l'àrea de configuració de propietats. ");
jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_NEWVALUE', "valor nou");